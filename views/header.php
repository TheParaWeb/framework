<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="<?php echo URL; ?>public/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo URL; ?>public/favicon.ico" type="image/x-icon">

    <title><?= (isset($this->title)) ? $this->title : 'TPMC | Framework v.1.0'; ?></title>

    <link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php echo URL; ?>public/js/vendor/custom.modernizr.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.menuFlip.js"></script>
    <script src="<?php echo URL; ?>public/js/custom.js"></script>
    <script src="<?php echo URL; ?>public/js/fb.js"></script>

    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
        }
    }
    ?>
</head>

<body>