<?php

use Slim\Factory\AppFactory;
use PinkCrab\Update_Server\Lib\View\View;
use PinkCrab\Update_Server\App\Config\Routes;
use PinkCrab\Update_Server\App\Config\Middleware;
use PinkCrab\Update_Server\App\Config\Dependencies;

require '../vendor/autoload.php';

$container = Dependencies::get();
AppFactory::setContainer( $container );
$app = AppFactory::create();

// Define all routes.
Routes::add( $app );

// Define all middleware.
$container->make( Middleware::class )->define( $app );

// Boot
$app->run();
