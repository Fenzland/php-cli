<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

class ParamPack implements \Countable, \IteratorAggregate
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
	 * Count params.
	 *
	 * @return int
	 */
	public function count()
	{
		return count( $this->params );
	}

	/**
	 * Get an iterator for foreach.
	 *
	 * @return \ArrayIterator
	 */
	public function getIterator()
	{
		return new \ArrayIterator( $this->params );
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
