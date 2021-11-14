<?php

/**
 * Functions for specific operations will go into this page
 */

/**
 * This function is for debuggin proposes
 * @param mixed $debug_stuff
 *  @return 
 */
function show($debug_stuff){
    echo "<pre>";
    print_r($debug_stuff);
    echo "</pre>";
    
}

//Function to validate user input
function validateInput($name, $email, $password,$password2,$phone,$address){
    $error = "";
    //email
    if(empty($email) || !preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/",$email)){
            $error.= 'The email is not formatted properly<br />';

        }
    //name
    if(empty($name) || !preg_match("/^[a-zA-Z]+$/",$name)){
            $error.= 'Name should only contain alphabets<br />';
            
    }
    //Password 
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $error.= "Password doesn't meet the minimum requirements. <br />";
        }
    if($password !==$password2){
    $error.= 'Password mismatch <br />';
    }
    //phone
    if(!empty($phone) && !preg_match("/^[0-9]+$/", $phone)){
        $error.= 'phone number should only contain numbers <br />';
        
    }
    $uppercase = preg_match('@[A-Z]@', $address);
    $lowercase = preg_match('@[a-z]@', $address);
    $number    = preg_match('@[0-9]@', $address);
    //address
    if(!empty($address) && !$uppercase && !$lowercase && !$number){
        $error.= 'Errors related the address field <br />';
    }


    return $error;
}

//check for a error in the $_SESSION array
function checkErrorMessage(){
    if(isset($_SESSION['error']) && $_SESSION['error'] !=""){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['duplicateemail']) && $_SESSION['duplicateemail'] !=""){
        echo $_SESSION['duplicateemail'];
        unset($_SESSION['duplicateemail']);
    }
    if(isset($_SESSION['signin_error']) && $_SESSION['signin_error'] !=""){
        echo $_SESSION['signin_error'];
        unset($_SESSION['signin_error']);
    }
    
}



/**
 * function that upload product images 
 * @return array
 */
function uploadImages(){

    $size = 10;
    $size =($size *1024 *1024);
    $allowed[] = "image/jpeg";
    $allowed[] = "image/png";
    $arr = array();

    $dir = "uploads/";

    //if folder doesn't exist create it
    if(!file_exists($dir)){
      mkdir($dir,0777,true);
    }

  
  foreach($_FILES as $key => $img_row){
    if($img_row['error']=="" && in_array($img_row['type'], $allowed) ){
      if($img_row['size'] < $size){
        //upload image to folder
        $destination = $dir.$img_row['name'];
        move_uploaded_file($img_row['tmp_name'], $destination);
        $arr[$key] = $destination;
        // resize_image($destination,$destination,500,575);

      }else{
        $_SESSION['error'] .= $key ."is larger than xax upload size (5 megabyte) <br/>";
      }

    }

   }
   return $arr;
}

//

/**
 * Function returns a sanitized data
 * @param string $slug 
 * @return string 
 */
function esc($slug){

    return addslashes($slug);


}
