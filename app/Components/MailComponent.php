<?php

namespace App\Components;

use App\User;
use Illuminate\Http\Request;
use SendGrid;

class MailComponent
{
    protected $sendgrid;
    protected $from;
    protected $from_sg;
    protected $bcc;
    protected $name;
    protected $subject1;
    protected $subject2;
    protected $subject3;

    public function __construct()
    {
        $this->sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));
        $this->from = 'info@skiltalk.biz';
        $this->name = "スキルトーク(Skill Talk)";
        $this->bcc = 'tetsuya.kamijo@white-sands.biz';

        $this->subject1 = 'ご登録内容のお知らせ';
        $this->subject2 = 'お問合せ内容のご確認';
        $this->subject3 = 'パスワード再発行のお知らせ';

        $this->from_sg = new \SendGrid\Mail\From($this->from, $this->name);
    }

    /*
     * 登録時の配信メール
     * $from: 必須: info@white-sands.biz
     * $to: 必須: 配列: 宛先アドレス
     */
    public function sendEntry($to, $name)
    {
        $tos = [];
        foreach ($to as $email) {
            array_push($tos, new \SendGrid\Mail\To($email));
        }
        $subject_sg = new \SendGrid\Mail\Subject($this->subject1);
        $htmlContent = new \SendGrid\Mail\HtmlContent(
             strval(
                 view('mail.register', compact(['to', 'name']))
             )
        );

        $email_sg = $this->createEmail($tos, $subject_sg, $htmlContent);

        try {
             $response = $this->sendgrid->send($email_sg);
         } catch (Exception $e) {
             //echo 'Caught exception: '. $e->getMessage() ."\n";
         }

    }

    /*
     * お問い合わせ
     */
    public function sendContact($to, $param)
    {
        $tos = [];
        foreach ($to as $email) {
            array_push($tos, new \SendGrid\Mail\To($email));
        }

        if ($param[3] === '') {
            $subject = $this->subject2;
        } else {
            $subject = $this->subject2 . ' - ' . $param[3];
        }

        $subject_sg = new \SendGrid\Mail\Subject($subject);
        $htmlContent = new \SendGrid\Mail\HtmlContent(
             strval(
                 view('mail.contact', compact(['to', 'param']))
             )
        );

        $email_sg = $this->createEmail($tos, $subject_sg, $htmlContent);

        try {
             $response = $this->sendgrid->send($email_sg);
         } catch (Exception $e) {
             //echo 'Caught exception: '. $e->getMessage() ."\n";
         }
    }

    /*
     * パスワードリセット
     */
    public function sendResetPassword($to, $token_url)
    {
        $tos = [];
        foreach ($to as $email) {
            array_push($tos, new \SendGrid\Mail\To($email));
        }
        $subject_sg = new \SendGrid\Mail\Subject($this->subject3);
        $htmlContent = new \SendGrid\Mail\HtmlContent(
             strval(
                 view('mail.passwordreset', compact(['to', 'token_url']))
             )
        );

        $email_sg = $this->createEmail($tos, $subject_sg, $htmlContent);

        try {
             $response = $this->sendgrid->send($email_sg);
         } catch (Exception $e) {
             //echo 'Caught exception: '. $e->getMessage() ."\n";
         }
    }

    private function createEmail($to, $subject, $html)
    {
        $email_sg = new \SendGrid\Mail\Mail(
            $this->from_sg,
            $to,
            $subject,
            null,
            $html
        );
        $email_sg->addBcc($this->bcc, 'スキルトーク');
        return $email_sg;
    }

}
