<?php 
if (!isset($_SESSION)) {
	session_start();
}
require_once('db_connection.php');
if (isset($_SESSION['login'])) {
    header('location: index.php');
}

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loggedIn_user = [
        'email' => $email,
        'password' => $password
    ];
    $result    = mysqli_query($con, "SELECT * FROM users WHERE email='$email'
    AND password='" . md5($password) . "'"); 
    $_SESSION['login'] = $loggedIn_user;
    // $user = mysqli_query($con, "SELECT * FROM users WHERE email = '$user_email' 
    // && password = PASSWORD('$password')");
    header('location: index.php');

}
?>
<div class="container mt-5 pt-5">
    <div class="card w-50 mx-auto">
        <div class="card-header bg-info">
            <h4 class="card-title">Sign In</h4>
        </div>
        <div class="card-body p-3">
            <form method="post">
                <div class="input-group mb-2">
                    <label class="input-group-text text-body"> Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="email " required>
                </div>
                <div class="input-group mb-2 ">
                    <label class="input-group-text text-body">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button class="btn btn-primary">Sign In</button>
                <span>Don't have an account? <a href="sign_up.php">Sign Up</a></span>
            </form>
        </div>
    </div>
</div>