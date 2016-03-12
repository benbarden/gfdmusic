<?php
date_default_timezone_set('Europe/London');
$showSocialIcons = false;

$includeGtm = false;
if (isset($_SERVER['HTTP_HOST'])) {
    if ($_SERVER['HTTP_HOST'] == 'www.gfdmusic.com') {
        $includeGtm = true;
    }
}
