<?php

namespace App;

class Router{

    private $routes = [];

    public static function load($file){

        $router = new static;
        require($file);
        return $router;

    }


    public function define($routes){
        $this->routes = $routes;
    }

    public function direct($uri){

        $uriPart = explode('/', $uri);

        if(array_key_exists($uri, $this->routes)){
            return $this->routes[$uri];
        }
        else{
                $newUri = '/'.$uriPart[1];
                if(array_key_exists($newUri, $this->routes)){
                    return $this->routes[$newUri];
                }
                else{
                    return $this->routes[404];
                }
            }
    }

}
