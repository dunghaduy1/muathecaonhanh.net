<div class="container">
  <div class="wapper">
    <div>
      <?
      if(isset($isHome)) echo '<h1>';
      ?>
        <div class="logo-top " align="center">
            <a href="/" title="Trang chủ">
            <img src="/images/logo.webp" class="logo-cls-t" alt="logo"></a>
        </div>
      <?
      if(isset($isHome)) echo '</h1>';
      ?>  
    </div>
    <div class="row">
      <button class="nav-btn" onclick="showMenu()">
        <img width="36" height="24" src="/images/nav-btn.svg" alt="nav-btn">
      </button>  
        <nav>      
            <ul class="navbar-nav" id="navbar-nav" style="z-index: 1;">
              <li class="nav-item trang_chu">
                <a class="nav_link_menu" href="/">
                  <img class="mgr" src="/images/home-ic.svg" alt="home-ic">
                  Trang Chủ</a></li>             
              <?
               $db_qr = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0  AND cat_type = ".$webid."");
              $icArr = array("/images/card.svg","/images/work.svg");
               $i=0;
               While($row = mysql_fetch_assoc($db_qr->result))
               {
                $i++;
            ?>
              <li class="nav-item"> 
                <a class="nav_link_menu" href="<?= list_cate_par($row['cat_id'],$row['cat_name']) ?>">
                  <img class="nav-ic" src="<?=$icArr[$i-1] ?>" alt="<?= $row['cat_name'] ?>">
                  <?= $row['cat_name'] ?></a>
                </li>
            <? } ?>
              
              <li class="nav-item">
                <a class="nav_link_menu" href="/home/lien-he">
                <img class="nav-ic" src="/images/phone.svg" alt="lien-he">Liên Hệ</a>
              </li>
            </ul>
        </nav>
    </div>
  </div> 
</div>
<script type="text/javascript">
        function showMenu(){
        var x = document.getElementById("navbar-nav");
        if (x.style.display=="none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
</script>
