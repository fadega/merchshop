<?php


/**
 * Admin controller class loads home, categories, products, and users/customers if data exist
 * otherwise, it loads empty interface in the dashboard
 * Categories, products, users are all methods in admin controller cat call the proper/corresponding 
 * models
 */
class Admin extends Controller{

    //defualt method - the feeds the home page
    function index(){
      
        // check if user is logged in
        $user = $this->loadModel('user');
        $user_info = $user->checkLogin();
        if(is_array($user_info)){
            $data['user_email']  = $user_info['email'];
            $data['name']        = $user_info['name'];
            $data['role']        = $user_info['role'];
            $data['userid']      = $user_info['userid'];
            $data['phone']       = $user_info['phone'];
            $data['address']     = $user_info['address'];
            
        
        }
        

        //check if a session for login is set and if it is set, and user is admin, get them to the dashboard
        //otherwise, get them to signin 
        $data["Page_title"] = "Admin";
        if(isset($_SESSION['logged'])){

            if($_SESSION['logged']['role']=="admin"){
                $this->view("zac/admin",$data);
            } else if($_SESSION['logged']['role']=="customer"){
                $this->view("zac/home",$data); //will take non admin to 404 page
            }
            
        }else{
            //intentionally lead them to 404
            $this->view("zac/home",$data);
        }
  
    }


     
     /**
      * categories is admin facing method, checks if user is logged in and loads the categories
      * if user has the required level of access
      */
     function categories(){
      
        // check if user is logged in
        $user = $this->loadModel('user');
        $user_info = $user->checkLogin();
        if(is_array($user_info)){
            $data['user_email'] = $user_info['email'];
            $data['name'] = $user_info['name'];
            $data['role'] = $user_info['role'];
            $data['userid'] = $user_info['userid'];

            $data['user_email']  = $user_info['email'];
            $data['name']        = $user_info['name'];
            $data['role']        = $user_info['role'];
            $data['userid']      = $user_info['userid'];
            $data['phone']       = $user_info['phone'];
            $data['address']     = $user_info['address'];
            
    
        }
      
      

        //get table displayed in the categories area
        $conn =  Database::newInstance();
        $sql= "SELECT *FROM category order by id ";
        $categories = $conn->read($sql,[]); 
        
        $category = $this->loadModel('Category');
        $tbl_rows = $category->make_table($categories);
        $data["tbl_rows"] = $tbl_rows;
        // print_r($tbl_rows);
        // if(is_array($categories)){
        //      $data["tbl_rows"] = $tbl_rows;
            
        // }


        $data["Page_title"] = "Categories";
        //check loggin and credential status
        if(isset($_SESSION['logged'])){

            if($_SESSION['logged']['role']=="admin"){
                $this->view("zac/categories",$data);
            } else if($_SESSION['logged']['role']=="customer"){
                $this->view("zac/home",$data); //will take non admin to 404 page
            }
            
        }else{
            //intentionally lead them to 404
            $this->view("zac/home",$data);
        }
       
  
    }




    /**
      * products is admin facing method, checks if user is logged in and loads the products
      * if user has the required level of access
      */
     function products(){
      
        // check if user is logged in
        $user = $this->loadModel('User');
        $user_info = $user->checkLogin();
        if(is_array($user_info)){
            $data['user_email']    = $user_info['email'];
            $data['name']          = $user_info['name'];
            $data['role']          = $user_info['role'];
            $data['userid']        = $user_info['userid'];

            $data['user_email']  = $user_info['email'];
            $data['name']        = $user_info['name'];
            $data['role']        = $user_info['role'];
            $data['userid']      = $user_info['userid'];
            $data['phone']       = $user_info['phone'];
            $data['address']     = $user_info['address'];
            
            
    
        }
   
        //get table displayed in the categories area
        $conn =  Database::newInstance();
        $sql= "SELECT *FROM product order by name";
        $products = $conn->read($sql,[]); 

        //feed combobox of the modal
        $query= "SELECT *FROM category order by name";
        $categories = $conn->read($query,[]); 
        $data["categories"] = $categories;
        
        
        $product = $this->loadModel('Product');
        $tbl_rows = $product->make_table($products);
        $data["tbl_rows"] = $tbl_rows;
        // print_r($tbl_rows);
        // if(is_array($products)){
        //      $data["tbl_rows"] = $tbl_rows;
            
        // }


        $data["Page_title"] = "Products";
        if(isset($_SESSION['logged'])){

            if($_SESSION['logged']['role']=="admin"){
                $this->view("zac/products",$data);
            } else if($_SESSION['logged']['role']=="customer"){
                $this->view("zac/home",$data); //will take non admin to 404 page
            }
            
        }else{
            //intentionally lead them to 404
            $this->view("zac/home",$data);
        }
       
  
    }


