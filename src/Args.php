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

		foreach( $args as $arg )
		{
			switch( strcmplen( '--', $arg ) )
			{
				case 1:{
					$this->addShortOption( substr( $arg, 1 ) );
				}break;

				case 2:{
					$this->addOption( substr( $arg, 2 ) );
				}break;

				default:{
					$this->addParam( $arg );
				}break;
			}
		}
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
		$sub= clone $this;

		$sub->command= $sub->params->poll()??'';

		return $sub;
	}

	/**
	 * Method __clone
	 *
	 * @access public
	 */
	public function __clone()
	{
		$this->options= clone $this->options;
		$this->params= clone $this->params;
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

	/**
	 * Method addShortOption
	 *
	 * @access private
	 *
	 * @param  string $option
	 *
	 * @return viod
	 */
	private function addShortOption( string$option )
	{
		$this->options->set( $option, $option );
	}

	/**
	 * Method addOption
	 *
	 * @access private
	 *
	 * @param  string $option
	 *
	 * @return viod
	 */
	private function addOption( string$option )
	{
		if( strpos( $option, '=' ) )
			$this->options->set( strtok( $option, '=' ), strtok( '' ) );
		else
			$this->options->set( $option, $option );
	}

	/**
	 * Method addParam
	 *
	 * @access private
	 *
	 * @param  string $param
	 *
	 * @return viod
	 */
	private function addParam( string$param )
	{
		$this->options->append( $param );
	}

}
