<!-- <div class="new_news">
	<h2><span style="background: #FD9F00;display:inline-block;padding: 0 10px;">BÀI VIẾT LIÊN QUAN</span></h2>
	<ul class="list_news"  style="border: solid 1px #FD9F00;">

	<?
     $db_qr = new db_query("SELECT * FROM news WHERE new_cate_id = ".$webid." ORDER BY RAND() LIMIT 10");
     While($row = mysql_fetch_assoc($db_qr->result))
     {
   	?>
    <li class="title_news pt-2 pb-2">
            <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><img style="width: 95%;" src="/pictures/news/<?=$row['new_picture'] ?>"></a>  
      <a class="text-color-dark" href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><?=$row['new_title_seo']; ?></a>
      <div style="color: #c4c5c9; font-size: 14px;"><i class='fa fa-eye' aria-hidden='true'></i> <?= $row['new_view_count'] ?> Lượt xem</div>
    </li>
    
		<? } ?>
	</ul>
</div>
 -->
<div class="s_de_tai">
        <div class="container">
          <div class="title">
            <h2>CÙNG CHỦ ĐỀ</h2>            
          </div>
          <div class="de_tai">
              <?
                 $db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_cate_id = ".$webid." ORDER BY RAND() LIMIT 4");
                 While($row = mysql_fetch_assoc($db_qr->result))
                 {
              ?>
              <div class="data_box ">
                <div class="ct-img">
                  <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                    <img class="lazy" alt="<?=$row['new_title_seo']; ?>" src="/images/loading.gif" data-src="/pictures/news/<?=$row['new_picture'] ?>"></a>  
                </div>
                <div class="ct-box">
                  
                  <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><h3><?=$row['new_title_seo']; ?></h3></a>
                  <p class="card-text"><?=strip_tags($row['new_teaser']) ?></p>
                  <div>
                    <ul class="info_box">
                      <li class="info_box_item">
                        <img src="/images/loading.gif" data-src="/images/account-ic.svg" alt="account-ic" class="info-ic lazy">
                        <span><?=$row['adm_name']; ?> </span>
                      </li>
                      <li class="info_box_item">
                        <img src="/images/loading.gif" data-src="/images/date.svg" alt="date" class="info-ic lazy">
                        <span><?= date('d-m-Y', $row['new_date']) ?></span>
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
                }
              ?>
          </div>
        </div>
      </div>