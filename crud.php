<?php
    session_start();
    include 'header.php';

    require 'db.php';


    // select query
    $crud = "SELECT * FROM crud WHERE status=0";
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
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="add.php">Add</a></li>
                            <li><a href="#">Update</a></li>
                            <li><a href="trash.php">Delete</a></li>
                        </ul>
                    </div>
                    <!-- Navbar End -->

                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-primary mt-2" role="alert">
                            <?= $_SESSION['success']; ?>
                        </div>
                    <?php } unset($_SESSION['success'])?>


                    <h2 class="mt-4">All Record</h2>
                    <h6>
                        <?php
                            if($db_connect){
                                echo 'Database Connected';
                            } else {
                                echo 'Database Error 404';
                            }
                        ?>
                    </h6>

                    <!-- Table Start -->
                    <table class="table table-border table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Date of birth</th>
                            <th scope="col">Created_at</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($crud_result as $crud) { ?>
                                <tr>
                                    <th scope="row"><?php echo $crud['id'] ?></th>
                                    <td><?php echo $crud['name'] ?></td>
                                    <td><?php echo $crud['email'] ?></td>
                                    <td><?php echo $crud['phone'] ?></td>
<!--                                    <td>--><?php //echo $crud['gender'] ?><!--</td>-->
                                    <td><?php echo ($crud['gender'] == 1 ? 'Male' : 'Female') ?></td>
                                    <td><?php echo $crud['dob'] ?></td>
                                    <td><?php echo $crud['created_at'] ?></td>
                                    <td>
                                        <a href="edit_view.php?id=<?= $crud['id'] ?>" class="view btn btn-primary">
                                            <i class="far fa-eye"></i>
                                            View
                                        </a>
                                        <a href="soft_delete.php?id=<?= $crud['id'] ?>" class="view btn btn-danger">
                                            <i class="far fa-eye"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Table End -->

                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'?>