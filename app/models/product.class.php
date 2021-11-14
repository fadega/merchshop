<?php
/**
 * Undocumented class
 */
class Product{



    public function create($data, $files){ //I am not using $files because I am using function(uploadimages) to access the global $_FILES
       $_SESSION['error']="";
       $conn =  Database::db_connect();


       $pro_data    = [];
       $images = uploadImages(); //custom function in function.pho

       foreach($images as $key =>$value){
         $pro_data[$key] = $value;     //keys are image1 image2 image 2 and values are whatever images added

       }

       $pro_data['name']        = $data->name;
       $pro_data['description'] = $data->description;
       $pro_data['price']       = $data->price;
       $pro_data['category']    = (int)$data->category;
       $pro_data['quantity']    = $data->quantity;
      //  $pro_data['image1']      = NULL;
      //  $pro_data['image2']      = NULL;
      //  $pro_data['image3']      = NULL;
       $pro_data['date']        = date("Y-m-d H:i:s");
       $pro_data['slug']        = $this->strtoslug($data->name);



      /*
      Converted the code block below to a function(uploadImage  in functions.php)

      */
       //This code repeats for update to  - make a funtion
       //set allowed files types and check files if exist
       //allowed images
      //  $allowed[] = "image/jpeg";
      //  $allowed[] = "image/png";
      // //  $allowed[] = "image/gif";
      // //  $allowed[] = "application/pdf";

      // //setting allowed uplpoad size and converting default byte size to megabytes
      // $size = 25; // allowed file size 10 megabytes
      // $size =($size *1024 *1024); //conver

      // //create directory where your images will be uploaded to - should be in public to be accessible
      // $dir = "uploads/";

      // //if folder doesn't exist create it
      // if(!file_exists($dir)){
      //   mkdir($dir,0777,true);
      // }

      //  foreach($files as $key => $img_row){
      //   if($img_row['error']=="" && in_array($img_row['type'], $allowed) ){
      //     if($img_row['size'] < $size){
      //       //upload image to folder
      //       $destination = $dir.$img_row['name'];
      //       move_uploaded_file($img_row['tmp_name'], $destination);
      //       $pro_data[$key] = $destination;

      //     }else{
      //       $_SESSION['error'] .= $key ."is larger than xax upload size (5 megabyte) <br/>";
      //     }

      //   }

      //  }



       //validate in backend
       if(!preg_match("/^[a-zA-Z 0-9]+$/",trim($pro_data['name']))){
              $_SESSION['error'] .= "Please enter valid product name <br/>";

       }
      //  if(!preg_match("/^[a-zA-Z0-9 ]+$/",trim($pro_data['description']))){
      //   $_SESSION['error'] .= "Please enter valid product description <br/>";

      //  }

       if(!is_numeric($pro_data['quantity'])){
        $_SESSION['error'] .= "Please enter valid quantity  <br/>";

        }
       if(!is_numeric($pro_data['price'])){
        $_SESSION['error'] .= "Please enter valid price <br/>";

        }

        //check for error in input
       if (!isset($_SESSION['error']) || $_SESSION['error']=="") {

            //check if the product already exists
           $sql = "SELECT name FROM product where name = :name limit 1";
           $arr['name']= $pro_data['name'];
           $check1 = $conn->read($sql,$arr);
           if (is_array($check1) && count($check1) >=1) {
               $_SESSION['error']="ERROR: Duplicate Product";
               return false;
           }

           $query = "INSERT INTO product (name, description, price, category, quantity, image1,image2,image3,date, slug) VALUES (:name, :description, :price, :category, :quantity, :image1,:image2,:image3,:date, :slug)";

           $check = $conn->write($query,$pro_data);
            if ($check) {
                 return true;
            }
            $_SESSION['error'] = "Problem with write - insertion query";

       }



    }

    public function editProduct($data){
      $conn   =  Database::newInstance();
      $arr    = [];
      $images = uploadImages();
      foreach($images as $key =>$value){
        $arr[$key] = $value;

      }
     $id = (int)$data->id;
      $arr['id']          = $id;
      $arr['name']        = $data->name;
      $arr['description'] = $data->description;
      $arr['price']       = $data->price;
      $arr['category']    = $data->category;
      $arr['quantity']    = $data->quantity;
      $arr['date']        = date("Y-m-d H:i:s");


      if(!isset($_SESSION['error']) || $_SESSION['error']==""){
        $query = "UPDATE product SET name = :name,description = :description,price = :price,category = :category,quantity = :quantity,image1 = :image1, image2 = :image2, image3 = :image3, date = :date WHERE id = :id limit 1 ";
        $conn->write($query,$arr);
      }



    }

    /**
     * Function to delete category
     * @param int $id
     *
     * @return void
     */
    public function deleteProduct($id){

      $conn =  Database::newInstance();
      $id = (int)$id;
      $query = "DELETE FROM product WHERE id ='$id' limit 1 ";
      $conn->write($query);

    }

    public function getProducts(){
        $conn =  Database::newInstance();

        return $conn->read("SELECT *FROM product order by name asc");
    }


    function make_table($products){
      $db =  Database::newInstance();
      $result="";
        if(is_array($products)){
          $products = (object)$products; // this is not object
          $counter = 0;
          foreach ($products as $product) {
          // $args = $product["id"]. ",'". $product["name"]."'";
            $args = $product["id"];
            //From the category table get the categoryname  associated with this product
            $catarr['id']= $product['category'];
            $sql = "SELECT categoryName FROM category where id =:id";
            $response = $db->read($sql,$catarr);
            $category = "";
            if($response){
               $category = $response[$counter]["categoryName"];
             }

            $info = array();
            $info["id"]           = $product["id"];
            $info["name"]         = $product["name"];
            $info["description"]  = $product["description"];
            $info["price"]        = $product["price"];
            $info["quantity"]     = $product["quantity"];
            $info["category"]     = $product["category"];
            $info["image1"]       = $product["image1"];
            $info["image2"]       = $product["image2"];
            $info["image3"]       = $product["image3"];

            //conver json to string
            $info = json_encode($info);
            $info =  str_replace('"',"'",json_encode($info));



            $result .= "<tr>";


              $result.='

              <td>'.$product["name"].'</td>
              <td>'.$product["description"].'</td>
              <td>'.$product["price"].'</td>
              <td>'.$product["quantity"] .'</td>
              <td>'.$category .'</td>
              <td><img src ="'.ROOT.$product["image1"] .'" style="width:70px;height:70px;"/></td>
               <td>'.date("jS M Y H:i:s", strtotime($product["date"])) .'</td>



                   <td>
                       <button info = "'.$info.'"  onclick="edit_record('.$args.', event)" class="btn btn-primary btn-xs"  data-bs-toggle="modal" data-bs-target="#editProductsModal"><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-danger btn-xs"  onclick="delete_record(event,'.$product["id"].')"><i class="fa fa-trash-o "></i></button>
                   </td>';

            $result.= "</tr>";


          }
          $counter++;


        }
        return $result;

      }



  public function strtoslug($url){
    $url = preg_replace('~[^\\pL0-9_]+~u', '-',$url);
    $url = trim($url, '-');
    $url = iconv("utf-8","us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9]+~','',$url);

    return $url;

  }





} //end of class
