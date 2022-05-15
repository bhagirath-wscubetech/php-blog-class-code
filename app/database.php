<?php
// Connection
// error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "blog");


function setUserLog($userId)
{
    global $conn;
    $ip = get_client_ip();
    $ins = "INSERT INTO user_logs SET user_id = $userId, ip_address = '$ip'";
    mysqli_query($conn, $ins);
}
