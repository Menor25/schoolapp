<?php
ob_start();
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

//integrating paystack
if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $amount = htmlspecialchars($_POST['amount']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $phone = htmlspecialchars($_POST['phone']);

    //initiate paystack
    $url = "https://api.paystack.co/transaction/initialize";

    //Get params
    $transaction_data = [
        "email" => $email,
        "amount" => $amount * 100,
        "first_name" => $first_name,
        "last_lame" => $last_name,
        "phone" => $phone,
        "callback_url" => "http://localhost/schoolapp/schoolapp/parent/verify.php",
        "metadata" => [
            "custom_fields" => [
                "display_name" => "Product Name",
                "variable_name" => "school",
                "value" => "School Fees",
            ]
        ]
    ];
    
    //Generate a URL-encoded string
    $encode_transaction_data = http_build_query($transaction_data);

    //open connect to cURL
    $ch = curl_init();

    // //Turn off SSL checking
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    //set the url
    curl_setopt($ch, CURLOPT_URL, $url);

    //ENable data to be sent in post arrays
    curl_setopt($ch, CURLOPT_POST, true);

    //collect the posted data from above
    curl_setopt($ch, CURLOPT_POSTFIELDS, $encode_transaction_data);

    //set headers from the end point
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_c410b5ef92712fd91d4198248664a4b38ef2b8aa",
        "cache-Control: no-cache"
    ));

    //Allow curl return the data instead of echoing it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //Execute cURL
    $result = curl_exec($ch);

    //Check for errors
    $error = curl_error($ch);

    if($error){
        die("cURL return some errors:" . $error);
    }

    $transactions = json_decode($result);

    //Automatically redirect customers to payment page
    // echo '<script>location.href="$transactions->data->authorization_url"</script>';
    header('Location: ' . $transactions->data->authorization_url);
}
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
            <form class="new-added-form" id="paymentForm" method="POST" action="">
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
                        <input type="text" id="first-name" name="first_name" placeholder="" class="form-control" value="<?=$fname; ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Your Name *</label>
                        <input type="text" id="last-name" name="last_name" placeholder="" class="form-control" value="<?=$pname; ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Phone Number *</label>
                        <input type="text" id="phone" name="phone" placeholder="" class="form-control" value="<?= $phone;?>" required>
                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Pay Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php
    include('includes/footer.php');
    ?>