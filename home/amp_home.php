<? 
include("config.php"); 
$db_qr = new db_query("SELECT * FROM categories_pro WHERE cat_id = ".$webid);
$row_td = mysql_fetch_assoc($db_qr->result);

$title = $row_td['cat_title'];
$des = "Website cung cấp đầy đủ các nội dung nhằm hỗ trợ và giải đáp nhanh chóng về việc mua thẻ cào. Truy cập muathecaonhanh.net để được hỗ trợ tốt nhất nhé.";
?>

<!DOCTYPE html>
<html amp lang="vi">
<head>
        <meta charset="UTF-8">
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
        <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>
        <script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="canonical" href="<?= $domain ?>" />

    <meta name="p:domain_verify" content=""/>
      <link href="" rel="shortcut icon"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title><?= $title ?></title>
      <meta name="description" content="<?= $des ?>"/>
      <meta name="robots" content="noodp,index,follow"/>
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?= $title ?>" />
      <meta property="og:description" content="<?= $des ?>" />
      <meta property="og:site_name" content="muathecaonhanh.net" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:description" content="<?= $title ?>" />
      <meta name="twitter:title" content="<?= $des ?>" />

      <!-- link font awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
     <!-- link font chữ -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
       <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

       <style amp-custom>
            body{font-family:'Open Sans',sans-serif;}body a {text-decoration: none;}
            /* header */
            .logo{padding:20px}.menu{background:#FD9F00;height:50px}.btn-menu{float:left;background:#FD9F00;border:1px solid #fff;margin-top:8px;margin-left:15px;margin-bottom:8px;border-radius:4px;padding:5px 15px;color:#fff}.btn-menu:focus{background:#fff;color:#FD9F00;outline:none}ul.sidebar1tl{margin:0;list-style:none;padding:0 20px;border-top:1px solid #fff}.sidebar1tl .m1{border-bottom:1px dashed #fff;line-height:1.4;padding:15px 0;display:flex;justify-content:space-between}.sidebar1tl .m1 a{text-decoration:none;color:#fff;text-transform:capitalize;font-size:16px}
            /* container */
            .container{width:100%}.main-container{margin:auto;width:92%}
            /* content */
            /* text h1 */
            .title-content h1{margin:15px 0 10px;font-size:30px;font-weight:bold; text-transform: uppercase;}
            /* nội dung */
            .sub-nd a {color:#cca307}
            .main-nd h3{margin:0;margin-bottom:8px}.main-nd h3 a{font-size:28px;color:#cca307}.tag-a-nd{display:block;text-align:center;color:#cca307}.sub-nd p{text-indent:2em;text-align:justify;line-height:1.5;margin-top:0}.sub-nd p span{font-size:16px;line-height:1.5}.nd h2{margin:0;margin-bottom:8px}.nd h2 span{font-size:20px}.nd h3 span{font-size:18px}blockquote{margin:0;padding:0;list-style:none;margin-bottom:16px}blockquote ul{margin:0;padding:0;list-style:none;padding-left:23px}blockquote ul li span,.nd ul li span{font-size:16px}.nd ul{margin:0;padding:0;list-style:none;margin-bottom:16px;padding-left:23px}.nd p amp-img{display:table;margin:auto}.nd p amp-img img{object-fit:cover}
            /* footer */
            footer{margin-top:20px; border-top: 2px solid #2F326A;}.sub-content-footer{border-bottom:2px solid #FD9F00;border-top:2px solid #FD9F00}ul.list-sub-footer{margin:0;padding:0;list-style:none;text-align:center}.list-sub-footer li{display:inline-flex}.list-sub-footer li a{text-decoration:none;padding:8px 13px}.list-sub-footer li a>span{color:#333;text-transform:capitalize;font-size:16px;font-weight:700}.dia-chi{padding:10px 15px;text-align:center}@media only screen and (min-width: 600px){.content-footer02{display:flex;justify-content:center}.dia-chi{margin-top:20px}}
            /* button scroll top */
            .btn-top{width:42px;height:42px;position:fixed;bottom:30px;right:10px;cursor:pointer;background-color:rgba(102,102,102,0.6);z-index:99999999;border:none;color:#fff}.btn-top:focus{outline:none}
            @media only screen and (max-width: 992px){.banner{position:fixed}}@media only screen and (min-width: 992px){.flex{display:flex}.out{padding:0 15px}.banner{width:140%;margin-top:15px;padding:0 15px;background:#fd9f0052;position:relative}.banner amp-img{position:fixed}.img-banner{width:130px;height:395px;padding:2px;border:solid 1px #c1c1c1;position:fixed}}

            
       </style>
</head>
<body>  
    <!-- start header -->
    <header id="top">
        <div class="container-header">
            <!-- logo -->
            <div class="logo">  
                <!-- <div class="img-logo"> -->
                    <a href="/" title="Trang chủ">
                        <amp-img layout="intrinsic" width="392" height="98" src="/images/logo.jpg" style="display: table; margin: auto;" alt="Image"></amp-img>
                    </a>
                <!-- </div> -->
            </div>

            <!-- ẩn hiện button scroll top -->
            <amp-position-observer on="enter:hideAnim.start; exit:showAnim.start" layout="nodisplay">
            </amp-position-observer>
        </div>

         <!-- menu --> 
         <div class="menu">
                <button on="tap:sidebar1.open" id="shownewx" class="btn-menu">             
                    <i class="fas fa-bars" style="font-size: 20px;"></i>
                </button>
                
            </div>
    </header>
    <!-- end header -->
 
    <!-- start container --> 
    <div class="container">
        <div class="main-container">
            <div class="content">


            <div class="flex">
                <div class="out">
                    <!-- text h1 -->
                    <div class="title-content">
                        <h1>tin mới trong ngày</h1>  
                    </div>

                    

                    <div class="main-content">
                        <? 
                        $db_qr = new db_query("SELECT * FROM category JOIN news ON category.cat_id = news.new_category_id  WHERE cat_parent_id = 0  AND new_cate_id = $webid AND new_pin = 1 ORDER BY new_id DESC LIMIT 0,9");

                        $numrow = new db_query("SELECT count(1) FROM category JOIN news ON category.cat_id = news.new_category_id  WHERE cat_parent_id = 0  AND new_cate_id = $webid AND new_pin = 1 "); 
                        $count = mysql_fetch_assoc($numrow->result);
                        $count = $count['count(1)'];

                            While($row = mysql_fetch_assoc($db_qr->result))
                            {

                        ?>  
                        
                        <div class="main-nd">
                            <h3>
                                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><?=$row['new_title_seo']; ?></a>
                            </h3>
                            <div class="sub-nd">
                                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>" class="tag-a-nd">
                                    <amp-img layout="intrinsic" src="/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title_seo']; ?>" height="456" width="684"></amp-img>
                                </a>
                                <p class="text-nd">
                                    <?= amp_content($row['new_teaser']); ?>
                                </p>
                                <div class="nd">
                                    <?= amp_content($row['new_description']); ?>
                                </div>
                            </div>
                        </div>

                        <? } ?>

                    </div>
                </div>

                <div class="banner">
                <div class="img-banner">

                        <a href="">

                            <amp-img layout="intrinsic" width="130" height="395" src="/images/banner-qc-timviec2.gif"></amp-img>
                            
                        </a>
                    </div>


                </div>
            </div>

            </div>
        </div>
    </div>
    <!-- end container -->

    <!-- start footer -->
    <footer>
        <div class="container-footer">

            <div class="content-footer02">
                <div class="logo">  
                    <div class="img-logo">
                        <a href="/">
                            <amp-img layout="intrinsic" width="392" height="98" src="/images/logo.jpg" style="display: table; margin: auto;" alt="logo"></amp-img>
                        </a>
                    </div>
                </div>

                <div class="dia-chi">
                    <!-- <div> -->
                    <p class="text-center">Email: muathecaonhanh.net@gmail.com</p>
                    <p class="text-center">SĐT: 0982600485</p>
                    <p class="text-center">Đ/c: 43 Chùa Hà, Định Trung, Vĩnh Yên, Vĩnh Phúc, Việt Nam</p>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </footer> 
    <!-- end footer -->

    <!-- button scroll top -->
    <button id="scrollToTopButton" on="tap:top.scrollTo(duration=200)" class="btn-top">
        <i class="fa fa-chevron-up fa-2x"></i>
    </button>

    <amp-animation id="showAnim" layout="nodisplay">
        <script type="application/json">
            {
            "duration": "200ms",
            "fill": "both",
            "iterations": "1",
            "direction": "alternate",
            "animations": [
                {
                "selector": "#scrollToTopButton",
                "keyframes": [
                    { "opacity": "1", "visibility": "visible" }
                ]
                }
            ]
            }
        </script>
    </amp-animation>

    <amp-animation id="hideAnim" layout="nodisplay">
        <script type="application/json">
            {
            "duration": "200ms",
            "fill": "both",
            "iterations": "1",
            "direction": "alternate",
            "animations": [
                {
                "selector": "#scrollToTopButton",
                "keyframes": [
                    { "opacity": "0", "visibility": "hidden" }
                ]
                }
            ]
        }
        </script>
    </amp-animation>
    
</body>
<amp-sidebar id="sidebar1" layout="nodisplay" style="width: 220px; background: #FD9F00; border: 1px solid #ccc;" side="right" class="sample-sidebar">
    <button on="tap:sidebar1.close" class="btn-out-menu">
        <i class="fas fa-times"></i>
    </button>
    <nav>
        <ul class="sidebar1tl">
            <li class="m1"><a href="/">Trang Chủ</a></li>
            <?
            $db_qr = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0  AND cat_type = ".$webid."");
            While($row = mysql_fetch_assoc($db_qr->result))
            {
            ?>
            <li class="m1">   
                <a href="<?= list_cate_par($row['cat_id'],$row['cat_name']) ?>">
                    <?= $row['cat_name'] ?>
                </a>
                <a on="tap:menuBar.open">
                    <i class="fas fa-plus" style="color: #fff;"></i>
                </a>
                
            </li>
            <? 
            } 
            unset($db_qr,$row);
            ?>
            <li class="m1"><a href="/home/lien-he">Liên Hệ</a></li>
        </ul>
    </nav>
</amp-sidebar>
<!-- đừng quên analytics -->
<amp-analytics type="googleanalytics">
    <script type="application/json">    
    {
    "vars": {
        "account": "G-3J3F5Q1YS8"
    },
    "triggers": {
        "trackPageview": {
        "on": "visible", 
        "request": "pageview"
        }
    }
    }
    </script>
   
</amp-analytics>
</html>