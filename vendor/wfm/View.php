<?php

namespace wfm;


use RedBeanPHP\R;

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
        $view_file = APP."/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        if (is_file($view_file)){
            ob_start();
            require_once $view_file;
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

    public function getMeta(): string
    {
        $out = '<title>' . App::$app->getProperty('site_name') . ' :: ' .
            h($this->meta['title']) . '</title>' . PHP_EOL;
        $out .= '<meta name ="description" content ="'.h($this->meta['description']).'">'.PHP_EOL;
        $out .= '<meta name ="keywords" content ="'.h($this->meta['keywords']).'">'.PHP_EOL;
        return $out;
    }

    public function getDbLogs(): void
    {
        if (DEBUG) {
                $logs = R::getDatabaseAdapter()
                    ->getDatabase()
                    ->getLogger();
                $logs = array_merge($logs->grep('SELECT'), $logs->grep('INSERT'),
                    $logs->grep('UPDATE'), $logs->grep('DELETE'));
                debug($logs);
        }
    }

    public function getPart($file, $data =null): void
    {
        if (is_array($data)){
            extract($data);
        }
        $file = APP . "/views/{$file}.php";
        if (is_file($file)){
            require $file;
        } else{
            echo "Файл {$file} не найден!";
        }
    }
}