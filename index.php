<?php 
use System\Router;

require './app/bootstrap.php';
require './app/routes.php';

new Router($base_url, $web, $api);

 