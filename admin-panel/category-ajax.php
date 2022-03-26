<?php
include "../app/database.php";
include "../app/helper.php";
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
        $qry = "UPDATE categories SET status = $newStatus WHERE id = $id";
        $flag = mysqli_query($conn, $qry);
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
    echo json_encode($response);
} else {
    // delete
}
