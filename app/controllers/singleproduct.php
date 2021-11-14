<?php


class Singleproduct extends Controller{

    function index($slug){
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
           
           $conn = Database::newInstance();
           $arr['slug']= esc($slug);
           $singlerow = $conn->read("SELECT *FROM product where slug =:slug",$arr);

           $catid = $singlerow[0]['category'];
           $cat['id'] = $catid;
                
           //get category name from id 
           $categoryname = $conn->read("SELECT categoryName FROM category where id = :id",$cat);

           $conn = Database::newInstance();
           $products = $conn->read("SELECT *FROM product limit 10");
          
          
          //passing data to views
          $data['singlerow']    = $singlerow;
          $data['categoryName'] = $categoryname;    
          $data['products']     = $products;    
          
          
          $data["Page_title"] = "Product";
          $this->view("zac/singleproduct",$data);
        
    }

   
}