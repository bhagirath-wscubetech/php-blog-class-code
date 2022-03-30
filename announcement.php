<?php
$title = "Blogger - Annoucement";
include "app/database.php";
include "app/helper.php";
include "layout/header.php";

unset($_SESSION['name']);
?>
<!-- Header section -->
<!-- Featured Blogs -->
<section class="container my-4">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Announcement</li>
        </ol>
    </nav>
    <div class="row shadow p-3">
        <div class="accordion" id="accordionExample">
            <?php
            $sel = "SELECT * FROM announcements WHERE status = 1";
            $exe = mysqli_query($conn, $sel);
            $sr = 1;
            while ($data = mysqli_fetch_assoc($exe)) :
            ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <!-- collapse1 -->
                        <!-- collapse2 -->
                        <!-- collapse3 -->
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $sr ?>" aria-expanded="true" aria-controls="collapse<?php echo $sr ?>">
                            <?php echo $data['title'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $sr ?>" class="accordion-collapse collapse <?php echo $sr == 1 ? 'show' : '' ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo $data['description'] ?>
                        </div>
                    </div>
                </div>
            <?php
                $sr++;
            endwhile;
            ?>
        </div>
    </div>
</section>
<?php
include "layout/footer.php";
?>