<?php
session_start();
include 'header.php';

// database connection
require 'db.php';

$id = $_GET['id'];

$select_crud = "SELECT * FROM crud  WHERE id=$id";
$select_result_crud = mysqli_query($db_connect, $select_crud);
$after_assoc = mysqli_fetch_assoc($select_result_crud);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">

                <div class="card">
                    <h5 class="card-header bg-success text-white text-center fst-italic">CRUD</h5>
                    <div class="card-body">
                        <!-- Navbar Start -->
                        <div class="nav">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="add.php">Add</a></li>
                                <li><a href="#" class="active">Update</a></li>
                                <li><a href="trash.php">Delete</a></li>
                            </ul>
                        </div>
                        <!-- Navbar End -->

                        <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert alert-primary mt-2" role="alert">
                                <?= $_SESSION['success']; ?>
                            </div>
                        <?php } unset($_SESSION['success'])?>


                        <h2 class="mt-4">Edit Records</h2>

                        <!-- Box Start -->
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="card bg-secondary text-dark bg-opacity-25">
                                    <div class="card-body">

                                        <form action="update.php" method="post">
                                            <div class="row">
                                                <div class="col-md-3 mt-2">
                                                    <strong>Id</strong>
                                                </div>
                                                <div class="col-md-9 mt-2 mb-5">
                                                    <input type="text" class="form-control" name="crud_id" value="<?= $after_assoc['id'] ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <strong>Name</strong>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?= $after_assoc['name'] ?>">
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Email</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?= $after_assoc['email'] ?>">
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Phone</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone" value="<?= $after_assoc['phone'] ?>">
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Date of birth</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="date" class="form-control" name="dob" value="<?php echo $after_assoc['dob'] ?>">
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Gender</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1" <?= $after_assoc['gender'] == '1' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="2" <?= $after_assoc['gender'] == '2' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="submit" class="btn btn-dark" value="Update">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Box End -->

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include 'footer.php'?>