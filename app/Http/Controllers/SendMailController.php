<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function index(){
        return  view('email.kirim-email');
    }

    public function store(Request $request){
        $data = $request -> all();
        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')->with('success', 'email berhasil terkirim');
    }
}
