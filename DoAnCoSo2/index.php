<?php
include 'Config.php';
include 'ConnectMySQL.php';


$us = '';
$img = '';
$sql3 = "SELECT * FROM blog LIMIT 0,16";
$sql4 = execute($sql3);
// foreach ($sql33 as $value) {
//     echo   $value['imgblog'] . ' ' . $value['titleblog'];
// }
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
    $sql = "SELECT * FROM account WHERE `username`='$us' ";
    $sql2 = execute($sql);
    foreach ($sql2 as $value) {
        $img = $value['imgavata'];
    }
    $_SESSION['img2'] = $img;
}
$findjob = '';
if (isset($_POST['timkiem'])) {
    if (isset($_POST['findjob']) && $_POST['findjob'] != '' && $_POST['findjob'] != ' ') {
        $findjob = $_POST['findjob'];
        $_SESSION['findjob'] = $_POST['findjob'];
        if ($us != '' || $us != ' ') {
            $sql5 = "UPDATE `account` SET `historysearch` = '$findjob' WHERE `username`='$us'";
            $sql6 = insertA($sql5);
        }
    }
    header('location: Search.php');
}
// if (isset($_SESSION['user_img'])) {
//     $us = $_SESSION['user_img'];
//     echo  '<br>' . $us . 'hello';
// }
// echo  '<br>' . $us . 'hello';
// echo  '<br> ' .  $_SESSION['logingg'] . 'hello';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css  -->
    <link rel="stylesheet" href="Css/styleHome.css">

    <!-- Library  -->
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">

    <!-- Link  -->
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

    <!-- Icon Web  -->
    <!-- <link rel="shortcut icon" type="image/webp " href="Img/iconh.webp"> -->
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <title>Home</title>
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <div class="grid bg-image">
        <img src="Img/imghome.png" class="img-fluid imgrp" alt="Responsive image">
        <div class="bg-container ">
            <div class="bg-element">
                <p class="bg-number">
                    We have 850,000 great job offers you deserve!
                </p>
                <h1 class="bg-content lead">
                    Your Dream <br>
                    <span>Job is Waiting</span>
                </h1>
                <div class="bg-find">
                    <form action="" class="form-search" method="POST">
                        <input type="text" class="search" placeholder="Find job..." name="findjob">

                        <span class="fa fa-search"></span>
                        <div class="hello10">
                            <!-- <button><a href="Search.php?idsearch" class="btn-search">Search</a></button> -->
                            <input type="submit" value="Search" name="timkiem" class="btn btn-primary btn_timkiem">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!------- Benefit of web ------>
    <div class="grid benefit-web reveal">
        <div class="wide job-container">
            <div class=" row list-flex-row ">
                <div class="benefit-element l-3 m-6 c-12 animate__animated animate__backInLeft">
                    <div style="width: 100%;margin: auto;justify-content: center;">
                        <img src="Img/service-02.png" alt="" class="benefit-image">
                    </div>
                    <div class="image-content">
                        <h3 class="content-header" style="text-align: center;">Tạo CV Cho Bản Thân</h3>
                        <p class="content-content" style="">Tại đây bạn có thể tạo cho mình 1 bộ CV
                            giúp bạn thuận tiện trong việc tìm việc.</p>
                    </div>
                </div>
                <div class="benefit-element l-3 m-6 c-12 animate__animated animate__backInLeft">
                    <div style="text-align: center;">
                        <img src="Img/0a5ce1e5-3326-4d86-893c-8a243504c88f.png" alt="" class="benefit-image">
                    </div>
                    <div class="image-content ">
                        <h3 class="content-header" style="text-align: center;">Tìm Kiếm Nhanh Chóng</h3>
                        <p class="content-content">Giúp các bạn có thể tìm công việc mình mong
                            muốn tùy theo lựa chọn
                            của bản thân.</p>
                    </div>
                </div>
                <div class="benefit-element l-3 m-6 c-12 animate__animated animate__backInRight">
                    <div style="text-align: center;">
                        <img src="Img/H4sIAAAAAAAAAD2Py07DMBBF_8XrgsaP2GNWJG2iskEsyjpyEttYKm7lJkGA-HdsFLGboznSvfebLDebTp9XSx4IJTsyXT7ihjyjC2f7bN4LuuB7F6K3qffJDH0x76_Rb9aLmd-yBXycHDfSGnAC-Tg4ZmCwlaPIHOKQ7SF8PU1ZPdaPa7hbI6.png" alt="" class="benefit-image">
                    </div>
                    <div class="image-content">
                        <h3 class="content-header" style="text-align: center;">Thao Tác Dễ Dàng</h3>
                        <p class="content-content" style="">Chỉ với vài thao tác cơ bản, vài cú click
                            chuột bạn cũng đã có thể tìm kiếm công việc cho mình.</p>
                    </div>
                </div>
                <div class="benefit-element l-3 m-6 c-12 animate__animated animate__backInRight">
                    <div style="text-align: center;">
                        <img src="Img/6081_html_m7e3522d6.png" alt="" class="benefit-image">
                    </div>
                    <div class="image-content">
                        <h3 class="content-header" style="text-align: center;">Phù Hợp Với Năng Lực </h3>
                        <p class="content-content" style="">Tạo cầu nối giúp bạn phát huy hết năng lực
                            và khả năng của mình trong công việc.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Job post -->
    <div class="grid job-post reveal ">
        <div class="wide pd-job-post">
            <div class="job-container-header">
                <div class="job-header">
                    <p class="header-Categories">
                        Các Hạng Mục Gợi Ý Cho Bạn
                    </p>
                    <span class="header-current">
                        <b class="b-job">Chức Danh</b> Và <b class="b-job">Thể Loại</b>
                        <div style="display: flex;text-align: center;justify-content: center;">
                            <hr>
                            <!-- <span>.</span> -->
                            <hr>
                        </div>
                    </span>

                </div>
            </div>

            <div class="job-list list-flex-row row">
                <div class="job-row reveal col l-3 m-6 c-12">
                    <ul class="category">
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Nhân Viên Kinh Doanh</a>
                                <span class="number">1253</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Nhân Viên Kế Toán
                                </a>
                                <span class="number" style="">982</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Nhân Viên Kỹ Thuật
                                </a>
                                <span class="number" style="">1136</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Nhân Viên Bán Hàng
                                </a>
                                <span class="number" style="">885</span>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="job-row reveal col l-3 m-6 c-12">
                    <ul class="category">
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Nhân Viên Hành Chính
                                </a>
                                <span class="number">1343</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Kế Toán Tổng Hợp</a>
                                <span class="number" style="">1020</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Nhân Viên Văn Phòng</a>
                                <span class="number" style="">850</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Nhân Viên Marketing</a>
                                <span class="number" style="">743</span>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="job-row reveal col l-3 m-6 c-12">
                    <ul class="category">
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Full Time </a>
                                <span class="number" style="">1700</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Permanent</a>
                                <span class="number" style="">1525</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Part Time </a>
                                <span class="number" style="">982</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Thực Tập
                                </a>
                                <span class="number" style="">1272</span>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="job-row reveal col l-3 m-6 c-12">
                    <ul class="category">
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields">Hợp Đồng
                                </a>
                                <span class="number" style="">1589</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Casual/Temporary
                                </a>
                                <span class="number">1178</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Thời Vụ
                                </a>
                                <span class="number" style="">1022</span>
                            </div>
                        </li>
                        <li class="category-element">
                            <div style="display: flex; justify-content: space-between;">
                                <a href="" class="fields"> Tự Lập
                                </a>
                                <span class="number" style="">773</span>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Recent Jobs -->
    <section class="job-post bg-color reveal grid">
        <div class="job-container wide pd-job-post">
            <!-- header -->
            <div class="job-container-header">
                <div class="job-header">
                    <p class="header-Categories">
                        Công Việc Mới Nhất
                    </p>
                    <span class="header-current job2">
                        <b class="b-job">Việc Làm</b> Gần Đây
                        <div style="display: flex;text-align: center;justify-content: center;">
                            <hr>
                            <!-- <span>.</span> -->
                            <hr>
                        </div>
                    </span>
                </div>
            </div>
            <!-- List job -->
            <div class="job-list " id="list__jobs">
                <div class="row-recent1 reveal">
                    <div class="row-recent-container " style="justify-content: space-between;">
                        <!-- row-item -->
                        <div class="row-item">
                            <div class="name-job">
                                <h2 class="name">DevOps Engineer</h2>
                                <div class="level">
                                    <span class="sp-level">Partime</span>
                                </div>

                            </div>

                            <div class="address-job">
                                <div class="company">
                                    <i class="ti-layers-alt"></i>
                                    <a href="" class="company-name">Enouvo IT Solution</a>
                                </div>

                                <div class="address">
                                    <i class="ti-location-pin"></i>
                                    <span class="name-address"> Quận Sơn Trà, Thành phố Đà Nẵng</span>
                                </div>

                            </div>
                        </div>
                        <!-- apply -->
                        <div class="apply">
                            <a href="seeDetail.html" class="apply-job">Xem Công Việc</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- pagination -->
            <section class="job-post-padding-hep">
                <div class="job-container">
                    <!-- List job -->
                    <div class="job-list" id="jobb">

                    </div>
                    <div class="pagination">
                        <ul class="" style="display: flex;">
                            <li class="btn-prev btn-active"><a href="#" class=""><b>&laquo;</b></a></li>
                            <div id="number-page" class="number-page" style="display: flex;">

                            </div>
                            <li class="btn-next"><a href="#" class=""><b>&raquo;</b></a></li>
                        </ul>

                    </div>

                </div>
            </section>
        </div>
    </section>


    <!-- Thong ke -->
    <section class="statistical  grid ps-rl">
        <div class="statistical-container wide ps-ab">
            <div class="job-list list-flex-row list-flex-space">
                <div class="row-element-statis">
                    <div class="text">
                        <strong class="number-statis">1,350,285</strong>
                        <span class="text-statis">
                            Công việc
                        </span>
                    </div>
                </div>
                <div class="row-element-statis">
                    <div class="text">
                        <strong class="number-statis">1,350,451</strong>
                        <span class="text-statis">
                            Ứng viên
                        </span>
                    </div>
                </div>
                <div class="row-element-statis">
                    <div class="text">
                        <strong class="number-statis">792,030</strong>
                        <span class="text-statis">
                            Công ty
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- company-->
    <section class="job-post reveal grid">
        <div class="job-container wide pd-job-post ">
            <div class="job-container-header">
                <div class="job-header">
                    <p class="header-Categories">
                        Hợp tác
                    </p>
                    <span class="header-current cpn">
                        <b class="b-job">Doanh Nghiệp</b> Lớn
                        <div style="display: flex;text-align: center;justify-content: center;">
                            <hr>
                            <!-- <span>.</span> -->
                            <hr>
                        </div>
                    </span>
                </div>
            </div>
            <div class="group-slide">
                <div class="row-slide">
                    <div class="col-slide">
                        <div class="image-company">
                            <img src="Img/partners-01.png" alt="">
                        </div>
                        <div class="image-company">
                            <img src="Img/partners-02.png" alt="">
                        </div>
                        <div class="image-company">
                            <img src="Img/partners-03.png" alt="">
                        </div>
                        <div class="image-company">
                            <img src="Img/partners-04.png" alt="">
                        </div>
                        <div class="image-company">
                            <img src="Img/partners-05.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- recent blog -->
    <section class="job-post bg-color reveal pd-job-post grid blogg pd-50" id="ttt2">
        <div class="job-container wide">
            <div class="job-container-header">
                <div class="job-header">
                    <p class="header-Categories">
                        Blog Của Chúng Tôi
                    </p>
                    <span class="header-current">
                        <b class="b-job">Blog</b> Mới Nhất
                        <div style="display: flex;text-align: center;justify-content: center;">
                            <hr>
                            <!-- <span>.</span> -->
                            <hr>
                        </div>
                    </span>
                </div>
            </div>
            <div class="slider">
                <div class="slides">
                    <input type="radio" id="radio1" name="radio-btn">
                    <input type="radio" id="radio2" name="radio-btn">
                    <input type="radio" id="radio3" name="radio-btn">
                    <input type="radio" id="radio4" name="radio-btn">
                    <div class="slide first">
                        <!-- <img src="js.jpg" alt=""> -->
                        <div class="list-flex-row blog-size flexx row">
                            <?php for ($i = 0; $i <= 3; $i++) { ?>
                                <div class="col-blog l-3 m-6 c-6">
                                    <div class="img-blog">
                                        <a href="" class="img-blog-link" style="background-image: url(Img/<?= $sql4[$i]['imgblog'] ?>);">
                                        </a>
                                    </div>
                                    <div class="text-blog">
                                        <div class="time-blog">
                                            <p> <?= $sql4[$i]['timeblog'] ?> <i class="ti-comment-alt"></i>3</p>
                                        </div>
                                        <h3 class="header-blog">
                                            <a href="BlogPost.php?id=<?php echo $sql4[$i]['idblog'] ?>" class="cardd3"> <?= $sql4[$i]['titleblog'] ?></a>
                                        </h3>
                                        <p class="cardd">
                                            <?= $sql4[$i]['contentblog'] ?>

                                        </p>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                    <div class="slide ">
                        <div class="list-flex-row blog-size flexx row">
                            <?php for ($i = 4; $i <= 7; $i++) { ?>
                                <div class="col-blog l-3 m-6 c-6">
                                    <div class="img-blog">
                                        <a href="" class="img-blog-link" style="background-image: url(Img/<?= $sql4[$i]['imgblog'] ?>);">
                                        </a>
                                    </div>
                                    <div class="text-blog">
                                        <div class="time-blog">
                                            <p> <?= $sql4[$i]['timeblog'] ?> <i class="ti-comment-alt"></i>3</p>
                                        </div>
                                        <h3 class="header-blog">
                                            <a href="BlogPost.php?id=<?php echo $sql4[$i]['idblog'] ?>" class="cardd3"> <?= $sql4[$i]['titleblog'] ?></a>
                                        </h3>
                                        <p class="cardd">
                                            <?= $sql4[$i]['contentblog'] ?>

                                        </p>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                    <div class="slide ">
                        <div class="list-flex-row blog-size flexx row">
                            <?php for ($i = 8; $i <= 11; $i++) { ?>
                                <div class="col-blog l-3 m-6 c-6">
                                    <div class="img-blog">
                                        <a href="" class="img-blog-link" style="background-image: url(Img/<?= $sql4[$i]['imgblog'] ?>);">
                                        </a>
                                    </div>
                                    <div class="text-blog">
                                        <div class="time-blog">
                                            <p> <?= $sql4[$i]['timeblog'] ?> <i class="ti-comment-alt"></i>3</p>
                                        </div>
                                        <h3 class="header-blog">
                                            <a href="BlogPost.php?id=<?php echo $sql4[$i]['idblog'] ?>" class="cardd3"> <?= $sql4[$i]['titleblog'] ?></a>
                                        </h3>
                                        <p class="cardd">
                                            <?= $sql4[$i]['contentblog'] ?>

                                        </p>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="slide ">
                        <div class="list-flex-row blog-size flexx row">
                            <?php for ($i = 12; $i <= 15; $i++) { ?>
                                <div class="col-blog l-3 m-6 c-6">
                                    <div class="img-blog">
                                        <a href="" class="img-blog-link" style="background-image: url(Img/<?= $sql4[$i]['imgblog'] ?>);">
                                        </a>
                                    </div>
                                    <div class="text-blog">
                                        <div class="time-blog">
                                            <p> <?= $sql4[$i]['timeblog'] ?> <i class="ti-comment-alt"></i>3</p>
                                        </div>
                                        <h3 class="header-blog">
                                            <a href="BlogPost.php?id=<?php echo $sql4[$i]['idblog'] ?>" class="cardd3"> <?= $sql4[$i]['titleblog'] ?></a>
                                        </h3>
                                        <p class="cardd">
                                            <?= $sql4[$i]['contentblog'] ?>

                                        </p>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sub -->
    <section class="subcribe grid">
        <div class="subcribe-background ">
            <div class="subcribe-container wide">
                <div class="row-sub">
                    <div class="col-sub" data-aos="flip-left">
                        <h2>Theo dõi bản tin của chúng tôi
                        </h2>
                        <p>Luôn luôn cập nhật những thông tin mới nhất về công việc , cũng như các công việc liên quan
                            tới các bạn</p>
                        <div class="input-mail-sub">
                            <form action="" class="input">
                                <div class="form-group">
                                    <input type="text" class="text-mail" placeholder="Vui Lòng Nhập Email...">
                                    <input class="button" type="submit" value="Subcribe"></input>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once './Footer.php' ?>




    <script type='text/javascript'>
        var mql = window.matchMedia('screen and (max-width:  987px)');
        if (mql.matches) {
            $(document).ready(function() {
                $('.col-slide').slick({
                    // autoplay: true, //tự động chuyển slide
                    // autoplaySpeed: 2000, //sau bao nhiêu giây đó thì chuyển slide
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                });
            });
        } else {
            $(document).ready(function() {
                $('.col-slide').slick({
                    // autoplay: true, //tự động chuyển slide
                    // autoplaySpeed: 2000, //sau bao nhiêu giây đó thì chuyển slide
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                });
            });
        }
    </script>



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
    <script type="text/javascript">
        var counter = 1;
        var dem = 2;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            if (dem % 2 == 0) {
                counter++;
            } else {
                counter--;
            }
            if (counter > 4 && dem % 2 == 0) {
                counter = 3;
                dem++;
            } else if (counter == 1 && dem % 2 != 0) {
                dem = 2;
            }
        }, 3500);
    </script>
    <script src="Js/pagingHome.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>