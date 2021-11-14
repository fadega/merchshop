<?php 
  
  $db = new Database();
  $conn = $db->db_connect();


?>
   <!-- Admin assets and libraries -->
   <!-- Bootstrap Local  JavaScript Libraries-->
   <script src="<?=ASSETS?>zac/vendor/jquery/jquery.min.js"></script>
   <script src="<?=ASSETS?>zac/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Bootstrap direct CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   

    <!-- Additional Scripts -->
    <script src="<?=ASSETS?>zac/js/custom.js"></script>
    <script src="<?=ASSETS?>zac/js/owl.js"></script>

    <!-- OLD links -->
    <!-- <script src="<?=ASSETS?>js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="<?=ASSETS?>js/jquery-3.5.1.js"></script>
    <script src="<?=ASSETS?>js/jquery.dataTables.min.js"></script>
    <script src="<?=ASSETS?>js/dataTables.bootstrap5.min.js"></script>
    <script src="<?=ASSETS?>js/script.js"></script> -->

</body>
</html>