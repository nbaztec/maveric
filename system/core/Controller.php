<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 17 Jul 2013
 * Project: maveric
 *
 */

namespace sys\core;

class Controller
{
	/**
	 * Singleton isntance
	 * @var null|Controller
	 */
	protected static $instance = null;

	/**
	 * Returns the singleton instance for the controller
	 * @return Controller
	 */
	public static function instance()
	{
		if (self::$instance === null)
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct()
	{
		self::$instance = $this;
		$this->input = new Input();
		$this->config = Config::instance();
		$this->log = Log::instance();
		$this->log->write('debug', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

}