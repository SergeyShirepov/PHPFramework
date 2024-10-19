<?php

namespace wfm;

use app\models\Main;
use wfm\Model;

class Controller
{
public array $data = [];
public array $meta = ['tittle' => '', 'description' => '', 'keywords' => ''];
public false|string $layout = '';
public string $view = '';
public object $model;


    public function __construct(public $route = [])
    {

    }

    public function  getModel(): void
    {
        $model =  'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }

    /**
     * @throws \Exception
     */
    public function  getView(): void
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
        }

    public function  set($data)
    {
        $this->data = $data;
    }

    public function  setMeta($title='', $description='', $keywords=''): void
    {
        $this->meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }
}