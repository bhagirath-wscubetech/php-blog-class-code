<?php
include "../app/database.php";
include "../app/helper.php";
$error = 0;
$msg = "";
// 0 No error, 1: Some error
if (isset($_POST['save'])) {
    $dataTitle = $_POST['title'];
    $dataDesc = $_POST['desc'];
    if (!empty($dataTitle) && !empty($dataDesc)) {
        // all okay
        // if data is not empty then execute insert query
        /**
         * INSERT INTO <table_name> SET <col1_name> = <data1>, <col2_name> = <data2>, ..... . <coln_name> = <datan>;
         */
        $qry = "INSERT INTO announcements SET title = '$dataTitle', description = '$dataDesc'";
        $flag = mysqli_query($conn, $qry); // execute
        if ($flag == true) {
            $error = 0;
            $msg = "Data added successfully";
        } else {
            $error = 1;
            $msg = "Unable to add data, Internal server error";
        }
    } else {
        // some error
        // else thrown error
        $error = 1;
        $msg = "Please fill all the data";
    }
}

include "layouts/header.php";
?>
<div class="col-10" style="min-height: 100vh;">
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
                // if message is not empty then print the section
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