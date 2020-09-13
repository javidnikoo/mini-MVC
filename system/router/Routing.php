<?php
namespace System\router;

use ReflectionMethod;

class Routing{
// masire hale hazere karbar 
    private $current_route;
    // in yek tabe sazandeh ast
    public function __construct(){
        global $current_route;
		        //masire karbar ra begir va har ja ke / bod joda sazi kon va be array tabdil kon
        $this->current_route = explode('/', $current_route);
    }

public function run(){
//adrrese ra tain mikonad 
  $path = realpath(dirname(__FILE__) . "/../../application/controllers/" . $this->current_route[0] . ".php");
   //agar adresse vojod nadash error kon
  if(!file_exists($path)){
    echo "404 - file not exist!!";
    exit;
  }
  require_once($path);
  // agar dakhele current_rout yek array vojod dasht boro be index vagarna boro be adresse

sizeof($this->current_route) == 1 ? $method = "index" : $method = $this->current_route[1];
 // mirim be namespace ke dadeh shode adresse ra bar midarim
$class = "Application\Controllers\\" . $this->current_route[0];
$object = new $class();
if (method_exists($object, $method)) {
  $reflection = new ReflectionMethod($class , $method);
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
