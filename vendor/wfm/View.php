<?php

namespace wfm;

class View
{

    public string $content = '';

    public function __construct(
        public $route,
        public $layout = '',
        public $view = '',
        public $meta = [],
    )
    {
        if (false !== $this->layout){
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    /**
     * @throws \Exception
     */
    public function  render($data): void
    {
        if (is_array($data)){
            extract($data);
        }
        $prefix = str_replace('\\','/',$this->route['admin_prefix']);
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        if (is_file($view_file)){
            ob_start();
            require $view_file;
            $this->content = ob_get_clean();
        }else{
            throw new \Exception("Не найден вид {$view_file}", 500);
        }

        if (false !== $this->layout){
            $layout_file = "{$this->layout}.php";
            if (is_file($layout_file)){
                require_once $layout_file;
            }else{
                var_dump($layout_file);
                throw new \Exception("Не найден шаблон {$this->layout}", 500);
            }
        }
    }

}