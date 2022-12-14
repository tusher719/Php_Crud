<?php
session_start();
include 'header.php';

require 'db.php';


// select query
$select_trash = "SELECT * FROM crud WHERE status=1";
$select_result_trash = mysqli_query($db_connect, $select_trash);



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
                                <li><a href="index.php" class="position-relative">Home
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?php
                                        if ($data_total = mysqli_num_rows($home_result)){
                                            echo $data_total;
                                        } else{
                                            echo '0';
                                        }
                                        ?>
                                    <span class="visually-hidden">unread messages</span>
                                    </span>
                                    </a></li>
                                <li><a href="add.php">Add</a></li>
                                <li><a href="#">Update</a></li>
                                <li>
                                    <a href="trash.php" class="active position-relative">Delete
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            <?php
                                            if ($data_total = mysqli_num_rows($soft_delete_total)){
                                                echo $data_total;
                                            } else{
                                                echo '0';
                                            }
                                            ?>
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Navbar End -->

                        <?php if (isset($_SESSION['delete'])) { ?>
                            <div class="alert alert-primary mt-2" role="alert">
                                <?= $_SESSION['delete']; ?>
                            </div>
                        <?php } unset($_SESSION['delete'])?>


                        <h2 class="mt-4">Trash Record</h2>

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
                            <?php foreach ($select_result_trash as $crud) { ?>
                                <tr>
                                    <th scope="row"><?php echo $crud['id'] ?></th>
                                    <td><?php echo $crud['name'] ?></td>
                                    <td><?php echo $crud['email'] ?></td>
                                    <td><?php echo $crud['phone'] ?></td>
                                    <!--                                    <td>--><?php //echo $crud['gender'] ?><!--</td>-->
                                    <td><?php echo ($crud['gender'] == 1 ? 'Male' : 'Female') ?></td>
                                    <td><?php echo $crud['dob'] ?></td>
                                    <td>
                                        <?php
                                        $create = $crud['created_at'];
                                        $createDate = date('d M, Y', strtotime($create));
                                        $createTime = date('h:i A', strtotime($create));
                                        echo $createDate . '<br>' . $createTime; ?>
                                    </td>
                                    <td>
                                        <a href="soft_delete.php?id=<?= $crud['id'] ?>" class="view btn btn-primary">
                                            <i class="far fa-eye"></i>
                                            Restore
                                        </a>
                                        <a href="delete.php?id=<?= $crud['id'] ?>" class="view btn btn-danger">
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