     /**
      * users is admin facing method, checks if user is logged in and loads the admin users
      * if user has the required level of access
      */
     function users(){
      
        // check if user is logged in
        $user = $this->loadModel('User');
        $user_info = $user->checkLogin();
        if(is_array($user_info)){
            $data['user_email'] = $user_info['email'];
            $data['name'] = $user_info['name'];
            $data['role'] = $user_info['role'];
            $data['userid'] = $user_info['userid'];

            $data['user_email']  = $user_info['email'];
            $data['name']        = $user_info['name'];
            $data['role']        = $user_info['role'];
            $data['userid']      = $user_info['userid'];
            $data['phone']       = $user_info['phone'];
            $data['address']     = $user_info['address'];
            
    
        }
      
      
        //get table displayed in the user area
        $conn =  Database::newInstance();
        $sql= 'SELECT *FROM user WHERE role = "admin"  ORDER BY id ';
        $users = $conn->read($sql,[]); 
       
    
        // $user = $this->loadModel('User');
        $tbl_rows = $user->make_table($users);
        $data["tbl_rows"] = $tbl_rows;
     

        $data["Page_title"] = "Users";
        //check loggin and credential status
        if(isset($_SESSION['logged'])){

            if($_SESSION['logged']['role']=="admin"){
                $this->view("zac/users",$data);
            } else if($_SESSION['logged']['role']=="customer"){
                $this->view("zac/home",$data); //will take non admin to 404 page
            }
            
        }else{
            //intentionally lead them to 404
            $this->view("zac/home",$data);
        }
       
  
    }



    /**
      * customers is admin facing method, checks if user is logged in and loads the users/customers
      * if user has the required level of access
      */
    function customers(){
      
        // check if user is logged in
        $customer = $this->loadModel('User');
        $user_info = $customer->checkLogin();
        if(is_array($user_info)){
            $data['user_email'] = $user_info['email'];
            $data['name'] = $user_info['name'];
            $data['role'] = $user_info['role'];
            $data['userid'] = $user_info['userid'];

            $data['user_email']  = $user_info['email'];
            $data['name']        = $user_info['name'];
            $data['role']        = $user_info['role'];
            $data['userid']      = $user_info['userid'];
            $data['phone']       = $user_info['phone'];
            $data['address']     = $user_info['address'];
            
    
        }
      
      
        //get table displayed in the user area
        $db =  Database::newInstance();
        $sql= 'SELECT *FROM user WHERE role = "customer"  ORDER BY id ';
        $customers = $db->read($sql,[]); 
       
    
        // $user = $this->loadModel('User');
        $tbl_rows = $customer->make_table($customers);
        $data["tbl_rows"] = $tbl_rows;
     

        $data["Page_title"] = "Customesrs";
        //check loggin and credential status
        if(isset($_SESSION['logged'])){

            if($_SESSION['logged']['role']=="admin"){
                $this->view("zac/customers",$data);
            } else if($_SESSION['logged']['role']=="customer"){
                $this->view("zac/home",$data); //will take non admin to 404 page
            }
            
        }else{
            //intentionally lead them to 404
            $this->view("zac/home",$data);
        }
       
  
    }






   /**
      * sendMail is admin facing method, checks if user is logged in and loads the loads the mail interface
      * if user has the required level of access
      */
    function sendMail(){
      
        // check if user is logged in
        $customer = $this->loadModel('User');
        $user_info = $customer->checkLogin();
        if(is_array($user_info)){
            $data['user_email'] = $user_info['email'];
            $data['name'] = $user_info['name'];
            $data['role'] = $user_info['role'];
            $data['userid'] = $user_info['userid'];

            $data['user_email']  = $user_info['email'];
            $data['name']        = $user_info['name'];
            $data['role']        = $user_info['role'];
            $data['userid']      = $user_info['userid'];
            $data['phone']       = $user_info['phone'];
            $data['address']     = $user_info['address'];
            
    
        }
      
      
        //get table displayed in the user area
        $db =  Database::newInstance();
        $sql= 'SELECT *FROM user WHERE role = "customer"  ORDER BY id ';
        $customers = $db->read($sql,[]); 
       
    
        // $user = $this->loadModel('User');
        $tbl_rows = $customer->make_table($customers);
        $data["tbl_rows"] = $tbl_rows;
     

        $data["Page_title"] = "Send Mail";
        //check loggin and credential status
        if(isset($_SESSION['logged'])){

            if($_SESSION['logged']['role']=="admin"){
                $this->view("zac/sendmail",$data);
            } else if($_SESSION['logged']['role']=="customer"){
                $this->view("zac/home",$data); //will take non admin to 404 page
            }
            
        }else{
            //intentionally lead them to 404
            $this->view("zac/home",$data);
        }
       
  
    }



    



}