<div class="col-md-3 sidebar">
    <h3 class="page-heading">Latest Posts</h3>
    <ul>
        <?php foreach ($sidebar_links as $sidebar_item): ?>
            <li>
                <?php
                echo '<a href="posts/view/' . $sidebar_item['slug'] . '">' . $sidebar_item['title'] . '</a>';
                ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>