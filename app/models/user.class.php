<?php
/**
 * Undocumented class
 */
class User{

/**
 * We accept user signup input and we validate the input.
 * No need to sanitize the input because we are using prepared statements, we just validate if the inputs 
 * are in a correct form using REGEX.
 * @param array $POST
 * @return void
 */

   public function signup($POST){

        //create instance to establish connection to the databse
       $instance = Database::db_connect();
   

       //Get POST data from user
       $name        = trim($POST['name']);
       $email       = trim($POST['email']);
       $password    = trim($POST['password']);
       $password2   = trim($POST['password2']);
       $phone       = trim($POST['phone']);
       $address     = trim($POST['address']);
       //$checkagree  = $POST['termscheck'];

        
       //call validation function - from /core/functions.php
       $error = validateInput($name, $email, $password,$password2,$phone,$address);
       if($error==""){
           //if there is no validation error, prepare data to push it to the database;
           $hashedPass = hash('sha1',$password);
           $data['name']     = $name; 
           $data['email']    = $email; 
           $data['password'] = $hashedPass;
           $data['userid']   = $this->generate_random_userid(60);
           $data['phone']    = $phone;
           $data['address']  = $address;
           
           //fixed entries
           $data['date'] = date("Y-m-d H:i:s");
           $data['role'] = "customer";

            //Before pushing data to database, check if there is a user with the same email already in the database
            $query        = "SELECT email FROM user WHERE email = :email limit 1";
            $arr['email'] = $data['email'];
            $check        = $instance->read($query,$arr);
            if(is_array($check) && count($check)>0){
                $message ='<a href="'.ROOT.'signin">Login</a> instead';
                $_SESSION['duplicateemail'] = "User already exists, ".$message;
               
            }
            
            //One last check for userid before pushing data to database
            $arr           = []; //unset the array from previous value
            $sql           = "SELECT userid FROM user WHERE userid = :userid limit 1";
            $arr['userid'] = $data['userid'];
            $check         = $instance->read($sql,$arr);
            if(is_array($check)){
                //generate another random userid
                $data['userid']   = $this->generate_random_userid(60);
               
            }

            //Push data to database
           $query = "INSERT INTO user (userid,name,email,phone,password,role,address,date) VALUES( :userid, :name, :email, :phone, :password, :role, :address, :date)";
           $success = $instance->write($query,$data);
           if($success){
              //redirect and exit from here;
               header('location:'.ROOT.'signin?signup=success');
               die;
           }
 
       }else{
           $_SESSION['error']  = $error;
           
       }
     



    }


    /**
     * This function confirms user's registration and logs them in.
     * @param array $POST
     * @return void
     */
    public function signin($POST){
        //Establish connection
       $instance = Database::db_connect();
        //Get POST data from user
        
       $error = "";
       $data['email']       = trim($POST['email']);
       $data['password']    = trim($POST['password']);
      //$data['keepmesigned']  = trim($POST['keepmesigned']);
     
      
       if(empty($data['email']) || !preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/",$data['email'])){
               $error.= 'Wrong eamil or password<br />';
   
        }
        $uppercase    = preg_match('@[A-Z]@', $data['password']);
        $lowercase    = preg_match('@[a-z]@', $data['password']);
        $number       = preg_match('@[0-9]@', $data['password']);
        $specialChars = preg_match('@[^\w]@', $data['password']);
        
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
            $error.= "Wrong eamil or password. <br />";
            }
        

