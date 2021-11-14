
<?php $this->view("zac/header",$data); ?>


   <!-- Cart page row starts  -->
    <div class="row justify-content-center" style="margin:100px 0px;">
     <div class="col-sm-12 col-md-8 col-lg-8 py-3" style="border:1px solid #eee;">
       <h4 class="text-secondary text-center">Your Shopping Cart</h4>
              <div class="table-responsive">
                  <table class="table align-middle table-borderless">
                 
                          

                      <?php if($CARTROWS):?>
                        
                        <th></th>
                        <th>Product Name</th>
                        <th> Unit price </th>
                        <th class="text-center">Quantity</th>
                        <th>Item total</th>
                        <tbody>
                        <?php foreach($CARTROWS as $row):?>
                        <tr>
                            <td>
                                <img  style="width:70px;" src="<?=$row['image1']?>" alt="">
                            </td>
                            
                            <td>
                                <h3> <a href="#" class="text-success"> <?=$row['name']?></a></h3>
                                <p class="small"> Item details </p>
                                <dl class="small m-b-none">
                                    <dt><?=$row['description']?></dt>
                                    <dd>product ID: EI<?=$row['id']?></dd>
                                </dl>
                             
                                <div class="m-t-sm">
                                    <a href="<?=ROOT?>cart/remove/<?=$row['id']?> " class=" text-danger"><i class="fa fa-trash" style="color:#e63946;"></i> Remove item</a>
                                </div>
                                
                            </td>

                            <td><?=$row['price']?></td>
                            <td >
                                <div class="row">
                                    <div class="col-md-4 ">
                                    <a href="<?=ROOT?>cart/add_quantity/<?=$row['id']?> " style="float:right; font-size:26px;color:#06d6a0;">+</a>
                                    <!-- <script>window.load.href = "<?php //echo ROOT.'shop' ?>"</script>     -->
                                </div>
                                    <div class="col-md-3">
                                    <input  oninput = "edit_quantity(this.value); alert('alerteddd')" type="text"  class="form-control p-0 text-center" readonly  value="<?=$row['cart_qty']?>"/>
                                    </div>
                                    <div class="col-md-4 ">
                                    <a href="<?=ROOT?>cart/subtract_quantity/<?=$row['id']?>"  style="float:left; font-size:26px;color:#e63946;" >—</i></a>
                                     <!-- <script>window.load.href = "<?php //echo ROOT.'shop' ?>"</script> -->
                                    </div>
                                </div>
               
                               
                            </td>
                            <td> <h5> $ <?= $row['cart_qty'] * $row['price']?> </h5> </td>
                        </tr>

                        <?php endforeach;?>
                        <?php else:?>
                            <h6 class="fw-bold text-danger text-center"> Your cart is empty!  <span > <a href="<?=ROOT?>shop" class="text-center">Shop here</a> </span></h6> 
                        <?php endif;?>
                 

                      
                     </tbody>

                  </table>

                  <div  class= "d-flex justify-content-end my-5">
                    
                      <?php if($CARTROWS):?>
                        <h4 class=" mx-2 ">Total:</h4> <span>
                        <?php $total = 0; 
                         foreach($CARTROWS as $row):?>
                            <?php $total += $row['cart_qty'] * $row['price'] ; ?>
                           
                      <?php endforeach; ?>
                        
                        <h4 class= "me-2"> $ <?=$total?></h4> </span>
                       <?php $_SESSION['total'] =$total;?>

                    <?php else:
                       unset($_SESSION['total']);
                     endif;  ?>
                        

                  </div>
                  <?php if($CARTROWS):?>
                    <div  class= "d-flex justify-content-end">
                        <a href="<?=ROOT?>shop" class=" btn btn-outline-warning mx-2  " ><i class="bi bi-arrow-left-circle-fill m-1"></i> Continue Shopping</a> <span>
                        <a href="<?=ROOT?>checkout" id="paybtn"  class=" btn btn-outline-success text-dark" style="background-color:#06d6a0;">Checkout<i class="bi bi-arrow-right-circle-fill m-1"></i></a> </span>
                    </div>
                    <?php endif; ?>

                </div>
              </div>
           </div>
        <!--End Cart page row -->

        

    <script>


</script>









       



<script src="<?=ASSETS?>zac/js/script.js"></script>

        <!-- Including the footer here -->
<?php $this->view("zac/footer",$data);?>