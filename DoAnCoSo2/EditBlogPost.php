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
} else {
    header('location: Login.php');
}

$tt = '';
$ct = '';
$tl = '';
$ig = '';

if (isset($_GET['idblogg'])) {
    $idblogg = $_GET['idblogg'];
    $sql3 = "SELECT * FROM `blog` WHERE `idblog` = '$idblogg'";
    $sql4 = execute($sql3);
    foreach ($sql4 as $value) {
        $tt = $value['titleblog'];
        $ct = $value['contentblog'];
        $tl = $value['topicblog'];
        $ig = $value['imgblog'];
    }
} else {
    header('location: ../Admin/404-web.html');
}

$titleblog = '';
$contentblog = '';
$chosetlblog = '';
$choseimgblog = '';

$mess1 = '';
$mess2 = '';
$mess3 = '';
$mess4 = '';
$timedk = getDate();
$timedk2 = $timedk["year"] . "-" . $timedk["mon"] . "-" . $timedk["mday"];
if (isset($_POST['dangtai'])) {
    $titleblog = $_POST['titleblog'];
    $contentblog = $_POST['contentblog'];
    $chosetlblog = $_POST['chosetlblog'];
    $choseimgblog = $_POST['choseimgblog'];
    if ($titleblog == '' || $titleblog == ' ') {
        $mess1 = 'Vui lòng nhập tiêu đề của blog';
    }
    if ($contentblog == '' || $contentblog == ' ') {
        $mess2 = 'Vui lòng nhập nội dung của blog';
    }
    if ($chosetlblog == 0 || $chosetlblog == '0') {
        $chosetlblog = $tl;
    }
    if ($choseimgblog == '' || $choseimgblog == ' ') {
        $choseimgblog = $ig;
    }
    if ($mess1 == '' && $mess2 == '' && $mess3 == '') {
        // $sql = "INSERT INTO `blog` (`username`,`titleblog`,`contentblog`,`imgblog`,`timeblog`,`topicblog`,`trangthai`) VALUES
        // ('$us','$titleblog','$contentblog','$choseimgblog','$timedk2','$chosetlblog','Đang Chờ Xác Nhận')";
        $sql = "UPDATE `blog` SET `titleblog`= '$titleblog', `contentblog`='$contentblog', `imgblog`='$choseimgblog', `timeblog` = '$timedk2',`topicblog` = '$chosetlblog', `trangthai` = 'Đang Chờ Xác Nhận' WHERE `idblog`='$idblogg'  ";
        $sql2 = insertA($sql);
        if ($sql2) {
            echo '<script language="javascript">
                alert("Cập nhật Blog Thành Công!!!");
            </script>';
            header('location: Manager.php');
        } else {
            echo '<script language="javascript">
            alert("Cập nhật Blog Thất bại, Vui lòng kiểm tra lại!!!");
        </script>';
        }
    }
    // } else {
    //     echo '<script language="javascript">
    //     alert("Đăng Tải Blog thất bại, vui lòng điền đủ thông tin!!!");
    // </script>';
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/stylePostBlog.css">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <title><?= $tt ?></title>
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <div class="grid">
        <div class="wide pd-112 mgt-30">
            <div class="title centerr mgb-50">
                <h1>Cập nhật Blog Của Bạn</h1>
            </div>
            <form class="row form_blog" method="post">
                <div class="img_blogg l-4 m-4 c-12" style="margin: 0px !important;">
                    <img src="Img/<?= $ig ?>" alt="" class="img-fluid">
                    <div class="upload_file mgt-35">
                        <div class="change-photo-btn">
                            <span><i class="fa fa-upload"></i> Cập nhật lại ảnh blog</span>
                            <input type="file" class="upload" name="choseimgblog">
                        </div>
                    </div>
                </div>
                <div class="content_blogg l-8 pd-tr-50 m-8 c-12">
                    <div class="centerr">
                        <input type="text" placeholder="Tiêu đề của Blog..." class="ip" name="titleblog" value="<?php echo $tt ?>">
                        <div class="form-error"><?php echo $mess1 ?></div>
                        <div></div>
                        <textarea id="" cols="50" rows="5" placeholder="Nội Dung Blog..." class="" name="contentblog"><?php echo $ct ?></textarea>
                        <div class="form-error mgb-15"><?php echo $mess2 ?></div>
                        <div class="mgb-15"></div>
                    </div>

                    <div class="fle_xx ">
                        <select id="" class="type_blog" name="chosetlblog" value="<?= $tl ?>">
                            <option value="0">Chọn thể loại...</option>
                            <script language="javascript">
                                var states = new Array("Hướng Nghiệp", "Kinh Nghiệm Phỏng vấn", "Mẹo Công Sở", "Thực Chiến", "Góc Chuyên Gia", "Bí Quyết Tìm Việc", "Khác...");
                                for (var hi = 0; hi < states.length; hi++)
                                    document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                            </script>
                        </select>
                        <div class="form-error"><?php echo  $mess3 ?></div>

                    </div>
                    <div class="centerr mgt-30">
                        <input type="submit" value="Cập Nhật" class="btn btn-primary btn_sub" name="dangtai">
                    </div>
                </div>

            </form>
        </div>

    </div>
    <?php include_once './Footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>