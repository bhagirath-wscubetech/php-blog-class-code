<?php
include "../app/database.php";
include "../app/helper.php";
error_reporting(E_ALL);
/* 
    case: 1: Status, 2: Delete
    id: (always)
    newStatus: (only for status)
*/
$case = $_GET['case'];
if ($case == 1) {
    // change status
    $id = $_GET['data_id'];
    $newStatus = $_GET['new_status'];
    if (isset($id) && isset($newStatus)) {
        try {
            $qry = "UPDATE categories SET status = $newStatus WHERE id = $id";
            $flag = mysqli_query($conn, $qry);
        } catch (\Exception $err) {
            $flag = false;
        }
        $response = [];
        if ($flag == true) {
            $response = [
                'error' =>  0,
                'msg' => "Status changed successfully"
            ];
        } else {
            $response = [
                'error' => 1,
                'msg' => "Unable to change the status"
            ];
        }
    } else {
        $response = [
            'error' =>  1,
            'msg' => "Incomplete data"
        ];
    }
} else {
    $response = [];
    // delete
    $id = $_GET['data_id'];
    $qry = "DELETE FROM categories WHERE id = $id";
    $flag = mysqli_query($conn, $qry);
    if ($flag == true) {
        $response = [
            'error' => 0,
            'msg' => "Data deleted successfully"
        ];
    } else {
        $response = [
            'error' => 1,
            'msg' => "Unable to delete the data. Internal server error"
        ];
    }
}

echo json_encode($response);
