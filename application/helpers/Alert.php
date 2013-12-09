<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 18 Jul 2013
 * Project: maveric
 *
 */

namespace app\helpers;
use sys\core\Controller;
use app\helpers\Url;

/**
 * Helper for URL generation and redirections
 * Class CCPAlert
 * @package sys\helpers
 */
class CCPAlert
{
	public static function get()
	{
		$v = Controller::instance()->input->session('ccp_alert');
		Controller::instance()->input->unset_session('ccp_alert');
		return $v;
	}

	public static function get_rendered()
	{
		$r = array(
			'type'		=> '',
			'heading'	=> '',
			'text'		=> '',
		);
		if ($v = self::get())
		{
			$r = $v;
			switch($r['type'])
			{
				case 'error':
					$r['heading'] = 'Error';
					break;
				case 'warn':
					$r['heading'] = 'Warning';
					break;
				case 'info':
					$r['heading'] = 'Information';
					break;
				case 'success':
					$r['heading'] = 'Success';
					break;
			}
		}
		return $r;
	}

	public static function info($msg, $redirect='')
	{
		Controller::instance()->input->set_session('ccp_alert', array(
			'text' => $msg,
			'type' => 'info'
		));
		if ( ! empty($redirect))
		{
			Url::redirect_billing($redirect);
		}
	}

	public static function success($msg, $redirect='')
	{
		Controller::instance()->input->set_session('ccp_alert', array(
			'text' => $msg,
			'type' => 'success'
		));
		if ( ! empty($redirect))
		{
			Url::redirect_billing($redirect);
		}
	}

	public static function error($msg, $redirect='')
	{
		Controller::instance()->input->set_session('ccp_alert', array(
			'text' => $msg,
			'type' => 'error'
		));
		if ( ! empty($redirect))
		{
			Url::redirect_billing($redirect);
		}
	}

	public static function warning($msg, $redirect='')
	{
		Controller::instance()->input->set_session('ccp_alert', array(
			'text' => $msg,
			'type' => 'warn'
		));
		if ( ! empty($redirect))
		{
			Url::redirect_billing($redirect);
		}
	}
}