<?php
/**
 * Undocumented class
 */
class Category{
    
   
    public function create($data){
       $_SESSION['error']="";
       $conn =  Database::db_connect();
       $arr['category'] = ucwords($data->category);
   
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

    public function editCategory($id,$categoryname){

      $conn =  Database::newInstance();
      $arr['id'] = (int)$id;
      $arr['category'] = $categoryname;
      $query = "UPDATE category SET categoryName = :category WHERE id = :id limit 1 ";
      $conn->write($query,$arr); 

        
    }

    /**
     * Function to delete category
     * @param int $id
     * 
     * @return void
     */
    public function deleteCategory($id){
      $conn =  Database::newInstance();
      $id = (int)$id;
      $query = "DELETE FROM category WHERE id ='$id' limit 1 ";
      $conn->write($query); 
        
    }

    public function getCategories(){
        $conn =  Database::newInstance();
       
        return $conn->read("SELECT *FROM category order by id asc");        
    }

    
    function make_table($cats){
        $result="";

        if(is_array($cats)){
          foreach ($cats as $cat_row) {
       
            $cat_row = (object) $cat_row;
            // $args = $cat_row->id. ",'". $cat_row->status."'";
            $args = $cat_row->id. ",'". $cat_row->categoryName."'";
         
            $result .= "<tr>";
         
              $result.='                    
                   <td><a href="#" class="text-dark">'.$cat_row->id.'</a></td>
                   <td><a href="#" class="text-dark">'.$cat_row->categoryName .'</a></td>
                  
                   <td>
                       <button class="btn btn-primary btn-xs"  data-bs-toggle="modal" data-bs-target="#editCategoryModal" onclick="edit_record('.$args.')"><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-danger btn-xs"  onclick="delete_record(event,'.$cat_row->id.')"><i class="fa fa-trash-o "></i></button>
                   </td>';
         
            $result.= "</tr>";
  
          }
    
  
        }
        return $result;
  
      }

      // <td><span onclick="disable_record('.$args.')" class ="label label-info label-mini text-secondary p-2 rounded" style="cursor:pointer; background-color:'.$color.'">'.$cat_row->status.'</span></td>

} //end of class

