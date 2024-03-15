<?php 

namespace Haziqzahari\ServerSubscription\PlanSubscription;

use Haziqzahari\ServerSubscription\Server\Server;
use Haziqzahari\ServerSubscription\User\User;

class SubscriptionItem {

    private Plan $plan;

    public function __construct(Plan $plan){
        $this->plan = $plan;
    }

    public function setPlan(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function getPlan()
    {
        return $this->plan;
    }

}