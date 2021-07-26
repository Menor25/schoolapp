<?php
    include('includes/header.php');  
    include('includes/sidenav.php');

    $allKids = selectKid();

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>All Kids</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Class Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <?php if(isset($_SESSION[$Error])): ?>
                            <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                                <?php
                                    echo $_SESSION[$Error];
                                    unset($_SESSION[$Error]);

                                ?>
                            </div>
                        <?php endif; ?>

                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>List of all Kids</h3>
                            </div>
                        </div>
                    
                        <div class="table-responsive">
                            <!-- <input type="hidden" value="<?= $_SESSION['fname']['id']; ?>"> -->
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Form Teacher</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($allKid as $kid):
                                    ?>
                                                <tr>
                                                    <td><?= $kid["st_photo"]; ?></td>
                                                    <td><?= $kid["fname"]; ?></td>
                                                    <td><?= $kid["class"]; ?></td>
                                                    <td><?= $kid["section"]; ?></td>
                                                    <td>Samson</td>
                                                </tr>
                                    <?php
                                        endforeach;
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Class Table Area End Here -->

<?php
    include('includes/footer.php');
?>