<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

class Args implements IArgs
{

	/**
	 * Constructor
	 *
	 * @access public
	 *
	 * @param  array $args
	 */
	public function __construct( array$args )
	{
		$this->args= $args;
	}

	/**
	 * Method getCommand
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return string
	 */
	public function getCommand():string
	{
		#
	}

	/**
	 * Method getParams
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return ParamPack
	 */
	public function getParams():ParamPack
	{
		#
	}

	/**
	 * Method getOptions
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return OptionPack
	 */
	public function getOptions():OptionPack
	{
		#
	}

	/**
	 * Method getRaw
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function getRaw():array
	{
		return $this->args;
	}

	/**
	 * Method sub
	 *
	 * @access public
	 *
	 * @return static
	 */
	public function sub():IArgs
	{
		#
	}

	/**
	 * Var args
	 *
	 * @access protected
	 *
	 * @var    array
	 */
	protected $args;

}
