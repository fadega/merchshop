
    
    <!-- Footer section starts Here -->
    <div class="footer border-top border-1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="<?= ASSETS?>zac/images/header-logo.png" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="<?=ROOT?>home">Home</a></li>
                <li><a href="<?=ROOT?>">Privacy Policy</a></li>
                <!-- <li><a href="<?=ROOT?>">Terms of Service</a></li> -->
                <li><a href="<?=ROOT?>contact">Contact Us</a></li>
                <?php if(isset($data['role']) && $data['role']=='admin'){?>
                   <li><a href="<?=ROOT?>admin">Admin</a></li>
                  <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <p class="lead mb-3">My Smart Community Social Hub</p>
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End footer section here -->


    <!-- Sub footer section starts here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; 2021 Smart Communities 
                
                - Design by: <a rel="nofollow" href="<?=ROOT?>">ZACS Team</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End sSub footer section starts here -->

    <!-- Stripe Payment gateway Script -->    
    <script src="https://js.stripe.com/v3/"></script>


    <!-- Bootstrap Local  JavaScript Libraries-->
    <script src="<?=ASSETS?>zac/vendor/jquery/jquery.min.js"></script>
    <script src="<?=ASSETS?>zac/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Bootstrap direct CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>



    <!-- Additional Scripts -->
    <script src="<?=ASSETS?>zac/js/custom.js"></script>
    <script src="<?=ASSETS?>zac/js/owl.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; 
      function clearField(t){                   
      if(! cleared[t.id]){                     
          cleared[t.id] = 1;  
          t.value='';        
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
