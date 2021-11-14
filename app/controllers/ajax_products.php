<?php

/**
 * This controller gets product  input data through ajax and enables the index method
 * to call all crud functions of the user model
 */
 
class Ajax_products extends  Controller{

    //defualt method
    function index(){

      // $data = file_get_contents("php://input");
      // $data = json_decode($data);  // this brings object
      // show($_POST);  //this is array
      // show($_FILES);
      // die;
      if(count($_POST) > 0){
        $data = (object)$_POST;
      }else{
        $data = file_get_contents("php://input");
      }

      //convert POST data to an object
      // $data = (object)$_POST;
    
      
      if(is_object($data) && isset($data->data_type)){
        

        //create instance of product Model to access methods like create, editProduct, deleteproduct etc ..
        $product = $this->loadModel('Product');
       

        if($data->data_type == "add_product"){
         
              
              //add new product  - $_FILES is always present by default
              // $check = $product->create($data, $_FILES);
              $product->create($data, $_FILES);
              
        
              if(isset($_SESSION['error']) && $_SESSION['error']!=""){
                
                $arr['message']       = $_SESSION['error'];
                $_SESSION['error']    = ""; //unset session error
                $arr['message_type']  = 'error';
                $arr['data']          = "";
                $arr['data_type']     = "add_product";
      
                echo json_encode($arr);
      
              }else{
                
                $arr['message']      = "Product added successfully";
                $arr['message_type'] = 'info';
                $arr['data_type']    = "add_product";
                $products            = $product->getProducts();
                $arr['data']         = $product->make_table($products);
                
      
                echo json_encode($arr);
              }

        }elseif($data->data_type == "delete_product"){
              
              $product->deleteProduct($data->id);
              $arr['message']       =  "Record deleted successfully!";
              $_SESSION['error']    =  ""; 
              $arr['message_type']  =  'info';
              $arr['data_type']     =  "delete_product";
              $products             =  $product->getProducts();
              $arr['data']          =  $product->make_table($products);
            
              echo json_encode($arr);

       }elseif($data->data_type == "edit_product"){
        

            $product->editProduct($data,$_FILES);
            $arr['message']       = "Record updated successfully!";
            $_SESSION['error']    = ""; //unset session error
            $arr['message_type']  = 'info';
            $arr['data_type']     = "edit_product";
           
            $products             = $product->getProducts();
            $arr['data']          = $product->make_table($products);
            

            echo json_encode($arr);

     }
  
      }



    


    } //Method index ends here


   
}