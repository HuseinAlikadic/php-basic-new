<?php
include 'connect.php';
$loginUserId = $_GET['loginUserId'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>CRUD operation</title>
</head>

<body>
    <div class="container">

        <a class="btn btn-primary my-5" href="register.php" class="text-light">Add user</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Is Admin</th>
                    <th>Note</th>
                    <th>Operations </th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from `users`";
                $result = mysqli_query($con, $sql);

                if ($result) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $note = $row['note'];
                        $is_admin = $row['is_admin'];
                        $deleteButton = '';
                        if ($is_admin == 0) {
                            $is_admin = 'No';
                            $deleteButton = '<a class="btn btn-sm btn-danger" href="delete.php?deleteid=' . $id . '&loginUserId=' . $loginUserId . '" class="text-light">Delete</a>';
                        } else {
                            $is_admin = 'Yes';
                        }
                        echo '<tr>
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $email . '</td>
                    <td>' . $password . '</td>
                     <td>' . $is_admin . '</td>
                    <td>' . $note . '</td>
                     <td> <a class="btn btn-sm btn-primary" href="update.php?updateid=' . $id . '&loginUserId=' . $loginUserId . '" class="text-light">Update</a> </td>
                     <td> ' . $deleteButton . '  </td>
                    </tr>';
                    }
                }
                ?>


            </tbody>
        </table>
    </div>
</body>

</html>