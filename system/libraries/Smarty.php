<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 19 Jul 2013
 * Project: maveric
 *
 */

namespace sys\libraries;

/**
 * Include the Smarty Library
 */
//require_once BASEPATH.'thirdparty/smarty3/Smarty.class.php';
require_once ROOT.'includes/smarty/Smarty.class.php';

// Re-Register(prepend) Smarty3-Autoload so it triggers before our own autoload
// spl_autoload_register('smartyAutoload', true, true);

use sys\core\Config;
use sys\core\Exception;
use sys\core\Library;
use \Smarty as BaseSmarty;

class Smarty extends Library
{
	/**
	 * Singleton instance
	 * @var null|Smarty
	 */
	protected static $instance = null;

	/**
	 * Returns the singleton instance for the class
	 * @return Smarty
	 */
	public static function instance()
	{
		if (self::$instance === null)
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * The smarty object
	 * @var null|\Smarty
	 */
	protected $smarty = null;

	function __construct()
	{
		parent::__construct();

		$this->compile_dir = $this->config->item('smarty', 'compile_dir')?:APPPATH.'var/template_c';
		$this->template_dir = $this->config->item('smarty', 'template_dir')?:APPPATH.'views/templates';

		// Test the compiled templates directory, create if necessary
		file_exists($this->compile_dir) OR mkdir($this->compile_dir, DIR_WRITE_MODE, true);

		// Test the template directory
		if ( ! is_dir($this->template_dir))
		{
			Exception::error('Template directory does not exist');
		}

		// Assign some common variable to smarty
		$this->smarty = new BaseSmarty();
		$this->smarty->compile_dir = $this->compile_dir;
		$this->smarty->template_dir = $this->template_dir;
		$this->smarty->assign( 'APPPATH', APPPATH );
		$this->smarty->assign( 'BASEPATH', BASEPATH );

		$this->log->write('debug', "Smarty Class Initialized");
	}

	/**
	 * Renders the smarty template
	 * @param string|array $template Path to smarty templates to render
	 * @param array $data Params to be passed to smarty
	 * @param bool $return If set to true, the output is returned
	 * @return string
	 */
	function view($template, $data = array(), $return = false)
	{
		foreach ($data as $key => $val)
		{
			$this->smarty->assign($key, $val);
		}


		if ( ! is_array($template))
		{
			$template = array($template);
		}

		$out = '';
		foreach ($template as $t)
		{
			$out .= $this->smarty->fetch($t);
		}

		if ($return == false)
		{

			echo $out;
		}
		else
		{
			return $out;
		}
	}
}