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
$db_qrcate = new db_query("SELECT * FROM (news JOIN category ON news.new_category_id = category.cat_id)JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_category_id = ".$catid."  AND cat_type = ".$webid." OR cat_parent_id = ".$catid." AND new_cate_id = ".$webid." AND cat_type = ".$webid." ORDER BY new_id DESC LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT count(1) FROM news JOIN category ON news.new_category_id = category.cat_id WHERE new_category_id = ".$catid." AND new_cate_id = ".$webid." OR cat_parent_id = ".$catid); 
$count = mysql_fetch_assoc($numrow->result);
$count = $count['count(1)'];
$urlcano = $domain."/c".$rows['cat_id']."/".replaceTitle($rows['cat_name']);
$urlamp = $domain."/amp-c".$rows['cat_id']."/".replaceTitle($rows['cat_name']);

if($page > 1)
{
   $trang = " - trang ".$page;
$urlamp = $domain."/amp-c".$rows['cat_id']."/".replaceTitle($rows['cat_name'])."?page=".$page;

}
else
{
   $trang = '';
}
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

		<header id="header" class="bg-header">
			<?php include('../includes/inc_header.php'); ?>
		</header>
			
      <div id="third_content" class="bg-third">
        <div class="container">
          <div class="title">
            <h2><img style="margin-right: 15.5px;" src="/images/tt-ic.svg" alt="<?=$rows['cat_name'];?>"><?=$rows['cat_name'];?></h2>
          </div>
          <div>
            <div class="big_box">
            <?
                    $i=0;
                    While($row = mysql_fetch_assoc($db_qrcate->result))
                    {
                      $i++;
                ?>
            <div class="data_box danh_muc_box box_ngang">
              <div class="ct-img">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                  <img class="card-img-top lazy" src="/images/loading.gif" data-src="/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title_seo']; ?>"></a>
              </div>
              <div class="ct-box">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><h3><?=$row['new_title_seo']; ?></h3></a>
                <p class="card-text"><?=strip_tags($row['new_teaser']) ?></p>
                <div>
                  <ul class="info_box">
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/account-ic.svg" alt="account-ic" class="info-ic lazy">
                      <span><?=$row['adm_name']; ?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/date.svg" alt="date" class="info-ic lazy">
                      <span><?= date("d-m-y",$row['new_date']) ?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/time-ic.svg" alt="time-ic" class="info-ic lazy">
                      <span><? echo view_doc_tb($row['new_description']) ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <?
            if($i==4) break;
              }
            ?>

          </div>
          <div class="big_box">
            <?
                    While($row = mysql_fetch_assoc($db_qrcate->result))
                    {
                      $i++;
                ?>
            <div class="data_box danh_muc_box box_doc">
              <div class="ct-img">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                  <img class="card-img-top lazy" src="/images/loading.gif" data-src="/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title_seo']; ?>"></a>
              </div>
              <div class="ct-box">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><h3><?=$row['new_title_seo']; ?></h3></a>
                <p class="card-text"><?=strip_tags($row['new_teaser']) ?></p>
                <div>
                  <ul class="info_box">
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/account-ic.svg" alt="account-ic" class="info-ic lazy">
                      <span><?=$row['adm_name']?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/date.svg" alt="date" class="info-ic lazy">
                      <span><?= date("d-m-y",$row['new_date']) ?>3/1/21</span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/time-ic.svg" alt="time-ic" class="info-ic lazy">
                      <span><? echo view_doc_tb($row['new_description']) ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <?
            if ($i==6) break;
              }
            ?>
          </div>
          </div>
          <div class="mdx-box">
            <?
                    While($row = mysql_fetch_assoc($db_qrcate->result))
                    {
                      $i++;
                ?>
            <div class="data_box the_cao">
              <div class="ct-img">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                  <img class="card-img-top lazy" src="/images/loading.gif" data-src="/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title_seo']; ?>"></a>
              </div>
              <div class="ct-box">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><h3><?=$row['new_title_seo']; ?></h3></a>
                <p class="card-text"><?=strip_tags($row['new_teaser']) ?></p>
                <div>
                  <ul class="info_box">
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/account-ic.svg" alt="account-ic" class="info-ic lazy">
                      <span><?=$row['adm_name']?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/date.svg" alt="date" class="info-ic lazy">
                      <span><?= date("d-m-y",$row['new_date']) ?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/time-ic.svg" alt="time-ic" class="info-ic lazy">
                      <span><? echo view_doc_tb($row['new_description']) ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <?
              if($i==10) break;
              }
            ?>
            
          </div>
          <div class="pagination" align="center">
              <div>
                <?
                    echo generatePageBar2('',$page,$curentPage,$count,list_cate_par($catid,$rows['cat_name']),'?','','jp-current','preview','<','next','Tiếp','first','Đầu','last','Cuối');
                    ?>
              </div>
            </div>
        </div>

      </div>



 
			<?php include('../includes/inc_footer.php'); ?>
