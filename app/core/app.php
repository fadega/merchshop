<?php


/**
 *  The classes processes url and checks if corresponding controller class and method exists
 */
class App {
  

   private  $controller = "home";
   private  $method = "index";
   private  $params = [];
    
   public function __construct()
   {
     $url = $this->splitURL();
     
     //Check if the controller exists in the controllers folder
     if(file_exists("../app/controllers/".strtolower($url[0]).".php")){
       
      //if it exists, assign the controller property to the new controller
       $this->controller = strtolower($url[0]);
       //unset the array position 
       unset($url[0]);

     }
     require "../app/controllers/".$this->controller.".php"; 
     
    //Create instance of whatever controller class is passed(if it exists, otherwise the home controller)
    $this->controller = new $this->controller;

    if(isset($url[1])){
      
      if(method_exists($this->controller, $url[1])){
        $this->method =$url[1];
        unset($url[1]);

      }
    }
    // $this->params = array_values($url); //old code
    $this->params = $url ? array_values($url) : []; 
    call_user_func_array([$this->controller, $this->method],$this->params);

   }

   /**
    * splitURL gets url from browser and processes against the conroller classes and their methods
    * @return array
    */
   private function splitURL(){
       
    //check if the the GET is set otherwise set the url to defualt class home
    $url = isset($_GET['url']) ? $_GET['url'] :"home";

    // return explode("/",filter_var(trim($_GET['url'],"/"), FILTER_SANITIZE_URL));
    return explode("/",filter_var(trim($url,"/"), FILTER_SANITIZE_URL));

   }



  }

?>