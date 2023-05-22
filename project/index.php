<?php
// all the requests will pass through this file
// require  autoload
require_once realpath("vendor/autoload.php");
require_once "./App/Config/config.php";
require_once "./App/helpers/session_helper.php";
// set default value to home
$control = 'home';
$function = 'home';
// get the parameters from url
$param = $_SERVER['REQUEST_URI'];
$param = strtolower($param);
$parameters = explode("/", $param);
// if parameters are set then assign them try o variables
if (isset($parameters[1]) && $parameters[1] != '') {
    $control = $parameters[1];
}
if (isset($parameters[2]) && $parameters[2] != '') {
    $function = $parameters[2];
}
// try  creating  the controller object if not possible then call default home class
try {
    $class_name = "App\\Controller\\$control";
    $class = new $class_name();
    //  if method exists then call the class method
    if (method_exists($class, $function)) {
        $class->$function();
    }
} catch (error) {
    $control = 'home';
    $function = 'home';
    $class_name = "App\\Controller\\$control";
    $class = new $class_name();
}
