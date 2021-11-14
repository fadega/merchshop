<?php
/**
 * Undocumented class
 */
class Customer{
    

    public function addCustomer($data){
        $_SESSION['error']="";
        $conn =  Database::db_connect();
        $arr['customer'] = ucwords($data->role);
    
        if(!preg_match("/^[a-zA-Z ]+$/",trim($arr['category']))){
         //    echo "<br/> if you see this, the preg_match is bulshiting<br />";
            $_SESSION['error'] = "Please enter valid category name";
 
        }
        if (!isset($_SESSION['error']) || $_SESSION['error']=="") {
 
             //check if the category already exists
           //  $sql = "SELECT *FROM category where categoryName = :category && status=:status order by id asc";
            $sql = "SELECT *FROM category where categoryName = :category";
            $check1 = $conn->read($sql,$arr);
            if (is_array($check1) && count($check1) >=1) {
                $_SESSION['error']="ERROR: Duplicate Record";
                return false;
            } 
 
             //if it gets in here, no duplicate record found
             $query = "INSERT INTO category (categoryName) values(:category)";
             $check = $conn->write($query,$arr);
             if ($check) {
                 return true;
             }
           
        }

    }

    public function editCustomer(){

        
    }

    public function deleteCustomer(){
        
    }

} //end of class