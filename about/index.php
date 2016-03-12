<?php
    require '../includes/core/base.php';
    $pageTitle = 'About GFD Music';
    require '../includes/core/header.php';
?>

<!-- Page Content -->
<div class="container">

    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">About</li>
    </ul>

    <!-- Page Header -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">About GFD Music</h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-8">
            <p>GFD is a composer of instrumental music in a variety of styles. All tracks are written by
            Ben Barden (BB).</p>
            <p>GFD stands for Green Field Development - "greenfield" meaning a blank canvas for tech projects.
            This project is intended as a fresh start.</p>
            <p>Get in touch - <a href="mailto:hello@gfdmusic.com">send GFD an email</a>.</p>
        </div>
        <div class="col-md-2">
            <img src="/assets/img/logos/gfd-logo-360x173.png" alt="GFD Music">
        </div>
    </div>

<?php
    require '../includes/theme/copyright.php';
?>

</div>
<!-- /.container -->

<?php
    require '../includes/core/scripts.php';
    require '../includes/core/footer.php';
?>
