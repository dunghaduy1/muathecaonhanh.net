<? 
include("config.php");
$newid = getValue("newid","int","GET",0);
$newid = (int)$newid;
if($newid == 0)
{
   redirect("/");
}

$db_qrs = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id  WHERE new_id = ".$newid." AND new_cate_id = ".$webid." LIMIT 1");
$rows = mysql_fetch_assoc($db_qrs->result);

$urlcano = $domain.rewrite_news($rows['new_title_seo'],$rows['new_id']);
$urlamp = $domain.rewrite_news("/amp-".$rows['new_title_seo'],$rows['new_id']);


// if ( $urlcano != "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']) {
//   header("HTTP/1.1 301 Moved Permanently"); 
//   header("Location: $urlcano");
//   exit();
// }
?>
<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="canonical" href="<?= $urlcano ?>" />
		<!-- link amp -->
		<link rel="amphtml" href="<?= $urlamp ?>">

	    <meta name="p:domain_verify" content=""/>
	    <link href="" rel="shortcut icon"/>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <title><?= $rows['new_title'] ?></title>
	    <meta name="description" content="<?= $rows['new_teaser_seo'] ?>"/>
	    <meta name="robots" content="noodp"/>
	    <meta name="google-site-verification" content="8lHYKX9HglSeFBbP6RlKfNFVSSgCtbXGZwqiH3ihwus" />
	    <meta property="og:locale" content="vi_VN" />
	    <meta property="og:type" content="article" />
	    <meta property="og:title" content="<?= $rows['new_title_seo'] ?>" />
	    <meta property="og:description" content="<?= $rows['new_teaser_seo'] ?>" />
	    <meta property="og:site_name" content="muathecaonhanh.net" />
	    <meta property="article:tag" content="<?= $rows['new_title_seo'] ?>,<?= remove_accent($rows['new_title_seo']) ?>" />
	    <meta property="article:section" content="<?= $rows['new_title_seo'] ?>" />
	    <meta property="og:image" content="<?= "http://content5.hunghapay.com/pictures/news/".$rows['new_picture'] ?>" />
	    <meta property="og:image:width" content="500" />
	    <meta property="og:image:height" content="347" />
	    <meta name="twitter:card" content="summary" />
	    <meta name="twitter:description" content="<?= $rows['new_teaser_seo'] ?>" />
	    <meta name="twitter:title" content="<?= $rows['new_title_seo'] ?>" />
		<meta name="twitter:image" content="<?= "http://content5.hunghapay.com/pictures/news/".$rows['new_picture'] ?>" />
	
		<style type="text/css">  .nd ul li{ list-style: disc; }  </style>
		<!-- link css -->
    <link rel="preload" href="style.css?v3=<?=$ver?>" as="style">
		<link rel="stylesheet" href="/css/style.css?v3=<?=$ver?>">
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-3J3F5Q1YS8"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3J3F5Q1YS8');
      </script>

	</head>
	<body>
	<?
		 ob_start();
		 if(is_numeric($newid))
		 $cookieName='article_'.$newid;
		 if(!isset($_COOKIE["$cookieName"]))
		 {
		 setcookie("$cookieName","1",time()+3600,"/");
		 $db_ex = new db_execute("UPDATE news SET new_view_count = new_view_count+1 WHERE new_id=".$newid." AND new_cate_id = ".$webid."");
		 }
		 unset($cookieName,$db_ex);
		 ob_end_flush();
	?>

		<header id="header" class="bg-header">
			<?php include('../includes/inc_header.php'); ?>
		</header>
            <!-- *********************** -->
            <!-- <div class="box-data">
            <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                           var js, fjs = d.getElementsByTagName(s)[0];
                           if (d.getElementById(id)) return;
                           js = d.createElement(s); js.id = id;
                           js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
                           fjs.parentNode.insertBefore(js, fjs);
                           }(document, 'script', 'facebook-jssdk'));
                        </script><script type="text/javascript">
                           (function() {
                           var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                           po.src = 'https://apis.google.com/js/plusone.js';
                           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                           })();
                        </script>
                        <div class="lop2 pull-right" style="margin-bottom: 15px;">
                           <table width="30%" border="0">
                              <tr>
                                 <td style="padding: 5px;">
                                    <fb:like send="true" data-share="false" layout="button_count" width="450" show_faces="true"></fb:like>
                                 </td>
                                 <td style="padding: 5px;">
                                    <div style="float: left;" class="fb-share-button" data-href="<?= $urlcano ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Chia sẻ</a></div>
                                 </td>
                                 <td style="position: relative; top: 6px;padding: 5px;">
                                    <div class="g-plusone" style="padding-left:20px;"></div>
                                 </td>
                           </table>
                        </div>
                        <fb:comments data-width="100%" data-numposts="8"></fb:comments>
                        <div class="clear"></div>
            </div>           -->
            <!-- *************************** -->
<!-- 					</div>
				</div>
			</div>
		</div> -->
<!-- --------------------------------------------- -->
	<div id="detail_content">
        <div class="container">
          <div style="" class="muc_luc">
              <div class="content-detail-article">
                <div class="index-detail-mb">
                    <? makeML($rows['new_description']) ?>
                </div>
            </div>
          </div>
          <div style="" class="bai_viet">
            <h1><?=$rows['new_title_seo'] ?></h1>
            <div class="tac_gia">
              <ul>
                <li><img class="mgr" src="/images/date.svg" alt="date-ic">Ngày đăng: <?= date('d-m-Y', $rows['new_date']) ?></li>
              </ul>
            </div>
            <p><?=$rows['new_teaser'] ?></p>
            <div align="center">
              <div style="" class="muc_luc_tb">
                <div class="index-detail-mb">
                    <? makeML($rows['new_description']) ?>
                </div>
              </div>     
            </div>
            <div class="content-detail-article">
                <? $search = ['style="font-family:arial,helvetica,sans-serif;"','style="font-size:14px;"', 'style="text-align: justify;"'];
                $subject = str_replace($search, '', $rows['new_description']);
                $gt = str_replace('src', 'class=" lazy " src="/images/loading.gif" data-src', $subject);
                        echo makeML_content($gt) ?>
            </div>
            
          </div>
          
          </div>
        </div>
      </div>
      <div class="s_tac_gia">
        <div class="container">
          <div class="s_tac_gia-item">
            <img src="/images/account-ic.svg" alt="tac_gia">
            <div><?=$rows['adm_name']; ?></div>
          </div>
          <div class="s_tac_gia-item">
           <!--  <a href=""> -->
              <span>
                CÙNG TÁC GIẢ
              </span>
            <!-- </a> -->
          </div>
        </div>
      </div>
      <?php include('../includes/inc_news_care.php'); ?>


		<?php include('../includes/inc_footer.php'); ?>
	</body>
  <script>

  </script>
</html>