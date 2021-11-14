<?php
  /**
   * 
   */
   $this->view("zac/header",$data);
?>


    <!-- About Page Starts Here -->
    <div class="about-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>About Us</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-image">
              <img src="<?=ASSETS?>zac/images/about-us.png" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4>My Smart Community</h4>
              <p>Here at My Smart Community, we understand that there’s a lot of hype in this Smart City space, people making promises with no substance and tech companies selling you out-of-the-box solutions that don’t necessarily fit the needs of your unique community. </p> 
              <br>
              <p>Because of this, these conversations often start with the technology. Not only does that leave you feeling overwhelmed with options, but it’s the completely wrong approach! </p>
              <br>
              <p>Here at My Smart Community, we ignite Smart Community thinking from the regions to the world. My Smart Community does whatever it takes to continue to influence and shape the smart cities conversation by not starting with technology but actually the real needs of the community – including the people with the most at stake</p>
              <br>
              <p>Together we work out what new ways of thinking and working are needed to fit your community context and look at a range of solutions. Then and only then do we look at what technology can do to support that.

              This may include creating accessible and fun community initiatives, trialling the latest tech, bringing together stakeholders to develop your Smart Community Journey Plan and/or improving services through operational efficiencies (and many things in between).

              </p>
             
              <div class="share">
                <h6>Find us on: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End About Page -->

   <!-- including the subscribe section here -->
 <?php  $this->view("zac/subscribe",$data);?>


 <!-- calling the subscribe section here -->
  <?php $this->view("zac/footer",$data); ?>