<? 
include("config.php");
if($_SERVER['REQUEST_URI'] == '/')
{
   redirect("/".replaceTitle($namecate));
}
$catid = getValue("catid","int",'GET',"");
$db_qrs = new db_query("SELECT * FROM category WHERE cat_id = ".$catid." AND cat_type = ".$webid." LIMIT 1");
$rows = mysql_fetch_assoc($db_qrs->result);
$page  = getValue('page','int','GET',1);
$page  = intval(@$page);
if($page == 0)
{
   $page = 1;
}
$curentPage = 10;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$db_qrcate = new db_query("SELECT * FROM news JOIN category ON news.new_category_id = category.cat_id WHERE new_category_id = ".$catid."  AND cat_type = ".$webid." OR cat_parent_id = ".$catid." AND new_cate_id = ".$webid." AND cat_type = ".$webid." ORDER BY new_id DESC LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT count(1) FROM news JOIN category ON news.new_category_id = category.cat_id WHERE new_category_id = ".$catid." AND new_cate_id = ".$webid." OR cat_parent_id = ".$catid); 
$count = mysql_fetch_assoc($numrow->result);
$count = $count['count(1)'];
$urlcano = $domain."/c".$rows['cat_id']."/".replaceTitle($rows['cat_name']);
if($page > 1)
{
   $trang = " - trang ".$page;
}
else
{
   $trang = '';
}

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
    <link rel="canonical" href="<?= $urlcano ?>" />

    <meta name="p:domain_verify" content=""/>
	    <link href="" rel="shortcut icon"/>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <title><?= $rows['cat_title'].$trang ?></title>
	    <meta name="description" content="<?= $rows['cat_teaser'].$trang ?>"/>
	    <meta name="robots" content="noodp"/>
	    <meta name="google-site-verification" content="8lHYKX9HglSeFBbP6RlKfNFVSSgCtbXGZwqiH3ihwus" />
	    <meta property="og:locale" content="vi_VN" />
	    <meta property="og:type" content="website" />
	    <meta property="og:title" content="<?= $rows['cat_title'].$trang ?>" />
	    <meta property="og:description" content="<?= $rows['cat_teaser'].$trang ?>" />
	    <meta property="og:site_name" content="muathecaonhanh.net" />
	    <meta name="twitter:card" content="summary" />
	    <meta name="twitter:description" content="<?= $rows['cat_teaser'].$trang ?>" />
		<meta name="twitter:title" content="<?= $rows['cat_title'].$trang ?>" />

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
            h1.title-h1-content{margin:15px 0 10px;font-size:29px;font-weight:400}
            /* text đầu bài viết */
            .text-p-content p{font-size:16px;text-align:justify;margin:0}.text-p-content p span{font-size:16px;text-align:justify}.text-p-content p a{color:#FD9F00;font-size:16px}.text-p-content ul{margin:0;padding:0;list-style:none;font-size:16px}
            /* nội dung */
            /* nội dung bài viết  */
            .item-content{margin:20px 14px;box-sizing:border-box;border-radius:4px;border:1px solid rgba(0,0,0,.125)}.img-item-content amp-img{width:100%;height:100%}.img-item-content amp-img img{object-fit:cover}.text-item-a{font-size:16px;color:#000;font-weight:400;overflow:hidden;height:90px;text-align:justify;display:block;padding:0 10px}h3.h3-item-content{}.img-item-content{padding:2px;box-sizing:border-box;border:solid 1px #c1c1c1;border-top-left-radius:3px;border-top-right-radius:3px}.item-content h4 a{background:#ffc107;display:block;padding:8px;font-size:18px;text-align:center;color:#000;border-radius:4px}
            .flex{clear:both;padding:20px 0}
            /* phân trang */
            .phan-trang{font-weight:700;font-size:14px;float:left;line-height:25px; clear: both;}.phan-trang .jp-current{background:#FD9F00;color:#fff;padding:5px 10px}.phan-trang a{color:#000;padding:5px 10px;margin:0 3px}
            /* title tin mới nhất, tin tức  */
            .title-item-tinmoi h3, .title-item-tintuc h3{text-transform:uppercase;font-size:18px;font-weight:400;background:#FD9F00;display:inline-block;color:#fff;padding:0 10px;line-height:34px;margin:0;text-align: center;}
            /* đường kẻ tin mới nhất, tin tức */
            .list-tinmoi, .list-tintuc{border: 1px solid #FD9F00;padding: 10px 10px 10px 25px;}
            /* tin mới nhất, tin tức  */
            .tintucmoinhat,.tintuc{margin-bottom:30px}ul.danh-sach-tin-moi,ul.danh-sach-tin-tuc{margin:0;padding:0;list-style:none}ul.danh-sach-tin-moi li,ul.danh-sach-tin-tuc li{padding:15px 0}.img-tinmoi,.img-tintuc{height:100%;width:100%;margin:auto;padding:1px;border:solid 1px #c1c1c1;box-sizing:border-box}.img-tinmoi amp-img,.img-tintuc amp-img{height:150px;width:100%}.img-tinmoi amp-img img,.img-tintuc amp-img img{object-fit:cover}.danh-sach-tin-moi li a,.danh-sach-tin-tuc li a{color:#2F326A;font-size:19px}.danh-sach-tin-moi li p,.danh-sach-tin-tuc li p{margin:0;color:#c4c5c9;font-size:14px;display:table}
            /* footer */
            footer{margin-top:20px; border-top: 2px solid #2F326A;}.sub-content-footer{border-bottom:2px solid #FD9F00;border-top:2px solid #FD9F00}ul.list-sub-footer{margin:0;padding:0;list-style:none;text-align:center}.list-sub-footer li{display:inline-flex}.list-sub-footer li a{text-decoration:none;padding:8px 13px}.list-sub-footer li a>span{color:#333;text-transform:capitalize;font-size:16px;font-weight:700}.dia-chi{padding:10px 15px;text-align:center}@media only screen and (min-width: 600px){.content-footer02{display:flex;justify-content:center}.dia-chi{margin-top:20px}}
            /* button scroll top */
            .btn-top{width:42px;height:42px;position:fixed;bottom:30px;right:10px;cursor:pointer;background-color:rgba(102,102,102,0.6);z-index:99999999;border:none;color:#fff}.btn-top:focus{outline:none}
            /* css cho màn 1024 */
            @media only screen and (min-width: 1024px){.flex{display:flex}.out-side{margin-right:20px;justify-content:space-around;width:84%}}@media only screen and (min-width: 992px){.item-content{float:left;width:22%;margin:20px 14px;box-sizing:border-box;border-radius:4px;border:1px solid rgba(0,0,0,.125)}.img-item-content amp-img{height:unset}}
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
                <!-- text h1 -->
                <div class="title-content">
                    <h1><?=$rows['cat_title'];?></h1>  
                </div>

                <!-- text đầu bài viết -->
                <div class="text-p-content">
                    <p>
                    <p><?=  str_replace("/pictures/images/","http://content.hunghapay.com/pictures/images/",$rows['cat_gt']) ?></p>
                    </p>
                </div>

                <div class="main-content">

                    <?
                    While($rowcate = mysql_fetch_assoc($db_qrcate->result))
                    {
                    ?>

                    <div class="item-content">
                        <div class="img-item-content">
                            <a class="a-item-content" href="<?= rewrite_news($rowcate['new_title_seo'],$rowcate['new_id']) ?>">
                                <amp-img layout="intrinsic" width="660" height="395" src="/pictures/news/<?=$rowcate['new_picture'] ?>" alt="<?= $rowcate['new_title_seo'] ?>" style="display: table; margin: auto;"></amp-img>
                            </a>
                        </div> 

                        <!-- <h3 class="h3-item-content" style="margin: 0px;"> -->
                        <a class="text-item-a" href="<?= rewrite_news($rowcate['new_title_seo'],$rowcate['new_id']) ?>" >
                            <?= $rowcate['new_title_seo'] ?>
                        </a>
                        <!-- </h3> -->
                        <h4 style="margin: 0px;"> 
                            <a href="<?= rewrite_news($rowcate['new_title_seo'],$rowcate['new_id']) ?>">
                                xem thêm...
                            </a>
                        </h4>
                    </div>
                    <? } ?>	

                    

                </div>

                <!-- phân trang -->
                <div class="phan-trang">
                    <span style="background:none;color:#000;">Xem trang</span>
                    <?
                    echo generatePageBar2('',$page,$curentPage,$count,list_cate_par($catid,$rows['cat_name']),'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
                    ?>
                </div>

              


                <!-- nội dung bài viết -->
                <div class="flex">
                    <div class="out-side">

                        <!-- tin mới nhất -->
                        <div class="tintucmoinhat">
                            <div class="title-item-tinmoi">
                                <h3> 
                                    Tin mới nhất
                                </h3>
                            </div>

                            <div class="list-tinmoi">
                                <ul class="danh-sach-tin-moi"> 
                                        <?
                                        $db_qr = new db_query("SELECT * FROM news WHERE new_cate_id = ".$webid." ORDER BY new_id DESC LIMIT 10");
                                        While($row = mysql_fetch_assoc($db_qr->result))
                                        {
                                        ?>
                                    <li>
                                        <div class="img-tinmoi">
                                            <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                                                <amp-img layout="intrinsic" style="display: table; margin: auto;" width="335" height="199" src="/pictures/news/<?=$row['new_picture'] ?>"></amp-img>
                                            </a>
                                        </div>

                                        <div class="flex-tin">
                                            <h4 style="margin: 0px; margin-bottom: 6px;">
                                                <a title="<?= $row['new_title'] ?>" href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><?= $row['new_title_seo'] ?> </a>
                                            </h4>

                                            <p>
                                                <i class="far fa-eye"></i><?= $row['new_view_count'] ?>
                                                    Lượt xem
                                            </p>
                                        </div>
                                    </li>   
                                        <?
                                        }        
                                        ?>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="content02">
                        <!-- tin tức -->
                        <div class="tintuc">
                            <div class="title-item-tintuc">
                                <h3> 
                                    Tin tức
                                </h3>
                            </div>

                            <div class="list-tintuc">
                                <ul class="danh-sach-tin-tuc"> 
                                        <?
                                        $db_qr = new db_query("SELECT * FROM news WHERE new_cate_id = ".$webid." ORDER BY new_view_count DESC LIMIT 10");
                                        While($row = mysql_fetch_assoc($db_qr->result))
                                        {
                                        ?>
                                    <li>
                                        <div class="img-tintuc">
                                            <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                                                <amp-img layout="intrinsic" style="display: table; margin: auto;" width="335" height="199" src="/pictures/news/<?=$row['new_picture'] ?>"></amp-img>
                                            </a>
                                        </div>

                                        <div class="flex-tin">
                                            <h4 style="margin: 0px; margin-bottom: 6px;">
                                                <a title="<?= $row['new_title'] ?>" href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><?= $row['new_title_seo'] ?> </a>
                                            </h4>

                                            <p>
                                                <i class="far fa-eye"></i><?= $row['new_view_count'] ?>
                                                    Lượt xem
                                            </p>
                                        </div>
                                    </li>   
                                        <?
                                        }        
                                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- dưới là div flex -->
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