<?php

namespace ToDo;

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
            
            $newUri = $uriPart[0].'/'.$uriPart[1];
            // tikrinam ar egzistuoja pirma slasho dalis masyve
            if(array_key_exists($newUri, $this->routes)){
                $this->routes[$uri] = $this->routes[$newUri];
                unset($this->routes[$newUri]);
                if(array_key_exists($uri, $this->routes)){
                    return $this->routes[$uri];
                }
                else{
                    return $this->routes[404];
                }
            }
        }
    }

}
