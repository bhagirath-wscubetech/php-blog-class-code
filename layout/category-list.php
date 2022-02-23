<div class="list-group">
    <?php
    $selCat = "SELECT * FROM categories WHERE status = 1";
    $exeCat = mysqli_query($conn, $selCat);
    while ($catData = mysqli_fetch_assoc($exeCat)) :
    ?>
        <a href="blog.php?id=<?php echo $catData['id'] ?>" 
        class="list-group-item list-group-item-action <?php echo $id == $catData['id'] ? 'active' : '' ?>">
            <?php echo $catData['name'] ?>
        </a>
    <?php
    endwhile;
    ?>
</div>