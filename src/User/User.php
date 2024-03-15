<?php

namespace Haziqzahari\ServerSubscription\User;

use Haziqzahari\ServerSubscription\Contracts\ManageServer;
use Haziqzahari\ServerSubscription\Contracts\UseSubscription;
use Haziqzahari\ServerSubscription\Exceptions\InvalidContractsException;
use Haziqzahari\ServerSubscription\PlanSubscription\Plan;
use Haziqzahari\ServerSubscription\PlanSubscription\Subscription;
use Haziqzahari\ServerSubscription\PlanSubscription\SubscriptionItem;
use Haziqzahari\ServerSubscription\Server\Server;
use Haziqzahari\ServerSubscription\Server\ServerConnection;

class User implements ManageServer, UseSubscription
{

    public string $name;

    private Subscription|null $subscription;
    private ServerConnection|null $connections;

    public function __construct()
    {
        $this->subscription = new Subscription();
        $this->connections = new ServerConnection();
    }


    public function connectServer(Server $server)
    {
        if (!($this instanceof ManageServer)) {
            throw new InvalidContractsException();
        }


        $this->connections->connect($server, $this->subscription);
    }

    public function subscribe(Plan $plan)
    {

        if (!($this instanceof UseSubscription)) {
            throw new InvalidContractsException();
        }

        if (is_null($this->subscription)) {
            $this->subscription = new Subscription(
                new SubscriptionItem($plan)
            );

            return;
        }

        $this->subscription->addSubscription($plan);
    }

    public function unsubscribe()
    {

        if (!($this instanceof UseSubscription)) {
            throw new InvalidContractsException();
        }

        $this->subscription->unsubscribe();
        $this->connections->disconnect();
    }
}
