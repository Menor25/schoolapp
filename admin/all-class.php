<?php
    require "private/autoloads.php";
    include('includes/header.php');  
    include('includes/sidenav.php');

    $allClass = selectClass();

    deleteClass($id)

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Classes</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>All Classes</li>
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
                                <h3>List of all classes</h3>
                            </div>
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>School</th>
                                        <th>Subjects</th>
                                        <th>Form Teacher</th>
                                        <th>Fees</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($allClass as $class):
                                    ?>
                                                <tr>
                                                    <td><?= $class["class_name"]; ?></td>
                                                    <td><?= $class["schoolId"]; ?></td>
                                                    <td><?= $class["no_of_subjects"]; ?></td>
                                                    <td><?= $class["form_teacher"]; ?></td>
                                                    <td><?= $class["fees"]; ?></td>
                                                    <td>
                                                        <a href="edit-class.php?edit=<?= $class['id']; ?>" class="btn btn-info">Edit</a> | 
                                                        <a href="all-class.php?delete=<?= $class['id']; ?>" class="btn btn-danger" onclick="alert('Are you sure you want to delete this class?')">Delete</a>
                                                    </td>
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