<?php
require_once("authenticate.php");
require_once("db_connection.php");
if (!isset($_GET['teacher_id'])) {
    header('location: index.php');
}
$teacher = mysqli_query($con, "SELECT * FROM teachers WHERE teacher_id = " . $_GET["teacher_id"]);
$row_teacher = mysqli_fetch_array($teacher);

if (isset($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $department = $_POST["department"];
    if ($_FILES["photo"]["name"] != "") {
        $old_img = $row_teacher['photo'];
        unlink($old_img);
        $path = "images/" . $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
    } else {
        $path = $row_teacher['photo'];
    }

    $result = mysqli_query($con, "UPDATE teachers SET first_name = '$first_name', 
            last_name = '$last_name', email = '$email', photo = '$path', 
            department = '$department' WHERE teacher_id = " . $_GET['teacher_id']);
    if ($result) {
        header("location: index.php?edit=done");
    } else {
        header("location: teacher_edit.php?error=not edited&teacher_id=" . $_GET["teacher_id"]);
    }
}
?>

<div class="container my-5 p-5 w-50">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="h4 card-title">Edit Teacher</div>

        </div>
        <div class="card-body p-3">
            <form method="post" enctype="multipart/form-data">
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">First name:</label>
                    <input  required type="text" name="first_name" value="<?= $row_teacher['first_name']; ?>" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Last name:</label>
                    <input required type="text" name="last_name" value="<?= $row_teacher['last_name']; ?>" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Email:</label>
                    <input required type="email" name="email" value="<?= $row_teacher['email']; ?>" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Photo:</label>
                    <input type="file" name="photo"   class="form-control">
                    <label><img src="<?= $row_teacher["photo"]; ?>" alt="teacher_img" width="40" height="40"></label>
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Department:</label>
                    <input required type="text" name="department" value="<?= $row_teacher['department']; ?>" class="form-control">
                </div>
                <button class="btn btn-primary w-25">Save</button>
            </form>
        </div>
    </div>
</div>