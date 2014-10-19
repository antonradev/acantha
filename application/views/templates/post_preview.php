<div class="post">
    <h2><a href="posts/view/<?php echo $posts_item['slug'] ?>"><?php echo $posts_item['title']; ?></a></h2>
    <div class="published-date">
        Published on: <?php echo date('l F jS, Y', strtotime($posts_item['published_date'])); ?>
    </div><!-- end div.published-date -->
    <div class="excerpt">
        <div class="picture">
            <img src="img/uploads/<?php echo $posts_item['picture']; ?>" alt="">
        </div>
        <?php echo $posts_item['excerpt']; ?>
    </div><!-- end div.excerpt -->
</div>