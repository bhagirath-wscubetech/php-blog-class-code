<?php
include "app/database.php";
include "app/helper.php";
include "layout/header.php";
$selBlog = "SELECT * FROM blogs WHERE status = 1 AND featured = 1 ORDER BY id DESC";
$exeBlog = mysqli_query($conn, $selBlog);
?>
<!-- Slider section -->
<section class="container-fluid p-0">
    <div id="mySlider" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mySlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#mySlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#mySlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#mySlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/1600/500?random=1" class="d-block w-100" alt="" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/1600/500?random=2" class="d-block w-100" alt="" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/1600/500?random=3" class="d-block w-100" alt="" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/1600/500?random=4" class="d-block w-100" alt="" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Fourth slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mySlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mySlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Slider section -->
<!-- Featured Blogs -->
<section class="container">
    <div class="row text-center mt-4">
        <h2 class="col-12">
            Our Featured Blogs
        </h2>
    </div>
    <div class="row my-3">
        <?php
        while ($blogData = mysqli_fetch_assoc($exeBlog)) :
        ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/blog/<?php echo $blogData['image_name'] ?>" height="200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $blogData['title'] ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
</section>
<!-- Featured Blogs -->
<!-- Our team section -->
<section class="container">
    <!-- Set up your HTML -->
    <div class="row text-center my-4">
        <h2 class="col-12">
            Our Team
        </h2>
    </div>
    <div class="owl-carousel">
        <div class="card">
            <img src="https://picsum.photos/300/150?random=7" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Person 1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="https://picsum.photos/300/150?random=6" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Person 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="https://picsum.photos/300/150?random=10" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Person 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="https://picsum.photos/300/150?random=8" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Person 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="https://picsum.photos/300/150?random=9" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Person 4</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</section>
<!-- Our team section -->
<?php
include "layout/footer.php";
?>