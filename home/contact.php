<?
include "config.php";
$db_qr  = new db_query("SELECT * FROM categories_pro WHERE cat_id = ".$webid."");
$row_td = mysql_fetch_assoc($db_qr->result);

$title = "Liên hệ - muathecaonhanh.net";
$des   = "Mọi thông tin liên hệ tại muathecaonhanh.net được cung cấp đầy đủ giúp quý khách hàng dễ dàng tìm kiếm hỗ trợ từ website để sở hữu những mệnh giá giàu ưu đãi.";
?>
<!doctype html>
<html lang="en">
<head>
 <?php include '../includes/inc_head.php';?>

 <link rel="canonical" href="<?=$domain . '/lien-he'?>" />
 <!-- link amp -->
 <link rel="amphtml" href="<?=$domain . '/amp-lien-he'?>">

</head>
<body>
  <header id="header" class="bg-header">
    <?php include '../includes/inc_header.php';?>
  </header>

  <article id="lien_he_pg">
    <div class="container">

     <div class="title">
        <h2><img style="margin-right: 15.5px;" src="/images/tt-ic.svg" alt="lien-he-ic">LIÊN HỆ</h2>
      </div>
    <div class="row">
    <div  class="lien_he_ip">

          <div>
              <div class="form-group">
                <label for="txtName">Họ và tên <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="txtName" placeholder="Nguyễn Văn A">
              </div>
              <div class="form-group">
                <label for="txtEmail">Địa chỉ Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" id="txtEmail" placeholder="12345@gmail.com">
              </div>
              <div class="form-group">
                <label for="txtPhone">Số điện thoại <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="txtPhone" placeholder="1234567">
              </div>
              <div class="form-group">
                <label for="txtNoidung">Nội dung <span style="color: red;">*</span></label>
                <textarea class="form-control" rows="5" id="txtNoidung" placeholder="" ></textarea>
              </div>
              <div class="form-group">
                
                <input type="text" class="form-control" id="txtCaptcha" placeholder="Mã xác nhận">
                <img src="/classes/securitycode.php" />
              </div>
              <button type="submit" name="send" class="lh_btn">GỬI</button>
              <h5 id="kq" style="color: red; display: inline-block;"> </h5>
              <p id="txtUrl" style="visibility: hidden;"><?=$_SERVER['SERVER_NAME'];?></p>

          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function(){
                $("button.btn-primary").click(function(){
                    $.post("contact1.php",
                    {
                      name: $("#txtName").val(),
                      phone: $("#txtPhone").val(),
                      mail: $("#txtEmail").val(),
                      nd: $("#txtNoidung").val(),
                      capcha: $("#txtCaptcha").val(),
                      url: $("#txtUrl").html()
                    },
                    function(data,status){
                        $("h5#kq").html(data);
                        $("#txtName").val("");
                        $("#txtPhone").val("");
                        $("#txtEmail").val("");
                        $("#txtNoidung").val("");
                        $("#txtCaptcha").val("");
                    });
                });
            });
          </script>
      </div>
      <div class="col-lg-4 mt-5">
          <?php include '../includes/inc_best_view.php';?>
          


      </div>

    </div>
  </div>
  </article>
      <?php include '../includes/inc_footer.php'?>

</body>

</html>