<?php
    require '../../includes/core/base.php';
    $pageTitle = 'Symmetry 1 - Albums - GFD Music';
    require '../../includes/core/header.php';
?>

<!-- Page Content -->
<div class="container">

    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/albums/">Albums</a></li>
        <li class="active">Symmetry 1</li>
    </ul>

    <!-- Page Header -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Symmetry 1</h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <p>
                <em>Symmetry 1</em> is the first album by GFD. Many of the tracks have a follow-up with the equivalent
                track number on the sister album, <em>Symmetry 2</em>.
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
            <img src="/assets/img/albums/symmetry-1-cover-250px.png" alt="GFD Music - Symmetry 1">
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
<script src="/assets/js/albums/symmetry-1.js"></script>
<?php
    require '../../includes/core/footer.php';
?>

