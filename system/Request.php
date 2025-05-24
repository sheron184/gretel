<?php

namespace System;

class Request {
  public string $method {
    get => $_SERVER["REQUEST_METHOD"];
  }
  public string $path {
    get => parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  }
  public string $hostname {
    get => $_SERVER["HTTP_HOST"];
  }
  public string $query_string {
    get => $_SERVER["QUERY_STRING"];
  }
  public string $get_params {
    get => $_GET;
  }
  public string $remote_ipaddr {
    get => $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
  }
  public function getHeaders(){
    return getallheaders();
  }
  public function getBody(){
    $body = file_get_contents("php://input");
    $json = json_decode($body, true);
    return $json;
  }
  public function getFormData(){
    return $_POST;
  }
  public function getFiles(){
    return $_FILES;
  }
}
