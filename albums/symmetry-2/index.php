<?php
    require '../../includes/core/base.php';
    $pageTitle = 'Symmetry 2 - Albums - GFD Music';
    require '../../includes/core/header.php';
?>

<!-- Page Content -->
<div class="container">

    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/albums/">Albums</a></li>
        <li class="active">Symmetry 2</li>
    </ul>

    <!-- Page Header -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Symmetry 2</h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <p>
                <em>Symmetry 2</em> is the second album by GFD. Many of the tracks have a companion with the equivalent
                track number on the sister album, <em>Symmetry 1</em>.
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
            <img src="/assets/img/albums/symmetry-2-cover-250px.png" alt="GFD Music - Symmetry 2">
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
<script src="/assets/js/albums/symmetry-2.js?v=2"></script>
<?php
    require '../../includes/core/footer.php';
?>

