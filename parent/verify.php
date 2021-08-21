<?php
  require "private/database.php";
    // $ref = $_GET['reference'];
    // if($ref = ""){
    //     header("Location: javascript://history.go(-1)");
    // }
  $curl = curl_init();

  //Get the reference code from the url
  if(!empty($_GET['reference'])){
    //clean the reference code
    $sanitize = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $reference = rawurlencode($sanitize["reference"]);
  }else{
    die("No reference was supplied!");
  }

  //Set the configurations
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
    CURLOPT_RETURNTRANSFER => true,

    //Set the headers
    CURLOPT_HTTPHEADER => [
      "accept: application/json",
      "authorization: Bearer sk_test_c410b5ef92712fd91d4198248664a4b38ef2b8aa",
      "cache-control: no-cache"
    ]
  )

  );

  //Execute url
  $response = curl_exec($curl);

  $err = curl_error($curl);
  if($err){
    die("cURL return some errors: " . $err);
  }

  $transaction = json_decode($response);

  if(!$transaction->status){
    die("API return an error:" .$transaction->message);
  }
  if("success" == $transaction->data->status){
    $status = $transaction->data->status;
    $reference = $transaction->data->reference;
    $amount = $transaction->data->amount;
    $email = $transaction->data->customer->email;
    $fname = $transaction->data->customer->first_name;
    $lname = $transaction->data->customer->last_name;
    $fullName = $fname. ' ' .$lname;
    $phone = $transaction->data->customer->phone;
    date_default_timezone_set('Africa/Lagos');
    $date_paid = date('m/d/Y h:i:s a', time());
    // $productName = $transaction->data->metadata->custom_fields[0]->value;

    $stmt1 = $connection->prepare("INSERT INTO tblpayment (status, reference, fullName, phone, amount, date_paid, email) VALUES(?,?,?,?,?,?,?)");
    $stmt1->bind_param("sssssss", $status, $reference, $fullName, $phone, $amount, $date_paid, $email);
    $stmt1->execute();
    if(!$stmt1){
        echo "There was a problem on your code" . mysqli_error($connection);
    }else {
        header("Location: success.php?status=success");
        exit;
    }
    $stmt1->close();
}
else{
    header("Location: payment-details.php");
    exit;
}

?>