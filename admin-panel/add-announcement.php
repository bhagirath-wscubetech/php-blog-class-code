<?php
include "../app/database.php";
include "../app/helper.php";
$error = 0;
$msg = "";
// 0 No error, 1: Some error
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    if (!empty($title) && !empty($desc)) {
        // all okay
        $qry = "INSERT INTO announcements SET title = '$title', description = '$desc'";
        $flag = mysqli_query($conn,$qry);
        if($flag == true){
            $error = 0;
            $msg = "Data added successfully";
        }else{
            // $errorList = mysqli_error_list($conn);
            // p($errorList);
            $error = 1;
            $msg = "Unable to add data, Internal server error";
        }
    } else {
        // some error
        $error = 1;
        $msg = "Please fill all the data";
    }
}

include "layouts/header.php";
?>
<div class="col-10" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <div class="h2">Add Announcement</div>
            </div>
        </div>
        <div class="row shadow p-3">
            <!-- Message section -->
            <?php
            if ($msg != "") :
            ?>
                <div class="alert <?php echo $error == 1 ? 'alert-warning' : 'alert-success' ?> alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong><?php echo $msg; ?></strong>
                </div>
            <?php
            endif
            ?>
            <!-- Message section -->
            <form class="row g-3" method="post">
                <div class="col-md-12">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea name="desc" class="form-control" required cols="30" rows="10"></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" name="save" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "layouts/footer.php";
?>