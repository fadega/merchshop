<?php

$this->view("zac/adminheader",$data);

?>





<!-- Display Area  the whole right section starts here-->
<section class="mt-5 p-4 bg-light" id="display-area">

  <div class="row">
          <div class="col-lg-9 main-chart">
             <div class="row mtbox">
                <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  <div class="box1">
                    <span><i class="bi bi-person-plus-fill text-success"></i></span>
                    <h3  class="text-success">+30</h3>
                  </div>
                  <p>30 New customers this Month!</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                  <div class="box1">
                    <span><i class="bi bi-bag text-success" ></i></span>
                    <h3  class="text-success">+20%</h3>
                  </div>
                  <p>Orders increased by 20%.</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                  <div class="box1">
                    <span><i class="bi bi-eye"></i></span>
                    <h3  class="text-success">2000</h3>
                  </div>
                  <p>2000 visitors this Month.</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                  <div class="box1">
                    <span ><i class="bi bi-basket3-fill text-success"></i></span>
                    <h3 class="text-success">+350</h3>
                  </div>
                  <p>50 T-shirts added to inventory this month.</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                  <div class="box1">
                      <span ><i class="bi bi-emoji-angry text-danger"></i></span>
                      <h3>3!</h3>
                  </div>
                  <p>3 Unhappy customers(order return) this month.</p>
                </div>
              
              </div><!-- /row mt -->	
            
                
                <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                  <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn donut-chart">
                      <div class="white-header">
                         <h5>MERCH SALES</h5>
                      </div>
                      <div class="row">
                        <!-- <div class="col-sm-6 col-xs-6 goleft">
                          <p><i class="fa fa-database"></i> 70%</p>
                        </div> -->
                        <div id="chart-wrapper">
                      <canvas id="salesChart"></canvas>
                      </div>
                      </div>
                      
                       
                      <!-- <canvas id="serverstatus01" height="120" width="120"></canvas>
                      <script>
                        var doughnutData = [
                            {
                              value: 70,
                              color:"#68dff0"
                            },
                            {
                              value : 30,
                              color : "#fdfdfd"
                            }
                          ];
                          var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                      </script> -->
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-4-->
                  

                  <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn"style="min-height: 350px;">
                      <div class="white-header" >
                          <h5>BEST SELLIGN CATEGORY</h5>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-xs-6 goleft">
                          <p><i class="fa fa-heart"></i> Clothing</p>
                        </div>
                        <div class="col-sm-6 col-xs-6"></div>
                      </div>
                      <div class="centered pb-5">
                          <img src="<?=ASSETS?>zac/images/3.png" width="200">
                      </div>
                    </div>
                  </div><!-- /col-md-4 -->
                  
                  <div class="col-md-4 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn" style="min-height: 350px;">
                      <div class="white-header">
                        <h5>TOP CUSTOMER</h5>
                      </div>
                      <p><img src="<?=ASSETS?>zac/images/xyz.png" class="img-circle" width="80"></p>
                      <p><b>XYZ ABC</b></p>
                      <div class="row">
                        <div class="col-md-6">
                          <p class="small mt">CUSTOMER SINCE</p>
                          <p>2019</p>
                        </div>
                        <div class="col-md-6">
                          <p class="small mt">TOTAL SPEND</p>
                          <p>$ 499.89</p>
                        </div>
                      </div>
                    </div>
                  </div><!-- /col-md-4 -->
                  

              </div><!-- /row -->
                    
          <!-- Charts start Here -->
            <div class="row g-2">

                <div class="col-md-6 shadow-sm bg-body p-3">
                <h6> Visitors vs Customers</h6>
                <canvas id="customervisitor"></canvas>
              </div>

              <div class="col-md-6 shadow-sm bg-body p-3">
                <h6> Semi Annual Salles Trend</h6>
                <canvas id="sales"></canvas>
              </div>
          </div>   

<!-- End Charts Here  -->
              
   
    
    
    
            </div><!-- /col-lg-9 END SECTION MIDDLE -->
            
            
<!-- **********************************************************************************************************************************************************
RIGHT SIDEBAR CONTENT
*********************************************************************************************************************************************************** -->                  
            
            <div class="col-lg-3 ds " style="background-color: #f2f2f2;">
              <!--COMPLETED ACTIONS DONUTS CHART-->
              
               <h3>NOTIFICATIONS</h3>
                                  
                <!-- First Action -->
                <div class="desc">
                  <!-- <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div> -->
                  <div class="details">
                    <p class="small"><muted><span class="fst-italic">5 Minutes Ag</span>o</muted><br/>
                        <a href="#">John Doe</a> subscribed to your newsletter.<br/>
                    </p>
                  </div>
                </div>
                <!-- Second Action -->
                <div class="desc">
                  <!-- <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div> -->
                  <div class="details">
                    <p class="small"><muted><span class="fst-italic">1 Hour(s) Ago<</span>/muted><br/>
                        <a href="#">Jane Doe</a> purchased an item.<br/>
                    </p>
                  </div>
                </div>
                <!-- Third Action -->
                <div class="desc">
                  <!-- <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div> -->
                  <div class="details">
                    <p class="small"><muted><span class="fst-italic">1 Hour(s) Ago<</span>/muted><br/>
                        <a href="#">Hanna Yassin</a> purchased an item.<br/>
                    </p>
                  </div>
                </div>
                <!-- Fourth Action -->
                <div class="desc">
                  <!-- <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div> -->
                  <div class="details">
                    <p class="small"><muted><span class="fst-italic">1 Hour(s) Ago<</span>/muted><br/>
                        <a href="#">Jane Doe</a> purchased an item.<br/>
                    </p>
                  </div>
                </div>
                <!-- Fifth Action -->
                <div class="desc">
                  <!-- <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div> -->
                  <div class="details">
                    <p class="small"><muted><span class="fst-italic">4 Hour(s) Ago<</span>/muted><br/>
                        <a href="#">Elis Doe</a> purchased an item.<br/>
                    </p>
                  </div>
                </div>
                 <!-- Sixth Action -->
                 <div class="desc">
                  <!-- <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                  </div> -->
                  <div class="details">
                    <p class="small"><muted><span class="fst-italic">17 Hour(s) Ago</span></muted><br/>
                        <a href="#">Jade Smith</a> purchased an item.<br/>
                    </p>
                  </div>
                </div>

             
            </div><!-- /col-lg-3 -->
        </div><!--/row -->




</section> 
<!-- End Display Area(section)  the whole right section ends here-->


<!-- Admin assets and scripts are called by this line -->
<?php $this->view("zac/adminassets",$data); 

$this->view("zac/adminfooter",$data);

?>
