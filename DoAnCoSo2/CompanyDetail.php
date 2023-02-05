<?php
include 'Config.php';
include 'ConnectMySQL.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$us = '';
$idcp = '';
if (isset($_GET['idcompany'])) {
    $idcp = $_GET['idcompany'];
}
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
    $sql = "SELECT * FROM account WHERE `username`='$us' ";
    $sql2 = execute($sql);
    foreach ($sql2 as $value) {
        $img = $value['imgavata'];
    }
    $_SESSION['img2'] = $img;
}
$sql18 = [];
if ($us != '' && $us != ' ') {
    $sql17 = "SELECT * FROM `followcompany` WHERE `username`= '$us'";
    $sql18 = execute($sql17);
}
$countt = count($sql18);
$idcompany = '';
$namecompany = '';
if (isset($_GET['idcpn'])) {
    if ($us == '' || $us == ' ') {
        header('location: Login.php');
    } else {
        $idcpn = $_GET['idcpn'];
        $sql15 = "INSERT INTO `followcompany` (`username`,`idcongty`) VALUES ('$us','$idcpn') ";
        $sql16 = insertA($sql15);
        if ($sql16) {
            echo '<script language="javascript">
            alert("Đã theo dõi công ty này!!!");
        </script>';
            header("location: CompanyDetail.php?idcompany=$idcpn");
        } else {
            echo '<script language="javascript">
            alert("Theo dõi không thành công, vui lòng thử lại!!!");
        </script>';
            header("location: CompanyDetail.php?idcompany=$idcpn");
        }
    }
} else {
    if (isset($_GET['idcompany'])) {
        $idcompany = $_GET['idcompany'];
        $sql3 = "SELECT * FROM `company` WHERE `idcongty`='$idcompany'";
        $sql4 = execute($sql3);
        foreach ($sql4 as $value) {
            $namecompany = $value['tencongty'];
        }
        $sql5 = "SELECT * FROM `hired` WHERE `idcongty`='$idcompany'";
        $sql6 = execute($sql5);
    } else {
        header('location: ../Admin/404-web.html');
    }
}
$findcompany = '';
$addresscompany = '';
if (isset($_POST['timkiem'])) {
    $findcompany = $_POST['findcompany'];
    $addresscompany = $_POST['addresscompany'];
    if ($findcompany != '' && $findcompany != ' ') {
        $_SESSION['findcompany'] = $_POST['findcompany'];
    }
    if ($addresscompany != '' && $addresscompany != ' ') {
        $_SESSION['addresscompany'] = $_POST['addresscompany'];
    }
    header('location: SearchCompany.php');
}
$sql20 = [];
$sql19 = "SELECT * FROM `ratingcompany` WHERE `idcongty`='$idcp' ORDER BY `time` DESC LIMIT 0,8";
$sql20 = execute($sql19);
$countttt = count($sql20);
$now = getdate();
$timee = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"] . " " . $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
if (isset($_POST['dangtai'])) {
    if ($us == '' || $us == ' ') {
        header('location: Login.php');
    } else {
        $usnotify = '';
        $sqlv = "SELECT username FROM `company` WHERE `idcongty`='$idcp'";
        $sqlv2 = execute($sqlv);
        foreach ($sqlv2 as $value) {
            $usnotify = $value['username'];
        }
        $rating = $_POST['rating'];
        $contentt = $_POST['contentt'];
        $sqll = "INSERT INTO `ratingcompany` (`username`,`idcongty`,`content`,`ratingcompany`,`time`)  VALUES('$us','$idcp','$contentt','$rating','$timee')";
        $sqll2 = insertA($sqll);
        if ($sqll2) {
            echo '<script language="javascript">
            alert("Đăng tải thành công!!!");
        </script>';
            $sqlv3 = "INSERT INTO `notification` (`usernametopic`,`username`,`idtopic`,`topic`,`time`) VALUES ('$usnotify','$us','$idcp','company','$timee')";
            $sqlv4 = insertA($sqlv3);
            $sql20 = [];
            $sql19 = "SELECT * FROM `ratingcompany` WHERE `idcongty`='$idcp' ORDER BY `time` DESC LIMIT 0,8";
            $sql20 = execute($sql19);
            $countttt = count($sql20);
            // header("location: BlogPost.php?id=$idbl");
        } else {
            echo '<script language="javascript">
            alert("Đăng tải không thành công!!!");
        </script>';
            // $sql20 = [];
            // $sql19 = "SELECT * FROM `ratingblog` WHERE `idblog`='$idbl'";
            // $sql20 = execute($sql19);
            // $countttt = count($sql20);
            // header("location: BlogPost.php?id=$idbl");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
    <title><?= $namecompany ?></title>
    <link rel="stylesheet" href="Css/styleCompanyDetail2.css">
    <link rel="stylesheet" href="Css/styleCompanyDeatil.css">
    <link rel="stylesheet" href="v2.3.2/jquery.rateyo.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <!-- find -->
    <section class="job-post mgt-65">
        <div class="job-container">
            <div class="bg-find">
                <form action="" class="form-search flex-item" method="POST">
                    <span class="fa fa-search"></span>
                    <input type="text" class="search" placeholder="Tên Công ty, từ khóa..." name="findcompany">
                    <div class="location-icon">
                        <input type="text" class="searchs s-address" placeholder="Địa chỉ" name="addresscompany">
                        <span class="fa fa-bank"></span>
                    </div>
                    <input type="submit" value="Tìm Kiếm" name="timkiem" class="btn btn-primary bd-rius">
                </form>
            </div>
        </div>
    </section>
    <!-- job -->
    <?php for ($i = 0; $i <= 0; $i++) { ?>
        <section class="job-post ">
            <div class="job-container">

                <div class="docc">
                    <div class="doc-left">
                        <div class="image-job">
                            <img src="Img/<?php echo $sql4[$i]['imgcompany'] ?>" alt="">
                        </div>
                        <div class="doc-cont">
                            <h3 class="doc-department mg-10">
                                <?php echo $sql4[$i]['tencongty'] ?>
                            </h3>
                            <p class="address-job">
                                Địa Điểm Làm Việc: <span><?php echo $sql4[$i]['diachi'] . ',' . $sql4[$i]['tinh_tp'] . ',' . $sql4[$i]['quocgia']  ?></span>
                            </p>
                            <p class="deadline">Trạng Thái: <span><?php echo $sql4[$i]['trangthaicty'] ?></span></p>
                        </div>
                    </div>

                    <div class="doc-right mgr-30">
                        <div class="apply">
                            <?php if ($countt) {
                                $d = 0;
                                for ($j = 0; $j < $countt; $j++) {
                                    if ($sql18[$j]['idcongty'] == $sql4[$i]['idcongty']) {
                                        $d += 1;
                                        break;
                                    }
                                }
                                if ($d == 0) { ?>
                                    <a href="CompanyDetail.php?idcpn=<?= $sql4[$i]['idcongty'] ?>" class="apply-job"><i class="fa-regular fa-heart"></i></a>
                                <?php  }
                            } else { ?>
                                <a href="CompanyDetail.php?idcpn=<?= $sql4[$i]['idcongty'] ?>" class="apply-job"><i class="fa-regular fa-heart"></i></a>
                            <?php   } ?>

                        </div>
                    </div>
                </div>

            </div>
            <div class="job-container mg-top-15">
                <div class="content-body">
                    <div class="docc-no-flex">
                        <div class="info">
                            <ul class="ul-info">
                                <li class="nav-item-info nav-active">
                                    <a href="#" class="link-item">Thông tin</a>
                                </li>
                                <li class="nav-item-info">
                                    <a href="#" class="link-item">Location</a>
                                </li>
                                <li class="nav-item-info">
                                    <a href="#" class="link-item">Thông tin liên hệ</a>
                                </li>
                                <li class="nav-item-info">
                                    <a href="#" class="link-item">Phúc Lợi</a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content active" id="doc-thong-tin">
                            <div class="item-tab">
                                <h4 class="header-detail">
                                    Sơ lược về Công Ty
                                </h4>
                                <p class="main-detail">
                                    <?php echo $sql4[$i]['soluoccty'] ?>
                                </p>
                            </div>
                            <div class="item-tab flex_xx fl_p mgt-10 hv_p">
                                <h4 class="header-detail">
                                    Số lượng nhân viên:
                                </h4>
                                <p class="main-detail">
                                    <?php echo $sql4[$i]['sonv'] ?>
                                </p>
                            </div>
                            <div class="item-tab flex_xx fl_p mgt-10 hv_p">
                                <h4 class="header-detail">
                                    Loại hình hoạt động:
                                </h4>
                                <p class="main-detail">
                                    <?php echo $sql4[$i]['loaihinhhd'] ?>
                                </p>
                            </div>
                            <div class="item-tab mgt-10">
                                <h4 class="header-detail">
                                    Các công việc đang tuyển dụng:
                                </h4>
                                <p class="main-detail cp_a">
                                    <?php for ($j = 0; $j < count($sql6); $j++) { ?>
                                <div class="mgt-15"> + <a href="JobDetail.php?idcvv=<?= $sql6[$j]['idcongviec'] ?>"><?= $sql6[$j]['nganhnghe'] . ' '  ?>(<?= '' . $sql6[$j]['chucdanh'] . '' ?>)</a> </div>
                            <?php } ?>

                            </p>
                            </div>
                        </div>
                        <div class="tab-content" id="doc-cong-ty" style="text-align: center;">
                            <div><?php if ($sql4[$i]['nhunglocation'] == '' || $sql4[$i]['nhunglocation'] == ' ') { ?>
                                    <div class="pdb-50 fn-st">
                                        Bạn chưa cập nhật địa chỉ công ty mình trên map website JindJob... <a href="">Cập nhật ngay</a>
                                    </div>
                                <?php    } else {
                                        echo $sql4[$i]['nhunglocation'];
                                    } ?>
                            </div>
                        </div>
                        <div class="tab-content" id="doc-cong-ty">
                            <div class="item-tab">
                                <h4 class="header-detail">
                                    Người Liên Hệ:
                                </h4>
                                <div class="detail_lh">
                                    <img src="Img/<?php echo $sql4[$i]['imgnguoilh'] ?>" alt="" class="img_lh">
                                    <p class="main-detail centerrr">
                                        <?php echo $sql4[$i]['tennguoilh'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="item-tab">
                                <h4 class="header-detail">
                                    Chi tiết liên hệ:
                                </h4>
                                <p class="main-detail">
                                    Trụ sở chính: <?php echo $sql4[$i]['diachi'] . ',' . $sql4[$i]['tinh_tp'] . ',' . $sql4[$i]['quocgia']  ?> <br>
                                    ĐT: <?php echo $sql4[$i]['sdt'] ?>, Fax: 024. 37689433 <br>
                                    E-mail: <?php echo $sql4[$i]['email'] ?> <br>
                                    <?php if ($sql4[$i]['linkwebsite'] != '') { ?>
                                        Website: <a href="<?php echo $sql4[$i]['linkwebsite'] ?>" class="hi"><?php echo $sql4[$i]['linkwebsite'] ?></a>
                                    <?php   } ?> <br>


                                </p>
                            </div>
                        </div>
                        <div class="tab-content" id="doc-viec-lam">
                            <h4 class="header-detail">
                                CÁC PHÚC LỢI DÀNH CHO BẠN
                            </h4>
                            <p class="main-detail">
                                <?php echo $sql4[$i]['phucloicty'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="job-post ">
            <div class="job-container mg-top-15">
                <div class="docc-no-flex">
                    <div class="tab-contenttt">
                        <h4>Tất cả đánh giá</h4>
                    </div>
                    <div class="card-body pdlr-28">
                        <!-- Comment form-->
                        <form class="mb-4" method="POST">
                            <div>
                                <div class="rating_blog">
                                    <span>Đánh giá:</span>
                                    <div class="rateyo" data-rateyo-rating="0"></div>
                                    <input type="hidden" name="rating">
                                </div>
                            </div>
                            <textarea class="form-control" rows="3" placeholder="Lời nhận xét của bạn..." name="contentt"></textarea>
                            <div class="sub-rating">
                                <input type="submit" value="Đăng" name="dangtai" class="btn btn-primary">
                            </div>

                        </form>
                        <!-------------------- Comment with nested comments----------->

                        <!-- Single comment-->
                        <?php if ($countttt) {
                            for ($i = 0; $i < $countttt; $i++) {
                                // $datee = strrev($sql20[$i]['time']);
                                $use = $sql20[$i]['username'];
                                $rt = $sql20[$i]['ratingcompany'];
                                $imgrt = '';
                                $sql22 = [];
                                $sql21 = "SELECT imgavata FROM `ratingcompany`,`account` WHERE ratingcompany.username = account.username AND ratingcompany.username = '$use'";
                                $sql22 = execute($sql21);
                                for ($j = 0; $j < 1; $j++) {
                                    $imgrt = $sql22[$j]['imgavata'];
                                }
                        ?>
                                <div class="d-flex reveal mgb-15">
                                    <div class="flex-shrink-0 w-35"><img class="rounded-circle" src="Img/<?= $imgrt ?>" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="rating_use">
                                            <div class="fw-bold"><a href="ProfileUser.php?iduse=<?= $sql20[$i]['username'] ?>"><?= $sql20[$i]['username'] ?></a></div>
                                            <div class="raing_mg">
                                                <div id="rateYo" data-rateyo-rating="<?= $rt  ?>"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <?= $sql20[$i]['content'] ?>
                                        </div>
                                        <div class="time_rating">
                                            vào lúc: <?= $sql20[$i]['time'] ?>
                                        </div>
                                    </div>

                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>


                </div>
            </div>
        </section>

    <?php } ?>
    <?php include_once './Footer.php' ?>
    <script>
        $(function() {
            $(".rateyo").rateYo({
                starWidth: "20px",
                fullStar: true

            }).on("rateyo.change", function(e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating);
            })
            $("#rateYo").rateYo({
                starWidth: "10px",
                readOnly: true
            });
        });
    </script>
    <script type="text/javascript" src="v2.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="v2.3.2/jquery.rateyo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="Js/changeTabCompanyDetail.js"></script>
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            var header = document.querySelector('.header');
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>

</body>

</html>