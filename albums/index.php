<?php
    require '../includes/core/base.php';
    $pageTitle = 'Albums - GFD Music';
    require '../includes/core/header.php';
?>

<!-- Page Content -->
<div class="container">

    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Music</li>
    </ul>

    <!-- Page Header -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Albums</h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">

            <table class="table-striped table-condensed" style="width: 100%;">
                <thead>
                <tr>
                    <th>Album</th>
                    <th>Released</th>
                    <th>Tracks</th>
                    <th>Duration</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="/albums/symmetry-1/">Symmetry 1</a></td>
                    <td>March 2016</td>
                    <td>11</td>
                    <td>49 minutes</td>
                </tr>
                <tr>
                    <td><a href="/albums/symmetry-2/">Symmetry 2</a></td>
                    <td>March 2016</td>
                    <td>11</td>
                    <td>54 minutes</td>
                </tr>
                <tr>
                    <td><a href="/albums/revisited/">Revisited</a> - <em>compilation</em></td>
                    <td>started September 2016</td>
                    <td>ongoing</td>
                    <td>ongoing</td>
                </tr>
                </tbody>
            </table>
<?php
    require '../includes/theme/licensing.php';
?>
        </div>
        <div class="col-md-6">
            <h2>Albums</h2>
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-4">
                    <a href="/albums/symmetry-1/">
                        <img src="/assets/img/albums/symmetry-1-cover-250px.png" alt="Symmetry 1" style="border: 0; height: 150px; width: 150px;">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/albums/symmetry-2/">
                        <img src="/assets/img/albums/symmetry-2-cover-250px.png" alt="Symmetry 2" style="border: 0; height: 150px; width: 150px;">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/albums/revisited/">
                        <img src="/assets/img/albums/gfd-revisited-250px.jpg" alt="Revisited" style="border: 0; height: 150px; width: 150px;">
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
    require '../includes/theme/copyright.php';
?>

</div>
<!-- /.container -->

<?php
    require '../includes/core/scripts.php';
//    require '../includes/player/base.php';
    require '../includes/core/footer.php';
?>

