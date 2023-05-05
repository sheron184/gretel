<?php 
namespace System;

/**
 * - Here the router helper functions will happen. 
 * 
 */

class Router {

    public string $protocol;

    public string $method;

    public string $domain;

    public string $uri;

    public string $full_uri;

    public string $route;

    public array $routes;

    public $callback;

    public bool $dynamic;

    public string $uri_dynamic;

    public function __construct($base_url, $routes)
    {
        /**
         * - Get data from $_SERVER 
         */

        $this->protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $this->domain = $_SERVER['HTTP_HOST'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        /**
         * - Set URI and route
         */

        $this->full_uri = $this->protocol . "://" . $this->domain . $this->uri;
        $this->route = str_replace($base_url, "", $this->full_uri);
        
        /**
         * - Get callback class and method
         * 
         */

         $this->routes = $routes;
        //$this->callback = $routes[$this->route];

        $this->get_callback();

    }

    protected function boot()
    {
        if($this->method == "POST"){

            if($this->dynamic){

                call_user_func(array(new $this->callback[0], $this->callback[1] ), $_POST, $this->uri_dynamic);

            }else{

                call_user_func(array(new $this->callback[0], $this->callback[1] ), $_POST);
                
            }
        
        }else if($this->method == "GET"){

            if($this->dynamic){

                call_user_func(array(new $this->callback[0], $this->callback[1] ), $_GET, $this->uri_dynamic);
                
            }else{

                call_user_func(array(new $this->callback[0], $this->callback[1] ), $_GET);
                
            }
            
        }
        
    }

    protected function get_callback()
    {
        

        $routes_keys = array_keys($this->routes);
        $routes_values = array_values($this->routes);
        
        foreach(array_keys($this->routes) as $route){

            if(strpos($route, '{')){
                $this->dynamic = true;

                $route_partials = explode('/', $route);
                $uri_partials = explode('/', $this->uri);

                $route_dynamic = $route_partials[ count($route_partials) - 1 ];
                $this->uri_dynamic = $uri_partials[ count($uri_partials) - 1 ];

                $new_route = str_replace( $route_dynamic,''.$this->uri_dynamic.'', $route);

                $routes_keys[array_search($route, $routes_keys)] = $new_route;

                $this->routes = array_combine($routes_keys, $routes_values);
            }

        }

        if(isset($this->routes[$this->route])){
            $this->callback =  $this->routes[$this->route];
        }

        //var_dump($this->callback);

        $this->boot();

    }
}

