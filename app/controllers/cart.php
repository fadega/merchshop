<?php
/**
 *  Enables adding and removing items to/from the cart  and adding quantity 
 *  Also redirects to proper pages 
 */
class Cart extends Controller{

 private $redirect_to ="";
    // private $data ;
    //defualt method
    function index($id = ''){
        $this->set_redicrect();

     
        $id = esc($id);
        $conn = Database::newInstance();
        $CARTROWS = false;
        $product = $conn->read("SELECT *FROM product where id = :id limit 1",["id"=>$id]);

        //does the product exist [check before adding to acrt]
        if($product){
            
            $product = (object)$product[0]; // just get the single product details 
         
            //ADDING ITEMS TO CART 
            // check if it exists in a cart 
            if(isset($_SESSION['CART'])){
                $ids = array_column($_SESSION['CART'],'id');
                if(in_array($product->id, $ids )){ // if already exist -add quantity
                    $key = array_search($product->id, $ids);//get the key
                    $_SESSION['CART'][$key]['qty']++;

                }else{
                    $arr        = [];
                    $arr['id']  = $product->id;
                    $arr['name'] =  $product->name;   
                    $arr['price'] =  $product->price;   
                    $arr['qty'] = 1;       
                    $_SESSION['CART'][]  = $arr;

                }


            }else{ //it means it's not in the cart already
                
                $arr        = [];
                $arr['id']  = $product->id;
                $arr['name'] =  $product->name;   
                $arr['price']  = $product->price;
                $arr['qty'] = 1;       
                $_SESSION['CART'][]  = $arr;
               

            }
            
        }
        
        $product_ids = [];
        if(isset($_SESSION['CART'])){
            $product_ids = array_column($_SESSION['CART'],'id');

            $str_ids = "'" . implode("','", $product_ids) ."'";
            $CARTROWS = $conn->read("SELECT *FROM product WHERE id in ($str_ids)");
      
            
        }
       
        // show($ROWS); just as they come from the database
     
        if(is_array($CARTROWS)){  //loop through items only if we have items returned from the product table
            foreach ($CARTROWS as $key => $row) {
                foreach($_SESSION['CART'] as $item){
                    if($row['id'] == $item['id']){
                        $CARTROWS[$key]['cart_qty'] = $item['qty'];
                        break;
    
                    }
                }
                
            }

        }
      
    //    show($ROWS);//modified with the above code to hold how many of each are there
       $data["Page_title"] = "Shopping Cart";
       $data['CARTROWS'] =  $CARTROWS;

    //    $data['CART_ROWS'] = $CARTROWS;
        // show($CARTROWS);
       $_SESSION['CART_ITEMS'] = $CARTROWS;
    //    show(  $_SESSION['CART_ITEMS']);
    
     $this->view("zac/cart",$data);
    //  $this->view("zac/cart",$data);
     
   
    
        
    }

    public function add_quantity($id = ''){
        $this->set_redicrect();
       $id = esc($id);
       if(isset($_SESSION['CART'])){
           foreach($_SESSION['CART'] as $key =>$item){
            if($item['id'] == $id){ // if item is found (matching id)
                $_SESSION['CART'][$key]['qty']+= 1;   // add to it
                
                // $_SESSION['CART'] = array_values($_SESSION['CART']);
                break;
            }
           }
       }

       $this->redirect();

    }

    public function subtract_quantity($id = ''){
        $this->set_redicrect();
        $id = esc($id);
       if(isset($_SESSION['CART'])){
           foreach($_SESSION['CART'] as $key =>$item){
            if($item['id'] == $id){ // if item is found (matching id)
                if( $_SESSION['CART'][$key]['qty']>1){
                    $_SESSION['CART'][$key]['qty']-= 1;
                     // subtract from it
                    //  $_SESSION['CART'] = array_values($_SESSION['CART']);
                    break;
                }else if($_SESSION['CART'][$key]['qty'] == 1){
                    // echo 'script> if(alert("Are you sure to remove the last item?")){
                    //     return
                    //      }</script>';
                        // $this->remove($id); //call the delete method
                        break;
                }
                break;
                 
            }
           }
       }
       $this->redirect();
    }


    public function remove($id = ''){
        $this->set_redicrect();
        $id = esc($id);
        if(isset($_SESSION['CART'])){
            foreach($_SESSION['CART'] as $key =>$item){
             if($item['id'] == $id){ // if item is found (matching id)
                unset($_SESSION['CART'][$key]);   // unset - remove
                $_SESSION['CART'] = array_values($_SESSION['CART']); 
                 break;
             }
            }
        }
        $this->redirect();
    }
    
       
 private function redirect(){
     
        
    header("location:" .ROOT.'cart');
    //  header("location:" . $this->redirect_to);
  
 }

 private function set_redicrect(){
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !="" ){
            $this->redirect_to = $_SERVER['HTTP_REFERER'];
        }else{
            $this->redirect_to = ROOT."shop";
        }
 }




}