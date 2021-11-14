<?php

$this->view("zac/adminheader",$data);

?>




<!-- Profile section starts here-->
<section class="mt-5 p-5" id="profile-wrapper" >
<!-- <h3>Profile</h3> -->
<div class="wrapper" style="background-color: #FFF;">
 <div class="row mt-5">
     <div class="col-md-6">
         <div class="row">
             <div class="col-5">
                <img  src="<?=ASSETS?>zac/images/xyz.png" alt=" profile image" style="border-radius:50%;max-height:150px;">
             </div>
             <div class="col-7  py-5 border-left">
                 <p class="display-5"><?=$data['name']?></p>
                 <p class="text-secondary"><?=$data['user_email']?></p>
                 
             </div>
         </div>

     </div>
     <?php if($data['role']=='customer'):?>
        <div class="col-md-3">
            <div class="box shadow text-center py-3 rounded">
                <p class="display-1 text-success fw-bold">50</p>
                <p class="text-success ">completed Orders</p>
            </div>
            
        </div>
        <div class="col-md-3">
        <div class="box shadow text-center py-3 rounded">
                <p class="display-1 text-danger fw-bold">7</p>
                <p class="text-danger ">Return Requested</p>
            </div>
        </div>
    <?php else:?>

        <div class="col-md-3">
            <div class="box shadow text-center py-3 rounded">
                <p class="display-1 text-success fw-bold">21</p>
                <p class="text-success ">Recieved Orders</p>
            </div>
            
        </div>
        <div class="col-md-3">
        <div class="box shadow text-center py-3 rounded">
                <p class="display-1 text-warning fw-bold">10</p>
                <p class="text-warning ">Pending Cancellations</p>
            </div>
        </div>


    
    <?php endif;?>




 </div>

 <div class="row mt-5">
     <div class="col-md-5">
         
         <div class="row shadow-sm p-3">
             <div class="col-md-8">
                <h5 class="mb-3">Profile Details</h5>
                <p class="mt-2">Name  <span class="text-secondary ms-5"><?=$data['name']?></span></p>
                <p>Email  <span class="text-secondary ms-5"><?=$data['user_email']?> </span></p>
                <p>Phone <span class="text-secondary ms-5"><?=$data['phone']?>4</span></p>
                <p>Address <span class="text-secondary ms-4"><?=$data['address']?></span></p>
                <p>Role <span class="text-secondary ms-4"><?=$data['role']?></span></p>
                <div class="mt-3"> <a href="<?=ROOT?>profile/deleteAccount" class="text-danger"><i class="bi bi-trash-fill text-danger"></i>Delete Account </a> </div>
             </div>
             <div class="col-md-4">
                <i class="bi bi-pencil-square edit-profile-icon"></i>
                <span> <a href="<?=ROOT?>editprofile" class="text-dark">Edit Details</a> </span>
               
             </div>

         </div>

     </div>

     <?php if($data['role']=='customer'): ?>
     <div class="col-md-7 shadow-sm">
         <h5>Order History</h5>
        <table class="table table-striped table-hover">
            <tr>
                <th>Order#</th>
                <th>Date </th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>x073642</td>
                <td>12/06/2021 </td>
                <td>Mug</td>
                <td>5</td>
                <td>$37.89</td>
                <td class="text-primary">Confirmed</td>
            </tr>
            <tr>
                <td>x032325</td>
                <td>12/06/2021 </td>
                <td>T-shirt</td>
                <td>2</td>
                <td>$29.89</td>
                <td class="text-success">Complete</td>
            </tr>
            <tr>
                <td>x032325</td>
                <td>12/06/2021 </td>
                <td>T-shirt</td>
                <td>1</td>
                <td>$14.89</td>
                <td class="text-success">Complete</td>
            </tr>

        </table>

     </div>
     <?php endif;?>
 </div>

 </div><!--End wrapper-->
</section> 
<!-- End Profiles section -->







<!-- Admin assets and scripts are called by this line -->
<?php $this->view("zac/adminassets",$data); ?>
