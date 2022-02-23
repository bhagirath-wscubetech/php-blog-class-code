<?php
include "../app/database.php";
include "../app/helper.php";
$error = 0;
$msg = "";
$id = $_GET['id'];
$status = $_GET['status'];
if (isset($id)) {
    if (isset($status)) {
        // change status
        $qry = "UPDATE categories SET status = $status WHERE id = $id";
        $flag = mysqli_query($conn, $qry);
        if ($flag == true) {
            $error = 0;
            $msg = "Status changed successfully";
        } else {
            $error = 1;
            $msg = "Unable to change the status. Internal server error";
        }
    } else {
        // delete data
        $qry = "DELETE FROM categories WHERE id = $id";
        $flag = mysqli_query($conn, $qry);
        if ($flag == true) {
            $error = 0;
            $msg = "Data deleted successfully";
        } else {
            $error = 1;
            $msg = "Unable to delete the data. Internal server error";
        }
    }
}
include "layouts/header.php";
?>
<div class="col-10" style="min-height: 100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <div class="h2">View category</div>
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
            <table class="table table-striped table-responsive">
                <thead class="thead-default">
                    <tr>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $sel = "SELECT * FROM categories";
                $exe = mysqli_query($conn, $sel);
                ?>
                <tbody>
                    <?php
                    $sr = 1;
                    while ($data = mysqli_fetch_assoc($exe)) :
                    ?>
                        <tr>
                            <td align="center">
                                <?php echo $sr; ?>
                            </td>
                            <td>
                                <?php echo $data['name']; ?>
                            </td>
                            <td>
                                <?php echo $data['created_at'] ?>
                            </td>
                            <td>
                                <?php
                                if ($data['status'] == 1) :
                                ?>
                                    <a href="view-category.php?id=<?php echo $data['id'] ?>&status=0">
                                        <button class="btn btn-primary">
                                            Active
                                        </button>
                                    </a>
                                <?php
                                else :
                                ?>
                                    <a href="view-category.php?id=<?php echo $data['id'] ?>&status=1">
                                        <button class="btn btn-warning">
                                            Inactive
                                        </button>
                                    </a>
                                <?php
                                endif;
                                ?>
                            </td>
                            <td>
                                <a href="view-category.php?id=<?php echo $data['id'] ?>">
                                    <button class="btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                                <a href="add-category.php?id=<?php echo $data['id']; ?>">
                                    <button class="btn">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $sr++;
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php";
?>