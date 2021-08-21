<?php
    include('includes/header.php');  
    include('includes/sidenav.php');
    $Error = "";

    $allKids = selectKid();
    // $students = selectParentKid();

    $sn = 1;
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
                                        <th>S/N</th>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Form Teacher</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($allKids as $kid):
                                    ?>
                                                <tr>
                                                    <td><?= $sn; ?></td>
                                                    <td><a href="student-details.php?profile=<?= $kid['id']; ?>"><img src="<?= $kid["st_photo"]; ?>" alt="<?= $kid["fname"];?>" width="60" height="50"></a></td>
                                                    <td><a href="student-details.php?profile=<?= $kid['id']; ?>"><?= $kid["fname"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $kid['id']; ?>"><?= $kid["class"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $kid['id']; ?>"><?= $kid["school"]; ?></a></td>
                                                    <td>Samson</td>
                                                </tr>
                                    <?php
                                        $sn++;
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