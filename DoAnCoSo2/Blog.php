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
}
$sql3 = "SELECT * FROM `blog`WHERE `trangthai`='Chấp Nhận' ORDER BY timeblog DESC LIMIT 0,5 ";
$sql4 = execute($sql3);
// for ($i = 0; $i < count($sql4); $i++) {
//     echo  $sql4[$i]['titleblog'];
// }

$sql5 = "SELECT * FROM `blog` WHERE `topicblog`='Kinh Nghiệm Phỏng Vấn' AND `trangthai`='Chấp Nhận'  ORDER BY timeblog DESC LIMIT 0,4";
$sql6 = execute($sql5);

$sql7 = "SELECT * FROM `blog` WHERE `topicblog`='Hướng Nghiệp' AND `trangthai`='Chấp Nhận' ORDER BY timeblog DESC LIMIT 0,4";
$sql8 = execute($sql7);

$sql9 = "SELECT * FROM `blog` WHERE `topicblog`='Góc Chuyên Gia' AND `trangthai`='Chấp Nhận'  ORDER BY timeblog DESC LIMIT 0,3";
$sql10 = execute($sql9);

$sql11 = "SELECT * FROM `blog` WHERE `topicblog`='Bí Quyết Tìm Việc' AND `trangthai`='Chấp Nhận' ORDER BY timeblog DESC LIMIT 0,2";
$sql12 = execute($sql11);

$sql13 = "SELECT * FROM `blog` WHERE `topicblog`='Mẹo Công Sở' AND `trangthai`='Chấp Nhận'  ORDER BY timeblog DESC LIMIT 0,2";
$sql14 = execute($sql13);

$sql17 = "SELECT * FROM `followblog` WHERE `username`= '$us'";
$sql18 = execute($sql17);

$findjob = '';
if (isset($_POST['timkiem'])) {
    $findjob = $_POST['findjob'];
    if ($findjob != '' && $findjob != ' ') {
        $_SESSION['findjobb'] = $_POST['findjob'];
    }
    header('location: SearchBlog.php');
}

