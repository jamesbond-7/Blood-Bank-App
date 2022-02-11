<?php
//Load Config
require_once 'config/config.php';

//Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/functions_helper.php';

//Loading Libraries
// require_once 'libraries/core.php';
// require_once 'libraries/controller.php';
// require_once 'libraries/database.php';

//AutoLoad Core Libraries
spl_autoload_register(function($className){
    require_once 'libraries/' .$className. '.php';
});