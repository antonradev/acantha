<?php
echo doctype('html5');
?>
<html lang="en">
    <head>
        <base href="http://projects.dev/projects/acantha/">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $data['title']; ?></title>
        <?php
        echo meta($this->meta);
        ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/main.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/responsive.css">
    </head>
    <body>

