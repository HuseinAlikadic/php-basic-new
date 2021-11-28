<?php
include 'connect.php';

$id = $_GET['updateid'];
$loginUserId = $_GET['loginUserId'];
//select data for update user
$sql = "Select * from `users` where id=$id";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$note = $row['note'];

//select date for login user to find is admin value
$logInUser = "Select * from `users` where id=$loginUserId";
$resultUser = mysqli_query($con, $logInUser);
$value =  mysqli_fetch_array($resultUser);
$isAdmin = $value[4];


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $note = $_POST['note'];
    $sql = "update `users` set id=$id,name='$name',email='$email',password='$password',note='$note' where id=$id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "Updated successfully";
        if ($isAdmin == 1) {
            header('location:display.php?loginUserId=' . $loginUserId);
        } else {
            header('location:userShow.php?loginUserId=' . $id);
        }
    } else {
        echo 'Something is wrong with the data, please contact an authorized person.';
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
        <h2>Update user info</h2>
        <br>
        <form method="post">

            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter your name" autocomplete="off" name="name" value=<?php echo $name; ?>>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" autocomplete="off" name="email" value=<?php echo $email; ?>>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password" value=<?php echo $password; ?>>
            </div>
            <div class="form-group">
                <label>Note:</label>
                <textarea class="form-control" rows="5" placeholder="Enter your note" name="note"><?php echo htmlspecialchars($note); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

</body>

</html>