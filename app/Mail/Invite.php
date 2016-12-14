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

    public $test;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($test)
    {
        $this->test = $test;
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
