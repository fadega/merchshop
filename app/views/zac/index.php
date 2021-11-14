
<?php
 
   $this->view("zac/header",$data);
 
?>
   <!-- Banner area starts here -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="caption">
              <h4>Buy Merch & Support Smart Communities</h4>
              <div class="line-dec"></div>
              <p><strong>My Smart Community</strong> offers consulting and media services with a focus on making our communities more accessible, liveable and sustainable for all.</p>
              <p> We have a focus on Smart Mobility, Smart project management, Smart technology in regional communities, dealing with disruption and facilitating genuine collaboration.</p>
              <div class="main-button">
                <a href="<?=ROOT?>shop" class="btn btn-lg btn-banner fw-bold ">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Banner area -->


    <!--Home featured area starts here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <?php //if(isset($data['item_searched'])):?> 
              <?php if(isset($item_searched)):?> 
                 <h1>Search Results </h1>
                 <?php if(!is_array($ROWS)):?>
                  <h6 class="text-danger py-3">Oops! The product you searched for is not found!</h6>
                  <?php endif;?>
              <?php else:?>
                <h1>Featured Merches</h1>
              <?php endif;?>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">

            <?php if(is_array($ROWS)): ?>
            <?php foreach($ROWS as $row): ?>

              <!-- we cutout one page from here looping product -->
              <?php $this->view("zac/productloop",$row);?>
              
              <?php endforeach;?>
              <?php endif;?>


            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- Home featured area  -->

   <!-- subscribe section -->
   <?php  $this->view("zac/subscribe",$data);?>


<!-- footer -->
<?php $this->view("zac/footer",$data);?>