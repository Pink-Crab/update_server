<?php

declare(strict_types=1);

namespace PinkCrab\Update_Server\App\Config;

use DI\Container;
use eftec\bladeone\BladeOne;
use DI\Definition\FactoryDefinition;
use PinkCrab\Update_Server\Lib\View\View;

class Dependencies {

	/**
	 * Gets all Dependencies
	 *
	 * @return Container
	 */
	public static function get(): Container {
		return ( new self() )->registerServices();
	}

	/**
	 * Registers all dependencies to the container.
	 *
	 * @return Container
	 */
	private function registerServices(): Container {
		$container = new Container();

		// view
		$container->set(
			View::class,
			function( Container $container ): View {
				return new View(
					dirname( __DIR__, 2 ) . '/public/view',
					dirname( __DIR__, 2 ) . '/temp/cache',
					BladeOne::MODE_DEBUG
				);
			}
		);

		return $container;
	}
}
