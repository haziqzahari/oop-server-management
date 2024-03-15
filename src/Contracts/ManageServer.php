<?php

namespace Haziqzahari\ServerSubscription\Contracts;

use Haziqzahari\ServerSubscription\Server\Server;

interface ManageServer {

    public function connectServer(Server $server);
    
}