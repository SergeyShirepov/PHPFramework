<?php

function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
    if ($die) {
        die;
    }
}

function h()
{
    return htmlspecialchars_decode($str);
}

function redirect($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}

function base_url()
{
    return PATH . '/' . (wfm\App::$app->getProperty('lang') ? wfm\App::$app->getProperty('lang') . '/' : '');

}