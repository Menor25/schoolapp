<?php
include('includes/header.php');
include('includes/sidenav.php');

$books = selectBookshop();
deleteBookshop($id)

?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Library</h3>
        <ul>
            <li>
                <a href="bookshop.php">Home</a>
            </li>
            <li>Bookshop</li>
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
            <div class="table-responsive">
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
                        foreach ($books as $book) :
                        ?>
                            <tr>
                                <td><?= $book["book_id"]; ?></td>
                                <td><?= $book["book_name"]; ?></td>
                                <td><?= $book["subject"]; ?></td>
                                <td><?= $book["author"]; ?></td>
                                <td><?= $book["class"]; ?></td>
                                <td><?= $book["edition"]; ?></td>
                                <td><?= $book["creating_date"]; ?></td>
                                <td>
                                    <a href="edit-bookshop.php?edit=<?= $book['id']; ?>" class="btn btn-info">Edit</a> |
                                    <a href="bookshop.php?delete=<?= $book['id']; ?>" class="btn btn-danger">Delete</a>
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

    <?php
    include('includes/footer.php');
    ?>