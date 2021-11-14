<?php

 
/**
 * Accepts data from the interface in dashboard and calls the  user fuctions in the backend to perform
 * the crud operation(create, read, update and delete)
 */
class Ajax_user extends  Controller{

    //defualt method
    function index(){

    if(count($_POST) > 0){
        $data = (object)$_POST;
        }else{
        $data = file_get_contents("php://input");
        }

    //   $data = file_get_contents("php://input");
    //   $data = json_decode($data); 
      
      // show($data);die;
      if(is_object($data) && isset($data->data_type)){

        //create instance of Category Model to access methods like create, editCategory, deleteCategory etc ..
        $user = $this->loadModel('User');

        if($data->data_type == "add_user"){
         
                
          //add new user
         
           $user->creatUser($data);
    
          if(isset($_SESSION['error']) && $_SESSION['error']!=""){
            // $arr = [];
            $arr['message'] = $_SESSION['error'];
            $_SESSION['error']=""; //unset session error
            $arr['message_type'] = 'error';
            $arr['data'] = "";
            $arr['data_type'] = "add_user";
  
            echo json_encode($arr);
  
          }else{
            // $arr = [];
            $arr['message'] = "User added successfully";
            $arr['message_type'] = 'info';
            $users = $user->getUsers();
            $arr['data'] = $user->make_table($users);
            $arr['data_type'] = "add_user";

           
            echo json_encode($arr);
          }

        }elseif($data->data_type == "delete_user"){
        //   $arr = [];
          $user->deleteUser($data->id);
          $arr['message'] = "Record deleted successfully!";
          $_SESSION['error']=""; //unset session error
          $arr['message_type'] = 'info';
          $arr['data_type'] = "delete_user";
          $users = $user->getUsers();
          $arr['data'] = $user->make_table($users);
          
 
           echo json_encode($arr);

       }elseif($data->data_type == "edit_user"){
        // // $arr = [];
       
        // show($data);die;
        $user->editUser($data);
        $arr['message'] = "Record updated successfully!";
        $_SESSION['error']=""; //unset session error
        $arr['message_type'] = 'info';
        $arr['data_type'] = "edit_user";
        $users = $user->getUsers();
        $arr['data'] = $user->make_table($users);
        echo json_encode($arr);

     }
  
      }


   


    } //Method index ends here


   
}