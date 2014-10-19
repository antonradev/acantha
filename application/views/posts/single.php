<div class="post">
    <h2><?php echo $posts_item['title']; ?></h2>
    <div class="published-date">
        Published on: <?php echo date('l F jS, Y', strtotime($posts_item['published_date'])); ?>
    </div><!-- end div.published-date -->
    <div class="content">
        <div class="picture">
            <img src="img/uploads/<?php echo $posts_item['picture']; ?>" alt="">
        </div>
        <?php echo $posts_item['content']; ?>
    </div>


    <div class="comments">
        <h3>Comments for this product: <span>4</span></h3>
        <div class="post-comment">
            <form class="form-inline" method="post" action="<?php echo base_url() . 'posts/add_comment/' . $posts_item['id']; ?>">
                <div class="name">
                    <input type="text" name="author_name" class="form-control" placeholder="Your Name *">
                </div><!-- end div.name -->
                <div class="email">
                    <input type="text" name="author_email" class="form-control" placeholder="Your E-mail *">
                </div><!-- end div.name -->
                <div class="comment-body">
                    <textarea name="comment" class="form-control" placeholder="Your Comment *"></textarea>
                    <input type="hidden" name="post_id" value="<?php print $posts_item['id']; ?>">
                </div>
                <?php
                echo $cap['image'];
                echo '<br><input type="text" class="form-control" name="captcha" style="margin-top: 6px;" value="" placeholder="Enter the secure code *"><br>';
                ?>
                <br>
                <input type="submit" value="Post comment" class="btn btn-primary">
            </form>
        </div><!-- end div.post-comment -->

        <?php foreach ($comments as $comment): ?>

            <div class="comment">
                <div class="author">
                    <div class="text-left pull-left col-md-6" style="padding-left: 0;">
                        <?php
                        $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($comment['author_email']))) . "?d=" . urlencode("mm") . "&s=" . 40;
                        ?>
                        <img src="<?php echo $grav_url; ?>" width="40" height="40" alt="">
                        <span class="name">
                            <?php echo $comment['author_name']; ?>
                        </span><!-- end div.name -->
                    </div>
                    <div class="pull-right text-right col-md-4" style="padding-top: 12px; font-size: .9em; padding-right: 0;">
                        Posted: <?php echo $comment['posted_date']; ?>
                    </div>
                </div><!-- end div.author -->
                <div class="comment-body">
                    <?php echo $comment['comment']; ?>
                </div><!-- end div.comment-body -->
                <div class="comment-rating">
                    <span class="votes">
                        <?php echo $comment['rating_count']; ?>
                    </span>
                    <a href="<?php echo base_url() . 'posts/like_comment/' . $comment['id']; ?>" class="positive">+</a>
                    <a href="<?php echo base_url() . 'posts/dislike_comment/' . $comment['id']; ?>" class="negative">-</a>
                </div>
            </div><!-- end div.comment -->

        <?php endforeach ?>


    </div><!-- end div.comments -->


</div>
