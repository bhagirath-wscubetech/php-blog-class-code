<?php
include "../app/database.php";
include "../app/helper.php";
$error = 0;
$msg = "";
$id = $_GET['id'];
// 0 No error, 1: Some error
if (isset($_POST['save'])) {
    $dataname = $_POST['name'];
    if (!empty($dataname)) {
        try {
            // try starts here
            if (isset($id)) {
                // update
                $qry = "UPDATE categories SET name = '$dataname' WHERE id = $id";
            } else {
                // insert
                $qry = "INSERT INTO categories SET name = '$dataname'";
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
            header("LOCATION:view-category.php");
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

if (isset($id)) {
    // fetch data for the id
    $sel = "SELECT * FROM categories WHERE id = $id";
    $exe = mysqli_query($conn, $sel);
    $data = mysqli_fetch_assoc($exe);
}
include "layouts/header.php";
?>
<div class="col-10" style="min-height: 100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <div class="h2"><?php echo isset($id) ? 'Update' : 'Add' ?> Category</div>
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
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>" required>
                    <div class="valid-feedback">
                        Name
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