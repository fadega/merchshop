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
	         
	                  	  	  <h4> Users <button class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i>Add User</button></h4>


                              <!-- Add User Modal -->
                                  <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="addUserModal">Add User</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                                                                                                                     
                                          <input type="text" name="name" id ="name" class="form-control form-control-lg my-2" placeholder="Enter Name" >
                                          <input type="email" name="email" id ="useremail" class="form-control form-control-lg my-2" placeholder="Enter Email" >
                                          <input type="tel" name="phone" id ="userphone" class="form-control form-control-lg my-1" placeholder="Enter Phone" >
                                          <input type="text" name="address" id ="useraddress" class="form-control form-control-lg my-2" placeholder="Enter Address" >
                                          <!-- <input type="text" name="date" id ="userdate" class="form-control form-control-lg my-2" placeholder="Enter Date" > -->
                                          <!-- <input type="text" name="role" id ="custrole" class="form-control form-control-lg mb-1" placeholder="Enter Role" > -->
             
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary" id="saveuser" onclick="collect_data(event)">Save </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <!-- END Add user Modal -->

                               <!-- EDIT user Modal -->
                               <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="addProductsModal" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="editusertitle">Edit User</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <input type="text" name="editname" id ="editname" class="form-control form-control-lg my-2" placeholder="Enter Name" >
                                          <input type="email" name="editemail" id ="edituseremail" class="form-control form-control-lg my-2" placeholder="Enter Email" >
                                          <input type="tel" name="editphone" id ="edituserphone" class="form-control form-control-lg my-1" placeholder="Enter Phone" >
                                          <input type="text" name="editaddress" id ="edituseraddress" class="form-control form-control-lg my-2" placeholder="Enter Address" >
                                          <!-- <input type="text" name="editdate" id ="edituserdate" class="form-control form-control-lg my-2" placeholder="Enter Date" > -->
                                        
                                         </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                          <button type="button" class="btn btn-primary" id="btnuserupdate" onclick="update_user_data(event)">Update </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                               <!-- END EDIT User Modal -->


                            <!-- <hr> -->
                              <thead>
                              <tr>
                                  <th> ID #</th>
                                  <th> Name</th>
                                  <th> Email</th>
                                  <th> Phone</th>
                                  <th> Address</th>
                                  <th> Date Joined</th>
                                  <!-- <th> Role</th> -->
                                  
                                  <th><i class=" fa faa-edit"></i>Action</th>
                              </tr>
                              </thead>

                              <tbody class="table_body">
                                  <?php

                                                                 
                                    echo  $data['tbl_rows'];
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

      let data        = new FormData()
      let name        = document.querySelector("#name").value.trim()
      let useremail   = document.querySelector("#useremail").value.trim()
      let userphone   = document.querySelector("#userphone").value.trim()
      let useraddress = document.querySelector("#useraddress").value.trim()
      

     
      if(name == "" || !isNaN(name)){
          alert("please enter a valid name name");
          return
      }
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
      if(!useremail.match(mailformat)){
        alert("please enter a valid email")
        return
      }
      if(isNaN(userphone)){
        alert("Please enter a valid phone number")
        return
      }
 
        data.append("name",name)
        data.append("useremail",useremail)
        data.append("userphone",userphone)
        data.append("useraddress",useraddress)
        data.append("data_type","add_user")

        //call function and pass data
        send_data(data)

    }


    // function send_data(data ={}){
    function send_data(data){

        var ajax = new XMLHttpRequest();
        ajax.addEventListener('readystatechange', function(){
            //check if there is response
             if(ajax.readyState == 4 && ajax.status == 200){
                 //handle the response
                handle_results(ajax.responseText);

            }
        });
        //send data
        ajax.open("POST","<?=ROOT?>ajax_user", true);
        ajax.send(data);
        // ajax.send(JSON.stringify(data));


    }

    /**
     * This is a complex function that handles ajax response
     * New line braces { } are used to make where each condition ends - this style isn't followed in the rest of the code
     * @param mixed result - ajax response data
     * @return void - prints table and error messages
     */
    function  handle_results(result)
    {
          // console.log(typeof result);
          // console.log(result);
          if(result!=="")
          {

            let obj= JSON.parse(result);
            // alert("Obje alert ", obj);
            // console.log("data type", obj.data_type);
            if(typeof obj.data_type!=='undefined')
            {
                if(obj.data_type == "add_user")
                {
                    // alert("add reached");
                    if(obj.message_type=="info")
                    {

                        document.querySelector("#name").value= "";
                        document.querySelector("#useremail").value= "";
                        document.querySelector("#userphone").value= "";
                        document.querySelector("#useraddress").value= "";

                        let table_body = document.querySelector(".table_body");
                        table_body.innerHTML = obj.data;
                      //  alert(obj.message);
                    }else
                    {
                        // alert("Error adding category");

                        alert(obj.message);
                    }

                }else if(obj.data_type == "delete_user")
                {

                    let table_body = document.querySelector(".table_body");
                    table_body.innerHTML=obj.data;
                  //  alert(obj.message);

                }else if(obj.data_type == "edit_user")
                {
                  

                    let table_body = document.querySelector(".table_body");
                    table_body.innerHTML= obj.data;
                    // document.getElementById("editcatname").value="";

                    document.querySelector("#editname").value= "";
                    document.querySelector("#edituseremail").value= "";
                    document.querySelector("#edituserphone").value= "";
                    document.querySelector("#edituseraddress").value= "";
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
    // function edit_record(id, name, email,phone,address){
    function edit_record(id, e){
    

       var info = e.currentTarget.getAttribute("info");
       info     = JSON.parse(info.replaceAll("'",'"'))
       info     = JSON.parse(info)
       console.log("Infooooo", info)

      let txt_name          = document.querySelector("#editname")
      let txt_useremail     = document.querySelector("#edituseremail")
      let txt_userphone     = document.querySelector("#edituserphone")
      let txt_useraddress   = document.querySelector("#edituseraddress")

      EDIT_ID               = info.id;
      txt_name.value        = info.name 
      txt_useremail.value   = info.email
      txt_userphone.value   = info.phone
      txt_useraddress.value = info.address 
     

    }

    /**
     * Function to actually send data to pushed to database
     * @param event e
     * @return void
     */
    function update_user_data(e){
      
      let userdata    = new FormData()
      let name        = document.querySelector("#editname").value.trim()
      let useremail   = document.querySelector("#edituseremail").value.trim()
      let userphone   = document.querySelector("#edituserphone").value.trim()
      let useraddress = document.querySelector("#edituseraddress").value.trim()
      
      userdata.append("id",EDIT_ID)
      userdata.append("name",name)
      userdata.append("useremail",useremail)
      userdata.append("userphone",userphone)
      userdata.append("useraddress",useraddress)
      userdata.append("data_type","edit_user")

      //call function and pass data
      // console.log("to be passed ")
      // console.log(userdata)
      send_data(userdata)

    }

    /**
     * Function to delete a record
     * @param event e
     * @param number id
     * @return void
     */
    function delete_record(e,id){
      var data = new FormData();

        if(!confirm("Are you sure to delete the record?")){
            return; //exit
        }

        data.append("id",id)
        data.append("data_type","delete_user")
        send_data(data)
        

    }




 </script>








</section>
<!-- End Dashboard right side section-->







<!-- Admin footer and  assets  -->
<?php $this->view("zac/adminassets",$data);

$this->view("zac/adminfooter",$data);

?>
