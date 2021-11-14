<?php    
 $this->view("zac/header",$data);


?>

<!-- signin page starts here -->
 <section class=" mt-5 mb-5 text-center justifiy-content-center" style="background-image: #eee; ">
  <div class="mask d-flex align-items-center  gradient-custom-3">
    <div class="container mt-5" >
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card shadow rounded" >
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-4">Login</h2>
              <?php
               if(isset($_GET["signup"])){
                 ?>
                  <p class=" text-success text-center mb-1">Account created successfully, signin below</p>
                <?php } 
                
              ?>
              <span class="text-danger"> <?php checkErrorMessage();?></span>
              

              <form method="post">
                <div class="form-outline mb-4">
                  <input type="email" name="email" value="<?=isset($_POST['email']) ? $_POST['email'] : ""?> "class="form-control form-control-lg" placeholder="Email.." required/>
                </div>

                <div class="form-outline mb-4">
                   <input type="password" name="password" value="<?=isset($_POST['password']) ? $_POST['password'] : ""?>" class="form-control form-control-lg" placeholder="Password.." required/>
                </div>
                <div class="form-check d-flex justify-content-start mb-4">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    name="keepmesigned"
                    id="terms" />
                  <label class="form-check-label" for="terms">
                     <a href="#!" class="text-body"><u>Remember me</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"  class="btn btn-lg px-5 " style="background:#06d6a0;">Login</button>
                  <!-- <button type="submit" name="signin" class="btn btn-lg px-5 " style="background:#06d6a0;">Login</button> -->
                </div>

                <p class="text-center text-muted mt-5 mb-0">Don't have an account yet? <a href="<?=ROOT?>signup" class="fw-bold text-body"><u>Register here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End signin page  -->

    
     <!-- footer -->
<?php $this->view("zac/footer",$data);?>