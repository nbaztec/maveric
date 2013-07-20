<?php
namespace app\models;
use sys\core\Model;

class Test extends Model
{
	public function get_data()
	{
		return array(
			'dummy',
			'data'
		);
	}
}