<?php
    require '../../includes/core/base.php';
    $pageTitle = 'Revisited - GFD Music';
    require '../../includes/core/header.php';
?>

<!-- Page Content -->
<div class="container">

    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/albums/">Albums</a></li>
        <li class="active">Revisited</li>
    </ul>

    <!-- Page Header -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Revisited</h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <p>
                <em>Revisited</em> is a compilation of tracks written by Ben Barden betweeen 2005-2009. Some of the
                tracks will be remixed; others will be revived in their original format. Each track will be
                announced with an accompanying post on the
                <a href="https://gfdmusicblog.wordpress.com/" target="_blank">GFD Music Blog</a>.
            </p>
            <p>
                Once most of the tracks from this period have been covered, we'll revisit some of the tracks from
                <em>Symmetry 1</em> and <em>Symmetry 2</em>. Finally, it'll be onto the forthcoming album -
                <em>Voyage into Space</em>.
            </p>
            <table class="table-striped table-condensed" style="width: 100%;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th style="text-align: center;">Duration</th>
                    <th>Play</th>
                    <th>Download</th>
                </tr>
                </thead>
                <tbody id="bb-category-tracklist">
                <tr>
                    <td colspan="4"><em>loading table...</em></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            &nbsp;
        </div>
        <div class="col-md-4">
            <img src="/assets/img/albums/gfd-revisited-250px.jpg" alt="GFD Music - Revisited">
<?php
    require '../../includes/player/render.php';
?>
        </div>
    </div>

<?php
    require '../../includes/theme/copyright.php';
?>

</div>
<!-- /.container -->

<?php
    require '../../includes/core/scripts.php';
    require '../../includes/player/base.php';
?>
<script src="/assets/js/albums/revisited.js?v=7"></script>
<?php
    require '../../includes/core/footer.php';
?>

