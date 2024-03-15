<?php

namespace Haziqzahari\ServerSubscription\Contracts;

use Haziqzahari\ServerSubscription\PlanSubscription\Plan;

interface UseSubscription {

    public function subscribe(Plan $plan);
    public function unsubscribe();
    
}