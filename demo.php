<?php

include "app/database.php";
include "app/helper.php";
error_reporting(E_ALL);

for ($i = 11; $i <= 20; $i++) {
    $name = "Testing-$i";
    $qry = "INSERT INTO categories SET name = '$name'";
    $flag = mysqli_query($conn, $qry); // execute
}