        if($error == ""){
            //check user in database
            //hash the password input
            $data['password'] = hash('sha1',$data['password']);

            //get a user with these credentials 
            $query = "SELECT * FROM user WHERE email = :email && password = :password limit 1";
            $result = $instance->read($query,$data);
            if(is_array($result)){
                 //store logged user details
                $_SESSION['logged']  = $result[0];
                //show( $_SESSION['logged']);
                if($_SESSION['logged']['role']=="admin"){
                    //if admin user
                    header('location:'.ROOT.'admin');
                    die;
  
                }else{
                    //if standard user 
                    header('location:'.ROOT.'profile');
                    die;
                }
 
                            
            }
                   
            $error.= "Oops! Wrong credentials <br />";

        }
            //if execution gets here, it meeans credentials weren't OK
            $_SESSION['error']  = $error;
        
        
        
    }


    /**
     * Get a user from database
     * @param mixed $id
     * 
     * @return [type]
     */
    public function getUser($id){
        //get user with this id
   

    }

      
    /**
     * Checks if user is loggedin
     * @return array
     */
    public function checkLogin(){
        if(isset($_SESSION['logged'])){
            $user['userid'] = $_SESSION['logged']['userid'];
            $sql = "SELECT * FROM user WHERE userid = :userid limit 1";
            $db = Database::db_connect();
            $result = $db->read($sql,$user);
            if(is_array($result)){
                //user is logged in
                 return $result[0]; //return the first/only row[array]
            }
        }
        return false;

    }


    /**
     * unsets the session for loggin, and signs out a user
     * Log user out 
     * @return void
     */
    public function signout(){

        if(isset($_SESSION['logged'])){
            unset($_SESSION['logged']);
              //redirect to home
            header("location:".ROOT."signin");
            die;
        }
      
    }


      /**
     * Generates a random user id for new user
     * @param integer $length
     * @return string
     */
    public function generate_random_userid($len){
        
        $array = [0,1,2,3,4,5,6,7,8,9, 'A','a', 'B', 'b','C', 'c', 'D', 'd','E', 'e', 'F', 'f', 'G', 'g', 'H' ,'h', 'I', 'i', 'J', 'j' ,'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P' ,'p' ,'Q','q', 'R', 'r', 'S', 's', 'T', 't' ,'U' ,'u', 'V', 'v', 'W', 'w' ,'X' ,'x' ,'Y' ,'y' ,'Z' ,'z'];
        $randomuserid = "";
        $length = rand(6,$len);
        for($i=0; $i<$length; $i++){
            $random = rand(0,61);
            $randomuserid .= $array[$random];
        }
 
        
         return $randomuserid;
 
     }    

    

     /**
      * Creates a user if it doesn't already exist
      * @param mixed $data
      * @return boolean 
      */
    function creatUser($data){
        
        $_SESSION['error'] = "";
        
        $conn              = Database::db_connect();
        $arr['userid']     = $this->generate_random_userid(6);
        $arr['name']       = ucwords($data->name);
        $arr['email']      = $data->useremail;
        $arr['phone']      = $data->userphone;
        $arr['password']   = ucwords($data->name) .'@'. "zacecom2021";
        $arr['role']       = "admin";
        $arr['address']    = $data->useraddress;
        $arr['date']       =  date("Y-m-d H:i:s");


      $error = validateInput($arr['name'], $arr['email'], $arr['password'],$arr['password'], $arr['phone'], $arr['address']);
        if($error != ""){
            $_SESSION['error'] = $error;
        }
        //hash password - replacing the text password with hashed password
       $arr['password']   = hash('sha1', $arr['password']);
      
       if (!isset($_SESSION['error']) || $_SESSION['error']=="") {

                //check if email already exists
            $query = "SELECT * FROM user WHERE email = :email limit 1";
            $email['email'] = $data->useremail;
            $result = $conn->read($query,$email);

            if(is_array($result)){
                $_SESSION['error'] = "User with this email already exists";
               return false;

            }else{

                //userid name email phone password role address date

                $query = "INSERT INTO user (userid, name, email, phone, password, role, address, date) values(:userid, :name, :email, :phone, :password, :role, :address, :date)";
                $check = $conn->write($query,$arr);
                if ($check) {
                    // echo "got here";
                    return true;
                }

            }

       }

     }





     /**
      * Gets users(identified as admins) from the database
      * @return array if data
      */
     public function getUsers(){
        $conn =  Database::newInstance();
       
        return $conn->read('SELECT *FROM user WHERE role ="admin" ORDER BY id asc');        
     }

     /**
      * Returns customs(users identified as customers)
      * @return array of data
      */
     public function getCustomers(){
      $conn =  Database::newInstance();
     
      return $conn->read('SELECT *FROM user WHERE role ="customer" ORDER BY id asc');        
   }




    /**
     * Function edits user(admin user) data
     * @param mixed $data
     * @return none
     */
    public function editUser($data){
        // echo "I Data passed";
        // show($data);
    
        $conn           =  Database::newInstance();
        $id             = (int)$data->id;
        $userdata['id'] = $id;
    
     
        $sql = 'SELECT *FROM user WHERE id =:id limit 1';
        $existing_details = $conn->read($sql,$userdata);
    
          //get the data which will not need update or can't be updated and push it back
        if(is_array($existing_details)){
            $userdata['userid']   = $existing_details[0]['userid'];
            $userdata['date']     = $existing_details[0]['date'];
            $userdata['role']     = $existing_details[0]['role'];
            $userdata['password'] = $existing_details[0]['password'];

        }
        $userdata['name']    = ucwords($data->name);
        $userdata['email']   = $data->useremail;
        $userdata['phone']   = $data->userphone;
        $userdata['address'] = $data->useraddress;
     
     
  
        if(!isset($_SESSION['error']) || $_SESSION['error']==""){
          $query = "UPDATE user SET userid=:userid, name=:name, email=:email, phone=:phone, password=:password, role=:role, address=:address, date=:date  WHERE id =:id limit 1 ";
          $conn->write($query,$userdata); 
        }else{
            $_SESSION['error'] = "Error Updating user, user.class.php ";
          //  die;
        }
        
  
          
      }




      /**
     * Function edits user(customer user) data
     * @param mixed $data
     * @return none
     */
      public function editCustomer($data){
        // echo "I Data passed";
        // show($data);
    
        $conn           =  Database::newInstance();
        $id             = (int)$data->id;
        $userdata['id'] = $id;
    
     
        $sql = 'SELECT *FROM user WHERE id =:id limit 1';
        $existing_details = $conn->read($sql,$userdata);
    
          //get the data which will not need update or can't be updated and push it back
        if(is_array($existing_details)){
            $userdata['userid']   = $existing_details[0]['userid'];
            $userdata['date']     = $existing_details[0]['date'];
            $userdata['role']     = $existing_details[0]['role'];
            $userdata['password'] = $existing_details[0]['password'];

        }
        $userdata['name']    = ucwords($data->name);
        $userdata['email']   = $data->useremail;
        $userdata['phone']   = $data->userphone;
        $userdata['address'] = $data->useraddress;
     
     
  
        if(!isset($_SESSION['error']) || $_SESSION['error']==""){
          $query = "UPDATE user SET userid=:userid, name=:name, email=:email, phone=:phone, password=:password, role=:role, address=:address, date=:date  WHERE id =:id limit 1 ";
          $conn->write($query,$userdata); 
        }else{
            $_SESSION['error'] = "Error Updating user, user.class.php ";
          //  die;
        }
        
  
          
      }


    
    /**
     * creates the table of users
     * @param mixed $array objects
     *  @return [string]
     */
    function make_table($users){
        //  echo "make table from user class";
        //  show($users);die;
        $result ="";

        if(is_array($users)){
          foreach ($users as $user_row) {

           $user_row = (object) $user_row;
          $args = $user_row->id;
          $info            = array();
        
           $info["id"]      = $user_row->id;
           $info["name"]    = ucwords($user_row->name);
           $info["email"]   = $user_row->email;
           $info["phone"]   = $user_row->phone;
           $info["address"] = $user_row->address;
  
            //conver json to string
           $info = json_encode($info);
           $info =  str_replace('"',"'",json_encode($info));

            $result .= "<tr>";
           //userid name email phone password role address date
              $result.='                    
                   <td><a href="#" class="text-dark">'.$user_row->id.'</a></td>
                   <td><a href="#" class="text-dark">'.$user_row->name .'</a></td>
                   <td><a href="#" class="text-dark">'.$user_row->email .'</a></td>
                   <td><a href="#" class="text-dark">'.$user_row->phone .'</a></td>
                   <td><a href="#" class="text-dark">'.$user_row->address .'</a></td>
                   <td><a href="#" class="text-dark">'.$user_row->date .'</a></td>
                  
                   <td>

                       <button info = "'.$info.'"  onclick="edit_record('.$args.', event)" class="btn btn-primary btn-xs"  data-bs-toggle="modal" data-bs-target="#editUserModal" ><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-danger btn-xs"  onclick="delete_record(event,'.$user_row->id.')"><i class="fa fa-trash-o "></i></button>
                   </td>';
         
            $result.= "</tr>";
  
          }
    
  
        }
        return $result;
  
      }

      /**
       * deletes a admin user identified by id
       * @param int $id
       * @return [boolean]
       */
      public function deleteUser($id){
        $conn =  Database::newInstance();
        $id = (int)$id;
        $query = "DELETE FROM user WHERE id ='$id' limit 1 ";
        $conn->write($query);
      }

       /**
       * deletes a customer identified by id
       * @param int $id
       * @return [boolean]
       */
      public function deleteCustomer($id){
        $conn =  Database::newInstance();
        $id = (int)$id;
        $query = "DELETE FROM user WHERE id ='$id' limit 1 ";
        $conn->write($query);
      }


     /**
      * Deletes a profile of a user/customer
      * @param mixed $email
      * @return none
      */
     public function deleteProfile($email){
        $conn =  Database::newInstance();
        $query = "DELETE FROM user WHERE email ='$email' limit 1 ";
        $res = $conn->write($query);
        if($res){
          unset($_SESSION['logged']);
          header("location:" .ROOT);
        }

      }
     





      









    
    
    
} //end of class