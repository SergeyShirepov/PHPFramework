<?php

define("DEBUG",1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT."/public");
define("APP", ROOT."/app");
define("CORE", ROOT."/vendor/wfm");
define("HELPERS", ROOT."/vendor/wfm/helpers");
define("CASH", ROOT."/tmp/cash");
define("LOGS", ROOT."/tmp/log");
define("CONFIG", ROOT."/config");
define("LAYOUT", ROOT."/ishop");
define("PATH", "http://new-ishop.loc");
define("ADMIN", "http://new-ishop.loc/admin");
define("NO_IMAGE", "uploads/no_image.jpg");

require_once ROOT ."/vendor/autoload.php";