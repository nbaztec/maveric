<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 17 Jul 2013
 * Project: maveric
 *
 */

namespace sys\core;
use sys\libraries\database\sql\MySqli;

class Database
{
	/**
	 * @var null|Config
	 */
	protected static $_config = null;

	/**
	 * Get a config item
	 * @param $item
	 * @return mixed
	 */
	protected static function _config($item)
	{
		if (self::$_config === null)
		{
			self::$_config = Config::instance();
		}
		$args = func_get_args();
		return call_user_func_array(array(self::$_config, 'item'), $args);
	}

	/**
	 * @param null $type
	 * @param null $config
	 * @return null|MySqli
	 */
	public static function instance($type=null, $config=null)
	{
		if ($type === null)
		{
			$type = self::_config('default_db_driver');
		}

		if ($config === null)
		{
			$config = self::_config(self::_config('default_db'));
		}

		switch($type)
		{
			case 'mysqli':
				return self::_get_mysqli($config);
		}

		return null;
	}

	protected static function _get_mysqli($config)
	{
		return new MySqli($config);
	}
}