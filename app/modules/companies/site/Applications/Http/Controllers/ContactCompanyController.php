<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use URL;

class ContactCompanyController extends BaseController
{
 
    
    public function sendMail(Request $request)
    {

        if( ! $request->ajax() ) {
            return false;
        }
    
        Mail::send('email.notifications.full.contact-company', $request->all(), function ($message) use ($request){
            $message->from( Config::get('mail.from.address') )
                ->to( base64_decode( $request->input('address_send') ) )
                ->replyTo($request->input('email'), $request->input('name'))
                ->subject('Contato através do site GuiaLocaliza.com.br');
        });
        
    }

}
