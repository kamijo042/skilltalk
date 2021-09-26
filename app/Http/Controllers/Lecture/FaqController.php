<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

use App\Models\Lectures;
use App\Components\MailComponent;

class FaqController extends Controller
{
    private $contact_type_detail;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
        $this->contact_type_detail = [
            1 => '講師・主催者',
            2 => '受講者・視聴者',
            3 => 'その他',
        ];
    }


    public function index()
    {

        return view('lecture.faq');
    }

    public function contact()
    {
        return view('lecture.contact');
    }

    public function send_contact(Request $request)
    {
        $name = $request->get('name');
        $tel = $request->get('tel');
        $to = $request->get('email');
        $contact_type = $this->contact_type_detail[$request->get('contact-type')[0]];
        $subject = $request->has('subject') ? $request->input('subject') : '';
        $message = $request->get('message');

        $param = [$name, $tel, $contact_type, $subject, $message];

        // Send Mail
        $email = new MailComponent();
        $email->sendContact([$to], $param);

        return view('lecture.contact_thanks');
    }
}
