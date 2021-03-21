<?
include "config.php";
$db_qr  = new db_query("SELECT * FROM categories_pro WHERE cat_id = " . $webid);
$row_td = mysql_fetch_assoc($db_qr->result);

$title = $row_td['cat_title']." - muathecaonhanh.net";
$des   = "Website cung cấp đầy đủ các nội dung nhằm hỗ trợ và giải đáp nhanh chóng về việc mua thẻ cào. Truy cập muathecaonhanh.net để được hỗ trợ tốt nhất nhé.";
$isHome = true;
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include '../includes/inc_head.php';?>

    <link rel="canonical" href="<?=$domain?>" />
    <!-- link amp -->
    <link rel="amphtml" href="<?=$domain . '/amp'?>">

  </head>
  <body>
    <header id="header" class="bg-header">
      <?php include '../includes/inc_header.php';?>


    </header>
    <!-- /header -->

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
                                    <div style="float: left;" class="fb-share-button" data-href="<?=$urlcano?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Chia sẻ</a></div>
                                 </td>
                                 <td style="position: relative; top: 6px;padding: 5px;">
                                    <div class="g-plusone" style="padding-left:20px;"></div>
                                 </td>
                           </table>
                        </div>
                        <fb:comments data-width="100%" data-numposts="8"></fb:comments>
                        <div class="clear"></div>
            </div>
             *************************** -->

