<?php
 
   $this->view("zac/header",$data);
?>

    <!-- House filter page starts here -->
    
    <?php $this->view("zac/filterloop",$data);?>
    
    <!-- House filter page ends here -->

    <?php $this->view("zac/subscribe",$data);?>


    <?php
 
   $this->view("zac/footer",$data);
?>