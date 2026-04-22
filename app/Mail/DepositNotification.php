<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Deposit;
use App\Models\User;

class DepositNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $deposit;
    public $user;
    public $isAdmin;

    /**
     * Create a new message instance.
     *
     * @param Deposit $deposit
     * @param User|object $user
     * @param bool $isAdmin
     * @return void
     */
    public function __construct(Deposit $deposit, $user, bool $isAdmin)
    {
        $this->deposit = $deposit;
        $this->user = $user;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->isAdmin) {
            return $this->subject('New Deposit Request')
                      ->view('emails.admin-deposit-notification');
        } else {
            return $this->subject('Deposit Submitted Successfully')
                      ->view('emails.user-deposit-notification');
        }
    }
}
