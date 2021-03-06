<?php # -*- coding: utf-8 -*-

namespace wallstreetonline\stockquotes\Service;

use wallstreetonline\stockquotes\Widegts;

/**
 * Register widget
 *
 * @package wallstreetonline\stockquotes\Widgets
 */
class RegisterWidgets {

	private $widgets;

	function __construct( $widgets ){

		$this->widgets = $widgets;

		$this->register();

	}

	/**
	 * Register widgets by namespace
	 */
	private function register(){

		foreach( $this->widgets as $widget ){

			$widget_class = str_replace( 'Service', 'Widgets', __NAMESPACE__ ). "\\" . $widget;

			if( class_exists( $widget_class ) ) {
				register_widget( $widget_class );
			}

		}

	}

}