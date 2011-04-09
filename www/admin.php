<?php
require dirname(dirname(__FILE__)).'/conf/constants.auto.inc.php';
require PATH_BASE.'conf/config.inc.php';ini_set(
	'include_path',
	get_include_path()
	.PATH_CONTROLLERS_ADMIN.PATH_SEPARATOR
);

define('PATH_WEB_URL', PATH_WEB.'admin.php?');
define('PATH_WEB_CSS', PATH_WEB.'css/');
define('PATH_WEB_IMG', PATH_WEB.'img/');
define('PATH_WEB_JS', PATH_WEB.'js/');

try {
	$application = WebApplication::create()->
		setPathWeb(PATH_WEB)->
		setPathController(PATH_CONTROLLERS_ADMIN)->
		setPathTemplate(PATH_TEMPLATES_ADMIN)->
		setServiceLocator(ServiceLocator::create())->
		add(WebAppBufferHandler::create())->
		add(
			WebAppSessionHandler::create()->
				setCookieDomain(COOKIE_HOST_NAME)->
				setSessionName('some_session')
		)->
		add(WebAppAjaxHandler::create())->
		add(
			WebAppAuthorisatorInit::create()->
				addAuthorisator(
					'admin',
					Authorisator::create()->setUserClassName('FbUser')
				)
		)->
		add(WebAppControllerResolverHandler::create())->
		add(WebAppControllerHandlerAdmin::create())->
		add(WebAppViewHandler::create());
	$application->run();

} catch (Exception $e) {
	var_dump(get_class($e), $e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
	exit;
}

?>
