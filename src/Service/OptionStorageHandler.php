<?php # -*- coding: utf-8 -*-

namespace wallstreetonline\stockquotes\Service;

/**
 * Handel data
 * Save data to the option table and get data from there
 *
 * @package wallstreetonline\stockquotes\Service
 */
class OptionStorageHandler {

	/**
	 * The option name where is used in wordpress to store
	 * data in the database
	 *
	 * @var string
	 */
	public $option_name = FALSE;


	public function __construct( $option_name ){

		$this->option_name = $option_name;

	}

	/**
	 * Update data for an option
	 *
	 * @param $data
	 *
	 * @return bool
	 */
	public function update( $data ) {

		if( ! is_wp_error( $data ) ){

			return update_option( $this->option_name, $data );

		}

	}

	/**
	 * Get data from an option storage
	 *
	 * @return mixed|void
	 */
	public function get(){

		$data = get_option( $this->option_name );

		if( ! is_wp_error( $data ) && ! empty( $data ) ) {

			return get_option( $this->option_name );

		}else{

			$this->delete();
		}

		$data = new \stdClass();
		$data->error = 'no data';

		return $data;

	}

	/**
	 * Delete data from the options table
	 *
	 * @return bool
	 */
	public function delete(){

		return delete_option( $this->option_name );

	}

}

