<?php
    // $ref = $_GET['reference'];
    // if($ref = ""){
    //     header("Location: javascript://history.go(-1)");
    // }
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_c410b5ef92712fd91d4198248664a4b38ef2b8aa",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);

  }
  if($result->data->status == "success"){

    $status = $result->data->status;
    $reference = $result->data->reference;
    $fname = $result->data->customer->first_name;
    $lname = $result->data->customer->last_name;
    $fullName = $fname. ' ' .$lname;
    $phone = $result->data->customer->phone;
    $amount = $result->data->amount;
    $parentEmail = $result->data->customer->email;
    date_default_timezone_set('Africa/Lagos');
    $dateTime = date('m/d/Y h:i:s a', time());

    include('private/database.php');
    $stmt = $connection->prepare("INSERT INTO tblpayment (status, reference, fullName, phone, amount, date_paid, email) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $status, $reference, $fullName, $phone, $amount, $dateTime, $parentEmail);
    $stmt->execute();
    if(!$stmt){
        echo "There was a problem on your code" . mysqli_error($connection);
    }else {
        header("Location: success.php?status=success");
        exit;
    }
    $stmt->close();
}
else{
    header("Location: payment-details.php");
    exit;
}
?>




//payment
<?php
include('includes/header.php');
include('includes/sidenav.php');

$parentName = $_SESSION['fname']['id'];
global $connection;

$stmt1 = $connection->prepare('SELECT * FROM payment_details WHERE pname = ?');
$stmt1->bind_param('s', $parentName);
$stmt1->execute();
$result = $stmt1->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
   $amount = $row['amount'];
   $fname = $row['fname'];
   $pname = $row['pname'];
   $email = $row['email'];
    $phone = $row['phone'];
}

$stmt1->close();


?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parent</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Make Payment</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Payment details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Make Payment</h3>
                </div>
            </div>
            <form class="new-added-form" id="paymentForm">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Email *</label>
                        <input type="email" id="email-address" name="email" class="form-control" value="<?= $email; ?>" required />
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Amount *</label>
                        <input type="tel" id="amount" name="amount" placeholder="" class="form-control" value="<?= $amount;?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Your Child Name *</label>
                        <input type="text" id="first-name" placeholder="" class="form-control" value="<?=$fname; ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Your Name *</label>
                        <input type="text" id="last-name" placeholder="" class="form-control" value="<?=$pname; ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Phone Number *</label>
                        <input type="text" id="phone" placeholder="" class="form-control" value="<?= $phone;?>" required>
                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onclick="payWithPaystack()">Pay Now</button>
                    </div>
                </div>
            </form>
            <script src="https://js.paystack.co/v1/inline.js"></script>
        </div>
    </div>


    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();
            const api = "pk_test_14decedb7e5c5b081917e1fe79a3090af1118342";
            let handler = PaystackPop.setup({
                key: api, // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                fname: document.getElementById("first-name").value,
                fname: document.getElementById("last-name").value,
                phone: document.getElementById("phone").value,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function() {
                    window.location ='http://localhost/schoolapp/schoolapp/parent/payment-details.php';
                    alert('Transaction cancelled.');
                },
                callback: function(response) {
                    let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);
                    window.location = "http://localhost/schoolapp/schoolapp/parent/verify_transaction.php?reference=" + response.reference;
                }
            });
            handler.openIframe();
        }
    </script>
    <?php
    include('includes/footer.php');
    ?>