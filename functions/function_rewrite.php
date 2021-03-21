<?
function generate_cate_url($row)
{
    $url = "/blog/" . replaceTitle($row['cat_name']) . "-c" . $row["cat_id"] . "/";
    return $url;
}
function rewrite_news($title, $id)
{
    $url = "/" . replaceTitle($title) . "-c" . $id . ".html";
    return $url;
}
function rewriteNews($id, $title)
{
    return "/" . replaceTitle($title) . "-" . $id . ".html";
}
function list_cate_par($catid, $catname)
{
    return "/c" . $catid . "/" . replaceTitle($catname);
}
function rewriteCate($catid, $catname, $city, $cityname)
{
    $linkrt = "";
    if ($catid == 0 && $city == 0) {
        $linkrt = "/viec-lam-moi.html";
    } else if ($catid != 0 && $city == 0) {
        $linkrt = "/viec-lam-" . replaceTitle($catname) . "-c" . $catid . "v" . $city . ".html";
    } else if ($catid == 0 && $city != 0) {
        $linkrt = "/viec-lam-tai-" . replaceTitle($cityname) . "-c" . $catid . "v" . $city . ".html";
    } else if ($catid != 0 && $city != 0) {
        $linkrt = "/viec-lam-" . replaceTitle($catname) . "-tai-" . replaceTitle($cityname) . "-c" . $catid . "v" . $city . ".html";
    }
    return $linkrt;
}
function rewritemoney($catid, $catname, $city, $cityname)
{
    $linkrt = "";
    if ($catid == 0 && $city == 0) {
        $linkrt = "/viec-lam-luong-cao.html";
    } else if ($catid != 0 && $city == 0) {
        $linkrt = "/viec-lam-" . replaceTitle($catname) . "-luong-cao-i" . $catid . "v" . $city . ".html";
    } else if ($catid == 0 && $city != 0) {
        $linkrt = "/viec-lam-luong-cao-tai-" . replaceTitle($cityname) . "-i" . $catid . "v" . $city . ".html";
    } else if ($catid != 0 && $city != 0) {
        $linkrt = "/viec-lam-" . replaceTitle($catname) . "-luong-cao-tai-" . replaceTitle($cityname) . "-i" . $catid . "v" . $city . ".html";
    }
    return $linkrt;
}
function rewriteSearch($keyword, $nganhnghe, $catname, $diadiem, $namediadiem)
{
    $titrw = '';
    if ($keyword != '' && $nganhnghe == 0 && $diadiem == 0) {
        $titrw = str_replace(" ", "-", $keyword) . "+toan-quoc" . "-c" . $nganhnghe . "p" . $diadiem . ".html";
    } else if ($keyword != '' && $nganhnghe != 0 && $diadiem == 0) {
        $titrw = str_replace(" ", "-", $keyword) . "+" . "nganh-" . replaceTitle($catname) . "-c" . $nganhnghe . "p" . $diadiem . ".html";
    } else if ($keyword != '' && $nganhnghe == 0 && $diadiem != 0) {
        $titrw = str_replace(" ", "-", $keyword) . "+" . "tai-" . replaceTitle($namediadiem) . "-c" . $nganhnghe . "p" . $diadiem . ".html";
    } else if ($keyword != '' && $nganhnghe != 0 && $diadiem != 0) {
        $titrw = str_replace(" ", "-", $keyword) . "+" . "tai-" . replaceTitle($namediadiem) . "-c" . $nganhnghe . "p" . $diadiem . ".html";
    }
    return "/tim-kiem/" . $titrw;
}
function rewrite_company($idcp, $namecp)
{
    $compn = "/" . replaceTitle($namecp) . "-co" . $idcp . ".html";
    return $compn;
}
// AMP
function amp_content($string)
{
    $kq  = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
    $kq  = strip_tags($kq, '<p><a><div><figure><figcaption><h1><h2><h3><h4><a><img><span><center><table><tbody><tr><th><td><button><blockquote><strong><ul><li><b><u><i><em><br>');
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML(mb_convert_encoding($kq, 'HTML-ENTITIES', 'UTF-8'));

    foreach ($dom->getElementsByTagName('img') as $img) {
        list($width, $height) = @getimagesize($img->getAttribute('src'));

        if ((int) $width == 0 || (int) $height == 0) {
            list($width, $height) = @getimagesize($_SERVER["DOCUMENT_ROOT"] . $img->getAttribute('src'));
        }
        if ((int) $width == 0) {$width = 900;}
        if ((int) $height == 0) {$height = 500;}
        $img->setAttribute('width', $width);
        $img->setAttribute('height', $height);
    }
    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query('//@*');
    foreach ($nodes as $node) {
        if (!in_array($node->nodeName, array('src', 'href', 'class', 'id', 'alt', 'width', 'height', 'rel'))) {
            $node->parentNode->removeAttribute($node->nodeName);
        }
    }
    $kq = $dom->saveHTML();
    $kq = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace(array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $kq));
    $kq = preg_replace('/<img(.+)>/', '<amp-img layout="intrinsic" $1 ></amp-img>', $kq);
    return $kq;
}

