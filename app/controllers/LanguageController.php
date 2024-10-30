<?php

namespace app\controllers;

class LanguageController extends AppController
{
    public function changeAction()
    {
        $lang = $_GET['lang'] ?? null;
        var_dump($lang); die;

    }

}