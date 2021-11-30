<?php

$con = new mysqli('localhost', 'root', '', 'crudphp');

if (!$con) {
    die(mysqli_error($con));
};
