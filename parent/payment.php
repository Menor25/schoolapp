<?php
include('includes/header.php');
include('includes/sidenav.php');


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
        <div class="container pb-5 mb-2 mb-md-4">
            <div class="row">
                <section class="col-lg-8">

                    <!-- Payment methods accordion-->
                    <h2 class="h3 mt-5 pb-3 mb-2">Choose payment method</h2>
                    <div class="accordion mb-2" id="payment-method" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h3 class="accordion-heading font-size-lg"><a href="#card" data-toggle="collapse">
                                        <i class="icofont-card font-size-lg mr-2 mt-n1 align-middle"></i>Pay with Credit Card
                                        <i class="fa fa-angle-down" style="float: right;"></i></a>
                                </h3>
                            </div>

                            <div class="collapse show" id="card" data-parent="#payment-method" role="tabpanel">
                                <div class="card-body">
                                    <p class="font-size-sm">We accept the following credit cards:&nbsp;&nbsp;
                                        <img class="d-inline-block align-middle" src="./images/payment.png" style="width: 187px;" alt="Cerdit Cards">
                                    </p>
                                    <div class="card-wrapper"></div>
                                    <form class="interactive-credit-card row">
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" style="box-shadow: none;" type="text" name="number" placeholder="Card Number" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" style="box-shadow: none;" type="text" name="name" placeholder="Full Name" required>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <input class="form-control" style="box-shadow: none;" type="text" name="expiry" placeholder="MM/YY" required>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <input class="form-control" style="box-shadow: none;" type="text" name="cvc" placeholder="CVC" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-outline-success btn-block mt-0" type="submit" style="font-size: 15px; padding: 10px;">Make Payment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="payment-method" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h3 class="accordion-heading font-size-lg"><a href="#card1" data-toggle="collapse">
                                        <i class="icofont-card font-size-lg mr-2 mt-n1 align-middle"></i>Pay with Direct Transfer
                                        <i class="fa fa-angle-down" style="float: right;"></i></a>
                                </h3>
                            </div>

                            <div class="collapse show" id="card1" data-parent="#payment-method" role="tabpanel">
                                <div class="card-body">
                                    <h3 class="font-size-lg align-middle mb-0" style="font-weight: 600;">We also accept direct transfer to school account:</h3>
                                    <div class="card-wrapper"></div>
                                    <form class="interactive-credit-card row">
                                        <div class="form-group col-sm-12">
                                            <p>Accont Name: Freedom Assembly Group of Schools <br>
                                                Account Number: 1111111111111111<br>
                                                Bank Name: Sterling Bank
                                            </p>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <p class="text-success mb-0">After payment send, send a screenshot of payment below. Thank you!</p>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input class="form-control" style="box-shadow: none;" type="file" name="expiry">
                                        </div>

                                        <div class="col-sm-6">
                                            <button class="btn btn-outline-success btn-block mt-0" type="submit" style="font-size: 15px; padding: 10px;">Send Screenshot</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Sidebar-->
                <aside class="col-lg-4 pt-4 pt-lg-0 mt-5">
                    <div class="rounded-lg box-shadow-lg ml-lg-auto">
                        <div class="widget mb-3">
                            <div class="card-header">
                                <h2 class="widget-title text-center" style="font-size: 20px;">Order summary</h2>
                            </div>
                            
                            <div class="card-body">
                                <div class="media align-items-center pb-2 border-bottom">
                                    <div class="media-body">
                                        <h6 class="widget-product-title font-size-lg">Women Colorblock Sneakers</h6>
                                        <div class="widget-product-meta font-size-sm"><span class="text-accent mr-2">N150.<small>00</small></span></div>
                                    </div>
                                </div>
                                <div class="media align-items-center pb-2 border-bottom">
                                    <div class="media-body">
                                        <h6 class="widget-product-title font-size-lg">Women Colorblock Sneakers</h6>
                                        <div class="widget-product-meta font-size-sm"><span class="text-accent mr-2">N150.<small>00</small></span></div>
                                    </div>
                                </div>
                                <div class="media align-items-center pb-2 border-bottom">
                                    <div class="media-body">
                                        <h6 class="widget-product-title font-size-lg">Women Colorblock Sneakers</h6>
                                        <div class="widget-product-meta font-size-sm"><span class="text-accent mr-2">N150.<small>00</small></span></div>
                                    </div>
                                </div>
                                <div class="media align-items-center pb-2 border-bottom">
                                    <div class="media-body">
                                        <h6 class="widget-product-title font-size-lg">Women Colorblock Sneakers</h6>
                                        <div class="widget-product-meta font-size-sm"><span class="text-accent mr-2">N150.<small>00</small></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <ul class="list-unstyled font-size-sm pb-2 border-bottom">
                                <li class="d-flex justify-content-between align-items-center">
                                    <span class="mr-2">Total:</span><span class="text-right">N265.<small>00</small></span>
                                </li>
                            </ul>
                            <h3 class="font-weight-normal text-center my-4">N274.<small>50</small></h3>
                            <form class="needs-validation" method="post" novalidate>
                                <div class="form-group">
                                    <input class="form-control" style="box-shadow: none;" type="text" placeholder="Promo code" required>
                                    <div class="invalid-feedback">Scholarship code.</div>
                                </div>
                                <button class="btn btn-outline-success btn-block" style="font-size: 14px;" type="submit">Apply code</button>
                            </form>
                        </div>
                    </div>

                </aside>
            </div>
            

    <?php
    include('includes/footer.php');
    ?>