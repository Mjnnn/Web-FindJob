<?php
include 'Config.php';
include 'ConnectMySQL.php';
$us = '';
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
    $sql = "SELECT * FROM account WHERE `username`='$us' ";
    $sql2 = execute($sql);
    $sql3 = "SELECT * FROM `company` WHERE `username` ='$us'AND `trangthaichitiet` = 'Chấp Nhận'";
    $sql4 = execute($sql3);
    foreach ($sql2 as $value) {
        $img = $value['imgavata'];
    }
    $_SESSION['img2'] = $img;
} else {
    header('location: Login.php');
}
$chosecty = '';
$chosenn = '';
$chosetl = '';
$chosecdd = '';
$texttt = '';
$chosetime = '';
$chosesl = '';
$checkbbb = '';
$choseimg = '';
$choseluong = '';

$timedk = getDate();
$timedk2 = $timedk["year"] . "-" . $timedk["mon"] . "-" . $timedk["mday"];

$mess1 = '';
$mess2 = '';
$mess3 = '';
$mess4 = '';
$mess5 = '';
$mess6 = '';
$mess7 = '';
$mess8 = '';
$mess9 = '';
$mess10 = '';


if (isset($_POST['xacnhan'])) {
    $chosecty = $_POST['chosecty'];
    $chosenn = $_POST['chosenn'];
    $chosetl = $_POST['chosetl'];
    $chosecdd = $_POST['chosecdd'];
    // echo $_POST['chosecdd'] . 'hello <br>';
    // echo $chosecdd . '<br>';
    $texttt = $_POST['texttt'];
    $chosetime = $_POST['chosetime'];
    $chosesl = $_POST['chosesl'];
    // $checkbbb = $_POST['checkbbb'];
    $choseimg = $_POST['choseimg'];
    $choseluong = $_POST['choseluong'];

    if ($chosecty == '0' || $chosecty == 0) {
        $mess1 = 'Vui lòng chọn công ty cần đăng tuyển';
    }
    if ($chosenn == '0' || $chosenn == 0) {
        $mess2 = 'Vui lòng chọn ngành nghề';
    }
    if ($chosetl == '0' || $chosetl == 0) {
        $mess3 = 'Vui lòng chọn thể loại';
    }
    // if ($chosecdd == '' || $chosecdd = ' ') {
    //     $mess4 = 'Vui lòng nhập chức danh muốn đăng tuyển';
    // }
    if ($texttt == '' || $texttt == ' ') {
        $mess5 = 'Vui lòng nhập một số lưu ý khi tuyển dụng';
    }
    if ($chosesl == '' || $chosesl == ' ' || $chosesl <= 0) {
        $mess6 = 'Vui lòng nhập số lượng cần tuyển dụng';
    }
    if ($choseluong == '' || $choseluong == ' ') {
        $mess7 = 'Vui lòng nhập mức lương';
    }
    // if ($checkbbb != 1) {
    //     $mes8 = 'Vui lòng đọc điều khoản và đồng ý để đăng tuyển';
    // }
    if ($choseimg == '') {
        $mess9 = 'Vui lòng cập nhật ảnh công việc';
    }
    if ($chosetime == '') {
        $mess10 = 'Vui lòng cập nhật thời gian kết thúc';
    }
    if (
        $mess1 == '' && $mess2 == '' && $mess3 == '' && $mess4 == '' && $mess5 == '' && $mess6 == '' && $mess7 == '' && $mess8 == '' &&
        $mess9 == '' && $mess10 == ''
    ) {
        $sqll = "SELECT `idcongty` FROM `company` WHERE `tencongty`='$chosecty'";
        $sqll2 = execute($sqll);
        $idcongty = '';
        foreach ($sqll2 as $value) {
            $idcongty = $value['idcongty'];
        }
        $sql = "INSERT INTO `hired` (`username`,`idcongty`,`nganhnghe`,`theloai`,`chucdanh`,`soluong`,`mucluong`,`ngaydangky`,`ngayketthuc`,`luyy`,`imgcongviec`,`trangthai`) 
        VALUES('$us','$idcongty','$chosenn','$chosetl','$chosecdd','$chosesl',' $choseluong','$timedk2','$chosetime','$texttt','$choseimg','Đang Chờ Xác Nhận')";
        $sql2 = insertA($sql);
        if ($sql2) {
            echo '<script language="javascript">
            alert("Đăng Tuyển Thành Công!!!");
        </script>';
        } else {
            echo '<script language="javascript">
            alert("Đăng Tuyển Thất Bại, Vui lòng thử lại!!!");
        </script>';
        }
    } else {
        echo '<script language="javascript">
        alert("Đăng Tuyển Không Thành Công, Vui lòng điền đủ thông tin!!!");
    </script>';
    }
}
// echo " checkbbb- " . $checkbbb . '<br>';
// echo " chosecd- " . $chosecdd . '<br>';
// echo "chosecty- " . $chosecty . '<br>';
// echo  "choseimg- " . $choseimg . '<br>';
// echo  "choseluong- " . $choseluong . '<br>';
// echo  "chosesl- " . $chosesl . "<br>";
// echo  "chosetl- " . $chosetl . "<br>";
// echo   "texttt- " . $texttt . '<br>';
// echo  "chosetime- " . $chosetime . '<br>';
// echo   "chosenn- " . $chosenn . '<br>';
// echo  "hi" . $mess4 . "hi";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/styleHired.css">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Nhà Tuyển Dụng</title>
</head>

