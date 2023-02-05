<?php
include 'Config.php';
include 'ConnectMySQL.php';

$us = '';
$email = '';
$sdt = '';
$time = '';
$img = '';
$pass = '';
$img3 = '';

$countt1 = 0;
$countt2 = 0;

if (isset($_GET['iduse'])) {
    $iduse = $_GET['iduse'];
    $sql3 = "SELECT * FROM account WHERE `username`='$iduse' ";
    $sql4 = execute($sql3);
    $sql5 = "SELECT * FROM company WHERE `username` = '$iduse' AND `trangthaichitiet`= 'Chấp Nhận'";
    $sql6 = execute($sql5);
    $countt1 = count($sql6);
    $sql7 = "SELECT * FROM blog WHERE `username` = '$iduse' AND `trangthai` = 'Chấp Nhận'";
    $sql8 = execute($sql7);
    $countt2 = count($sql8);
    foreach ($sql4 as $value) {
        $img3 = $value['imgavata'];
        $email = $value['email'];
        $sdt = $value['phonenumber'];
        $time = $value['ngaydangky'];
        $pass = $value['password'];
    }
} else {
    header('location: ../Admin/404-web.html');
}

if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
    $sql = "SELECT * FROM account WHERE `username`='$us' ";
    $sql2 = execute($sql);
    foreach ($sql2 as $value) {
        $img = $value['imgavata'];
        // $email = $value['email'];
        // $sdt = $value['phonenumber'];
        // $time = $value['ngaydangky'];
        // $pass = $value['password'];
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
    <title>Hồ sơ của <?= $iduse ?></title>
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
                                    <img src="Img/<?= $img3 ?>" alt="">
                                </div>
                                <div class="upload_file">
                                    <!-- <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Cập nhật lại avatar</span>
                                        <input type="file" class="upload" name="img2">
                                    </div> -->
                                </div>
                            </div>
                            <div class="profile_us pdl-25 ps-rl">
                                <div class="form_pro">
                                    <div class="mgt-10">
                                        <span><i class="fa-solid fa-user"></i></span>
                                        <input type="text" value="<?= $iduse ?>" disabled="disabled" name="username2" class="ip1">
                                        <!-- <a class="updatee a1"><i class="fa-solid fa-pen-to-square"></i></a> -->
                                    </div>
                                    <div class="mgt-15">
                                        <span><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" value="<?= $email ?>" disabled="disabled" name="email2" class="ip2">
                                        <!-- <a class="updatee a2"><i class="fa-solid fa-pen-to-square"></i></a> -->
                                    </div>
                                    <div class="mgt-15">
                                        <span><i class="fa-solid fa-phone"></i></span>
                                        <input type="text" value="<?= $sdt ?>" disabled="disabled" name="phonenumber2" class="ip3">
                                        <!-- <a class="updatee a3"><i class="fa-solid fa-pen-to-square"></i></a> -->
                                    </div>

                                    <div class="mgt-15">
                                        <span><i class="fa-solid fa-calendar-days"></i></span>
                                        <label class="mgl-5">Tham gia vào: <?= $time ?></label>
                                    </div>
                                    <!-- <div class="ps-ab-sm">
                                        <input type="submit" value="Cập Nhật" name="xacnhan" class="btn btn-primary">
                                    </div> -->

                                </div>

                            </div>

                        </div>
                    </form>

                </div>

                <div class="profile detail mgt-50">
                    <div class="mh-300 pd-25 ps-rl">
                        <div class="title_pro mgl-20">
                            <h2>Một số thông tin khác</h2>
                        </div>
                        <div class="content_cv  mgl-20 mgt-30">
                            <div class="">
                                <div class="">
                                    <h4><i class="fa-solid fa-building"></i> Công Ty của <?= $iduse ?> </h4>
                                    <div class="mgt-15 list_cpn">
                                        <?php if ($countt1) {
                                            for ($i = 0; $i < count($sql6); $i++) {
                                        ?>
                                                <div class="mgb-10 cpn_a">+ <a href="CompanyDetail.php?idcompany=<?= $sql6[$i]['idcongty'] ?>"><?= $sql6[$i]['tencongty'] ?></a></div>
                                            <?php  }
                                        } else { ?>
                                            <div class="erro_cpn"> <?= $iduse ?> chưa đăng kỹ công ty nào...</div>
                                        <?php  } ?>
                                    </div>
                                </div>
                                <div class="mgt-25">
                                    <h4><i class="fa-solid fa-blog"></i> Blog của <?= $iduse ?> </h4>
                                    <div class="mgt-15 list_cpn">
                                        <?php if ($countt2) {
                                            for ($i = 0; $i < count($sql8); $i++) {
                                        ?>
                                                <div class="mgb-10 cpn_a">+ <a href="BlogPost.php?id=<?= $sql8[$i]['idblog'] ?>"><?= $sql8[$i]['titleblog'] ?></a></div>
                                            <?php  }
                                        } else { ?>
                                            <div class="erro_cpn"> <?= $iduse ?> chưa đăng tải blog nào...</div>
                                        <?php  } ?>
                                    </div>
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