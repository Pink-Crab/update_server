<?php

declare(strict_types=1);

namespace PinkCrab\Update_Server\Lib\View;

use eftec\bladeone\BladeOne;

// class called View with BladeOne as a dependency
class View {

	private $blade;

	public function __construct( string $viewPath, string $cachePath, int $mode = BladeOne::MODE_AUTO ) {
		$this->blade = new BladeOne( $viewPath, $cachePath, $mode );
	}

	public function render( $template, $data = array() ) {
		return $this->blade->run( $template, $data );
	}
}
