<?php
require dirname(dirname(__FILE__)).'/conf/constants.auto.inc.php';
require PATH_BASE.'conf/config.inc.php';

FbFilmImdbParser::create()->parseImdbId('988045');
?>