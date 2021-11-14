<?php

$this->view("zac/adminheader",$data);

?>




<!-- Settings section starts here-->
<section class="mt-5 p-4 bg-light" id="display-area">
<h3>Settings</h3>


</section> 
<!-- Eng Settings section -->







<!-- Admin assets and scripts are called by this line -->
<?php $this->view("zac/adminassets",$data); 

$this->view("zac/adminfooter",$data);

?>


