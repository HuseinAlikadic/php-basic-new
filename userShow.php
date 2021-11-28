<?php
include 'connect.php';

$id = $_GET['loginUserId'];
$sql = "Select * from `users` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$note = $row['note'];
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
        <h2>User Info</h2>
        <br>
        <form method="post">
            <div class="form-group">
                <label>Name:</label>
                <?php echo $name; ?>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <?php echo $email; ?>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <?php echo $password; ?><?php echo $password; ?>
            </div>
            <div class="form-group">
                <label>Note:</label>
                <?php echo htmlspecialchars($note); ?>
            </div>

            <a class="btn btn-primary" href='update.php?updateid=<?php echo $id ?>&loginUserId=<?php echo $id ?> ' class=" text-light">Edit</a>
        </form>
    </div>

</body>

</html>