<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// we will use Mail namespace
use Mail;

class MailController extends Controller
{
    // first, we create function for send Basics email
    public function basic_email(){
        $data=['name'=>'jalal badr is a datatype'];
        Mail::send(['text'=>'mail'], $data, function($message){
            $message->to('abdnorsmi@gmail.com','laravel tutorial')->subject('Send Mail from Laravel with Basics Email');
            $message->from('localdevelopment@dev.com','Banour');
        });
        echo 'Basics Email was sent!';
    }

    //create new function to send HTML email
    public function html_email(){
      $data=['name'=>'jalal badr is a datatype'];
      Mail::send(['text'=>'mail'], $data, function($message){
        $message->to('abdnorsmi@gmail.com','laravel tutorial')->subject('Send Mail from Laravel with Basics Email');
        $message->from('localdevelopment@dev.com','Banour');
      });
      echo 'HTML Email was sent!';
    }

    //create new function to send mail with attachment Mail
      public function attachment_email(){
        $data=['name'=>'jalal badr is a datatype'];
        Mail::send(['text'=>'mail'], $data, function($message){
            $message->to('abdnorsmi@gmail.com','laravel tutorial')->subject('Send Mail from Laravel with Basics Email');
            // add attach here
            // i have a image file on Laravel project
            $message->attach('C:serverhtdocshckrcompublicuploadsharison.jpg');
            $message->attach('C:serverhtdocshckrcompublicuploadssector-code.jpg');
            $message->from('localdevelopment@dev.com','Banour');
        });
        echo 'HTML Email was sent!';
      }
}
