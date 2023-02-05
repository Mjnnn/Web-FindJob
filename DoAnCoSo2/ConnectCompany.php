<?php
include 'Config.php';
include 'ConnectMySQL.php';
$us = '';
if (isset($_SESSION['username3'])) {
  $us = $_SESSION['username3'];
  $sql = "SELECT * FROM account WHERE `username`='$us' ";
  $sql2 = execute($sql);
  foreach ($sql2 as $value) {
    $img = $value['imgavata'];
  }
  $_SESSION['img2'] = $img;
}
$mess_error_01 = '';
$mess_error_02 = '';
$mess_error_03 = '';
$mess_error_04 = '';
$mess_error_05 = '';
$mess_error_06 = '';
$mess_error_07 = '';
$mess_error_08 = '';
$mess_error_09 = '';
$mess_error_10 = '';
$mess_error_11 = '';
$mess_error_12 = '';
$mess_error_13 = '';
$mess_error_14 = '';
$mess_error_15 = '';

$namecompany = '';
$loaihinh = '';
$trangthai = '';
$sonv = '';
$quocgia = '';
$tinh = '';
$diachi = '';
$soluoc = '';
$phucloi = '';
$tenlh = '';
$sdt = '';
$email = '';
$masothue = '';
$linkwebsite = '';
$nhunglocation = '';
$imgcompany = '';
$imgnguoilh = '';

$timedk = getDate();
$timedk2 = $timedk["year"] . "-" . $timedk["mon"] . "-" . $timedk["mday"];

function emailValid($email)
{
  return (bool)preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}

