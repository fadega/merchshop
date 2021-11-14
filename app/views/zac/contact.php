<?php

   $this->view("zac/header",$data);
?>
<!-- custom contact us styles, I weirdly placed them here -->
<link rel="stylesheet" href="<?=ASSETS?>zac/css/contact.css" />

    
<!-- CONTACT  page starts here-->

    
  <div class="content">
  
    <div class="container mt-3" id=contact-new>
      <div class="line-dec my-2"></div>
      <h1 class="mb-5">Contact Us</h1>
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-8">
          <div class="form h-100">
            <h3 class="send">Send us a message</h3>
            <form class="mb-5" method="post" action="https://formsubmit.co/fadega.afa@gmail.com" id="contactForm" name="contactForm">
              <input type="hidden" name="_captcha" value="false">
              <input type="hidden" name="_next" value="<?=ROOT?>thanks">
              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Name *</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required>
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Email *</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Your email" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone"  placeholder="Phone # (optional)">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Website</label>
                  <input type="text" class="form-control" name="company" id="company"  placeholder="Website (optional)">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-5">
                  <label for="message" class="col-form-label">Message *</label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Write your message" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" value="Submit Message" style="color:#fff;  " class="btn btn-primary btn-send-message rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              Thanks, your message is sent!
            </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-info h-100">
            <h3>Contact Information</h3>
            <p class="mb-5 lead h6">You may also contact us on the following contacts.</p>
            <ul class="list-unstyled">
              
              <li class="d-flex">
                <span class="wrap-icon icon-phone mr-3"></span>
                <span class="text lead h6 text-white">+61 123 456 7898</span>
              </li>
              <li class="d-flex">
                <span class="wrap-icon icon-envelope mr-3"></span>
                <span class="text lead h6 text-white">info@zacsmart.com</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>


      <!-- End contact page here -->


<!-- footer -->
<?php  $this->view("zac/footer",$data); ?>
