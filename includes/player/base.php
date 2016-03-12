<?php
//    <script type="text/javascript" src="/assets/js/jplayer/lib/jquery.min.js"></script>
?>
<link href="/assets/js/jplayer/dist/skin/pink.flag/css/jplayer.pink.flag.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/assets/js/jplayer/dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/assets/js/jplayer/dist/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="/assets/js/jplayer/dist/add-on/jquery.jplayer.inspector.min.js"></script>
<script type="text/javascript">
//<![CDATA[

    $(document).ready(function(){

        var bbPlaylist = new jPlayerPlaylist({
            jPlayer: "#bbPlayer",
            cssSelectorAncestor: "#bbPlayerWrapper"
        }, bbMusicTracklist, {
            swfPath: "/assets/js/jplayer/dist/jplayer",
            supplied: "mp3",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            keyEnabled: true
        });

        buildCategoryTable();
        checkTrackHash();

        $('a').on('click', function() {
            if ($(this).attr('href').indexOf('#') > -1) {
                trackNo = $(this).attr('href').replace('#track=', '');
                trackToPlay = parseInt(trackNo) - 1;
                playTrack(trackToPlay);
            }
        });

        function checkTrackHash() {
            if (window.location.hash != '') {
                trackNo = window.location.hash.replace('#track=', '');
                trackToPlay = parseInt(trackNo) - 1;
                //bbPlaylist.autoPlay = true;
                playTrack(trackToPlay);
            }
        }

        function playTrack(trackNo) {
            bbPlaylist.option('autoPlay', true);
            bbPlaylist.select(trackToPlay);
            bbPlaylist.play();
        }

        function buildCategoryTable() {
            if (typeof bbMusicTracklist === 'undefined') {
                return false;
            }
            if ($('#bb-category-tracklist').length) {
                var tableHtml = '';
                var rowHtml = '';

                for (i=0; i<bbMusicTracklist.length; i++) {
                    rowHtml = '';
                    trackNo = i+1;
                    trackTitle = bbMusicTracklist[i]['title'];
                    trackTime = bbMusicTracklist[i]['duration'];
                    trackMp3 = bbMusicTracklist[i]['mp3'];
                    trackPlayLink = '<a href="#track=' + trackNo + '">Play</a>';
                    trackDownloadLink = '<a href="' + trackMp3 + '" target="_blank">Download</a>';
                    rowHtml  = '<tr>';
                    rowHtml += '<td>' + trackTitle + '</td>';
                    rowHtml += '<td style="text-align: center;">' + trackTime + '</td>';
                    rowHtml += '<td>' + trackPlayLink + '</td>';
                    rowHtml += '<td>' + trackDownloadLink + '</td>';
                    rowHtml += '</tr>';
                    tableHtml += rowHtml;
                    //console.log(bbMusicTracklist[i]);
                }
                $('#bb-category-tracklist').html(tableHtml);
            }
        }

    });

//]]>
</script>
