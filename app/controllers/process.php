<?php



class Process extends Controller{

    function index(){

        //you can do this if passing data to view
        // $data["Page_title"] = "payment";

        // if($_SERVER['REQUEST_METHOD'] == "POST"){
           
        //     // this is a debuggin code
        //     //echo "I am signin controller <br />";
        //     // show($_POST);
        //     $user = $this->loadModel("User");
        //     $user->signin($_POST);
            
        // }
        // $this->view("zac/signin",$data);




         show($_POST);

        if(!empty($_POST['stripeToken'])){
            // get token and user details
            $stripeToken             = $_POST['stripeToken'];
            $data['custName']        = $_POST['custName'];
            $data['custEmail']       = $_POST['custEmail'];
            $data['cardNumber']      = $_POST['cardNumber'];
            $data['cardCVC']         = $_POST['cardCVC'];
            $data['cardExpMonth']    = $_POST['cardExpMonth'];
            $data['cardExpYear']     = $_POST['cardExpYear'];    

            show($_POST);
            //include Stripe PHP library
            require_once('stripe-php/init.php');    
            //set stripe secret key and publishable key
            $stripe = array(
              "secret_key"      => "sk_test_51Je0I6L1JiPuFk2YcMye08M3BMNI9KFca7NLqqjCdwJJ693eXh2CMyFovKiGJ0WLOkUBtEShkxgQQtCVHKskLy6G008Mh6fMYT",
              "publishable_key" => "pk_test_51Je0I6L1JiPuFk2YwfIQJJ8NZfYRSmT1efPn4gw148RHLuuYJmikuhOd9mYViow51gAX0GeX3ptq9LFlSKo8PDUl006r0nfpdq"
            );    
            \Stripe\Stripe::setApiKey($stripe['secret_key']);    
            //add customer to stripe
            $customer = \Stripe\Customer::create(array(
                'email' => $custEmail,
                'source'  => $stripeToken
            ));    
            // item details for which payment made
            $data['itemName']   =  "phpzag test item";
            $data['itemNumber'] = "PHPZAG987654321";
            $data['itemPrice']  = 50;
            $data['currency']   =  "usd";
            $data['orderID ']   = "SKA987654321";    
            // details for which payment performed
            $payDetails = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $itemPrice,
                'currency' => $currency,
                'description' => $itemName,
                'metadata' => array(
                    'order_id' => $orderID
                )
            ));    
            // get payment details
            $paymenyResponse = $payDetails->jsonSerialize();
            // check whether the payment is successful
            if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
                // transaction details 
                $data['amountPaid']         = $paymenyResponse['amount'];
                $data['balanceTransaction'] = $paymenyResponse['balance_transaction'];
                $data['paidCurrency']       = $paymenyResponse['currency'];
                $data['paymentStatus']      = $paymenyResponse['status'];
                $data['paymentDate']        = date("Y-m-d H:i:s");        
                //insert tansaction details into database
                // include_once("../db_connect.php");
                $db = Database::newInstance();
                
                // $insertTransactionSQL = "INSERT INTO transaction(cust_name, cust_email, card_number, card_cvc, 
                // card_exp_month, card_exp_year,item_name, item_number, item_price, item_price_currency,
                // paid_amount, paid_amount_currency, txn_id, payment_status, created, modified) 
                // VALUES('".$custName."','".$custEmail."','".$cardNumber."','".$cardCVC."','".$cardExpMonth."',
                // '".$cardExpYear."','".$itemName."','".$itemNumber."','".$itemPrice."','".$paidCurrency."',
                // '".$amountPaid."','".$paidCurrency."','".$balanceTransaction."','".$paymentStatus."',
                // '".$paymentDate."','".$paymentDate."')";

                $query = "INSERT INTO transaction(cust_name, cust_email, card_number, card_cvc, 
                card_exp_month, card_exp_year,item_name, item_number, item_price, item_price_currency,
                paid_amount, paid_amount_currency, txn_id, payment_status, created, modified) 
                VALUES(:cust_name, :cust_email, :card_number, :card_cvc, 
                :card_exp_month, :card_exp_year,:item_name, :item_number, :item_price, :item_price_currency,
                :paid_amount, :paid_amount_currency, :txn_id, :payment_status, :created, :modified)";

                $res = $db->read($query,$data);


            // mysqli_query($conn, $insertTransactionSQL) or die("database error: ". 
            //     mysqli_error($conn));
            //     $lastInsertId = mysqli_insert_id($conn);        
                //if order inserted successfully
               if($res && $paymentStatus == 'succeeded'){
                    $paymentMessage = "The payment was successful. Order ID: {$lastInsertId}";
               } else{
                  $paymentMessage = "Payment failed First !";
               }
            } else{
                $paymentMessage = "Payment failed Second!";
            }
        } else{
            $paymentMessage = "Payment failed Third!";
        }
        echo $paymentMessage;
        
    }


}