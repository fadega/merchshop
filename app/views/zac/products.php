<?php

$this->view("zac/adminheader",$data);
$conn = Database::newInstance();

$query = "select *from category";
$result= $conn->read($query);

?>


<style>
    #js-image-container img{
        width:120px;
        height:120px;

    }
</style>


<!-- Dashboard right side section-->
<section class="mt-5 p-4 bg-light" id="display-area">

<h3 class="my-4">Admin</h3>


<div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <!-- <h4><i class="fa fa-angle-right"></i>Product Categories</h4> -->
                    <h4> Products  <button class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#addProductsModal"><i class="fa fa-plus"></i>Add Product</button></h4>

                    <!-- Add Product Modal -->
                        <div class="modal fade" id="addProductsModal" tabindex="-1" aria-labelledby="addProductsModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProduct">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-md-6 left">
                                        <label for="name">Product Name*</label>
                                        <input type="text" name="name" id ="productname" class="form-control form-control-lg mb-3" placeholder="Type product name" >
                                        <label for="price">Price*</label>
                                        <input type="number" step="0.01" value ="0.00" name="price" id ="price" class="form-control form-control-lg mb-3" placeholder="0.00"  >
                                        <label for="quantity">Quantity*</label>
                                        <input type="number"value="5" name="quantity" id ="quantity" class="form-control form-control-lg mb-3"  placeholder="5" >


                                        <select  id="category" class="form-select form-select-lg mb-3" aria-label=".form-select ">
                                            <option selected>Select Category*</option>
                                            <?php
                                            // show($categories);
                                            // if(is_array($categories)):?>
                                            //    <?php // foreach($categories as $cat):?>
                                               <!-- option value="<?//=$cat['id']?>"><?//=$cat['categoryName']?></option -->

                                                 <?php //endforeach;

                                            // endif;

                                            if($result){
                                               for($count =0; $count < count($result); $count++){?>
                                                     <option value="<?php echo (int)$result[$count]['id'];?>"><?php echo $result[$count]['categoryName'];?></option>
                                               <?php }
                                           } ?>
                                        </select>


                                    </div>

                                    <div class="col-md-6 right">
                                        <div>
                                            <label for="formFileLg" class="form-label">Thumbnail image*</label>
                                            <input class="form-control form-control-lg mb-3" id="image1" type="file">
                                        </div>
                                        <div>
                                            <label for="formFileLg" class="form-label">Upload Image2</label>
                                            <input class="form-control form-control-lg mb-3" id="image2" type="file">
                                        </div>
                                        <div>
                                            <label for="formFileLg" class="form-label">Upload Image3</label>
                                            <input class="form-control form-control-lg mb-3" id="image3" type="file">
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control mb-3" placeholder="Description" id="description" style="height: 100px" ></textarea>
                                            <label for="description">Description</label>
                                        </div>

                                    </div>
                                </div> <!--Row inside card-->
                             </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="savepro" onclick=" collect_data(event)">Save </button>

                            </div>
                            <p class="form-text ms-2 text-danger">  * All fields are mandatory</p>
                            </div>
                         </div>
                        </div>
                    <!-- END Add product Modal -->

                     <!-- EDIT Product Modal -->
                    <div class="modal fade" id="editProductsModal" tabindex="-1" aria-labelledby="addProductsModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" >Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-md-6 left">
                                       <label for="name">Product Name*</label>
                                        <input type="text" name="name" id ="updatename" class="form-control form-control-lg mb-3" >
                                        <label for="name">Price*</label>
                                        <input type="text" name="price" id ="updateprice" class="form-control form-control-lg mb-3" >
                                        <label for="name">Quantity*</label>
                                        <input type="text" name="quantity" id ="updatequantity" class="form-control form-control-lg mb-3" >

                                         <select  id="updatecategory" class="form-select form-select-lg mb-3" aria-label=".form-select ">
                                            <option selected>Select Category*</option>
                                            <?php
                                            if($result){
                                                for($count =0; $count < count($result); $count++){?>
                                                     <option value="<?php echo (int)$result[$count]['id'];?>"><?php echo $result[$count]['categoryName'];?></option>
                                               <?php }
                                            } ?>
                                        </select>

                                    </div>

                                    <div class="col-md-6 right">
                                        <div>
                                            <label for="formFileLg" class="form-label">Thumbnail*</label>
                                            <input class="form-control form-control-lg mb-3" id="updateimage1" type="file">
                                        </div>
                                        <div>
                                            <label for="formFileLg" class="form-label">Upload Image2</label>
                                            <input class="form-control form-control-lg mb-3" id="updateimage2" type="file">
                                        </div>
                                        <div>
                                            <label for="formFileLg" class="form-label">Upload Image3</label>
                                            <input class="form-control form-control-lg mb-3" id="updateimage3" type="file">
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control mb-3" placeholder="Description" id="updatedescription" style="height: 100px" ></textarea>
                                            <label for="description">Description*</label>
                                        </div>

                                    </div>
                                </div>
                             </div>
                             <div class="row m-3" id="js-image-container">
                                 <div class="col-md-3 js-image1"></div>
                                 <div class="col-md-3 js-image2"></div>
                                 <div class="col-md-3 js-image3"></div>
                             </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btnupdate" onclick="update_product_data(event)">update </button>
                            </div>
                            <p class="form-text ms-2 text-danger">* All fields are mandatory</p>
                            </div>
                         </div>
                        </div>

                    <!-- END  EDIT Product Modal -->


                <!-- <hr> -->
                    <thead>
                    <tr>


                        <th><i class="fa faa-bullhorn"></i> Name</th>
                        <th><i class=" fa faa-edit"></i> Description</th>
                        <th><i class=" fa faa-edit"></i>Price</th>
                        <th><i class="fa faa-bullhorn"></i> Quatity</th>
                        <th><i class="fa faa-bullhorn"></i> Category</th>
                        <th><i class="bi bi-file-earmark-image"></i>Thumbnail</th>
                        <th><i class="bi bi-calendar3"></i> Date</th>
                        <th><i class="bi bi-calendar3"></i> Action </th>
                    </tr>
                    </thead>
                    <tbody id="product_table_body">
                        <?php

                        //this line prints table [check full code on admin.php]

                        echo $tbl_rows;
                        //echo  $data['tbl_rows'];
                    ?>

                    </tbody>
                </table>

            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->





 <!-- Javascript code to handle  -->




