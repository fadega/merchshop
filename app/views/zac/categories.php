<?php

$this->view("zac/adminheader",$data);

?>



<!-- Dashboard right side section-->
<section class="mt-5 p-4 bg-light" id="display-area">

<h3 class="my-4">Admin</h3>


<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <!-- <h4><i class="fa fa-angle-right"></i>Product Categories</h4> -->
	                  	  	  <h4> Categories <button class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fa fa-plus"></i>Add Category</button></h4>


                              <!-- Add Category Modal -->
                                  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="addCategoryModal">Add Category</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <input type="text" name="categoryname" id ="catname" class="form-control form-control-lg" placeholder="Enter category name" >
                                         </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary" id="btnsave" onclick="collect_data(event)">Save </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              <!-- END Add category Modal -->

                               <!-- EDIT category Modal -->
                              <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="edittitle">Edit Category</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <input type="text" name="catname" id ="editcatname" class="form-control form-control-lg"  >
                                         </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                          <button type="button" class="btn btn-primary" id="btnupdate" onclick="update_category_data(event)">Update </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                               <!-- END EDIT category Modal -->


                            <!-- <hr> -->
                              <thead>
                              <tr>
                                  <th class="hidden-phone"><i class="fa faa-question-circle"></i> ID #</th>
                                  <th><i class="fa faa-bullhorn"></i> Category Name</th>
                                  <!-- <th><i class=" fa faa-edit"></i> Status</th> -->
                                  <th><i class=" fa faa-edit"></i>Action</th>
                              </tr>
                              </thead>
                              <tbody id="table_body">
                                  <?php

                                    //this line prints table [check full code on admin.php]

                                    echo $tbl_rows;
                                    // echo  $data['tbl_rows'];
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
        var category = document.getElementById("catname").value.trim();
        if(category == "" || !isNaN(category)){
            alert("please enter a valid category name");
        }
    // catetory = category.trim();
        send_data({
            category:category,
            data_type:"add_new"
            });

    }


    function send_data(data ={}){

        var ajax = new XMLHttpRequest();
        ajax.addEventListener('readystatechange', function(){
            //check if there is response
             if(ajax.readyState == 4 && ajax.status == 200){
                 //handle the response
                handle_results(ajax.responseText);

            }
        });
        //send data
        ajax.open("POST","<?=ROOT?>ajax_category", true);
        ajax.send(JSON.stringify(data));


    }

    /**
     * This is a complex function that handles ajax response
     * New line braces { } are used to make where each condition ends - this style isn't followed in the rest of the code
     * @param mixed result - ajax response data
     * @return void - prints table and error messages
     */
    function  handle_results(result)
    {
        console.log(typeof result);
          console.log(result);
          if(result!=="")
          {

            let obj= JSON.parse(result);
            // alert("Obje alert ", obj);
            // alert(obj.data_type);
            if(typeof obj.data_type!=='undefined')
            {
                if(obj.data_type == "add_new")
                {
                    // alert("add reached");
                    if(obj.message_type=="info")
                    {

                        document.getElementById("catname").value = "";

                        let table_body = document.getElementById("table_body");
                        table_body.innerHTML=obj.data;
                       // alert(obj.message);
                    }else
                    {
                        // alert("Error adding category");

                        alert(obj.message);
                    }

                }else if(obj.data_type == "delete_row")
                {

                    let table_body = document.getElementById("table_body");
                    table_body.innerHTML=obj.data;
                   // alert(obj.message);

                }else if(obj.data_type == "edit_row")
                {
                    let table_body = document.getElementById("table_body");
                    table_body.innerHTML=obj.data;
                    document.getElementById("editcatname").value="";
                   // alert(obj.message);

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
    function edit_record(id, category){
        let txt_category = document.getElementById("editcatname");
        txt_category.value = category;

        EDIT_ID =id;

    }

    /**
     * Function to actually send data to pushed to database
     * @param event e
     * @return void
     */
    function update_category_data(e){
        let category = document.getElementById("editcatname").value.trim();
        if (category == "" || !isNaN(category)) {
            alert("Check if characteres entered are valid");
        }

        send_data({
            id:EDIT_ID,
            category:category,
            data_type: "edit_row"
        });

    }

    /**
     * Function to delete a record
     * @param event e
     * @param number id
     * @return void
     */
    function delete_record(e,id){

        if(!confirm("Are you sure to delete the record?")){
            return; //exit
        }
        send_data({
            id:id,
            data_type: "delete_row"
        });

    }




 </script>








</section>
<!-- End Dashboard right side section-->







<!-- Admin footer and  assets  -->
<?php $this->view("zac/adminassets",$data);

// $this->view("zac/adminfooter",$data);

?>
