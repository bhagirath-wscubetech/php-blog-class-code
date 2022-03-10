<?php
include "../app/database.php";
include "../app/helper.php";
$error = 0;
$msg = "";
$id = $_GET['id'];
if (isset($id)) {
    // fetch data for the id
    $sel = "SELECT * FROM blogs WHERE id = $id";
    $exe = mysqli_query($conn, $sel);
    $data = mysqli_fetch_assoc($exe);
}
// 0 No error, 1: Some error
if (isset($_POST['save'])) {
    $imageName = $data['image_name'] ?? "";
    $image = $_FILES['image'];
    if ($image['name'] != "") {
        $oldName = $imageName;
        // is there any new image
        $tmpPath = $image['tmp_name'];
        $imageName = time() . rand(1000, 9999) . $image['name'];
        $path = "../images/blog/";
        $destination = $path . $imageName;
        $flag = move_uploaded_file($tmpPath, $destination);
        if ($flag) {
            // new image uploaded, then delete the old one
            unlink("../images/blog/$oldName");
        }
    }
    $dataTitle = $_POST['title'];
    $dataDesc = $_POST['desc'];
    $dataCategory = $_POST['category'];
    if (!empty($dataTitle) && !empty($dataDesc)) {
        try {
            // try starts here
            if (isset($id)) {
                // update
                $qry = "UPDATE blogs SET title = '$dataTitle', 
                        description = '$dataDesc', 
                        image_name = '$imageName', 
                        category_id = $dataCategory 
                        WHERE id = $id";
            } else {
                // insert
                $qry = "INSERT INTO blogs SET title = '$dataTitle', description = '$dataDesc', image_name = '$imageName', category_id = $dataCategory";
            }
            $flag = mysqli_query($conn, $qry); // execute
            // try end here
        } catch (Exception $error) {
            // catch starts here
            $flag = false;
            // catch ends here
        }
        if ($flag == true) {
            // $error = 0;
            // $msg = "Data added successfully";
            header("LOCATION:view-blogs.php");
        } else {
            $error = 1;
            $msg = "Intcernal server error";
        }
    } else {
        // some error
        // else thrown error
        $error = 1;
        $msg = "Please fill all the data";
    }
}



$selCat = "SELECT * FROM categories WHERE status = 1";
$exeCat = mysqli_query($conn, $selCat);
include "layouts/header.php";
?>
<link rel="stylesheet" href="css/dropify.min.css" />

<div class="col-10" style="min-height: 100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <div class="h2"><?php echo isset($id) ? 'Update' : 'Add' ?> Blog</div>
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
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $data['title'] ?>" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Category</label>
                    <select name="category" id="" class="form-control">
                        <option value="">Select a category</option>
                        <?php
                        while ($catData = mysqli_fetch_assoc($exeCat)) :
                        ?>
                            <option value="<?php echo $catData['id'] ?>" <?php echo $catData['id'] == $data['category_id'] ? 'selected' : '' ?>>
                                <?php echo $catData['name']; ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="form-label">Image</label>
                    <input type="file" name="image" class="dropify" data-default-file="../images/blog/<?php echo $data['image_name'] ?>" data-allowed-file-extensions="png jpg jpeg gif">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea name="desc" class="form-control" required cols="30" rows="10"><?php echo $data['description'] ?></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" name="save" type="submit">
                        <?php echo isset($id) ? 'Update' : 'Add' ?>
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
    CKEDITOR.replace('desc');
    $('.dropify').dropify();
</script>