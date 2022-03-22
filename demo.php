<?php

include "app/database.php";
include "app/helper.php";

error_reporting(E_ALL);
$sel = "SELECT * FROM announcements";
$exe = mysqli_query($conn, $sel);

$i = 1;
while($data = mysqli_fetch_assoc($exe)){
    $newTitle = $data['title']."-".$i;
    $id = $data['id'];
    $upd = "UPDATE announcements set title = '$newTitle' where id = $id";
    mysqli_query($conn,$upd);
    $i++;
}