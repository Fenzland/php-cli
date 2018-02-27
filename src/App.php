<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

class App
{

	/**
	 * Run the application with raw arguments.
	 *
	 * @access public
	 *
	 * @param  IArgs|array $args
	 *
	 * @return int
	 */
	public function run( $args ):int
	{
		$args instanceof IArgs or $args= new Args( $args );

		return $this->execute( $args->sub() );
	}

	/**
	 * Run the application with structured arguments.
	 *
	 * @access protected
	 *
	 * @param  IArgs $args
	 *
	 * @return int
	 */
	protected function execute( IArgs$args ):int
	{
		$command= $args->getCommand();

		if(!( isset( $this->commands[$command] ) ))
		{
			return $this->commandNotFound( $command, $args );
		}

		return $this->commands[$command]::execute( $args );
	}

	/**
	 * Commands
	 *
	 * @access protected
	 *
	 * @var    array
	 */
	protected $commands= [];

	/**
	 * Render command not found error.
	 *
	 * @access protected
	 *
	 * @param  string $command
	 * @param  IArgs $args
	 *
	 * @return int
	 */
	protected function commandNotFound( string$command, IArgs$args ):int
	{
		echo "command $command not found";

		return 1;
	}

}
