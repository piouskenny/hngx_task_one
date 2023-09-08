<?php
require "vendor/autoload.php";

use App\Controller\MessageController;
use Classes\Router;


$message = new MessageController;


$router = new Router;


$router->get('/', function(){
    return var_dump("Welcome to my first hngx, go to this same route /api?slack_name=example_name&track=backend");
});
$router->get('/api', [new MessageController, 'index']);