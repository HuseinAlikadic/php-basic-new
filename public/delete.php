<?php
// include 'connect.php';
require "../private/autoload.php";
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $loginUserId = $_GET['loginUserId'];

    $sql = "delete from `users` where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Deleted successfully";
        header('location:display.php?loginUserId=' . $loginUserId);
    } else {
        die(mysqli_error($con));
    }
}
