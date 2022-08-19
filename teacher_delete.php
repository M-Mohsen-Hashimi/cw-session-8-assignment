<?php
require_once("authenticate.php");
require_once("db_connection.php");

$teacher_photo = mysqli_query($con, "SELECT photo FROM teachers WHERE teacher_id =" . $_GET['teacher_id']);
$row_teacher_photo = mysqli_fetch_assoc($teacher_photo);
$path = $row_teacher_photo['photo'];
unlink($path);

$result = mysqli_query($con, "DELETE FROM teachers WHERE teacher_id = " . $_GET['teacher_id']);
if ($result) {
    header("location: index.php?delete=done");
} else {
    header("location: index.php?error=nothing removed");
}
