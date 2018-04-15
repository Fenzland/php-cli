<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

class ParamPack implements \Countable, \IteratorAggregate, \ArrayAccess
{
	
	/**
	 * Add a param to the last.
	 *
	 * @access public
	 *
	 * @param  string $param
	 *
	 * @return void
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
	 * @return void
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
	public function count():int
	{
		return count( $this->params );
	}
	
	/**
	 * Get an iterator for foreach.
	 *
	 * @return \ArrayIterator
	 */
	public function getIterator():\ArrayIterator
	{
		return new \ArrayIterator( $this->params );
	}
	
	/**
	 * Method pick
	 *
	 * @access public
	 *
	 * @param  int $i
	 * @param  int $length
	 *
	 * @return mixed
	 */
	public function pick( int$i=0 )
	{
		return (
			$i>=0
			? ($this->params[$i]??null)
			: (array_reverse( $this->params )[-$i]??null)
		);
	}
	
	/**
	 * Method slice
	 *
	 * @access public
	 *
	 * @param  int $start
	 * @param  int $length
	 *
	 * @return static
	 */
	public function slice( int$start=0, ?int$length=null ):self
	{
		return new static( array_slice( $this->params, $start, $length ) );
	}
	
	/**
	 * Method cut
	 *
	 * @access public
	 *
	 * @param  int $offset
	 *
	 * @return array
	 */
	public function cut( int$offset ):array
	{
		return [
			$this->slice( 0, $offset ),
			$this->slice( $offset ),
		];
	}
	
	/**
	 * Method first
	 *
	 * @access public
	 *
	 * @return mixed
	 */
	public function first()
	{
		return $this->pick( 1 );
	}
	
	/**
	 * Method last
	 *
	 * @access public
	 *
	 * @return mixed
	 */
	public function last()
	{
		return $this->pick( -1 );
	}
	
	/**
	 * Method firstOthers
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function firstOthers():array
	{
		return [
			$this->pick( 1 ),
			$this->slice( 1 ),
		];
	}
	
	/**
	 * Method lastOthers
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function lastOthers():array
	{
		return [
			$this->pick( -1 ),
			$this->slice( -1 ),
		];
	}
	
	/**
	 * Check if option exists via array access style.
	 *
	 * @param  mixed $offset
	 *
	 * @return bool
	 */
	public function offsetExists( $offset ):bool
	{
		$this->checkOffset( $offset );
		
		return !is_null( $this->pick( $offset ) );
	}
	
	/**
	 * Get option value via array access style.
	 *
	 * @param  mixed $offset
	 *
	 * @return mixed
	 */
	public function offsetGet( $offset )
	{
		$this->checkOffset( $offset );
		
		return $this->pick( $offset );
	}
	
	/**
	 * Set option value via array access style.
	 *
	 * @param  mixed $offset
	 * @param  mixed $value
	 *
	 * @return void
	 */
	public function offsetSet( $offset, $value ):void
	{
		throw new \Exception( 'ReadOnly' );
	}
	
	/**
	 * Remove option via array access style.
	 *
	 * @param  mixed $offset
	 *
	 * @return void
	 */
	public function offsetUnset( $offset ):void
	{
		throw new \Exception( 'ReadOnly' );
	}
	
	/**
	 * Method checkOffset
	 *
	 * @access private
	 *
	 * @param  mixed $offset
	 *
	 * @return void
	 */
	private function checkOffset( $offset ):void
	{
		if(!( is_int( $offset ) ))
			throw new \Exception( 'Offset of paramPack must be a integer.' );
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
