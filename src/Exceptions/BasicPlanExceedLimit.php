<?php

namespace Haziqzahari\ServerSubscription\Exceptions;

use Exception;

class BasicPlanExceedLimit extends Exception{

    public function __construct()
    {
        $this->message = "User is not subscribed to Pro Plan. Server connection is limited to 1 server only.";
    }
}