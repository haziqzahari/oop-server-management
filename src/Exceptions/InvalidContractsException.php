<?php

namespace Haziqzahari\ServerSubscription\Exceptions;

use Exception;

class InvalidContractsException extends Exception{

    public function __construct()
    {
        $this->message = "Invalid Contracts Used on User.";
    }
}