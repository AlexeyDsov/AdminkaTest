<?php
define('DS', DIRECTORY_SEPARATOR);
define('PATH_BASE', dirname(dirname(__FILE__)).DS);
define('PATH_SRC', PATH_BASE.'src'.DS);
define('PATH_EXTERNALS', PATH_BASE.'externals'.DS);

//SRC PATCHES
define('PATH_CLASSES', PATH_SRC.'classes'.DS);
define('PATH_CONTROLLERS', PATH_SRC.'controllers'.DS);
define('PATH_CONTROLLERS_ADMIN', PATH_SRC.'controllers-admin'.DS);
define('PATH_TEMPLATES', PATH_SRC.'templates'.DS);
define('PATH_TEMPLATES_ADMIN', PATH_SRC.'templates-admin'.DS);
?>