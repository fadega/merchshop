<?php

/**
 * NOW THIS CLASS IS PROPERLY DOCUMENTED <= except this line
 * This is a core class that deals with database connectivity
 */
class Database{
    

    public static $conn;
    /**
     *A constructor the initially connects to db
     */
    public function __construct()
    {
        try{
            $dsn = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME;
            self::$conn = new PDO($dsn,DB_USER,DB_PASS);
        }catch(PDOException $th){
            die($th->getMessage());
        }
  
    }

    /**
     * Creates an instance of the class database
     * @return object
     */
    public static function db_connect(){
        if(self::$conn){
           return self::$conn;
        }
        // $instance = new self();
        return $instance = new self();
    }

    //to avoid calling the same instance
    public static function newInstance(){
      
       // $instance = new self();
        return $instance = new self();
    }

    
    /**
     * Method reads data fron the database
     * @param mixed $query
     * @param array $data
     * @return array - can return a boolean too
     */
    
     public function read($query, $data = []){
        
        $stmt = self::$conn->prepare($query);
        $result = $stmt->execute($data);
     
        if($result){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($data) && count($data) > 0){
             
                return $data;
            }
        }
        return false;

    } 

       
    /**
     * Writes data into the database
     * @param mixed $query
     * @param mixed $data=[] -> paramaters passed, for example insert/update data
     * @return boolean
     */
     public function write($query, $data = []){
       
        $stmt = self::$conn->prepare($query);
        $result = $stmt->execute($data);
       
        if($result){
        
          return true;
            
        }
        return false;
    
    } 
  
}



