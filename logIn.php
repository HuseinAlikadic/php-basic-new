<?php
include 'connect.php';



if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email != '' && $password != '') {


        $logInUser = "select * from `users` where password='$password' and email='$email'";
        // echo  $logInUser;
        $resultUser = mysqli_query($con, $logInUser);
        $value =  mysqli_fetch_array($resultUser);


        if ($value) {
            $userId = $value[0];
            $isAdmin = $value[4];
            if ($isAdmin == 1) {
                header('location:display.php?loginUserId=' . $userId);
            } else {
                header('location:userShow.php?loginUserId=' . $userId);
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Incorrect email or password!
</div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Log In form</h2>
        <form method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    Don't have an account?
                    <a href="register.php" class="">Register</a>
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Log In</button>
        </form>
    </div>

</body>

</html>