<?php
include 'ConnectMySQL.php';
include 'Config.php';
$us = '';
$passus = '';
$imgus = '';

if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
    $sql = "SELECT * FROM account WHERE `username`='$us' ";
    $sql2 = execute($sql);
    foreach ($sql2 as $value) {
        $img = $value['imgavata'];
        $passus = $value['password'];
    }
    $_SESSION['img2'] = $img;
    $imgus = $img;
} else {
    header('location: Login.php');
}
$mess1 = '';
$mess2 = '';
$mess3 = '';
$mess4 = '';
$mess5 = '';
$mess6 = '';
$oldpass = '';
$newpass = '';
$confignewpass = '';
if (isset($_POST['changepass'])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confignewpass = $_POST['confignewpass'];
    if ($oldpass == '') {
        $mess1 = 'Vui lòng nhập mật khẩu cũ của bạn';
    } else {
        if ($oldpass != $passus) {
            $mess2 = 'Mật khẩu không chính xác';
        }
    }
    if ($newpass == '') {
        $mess3 = 'Vui lòng nhập mật khẩu mới';
    } else {
        if (strlen($newpass) < 7) {
            $mess4 = 'Mật khẩu phải quá 7 ký tự';
        }
    }
    if ($confignewpass == '') {
        $mess5 = 'Vui lòng nhập lại mật khẩu';
    } else {
        if ($confignewpass != $newpass) {
            $mess6 = 'Mật khẩu bạn nhập không khớp';
        }
    }
    if ($mess1 == '' && $mess2 == '' && $mess4 == '' && $mess5 == '' && $mess6 == '' && $mess3 == '') {
        $sqxl = "UPDATE `account` SET `password` = '$newpass' WHERE `username` = '$us'";
        $sqxl2 = insertA($sqxl);
        if ($sqxl) {
            header('location: index.php');
        } else {
            echo '<script language="javascript">
            alert("Thay đổi không thành công, vui lòng kiểm tra lại!!!");
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
    <!-- Library  -->
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="Css/ChangePass.css">
    <title>Thay đổi mật khẩu</title>
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
        <div class="mgt-135 mgb-80">
            <div class="wide">
                <div class="title_changepass mgb-30">
                    <h2><i class="fa-solid fa-unlock"></i> Thay đổi mật khẩu</h2>

                </div>
                <div class="mw-800 fll">
                    <div class="img_uss">
                        <div>
                            <img src="Img/<?= $imgus ?>" alt="" class="img_pa">
                        </div>

                    </div>
                    <div class="form_us">
                        <form action="" method="POST" class="form_pass">
                            <div>
                                <input type="password" placeholder="Nhập mật khẩu cũ của bạn..." name="oldpass" class="ipp">
                                <p class="mgb-25"> <?php
                                                    if ($mess1 != '') {
                                                        echo $mess1;
                                                    } else if ($mess2 != '') {
                                                        echo $mess2;
                                                    }
                                                    ?></p>
                            </div>
                            <div>
                                <input type="password" placeholder="Nhập mật khẩu mới..." name="newpass" class="ipp">
                                <p class="mgb-25"> <?php
                                                    if ($mess3 != '') {
                                                        echo $mess3;
                                                    } else if ($mess4 != '') {
                                                        echo $mess4;
                                                    }
                                                    ?></p>
                            </div>
                            <div>
                                <input type="password" placeholder="Nhập mật lại khẩu mới..." name="confignewpass" class="ipp">
                                <p class="mgb-25"> <?php
                                                    if ($mess5 != '') {
                                                        echo $mess5;
                                                    } else if ($mess6 != '') {
                                                        echo $mess6;
                                                    }
                                                    ?></p>
                            </div>
                            <div>
                                <input type="submit" name="changepass" value="Thay Đổi" class="btn btn-primary sbm">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <?php include_once './Footer.php' ?>

</body>

</html>