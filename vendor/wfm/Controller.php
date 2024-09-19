<?php

namespace wfm;



class Controller
{
public array $data = [];
public array $meta = ['tittle' => '', 'discription' => '', 'keywords' => ''];
public false|string $layout = '';
public string $view = '';
public object $model;


    public function __construct(public $route = [])
    {

    }

    public function  getModel(): void
    {
        $model =  'app\\model\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }
    public function  getView(): void
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view))->render($this->data);
        }

    public function  set($data)
    {
        $this->data = $data;
    }

    public function  setMeta($tittle='', $description='', $keywords='')
    {
        $this->meta = [
            'tittle' => $tittle,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }
}