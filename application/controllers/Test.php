<?php
namespace app\controllers;
use sys\core\Controller;
use app\models\Test as TestModel;
use app\helpers\Url;
use sys\libraries\Smarty;

class Test extends Controller
{
	public function index()
	{
		echo 'This method fires when either a valid get/post method is not present';
	}

	public function post()
	{
		echo 'Post Data:', PHP_EOL;
		var_dump($this->input->post());
	}

	public function get()
	{
		$this->tm = new TestModel();
		$dummy = $this->_process($this->tm->get_data());

		$this->smarty = Smarty::instance();
		$this->smarty->view(array('common/header.tpl', 'body.tpl', 'common/footer.tpl'), array(
			'url'	=> new Url(),
			'title' => 'Test Page',
			'data'	=> array(
				'Foo' 	=> 'Bar',
				'Apple' => 'Oranges',
			),
			'dummy' => $dummy,
		));

	}

	protected function _process($data)
	{
		return implode(' ', $data);
	}
}