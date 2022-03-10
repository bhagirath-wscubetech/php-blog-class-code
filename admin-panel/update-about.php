<?php
include "../app/database.php";
include "../app/helper.php";
$error = 0;
$msg = "";
$sel = "SELECT * FROM about_us";
$exe = mysqli_query($conn, $sel);
$data = mysqli_fetch_assoc($exe);
// 0 No error, 1: Some error
if (isset($_POST['save'])) {
    $imageName = $data['image'] ?? "";
    $image = $_FILES['image'];
    if ($image['name'] != "") {
        $oldName = $imageName;
        // is there any new image
        $tmpPath = $image['tmp_name'];
        $imageName = time() . rand(1000, 9999) . $image['name'];
        $path = "../images/about/";
        $destination = $path . $imageName;
        $flag = move_uploaded_file($tmpPath, $destination);
        if ($flag) {
            // new image uploaded, then delete the old one
            unlink("../images/about/$oldName");
        }
    }
    $dataDesc = $_POST['content'];
    if (!empty($dataDesc)) {
        try {

            $qry = "UPDATE about_us SET content = '$dataDesc', image = '$imageName'";
            $flag = mysqli_query($conn, $qry); // execute
            // try end here
        } catch (Exception $error) {
            // catch starts here
            $flag = false;
            // catch ends here
        }
        if ($flag == true) {
            // $error = 0;
            // $msg = "Data updated successfully";
            header("LOCATION:update-about.php");
        } else {
            $error = 1;
            $msg = "Internal server error";
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
<link rel="stylesheet" href="css/dropify.min.css" />

<div class="col-10" style="min-height: 100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <div class="h2">Update About Us</div>
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
            <form class="row g-3" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                    <label for="form-label">Image</label>
                    <input type="file" name="image" class="dropify" data-default-file="../images/about/<?php echo $data['image'] ?>" data-allowed-file-extensions="png jpg jpeg gif">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control" required cols="30" rows="10"><?php echo $data['content'] ?></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" name="save" type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php";
?>
<script src="js/dropify.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    $('.dropify').dropify();
</script>