<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Brian2694\Toastr\Facades\Toastr;
class EmailController extends Controller
{
    
    public function create()
    {
        return view('emails.email');
    }

    public function sendEmail(Request $request)
    {
        $var = Auth::user()->email;
        $request->validate([
          'email' => 'required|email',
          'subject' => 'required',
          'name' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'subject' => $request->subject,
          'name' => $request->name,
          'email' => $request->email,
          'content' => $request->content
        ];

        Mail::send('emails.email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });
        Toastr::success('E-mail envoyé avec succès !)','Success');
        return back();
    }

}