<!-- ______________________________ -->


    <article id="main_content">
      <div id="first_content" class="bg-first">
        <?php include '../includes/inc_main_content.php';?>
        
      </div>

      <div id="third_content" class="bg-third">
        <div class="container">
          <div class="title">
            <h2><img class="mgr lazy" src="/images/loading.gif" data-src="images/vl-ic.svg" alt="viec-lam-ic">Việc làm</h2>
            <a href="c273/tim-viec-lam-nhanh"><span class="btn">Xem tất cả</span></a>
          </div>
          <div>
            <div class="big_box">

               <?
                  $db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id  WHERE new_cate_id = ".$webid." and new_category_id = 273 ORDER BY new_id DESC LIMIT 6");
                    $i=0;
                    While($row = mysql_fetch_assoc($db_qr->result))
                    {
                      $i++;
                ?>
            <div class="data_box viec_lam_box box_ngang">
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
                      <img data-src="/images/account-ic.svg" src="/images/loading.gif" alt="account-ic" class="info-ic lazy">
                      <span><?=$row['adm_name']; ?></span>
                    </li>
                    <li class="info_box_item">
                      <img data-src="/images/date.svg" alt="date-ic" src="/images/loading.gif" class="info-ic lazy" >
                      <span> <?= date('d-m-Y', $row['new_date']) ?></span>
                    </li>
                    <li class="info_box_item">
                      <img data-src="/images/time-ic.svg" src="/images/loading.gif" alt="time-ic" class="info-ic lazy">
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
                    While($row = mysql_fetch_assoc($db_qr->result))
                    {
                ?>
            <div class="data_box viec_lam_box box_doc">
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
                      <img data-src="/images/account-ic.svg" src="/images/loading.gif" alt="account-ic" class="info-ic lazy" >
                      <span><?=$row['adm_name']; ?></span>
                    </li>
                    <li class="info_box_item">
                      <img data-src="/images/date.svg" src="/images/loading.gif" alt="date-ic" class="info-ic lazy" >
                      <span> <?= date('d-m-Y', $row['new_date']) ?></span>
                    </li>
                    <li class="info_box_item">
                      <img data-src="/images/time-ic.svg" src="/images/loading.gif" alt="time-ic" class="info-ic lazy" >
                      <span><? echo view_doc_tb($row['new_description']) ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <?
              }
            ?>
          </div>
          </div>

        </div>
      </div>

      <div id="fourth_content" style="position: relative;" class="bg-fourth">
        <div class="md_bg"></div>
        <div class="container">
          <div class="title">
            <h2><img class="mgr lazy" src="/images/loading.gif" data-src="images/card-ic.svg" alt="mua-the-cao-ic">Mua thẻ cào</h2>
            <a href="/c208/mua-the-cao"><span class="btn">Xem tất cả</span></a>
          </div>
        </div>
        <div class="card_box">
        
          <div class="container">
            <div class="md-box">
              <div class="big_box">
                 <?
                  $db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id  WHERE new_cate_id =".$webid." and new_category_id=208 ORDER BY new_id DESC LIMIT 7");
                    $i=0;
                    While($row = mysql_fetch_assoc($db_qr->result))
                    {
                      $i++;
                ?>
                <div class="data_box viec_lam_box box_doc">
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
                            <img data-src="/images/account-ic.svg" src="/images/loading.gif" alt="account-ic" class="info-ic lazy" >
                            <span><?=$row['adm_name']; ?></span>
                          </li>
                          <li class="info_box_item">
                            <img data-src="/images/date.svg" src="/images/loading.gif" alt="date" class="info-ic lazy" >
                            <span> <?= date('d-m-Y', $row['new_date']) ?></span>
                          </li>
                          <li class="info_box_item">
                            <img data-src="/images/time-ic.svg" src="/images/loading.gif" alt="time-ic" class="info-ic lazy" >
                            <span><? echo view_doc_tb($row['new_description']) ?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?
                if($i==1) break;
                  }
                ?>
              </div>
              <div class="big_box">
                <?
                    While($row = mysql_fetch_assoc($db_qr->result))
                    {
                      $i++;
                ?>
                <div class="data_box viec_lam_box box_ngang">
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
                            <img data-src="/images/account-ic.svg" src="/images/loading.gif" alt="account-ic" class="info-ic lazy" >
                            <span><?=$row['adm_name']; ?></span>
                          </li>
                          <li class="info_box_item">
                            <img data-src="/images/date.svg" src="/images/loading.gif" alt="date" class="info-ic lazy" >
                            <span> <?= date('d-m-Y', $row['new_date']) ?></span>
                          </li>
                          <li class="info_box_item">
                            <img data-src="/images/time-ic.svg" src="/images/loading.gif" alt="time-ic lazy" class="info-ic lazy" >
                            <span><? echo view_doc_tb($row['new_description']) ?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?
                if($i==3) break;
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="mdx-box">
                <?
                    While($row = mysql_fetch_assoc($db_qr->result))
                    {
                      $i++;
                ?>
                <div class="data_box the_cao">
                    <div class="ct-img">
                      <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                        <img  class="card-img-top lazy" src="/images/loading.gif" data-src="/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title_seo']; ?>"></a>
                    </div>
                    <div class="ct-box">
                      <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><h3><?=$row['new_title_seo']; ?></h3></a>
                      <p class="card-text"><?=strip_tags($row['new_teaser']) ?></p>
                      <div>
                        <ul class="info_box">
                          <li class="info_box_item">
                            <img src="/images/loading.gif" data-src="/images/account-ic.svg" alt="account-ic" class="info-ic lazy" >
                            <span><?=$row['adm_name']; ?></span>
                          </li>
                          <li class="info_box_item">
                            <img src="/images/loading.gif" data-src="/images/date.svg" alt="date" class="info-ic lazy" >
                            <span> <?= date('d-m-Y', $row['new_date']) ?></span>
                          </li>
                          <li class="info_box_item">
                            <img src="/images/loading.gif" data-src="/images/time-ic.svg" alt="time-ic" class="info-ic lazy" >
                            <span><? echo view_doc_tb($row['new_description']) ?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?
                if ($i==7) {
                  break;
                }
                  }
                ?>
          </div>
        </div>
      </div>

      <img style="width: 100%" class="bot-banner lazy" data-src="/images/bot-banner.webp" alt="bottom_banner">
    </article>
    <?php include '../includes/inc_footer.php';?>
  </body>

  <script type="text/javascript">
      function hienThi(clicked_id) {
        var id=clicked_id + "child";
        var x = document.getElementById(id);

        if (x.style.display ==="none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }

  </script>
</html>