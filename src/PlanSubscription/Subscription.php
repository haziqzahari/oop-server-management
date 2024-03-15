<?php 

namespace Haziqzahari\ServerSubscription\PlanSubscription;

class Subscription {

    private array $subscriptionItem;

    public function __construct(){}

    public function getSubscription()
    {
        return $this->subscriptionItem;
    }

    public function addSubscription(Plan $plan)
    {
        $this->subscriptionItem[] = new SubscriptionItem($plan);
    }

    public function unsubscribe()
    {
        $this->subscriptionItem = [];
    }
}