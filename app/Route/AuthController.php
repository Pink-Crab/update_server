<?php

namespace PinkCrab\Update_Server\App\Route;

use PinkCrab\Update_Server\Lib\View\View;

class AuthController {

	private View $view;

	public function __construct( View $view ) {
		$this->view = $view;
	}

	/**
	 * Action for the login page.
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param array $args
	 * @return void
	 */
	public function login( $request, $response, $args = array() ) {
		dump($request, $response, $args);
        $html = $this->view->render( 'home.index' );
		$response->getBody()->write( $html );
		return $response;
	}

	// public function index( $request, $response ) {
	// 	// $this->userRepository->remove($request->getAttribute('id'));

	// 	$response->getBody()->write( 'User deleted' );
	// 	return $response;
	// }
}
