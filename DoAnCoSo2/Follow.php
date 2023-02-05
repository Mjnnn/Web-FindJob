<?php
include 'Config.php';
include 'ConnectMySQL.php';

$us = '';
$img = '';
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
    $_SESSION['us'] = $_SESSION['username3'];
    $sql = "SELECT * FROM account WHERE `username`='$us' ";
    $sql2 = execute($sql);
    foreach ($sql2 as $value) {
        $img = $value['imgavata'];
    }
    $_SESSION['img2'] = $img;
} else {
    header('location: Login.php');
}

if (isset($_GET['idfl'])) {
    $idfl = $_GET['idfl'];
    $arr = explode('_', $idfl);
    if ($arr[1] == 'cpn') {
        $idcpnn = $arr[0];
        $sqf = "DELETE FROM `followcompany`  WHERE `username` = '$us' AND `idcongty` = '$idcpnn' ";
        $sqf2 = insertA($sqf);
    } else if ($arr[1] == 'bl') {
        $idbll = $arr[0];
        $sqf = "DELETE FROM `followblog`  WHERE `username` = '$us' AND `idblog` = '$idbll' ";
        $sqf2 = insertA($sqf);
    } else if ($arr[1] == 'hr') {
        $idhrr = $arr[0];
        $sqf = "DELETE FROM `followhired`  WHERE `username` = '$us' AND `idcongviec` = '$idhrr' ";
        $sqf2 = insertA($sqf);
    }
    header('location: Follow.php');
}

