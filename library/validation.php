<?php
require_once('library/functions.php');

$obj  = new functions();

class validation{
	public function checkvalidate($source, $items = array()){

  foreach($items as $item => $rules){
   foreach($rules as $rule => $rule_value){
    
    //$value = $source[$item];
    
    if($rule === 'required' && empty($value)){
    $error = ("{$item} is required");
    }else if(!empty($value)){
     switch($rule){
      case 'min':
       if(strlen($value) < $rule_value){
        $error = ("email must be a minimum of {$rule_value} characters.");
       }
      break;
      case 'max':
       if(strlen($value) > $rule_value){
        $error = ("email must be a maximum of {$rule_value} characters.");
       }
      break;
      case 'unique':
       $exist = $obj->userexist($source['email']);
       if ($exist == true) {
        $error = ("{$source['email']} email already exist.");
       }
     }
    }
}
}
}

}