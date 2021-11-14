<?php



class Signup extends Controller{

    function index(){

        
        $data["Page_title"] = "Sign up";
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
           
            // this is a debuggin code
            // show($_POST);
            $user = $this->loadModel("User");
            $user->signup($_POST);
            
        }
        $this->view("zac/signup",$data);
        
    }


}