<body>

    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <section class="post-a-job lazy-bg mgt-65" style="background-image: url(&quot;https://images.careerbuilder.vn/content/Product/bg-3_3.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text"><span>Dành cho nhà tuyển dụng</span>
                        <h3>Bạn có vị trí cần đăng tuyển?</h3>
                        <p>Chúng tôi có những giải pháp tối ưu phù hợp với<br> nhiều loại hình công ty và tiêu chuẩn riêng</p>
                    </div>
                    <div class="post-a-job-btn"><a class="btn-gradient" href="ConnectCompany.php"> Kết Nối Công Ty
                        </a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="employer-number mgt-50">
        <div class="container">
            <ul class="list-number">
                <li>
                    <div class="number" data-number="200"><span id="s1">200</span>
                        <p>M+</p>
                    </div>
                    <p class="title">Ứng viên trên toàn thế giới</p>
                </li>
                <li>
                    <div class="number" data-number="300"><span id="s2">300</span>
                        <p>K+</p>
                    </div>
                    <p class="title">Tập đoàn toàn cầu sử dụng FindJob</p>
                </li>
                <li>
                    <div class="number" data-number="2"><span id="s3">2</span>
                        <p>M+</p>
                    </div>
                    <p class="title">Việc làm mỗi ngày </p>
                </li>
                <li>
                    <div class="number" data-number="17000"><span id="s4">17</span>
                        <p>K+</p>
                    </div>
                    <p class="title">Doanh nghiệp hàng đầu Việt Nam</p>
                </li>
            </ul>
        </div>
    </section>

    <div class="main_hired grid">
        <div class="wide">
            <div class="mgt-30 chu_y centerrr">
                <h2 class="dangtd">Đăng Tuyển Dụng</h2>
            </div>
            <div class="row mgt-80">
                <div class="img_hired col l-4">
                    <img src="Img/hinh-anh-tuyen-dung-dep.png" alt="" class="img-fluid">
                </div>
                <form class="form_hired col l-8 c-12" method="post">
                    <div class="centerrr">
                        <select name="chosecty" class="slist wt-60 sl_cp" value="<?php echo $chosecty ?>">
                            <option value="0">Chọn Công Ty...</option>
                            <?php foreach ($sql4 as $value) { ?>
                                <option value="<?= $value['tencongty'] ?>"><?= $value['tencongty'] ?> </option>
                            <?php } ?>

                        </select>
                        <span class="form-error"><?= $mess1 ?></span>
                    </div>
                    <div class="mgt-30 flex_x">
                        <div class="fl_1 centerrr">
                            <select name="chosenn" class="slist wt-80 sl_nn_tl" value="<?php echo $chosenn ?> ">
                                <option value="0">Chọn Ngành Nghề...</option>
                                <script language="javascript">
                                    var states = new Array("Công nghệ thông tin", "Tài chính kinh doanh", "Cơ Khí - Kỹ thuật ứng dụng", "Du lịch - Nhà hàng - khách sạn", "Giáo dục - Văn hóa", "Điện tử viễn thông", "Hàng không", "Hàng hải", "Marketing-Truyền Thông", "Môi trường-Xử lí chất thải", "Nhân sự - Tài chính", "Logistics", "Công nghệ ôtô", "Xuất nhập khẩu", "Kiến trúc", "Trợ lý - Thư kí", "Bất động sản", "Chứng khoáng", "Dầu khí-Hóa chất", "Khách Sạn - Nhà Hàng", "Quản lí điều hành", "Thiết kế đồ họa", "Thời trang", "Các Ngành Nghề Khác...");
                                    for (var hi = 0; hi < states.length; hi++)
                                        document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                                </script>
                            </select>
                            <span class="form-error"><?= $mess2 ?></span>
                        </div>
                        <div class="fl_1 centerrr">
                            <select name="chosetl" class="slist wt-80 sl_nn_tl" value="<?php echo $chosetl ?>">
                                <option value="0">Chọn Thể Loại...</option>
                                <script language="javascript">
                                    var states = new Array("Fulltime", "Partime", "Thực Tập", "Thời Vụ", "Tự Lập", "Hợp Đồng", "Permanent", "Casual/Temporary");
                                    for (var hi = 0; hi < states.length; hi++)
                                        document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                                </script>
                            </select>
                            <span class="form-error"><?= $mess3 ?></span>
                        </div>
                    </div>
                    <div class="mgt-30 flex_x">
                        <div class="fl_1 centerrr">
                            <input type="text" placeholder="Chức Danh" class="ip_cd_sl wt-80 ip_1" name="chosecdd">
                            <span class="form-error"><?= $mess4 ?></span>
                        </div>

                        <div class="fl_1 centerrr">
                            <input type="number" placeholder="Số Lượng Tuyển Dụng" class="ip_cd_sl wt-80 ip_2" name="chosesl" value="<?php echo $chosesl ?> ">
                            <span class="form-error"><?= $mess6 ?></span>
                        </div>

                    </div>

                    <div class="mgt-30 flex_x">
                        <div class="fl_1 centerrr">
                            <input type="text" placeholder="Mức Lương Chi trả (theo_$)" class="ip_cd_sl wt-80 ip_1" name="choseluong" value="<?php echo $choseluong ?>">
                            <span class="form-error"><?= $mess7 ?></span>
                        </div>

                        <div class="fl_1">
                            <label for="">Thời Gian Kết Thúc:</label>
                            <input type="date" class="ip_cd_sl ip_1" name="chosetime" value="<?php echo $chosetime ?>  ">

                            <span class="form-error"><?= $mess10 ?></span>
                        </div>

                    </div>
                    <div class="mgt-30 centerrr">
                        <textarea id="" cols="38" rows="5" placeholder="Lưu ý tuyển dụng..." class="wt-60 form_tx" name="texttt" value=" <?php echo $texttt ?>"></textarea>
                        <span class="form-error"><?= $mess5 ?></span>
                    </div>
                    <div class="mgt-15 centerrr">
                        <label for="">Hình ảnh đăng tải:</label> <input type="file" name="choseimg">
                        <span class="form-error"><?= $mess9 ?></span>
                    </div>
                    <div class="mgt-15">
                        <input type="checkbox" name="checkbbb" id="" value="1" checked='checked'> <label for=""> Đồng ý các <a href="">quy tắc</a> và <a href="">nội dung tiêu chuẩn</a> của FindJob</label>
                        <!-- <span class="form-error"></span> -->
                    </div>
                    <div class="mgt-30 centerrr">
                        <input type="submit" value="Đăng Tuyển Dụng" name="xacnhan" class="btn btn-primary btn_xn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <section class="employer-choose mgt-50">
        <div class="flex-img">
            <div class="image"><img src="Img/3.png" alt="careerbuilder.vn"></div>
        </div>
        <div class="box-content">
            <h2 class="cb-title">Chọn FindJob</h2>
            <div class="content">
                <p>Tại Việt Nam, FindJob đã và đang là lựa chọn của hơn 17.000 doanh nghiệp hàng đầu với các ưu thế:</p>
                <ul>
                    <li>-> Tiếp cận hiệu quả nhiều nguồn ứng viên tiềm năng hơn bất cứ trang tuyển dụng nào ở Việt Nam. Thông tin tuyển dụng được đăng tải rộng rãi trên các trang web lớn: CareerBuilder.vn, Talentnetwork.vn, VieclamIT.vn, VietnamSalary.vn</li>
                    <li>-> Hàng trăm ngàn hồ sơ ứng viên hoàn chỉnh và được cập nhật mới thường xuyên.</li>
                    <li>-> Thu hút ứng viên với các sự kiện quảng bá thương hiệu tuyển dụng.</li>
                    <li>-> Giải pháp kết nối, tuyển dụng và quản lý nhân tài Talent Solution - 200+ khách hàng</li>
                    <li>-> Giải pháp Talent Driver , Targeted Email Marketing , Talent Referral</li>
                </ul>
            </div>
        </div>
    </section>

    <?php include_once './Footer.php' ?>
    <script src="Js/jsHired.js"></script>
</body>

</html>