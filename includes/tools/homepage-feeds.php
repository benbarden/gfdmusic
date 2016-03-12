<script type="text/javascript">

    function buildListItemHtml(values, elemId, limit) {
        counter = 0;
        $('#' + elemId).append('<ul>');
        $(values).each(function(i, feedItem) {
            itemTitle = feedItem.title;
            itemLink = feedItem.link;
            itemHtml = '<li><a href="' + itemLink + '">' + itemTitle + '</a></li>';
            $('#' + elemId + ' ul').append(itemHtml);
            counter++;
            if (counter >= limit) {
                return false;
            }
        });
    }

    function buildPhotoItemHtml(values, elemId, limit) {
        counter = 0;
        $(values).each(function(i, feedItem) {
            itemTitle = feedItem.title;
            itemLink = feedItem.link;
            imgSource = feedItem.mediaGroups[0].contents[0].thumbnails[0].url;
            itemHtml = '<div style="float: left; margin: 5px; width: 80px;"><a href="' + itemLink + '">' +
                '<img src="' + imgSource + '" alt="" style="border: 0;">' +
                '</a></div>';
            $('#' + elemId).append(itemHtml);
            counter++;
            if (counter >= limit) {
                return false;
            }
        });
    }

    function processFeed(feedLocation, elemId, limit, mode, uniq) {
        //var randomNum = Math.floor((Math.random() * 10000) + 1);
        var todaysDate = new Date();
        var dateValue = todaysDate.getFullYear() + "-" + todaysDate.getMonth() + "-" + todaysDate.getDate() + "-" + todaysDate.getUTCHours();
        var url = feedLocation + "?&t=" + dateValue + '-' + uniq; // + randomNum;
        $.ajax({
            type: "GET",
            url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=30&callback=?&q=' + url, //+ encodeURIComponent(url),
            dataType: 'json',
            error: function(){
            alert('Unable to load feed, Incorrect path or invalid feed');
        },
            success: function(xml){
            values = xml.responseData.feed.entries;
            if (values.length == 0) {
                $('#' + elemId).append('<p>No items found!</p>');
            } else {
                if (mode == 'list') {
                    buildListItemHtml(values, elemId, limit);
                } else if (mode == 'photo') {
                    buildPhotoItemHtml(values, elemId, limit);
                } else {
                    window.alert('Unknown mode: ' + mode);
                }
            }
        }
        });
    }

    $(document).ready(function() {
        processFeed('https://gfdmusicblog.wordpress.com/feed/', 'gfd-blog-post-wrapper', 5, 'list', 1);
        //processFeed('http://feeds.soundcloud.com/users/soundcloud:users:68698534/sounds.rss', 'bb-music-wrapper', 5, 'list', 3);
    });

</script>
