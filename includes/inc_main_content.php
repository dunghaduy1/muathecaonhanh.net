
	<? 

	  $db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id  WHERE new_cate_id = ".$webid." AND new_pin = 1 ORDER BY new_id DESC LIMIT 5");
	  	$i = 0;

	  ?>
	  <div class="container">
	 <? 
	    While($row = mysql_fetch_assoc($db_qr->result))
	    {
	    	$i++;

	?> 
            <div class="data_box news">
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
                      <img src="/images/account-ic.svg" alt="account-ic" class="info-ic">
                      <span><?=$row['adm_name']; ?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/date.svg" alt="date" class="info-ic">
                      <span> <?= date('d-m-Y', $row['new_date']) ?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/time-ic.svg" alt="time-ic" class="info-ic">
                      <span><? echo view_doc_tb($row['new_description']) ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
	<? 
		if($i == 1) break;
	}
	 ?>
	 	</div>

            <div class="md-news">
              <div class="container">
             <div class="news_item">

    <? 
	    While($row = mysql_fetch_assoc($db_qr->result))
	    {
	    	$i++;

	?> 
              <div class="ct-box box">
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
                      <span><?= date('d-m-Y', $row['new_date']) ?></span>
                    </li>
                    <li class="info_box_item">
                      <img src="/images/loading.gif" data-src="/images/time-ic.svg" alt="time-ic" class="info-ic lazy">
                      <span><? echo view_doc_tb($row['new_description']) ?></span>
                    </li>
                  </ul>
                </div>
              </div>
    <? 
		}
    ?>
           			</div>
           		 </div>
         	 </div>
          </div>
        </div>


