<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

class ParamPack
{

	/**
	 * Add a param to the last.
	 *
	 * @access public
	 *
	 * @param  string $param
	 *
	 * @return viod
	 */
	public function append( string$param ):void
	{
		$this->params[]= $param;
	}

	/**
	 * Add a param to the first.
	 *
	 * @access public
	 *
	 * @param  string $param
	 *
	 * @return viod
	 */
	public function prepend( string$param ):void
	{
		array_unshift( $this->params, $param );
	}

	/**
	 * Remove a param from the last and return it.
	 *
	 * @access public
	 *
	 * @return string
	 */
	public function pop():string
	{
		return array_pop( $this->params );
	}

	/**
	 * Remove a param from the first and return it.
	 *
	 * @access public
	 *
	 * @return string
	 */
	public function poll():string
	{
		return array_shift( $this->params );
	}

	/**
	 * Constructor
	 *
	 * @access public
	 *
	 * @param  array $params
	 */
	public function __construct( array$params=[] )
	{
		$this->params= $params;
	}

	/**
	 * Params.
	 *
	 * @access protected
	 *
	 * @var    array
	 */
	protected $params;

}
