<?php
define('DS', DIRECTORY_SEPARATOR);
define('PATH_BASE', dirname(dirname(__FILE__)).DS);
define('PATH_SRC', PATH_BASE.'src'.DS);
define('PATH_EXTERNALS', PATH_BASE.'externals'.DS);

//SRC PATCHES
define('PATH_CLASSES', PATH_SRC.'classes'.DS);
define('PATH_CONTROLLERS', PATH_SRC.'controllers'.DS);
define('PATH_CONTROLLERS_BLOCKS', PATH_SRC.'blocks'.DS);
define('PATH_SUB_CONTROLLERS', PATH_SRC.'subControllers'.DS);
define('PATH_TEMPLATES', PATH_SRC.'templates'.DS);
?>