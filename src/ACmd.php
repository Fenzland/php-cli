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

		return $this->main( $args );
	}

}
