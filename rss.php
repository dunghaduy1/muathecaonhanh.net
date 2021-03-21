<?php 
require_once("functions/functions.php"); 
ob_start();
require_once("functions/function_rewrite.php");
require_once("classes/html_cleanup.php");
require_once("classes/database.php");
$webid = 136;
//Thiết lập cấu trúc fiel là xml
header('Content-Type: text/xml; charset=utf-8');
echo('<?xml version="1.0" encoding="utf-8"?>');
echo('<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">');
echo("<channel>");
echo("<title>mua thẻ cào nhanh chóng nhất</title>");
echo("<link>https://muathecaonhanh.net</link>");
$ar = array('Xem bài nguyên mẫu tại', 'Coi bài nguyên văn tại', 'Tham khảo bài gốc ở', 'Tham khảo bài nguyên mẫu tại đây', 'Coi thêm tại', 'Coi thêm ở', 'Đọc nguyên bài viết tại', 'Coi nguyên bài viết ở', 'Xem nguyên bài viết tại');


$db_qrcate = new db_query("SELECT * FROM news JOIN category ON news.new_category_id = category.cat_id
 WHERE  new_cate_id = ".$webid." ORDER BY rand()
LIMIT 5");

while($row =  mysql_fetch_assoc($db_qrcate->result)) {
  $i = rand(0,8);
  ?>
  
    <item>
    <title><![CDATA[ <?php echo str_replace("xemtinvn.com - ","",$row['new_title']); ?>]]></title>
    <link><![CDATA[ <?php echo "https://muathecaonhanh.net".rewrite_news($row['new_title'],$row['new_id'],$row['cat_name']); ?>]]></link>
    <description><![CDATA[ 
    
      <? if($row['new_picture']!=''){ ?>
         <center><img src="https://muathecaonhanh.net/pictures/news/<?= $row['new_picture'] ?>" class="w100p" width="300" alt='<?= $row['new_title'] ?>' /></center>
      	</a>
        
		<? } ?>
      	<p>
      <?php 
         $html_cleanup = new html_cleanup(str_replace("&nbsp;","",str_replace("&gt;","",str_replace("&rsquo;","",str_replace("&amp;","",str_replace("&lsquo;","",str_replace("&hellip;","",str_replace("&ldquo;","",str_replace("&ndash;","",$row['new_description'])))))))));
          $html_cleanup->clean();
          $mota = $html_cleanup->output_html;
          $mota = strip_tags($mota,'<a>');
          echo $mota;
      ?>
      <p>
      <p><?php echo $ar[$i].': '; ?><a href="<?php echo "https://muathecaonhanh.net".rewrite_news($row['new_title'],$row['new_id'],$row['cat_name']); ?>"><?php echo $row['new_title']; ?></a></p>
      ]]></description>
    <guid isPermaLink="false"><![CDATA[ <?php echo "https://muathecaonhanh.net".rewrite_news($row['new_title'],$row['new_id'],$row['cat_name']); ?>]]></guid>
    </item>
  
  <?php
  }
  unset($db_qr,$row);
  echo("</channel>");
  echo('</rss>')
?>