<?php

declare(strict_types=1);

namespace PinkCrab\Update_Server\App\Config;

use Slim\App;
use DI\Container;
use Slim\Middleware\ErrorMiddleware;
use PinkCrab\Update_Server\Lib\View\View;
use Tuupola\Middleware\HttpBasicAuthentication;

class Middleware {

	private Container $container;

	public function __construct( Container $container ) {
		$this->container = $container;
	}

	/**
	 * Adds a route to the Slim app.
	 *
	 * @param \Slim\App $app
	 * @return \Slim\App
	 */
	public function define( App $app ): App {

		// Add error middleware to the app.
		$errorMiddleware = new ErrorMiddleware(
			$app->getCallableResolver(),
			$app->getResponseFactory(),
			true,
			true,
			true
		);
		$app->add( $errorMiddleware );

		// Add basic authentication.
		$app->add(
			new HttpBasicAuthentication(
				array(
					'path'   => array( '/admin', '/login' ),
					'realm'  => 'Protected',
					'users'  => array(
						'glynn'    => 'eSbpAthF5P7PXuyq',
						'protrade' => 'sJGc9X9FcARy87qF',
					),
					'before' => function ( $request, $arguments ) {
						return $request->withAttribute( 'user', $arguments['user'] );
					},
					'error'  => function ( $response, $arguments ) {
						$html = $this->container->make( View::class )->render(
							'auth.unauthorised',
							array(
								'message' => $arguments['message'],
								'status'  => $arguments['status'] ?? 'ERROR',
							)
						);

						$body = $response->getBody();
						$body->write( $html );

						return $response->withStatus( 401 )->withBody( $body );
					},
				)
			)
		);

		return $app;
	}
}
