<!-- <div class="new_news">
	<h2><span style="background: #FD9F00;display:inline-block;padding: 0 10px;">TIN MỚI NHẤT</span></h2>
	<ul class="list_news"  style="border: solid 1px #FD9F00;">
    <?
      $db_qr = new db_query("SELECT * FROM news WHERE new_cate_id = ".$webid." ORDER BY new_id DESC LIMIT 10");
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
</div> -->