<?php

namespace wfm;

use Exception;

class App
{

    public static $app;

    /**
     * @throws Exception
     */
    public function  __construct()
    {
        $query = trim(urldecode($_SERVER['QUERY_STRING']), '/');
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
        Router::dispatch($query);
    }

    protected function getParams(): void
    {
$params = require_once CONFIG . '/params.php';
if (!empty($params)) {
    foreach ($params as $k => $v) {
        self:: $app->setProperty($k, $v);
    }
}
    }

}