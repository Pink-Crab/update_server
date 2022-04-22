<?php

namespace PinkCrab\Update_Server\App\Route;

use PinkCrab\Update_Server\Lib\View\View;

class HomeController {

	private View $view;

	public function __construct( View $view ) {
		$this->view = $view;
	}

	/**
	 * The index route.
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param array $args
	 * @return void
	 */
	public function index( $request, $response, $args = array() ) {
		$html = $this->view->render( 'pages.home' );
		$response->getBody()->write( $html );
		return $response;
	}


}
