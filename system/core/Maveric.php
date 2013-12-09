<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 17 Jul 2013
 * Project: maveric
 *
 */

namespace sys\core;

// Load all the necesary files
require APPPATH.'config/constants.php';
require BASEPATH.'core/Exception.php';
require BASEPATH.'core/Loader.php';

/**
 * Custom Includes
 */

// Maveric version
define('MVC_VERSION', '1.0');

// Create path from URI
$uri = $_SERVER['REQUEST_URI'];
if (strncmp($uri, '/', 1) === 0)
{
	$uri = explode('?', $uri, 2);
	$_SERVER['QUERY_STRING'] = isset($uri[1]) ? $uri[1] : '';
	$uri = rawurldecode($uri[0]);
}
else
{
	die('Awkward path mate.');
}

// Re-assign $_GET array
parse_str($_SERVER['QUERY_STRING'], $_GET);

// Get the requested controller. Assign the default controller
// from the config file if no controller is requested.
$rel_uri = ltrim(substr($uri, strlen($_SERVER['SCRIPT_NAME']) - strlen('/index.php')), '/');
if (empty($rel_uri))
{
	$rel_uri = trim(Config::instance()->item('site', 'default_controller'));
	if( ! $rel_uri)
		die('No controller specified');
}

// Convert the path to lowercase for namespaces
$path = explode('/', $rel_uri);
foreach ($path as &$elem)
{
	$elem = strtolower($elem);
}
// Capitalize the last item (class name) and strip the extension
$ridx = count($path) - 1;
$path[$ridx] = str_replace('-', '_', trim(ucwords(substr($path[$ridx], 0, -4))));
if ( ! $path[$ridx] )
{
	die('Bad controller: '.$path[$ridx]);
}
// Prepend the necessary namespace part
$class = 'app\\controllers\\'.implode('\\', $path);

// Include the class
eval('use '.$class.';');

// Create instance
$MVC = new $class();

// Assign a valid method depending upon the REQUEST_METHOD
// If no get() or post() is defined, then index() is called
$method = 'index';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_callable(array($class, 'post')))
{
	$method = 'post';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && is_callable(array($class, 'get')))
{
	$method = 'get';
}
elseif ( ! is_callable(array($class, 'index')))
{
	Exception::error('No method defined to handle request');
}

// And we have lift off...
if ($MVC->dispatch_request())
{
	$MVC->$method();
}
