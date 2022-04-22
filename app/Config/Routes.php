<?php

declare(strict_types=1);

namespace PinkCrab\Update_Server\App\Config;

use Slim\App;
use PinkCrab\Update_Server\App\Route\AuthController;
use PinkCrab\Update_Server\App\Route\HomeController;

class Routes {

	/**
	 * Adds a route to the Slim app.
	 *
	 * @param \Slim\App $app
	 * @return \Slim\App
	 */
	public static function add( App $app ): App {
		$app->get( '/', array( HomeController::class, 'index' ) );
		return $app;
	}
}
