<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(){
     
        //ambil semia data user
        $users = User::all();

        foreach($users as $user){
            //kirimkan email
            Mail::to($user->email)
            ->send(new TestMail( 'Test Email Cobaan','judul','ini adalah isi contentnya'));
            return 'Pesan Telah Terkirim';
        }
        
    }
}
