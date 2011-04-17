<?php
/* $Id$ */

// system settings
error_reporting(E_ALL | E_STRICT);

setlocale(LC_CTYPE, "ru_RU.UTF8");
setlocale(LC_TIME, "ru_RU.UTF8");

// Xdebug settings @see phpinfo()
ini_set('display_errors', 1);
ini_set('xdebug.show_local_vars', 'on');
ini_set('xdebug.dump_globals', 'on');
ini_set('xdebug.dump.GET', '*');
ini_set('xdebug.collect_params', 'on');
ini_set('xdebug.var_display_max_depth', 8);
ini_set('xdebug.var_display_max_data', 4096);
date_default_timezone_set('Europe/Moscow');

// paths
define('PATH_WEB', 'http://adminka.test/');

define('COOKIE_HOST_NAME', 'adminka.test');

// onPHP
require PATH_EXTERNALS.'onPHP/global.inc.php.tpl';
require 'config.auto.inc.php';

// magic_quotes_gpc must be off

define('__LOCAL_DEBUG__', true);
spl_autoload_register('__autoload');

// db settings

DBPool::me()->addLink(
	'fb',
	DB::spawn('PgSQL', 'dbuser', 'dbpass', 'dbhost', 'dbname')
);

/**
 * session in memcache
**/
//define('SESSION_IN_MEMCACHED', '');
//	define('SESSION_IN_MEMCACHED_HOST', '192.168.10.30');
//	define('SESSION_IN_MEMCACHED_PORT', 11211);

//	if (defined('SESSION_IN_MEMCACHED')) {
//		ini_set('session.save_handler', 'memcache');
//		ini_set('session.save_path', 'tcp://'.SESSION_IN_MEMCACHED_HOST.':'.SESSION_IN_MEMCACHED_PORT.'?persistent=1');
//	}
?>