<?php 
namespace System;

/**
 * - Here the router helper functions will happen. 
 * 
 */

class Router {

    public $protocol;

    public $method;

    public $domain;

    public $uri;

    public $full_uri;

    public $route;

    public $callback;

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

        $this->callback = $routes[$this->route];

        $this->boot();
    }

    protected function boot()
    {
        if($this->method == "POST"){
            
            call_user_func(array( $this->callback[0], $this->callback[1] ), $_POST);
        
        }else if($this->method == "GET"){

            call_user_func(array( $this->callback[0], $this->callback[1] ), $_GET);
            
        }
        
    }

    protected function callback()
    {

    }
}