if (isset($_GET['idblog'])) {
    if ($us == '' || $us == ' ') {
        header('location: Login.php');
    } else {
        $idblog = $_GET['idblog'];
        $sql15 = "INSERT INTO `followblog` (`username`,`idblog`) VALUES ('$us','$idblog') ";
        $sql16 = insertA($sql15);
        if ($sql16) {
            echo '<script language="javascript">
            alert("Đã theo dõi bài viết này!!!");
        </script>';
            header('location: Blog.php');
        } else {
            echo '<script language="javascript">
            alert("Theo dõi không thành công, vui lòng thử lại!!!");
        </script>';
            header('location: Blog.php');
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
    <link rel="stylesheet" href="Css/styleBlog.css">
    <link rel="stylesheet" href="Css/styleBlog2.css">
    <!-- <link rel="stylesheet" href="/responsive.css"> -->
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Blog</title>
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <div class="swiper. mySwiper. slider">
        <div class="swiper-wrapper. slides">
            <input type="radio" id="radio1" name="radio-btn">
            <input type="radio" id="radio2" name="radio-btn">
            <input type="radio" id="radio3" name="radio-btn">
            <input type="radio" id="radio4" name="radio-btn">
            <div class="swiper-slide. slide first"><a href="">
                    <img src="Img/bl6.jpg" alt="" class="img-fluid">
                </a></div>
            <div class="swiper-slide."><a href="">
                    <img src="Img/bl7.jpg" alt="" class="img-fluid">
                </a></div>
            <div class="swiper-slide."><a href="">
                    <img src="Img/bl122.png" alt="" class="img-fluid">
                </a></div>
            <div class="swiper-slide."><a href="">
                    <img src="Img/bl133.png" alt="" class="img-fluid">
                </a></div>
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn "></label>
                <label for="radio2" class="manual-btn "></label>
                <label for="radio3" class="manual-btn "></label>
                <label for="radio4" class="manual-btn "></label>
            </div>
        </div>
        <div class="swiper-pagination." style="bottom: 110px;"></div>
    </div>

    <div class="container mgt-30">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="title_blog">
                    <div class="title_blog1">
                        <h3>Bài Viết Mới Nhất</h3>
                    </div>
                </div>
                <!-- Featured blog post-->
                <?php for ($i = 0; $i <= 0; $i++) { ?>
                    <div class="card reveal mgb-29" style="height: 610px;">
                        <a href="#!"><img class="card-img-top imggg2" src="Img/<?php echo $sql4[$i]['imgblog'] ?>" alt="..." /></a>
                        <div class="card-body mgb-15">
                            <div class="ava-us">
                                <img src="Img/acc.png" alt="" class="avatar"> <label for=""><a href="ProfileUser.php?iduse=<?php echo $sql4[$i]['username'] ?>"><?php echo $sql4[$i]['username'] ?></a></label>
                            </div>
                            <div class="small text-muted">Đăng tải vào: <?php echo $sql4[$i]['timeblog'] ?> </div>
                            <h2 class="card-title"><?php echo $sql4[$i]['titleblog'] ?></h2>
                            <p class="card-text"><?php echo $sql4[$i]['contentblog'] ?>
                            </p>
                            <div class="fl_icon">
                                <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql4[$i]['idblog'] ?>">Xem Thêm →</a>
                                <?php if (count($sql18)) {
                                    $d = 0;
                                    for ($j = 0; $j < count($sql18); $j++) {
                                        if ($sql18[$j]['idblog'] == $sql4[$i]['idblog']) $d += 1;
                                    }
                                    if ($d == 0) { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql4[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php }
                                } else { ?>
                                    <a href="Blog.php?idblog=<?php echo $sql4[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <?php for ($i = 1; $i <= 2; $i++) { ?>
                            <div class="card mb-4 reveal">
                                <a href="#!"><img class="card-img-top imggg" src="Img/<?php echo $sql4[$i]['imgblog'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="ava-us">
                                        <img src="Img/acc.png" alt="" class="avatar"> <label for=""><a href="ProfileUser.php?iduse=<?php echo $sql4[$i]['username'] ?>"><?php echo $sql4[$i]['username'] ?></a></label>
                                    </div>
                                    <div class="small text-muted">Đăng tải vào: <?php echo $sql4[$i]['timeblog'] ?></div>
                                    <h2 class="card-title h4"><?php echo $sql4[$i]['titleblog'] ?></h2>
                                    <p class="card-text"><?php echo $sql4[$i]['contentblog'] ?></p>
                                    <div class="fl_icon">
                                        <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql4[$i]['idblog'] ?>">Xem Thêm →</a>
                                        <?php if (count($sql18)) {
                                            $d = 0;
                                            for ($j = 0; $j < count($sql18); $j++) {
                                                if ($sql18[$j]['idblog'] == $sql4[$i]['idblog']) $d += 1;
                                            }
                                            if ($d == 0) { ?>
                                                <a href="Blog.php?idblog=<?php echo $sql4[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                            <?php }
                                        } else { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql4[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Blog post-->


                    </div>
                    <div class="col-lg-6">

                        <!-- Blog post-->
                        <?php for ($i = 3; $i <= 4; $i++) { ?>
                            <div class="card mb-4 reveal">
                                <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql4[$i]['imgblog'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="ava-us">
                                        <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql4[$i]['username'] ?>"><?php echo $sql4[$i]['username'] ?></a></label>
                                    </div>
                                    <div class="small text-muted">Đăng tải vào: <?php echo $sql4[$i]['timeblog'] ?></div>
                                    <h2 class="card-title h4"><?php echo $sql4[$i]['titleblog'] ?></h2>
                                    <p class="card-text"><?php echo $sql4[$i]['contentblog'] ?></p>
                                    <div class="fl_icon">
                                        <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql4[$i]['idblog'] ?>">Xem Thêm →</a>
                                        <?php if (count($sql18)) {
                                            $d = 0;
                                            for ($j = 0; $j < count($sql18); $j++) {
                                                if ($sql18[$j]['idblog'] == $sql4[$i]['idblog']) $d += 1;
                                            }
                                            if ($d == 0) { ?>
                                                <a href="Blog.php?idblog=<?php echo $sql4[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                            <?php }
                                        } else { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql4[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Blog post-->
                    </div>
                </div>
                <!-- ===========================Kinh Nghiệm Phỏng Vấn============================================== -->
                <div class="row">
                    <div class="title_blog">
                        <div class="title_blog1">
                            <h3>Kinh Nghiệm Phỏng Vấn</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <?php for ($i = 0; $i <= 1; $i++) { ?>
                            <div class="card mb-4 reveal">
                                <a href="#!"><img class="card-img-top imggg" src="Img/<?php echo $sql6[$i]['imgblog'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="ava-us">
                                        <img src="Img/acc.png" alt="" class="avatar"> <label for=""><a href="ProfileUser.php?iduse=<?php echo $sql6[$i]['username'] ?>"><?php echo $sql6[$i]['username'] ?></a></label>
                                    </div>
                                    <div class="small text-muted">Đăng tải vào: <?php echo $sql6[$i]['timeblog'] ?></div>
                                    <h2 class="card-title h4"><?php echo $sql6[$i]['titleblog'] ?></h2>
                                    <p class="card-text"><?php echo $sql6[$i]['contentblog'] ?></p>
                                    <div class="fl_icon">
                                        <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql6[$i]['idblog'] ?>">Xem Thêm →</a>
                                        <?php if (count($sql18)) {
                                            $d = 0;
                                            for ($j = 0; $j < count($sql18); $j++) {
                                                if ($sql18[$j]['idblog'] == $sql6[$i]['idblog']) $d += 1;
                                            }
                                            if ($d == 0) { ?>
                                                <a href="Blog.php?idblog=<?php echo $sql6[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                            <?php }
                                        } else { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql6[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Blog post-->


                    </div>
                    <div class="col-lg-6">

                        <!-- Blog post-->
                        <?php for ($i = 2; $i <= 3; $i++) { ?>
                            <div class="card mb-4 reveal">
                                <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql6[$i]['imgblog'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="ava-us">
                                        <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql6[$i]['username'] ?>"><?php echo $sql6[$i]['username'] ?></a></label>
                                    </div>
                                    <div class="small text-muted">Đăng tải vào: <?php echo $sql6[$i]['timeblog'] ?></div>
                                    <h2 class="card-title h4"><?php echo $sql6[$i]['titleblog'] ?></h2>
                                    <p class="card-text"><?php echo $sql6[$i]['contentblog'] ?></p>
                                    <div class="fl_icon">
                                        <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql6[$i]['idblog'] ?>">Xem Thêm →</a>
                                        <?php if (count($sql18)) {
                                            $d = 0;
                                            for ($j = 0; $j < count($sql18); $j++) {
                                                if ($sql18[$j]['idblog'] == $sql6[$i]['idblog']) $d += 1;
                                            }
                                            if ($d == 0) { ?>
                                                <a href="Blog.php?idblog=<?php echo $sql6[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                            <?php }
                                        } else { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql6[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Blog post-->
                    </div>
                </div>
                <!-- ============================Hướng Nghiếp====================================== -->
                <div class="row">
                    <div class="title_blog">
                        <div class="title_blog1">
                            <h3>Hướng Nghiệp</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <?php for ($i = 0; $i <= 1; $i++) { ?>
                            <div class="card mb-4 reveal">
                                <a href="#!"><img class="card-img-top imggg" src="Img/<?php echo $sql8[$i]['imgblog'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="ava-us">
                                        <img src="Img/acc.png" alt="" class="avatar"> <label for=""><a href="ProfileUser.php?iduse=<?php echo $sql8[$i]['username'] ?>"><?php echo $sql8[$i]['username'] ?></a></label>
                                    </div>
                                    <div class="small text-muted">Đăng tải vào: <?php echo $sql8[$i]['timeblog'] ?></div>
                                    <h2 class="card-title h4"><?php echo $sql8[$i]['titleblog'] ?></h2>
                                    <p class="card-text"><?php echo $sql8[$i]['contentblog'] ?></p>
                                    <div class="fl_icon">
                                        <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql8[$i]['idblog'] ?>">Xem Thêm →</a>
                                        <?php if (count($sql18)) {
                                            $d = 0;
                                            for ($j = 0; $j < count($sql18); $j++) {
                                                if ($sql18[$j]['idblog'] == $sql8[$i]['idblog']) $d += 1;
                                            }
                                            if ($d == 0) { ?>
                                                <a href="Blog.php?idblog=<?php echo $sql8[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                            <?php }
                                        } else { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql8[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Blog post-->


                    </div>
                    <div class="col-lg-6">

                        <!-- Blog post-->
                        <?php for ($i = 2; $i <= 3; $i++) { ?>
                            <div class="card mb-4 reveal">
                                <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql8[$i]['imgblog'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="ava-us">
                                        <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql8[$i]['username'] ?>"><?php echo $sql8[$i]['username'] ?></a></label>
                                    </div>
                                    <div class="small text-muted">Đăng tải vào: <?php echo $sql8[$i]['timeblog'] ?></div>
                                    <h2 class="card-title h4"><?php echo $sql8[$i]['titleblog'] ?></h2>
                                    <p class="card-text"><?php echo $sql8[$i]['contentblog'] ?></p>
                                    <div class="fl_icon">
                                        <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql8[$i]['idblog'] ?>">Xem Thêm →</a>
                                        <?php if (count($sql18)) {
                                            $d = 0;
                                            for ($j = 0; $j < count($sql18); $j++) {
                                                if ($sql18[$j]['idblog'] == $sql8[$i]['idblog']) $d += 1;
                                            }
                                            if ($d == 0) { ?>
                                                <a href="Blog.php?idblog=<?php echo $sql8[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                            <?php }
                                        } else { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql8[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Blog post-->
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4  reveal">
                    <div class="card-header"><b>Tìm Kiếm</b></div>
                    <div class="card-body">
                        <form class="input-group" method="POST">
                            <input class="form-control" type="text" placeholder="Nhập từ khóa tìm kiếm..." aria-label="Enter search term..." aria-describedby="button-search" name="findjob" />
                            <input class="btn btn-primary" id="button-search" type="submit" value="Tìm Kiếm" name="timkiem">

                        </form>
                        <div class="post_blog mgt-18">
                            <a href="PostBlog.php" class="btn btn-dark">=>>> Đăng Tải Blog Của Bạn</a>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4 reveal">
                    <div class="card-header"><b>Góc Chuyên Gia</b></div>
                    <?php for ($i = 0; $i <= 0; $i++) { ?>
                        <div class="reveal">
                            <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql10[$i]['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql10[$i]['username'] ?>"><?php echo $sql10[$i]['username'] ?></a></label>
                                </div>
                                <div class="small text-muted">Đăng tải vào: <?php echo $sql10[$i]['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $sql10[$i]['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $sql10[$i]['contentblog'] ?></p>
                                <div class="fl_icon">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql10[$i]['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $sql10[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql10[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql10[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php for ($i = 1; $i <= 1; $i++) { ?>
                        <div class="reveal ">
                            <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql10[$i]['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql10[$i]['username'] ?>"><?php echo $sql10[$i]['username'] ?></a></label>
                                </div>
                                <div class="small text-muted">Đăng tải vào: <?php echo $sql10[$i]['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $sql10[$i]['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $sql10[$i]['contentblog'] ?></p>
                                <div class="fl_icon">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql10[$i]['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $sql10[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql10[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql10[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- ===========================cnt1==================== -->
                    <!-- ===========================cnt2==================== -->
                    <?php for ($i = 2; $i <= 2; $i++) {  ?>
                        <div class="reveal mgt-26">
                            <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql10[$i]['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql10[$i]['username'] ?>"><?php echo $sql10[$i]['username'] ?></a></label>
                                </div>
                                <div class="small text-muted">Đăng tải vào: <?php echo $sql10[$i]['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $sql10[$i]['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $sql10[$i]['contentblog'] ?></p>
                                <div class="fl_icon">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql10[$i]['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $sql10[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql10[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql10[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
                <!-- Side widget-->
                <div class="card mb-4 mgt-30 reveal">
                    <div class="card-header"><b>Bí Quyết Tìm Việc</b></div>
                    <?php for ($i = 0; $i <= 0; $i++) { ?>
                        <div class="reveal">
                            <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql12[$i]['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql12[$i]['username'] ?>"><?php echo $sql12[$i]['username'] ?></a></label>
                                </div>
                                <div class="small text-muted">Đăng tải vào: <?php echo $sql12[$i]['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $sql12[$i]['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $sql12[$i]['contentblog'] ?></p>
                                <div class="fl_icon">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql12[$i]['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $sql12[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql12[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql12[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php for ($i = 1; $i <= 1; $i++) {  ?>
                        <div class="reveal mgt-26">
                            <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql12[$i]['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql12[$i]['username'] ?>"><?php echo $sql12[$i]['username'] ?></a></label>
                                </div>
                                <div class="small text-muted">Đăng tải vào: <?php echo $sql12[$i]['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $sql12[$i]['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $sql12[$i]['contentblog'] ?></p>
                                <div class="fl_icon">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql12[$i]['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $sql12[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql12[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql12[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                    <div class="card-header mgt-34"><b>Mẹo Công Sở</b></div>
                    <?php for ($i = 0; $i <= 0; $i++) { ?>
                        <div class="reveal">
                            <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql14[$i]['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql14[$i]['username'] ?>"><?php echo $sql14[$i]['username'] ?></a></label>
                                </div>
                                <div class="small text-muted">Đăng tải vào: <?php echo $sql14[$i]['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $sql14[$i]['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $sql14[$i]['contentblog'] ?></p>
                                <div class="fl_icon">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql14[$i]['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $sql14[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql14[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql14[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php for ($i = 1; $i <= 1; $i++) {  ?>
                        <div class="reveal mgt-26">
                            <a href="#!"><img class="card-img-top imggg " src="Img/<?php echo $sql14[$i]['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?php echo $sql14[$i]['username'] ?>"><?php echo $sql14[$i]['username'] ?></a></label>
                                </div>
                                <div class="small text-muted">Đăng tải vào: <?php echo $sql14[$i]['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $sql14[$i]['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $sql14[$i]['contentblog'] ?></p>
                                <div class="fl_icon">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $sql14[$i]['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $sql14[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="Blog.php?idblog=<?php echo $sql14[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="Blog.php?idblog=<?php echo $sql14[$i]['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>

                </div>
            </div>
        </div>
    </div>
    <?php include_once './Footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


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
        }, 3000);
    </script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>