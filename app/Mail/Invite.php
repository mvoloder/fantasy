<?php

namespace App\Mail;

use App\League;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invite extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $pass)
    {
        $this->id = $id;
        $this->pass  = $pass;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from('fantasy@laravel.biz')
            ->view('mailcontent');
    }
}
