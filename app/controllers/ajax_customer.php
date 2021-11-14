<?php

 
/**
 * This controller gets customer input data through ajax and enables the index method
 * to call edit and delete functions of the user model depending of the data_type recieved
 */
class Ajax_customer extends  Controller{

    //defualt method
    function index(){

    if(count($_POST) > 0){
        $data = (object)$_POST;
        }else{
        $data = file_get_contents("php://input");
        }

    //   $data = file_get_contents("php://input");
    //   $data = json_decode($data); 
      
    //   show($data);die;
      if(is_object($data) && isset($data->data_type)){

        //create instance of Category Model to access methods like create, editCategory, deleteCategory etc ..
        $customer = $this->loadModel('User');
      
        if($data->data_type == "delete_customer"){
          
            // $customer->deleteCustomer($data);
        //   $arr = [];
          $customer->deleteCustomer($data->id);
          $arr['message'] = "Record deleted successfully!";
          $_SESSION['error']=""; //unset session error
          $arr['message_type'] = 'info';
          $arr['data_type'] = "delete_customer";
          $customers = $customer->getCustomers();
          $arr['data'] = $customer->make_table($customers);
          
 
           echo json_encode($arr);

       }elseif($data->data_type == "edit_customer"){
        // // $arr = [];
       
        // show($data);die;
        $customer->editCustomer($data);
        // $user->editCategory($data->id,$data->category);
        $arr['message'] = "Record updated successfully!";
        $_SESSION['error']=""; //unset session error
        $arr['message_type'] = 'info';
        $arr['data_type'] = "edit_customer";
        $customers = $customer->getCustomers();
        $arr['data'] = $customer->make_table($customers);
        echo json_encode($arr);

     }
  
    }


   


    } //Method index ends here


   
}