if ($us != '' && $us != ' ') {
    $sql3 = "SELECT * FROM `followcompany` WHERE `username` = '$us'";
    $sql4 = execute($sql3);
    $sql5 = "SELECT followcompany.idcongty,followcompany.username,tencongty,loaihinhhd,trangthaicty,diachi,tinh_tp,quocgia FROM followcompany,company WHERE followcompany.idcongty = company.idcongty AND company.trangthaichitiet='Chấp Nhận' AND followcompany.username = '$us'";
    $sql6 = execute($sql5);

    $sql7 = "SELECT * FROM `followblog` WHERE `username` = '$us'";
    $sql8 = execute($sql7);
    $sql9 = "SELECT followblog.idblog,followblog.username,titleblog,topicblog,timeblog FROM followblog,blog WHERE followblog.idblog = blog.idblog AND blog.trangthai='Chấp Nhận' AND followblog.username = '$us'";
    $sql10 = execute($sql9);

    $sql11 = "SELECT * FROM `followhired` WHERE `username` = '$us'";
    $sql12 = execute($sql11);
    $sql13 = "SELECT followhired.idcongviec,followhired.username,nganhnghe,theloai,chucdanh,ngaydangky,ngayketthuc FROM followhired,hired WHERE followhired.idcongviec = hired.idcongviec AND hired.trangthai='Chấp Nhận' AND followhired.username = '$us'";
    $sql14 = execute($sql13);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="Css/styleHome.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="Css/styleManager.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Icon Web  -->
    <!-- <link rel="shortcut icon" type="image/webp " href="Img/iconh.webp"> -->
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <title>Danh Sách Theo Dõi</title>
    <script type="text/javascript">
        $(document).ready(function() {
            // $('.tk_nc').click(function() {
            //     $('.item_bs').toggle();
            // });

            $('.searchcpn').keyup(function() {
                var txt = $('.searchcpn').val();
                $.post('FollowCPN.php', {
                    data7: txt
                }, function(data7) {
                    $('.list1').html(data7);

                })
            })

            $('.searchblog').keyup(function() {
                var txt = $('.searchblog').val();
                $.post('FollowBL.php', {
                    data8: txt
                }, function(data8) {
                    $('.list2').html(data8);

                })
            })

            $('.searchhired').keyup(function() {
                var txt = $('.searchhired').val();
                $.post('FollowHR.php', {
                    data9: txt
                }, function(data9) {
                    $('.list3').html(data9);

                })
            })
        });
    </script>
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <div class="">
        <div class="grid poss pdt-100 pdb-50">
            <div class="wide">
                <div class="title_man">
                    <h2><b>Lưu Trữ Theo Dõi:</b></h2>
                </div>
                <div class="content_man mgt-30 mgl-45">
                    <div class="company">
                        <div class="titlee tl_company fl_xx">
                            <h4 class="animate__animated animate__fadeInLeft"><i class="fa-solid fa-building"></i> Công ty đáng chú ý(<?= count($sql4) ?>)</h4>
                            <form class="form_man" method="POST">
                                <span class="iconn"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="searchcpn" placeholder="Nhập từ khóa tìm kiếm" class="searchcpn">
                            </form>
                        </div>
                        <div class="list_company job-list list1 " id="list__jobs">
                            <?php
                            if (count($sql6)) {
                                for ($i = 0; $i < count($sql6); $i++) {  ?>
                                    <div class="row-recent1">
                                        <div class="row-recent-container " style="justify-content: space-between;">
                                            <!-- row-item -->
                                            <div class="row-item">
                                                <div class="name-job">
                                                    <h2 class="name shortt"><?= $sql6[$i]['tencongty'] ?></h2>
                                                    <div class="level">
                                                        <span class="sp-level"><?= $sql6[$i]['loaihinhhd'] ?></span>
                                                    </div>

                                                </div>

                                                <div class="address-job">
                                                    <div class="company">
                                                        <i class="ti-layers-alt"></i>
                                                        <a href="" class="company-name"><?= $sql6[$i]['trangthaicty'] ?></a>
                                                    </div>

                                                    <div class="address">
                                                        <i class="ti-location-pin"></i>
                                                        <span class="name-address"><?= $sql6[$i]['diachi'] . ',' . $sql6[$i]['tinh_tp'] . ',' . $sql6[$i]['quocgia'] ?></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- apply -->
                                            <div class="apply">
                                                <a href="CompanyDetail.php?idcompany=<?= $sql6[$i]['idcongty'] ?>" class="apply-job">Xem Chi Tiết</a>
                                                <div class="mgt-10">
                                                    <a href="Follow.php?idfl=<?= $sql6[$i]['idcongty'] ?>_cpn" class="un_fl">Bỏ theo dõi</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php   }
                            } else { ?>
                                <div class="text-center mgt-25">
                                    <div class="">
                                        Bạn chưa theo dõi công ty nào với thông tin tìm kiếm này... <a href="Company.php">Xem công ty</a>
                                    </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>

                    <!----------------- Blog---------- -->
                    <div class="blogg mgt-30">
                        <div class="titlee tl_company fl_xx">
                            <h4 class="animate__animated animate__fadeInLeft"><i class="fa-solid fa-blog"></i> Blog đáng chú ý(<?= count($sql8) ?>)</h4>
                            <form class="form_man" method="POST">
                                <span class="iconn"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="searchblog" placeholder="Nhập từ khóa tìm kiếm" class="searchblog">
                            </form>
                        </div>
                        <div class="list_company job-list list2 " id="list__jobs">
                            <?php
                            if (count($sql10)) {
                                for ($i = 0; $i < count($sql10); $i++) {  ?>
                                    <div class="row-recent1">
                                        <div class="row-recent-container " style="justify-content: space-between;">
                                            <!-- row-item -->
                                            <div class="row-item">
                                                <div class="name-job">
                                                    <h2 class="name shortt"><?= $sql10[$i]['titleblog'] ?></h2>
                                                    <div class="level">
                                                        <span class="sp-level"><?= $sql10[$i]['topicblog'] ?></span>
                                                    </div>

                                                </div>

                                                <div class="address-job">
                                                    <div class="company">
                                                        <i class="ti-layers-alt"></i>
                                                        <a href="" class="company-name">Ngày đăng tải: <?= $sql10[$i]['timeblog'] ?></a>
                                                    </div>



                                                </div>
                                            </div>
                                            <!-- apply -->
                                            <div class="apply">
                                                <a href="BlogPost.php?id=<?= $sql10[$i]['idblog'] ?>" class="apply-job">Xem Chi Tiết</a>
                                                <div class="mgt-10">
                                                    <a href="Follow.php?idfl=<?= $sql10[$i]['idblog'] ?>_bl" class="un_fl">Bỏ theo dõi</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php   }
                            } else { ?>
                                <div class="text-center mgt-25">
                                    <div class="">
                                        Bạn chưa theo dõi blog nào với thông tin tìm kiếm này... <a href="Blog.php">Xem các blog</a>
                                    </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>

                    <!----------------- hiredddd--------- -->
                    <div class="blogg mgt-30">
                        <div class="titlee tl_company fl_xx">
                            <h4 class="animate__animated animate__fadeInLeft"><i class="fa-solid fa-briefcase"></i> Công việc đáng chú ý(<?= count($sql12) ?>)</h4>
                            <form class="form_man" method="POST">
                                <span class="iconn"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="searchhired" placeholder="Nhập từ khóa tìm kiếm" class="searchhired">
                            </form>
                        </div>
                        <div class="list_company job-list list3" id="list__jobs">
                            <?php
                            if (count($sql14)) {
                                for ($i = 0; $i < count($sql14); $i++) {  ?>
                                    <div class="row-recent1">
                                        <div class="row-recent-container " style="justify-content: space-between;">
                                            <!-- row-item -->
                                            <div class="row-item">
                                                <div class="name-job">
                                                    <h2 class="name shortt"><?= $sql14[$i]['nganhnghe'] ?></h2>
                                                    <div class="level">
                                                        <span class="sp-level"><?= $sql14[$i]['theloai'] ?></span>
                                                    </div>

                                                </div>

                                                <div class="address-job">
                                                    <div class="company">
                                                        <i class="fa-solid fa-bookmark"></i>
                                                        <a class="company-name">Chức danh: <?= $sql14[$i]['chucdanh'] ?></a>
                                                    </div>
                                                    <div class="company">
                                                        <i class="ti-layers-alt"></i>
                                                        <a href="" class="company-name">Ngày đăng tuyển: <?= $sql14[$i]['ngaydangky'] ?> - Ngày kết thúc: <?= $sql14[$i]['ngayketthuc'] ?></a>
                                                    </div>



                                                </div>
                                            </div>
                                            <!-- apply -->
                                            <div class="apply">
                                                <a href="JobDetail.php?idcvv=<?= $sql14[$i]['idcongviec'] ?>" class="apply-job">Xem Chi Tiết</a>
                                                <div class="mgt-10">
                                                    <a href="Follow.php?idfl=<?= $sql14[$i]['idcongviec'] ?>_hr" class="un_fl">Bỏ theo dõi</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php   }
                            } else { ?>
                                <div class="text-center mgt-25">
                                    <div class="">
                                        Bạn chưa theo dõi công việc nào với thông tin tìm kiếm này... <a href="Search.php">Xem danh sách tuyển dụng</a>
                                    </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once './Footer.php' ?>

    <!-- rereal web element on scroll -->
    <script type="text/javascript">
        window.addEventListener('scroll', reveal);

        function reveal() {
            var reveals = document.querySelectorAll('.reveal');

            for (var i = 0; i < reveals.length; i++) {

                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add('active');
                } else {
                    reveals[i].classList.remove('active');
                }
            }
        }
    </script>
    <!--  -->
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            var bgPattern = document.getElementById("bg")
            window.addEventListener("scroll", function() {
                bgPattern.style.backgroundPosition = +window.pageXOffset + "px";
            })
        })
    </script>

    <!-- <script src="js/pagingHome.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>