<?php

namespace Haziqzahari\ServerSubscription\Exceptions;

use Exception;

class NotSubscribed extends Exception{

    public function __construct()
    {
        $this->message = "User is not subscribed to any plan.";
    }
}