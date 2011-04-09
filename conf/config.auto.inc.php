<?php
define('__ERROR_CONTROLLER__', 1);

// everything else
define('DEFAULT_ENCODING', 'UTF-8');
mb_internal_encoding(DEFAULT_ENCODING);
mb_regex_encoding(DEFAULT_ENCODING);

ini_set(
	'include_path',
	get_include_path()

	.PATH_CLASSES.'Auto'.DS.'Business'.PATH_SEPARATOR
	.PATH_CLASSES.'Auto'.DS.'Proto'.PATH_SEPARATOR
	.PATH_CLASSES.'Auto'.DS.'DAOs'.PATH_SEPARATOR

	.PATH_CLASSES.PATH_SEPARATOR
	.PATH_CLASSES.'DAOs'.PATH_SEPARATOR
	.PATH_CLASSES.'Business'.PATH_SEPARATOR
	.PATH_CLASSES.'Proto'.PATH_SEPARATOR
	.PATH_CLASSES.'Utils'.PATH_SEPARATOR
);
require PATH_EXTERNALS . 'core/include.inc.php';

/********** BEGIN RELEASE_CACHE_CONST *********/

define('RELEASE_VERSION', 'v0v1');

//CssUtils::me()->setReleaseVersion(RELEASE_VERSION);
//JsUtils::me()->setReleaseVersion(RELEASE_VERSION);

    /********** END OF RELEASE_CACHE_CONST ********/
?>
