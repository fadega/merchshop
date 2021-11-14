<?php
$this->view("zac/adminheader",$data);

//require_once str_replace("\\","/",dirname(__FILE__))."/mail.php";

// require_once dirname( __FILE__ ) . '../../app/core/mail.php';
// die;



$error = "";

if(count($_POST) > 0)
{

    //something was posted
    $recipient = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if(empty($recipient)){
        $error .= "recipient can not be empty<br>";
    }

    if(empty($subject)){
        $error .= "subject can not be empty<br>";
    }

    if(empty($message)){
        $error .= "message can not be empty<br>";
    }
    
    if($error == "")
    {
        if(send_mail($recipient,$subject,$message))
        {
            $error .= "Message sent!<br>";
        }else
        {
            $error .= "Message NOT sent!<br>";
        }
    }
}

?>



    <!-- Order section starts here -->
<section class="mt-5 p-4 bg-light" id="display-area">
  <h3 class="">Compose Message</h3>

  <div class="row justify-content-center mt-4">
      <div class="col-md-4">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Receipient Email</label>
                <input type="email" class="form-control mb-3 " name="email" id="reciepientemail" aria-describedby="receipientemail" placeholder="receiver@example.com">
            </div>
            <div class="mb-3">
                <label for="emailsubject" class="form-label">Subject</label>
                <input type="text" class="form-control mb-3" name="subject" aria-describedby="emailsubject" placeholder="Send us your transaction id ...">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Type your message ..." name="message" id="message" style="min-height:150px;"></textarea>
                <label for="floatingTextarea">Message</label>
            </div>
    
            <!-- <button type="submit" class="btn btn-secondary">Cancel</button> -->
            <button type="submit" class="btn btn-primary pull-right px-3">send</button>
        </form>


      </div>
      <div class="col-md-8">
          
      </div>

  </div>

  



</section> 
  <!-- End Order section  here -->>

<!-- Admin assets and scripts are called by this line -->
<?php $this->view("zac/adminassets",$data); 

$this->view("zac/adminfooter",$data);

?>
