<?php

namespace App\Components;

use App\User;
use Illuminate\Http\Request;
use SendGrid;

class MailComponent
{
    protected $sendgrid;
    protected $from;
    protected $name;
    protected $subject1;

    public function __construct()
    {
        $this->sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));
        $this->from = 'kamijo42@gmail.com';
        $this->name = "Skill Evolution";

        $this->subject1 = 'ご登録内容のお知らせ';
    }

    /*
     * 登録時の配信メール
     * $from: 必須: info@white-sands.biz
     * $to: 必須: 配列: 宛先アドレス
     */
    public function sendEntry($to, $name)
    {
       $from_sg = new \SendGrid\Mail\From($this->from, $this->name);
       $tos = [];
       foreach ($to as $email) {
           array_push($tos, new \SendGrid\Mail\To($email));
       }
       $subject_sg = new \SendGrid\Mail\Subject($this->subject1);
       $htmlContent = new \SendGrid\Mail\HtmlContent(
            strval(
                view('mail.register', compact(['tos', 'name']))
            )
       );

       $email_sg = new \SendGrid\Mail\Mail(
           $from_sg,
           $tos,
           $subject_sg,
           null,
           $htmlContent
       );

       try {
            $response = $this->sendgrid->send($email_sg);
        } catch (Exception $e) {
            //echo 'Caught exception: '. $e->getMessage() ."\n";
        }

    }

}
