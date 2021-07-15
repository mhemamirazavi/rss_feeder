<?php
?>
<html>
    <head>
        <style>
        .news-link{
            border-style: solid;
            border-color: gray;
            border-width: 2px;
        }
        </style>
    </head>
    <body>

    </body>
</html>
<?php
    function get_content($URL){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $URL);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
    $rss_urls = [
    'https://www.mehrnews.com/rss' , 
    'https://www.farsnews.ir/rss'  ,
    'https://www.tasnimnews.com/fa/rss/feed/0/8/0/'  ,
    'https://www.irna.ir/rss' ,
    'https://www.tabnak.ir/fa/rss/1' ,
    'https://khabarfarsi.com/rss/top' ,
    'https://www.yjc.news/fa/rss/allnews' ,
    'https://www.isna.ir/rss' ,
    'https://www.khabaronline.ir/rss' ,
    'https://www.mashreghnews.ir/rss' ,
];
    foreach ($rss_urls as $rss_url) {
    $obj = simplexml_load_file($rss_url);
    $item = $obj->channel->item[0];
    $title = (string) $item->title;
    $link = (string) $item->link;
    // var_dump([$title, $link]);
    ?>
    <a target="_blank" href="<?php echo $link;?>" class="news-link">
   <?php echo $title;?>
    </a></br>
<?php
}
