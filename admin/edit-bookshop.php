<?php 
    include('includes/header.php');
    include('includes/sidenav.php');


    $Error = "";


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        bookshopEdit(
            $book_name = trim($_POST['book_name']),
            $subject = trim($_POST['subject']),
            $author = trim($_POST['author']),
            $class = trim($_POST['class']),
            $published = trim($_POST['published']),
            $edition = trim($_POST['edition']),
            $book_id = trim($_POST['book_id']),
            $id = $_POST['id'],
        );
        
        // header('Location: addd-class.php');
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];

        $stmt = $connection->prepare('SELECT * FROM bookshop WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();

                $book_name = $row['book_name'];
                $subject = $row['subject'];
                $author = $row['author'];
                $class = $row['class'];
                $published = $row['published'];
                $edition = $row['edition'];
                $book_id = $row['book_id'];
            }
        $stmt->close();

    }

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Bookshop</h3>
                    <ul>
                        <li>
                            <a href="bookshop.php">Home</a>
                        </li>
                        <li>Edit Book</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add New Book Area Start Here -->
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
                                <h3>Edit Book</h3>
                            </div>
                        </div>
                        <form class="new-added-form" method="POST" action="#">
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Book Name *</label>
                                    <input type="text" placeholder="" name="book_name" value="<?= $book_name ?>" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject *</label>
                                    <input type="text" placeholder="" name="subject" value="<?= $subject  ?>" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Author Name *</label>
                                    <input type="text" placeholder="" name="author" value="<?= $author ?>" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <select class="select2" name="class">
                                        <option value="<?= $class ?>"><?= $class ?></option>
                                        <?php
                                            $stmt1 = $connection->prepare('SELECT * FROM class');
                                            $stmt1->execute();
                                            $result = $stmt1->get_result();
                                    
                                            while($row = $result->fetch_assoc()){
                                                $className = $row['class_name'];

                                        ?>
                                                <option value="<?= $className ?>"><?= $className ?></option>
                                        <?php


                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>ID No</label>
                                    <input type="text" placeholder="" name="book_id" value="<?= $book_id ?>" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Publishing Date *</label>
                                    <input type="text" placeholder="" name="published" value="<?= $published ?>" class="form-control">
                                </div>
                                <!-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Upload Date *</label>
                                    <input type="date" placeholder="" name="creating_date" class="form-control">
                                </div> -->
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Edition *</label>
                                    <input type="text" placeholder="" name="edition" value="<?= $edition ?>" class="form-control">
                                </div>

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add New Book Area End Here -->
 
<?php
    include('includes/footer.php');
?>