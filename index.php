<?php
require_once("authenticate.php");
require_once("db_connection.php");

$teacher = mysqli_query($con, "SELECT * from teachers");
$row_teacher = mysqli_fetch_array($teacher);

?>

<div class="container my-5 p-5">
    <a href="logout.php">Logout</a>
    <div class="card">
        <div class="card-header bg-primary">
            <div class=" h4 card-title">Teachers' List</div>
            <a href="teacher_add.php" class="btn btn-success">Add</a>
        </div>
        <div class="card-body  ">
            <?php if ($row_teacher > 0) { ?>
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Photo</th>
                        <th>Actions</th>

                    </tr>
                    <?php $x = 1;
                    do { ?>
                        <tr>
                            <td><?= $x++; ?></td>
                            <td><?= $row_teacher["first_name"]; ?></td>
                            <td><?= $row_teacher["last_name"]; ?></td>
                            <td><?= $row_teacher["email"]; ?></td>
                            <td><?= $row_teacher["department"]; ?></td>
                            <td><img src="<?= $row_teacher["photo"]; ?>" alt="teacher_img" width="50" height="50"></td>
                            <td><a href="teacher_edit.php?teacher_id=<?= $row_teacher["teacher_id"]; ?>" class="btn btn-info">Edit</a>
                                <a href="teacher_delete.php?teacher_id=<?= $row_teacher["teacher_id"]; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } while ($row_teacher = mysqli_fetch_assoc($teacher)) ?>
                </table>
            <?php } else { ?>
                <div class="alert alert-warning lead">No available teacher!</div>
            <?php } ?>
        </div>
    </div>
</div>