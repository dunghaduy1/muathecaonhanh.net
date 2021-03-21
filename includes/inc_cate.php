<div class="danhmuc">
  <h2>Danh Mục</h2>
  <div class="card">
    
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="/">Trang Chủ </a></li>
      <?
      $db_qr = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0  AND cat_type = ".$webid."");
      While($row = mysql_fetch_assoc($db_qr->result))
      {
    ?>
      <li class="list-group-item">
        <a href="<?= list_cate_par($row['cat_id'],$row['cat_name']) ?>"><?= $row['cat_name'] ?></a>
      </li>

    <?           
    }
      unset($row,$db_qr);
    ?>
      <li class="list-group-item"><a href="/home/lien-he">Liên Hệ</a></li>
    </ul>
  </div>
</div>

