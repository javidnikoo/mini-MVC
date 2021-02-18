<?php
namespace System\router;
use ReflectionMethod;

class Routing{
//  User current path (get from config.php)
    private $current_route; 
    //THIS IS A constructor
    public function __construct(){
        global $current_route;
		        //// if the url have / do str to array (array[0]/array[1])
        $this->current_route = explode('/', $current_route);
    }

  public function run(){
    // check real Link adresse (class!) 
    $path = realpath(dirname(__FILE__) . "/../../application/controllers/" . $this->current_route[0] . ".php");
    //if reak Link not exits Error 404
    if(!file_exists($path)){
      echo "404 - file not exist!!";
      exit;
    }
    require_once($path);

    // if current_route == 1 method = index if not method = current_route 1 ../class/mehtod
    sizeof($this->current_route) == 1 ? $method = "index" : $method = $this->current_route[1];
    // go to namespace ..(need Two '\'! )
    $class = "Application\Controllers\\" . $this->current_route[0];
    $object = new $class();
    // if method_exists continue 
    if (method_exists($object, $method)){
      // reports information about method // need "use ReflectionMethod;"
      $reflection = new ReflectionMethod($class , $method);
      // check how much method(paramet) have 
      $parameterCount = $reflection->getNumberOfParameters();
      
      if ($parameterCount <= count(array_slice($this->current_route , 2)))

        call_user_func_array(array($object , $method), array_slice($this->current_route , 2));
      else {
        echo "404 - parameter error!";
      }
    }
    else {
      echo "404 - method not exist!";
    }
  }
}