<script>

    var EDIT_ID =0;

    function collect_data(e){

        //creating a form to get data through post
        let data = new FormData();

        let name = document.getElementById("productname").value.trim();
        let description = document.getElementById("description").value.trim();
        let price = document.getElementById("price").value.trim();
        let quantity = document.getElementById("quantity").value.trim();

        let selectElement = document.querySelector('#category');
        let category  = selectElement.options[selectElement.selectedIndex].value;

        //Front end validation - user input validation

        if(productname == "" || !isNaN(productname)){
            alert("Please enter a valid product name");
            return ;
        }

        if(description == "" || description.length<=15){
            alert("Please enter a valid description of at least 15 characteres");
            return ;
        }

        if(price <= 0 || isNaN(price) || price <=1 ){
            alert("Please put appropriate price");
            return ;
        }
        if(quantity <= 0 || isNaN(quantity) ){
            alert("Quantity can't be zero or less");
            return ;
        }
        if(isNaN(category)){
            alert("Please select a category");
            return ;
        }


        //get images

        let image1 = document.querySelector("#image1");
        if(image1.files.length == 0 ){
            alert("Please select an image");
            return ;
        }

        //for optional images,  get them they exist
        let image2 = document.querySelector("#image2");
        if(image2.files.length > 0 ){

            data.append("image2",image2.files[0]);
        }

        let image3 = document.querySelector("#image3");
        if(image3.files.length > 0 ){

            data.append("image3",image3.files[0]);
        }


        data.append("name",name);
        data.append("description",description);
        data.append("price",price);
        data.append("category",category);
        data.append("quantity",quantity);
        data.append("image1",image1.files[0]); //old line
        data.append("data_type","add_product");

        //call function and pass data
        send_data_files(data);

    }



    /**
     * Function passes data collected from forms  to ajax handling class
     * @param mixed formdata
     * @return void
     */
    function send_data_files(data){


        var ajax = new XMLHttpRequest();
        ajax.addEventListener('readystatechange', function(){
            //check if there is response
            if(ajax.readyState == 4 && ajax.status == 200){
                //handle the response
                handle_results(ajax.responseText);

            }
        });
        //send data
        ajax.open("POST","<?=ROOT?>ajax_products", true);
        ajax.send(data); // to accept data from POST
        // ajax.send(JSON.stringify(data)); // to get data as file input


    }



    /**
     * This is a complex function that handles ajax response
     * New line curly braces ""  are used to make where each condition ends - this style isn't followed in the rest of the code
     * @param mixed result - ajax response data
     * @return void - prints table and error messages
     */
    function  handle_results(result)
    {
          console.log(typeof result);
          console.log(result);
          if(result!=="")
          {
            // console.log(result);
            let obj = JSON.parse(result);
            // alert("Obje alert ", obj);
            // alert(obj.data_type);
            if(typeof obj.data_type!=='undefined')
            {
                if(obj.data_type == "add_product")
                {
                    //alert("add reached");
                    if(obj.message_type=="info")
                    {

                        document.getElementById("productname").value = "";
                        document.getElementById("price").value = "";
                        document.getElementById("description").value = "";
                        document.getElementById("quantity").value = "";
                        document.querySelector('#category').text="Select Category";

                        let table_body = document.getElementById("product_table_body");
                        table_body.innerHTML=obj.data;
                        // alert(obj.message);
                    }else
                    {
                           alert(obj.message);
                    }

                }else if(obj.data_type == "delete_product")
                {
                    let table_body = document.getElementById("product_table_body");
                    table_body.innerHTML=obj.data;
                    // alert(obj.message);

                }else if(obj.data_type == "edit_product")
                {
                    let table_body = document.getElementById("product_table_body");
                    table_body.innerHTML=obj.data;
                    alert(obj.message);

                }

            }
        }
     }


    /**
     * Function to bring data to be edited
     * @param event e
     * @param number id
     * @returnvoid
     */
    function edit_record(id, e){

        var info = e.currentTarget.getAttribute("info");
        console.log(info);
        info = JSON.parse(info.replaceAll("'",'"')); //replace single quotes by double quotes to make it a proper json object
        info = JSON.parse(info);
        console.log(info);
        EDIT_ID = info.id;


        let txt_product      = document.querySelector("#updatename");
        let txt_description  = document.querySelector("#updatedescription");
        let txt_price        = document.querySelector("#updateprice");
        let txt_quantity     = document.querySelector("#updatequantity");
        let category         = document.querySelector('#updatecategory');

        //view what images were uploaded in the past
        let js_image1= document.querySelector(".js-image1");
        js_image1.innerHTML = `<img src="<?=ROOT?>${info.image1}" />` ;

        let js_image2= document.querySelector(".js-image2");
        js_image2.innerHTML = `<img src="<?=ROOT?>${info.image2}" />` ;

        let js_image3= document.querySelector(".js-image3");
        js_image3.innerHTML = `<img src="<?=ROOT?>${info.image3}" />` ;


        txt_product.value      = info.name;
        txt_description.value  = info.description;
        txt_price.value        = info.price;
        category.value         = info.category;
        txt_quantity.value     = info.quantity;

        let image1             = document.querySelector("#updateimage1");
        let image2             = document.querySelector("#updateimage2");
        let image3             = document.querySelector("#updateimage3");
        image1.files[0]        = info.image1;
        image2.files[0]        = info.image2;
        image3.files[0]        = info.image3;







    }

    /**
     * Function to actually send data to pushed to database
     * @param event e
     * @return void
     */
    function update_product_data(e){

      //collect all data in the fields like the original collect_data method
        data = new FormData();


        let name          = document.querySelector("#updatename").value.trim();;
        let description   = document.querySelector("#updatedescription").value.trim();
        let price         = document.querySelector("#updateprice").value.trim();
        let quantity      = document.querySelector("#updatequantity").value.trim();

        let selectElement = document.querySelector('#updatecategory');
        let category      = selectElement.options[selectElement.selectedIndex].value;

        if(name == "" || !isNaN(name)){
            alert("Please enter a valid product name");
            return ;
        }

        if(description == "" || description.length<=15){
            alert("Please enter a valid description of at least 15 characteres");
            return ;
        }

        if(price <= 0 || isNaN(price) || price <=1 ){
            alert("Please put appropriate price");
            return ;
        }
        if(quantity <= 0 || isNaN(quantity) ){
            alert("Quantity can't be zero or less");
            return ;
        }
        if(isNaN(category)){
            alert("Please select a category");
            return ;
        }



        //while updating even image 1 is optiona
        let image1 = document.querySelector("#updateimage1");
        if(image1.files.length > 0 ){

            data.append("image1",image1.files[0]);
        }

        let image2 = document.querySelector("#updateimage2");
        if(image2.files.length > 0 ){

            data.append("image2",image2.files[0]);
        }

        let image3 = document.querySelector("#updateimage3");
        if(image3.files.length > 0 ){

            data.append("image3",image3.files[0]);
        }



        data.append("name",name);
        data.append("description",description);
        data.append("price",price);
        data.append("category",category);
        data.append("quantity",quantity);
        data.append("id",EDIT_ID);
        data.append("data_type","edit_product");

        send_data_files(data);

    }

    /**
     * Function to delete a record of products
     * @param event e
     * @param number id(product id)
     * @return void
     */
    function delete_record(e,id){

        if(!confirm("Are you sure to delete the record?")){
            return; //exit
        }

        let formdata = new FormData();
        formdata.append("id",id);
        formdata.append("data_type","delete_product");
        send_data_files(formdata);

    }




 </script>



</section>
<!-- End Dashboard right side section-->


<!-- Admin footer and  assets  -->
<?php $this->view("zac/adminassets",$data);

// $this->view("zac/adminfooter",$data);

?>
