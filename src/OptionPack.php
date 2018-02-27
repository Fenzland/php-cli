<?php

declare( strict_types= 1 );

namespace Fenzland\CLI;

////////////////////////////////////////////////////////////////

class OptionPack implements \Countable
{

	/**
	 * Count options.
	 *
	 * @return int
	 */
	public function count()
	{
		return count( $this->options );
	}

	/**
	 * Check if option exists.
	 *
	 * @param  string $option
	 *
	 * @return bool
	 */
	public function exists( string$option ):bool
	{
		return isset( $this->options[$option] );
	}

	/**
	 * Get option value.
	 *
	 * @param  string ...$options
	 *
	 * @return mixed
	 */
	public function get( string...$options )
	{
		foreach( $options as $option )
			if( $this->exists( $option ) )
				return $this->options[$option];

		return null;
	}

	/**
	 * Set option value.
	 *
	 * @param  string $option
	 * @param  mixed $value
	 *
	 * @return void
	 */
	public function set( string$option, $value ):void
	{
		$this->options[$option]= $value;
	}

	/**
	 * Remove option.
	 *
	 * @param  string $option
	 *
	 * @return void
	 */
	public function remove( string$option ):void
	{
		if( $this->exists( $option ) )
		{
			unset( $this->options[$option] );
		}
	}

	/**
	 * Options.
	 *
	 * @access protected
	 *
	 * @var    array
	 */
	protected $options= [];

}
