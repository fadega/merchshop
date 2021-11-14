<?php
  if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
// if(isset($_SESSION['CART']))
//    show($_SESSION['CART']);


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

 

    <!-- Google fonts : Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Zacecom -<?php echo $data['Page_title'];?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=ASSETS?>zac/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Boot strap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!--  BOOTstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

    <?php //echo ASSETS;?>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/fontawesome.css">
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/main.css">
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/owl.css">
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/flex-slider.css">
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>zac/css/404.css" />
    <!-- <link rel="stylesheet" href="<?=ASSETS?>zac/css/contact.css" /> -->
  


  </head>




  <body>

      




    <!-- <nav class="navbar navbar-light py-0 " style="background-color: #ead150;">
      <ul class="nav justify-content-center" id="menu">
        <?php if(isset($data['user_email'])):?>
          <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>signout"><i class="bi bi-box-arrow-in-left mt-0"></i>Logout  </a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>profile">Account</i>  </a>
        </li>
       
        <?php else:?>
          <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>signin">Login <i class="bi bi-box-arrow-in-right"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>signup">Signup</a>
        </li>
        <?php endif;?>
        <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>cart">Cart</a>
        </li>
        </ul>
        <?php if(isset($search)):?>
        <form class="form-inline " method="get">
          <input class="form-control mr-sm-2" type="search" name="find" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success btn-search" type="submit"><i class="bi bi-search"></i>
       
        </button>        
        </form>
        <?php endif;?>
      </nav> -->
    <!-- </div> -->










 <header class="section-header ">
    <section class="header-main border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4 col-md-4 col-5">
                   <a href="<?=ROOT?>" class="brand-wrap" data-abc="true">
                    <!-- <span class="logo">SMART-COM</span> -->
                    <img src="<?=ASSETS?>zac/images/header-logo.png" alt="" style="width:13%; margin-bottom:5px;">
                   </a>
                 </div>
                <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">
                  <?php if(isset($search)):?>
                    <form  class="search-wrap d-none " method="get">
                        <div class="input-group w-100 d-flex justify-content-right">
                           <input type="text"  name="finddd" class="form-control search-form rounded-left pull-right" id="search-field"  placeholder=" Search" style="max-width:300px;">
                            <div class="input-group-append "> <button class="btn btn-primary rounded-right search-button" type="submit"> <i class="fa fa-search"></i> </button> </div>
                        </div>
                   </form>
                   <?php endif;?>
                </div>
                <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
                    <div class="d-flex justify-content-end menu-strip"> 
                      <a class="nav-link " href="<?=ROOT?>cart" >
                      <span><i class="bi bi-cart4"></i></span></a>
                      <?php if(isset($_SESSION['CART']) && count($_SESSION['CART'])>0){?>
                        <span class="text-warning " style="margin-top:-3px;margin-left:-20px;"><i class="bi bi-bell " ></i>1</span>  
                        
                        <?php }?>
                    
                    
                      <?php if(isset($data['user_email'])):?>
                        <a class="nav-link " href="<?=ROOT?>profile">Account</i>  </a>
                      <a class="nav-link " href="<?=ROOT?>signout">Logout<i class="bi bi-box-arrow-in-right mt-0"></i>  </a>
                      
                      
                      <?php else:?>
                      <a class="nav-link " href="<?=ROOT?>signup" ><span>Signup</span></a>
                      <a class="nav-link " href="<?=ROOT?>signin" ><span>Login</span></a>
                      <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header> 
<!-- END NEW TOP STRIP NAVBAR -->
 

    <!-- Main Navigation starts here-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5">
      <div class="container">
        <!-- <a class="navbar-brand pt-0" href="#"><img src="<?=ASSETS?>zac/images/header-logo.png" alt=""></a> -->
        <a class="navbar-brand pt-3 fw-bold display-3" id="logo-brand" href="<?=ROOT?>">
           <div id="head1andtwo">
           <h1>The Smart Community Podcast </h1>
            <h2>Merch Shop </h2 class="mb-3">
           </div>
            
           
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav " style="margin-top:60px;">
               <li class="nav-item active">
                  <a class="nav-link" href="<?=ROOT?>">Home
                    
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=ROOT?>shop">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=ROOT?>about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=ROOT?>contact">Contact</a>
                </li>

                <li class="nav-item">
                  <?php if(isset($search)):?>
                      <form  class="search-wrap " method="get">
                          <div class="input-group w-100 d-flex justify-content-right">
                            <input type="text"  name="find" class="form-control search-form rounded-left border border-warning" id="search-field"  placeholder=" Search" style="max-width:300px;">
                              <div class="input-group-append "> <button class="border border-warning btn btn-primary rounded-right search-button" type="submit"> <i class="fa fa-search"></i> </button> </div>
                          </div>
                    </form>
                    <?php else:
                      $_SESSION['search_results']= "none";
                     endif;?>
                </li>
                
                
               
              </ul>
           </div>
      </div>
    </nav>
    <!-- End Main navigation -->