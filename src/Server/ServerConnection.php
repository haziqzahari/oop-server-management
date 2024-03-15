<?php

namespace Haziqzahari\ServerSubscription\Server;

use Exception;
use Haziqzahari\ServerSubscription\Exceptions\BasicPlanExceedLimit;
use Haziqzahari\ServerSubscription\Exceptions\NotSubscribed;
use Haziqzahari\ServerSubscription\PlanSubscription\BasicPlan;
use Haziqzahari\ServerSubscription\PlanSubscription\Subscription;

class ServerConnection {

    public array $connections;

    public function __construct(){
        $this->connections = [];
    }

    public function connect(Server $server, Subscription $subscription) 
    {
        if(count($subscription->getSubscription()) == 0)
        {
            throw new NotSubscribed();
        };

        array_map(function($subs){

            // var_dump((count($this->connections) > 1));

            if($subs->getPlan() instanceof BasicPlan && count($this->connections) > 0)
            {
                throw new BasicPlanExceedLimit();
            }
         }, $subscription->getSubscription());
        
        $this->connections[] = $server;
    }

    public function disconnect()
    {
        $this->connections = [];
    }


}