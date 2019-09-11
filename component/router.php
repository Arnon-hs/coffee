<?php

class router
{
    private $routes;

    public  function __construct()
    {
        $routesPath=ROOT.'/config/routers.php';
        $this->routes = include($routesPath);
    }
    //метод возвращает строку URL
    private function getURL()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run()
    {
        //Получить строку запроса
        $url=$this->getURL();
        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $urlPattern =>$path) {

            //Сравниваем $urlPattern and $url
            if (preg_match("~$urlPattern~", $url)) {
                $internalRoute = preg_replace("~$urlPattern~", $path, $url);
                $segments = explode('/', $path);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));

                echo '<br>Class: ' . $controllerName;
                echo '<br>Method: ' . $actionName  . '<br>';
                $parametrs =$segments;
                echo '<pre>';
                print_r($parametrs);
            }

            //Подключить файл класса-контроллера
            $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
            if (file_exists($controllerFile)) {
                include_once($controllerFile);
           
            //Создать объект, вызвать метод(action)
            $controllerObject = new $controllerName;
            $result = $controllerObject->$actionName();
            if ($result != null) {
                break;
            }
            }

        }

    }
}
?>