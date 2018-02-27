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
		$this->command= array_pop( $args );
		$this->options= new OptionPack;
		$this->params= new ParamPack;

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
		return $this->command;
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
		return $this->params;
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
		return $this->options;
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

	/**
	 * Var command
	 *
	 * @access protected
	 *
	 * @var    string
	 */
	protected $command;

	/**
	 * Var params
	 *
	 * @access protected
	 *
	 * @var    ParamPack
	 */
	protected $params;

	/**
	 * Var options
	 *
	 * @access protected
	 *
	 * @var    OptionPack
	 */
	protected $options;

}
