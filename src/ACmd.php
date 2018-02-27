<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

abstract class ACmd
{

	/**
	 * Method run
	 *
	 * @abstract
	 * @access protected
	 *
	 * @param  IArgs $args
	 *
	 * @return int
	 * @throws \Throwable
	 */
	abstract protected function main( IArgs$args ):int;

	/**
	 * Method catch
	 *
	 * @overridable
	 * @access public
	 *
	 * @param  \Throwable $e
	 *
	 * @return int
	 */
	public function catch( \Throwable$e ):int
	{
		return 1;
	}

	/**
	 * Constructor
	 *
	 * @access public
	 *
	 * @param  IArgs|array $args
	 * @return int
	 */
	public function run( $args ):int
	{
		$args instanceof IArgs or $args= new Args( $args );

		try{
			return $this->main( $args );
		}
		catch( \Throwable$e )
		{
			return $this->catch( $e );
		}
	}

}
