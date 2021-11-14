<?php


/**
 * gets data from AJAX but lets Paypal to handle orders
 */
class Ajax_checkout extends Controller
{

    //defualt method
    public function index() {


        if(count($_POST) > 0){
            $data = (object)$_POST;
          }else{
            $data = file_get_contents("php://input");
          }

          // if($data){
          //     echo "yes, there is data";
          //     show($data);
          // }else{
          //   echo "No, there is data";
          // }
         


        if(isset($_POST)){
            if(isset($_POST['data'])){
            $songData = $_POST['data'];
            print_r($songData);
        }}
         echo json_decode($data);

    }


  


}