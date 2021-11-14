<?php    
 $this->view("zac/header",$data);
?>
 <section class=" mt-5 mb-5 text-center justifiy-content-center" style="background-image: #eee; ">
  <div class="mask d-flex align-items-center  gradient-custom-3">
    <div class="container mt-5" >
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card shadow rounded" >
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-2">Create account</h2>
               <span class="text-danger"> <?php checkErrorMessage();?></span>

              <form action="#" method="post">

                <div class="form-outline mb-4">
                     <input type="text" name="name" id="name"  value="<?=isset($_POST['name']) ? $_POST['name'] : ""?>" class="my-2 form-control form-control-lg" placeholder="Name*.." required />
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email"  value="<?=isset($_POST['email']) ? $_POST['email'] : ""?>" class="form-control form-control-lg" placeholder="Email*.." required/>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" name="phone" id="phone"  value="<?=isset($_POST['phone']) ? $_POST['phone'] : ""?>" class="form-control form-control-lg" placeholder="Phone.." />
                </div>
                <div class="form-outline mb-4">
                  <input type="text" name="address" id="address" value="<?=isset($_POST['address']) ? $_POST['address'] : ""?>"  class="form-control form-control-lg" placeholder="Address.." />
                </div>

                <div class="form-outline mb-4">
                   <input type="password" name="password" id="pass" value="<?=isset($_POST['password']) ? $_POST['password'] : ""?>"  class="form-control form-control-lg" placeholder="Password*" required/>
                </div>

                <div class="form-outline mb-4">
                   <input type="password" name="password2" id="repeatpass"   class="form-control form-control-lg" placeholder="Repeat password*" required/>
                </div>

                <div class="form-check d-flex justify-content-start mb-4">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value="checked"
                    name="termscheck"
                   
                  />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="register" class="btn btn-lg btn-lg px-5  " style="background:#06d6a0;">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have an account? <a href="<?=ROOT?>signin" class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    
    <?php    
 $this->view("zac/footer",$data);
?>