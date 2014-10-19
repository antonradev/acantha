<?php foreach ($posts as $posts_item): ?>
    <?php
    $this->load->view('templates/post_preview', array('posts_item' => $posts_item));
    ?>

<?php endforeach ?>
