<?php

namespace App;
use App\Exceptions\RouteNotFoundException;
class Router{

    private array $routes = [];
    private string $requestMethod;
    private string $requestUri;
    public function __construct(private Container $container)
    {

    }
    public function register(string $method, string $route, array $action):Router
    {
        $this->routes[$method][$route] = $action;
        return $this;
    }

    public function get(string $route, array $action):Router
    {
        return $this->register('get', $route, $action);

    }
    public function post(string $route, array $action):Router
    {
        return $this->register('post',$route,$action);

    }
    public function resolve($requestUri,$requestMethod)
    {

        $this->requestUri = strtolower($requestUri);
        $this->requestMethod = strtolower($requestMethod);
       

        $route = explode('?', $this->requestUri)[0];
        
 
        $action = $this->routes[$this->requestMethod][$route] ?? null;

    
        if(!$action){
            throw new RouteNotFoundException();
        }
        
        if(!is_array($action))
        {
            throw new RouteNotFoundException();
        }

        [$class, $method] = $action;
        if(class_exists($class))
        {
            $class =  $this->container->get($class);
           
            var_dump($class);
            if(method_exists($class, $method))
            {
                return call_user_func_array([$class,$method],[]);
                
            }
        }
   

        throw new RouteNotFoundException();
    }
    public function routes():array
    {
        return $this->routes;
    }
}