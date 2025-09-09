<?php

namespace System\Router;

use ReflectionMethod;
use System\Config\Config;

class Routing{

    private $current_route;
    private $method_field;
    private $routes;
    private $values = [];

    public function __construct()
    {
        $this->current_route = explode('/', config('app.CURRENT_ROUT'));
        $this->method_field = $this->methodField();
        global $routes;
        $this->routes = $routes;
    }

    public function run()
    {
      $match = $this->match();
      if(empty($match))
      {
        $this->error404();
        exit;
      }
      $classPath = str_replace('\\', '/', $match["class"]);
        $path =  config('app.BASE_DIR').'/'.$classPath.".php";
        if(!file_exists($path))
      {
          $this->error404();
          exit;
      }
      $class = $match["class"];
      $object = new $class();
      if(method_exists($object, $match["method"]))
      {
        $reflection = new ReflectionMethod($class, $match["method"]);
        $parameterCount = $reflection->getNumberOfParameters();
        if($parameterCount <= count($this->values))
        {
          call_user_func_array(array($object, $match["method"]), $this->values);
        }
        else
        {
          $this->error404();
            exit;
        }
      }
      else
      {
        $this->error404();
          exit;
      }
    }

    public function match()
    {
      $reservedRoutes = $this->routes[$this->method_field];
      foreach ($reservedRoutes as $reservedRoute) {
        if($this->compare($reservedRoute['url']) == true)
        {
          return ["class" => $reservedRoute['class'], "method" => $reservedRoute['method']];
        }
        else
        {
           $this->values = [];
        }
      }
      return [];
    }

    private function compare($reservedRouteUrl)
    {
       if(trim($reservedRouteUrl, '/') === '')
       {
        return trim($this->current_route[0], '/') === '' ? true : false;
      }
       $reservedRouteUrlArray = explode('/', $reservedRouteUrl);
      if(sizeof($this->current_route) != sizeof($reservedRouteUrlArray))
      {
        return false;
      }
      foreach ($this->current_route as $key => $currentRouteElement)
       {
        $reservedRouteUrlElement = $reservedRouteUrlArray[$key];
        if(substr($reservedRouteUrlElement, 0, 1) == "{" && substr($reservedRouteUrlElement, -1) == "}")
        {
          array_push($this->values, $currentRouteElement);
        }
        elseif($reservedRouteUrlElement != $currentRouteElement)
        {
          return false;
        }
      }
      return true;
    }

    public function error404()
    {
      http_response_code(404);
        return view('errors.404');
    }

    public function methodField()
    {
        $method_field = strtolower($_SERVER['REQUEST_METHOD']);

        if($method_field == 'post')
        {
            if(isset($_POST['_method'])){
                if($_POST['_method'] == 'put'){
                    $method_field = 'put';
                }
                elseif($_POST['_method'] == 'delete'){
                    $method_field = 'delete';
                }
            }
        }
        return $method_field;
    }
}