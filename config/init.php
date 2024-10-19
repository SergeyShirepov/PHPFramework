<?php

define("DEBUG",1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT."/public");
define("APP", ROOT."/app");
define("CORE", ROOT."/vendor/wfm");
define("HELPERS", ROOT."/vendor/wfm/helpers");
define("CASH", ROOT."/tmp/cash");
define("LOGS", ROOT."/tmp/logs");
define("CONFIG", ROOT."/config");
define("LAYOUT", ROOT."/app/views/layouts/ishop");
define("PATH", "http://new-ishop");
define("ADMIN", "http://new-ishop/admin");
define("NO_IMAGE", "uploads/no_image.jpg");

require_once ROOT ."/vendor/autoload.php";