<?php
require_once("authenticate.php");
require_once("db_connection.php");

if (isset($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    
    $department = $_POST["department"];
    if ($_FILES["photo"]["name"] != "") {
        $path = "images/" . $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
    }
    else {
        $path = 'No image exists';
    }
    $result = mysqli_query($con, "INSERT INTO teachers VALUES (NULL, '$first_name', '$last_name','$email', '$path', '$department' )");
    if ($result) {
        header("location: index.php?add=done");
    } else {
        header("location: teacher_add.php?error=wasn't added");
    }
}
?>

<div class="container my-5 p-5 w-50">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="h4 card-title ">Add Teacher</div>
        </div>
        <div class="card-body p-3">
            <form method="post" enctype="multipart/form-data">
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">First name:</label>
                    <input required type="text" name="first_name" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Last name:</label>
                    <input required type="text" name="last_name" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Email:</label>
                    <input required type="email" name="email" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Photo:</label>
                    <input  type="file" name="photo" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <label class="input-group-text text-body">Department:</label>
                    <input required type="text" name="department" class="form-control">
                </div>
                <button class="btn btn-primary w-25">Add</button>
            </form>
        </div>
    </div>
</div>