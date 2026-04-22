<?php

namespace App\Models;

/**
 * Guest User class to use for non-authenticated users
 * This class mimics essential User model properties for email notifications
 */
class GuestUser
{
    public $name;
    public $email;
    public $currency;
    
    /**
     * Create a new guest user instance
     *
     * @param string $name
     * @param string $email
     * @param string $currency
     * @return void
     */
    public function __construct(string $name, string $email, string $currency = '$')
    {
        $this->name = $name;
        $this->email = $email;
        $this->currency = $currency;
    }
}
