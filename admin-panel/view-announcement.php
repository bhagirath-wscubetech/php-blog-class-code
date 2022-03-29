<?php
include "../app/database.php";
include "../app/helper.php";

// pagination 
$page = $_GET['page'] ?? 0; // null safe operator
$limit = 10;
$start = $page * $limit;
// ----------


$error = 0;
$msg = "";
$id = $_GET['id'];
$status = $_GET['status'];
if (isset($id)) {
    if (isset($status)) {
        // change status
        $qry = "UPDATE announcements SET status = $status WHERE id = $id";
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
        $qry = "DELETE FROM announcements WHERE id = $id";
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

if (isset($_POST['del-all'])) {
    $ids = $_POST['ids'];
    if (count($ids)) {
        /**
         *  convert array to string
         *  
         */
        $allId = implode(",", $ids);
        // multiple delete
        $qry = "DELETE FROM announcements WHERE id IN($allId)";
        // $qry = "UPDATE announcements SET trashed = 1 WHERE id IN($allId)";
        $flag = mysqli_query($conn, $qry);
        if ($flag == true) {
            $error = 0;
            $msg = "Data deleted successfully";
        } else {
            $error = 1;
            $msg = "Unable to delete the data. Internal server error";
        }
    }
} elseif (isset($_POST['toggle-all'])) {
    // multiple change status
    $ids = $_POST['ids'];
    if (count($ids)) {
        foreach ($ids as $id) {
            $annData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id,status FROM announcements WHERE id = $id"));
            if ($annData['status'] == 1) {
                // new status = 0
                $qry = "UPDATE announcements SET status = 0 WHERE id = $id";
                $flag = mysqli_query($conn, $qry);
            } else {
                // new status = 1
                $qry = "UPDATE announcements SET status = 1 WHERE id = $id";
                $flag = mysqli_query($conn, $qry);
            }
        }
        header("LOCATION:view-announcement.php");
    }
}
include "layouts/header.php";
?>
<div class="col-10" style="min-height: 100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <div class="h2">View Announcement</div>
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
            <form action="" method="post">
                <button class="btn btn-danger" type="submit" name="del-all">Trash Selected</button>
                <button class="btn btn-success" type="submit" name="toggle-all">Toggle Selected</button>
                <table class="table table-striped table-responsive">
                    <thead class="thead-default">
                        <tr>
                            <th>
                                <input type="checkbox" id="select-all" />
                            </th>
                            <th>Sr. No</th>
                            <th>Title</th>
                            <th width="50%">Description</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $sel = "SELECT * FROM announcements LIMIT $start,$limit";
                    echo $sel;
                    // start , offset
                    $exe = mysqli_query($conn, $sel);
                    ?>
                    <tbody>
                        <?php
                        $sr = 1;
                        while ($data = mysqli_fetch_assoc($exe)) :
                        ?>
                            <tr>
                                <td>
                                    <input class="check-id" type="checkbox" name="ids[]" value="<?php echo $data['id'] ?>">
                                </td>
                                <td align="center">
                                    <?php echo $sr; ?>
                                </td>
                                <td>
                                    <?php echo $data['title']; ?>
                                </td>
                                <td>
                                    <?php echo $data['description'] ?>
                                </td>
                                <td>
                                    <?php echo $data['created_at'] ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data['status'] == 1) :
                                    ?>
                                        <a href="view-announcement.php?id=<?php echo $data['id'] ?>&status=0">
                                            <button class="btn btn-primary" type="button">
                                                Active
                                            </button>
                                        </a>
                                    <?php
                                    else :
                                    ?>
                                        <a href="view-announcement.php?id=<?php echo $data['id'] ?>&status=1">
                                            <button class="btn btn-warning" type="button">
                                                Inactive
                                            </button>
                                        </a>
                                    <?php
                                    endif;
                                    ?>
                                </td>
                                <td>
                                    <a href="view-announcement.php?id=<?php echo $data['id'] ?>">
                                        <button class="btn" type="button">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                    <a href="add-announcement.php?id=<?php echo $data['id']; ?>">
                                        <button class="btn" type="button">
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
                <!-- 
                    Calculate the totol number of total rows in ann table.
                 -->
                <?php
                $selRows = "SELECT COUNT(*) as total_rows FROM announcements";
                $exeRow = mysqli_query($conn, $selRows);
                $fetchRows = mysqli_fetch_array($exeRow);
                $totalPages = ceil($fetchRows['total_rows'] / $limit);
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?php echo $page == 0 ? 'disabled' : '' ?>">
                            <a class="page-link" href="view-announcement.php?page=<?php echo $page - 1 ?>">
                                Previous
                            </a>
                        </li>
                        <?php
                        for ($i = 0; $i < $totalPages; $i++) :
                        ?>
                            <li class="page-item <?php echo $page == $i ? 'active text-white' : '' ?>">
                                <a class="page-link" href="view-announcement.php?page=<?php echo $i ?>">
                                    <?php echo $i + 1 ?>
                                </a>
                            </li>
                        <?php
                        endfor;
                        ?>
                        <li class="page-item <?php echo $page == ($totalPages - 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="view-announcement.php?page=<?php echo $page + 1 ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php";
?>
<script>
    $("#select-all").change(
        function() {
            var status = $(this).prop("checked")
            $(".check-id").prop("checked", status)
        }
    )
</script>