<?php
require_once("db_connection.php");
if (isset($_SESSION['login'])) {
    header('location: index.php');
}
if (isset($_POST['email']) && isset($_POST['password'])) {

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($con, "INSERT into users VALUES (NULL, '$user_name','$email', '" . md5($password) . "')");
    var_dump($result);
    if ($result) {
        header("location: index.php?add=done");
    } else {
        echo "<h2>" . mysqli_error($con) . "</h2>";
         header("location: sign_up.php?error=wasn't added");
    }
}

?>
<div class="container mt-5 pt-5">
    <div class="card w-50 mx-auto">
        <div class="card-header bg-info">
            <h4 class="card-title">Sign Up</h4>
        </div>
        <div class="card-body p-3">
            <form method="post">
                <div class="input-group mb-2">
                    <label class="input-group-text text-body"> Username:</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Username " required>
                </div>
                <div class="input-group mb-2">
                    <label class="input-group-text text-body"> Username:</label>
                    <input type="email" name="email" class="form-control" placeholder="Email " required>
                </div>
                <div class="input-group mb-2 ">
                    <label class="input-group-text text-body">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button class="btn btn-primary">Sign Up</button>
                <span>Already have an account? <a href="login.php">Login</a></span>
            </form>
        </div>
    </div>
</div>