<?php
namespace app\controllers
{
	use app\core\Controller;
	use app\helpers\Alert;
	use app\helpers\Url;

	class Index extends Controller
	{
		public function __construct()
		{
			parent::__construct();

			// Update config settings
			$this->config->set_item(array('view', 'wrap'), true);
			$this->config->set_item(array('view', 'header'), 'main/header.php');
			$this->config->set_item(array('view', 'footer'), 'main/footer.php');

			// Re-init
			$this->_init();
		}

		public function get()
		{
			$this->_display->view('main/index.php', array(
				'message' => 'Hello, world!',
				'description' => 'This is a simple Maveric test.',
				'topics' => array(
					'Heading #1' => 'Uno donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'Heading #2' => 'Dos donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'Heading #3' => 'Tres donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.'
				)
			));
		}

		public function post()
		{
			Alert::once('error', 'Invalid', Url::current());
		}
	}
}