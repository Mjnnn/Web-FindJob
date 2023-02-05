<?php
include 'Config.php';
include 'ConnectMySQL.php';

$us = '';
$email = '';
$sdt = '';
$time = '';
$img = '';
$pass = '';
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
    $sql = "SELECT * FROM account WHERE `username`='$us' ";
    $sql2 = execute($sql);
    foreach ($sql2 as $value) {
        $img = $value['imgavata'];
        $email = $value['email'];
        $sdt = $value['phonenumber'];
        $time = $value['ngaydangky'];
        $pass = $value['password'];
    }
    $_SESSION['img2'] = $img;
} else {
    header('location: Login.php');
}

function emailValid($email)
{
    return (bool)preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}
$us2 = '';
$email2 = '';
$sdt2 = '';
$time2 = '';
$img2 = '';
$mess3 = '';
$mess5 = '';
if (isset($_POST['xacnhan'])) {
    if (isset($_POST['username2'])) {
        $us2 = $_POST['username2'];
    }
    if (isset($_POST['email2'])) {
        $email2 = $_POST['email2'];
    }
    if (isset($_POST['phonenumber2'])) {
        $sdt2 = $_POST['phonenumber2'];
    }
    if (isset($_POST['img2'])) {
        $img2 = $_POST['img2'];
    }
    if ($us2 == '' || $us2 == ' ') {
        $us2 = $us;
    }
    if ($email2 == '' || $email2 == ' ') {
        $email2 = $email;
    } else {
        if (!emailValid($email2)) {
            $mess3 = "Email không hợp lệ, vui lòng thử lại";
        }
    }

    if ($sdt2 == '' || $sdt2 == ' ') {
        $sdt2 = $sdt;
    } else {
        if (strlen($sdt2) < 10) {
            $mess5 = 'Số điện thoại phải tối thiêu 10 số !!!';
        }
    }

    if ($mess3 == '' && $mess5 == '') {
        if ($img2 == '' || $img2 == ' ') {
            $sql5 = "UPDATE `account` SET `username`='$us2',`email` = '$email2',`phonenumber`='$sdt2' WHERE `username` = '$us' ";
            $sql6 = insertA($sql5);
            if ($sql6) {
                echo '<script language="javascript">
                alert("Cập nhật thành công!!!");
            </script>';
                $_SESSION['username3'] = $us2;
                header('location: Profile.php');
            } else {
                echo '<script language="javascript">
                alert("Cập nhật không thành công, vui lòng kiểm tra lại!!!");
            </script>';
            }
        } else {
            $sql5 = "UPDATE `account` SET `username`='$us2',`email` = '$email2',`phonenumber`='$sdt2',`imgavata`='$img2' WHERE  `username` = '$us' ";
            $sql6 = insertA($sql5);
            if ($sql6) {
                echo '<script language="javascript">
                alert("Cập nhật thành công!!!");
            </script>';
                $_SESSION['username3'] = $us2;
                header('location: Profile.php');
            } else {
                echo '<script language="javascript">
                alert("Cập nhật không thành công, vui lòng kiểm tra lại!!!");
            </script>';
            }
        }
    } else {
        echo '<script language="javascript">
        alert("Cập nhật không thành công, vui lòng kiểm tra lại!!!");
    </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/styleProfile.css">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Hồ sơ của bạn</title>
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <div class="pdt-100 pdb-50">
        <div class="grid ">
            <div class="wide">
                <div class="profile">
                    <form action="" method="POST">
                        <div class="fl_x pd-25">
                            <div class="img_upload pdr-25">
                                <div class="img_pro">
                                    <img src="Img/<?= $img ?>" alt="">
                                </div>
                                <div class="upload_file">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Cập nhật lại avatar</span>
                                        <input type="file" class="upload" name="img2">
                                    </div>
                                </div>
                            </div>
                            <div class="profile_us pdl-25 ps-rl">
                                <div class="form_pro">
                                    <div class="mgt-10">
                                        <span><i class="fa-solid fa-user"></i></span>
                                        <input type="text" value="<?= $us ?>" disabled="disabled" name="username2" class="ip1">
                                        <a class="updatee a1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <div class="mgt-15">
                                        <span><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" value="<?= $email ?>" disabled="disabled" name="email2" class="ip2">
                                        <a class="updatee a2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <div class="mgt-15">
                                        <span><i class="fa-solid fa-phone"></i></span>
                                        <input type="text" value="<?= $sdt ?>" disabled="disabled" name="phonenumber2" class="ip3">
                                        <a class="updatee a3"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>

                                    <div class="mgt-15">
                                        <span><i class="fa-solid fa-calendar-days"></i></span>
                                        <label class="mgl-5">Tham gia vào: <?= $time ?></label>
                                    </div>
                                    <div class="ps-ab-sm">
                                        <input type="submit" value="Cập Nhật" name="xacnhan" class="btn btn-primary">
                                    </div>

                                </div>

                            </div>

                        </div>
                    </form>

                </div>

                <div class="profile detail mgt-50">
                    <div class="mh-300 pd-25 ps-rl">
                        <div class="title_pro mgl-20">
                            <h2>CV của tôi</h2>
                        </div>
                        <div class="content_cv">

                            <div class="">
                                <div class="ps-ab pd-25 none_cv">
                                    <h6>Bạn chưa tạo CV cho hồ sơ của mình <a href="MyCV.php">Tạo CV Ngay</a> </h6>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php include_once './Footer.php' ?>
    <script>
        $('.a1').click(function() {
            $('.ip1').removeAttr('disabled')
        })
        $('.a2').click(function() {
            $('.ip2').removeAttr('disabled')
        })
        $('.a3').click(function() {
            $('.ip3').removeAttr('disabled')
        })
    </script>
</body>

</html>