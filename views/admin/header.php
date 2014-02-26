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

    <title><?= (isset($this->title)) ? $this->title : 'TPMC | Framework v.'.VERSION; ?></title>

    <link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/normal ize.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php echo URL; ?>public/js/vendor/custom.modernizr.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.menuFlip.js"></script>
    <script src="<?php echo URL; ?>public/js/custom.js"></script>
    <script src="<?php echo URL; ?>public/js/highcharts.js"></script>

    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
        }
    }
    ?>
</head>

<body class="home">
<nav class="top-bar">
    <ul class="title-area">
        <li class="name"><h1><a href="<?php echo URL; ?>"><img src=""
                                                               alt="Logo"></a></h1></li>
        <li class="toggle-topbar menu-icon"><a href><span></span></a></li>
    </ul>

    <section class="top-bar-section">
        <ul class="right">
            <li><a href="<?php echo URL; ?>admin" class="red">Dashboard</a></li>

            <li class="has-dropdown"><a href="<?php echo URL; ?>admin/profile" class="orange">Admin</a>
                <ul class="dropdown">
                    <li><a href="<?php echo URL; ?>admin/profile/" class="blue">My Profile</a></li>
                    <li><a href="<?php echo URL; ?>admin/administrators/" class="blue">Administrators</a></li>
                </ul>
            </li>
            <li class="has-dropdown"><a href="<?php echo URL; ?>admin/statistics" class="blue">Edit</a>
                <ul class="dropdown">
                    <li><a href="<?php echo URL; ?>admin/editUsers/" class="blue">Users</a></li>
                </ul>
            </li>
            <?php if (Session::get('loggedIn') == 'true'): ?>
                <li><a href="<?php echo URL; ?>admin/logout/" class="green">Logout</a></li>
            <?php else: ?>
                <li><a href="<?php echo URL; ?>admin/login/" class="green">Login</a></li>
            <?php endif; ?>

        </ul>
    </section>
</nav>

<div class="colors show-for-small hide-for-medium-up">
    <span class="yellow"></span>
    <span class="red"></span>
    <span class="blue"></span>
    <span class="orange"></span>
    <span class="green"></span>
</div>