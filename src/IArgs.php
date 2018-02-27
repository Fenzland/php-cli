<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

interface IArgs
{

	/**
	 * Method getCommand
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return string
	 */
	function getCommand():string;

	/**
	 * Method getParams
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return ParamPack
	 */
	function getParams():ParamPack;

	/**
	 * Method getOptions
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return OptionPack
	 */
	function getOptions():OptionPack;

	/**
	 * Method getOptions
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return array
	 */
	function getRaw():array;

	/**
	 * Method getOptions
	 *
	 * @abstract
	 *
	 * @access public
	 *
	 * @return IArgs
	 */
	function sub():IArgs;

}
