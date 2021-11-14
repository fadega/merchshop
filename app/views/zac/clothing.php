<?php
 
   $this->view("zac/header",$data);
?>

    <!-- Clothing filter page starts here -->
    <?php $this->view("zac/filterloop",$data);?>
    
    <!-- Clothing filter page ends here -->

    <?php $this->view("zac/subscribe",$data);?>


    <?php
 
   $this->view("zac/footer",$data);
?>