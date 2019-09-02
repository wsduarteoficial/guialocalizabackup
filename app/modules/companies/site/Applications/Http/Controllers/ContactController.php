<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use SEOMeta;
use URL;

class ContactController extends BaseController
{

    public function viewPage(Request $request)
    {

        SEOMeta::setTitle('Fale Conosco: Entre em Contato - GuiaLocaliza.com.br');
        SEOMeta::setDescription( 'Precisa entrar em contato com o Guia Localiza? Nesta página você tem acesso direto com a empresa! Entre em contato conosco.' );
        SEOMeta::setCanonical( URL::current() );

        return $this->view('companies.modules.contact.index');

    }
    
    public function sendMail(Request $request)
    {

        if( ! $request->ajax() ) {
            return false;
        }
     
        $data = [
            'subject' => $request->input('subject'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message_subject' => $request->input('message'),
        ];      

        $send = Mail::send('email.notifications.full.contact', $data, function ($message) use ($request){
            $message->from( Config::get('mail.from.address') )
                ->to( Config::get('mail.from.address') )
                ->replyTo($request->input('email'), $request->input('name'))
                ->subject('Contato no Site - GuiaLocaliza.com.br');
        });
        
    }

}
