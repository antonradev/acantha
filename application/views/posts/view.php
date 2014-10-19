<div class="container">
    <div class="row">
        <?php
        $this->load->view('templates/elements/nav-top', $data);
        $this->load->view('templates/elements/breadcrumb', $data);
        ?>
    </div><!-- end div.row -->
</div><!-- end div.container -->

<div class="container">

    <div class="row">
        <div class="col-md-9">
            <div class="row">

                <div class="posts">
                    <?php
                    $this->load->view('posts/single', $data);
                    ?>
                </div>

            </div><!-- end div.row -->
        </div><!-- end div.col-md-9 -->
        <?php
        $this->load->view('templates/sidebar', $data);
        ?>
    </div><!-- end div.row -->

</div><!-- end div.container -->
