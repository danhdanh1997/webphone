<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $username;
    public $phones;
    public $mes;
    public function __construct($name,$phone,$add)
    {
        $this->username=$name;
        $this->phones=$phone;
        $this->mes=$add;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $names=  $this->username;
        $phons=$this->phones;
        $mess=$this->mes;
        return $this->view('frontend.email',compact('mess'))->subject($names,$phons);
    }
}
