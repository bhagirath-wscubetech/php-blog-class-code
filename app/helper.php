<?php
$baseUrl = "http://localhost/blog";
include "mail.php";
session_start();
function p($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// Function to get the client IP address
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function getResetToken()
{
    global $conn;
    $bytes = random_bytes(40);
    $token = bin2hex($bytes);
    $sel = "SELECT id FROM reset_password WHERE token = '$token'";
    $exe = mysqli_query($conn, $sel);
    $count = mysqli_num_rows($exe);
    if ($count == 1) {
        return getResetToken();
    } else {
        return $token;
    }
}
