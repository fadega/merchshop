<?php

/**
 * This is the main contoller class: every other controller class make use of it to process views and models
 */
class Controller{

  
 /**
  * The view method accepts a string and checks if a view with that name exists in the views.
  * @param string  $view 
  * @param array $data  
  * 
  */
 protected function view($view, $data = []){
    
    extract($data); //using this, we can access each element inside $data  can be echoed as a ssingle variable
    if(file_exists("../app/views/".$view.".php")){
        include "../app/views/".$view.".php";
 
      }else{
        include "../app/views/404.php";
      }

}

/**
 * This method checks the exists of a requested model and returns true or false based on that
 * @param string $model
 * @return object
 */
protected function loadModel($model){
  if(file_exists("../app/models/". strtolower($model) . ".class.php")){
      include "../app/models/".strtolower($model).".class.php";
            
      return $model = new $model();

    }else{
      return false;
    }
    

}


}