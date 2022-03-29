<?php
$title = "Blogger - Blogs";
include "app/database.php";
include "app/helper.php";
include "layout/header.php";
$id = $_GET['id'];
if (isset($id)) {
    // only blogs of that category
    $selectedCat = "SELECT * FROM categories WHERE status = 1 AND id = $id";
    $selectedExeCat = mysqli_query($conn, $selectedCat);
    $selectedCatData = mysqli_fetch_assoc($selectedExeCat);
    $selBlog = "SELECT * FROM blogs WHERE status = 1 AND category_id = $id ORDER BY id DESC";
} else {
    // get all blogs
    $selBlog = "SELECT * FROM blogs WHERE status = 1 ORDER BY id DESC";
}
$exeBlog = mysqli_query($conn, $selBlog);
?>
<!-- Blog section -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Categories</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php include "layout/category-list.php" ?>
    </div>
</div>
<section class="container my-4">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="blog.php">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $selectedCatData['name']; ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" style="width: 100%;">
                Categories
            </button>
        </div>
        <div class="col-lg-3 shadow py-3 rounded d-none d-lg-block">
            <div class="sticky-top" style="top: 80px;">
                <h3 class="text-center">Categories</h3>
                <?php include "layout/category-list.php" ?>
            </div>
        </div>
        <div class="col-lg-9">
            <?php
            if (mysqli_num_rows($exeBlog) > 0) :
            ?>
                <div class="row">
                    <?php
                    while ($blog = mysqli_fetch_array($exeBlog)) :
                    ?>
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <img src="images/blog/<?php echo $blog['image_name']; ?>" width="100%" height="200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $blog['title']; ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            <?php
            else :
            ?>
                <div class="row text-center">
                    <h4 class="col-12">No blogs found for <?php echo $selectedCatData['name']; ?></h4>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</section>
<!-- Blog section -->
<?php
include "layout/footer.php";
?>