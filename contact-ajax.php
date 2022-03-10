<?php

include "app/database.php";
include "app/helper.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    if ($name != "" && $email != "" && $message != "" && $subject != "") {
        // insert into database
        $ins = "INSERT INTO contact_us SET name = '$name', email = '$email' , subject = '$subject', message = '$message'";
        $flag = mysqli_query($conn, $ins);
        if ($flag) {
            // all okay
            $response['status'] = 1;
            $response['message'] = "Form submitted";
            http_response_code(200);
        } else {
            // error
            $response['status'] = 0;
            $response['message'] = "Internal server error";
            http_response_code(500);
        }
    } else {
        // throw error
        $response['status'] = 0;
        $response['message'] = "Please fill all the required data";
        http_response_code(400);
    }
} else {
    // throw error
    $response['status'] = 0;
    $response['message'] = "Only post method is allowed";
    http_response_code(405);
}

echo json_encode($response);
