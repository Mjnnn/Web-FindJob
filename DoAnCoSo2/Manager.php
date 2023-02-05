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
    header('location: ../Admin/404-web.html');
}



if ($us != '' && $us != ' ') {
    $sql3 = "SELECT * FROM `company` WHERE `username` = '$us' AND `trangthaichitiet` = 'Chấp Nhận'";
    $sql4 = execute($sql3);

    $sql5 = "SELECT * FROM `blog` WHERE `username` = '$us' AND `trangthai` = 'Chấp Nhận'";
    $sql6 = execute($sql5);

    $sql7 = "SELECT * FROM `hired` WHERE `username` = '$us' AND `trangthai` = 'Chấp Nhận'";
    $sql8 = execute($sql7);
}

if (isset($_GET['idmn'])) {
    $di = $_GET['idmn'];
    $arr = explode('_', $di);
    if ($arr[0] == 'dlt') {
        if ($arr[2] == 'cpn') {
            $sqvl = "DELETE FROM `company` WHERE `idcongty`='$arr[1]'";
            $sqvl2 = insertA($sqvl);
            $sqvl3 = "DELETE FROM `hired` WHERE `idcongty`='$arr[1]'";
            $sqvl4 = insertA($sqvl3);
        } else if ($arr[2] == 'bl') {
            $sqvl = "DELETE FROM `blog` WHERE `idblog`='$arr[1]'";
            $sqvl2 = insertA($sqvl);
        } else if ($arr[2] == 'hd') {
            $sqvl = "DELETE FROM `hired` WHERE `idcongviec`='$arr[1]'";
            $sqvl2 = insertA($sqvl);
        }
        header('location: Manager.php');
    } else if ($arr[0] == 'edt') {
    }
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
    <title>Quản Lí</title>
    <script type="text/javascript">
        $(document).ready(function() {
            // $('.tk_nc').click(function() {
            //     $('.item_bs').toggle();
            // });

            $('.searchcpn').keyup(function() {
                var txt = $('.searchcpn').val();
                $.post('SearchDetailCPN.php', {
                    data4: txt
                }, function(data4) {
                    $('.list1').html(data4);

                })
            })

            $('.searchblog').keyup(function() {
                var txt = $('.searchblog').val();
                $.post('SearchDetailBL.php', {
                    data5: txt
                }, function(data5) {
                    $('.list2').html(data5);

                })
            })

            $('.searchhired').keyup(function() {
                var txt = $('.searchhired').val();
                $.post('SearchDetailHR.php', {
                    data6: txt
                }, function(data6) {
                    $('.list3').html(data6);

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
                    <h2><b>Dữ Liệu Của Tôi:</b></h2>
                </div>
                <div class="content_man mgt-30 mgl-45">
                    <div class="company">
                        <div class="titlee tl_company fl_xx">
                            <h4 class="animate__animated animate__fadeInLeft"><i class="fa-solid fa-building"></i> Công ty của tôi(<?= count($sql4) ?>)</h4>
                            <form class="form_man" method="POST">
                                <span class="iconn"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="searchcpn" placeholder="Nhập từ khóa tìm kiếm" class="searchcpn">
                            </form>
                        </div>
                        <div class="list_company job-list list1 " id="list__jobs">
                            <?php
                            if (count($sql4)) {
                                for ($i = 0; $i < count($sql4); $i++) {  ?>
                                    <div class="row-recent1">
                                        <div class="row-recent-container " style="justify-content: space-between;">
                                            <!-- row-item -->
                                            <div class="row-item">
                                                <div class="name-job">
                                                    <h2 class="name shortt"><?= $sql4[$i]['tencongty'] ?></h2>
                                                    <div class="level">
                                                        <span class="sp-level"><?= $sql4[$i]['loaihinhhd'] ?></span>
                                                    </div>

                                                </div>

                                                <div class="address-job">
                                                    <div class="company">
                                                        <i class="ti-layers-alt"></i>
                                                        <a href="" class="company-name"><?= $sql4[$i]['trangthaicty'] ?></a>
                                                    </div>

                                                    <div class="address">
                                                        <i class="ti-location-pin"></i>
                                                        <span class="name-address"><?= $sql4[$i]['diachi'] . ',' . $sql4[$i]['tinh_tp'] . ',' . $sql4[$i]['quocgia'] ?></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- apply -->
                                            <div class="apply">
                                                <a href="CompanyDetail.php?idcompany=<?= $sql4[$i]['idcongty'] ?>" class="apply-job">Xem Chi Tiết</a>
                                                <div class="mgt-10">
                                                    <a href="Manager.php?idmn=edt_<?= $sql4[$i]['idcongty'] ?>_cpn" class="editt"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="Manager.php?idmn=dlt_<?= $sql4[$i]['idcongty'] ?>_cpn" class="deletee" onclick="return confirm('Bạn Muốn Xóa Công Ty: `<?= $sql4[$i]['tencongty']  ?>`')"><i class="fa-solid fa-trash"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php   }
                            } else { ?>
                                <div class="text-center mgt-25">
                                    <div class="">
                                        Bạn chưa đăng ký công ty nào... <a href="ConnectCompany.php">Đăng ký</a>
                                    </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>

                    <!----------------- Blog---------- -->
                    <div class="blogg mgt-30">
                        <div class="titlee tl_company fl_xx">
                            <h4 class="animate__animated animate__fadeInLeft"><i class="fa-solid fa-blog"></i> Blog của tôi(<?= count($sql6) ?>)</h4>
                            <form class="form_man" method="POST">
                                <span class="iconn"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="searchblog" placeholder="Nhập từ khóa tìm kiếm" class="searchblog">
                            </form>
                        </div>
                        <div class="list_company job-list list2 " id="list__jobs">
                            <?php
                            if (count($sql6)) {
                                for ($i = 0; $i < count($sql6); $i++) {  ?>
                                    <div class="row-recent1">
                                        <div class="row-recent-container " style="justify-content: space-between;">
                                            <!-- row-item -->
                                            <div class="row-item">
                                                <div class="name-job">
                                                    <h2 class="name shortt"><?= $sql6[$i]['titleblog'] ?></h2>
                                                    <div class="level">
                                                        <span class="sp-level"><?= $sql6[$i]['topicblog'] ?></span>
                                                    </div>

                                                </div>

                                                <div class="address-job">
                                                    <div class="company">
                                                        <i class="ti-layers-alt"></i>
                                                        <a href="" class="company-name">Ngày đăng tải: <?= $sql6[$i]['timeblog'] ?></a>
                                                    </div>



                                                </div>
                                            </div>
                                            <!-- apply -->
                                            <div class="apply">
                                                <a href="BlogPost.php?id=<?= $sql6[$i]['idblog'] ?>" class="apply-job">Xem Chi Tiết</a>
                                                <div class="mgt-10">
                                                    <a href="EditBlogPost.php?idblogg=<?= $sql6[$i]['idblog'] ?>" class="editt"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="Manager.php?idmn=dlt_<?= $sql6[$i]['idblog'] ?>_bl" class="deletee" onclick="return confirm('Bạn Muốn Xóa Blog: `<?= $sql6[$i]['titleblog']  ?>`')"><i class="fa-solid fa-trash"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php   }
                            } else { ?>
                                <div class="text-center mgt-25">
                                    <div class="">
                                        Bạn chưa đăng tải bất kì blog nào... <a href="PostBlog.php">Đăng blog</a>
                                    </div>
                                </div>
                            <?php }
                            ?>

                        </div>

                    </div>

                    <!----------------- hiredddd--------- -->
                    <div class="blogg mgt-30">
                        <div class="titlee tl_company fl_xx">
                            <h4 class="animate__animated animate__fadeInLeft"><i class="fa-solid fa-briefcase"></i> Công việc tuyển dụng(<?= count($sql8) ?>)</h4>
                            <form class="form_man" method="POST">
                                <span class="iconn"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="searchhired" placeholder="Nhập từ khóa tìm kiếm" class="searchhired">
                            </form>
                        </div>
                        <div class="list_company job-list list3" id="list__jobs">
                            <?php
                            if (count($sql8)) {
                                for ($i = 0; $i < count($sql8); $i++) {  ?>
                                    <div class="row-recent1">
                                        <div class="row-recent-container " style="justify-content: space-between;">
                                            <!-- row-item -->
                                            <div class="row-item">
                                                <div class="name-job">
                                                    <h2 class="name shortt"><?= $sql8[$i]['nganhnghe'] ?></h2>
                                                    <div class="level">
                                                        <span class="sp-level"><?= $sql8[$i]['theloai'] ?></span>
                                                    </div>

                                                </div>

                                                <div class="address-job">
                                                    <div class="company">
                                                        <i class="fa-solid fa-bookmark"></i>
                                                        <a class="company-name">Chức danh: <?= $sql8[$i]['chucdanh'] ?></a>
                                                    </div>
                                                    <div class="company">
                                                        <i class="ti-layers-alt"></i>
                                                        <a href="" class="company-name">Ngày đăng tuyển: <?= $sql8[$i]['ngaydangky'] ?> - Ngày kết thúc: <?= $sql8[$i]['ngayketthuc'] ?></a>
                                                    </div>



                                                </div>
                                            </div>
                                            <!-- apply -->
                                            <div class="apply">
                                                <a href="JobDetail.php?idcvv=<?= $sql8[$i]['idcongviec'] ?>" class="apply-job">Xem Chi Tiết</a>
                                                <div class="mgt-10">
                                                    <a href="Manager.php?idmn=edt_<?= $sql8[$i]['idcongviec'] ?>_hd" class="editt"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="Manager.php?idmn=dlt_<?= $sql8[$i]['idcongviec'] ?>_hd" class="deletee" onclick="return confirm('Bạn Muốn Xóa Công Việc: `<?= $sql8[$i]['nganhnghe']  ?> - <?= $sql8[$i]['chucdanh'] ?> `')"><i class="fa-solid fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php   }
                            } else { ?>
                                <div class="text-center mgt-25">
                                    <div class="">
                                        Bạn chưa đăng tải bất kì công việc nào với giống với thông tin tìm kiếm... <a href="Hired.php">Tuyển dụng</a>
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