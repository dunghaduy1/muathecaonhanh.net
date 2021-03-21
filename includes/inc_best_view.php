<div >
<!-- 	<h2><span style="background: #FD9F00;display: inline-block;padding: 0 10px;">TIN TỨC</span></h2>
  <ul style="border: solid 1px #FD9F00;">
  <?
      $db_qr = new db_query("SELECT * FROM news WHERE new_cate_id = ".$webid." ORDER BY new_view_count DESC LIMIT 10");
        While($row = mysql_fetch_assoc($db_qr->result))
        {
     ?>
    <li class="title_news pt-2 pb-2">
      <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><img style="width: 95%;" src="/pictures/news/<?=$row['new_picture'] ?>"></a>
      <a class="text-color-dark" href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><?=$row['new_title_seo']; ?></a>
      <div style="color: #c4c5c9; font-size: 14px;"><i class='fa fa-eye' aria-hidden='true'></i> <?= $row['new_view_count'] ?> Lượt xem</div>
    </li>
    
  <? } ?>        
  </ul> -->
<div class="title">
  <h2><img style="margin-right: 15.5px;" src="/images/tt-ic.svg" alt="ti-icon">TIN TỨC</h2>
    </div>
        <div class="new_news">
            <div class="big_box">
            <?      
            $db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_cate_id = ".$webid." ORDER BY new_view_count DESC LIMIT 6");
                    $i=0;
                    While($row = mysql_fetch_assoc($db_qr->result))
                    {
                      $i++;
                ?>
            <div class="data_box danh_muc_box box_ngang">
              <div class="ct-img">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                  <img class="card-img-top" src="/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title_seo']; ?>"></a>
              </div>
              <div class="ct-box">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><h3><?=$row['new_title_seo']; ?></h3></a>
                <p class="card-text"><?=strip_tags($row['new_teaser']) ?></p>
                <div>
                  <ul class="info_box">
                    <li class="info_box_item">
                      <img src="/images/account-ic.svg" alt="account-ic">
                      <span><?=$row['adm_name']?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/date.svg" alt="date">
                      <span><?= date("d-m-y",$row['new_date']) ?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/time-ic.svg" alt="">
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
                      $i++;
                ?>
            <div class="data_box danh_muc_box box_doc">
              <div class="ct-img">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>">
                  <img class="card-img-top" src="/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title_seo']; ?>"></a>
              </div>
              <div class="ct-box">
                <a href="<?= rewrite_news($row['new_title_seo'],$row['new_id']) ?>"><h3><?=$row['new_title_seo']; ?></h3></a>
                <p class="card-text"><?=strip_tags($row['new_teaser']) ?></p>
                <div>
                  <ul class="info_box">
                    <li class="info_box_item">
                      <img src="/images/account-ic.svg" alt="">
                      <span><?=$row['adm_name']?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/date.svg" alt="">
                      <span><?= date("d-m-y",$row['new_date']) ?>3/1/21</span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/time-ic.svg" alt="">
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
