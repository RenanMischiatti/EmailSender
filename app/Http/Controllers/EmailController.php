<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class EmailController extends Controller
{
    public function index() {
        return view('welcome');
    }
    public function send(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'mensagem' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'mensagem' => $request->mensagem
        ];

        Mail::to( config('mail.from.address') )->send( new SendMail($data));

        return back()->with('success', 'Sucesso');
    }
}
