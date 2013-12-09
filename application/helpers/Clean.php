<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 29 Jul 2013
 * Project: maveric
 *
 */
namespace app\helpers;

class Clean
{
	public static function domain(&$str)
	{
		if (preg_match('!^(?:(?:http://www\.)|(?:http://))?([^/]+)!', $str, $m))
		{
			$str = $m[1];
			return true;
		}
		return false;
	}
}