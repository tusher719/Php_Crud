<?php
    session_start();
    include 'header.php';

    require 'db.php';

    // select query
    $crud = "SELECT * FROM crud";
    $crud_result = mysqli_query($db_connect, $crud);
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
                                <li><a href="add.php" class="active">Add</a></li>
                                <li><a href="#">Update</a></li>
                                <li><a href="trash.php">Delete</a></li>
                            </ul>
                        </div>
                        <!-- Navbar End -->

                        <h2 class="mt-4">Add New Record</h2>

                        <!-- Table Card -->
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="card bg-secondary text-dark bg-opacity-25">
                                    <div class="card-body">

                                        <form action="crud_post.php" method="post">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Name</strong>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter name">
                                                    <?php if (isset($_SESSION['name_err'])) { ?>
                                                        <div class="bg-warning mt-1" class="eror_message">
                                                            <?= $_SESSION['name_err']; ?>
                                                        </div>
                                                    <?php } unset($_SESSION['name_err'])?>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Email</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                                    <?php if (isset($_SESSION['email_err'])) { ?>
                                                        <span class="badge bg-danger">
                                                            <?= $_SESSION['email_err']; ?>
                                                        </span>
                                                    <?php } unset($_SESSION['email_err'])?>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Phone</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                                                    <?php if (isset($_SESSION['phone_err'])) { ?>
                                                        <div class="bg-warning mt-1" class="eror_message">
                                                            <?= $_SESSION['phone_err']; ?>
                                                        </div>
                                                    <?php } unset($_SESSION['phone_err'])?>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Date of birth</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="date" class="form-control" name="dob">
                                                    <?php if (isset($_SESSION['dob_err'])) { ?>
                                                        <div class="bg-warning mt-1" class="eror_message">
                                                            <?= $_SESSION['dob_err']; ?>
                                                        </div>
                                                    <?php } unset($_SESSION['dob_err'])?>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <strong>Gender</strong>
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <?php if (isset($_SESSION['gender_err'])) { ?>
                                                        <div class="bg-warning mt-1" class="eror_message">
                                                            <?= $_SESSION['gender_err']; ?>
                                                        </div>
                                                    <?php } unset($_SESSION['gender_err'])?>
                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-9 mt-2">
                                                    <input type="submit" class="btn btn-dark" value="Save">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table Card -->

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include 'footer.php'?>