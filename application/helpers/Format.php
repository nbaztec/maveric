<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 29 Jul 2013
 * Project: maveric
 *
 */
namespace app\helpers;

class Format
{
	public static function capacity($val, $round=0)
	{
		$units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$i=0;
		for (;$val > 1024 && $i < count($units); $i++, $val/=1024);
		return round($val, $round).' '.$units[$i];
	}
}