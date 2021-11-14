<?php



class Shop extends Controller{

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
       

        $db = Database::newInstance();
        $categories = $db->read("SELECT *FROM category");

        $conn = Database::newInstance();

      
        if($search){
         
            $arr['slug'] = "%".$find."%"; 
            $query = "SELECT *FROM product WHERE slug like :slug";
            $items_inshop = $conn->read($query,$arr);
            $data['item_searched'] = true;
        }else{
            $items_inshop = $conn->read("SELECT *FROM product");
        }
       
        
        $data["items_inshop"] = $items_inshop;
        $data["categories"] = $categories;

        
        //pass data to view
        $data["Page_title"] = "Products";
        $data['search'] = true; //search box will show
        // load view - product.php
        $this->view("zac/shop",$data);
        
    }

   
}