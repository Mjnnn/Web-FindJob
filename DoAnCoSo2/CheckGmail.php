<?php
include  "Config.php";
include  "ConnectMySQL.php";
if (isset($_SESSION['username'])) {
    $username2 = $_SESSION['username'];
    $password2 = $_SESSION['password'];
    $phonenumber2 = $_SESSION['phonenumber'];
    $email2 = $_SESSION['email'];
    $code2 = $_SESSION['code'];
} else {
    header('location: ../Admin/404-web.html');
}
$code = '';
$error_mess = '';
$timedk = getDate();
$timedk2 = $timedk["year"] . "-" . $timedk["mon"] . "-" . $timedk["mday"];

if (isset($_POST['xacnhan'])) {
    $code = $_POST['code'];
    if ($code != $code2) {
        $error_mess = "Mã xác minh không chính xác";
    } else {
        $sql = "INSERT INTO `account` (`username`,`password`,`phonenumber`,`email`,`imgavata`,`historysearch`,`ngaydangky`,`vaitro`,`lido`) VALUES 
        ('$username2','$password2','$phonenumber2','$email2','acc.png','','$timedk2','Khách Hàng','')
        ";
        $resul = insertA($sql);
        if ($resul) {
            echo '<script language="javascript">
            alert("Đăng Ký Thành Công!!!");
        </script>';
            $_SESSION['username3'] = $username2;
            header('location: index.php');
        } else {
            echo '<script language="javascript">
            alert("Đăng ký không thành công, vui lòng kiểm tra lại!!!");
        </script>';
        }
    }
}
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css  -->
    <link rel="stylesheet" href="Css/styleCheckGmail.css">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <title>Xác Minh Gmail</title>
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <div class="grid">
        <div class="wide pd-112">
            <div class="form_check center animate__animated  animate__zoomIn">
                <div class="title_check">
                    <h4><i class="fa-solid fa-envelope-circle-check"></i>Xác Minh Gmail</h4>
                </div>
                <form class="body_check" method="POST" action="#">
                    <input type="text" placeholder="Nhập Mã Xác Minh..." class="a1" name="code">
                    <span class="error_confirm_password"> <?= $error_mess ?></span>
                    <div class="sub_close">
                        <button type="button" class="btn btn-secondary"><a href="SignIn.php">Quay Lại</a></button>
                        <input type="submit" value="Xác Nhận" name="xacnhan" class="btn btn-primary">
                    </div>
                </form>

            </div>

        </div>

    </div>
    <?php include_once './Footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>