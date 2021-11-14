<?php

//This view is not client facing  - admin section only

$db = new Database();
$conn = $db->db_connect();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zacecom - <?php echo $data['Page_title'];?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?=ASSETS?>zac/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap icons  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"S />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?=ASSETS?>zac/css/fontawesome.css">
  <link rel="stylesheet" href="<?=ASSETS?>zac/css/owl.css">
  <link rel="stylesheet" href="<?=ASSETS?>zac/css/flex-slider.css">
  <link rel="stylesheet" href="<?=ASSETS?>zac/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="<?=ASSETS?>zac/css/dashboard-styles.css">

  <!-- jQuery CDN -->
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

  <!-- External sidebar styles -->
    <!-- Custom styles for this template -->
    <!-- <link href="<?=ASSETS?>admin/css/style.css" rel="stylesheet">
    <link href="<?=ASSETS?>admin/css/style-responsive.css" rel="stylesheet"> -->






</head>
<body>
    <!-- Dashboard top Navbar  -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark admin-top-menu fixed-top ">
      <div class="container-fluid">

        <!-- Toggler Humburger icon left: smaller screens-->
        <button class="navbar-toggler m-2" 
            type="button" 
            data-bs-toggle="offcanvas" 
            data-bs-target="#dashboard-sidebar"
            aria-controls="dashboard-sidebar">
            <span class="navbar-toggler-icon" data-bs-target="#dashboard-sidebar"></span>
          </button>
        <!-- END Humburger icon left : small screen -->

        <!-- Brand - Logo -->
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="<?=ROOT?>admin">ZAC-ECOM</a>

        <!-- Toggler  Humburger icon right : smaller screen -->
        <button class="navbar-toggler" type="button" 
          data-bs-toggle="collapse"
          data-bs-target="#topNav"
          aria-controls="topNav"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- End Hambuger Menu icon Toggler (smaller screens) -->

        <!-- Search Box and button -  -->
      
        <div class="collapse navbar-collapse" id="topNav">
         
          <!-- Logout/profile dropdown  -->
          <ul class="navbar-nav d-flex ms-auto">
            <!-- put something if some is loggedin -->
            <a class="text-light mt-2 pt-1" href=""><?=ucwords($data['name'])?>  </a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ms-2 btn"
                 href="#" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="bi bi-person-circle"></i>
                 </a>
              <ul class="dropdown-menu dropdown-menu-end">
                
                <li><a class="dropdown-item" href="<?=ROOT?>profile">Profile </a></li>
                <li><a class="dropdown-item" href="<?=ROOT?>signout">Logout</a></li>
                <li><a class="dropdown-item" href="<?=ROOT?>">Public</a></li>
                
              </li>
              </ul>
            </li>
          </ul>
          <!-- End Logout/profile dropdown -->
          
        </div> 
      
      </div>
    </nav>
<!-- End Dashboard top Navbar -->


<!-- Fixed sidebar(offcanvas) -->

