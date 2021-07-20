<?php
require "private/autoloads.php";
include('includes/header.php');
include('includes/sidenav.php');

$libraries = selectLibrary();
deleteLibrary($id)

?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Library</h3>
        <ul>
            <li>
                <a href="library.php">Home</a>
            </li>
            <li>All Library Books</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
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
                    <h3>All Books</h3>
                </div>
            </div>
            <div class="table-responsive" id="load_table">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Book Name</th>
                            <th>Subject</th>
                            <th>Author</th>
                            <th>Class</th>
                            <th>Published</th>
                            <th>Creating Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($libraries as $library) :
                        ?>
                            <tr id="delete<?= $library['id']; ?>">
                                <td><?= $library["book_id"]; ?></td>
                                <td><?= $library["book_name"]; ?></td>
                                <td><?= $library["subject"]; ?></td>
                                <td><?= $library["author"]; ?></td>
                                <td><?= $library["class"]; ?></td>
                                <td><?= $library["edition"]; ?></td>
                                <td><?= $library["creating_date"]; ?></td>
                                <td>
                                    <a href="edit-library.php?edit=<?= $library['id']; ?>" class="btn btn-info">Edit</a> |
                                    <a href="library.php?delete=<?= $library['id']; ?>" class="delete btn btn-danger" onclick="deleteLibrary(<?= $library['id']; ?>)">Delete</a>
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
    <!-- Teacher Table Area End Here -->

<script type="text/javascript">
    function deleteLibrary(id){
        if(confirm('Are you sure you want to delete this?')){

            $.ajax({
                method:     'POST',
                url:        'functions.php',
                data:       {delete:id},
                success:    function(data){
                    $('#delete'+id).hide(slow);
                }
            })
        }
    }

</script>
    <?php
    include('includes/footer.php');
    ?>