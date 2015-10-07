<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 29 Jul 2013
 * Project: maveric
 *
 */
namespace app\models
{
	use app\core\Model;

	class User extends Model
	{
		const CLC_USERS = 'users';

		public function install()
		{
			$this->_db->selectCollection(self::CLC_USERS)->ensureIndex(array(
				'user_id' => 1,
				'date' => 1,
			), array(
				'unique' => true
			));
		}

		public function get($id, $date)
		{
			return $this->_db->selectCollection(self::CLC_USERS)->findOne(array(
				'user_id' => $id,
				'date' => $date
			));
		}

		public function insert($id, $date, $data)
		{
			$data['user_id'] = $id;
			$data['date'] = $date;
			$this->_raise_err($this->_db->selectCollection(self::CLC_USERS)->insert($data));
			return $data['_id'];
		}
	}
}