<div class="offcanvas offcanvas-start text-white" tabindex="-1" id="dashboard-sidebar" aria-labelledby="sidebar-label">
  <div class="offcanvas-header d-flex justify-content-end">
    <!-- <h5 class="offcanvas-title" id="sidebar-label">Dashboard Control</h5> -->
    <button type="button" class="btn-close text-reset text-light" id="exit-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <div class="mb-5">
      <?php if($data['role']=="customer"): ?>
        <a href="<?=ROOT?>profile" class="text-muted fw-bold  px-3">
            <span><i class="bi bi-speedometer"></i></span>
            Dashboard
        </a>
        <p class="m-3"><?=$data['user_email'];?></p>
      <?php else:?>
        <a href="<?=ROOT?>admin" class="text-muted fw-bold  px-3">
            <span><i class="bi bi-speedometer"></i></span>
            Dashboard
        </a>
        <p class="m-3"><?=$data['user_email'];?></p>

        <?php endif;?>
    

    </div>
     
      <!-- offcanvas Menu -->
      
      <nav class="navbar-dark">
      
        <ul class="navbar-nav" id="dashboardlinks">
          <!-- Product NEW -->
          <?php if($data['role']=='customer'){ ?>
              <div class="d-none"> <!--block admin menu parts -->
          <?php } ?>
            <li>
            <a href="<?=ROOT?>admin/categories/view" class="nav-link px-3 sidebar-item-toggler " data-bs-toggle="collapse"  data-bs-target="#category-collapse" role="button" aria-expanded="false" aria-controls="category-collapse">
              <span class="me-2"><i class="bi bi-diagram-3-fill"></i></span>  
              <span>Categories</span> 
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down "></i></span>
            </a>
            <ul class="navbar-nav ms-5 collapse" id="category-collapse">
            <li>
                  <a href="<?=ROOT?>admin/categories" class="nav-link">View Categories</a>
                </li>
             
            </ul>
             
         </li>
          <li>
            <a href="<?=ROOT?>admin/products/view" class="nav-link px-3 sidebar-item-toggler " data-bs-toggle="collapse"  data-bs-target="#product-collapse" role="button" aria-expanded="false" aria-controls="product-collaps">
                <span class="me-2"><i class="bi bi-box-seam"></i></span>  
              <span>Products</span> 
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down "></i></span>
            </a>
            <ul class="navbar-nav ms-5 collapse" id="product-collapse">
                <li>
                  <a href="<?=ROOT?>admin/products" class="nav-link">View Products</a>
                </li>
               
            </ul>
             
        </li>

        <li>
            <a href="<?=ROOT?>admin/users/view" class="nav-link px-3 sidebar-item-toggler " data-bs-toggle="collapse"  data-bs-target="#user-collapse" role="button" aria-expanded="false" aria-controls="user-collapse">
              <span class="me-2"><i class="bi bi-person-badge-fill"></i></span> 
              <span>Users</span> 
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down "></i></span>
            </a>
            <ul class="navbar-nav ms-5 collapse" id="user-collapse">
                <li>
                  <a href="<?=ROOT?>admin/users" class="nav-link">View Users</a>
                </li>
            </ul>
         </li>

        <li>
            <a href="<?=ROOT?>admin/customers/view" class="nav-link px-3 sidebar-item-toggler " data-bs-toggle="collapse"  data-bs-target="#customer-collapse" role="button" aria-expanded="false" aria-controls="customer-collapse">
                <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>  
              <span>Customers</span> 
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down "></i></span>
            </a>
            <ul class="navbar-nav ms-5 collapse" id="customer-collapse">
                <li>
                  <a href="<?=ROOT?>admin/customers" class="nav-link">View Customers</a>
                </li>
           </ul>
       </li>
       <li>
             <a href="<?=ROOT?>admin/sendmail" class="nav-link ps-3 me-lg-5 ">
             <span><i class="bi bi-envelope"></i></span>
                  Compose Message
              </a>
          </li>


       <li class="mt-3">
            <a href="<?=ROOT?>admin/orders/view" class="nav-link px-3 sidebar-item-toggler " data-bs-toggle="collapse"  data-bs-target="#order-collapse" role="button" aria-expanded="false" aria-controls="order-collapse">
                <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>  
              <span>Future Enhancement</span> 
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down "></i></span>
            </a>
            <ul class="navbar-nav ms-5 collapse" id="order-collapse">
                <li>
                  <a href="<?=ROOT?>admin/orders" class="nav-link">Orders</a>
                </li>
                <li>
                  <a href="<?=ROOT?>admin/orders" class="nav-link">Summary Report</a>
                </li>
           </ul>
       </li>

       

         

          <?php if($data['role']=='customer'){ ?>
          </div> <!--block admin menu parts -->
          <?php } ?>

        
          
          <li>
             <a href="<?=ROOT?>profile" class="nav-link ps-3 me-lg-5 ">
             <span><i class="bi bi-person-circle"></i> </span>
                  Profile
              </a>
          </li>

          <li>
             <a href="<?=ROOT?>settings" class="nav-link ps-3 mb-1 me-lg-5 ">
               <span><i class="bi bi-gear"></i> </span>
                  Settings
             </a>
          </li>
          
          <li>
             <a href="<?=ROOT?>signout" class="nav-link ps-3  me-lg-5 ">
             <i class="bi bi-power mt-1"></i> 
             <span> Logout</span>
              </a>
          </li>

        </ul>

      </nav>
      <!-- End Offcanvas Mendu -->
  </div>
</div>

<!-- End Fixed sidebar(offcanvas) -->

