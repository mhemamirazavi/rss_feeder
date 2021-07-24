<html>

<head>
    <style>
        body {
            font-family: Vazir;
            direction: rtl;
        }

        .news-link {
            border-style: solid;
            border-color: lightgray;
            border-width: 0px 0px 1px 0px;
            text-decoration: none;
        }
        .news-link:hover {
            color: lightblue;
        }

        @font-face {
            font-family: Vazir;
            src: url('./fonts/Vazir.eot');
            src: url('./fonts/Vazir.eot?#iefix') format('embedded-opentype'),
                url('./fonts/Vazir.woff') format('woff'),
                url('./fonts/Vazir.ttf') format('truetype');
            font-weight: normal;
        }

        @font-face {
            font-family: Vazir;
            src: url('./fonts/Vazir-Bold.eot');
            src: url('./fonts/Vazir-Bold.eot?#iefix') format('embedded-opentype'),
                url('./fonts/Vazir-Bold.woff') format('woff'),
                url('./fonts/Vazir-Bold.ttf') format('truetype');
            font-weight: bold;
        }

        @font-face {
            font-family: Vazir;
            src: url('./fonts/Vazir-Light.eot');
            src: url('./fonts/Vazir-Light.eot?#iefix') format('embedded-opentype'),
                url('./fonts/Vazir-Light.woff') format('woff'),
                url('./fonts/Vazir-Light.ttf') format('truetype');
            font-weight: 300;
        }
    </style>
</head>

<body>
    <?php
function get_content($URL)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $URL);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
// index array
// associative array
$rss_urls = [
    'مهر' => 'https://www.mehrnews.com/rss',
    'فارس' => 'https://www.farsnews.ir/rss',
    'تسنیم' => 'https://www.tasnimnews.com/fa/rss/feed/0/8/0/',
    'ایرنا' => 'https://www.irna.ir/rss',
    'تابناک' => 'https://www.tabnak.ir/fa/rss/1',
    'خبرفارسی' => 'https://khabarfarsi.com/rss/top',
    // 'https://www.yjc.news/fa/rss/allnews',
    'ایسنا' => 'https://www.isna.ir/rss',
    'خبرآنلاین' => 'https://www.khabaronline.ir/rss',
    'مشرق' => 'https://www.mashreghnews.ir/rss',
];
// foreach ($array as $key => $value)
//{
//}
foreach ($rss_urls as $name => $rss_url) {
    $obj = simplexml_load_file($rss_url);
    $item = $obj->channel->item[0];
    $title = (string) $item->title;
    $link = (string) $item->link;
    // var_dump([$title, $link]);
    // $title (meghdar darad) == not false == true
    // $title == '0'
    if($title){
?>
    <a target="_blank" href="<?php echo $link; ?>" class="news-link">
    <?php echo $title; ?>
    </a> <span style="color: gray;"><?php echo $name;?></span></br>
<?php
    }
}
?>

</body>

</html>
