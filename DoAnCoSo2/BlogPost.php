<?php
include 'ConnectMySQL.php';
include 'Config.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$us = '';

if (isset($_GET['id'])) {
    $idbl = $_GET['id'];
} else {
    header('location: ../Admin/404-web.php');
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
    $sql17 = "SELECT * FROM `followblog` WHERE `username`= '$us'";
    $sql18 = execute($sql17);
}

$sql20 = [];
$sql19 = "SELECT * FROM `ratingblog` WHERE `idblog`='$idbl' ORDER BY `time` DESC LIMIT 0,4";
$sql20 = execute($sql19);
$countttt = count($sql20);

if (isset($_GET['idblogg'])) {
    if ($us == '' || $us == ' ') {
        header('location: Login.php');
    } else {
        $idblog = $_GET['idblogg'];
        $sql15 = "INSERT INTO `followblog` (`username`,`idblog`) VALUES ('$us','$idblog') ";
        $sql16 = insertA($sql15);
        if ($sql16) {
            echo '<script language="javascript">
            alert("Đã theo dõi bài viết này!!!");
        </script>';
            header("location: BlogPost.php?id=$idblog");
        } else {
            echo '<script language="javascript">
            alert("Theo dõi không thành công, vui lòng thử lại!!!");
        </script>';
            header("location: BlogPost.php?id=$idblog");
        }
    }
} else {
    if (isset($_GET['id'])) {
        $idbl = $_GET['id'];
        $id = $_GET['id'];
        $sql3 = "SELECT * FROM blog WHERE `idblog`= '$id'";
        $sql4 = execute($sql3);
        $topicblog = '';
        foreach ($sql4 as $value) {
            $topicblog = $value['topicblog'];
            $nameblog = $value['titleblog'];
        }
        $sql5 = "SELECT * FROM blog WHERE `topicblog`='$topicblog'ORDER BY timeblog ASC LIMIT 0,3";
        $sql6 = execute($sql5);
    } else {
        header('location: ../Admin/404-web.html');
    }
}
$id = '';
$nameblog = '';

$now = getdate();
$timee = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"] . " " . $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];



$findjob = '';
if (isset($_POST['timkiem'])) {
    $findjob = $_POST['findjob'];
    if ($findjob != '' && $findjob != ' ') {
        $_SESSION['findjobb'] = $_POST['findjob'];
    }
    header('location: SearchBlog.php');
}

if (isset($_POST['dangtai'])) {
    if ($us == '' || $us == ' ') {
        header('location: Login.php');
    } else {
        $usnotify = '';
        $sqlv = "SELECT username FROM `blog` WHERE `idblog`='$idbl'";
        $sqlv2 = execute($sqlv);
        foreach ($sqlv2 as $value) {
            $usnotify = $value['username'];
        }
        $rating = $_POST['rating'];
        $contentt = $_POST['contentt'];
        $sqll = "INSERT INTO `ratingblog` (`username`,`idblog`,`content`,`ratingblog`,`time`)  VALUES('$us','$idbl','$contentt','$rating','$timee')";
        $sqll2 = insertA($sqll);
        if ($sqll2) {
            echo '<script language="javascript">
            alert("Đăng tải thành công!!!");
        </script>';
            $sqlv3 = "INSERT INTO `notification` (`usernametopic`,`username`,`idtopic`,`topic`,`time`) VALUES ('$usnotify','$us','$idbl','blog','$timee')";
            $sqlv4 = insertA($sqlv3);
            $sql20 = [];
            $sql19 = "SELECT * FROM `ratingblog` WHERE `idblog`='$idbl' ORDER BY `time` DESC LIMIT 0,4";
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?= $nameblog ?></title>
    <!-- Favicon-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="Css/styleBlogPost.css" rel="stylesheet" />
    <link href="v2.3.2/jquery.rateyo.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <!-- Page content-->
    <div class="container ">
        <div class="row mgt-130">
            <div class="col-lg-8">
                <?php foreach ($sql4 as $value) { ?>
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $value['titleblog'] ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2 mgt-15 fl_icon">
                                <div class="ava-us">
                                    <img src="Img/acc.png" alt="" class="avatar"><label for=""><a href="ProfileUser.php?iduse=<?= $value['username'] ?>"><?php echo $value['username'] . ' - ' ?></a> Đăng tải vào: <?php echo $value['timeblog'] ?></label>
                                </div>
                                <div>

                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        foreach ($sql18 as $value2) {
                                            if ($value2['idblog'] == $value['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="BlogPost.php?idblogg=<?= $value['idblog'] ?>" class="ic_fl">Theo Dõi <i class="fa-regular fa-heart"></i></a>
                                        <?php  }
                                    } else { ?>
                                        <a href="BlogPost.php?idblogg=<?= $value['idblog'] ?>" class="ic_fl">Theo Dõi <i class="fa-regular fa-heart"></i></a>
                                    <?php   } ?>
                                </div>

                            </div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="Img/<?php echo $value['imgblog'] ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4" class="cnt-blg"><?= $value['contentblog'] ?></p>

                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
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
                                        $rt = $sql20[$i]['ratingblog'];
                                        $imgrt = '';
                                        $sql22 = [];
                                        $sql21 = "SELECT imgavata FROM `ratingblog`,`account` WHERE ratingblog.username = account.username AND ratingblog.username = '$use'";
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
                    </section>

                <?php } ?>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header"><b>Tìm Kiếm</b></div>
                    <div class="card-body">
                        <form class="input-group" method="POST">
                            <input class="form-control" type="text" placeholder="Nhập từ khóa tìm kiếm..." aria-label="Enter search term..." aria-describedby="button-search" name="findjob" />
                            <input class="btn btn-primary" type="submit" value="Tìm Kiếm" name="timkiem">
                        </form>
                        <div class="post_blog mgt-18">
                            <a href="PostBlog.php" class="btn btn-dark">=>>> Đăng Tải Blog Của Bạn</a>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <!-- <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header"><b>Liên quan</b></div>
                    <?php foreach ($sql6 as $value) { ?>
                        <div class="">
                            <a href="#!"><img class="card-img-top" src="Img/<?php echo $value['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">Đăng tải lúc: <?php echo $value['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $value['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $value['contentblog'] ?></p>
                                <div class="fl_icon2">
                                    <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $value['idblog'] ?>">Xem Thêm →</a>
                                    <?php if (count($sql18)) {
                                        $d = 0;
                                        for ($j = 0; $j < count($sql18); $j++) {
                                            if ($sql18[$j]['idblog'] == $value['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <a href="BlogPost.php?idblogg=<?php echo $value['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                        <?php }
                                    } else { ?>
                                        <a href="BlogPost.php?idblogg=<?php echo  $value['idblog'] ?>"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/v2.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="/v2.3.2/jquery.rateyo.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>