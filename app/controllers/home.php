<?php

//this controller class calls the view method of the main "Controller" class to see if corresponding view exists 
class Home extends  Controller{

    //defualt method
    function index(){

         //check if search was made 
         $search = false;
         $find = '';
         if(isset($_GET['find'])){
             $find = addslashes($_GET['find']);
             $search = true;
         }
        
        // check if user is logged in
        $user = $this->loadModel('user');
        $user_info = $user->checkLogin();
        if(is_array($user_info)){
            $data['user_email'] = $user_info['email'];
            $data['name']=$user_info['name'];
            $data['role']=$user_info['role'];
            $data['userid']=$user_info['userid'];
            
           // show($data['user_email']);
           //show($user_info['role']);
           
        }

        //read products to display in home

        $conn = Database::newInstance();
        if($search){
         
            $arr['slug'] = "%".$find."%"; 
            $query = "SELECT *FROM product WHERE slug like :slug";
            $ROWS = $conn->read($query,$arr);
            $data['item_searched'] = true;
        }else{
            $ROWS = $conn->read("SELECT *FROM product"); //limit stuff
        }


        $data['ROWS'] = $ROWS;


       $data["Page_title"] = "Home page";
       $data['search'] = true; //search box will show
       //load the home view - > index.php
        $this->view("zac/index",$data);


      
    }

   
}