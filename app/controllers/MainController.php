<?php

namespace app\controllers;

use app\models\Main;
use wfm\Controller;
use RedBeanPHP\R;


class MainController extends Controller
{

    public function indexAction(): void
    {

        $names = $this->model->get_names();
        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(compact('names'));
    }
}