if (isset($_POST['dangky'])) {
  $namecompany = $_POST['tencty'];
  $loaihinh = $_POST['slhd'];
  $trangthai = $_POST['sltime'];
  $sonv = $_POST['slsl'];
  $quocgia = $_POST['slcontry'];
  $tinh = $_POST['sltinh'];
  $diachi = $_POST['location'];
  $soluoc = $_POST['soluoc'];
  $phucloi = $_POST['phucloi'];
  $tenlh = $_POST['tenlh'];
  $sdt = $_POST['sdt'];
  $email = $_POST['email'];
  $masothue = $_POST['masothue'];
  $linkwebsite = $_POST['linkurl'];
  $nhunglocation = $_POST['nhunglocation'];
  $imgcompany = $_POST['imgcompany'];
  $imgnguoilh = $_POST['imgnguoilh'];
  if ($namecompany == '' || $namecompany == ' ') {
    $mess_error_01 = 'Vui lòng nhập tên công ty';
  }
  if ($loaihinh == 'Vui lòng chọn...') {
    $mess_error_02 = 'Vui lòng chọn loại hình hoạt động';
  }
  if ($trangthai == "Vui lòng chọn...") {
    $mess_error_03 = 'Vui lòng chọn trạng thái công ty';
  }
  if ($sonv == '0' || $sonv == 0) {
    $mess_error_04 = "Vui lòng chọn số lượng nhân viên";
  }
  if ($diachi == '' || $diachi == ' ') {
    $mess_error_05 = 'Vui lòng nhập địa chỉ công ty';
  }
  if ($soluoc == ' ' || $soluoc == '') {
    $mess_error_06 = 'Vui lòng nhập thông tin của công ty';
  }
  if ($phucloi == '' || $phucloi == ' ') {
    $mess_error_07 = 'Vui lòng nhập phúc lợi của công ty';
  }
  if ($tenlh == '' || $tenlh == ' ') {
    $mess_error_08 = ' Vui lòng nhập tên liên hệ';
  }
  if ($sdt == '' || $sdt == ' ') {
    $mess_error_09 = 'Vui lòng nhập số điện thoại liên hệ';
  } else {
    if (strlen($sdt) < 10) {
      $mess_error_10 = 'Số điện thoải phải quá 10 số';
    }
  }
  if ($email == '' || $email == ' ') {
    $mess_error_11 = 'Vui lòng nhập email';
  } else {
    if (!emailValid($email)) {
      $mess_error_12 = "Email không hợp lệ, vui lòng kiểm tra lại";
    }
  }
  if ($masothue == '' || $masothue == ' ') {
    $mess_error_13 = 'Vui lòng nhập mã số thuế';
  }
  if ($imgcompany == '' || $imgcompany == ' ') {
    $mess_error_14 = 'Vui lòng cập nhật ảnh công ty của bạn';
  }
  if ($imgnguoilh == '' || $imgnguoilh == ' ') {
    $mess_error_15 = 'Vui lòng cập nhật ảnh người liên hệ của công ty';
  }
  if (
    $mess_error_01 == '' && $mess_error_02 == '' && $mess_error_03 == '' && $mess_error_04 == '' && $mess_error_05 == '' && $mess_error_06 == '' &&
    $mess_error_07 == '' && $mess_error_08 == '' && $mess_error_09 == '' && $mess_error_10 == '' && $mess_error_11 == '' && $mess_error_12 == '' &&
    $mess_error_13 == '' && $mess_error_14 == '' && $mess_error_15 == ''
  ) {
    $sql = "INSERT INTO `company` (`username`,`tencongty`,`loaihinhhd`,`trangthaicty`,`sonv`,`soluoccty`,`quocgia`,`tinh_tp`,`diachi`,`tennguoilh`,`sdt`,
    `email`,`imgcompany`,`imgnguoilh`,`nhunglocation`,`linkwebsite`,`phucloicty`,`masothue`,`trangthaichitiet`,`ngaydangky`) VALUES('$us','$namecompany','$loaihinh',
    '$trangthai','$sonv','$soluoc','$quocgia','$tinh','$diachi','$tenlh','$sdt','$email','$imgcompany','$imgnguoilh','$nhunglocation','$linkwebsite','$phucloi','$masothue','Đang Chờ Xác Nhận','$timedk2');";
    $sql2 = insertA($sql);
    if ($sql2) {
      echo '<script language="javascript">
      alert("Đăng Ký Thành Công!!!");
  </script>';
      header('location: Hired.php');
    } else {
      echo '<script language="javascript">
      alert("Đăng ký không thành công, vui lòng kiểm tra lại!!!");
  </script>';
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kết Nối Công Ty</title>
  <link rel="stylesheet" href="Css/reset.css">
  <link rel="stylesheet" href="Css/responsive.css">
  <link rel="stylesheet" href="Css/styleConnectCompany.css">
  <link rel="stylesheet" href="/fontawesome-free-6.1.1-web/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
  <?php if ($us == '') {
    include_once './Header.php';
  } else {
    include_once './HeaderLogin.php';
  }
  ?>
  <section class="employer-signup-new step-1 cb-section">
    <div class="container">
      <div class="row row-sp mgt-50">
        <div class="col-xl-5">
          <div class="box-img"> <img src="Img/anh-tuyen-dung-va-dao-tao-nhan-vien.png" alt=""> </div>
        </div>
        <div class="col-xl-7">
          <div class="box-info-signup">
            <div class="title">
              <h2>Kết Nối Công Ty Để Đăng Tuyển Dụng</h2>
            </div>
            <form name="frmRegister" id="frmRegister" method="post" action="#">
              <div class="step-2" id="step-2" style="">
                <div class="main-form">
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Tên công ty</span> </div>
                    <div class="form-input">
                      <input type="text" name="tencty" id="company_name" value="" class="form-control" placeholder="Vui lòng nhập thông tin">
                      <span class="form-error error_company_name"><?= $mess_error_01 ?> </span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Loại hình hoạt động</span> </div>
                    <div class="form-input short form-input-select">
                      <select class="form-control" id="company_type" name="slhd">
                        <script language="javascript">
                          var states = new Array("Vui lòng chọn...", "100% vốn nước ngoài", "Cá Nhân", "Công Ty Đa Quốc Gia", "Cổ Phần", "Liên Doanh", "Nhà Nước", "Trách Nhiệm Hữu Hạn");
                          for (var hi = 0; hi < states.length; hi++)
                            document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                        </script>
                      </select>
                      <span class="form-error error_company_type"> <?= $mess_error_02 ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Trạng Thái Công Ty</span> </div>
                    <div class="form-input short form-input-select">
                      <select class="form-control" id="company_type" name="sltime">
                        <script language="javascript">
                          var states = new Array("Vui lòng chọn...", "Mở Cửa 24/7", "Theo Giờ Hành Chính", "Theo khung giờ riêng của công ty");
                          for (var hi = 0; hi < states.length; hi++)
                            document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                        </script>
                      </select>
                      <span class="form-error error_company_type"> <?= $mess_error_03 ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Chọn số nhân viên</span> </div>
                    <div class="form-input short form-input-select">
                      <select class="form-control" name="slsl">
                        <option value="0">Chọn số nhân viên</option>
                        <option value="Ít hơn 10">Ít hơn 10</option>
                        <option value="10-20">10-20</option>
                        <option value="25-99">25-99</option>
                        <option value="100-499">100-499</option>
                        <option value="500-999">500-999</option>
                        <option value="1.000-4.999">1.000-4.999</option>
                        <option value="5.000-9.999">5.000-9.999</option>
                        <option value="10.000-19.999">10.000-19.999</option>
                        <option value="20.000-49.999">20.000-49.999</option>
                        <option value="Hơn 50.000">Hơn 50.000</option>
                      </select>
                      <span class="form-error error_company_size"> <?= $mess_error_04 ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Quốc gia</span> </div>
                    <div class="form-input short form-input-select">
                      <select class="form-control" name="slcontry" id="country_id">
                        <option value="Việt Nam" selected="">Việt Nam</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Campuchia">Campuchia</option>
                        <option value="Canada">Canada</option>
                        <option value="Đài Loan">Đài Loan</option>
                        <option value="Hàn Quốc">Hàn Quốc</option>
                        <option value="Hoa Kỳ">Hoa Kỳ</option>
                        <option value="Hồng Kông">Hồng Kông</option>
                        <option value="Lào">Lào</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nhật Bản">Nhật Bản</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Trung Quốc">Trung Quốc</option>
                        <option value="Úc">Úc</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="Khác">Khác</option>
                      </select>
                      <span class="form-error error_country_id"></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span id="lable_location">Tỉnh / TP</span> </div>
                    <div class="form-input short form-input-select">
                      <select class="form-control" name="sltinh" id="location_id">
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                        <option value="An Giang">An Giang</option>
                        <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                        <option value="Bạc Liêu">Bạc Liêu</option>
                        <option value="Bắc Cạn">Bắc Cạn</option>
                        <option value="Bắc Giang">Bắc Giang</option>
                        <option value="Bắc Ninh">Bắc Ninh</option>
                        <option value="Bến Tre">Bến Tre</option>
                        <option value="Bình Dương">Bình Dương</option>
                        <option value="Bình Định">Bình Định</option>
                        <option value="Bình Phước">Bình Phước</option>
                        <option value="Bình Thuận">Bình Thuận</option>
                        <option value="Cà Mau">Cà Mau</option>
                        <option value="Cao Bằng">Cao Bằng</option>
                        <option value="Cần Thơ">Cần Thơ</option>
                        <option value="Dak Lak">Dak Lak</option>
                        <option value="Dak Nông">Dak Nông</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                        <option value="Điện Biên">Điện Biên</option>
                        <option value="Đồng Bằng Sông Cửu Long">Đồng Bằng Sông Cửu Long</option>
                        <option value="Đồng Nai">Đồng Nai</option>
                        <option value="Đồng Tháp">Đồng Tháp</option>
                        <option value="Gia Lai">Gia Lai</option>
                        <option value="Hà Giang">Hà Giang</option>
                        <option value="Hà Nam">Hà Nam</option>
                        <option value="Hà Tĩnh">Hà Tĩnh</option>
                        <option value="Hải Dương">Hải Dương</option>
                        <option value="Hải Phòng">Hải Phòng</option>
                        <option value="Hậu Giang">Hậu Giang</option>
                        <option value="Hòa Bình">Hòa Bình</option>
                        <option value="Hưng Yên">Hưng Yên</option>
                        <option value="Khánh Hòa">Khánh Hòa</option>
                        <option value="Kiên Giang">Kiên Giang</option>
                        <option value="Kon Tum">Kon Tum</option>
                        <option value="Lai Châu">Lai Châu</option>
                        <option value="Lạng Sơn">Lạng Sơn</option>
                        <option value="Lào Cai">Lào Cai</option>
                        <option value="Lâm Đồng">Lâm Đồng</option>
                        <option value="Long An">Long An</option>
                        <option value="Nam Định">Nam Định</option>
                        <option value="Nghệ An">Nghệ An</option>
                        <option value="Ninh Bình">Ninh Bình</option>
                        <option value="Ninh Thuận">Ninh Thuận</option>
                        <option value="Phú Thọ">Phú Thọ</option>
                        <option value="Phú Yên">Phú Yên</option>
                        <option value="Quảng Bình">Quảng Bình</option>
                        <option value="Quảng Nam">Quảng Nam</option>
                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                        <option value="Quảng Ninh">Quảng Ninh</option>
                        <option value="Quảng Trị">Quảng Trị</option>
                        <option value="Sóc Trăng">Sóc Trăng</option>
                        <option value="Sơn La">Sơn La</option>
                        <option value="Tây Ninh">Tây Ninh</option>
                        <option value="Thái Bình">Thái Bình</option>
                        <option value="Thái Nguyên">Thái Nguyên</option>
                        <option value="Thanh Hóa">Thanh Hóa</option>
                        <option value="Thừa Thiên- Huế">Thừa Thiên- Huế</option>
                        <option value="Tiền Giang">Tiền Giang</option>
                        <option value="Toàn quốc">Toàn quốc</option>
                        <option value="Trà Vinh">Trà Vinh</option>
                        <option value="Tuyên Quang">Tuyên Quang</option>
                        <option value="Vĩnh Long">Vĩnh Long</option>
                        <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                        <option value="Yên Bái">Yên Bái</option>
                        <option value="Khác">Khác</option>
                      </select>
                      <span class="form-error error_location_id"></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Địa chỉ công ty</span> </div>
                    <div class="form-input">
                      <input type="text" name="location" id="company_address" value="" class="form-control" placeholder="Vui lòng nhập thông tin">
                      <span class="form-error error_company_address"><?= $mess_error_05 ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex info-company">
                    <div class="form-info"> <span>Sơ lược về công ty</span> </div>
                    <div class="form-input">
                      <textarea class="form-control" rows="5" name="soluoc" id="company_summary"></textarea>
                      <span class="form-error error_company_summary"><?= $mess_error_06 ?> </span>
                    </div>
                  </div>
                  <div class="form-group d-flex info-company">
                    <div class="form-info"> <span>Phúc lợi công ty</span> </div>
                    <div class="form-input">
                      <textarea class="form-control" rows="5" name="phucloi" id="company_summary"></textarea>
                      <span class="form-error error_company_summary"><?= $mess_error_07 ?> </span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Tên người liên hệ</span> </div>
                    <div class="form-input">
                      <input type="text" name="tenlh" id="contact_name" value="" class="form-control" placeholder="Vui lòng nhập thông tin">
                      <span class="form-error error_contact_name"><?= $mess_error_08 ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Điện thoại</span> </div>
                    <div class="form-input">
                      <input type="text" name="sdt" id="contact_phone" value="" class="form-control" placeholder="Vui lòng nhập thông tin">
                      <span class="form-error error_contact_phone"><?php
                                                                    if ($mess_error_09 != '') echo $mess_error_09;
                                                                    else if ($mess_error_10 != '') echo $mess_error_10;
                                                                    ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Email</span> </div>
                    <div class="form-input">
                      <input type="email" name="email" id="taxid" value="" class="form-control" placeholder="Vui lòng nhập thông tin">
                      <span class="form-error error_taxid"><?php
                                                            if ($mess_error_11 != '') echo $mess_error_11;
                                                            else if ($mess_error_12 != '') echo $mess_error_12;
                                                            ?> </span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Link Website (Nếu có)</span> </div>
                    <div class="form-input">
                      <input type="text" name="linkurl" id="" value="" class="form-control" placeholder="Đường dẫn url...">
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Nhúng Location (Nếu cần)</span> </div>
                    <div class="form-input">
                      <input type="text" name="nhunglocation" id="taxid" value="" class="form-control" placeholder="Địa chỉ nhúng location...">
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Mã số thuế</span> </div>
                    <div class="form-input">
                      <input type="text" name="masothue" id="taxid" value="" class="form-control" placeholder="Vui lòng nhập mã số thuế">
                      <span class="form-error error_taxid"><?= $mess_error_13 ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Cập nhật ảnh đại diện công ty</span> </div>
                    <div class="form-input">
                      <input type="file" name="imgcompany" id="taxid" value="" class="form-control l-h-45">
                      <span class="form-error error_taxid"><?= $mess_error_14 ?></span>
                    </div>
                  </div>
                  <div class="form-group d-flex">
                    <div class="form-info"> <span>Cập nhật ảnh người liên hệ</span> </div>
                    <div class="form-input">
                      <input type="file" name="imgnguoilh" id="taxid" value="" class="form-control l-h-45">
                      <span class="form-error error_taxid"><?= $mess_error_15 ?></span>
                    </div>
                  </div>
                  <!-- <div class="form-group d-flex">
          <div class="form-info"> <span>Mã xác nhận</span> </div>
          <div class="form-input short">
            <input type="text" name="captcha" id="captcha" autocomplete="off" class="form-control">
            <span class="form-error error_captcha">  </span> </div>
          <div class="box-captcha d-flex">
            <div id="captchaim"><img width="180" height="50" alt="" src="https://images.careerbuilder.vn/rws/captcha/7b4d2ba5a0f7324c81f48ad83d8f116b.png" class="img_code"><input type="hidden" name="key_captcha" id="key_captcha" value="7b4d2ba5a0f7324c81f48ad83d8f116b"></div>
            <div class="reCapcha" style="font-size: 24px;"><a onclick="refeshImgCaptcha('captchaim');" href="javascript:void(0);"> <em class="fa fa-repeat"></em></a></div>
          </div>
        </div> -->
                  <div class="btn-area list-btn">
                    <input type="hidden" name="csrf_token_register" value="eb6b5b606768c76a242e6ec32454523d672d36dd7fe9b1cf01aa9fe5c4f1aec1">
                    <button type="button" class="btn-prev"><a href="Hired.php">Quay Lại</a></button>
                    <input class="btn-action" type="submit" value="Đăng Ký" name="dangky">
                  </div>
                  <div class="right-note">
                    <p> Bằng việc nhấp vào "Đăng Ký Ngay!", bạn đã đồng ý với các điều khoản ghi trong <a href="#">Thỏa thuận dịch vụ của FindJob</a></p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include_once './Footer.php' ?>
  <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>