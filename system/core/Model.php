<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 17 Jul 2013
 * Project: maveric
 *
 */

namespace sys\core;

/**
 * Class Model
 * @package sys\core
 */
class Model
{
	public function __construct()
	{
		$this->input = new Input();
		$this->config = Config::instance();
		$this->log = Log::instance();
		$this->log->write('debug', 'Model Class Initialized');
	}
}