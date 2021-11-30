<?php
// include 'connect.php';
require "../private/autoload.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $note = $_POST['note'];

    $sql = "insert into `users` (name,email,password,is_admin,note)
    values('$name','$email','$password',0,'$note')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "Data inserted successfully";
        $logInUser = "select id from `users` where name='$name' and email='$email'";
        // echo  $logInUser;
        $resultUser = mysqli_query($con, $logInUser);
        $value =  mysqli_fetch_array($resultUser);
        $userId = $value[0];
        header('location:userShow.php?loginUserId=' . $userId);
    } else {
        echo 'No connection';
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
    <div class="container my-5">
        <h2>Registration form</h2>
        <br>
        <form method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter your name" autocomplete="off" name="name">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" autocomplete="off" name="email">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            <div class="form-group">
                <label>Note:</label>
                <textarea class="form-control" rows="5" placeholder="Enter your note" name="note"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>