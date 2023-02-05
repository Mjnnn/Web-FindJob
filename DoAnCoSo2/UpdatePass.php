<?php
include 'ConnectMySQL.php';
include 'Config.php';
$password2 = '';
$config_password2 = '';
$error_mess1 = '';
$error_mess2 = '';
$error_mess3 = '';
$error_mess4 = '';

if (isset($_SESSION['email2'])) {
    if (isset($_POST['xacnhan'])) {
        $email2 = $_SESSION['email2'];
        $password2 = $_POST['password2'];
        $config_password2 = $_POST['config_password2'];
        if ($password2 == '' || $password2 == ' ') {
            $error_mess1 = 'Vui lòng nhập mật khẩu mới';
        } else {
            if (strlen($password2) < 6) {
                $error_mess2 = "Mật khẩu phải dài hơn 6 ký tự";
            }
        }
        if ($config_password2 != $password2) {
            $error_mess4 = "Mật khẩu không khớp";
        }

        if ($error_mess1 == '' &&  $error_mess2 == '' && $error_mess3 == '' && $error_mess4 == '') {
            $sql = "UPDATE account  SET `password`='$password2' WHERE `email`='$email2'";
            $sql2 = insertA($sql);
            if ($sql2) {
                echo '<script language="javascript">
                alert("Cập nhật mật khẩu thành công!!!");
            </script>';
                header('location: Login.php');
            } else {
                echo '<script language="javascript">
                alert("Cập nhật mật khẩu không thành công, Vui lòng kiểm tra lại!!!");
            </script>';
            }
        }
    }
} else {
    header('location: ../Admin/404-web.html');
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
    <link rel="stylesheet" href="Css/styleUpdatePass.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Mật Khẩu</title>
    <!-- Icon Web -->
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
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
                    <h4><i class="fa-solid fa-unlock-keyhole"></i>Đổi Mật Khẩu</h4>
                </div>
                <form class="body_check" method="POST" action="#">
                    <div class="pd-15">
                        <input type="password" placeholder="Nhập mật khẩu mới..." class="a1" name="password2" value="<?= $password2 ?>">
                        <span class="error_confirm_password"> <?php
                                                                if ($error_mess1 != '') {
                                                                    echo $error_mess1;
                                                                }
                                                                if ($error_mess2 != '') {
                                                                    echo $error_mess2;
                                                                }
                                                                ?></span>
                    </div>
                    <div>
                        <input type="password" placeholder="Xác nhận mật khẩu..." class="a1" name="config_password2" value="<?= $config_password2 ?>">
                        <span class="error_confirm_password"><?php
                                                                if ($error_mess3 != '') {
                                                                    echo $error_mess3;
                                                                }
                                                                if ($error_mess4 != '') {
                                                                    echo $error_mess4;
                                                                }
                                                                ?></span>
                    </div>
                    <div class="sub_close">
                        <button type="button" class="btn btn-secondary"><a href="Login.php">Quay Lại</a></button>
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