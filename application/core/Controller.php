<?php
namespace app\core
{
	use app\helpers\Alert;
	use app\helpers\Url;
	use sys\libraries\Display;
	use sys\core\Controller as BaseController;

	class Controller extends BaseController
	{
		/**
		 * @var Display
		 */
		protected $_display;

		protected $_session = null;

		public function __construct()
		{
			parent::__construct();
			$this->_init();
		}

		protected function _init()
		{
			$this->_display = new Display();
			// Attach a meta objects, available as $Input & $Url
			$this->_display->attach('Input', $this->input, true);
			$this->_display->attach('Url', new Url(), true);
			$this->_display->attach('Alert', new Alert(), true);
			// Attach regular data available as $data['_meta']
			$this->_display->attach('_meta', array(
				'back-url' => $this->input->server('HTTP_REFERER'),
				'current-url' => Url::current()
			));
		}
	}
}