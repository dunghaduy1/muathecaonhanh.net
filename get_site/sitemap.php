<?

include("../home/config.php");
$domain = "https://muathecaonhanh.net";
date_default_timezone_set("Asia/Bangkok");

$file = '../sitemap.xml'; 

$urls = array();

$day = date('Y-m-d\TH:i:sP', time());


$urls[] = array($domain , $day,  'daily', '1');

$db_qr = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 AND cat_type = ".$webid." ORDER BY cat_order ASC");
While($row = mysql_fetch_assoc($db_qr->result)){
    $urls[] = array($domain.list_cate_par($row['cat_id'],$row['cat_name']) , $day,  'daily', '0.8');
}
$urls[] = array('https://muathecaonhanh.net/home/lien-he' , $day,  'daily', '0.8');
unset($db_qr,$row);
$db_qr = new db_query("SELECT * FROM news WHERE 1 AND new_cate_id = ".$webid); 
while($row = mysql_fetch_assoc($db_qr->result)) {
	if ($row['new_date_last_edit'] != 0) {
		$day = date('Y-m-d\TH:i:sP', $row['new_date_last_edit']);
	}else{
		$day = date('Y-m-d\TH:i:sP', $row['new_date']);
	}

	$link = $domain.rewrite_news($row['new_title'],$row['new_id']);

	preg_match_all('/<img[^>]+src=(?:\"|\')\K(.[^">]+?)(?=\"|\')/', $row['new_description'], $imgs);
	$imgs = $imgs[1];
	$imgs = array_unique($imgs);

	$urls[] = array($link , $day,  'daily', '0.7',$imgs);
	unset($imgs);
}

$xml = '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="'.$domain.'/css/css-sitemap.xsl"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach ($urls as $key => $value) {	
	$xml .= '<url><loc>'.$value['0'].'</loc><lastmod>'.$value['1'].'</lastmod><changefreq>'.$value['2'].'</changefreq><priority>'.$value['3'].'</priority>';
	if (count($value['4']) > 0) {
		foreach ($value['4'] as $keys => $values) {
			$xml .= '<image:image><image:loc>'.$domain.$values.'</image:loc></image:image>';
		}
	}
	$xml .= '</url>';
}

$xml .= '</urlset>';
// echo "<pre>";
// var_dump($xml);
// echo "</pre>";
// die;
$fp = fopen($file,"w"); 
fputs($fp, $xml); 
fclose($fp);

echo 'done';

?>