function replaceTitle($title)
{
    $title   = remove_accent($title);
    $arr_str = array("&lt;", "&gt;", "/", "\\", "&apos;", "&quot;", "&amp;", "lt;", "gt;", "apos;", "quot;", "amp;", "&lt", "&gt", "&apos", "&quot", "&amp", "&#34;", "&#39;", "&#38;", "&#60;", "&#62;");
    $title   = str_replace($arr_str, " ", $title);
    $title   = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);
    //Remove double space
    $array = array(
        '    ' => ' ',
        '   '  => ' ',
        '  '   => ' ',
    );
    $title = trim(strtr($title, $array));
    $title = str_replace(" ", "-", $title);
    $title = urlencode($title);
    // remove cac ky tu dac biet sau khi urlencode
    $array_apter = array("%0D%0A", "%", "&");
    $title       = str_replace($array_apter, "-", $title);
    $title       = strtolower($title);
    return $title;
}
//Loại bỏ dấu
function remove_accent($mystring)
{
    $marTViet = array(
        "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ",
        "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
        "ì", "í", "ị", "ỉ", "ĩ",
        "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
        "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
        "ỳ", "ý", "ỵ", "ỷ", "ỹ",
        "đ",
        "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
        "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
        "Ì", "Í", "Ị", "Ỉ", "Ĩ",
        "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
        "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
        "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
        "Đ",
        "'");

    $marKoDau = array(
        "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
        "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
        "i", "i", "i", "i", "i",
        "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
        "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
        "y", "y", "y", "y", "y",
        "d",
        "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
        "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
        "I", "I", "I", "I", "I",
        "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
        "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
        "Y", "Y", "Y", "Y", "Y",
        "D",
        "");

    return str_replace($marTViet, $marKoDau, $mystring);
}
function button_file($mystring)
{
    $typefile = array('.docx"', '.doc"', '.pdf"', '.xlsx"', '.xls"', '.rar"', '.zip"');

    $replace = array('.docx" class="download"', '.doc" class="download"', '.pdf" class="download"', '.xlsx" class="download"', '.xls" class="download"', '.rar" class="download"', '.zip" class="download"');

    return str_replace($typefile, $replace, $mystring);
}
function view_doc_tb($content)
{
    require_once "../functions/simple_html_dom.php";
    $html    = str_get_html($content);
    $kq      = strip_tags($html, '<p><a><div><figure><figcaption><h1><h2><h3><h4><a><img><span><center><table><tbody><tr><th><td><button><blockquote><strong><ul><li><b><u><i><em><br>');
    $ss      = strlen($kq) / 10;
    $vw_time = $ss / 4;
    $a       = round($vw_time, 0);
    if ($a < 60) {
        return $a . ' giây';
    }
    if ($a >= 60 && $a <= 3600) {
        return (round($a / 60)) . ' phút';
    }
    if ($a > 3600) {
        return (round($a / 3600)) . ' giờ';
    }
    die();
}
function makeML($content, $search = '', $replace = '')
{
    if ($content != '') {
        require_once "../functions/simple_html_dom.php";
        $html     = str_get_html($content);
        $h2s      = $html->find("h2,h3,h4,.h2-class,.h3-class");
        $patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
        $ml       = "<p class='title_phu_luc'><span>Mục lục</span></p>
<ul>";
        $i = $u = $j = 0;

        if (!empty($h2s)) {
            foreach ($h2s as $h2) {
                $text = preg_replace($patterns, '', str_replace('&nbsp;', ' ', $h2->plaintext), 1);
                $id   = replaceTitle($text);
                if ($id == $search) {
                    $id = $replace;
                }
                $h2->id = $id;
                if ($h2->tag == 'h2' || $h2->class == 'h2-class') {
                    $i++;
                    $ml .= "<li class=h2><a class=ml_h2 href='#" . $id . "'>" . $i . ". " . $text . "</a></li>";
                    $j = 0;
                }
                if ($h2->tag == 'h3' || $h2->class == 'h3-class') {
                    $j++;
                    $ml .= "<li class=h3><a class=ml_h3 href='#" . $id . "'>" . $i . "." . $j . ". " . $text . "</a></li>";
                    $u = 0;
                }
                if ($h2->tag == 'h4') {
                    $u++;
                    $ml .= "<li class=h4><a class=ul_h4 href='#" . $id . "'>" . $i . "." . $j . "." . $u . ". " . $text . "</a></li>";
                }
            }
            $ml .= '</ul>';
            echo $ml;
        }
    }
}

function makeML_content($content, $search = '', $replace = '')
{
    if ($content != '') {
        $html     = str_get_html($content);
        $h2s      = $html->find("h2,h3,h4");
        $patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
        foreach ($h2s as $h2) {
            $text = preg_replace($patterns, '', str_replace('&nbsp;', ' ', $h2->plaintext), 1);
            $id   = replaceTitle($text);
            if ($id == $search && $id != '') {
                $id = $replace;
            }
            $h2->id = $id;
        }
        $html = $html->save();
        return $html;
    }
}
