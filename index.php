<?php
    require 'includes/core/base.php';
    $pageTitle = 'GFD Music';
    require 'includes/core/header.php';
?>

<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">GFD Music</h1>
        </div>
        <div class="col-md-4" style="margin: 40px 0 0 0;">
            Follow:
            <a href="https://twitter.com/gfdmusic" target="_blank">
                <img src="/assets/img/social/twitter.png" alt="Twitter" title="Twitter" style="width: 36px; height: 36px; border: 0;"></a>
            <a href="mailto:hello@gfdmusic.com" target="_blank">
                <img src="/assets/img/social/telegram.png" alt="Email" title="Email" style="width: 36px; height: 36px; border: 0;"></a>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <div class="col-md-4 portfolio-item">
            <a href="albums/">
                <img src="assets/img/site/homepage-album-covers.png" alt="GFD Music - album covers">
            </a>
            <h2>Albums</h2>
            <ul>
                <li><a href="albums/symmetry-1/">Symmetry 1</a></li>
                <li><a href="albums/symmetry-2/">Symmetry 2</a></li>
            </ul>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="https://gfdmusicblog.wordpress.com/" target="_blank">
                <img src="assets/img/site/homepage-logic-pro-x-crystal-beach.png" alt="GFD Music - Logic Pro X">
            </a>
            <h2>Blog</h2>
            <div id="gfd-blog-post-wrapper">

            </div>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="about/">
                <img src="assets/img/logos/gfd-logo-360x173.png" alt="GFD Music">
            </a>
            <h2>About</h2>
            <p>GFD is a composer of instrumental music in a variety of styles.
                <a href="about/">Read more</a>.</p>
        </div>
    </div>
    <!-- /.row -->

<?php
    $showSocialIcons = true;
    require 'includes/theme/copyright.php';
?>

</div>
<!-- /.container -->

<?php
    require 'includes/core/scripts.php';
    require 'includes/tools/homepage-feeds.php';
    require 'includes/core/footer.php';
?>
