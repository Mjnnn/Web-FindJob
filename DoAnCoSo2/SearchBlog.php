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
$findjobb = '';
if (isset($_SESSION['findjobb'])) {
    if ($_SESSION['findjobb'] != '' && $_SESSION['findjobb'] != ' ') {
        $findjobb = $_SESSION['findjobb'];
        $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND `titleblog` LIKE '%$findjobb%' OR `contentblog` LIKE '%$findjobb%' OR `topicblog` LIKE '%$findjobb%' ORDER BY timeblog DESC LIMIT 0,8";
        $sql4 = execute($sql3);
        unset($_SESSION['findjobb']);
    } else {
        $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận'  ORDER BY timeblog DESC LIMIT 0,8";
        $sql4 = execute($sql3);
    }
} else {
    $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận'  ORDER BY timeblog DESC LIMIT 0,8";
    $sql4 = execute($sql3);
}
$findblogg = '';
$chosetime = '';
$chosetl = '';
if (isset($_POST['timkiem'])) {
    $findblogg = $_POST['findblogg'];
    $chosetime = $_POST['chosetime'];
    $chosetl = $_POST['chosetl'];
    if ($findblogg != '' && $findblogg != ' ') {
        if ($chosetime != 0 && $chosetime != '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND  `topicblog`= '$chosetl' AND MONTH(timeblog)='$chosetime'  ORDER BY timeblog DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosetime == 0 || $chosetime == '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND  `topicblog`= '$chosetl' AND `titleblog` LIKE '%$findblogg%' OR `contentblog` LIKE '%$findblogg%'  ORDER BY timeblog DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosetl == 0 || $chosetl == '0' && $chosetime != 0 && $chosetime != '0') {
            $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND  MONTH(timeblog)='$chosetime' AND `titleblog` LIKE '%$findblogg%' OR `contentblog` LIKE '%$findblogg%'  ORDER BY timeblog DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else {
            $sql3 = "SELECT * FROM `blog`  WHERE `trangthai`='Chấp Nhận' AND `titleblog` LIKE '%$findblogg%' OR `contentblog` LIKE '%$findblogg%' OR `topicblog` LIKE '%$findblogg%'  ORDER BY timeblog DESC LIMIT 0,8  ";
            $sql4 = execute($sql3);
        }
    } else if ($findblogg == '' || $findblogg == ' ') {
        if ($chosetime == 0 && $chosetl == 0) {
            $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận'  ORDER BY timeblog DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosetime == 0 || $chosetime == '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND  `topicblog`= '$chosetl' ORDER BY timeblog DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosetl == 0 || $chosetl == '0' && $chosetime != 0 && $chosetime != '0') {
            $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND  MONTH(timeblog)='$chosetime'  ORDER BY timeblog DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosetime != 0 && $chosetime != '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND  `topicblog`= '$chosetl' AND MONTH(timeblog)='$chosetime'  ORDER BY timeblog DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        }
    }
}
$sql18 = '';
if ($us != '' && $us != ' ') {
    $sql17 = "SELECT * FROM `followblog` WHERE `username`= '$us'";
    $sql18 = execute($sql17);
} else {
    $sql18 = [];
}
$countt = count($sql18);

if (isset($_GET['idd'])) {
    if ($us == '' || $us == ' ') {
        header('location: Login.php');
    } else {
        $idblog = $_GET['idd'];
        $sql15 = "INSERT INTO `followblog` (`username`,`idblog`) VALUES ('$us','$idblog') ";
        $sql16 = insertA($sql15);
        if ($sql16) {
            echo '<script language="javascript">
            alert("Đã theo dõi bài viết này!!!");
        </script>';
            header('location: SearchBlog.php');
        } else {
            echo '<script language="javascript">
            alert("Theo dõi không thành công, vui lòng thử lại!!!");
        </script>';
            header('location: SearchBlog.php');
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
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="Css/styleSearchBlog.css">
    <title>Tìm Kiếm</title>
    <!-- Favicon-->
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="Css/styleSeacrh.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <style>
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
    <script type="text/javascript">
        $(document).ready(function() {
            // $('.tk_nc').click(function() {
            //     $('.item_bs').toggle();
            // });

            $('.search_key').keyup(function() {
                var txt = $('.search_key').val();
                $.post('SearchBlogDetail.php', {
                    data2: txt
                }, function(data2) {
                    $('.list_searchh').html(data2);

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
    <div class="header_search  mgt-65">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="Img/sl2.jpg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl6.jpg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl9.jpg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl16.jpg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl18.jpg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl19a.jpg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl20b.jpg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl22a.jpeg" alt="" class="img_sl">
                </div>
                <div class="swiper-slide">
                    <img src="Img/sl23a.jpg" alt="" class="img_sl">
                </div>
            </div>
            <div class="swiper-button-next" style="display: none;"></div>
            <div class="swiper-button-prev" style="display: none;"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="grid">
            <div class="wide">
                <div class="search_item">
                    <form action="" method="post" class="form_searchh">
                        <input type="text" placeholder="Nhập từ khóa tìm kiếm..." class="search_key" name="findblogg">
                        <span class="search_icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <div class="button_search">
                            <input type="submit" value="Tìm Kiếm" class="btn btn-primary search_bt" name="timkiem">
                        </div>
                        <div class="pdt-15"></div>
                        <span class="icon_location"><i class="fa-solid fa-location-dot"></i>
                        </span>
                        <select name="chosetime" id="" class="sl1">
                            <option value="0">Tìm kiếm theo tháng</option>
                            <script language="javascript">
                                var states = new Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
                                for (var hi = 0; hi < states.length; hi++)
                                    document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                            </script>

                        </select>
                        <span class="icon_work"><i class="fa-solid fa-briefcase"></i></span>
                        <select name="chosetl" id="" class="sl2">
                            <option value="0">Chọn thể loại...</option>
                            <script language="javascript">
                                var states = new Array("Hướng Nghiệp", "Kinh Nghiệm Phỏng vấn", "Mẹo Công Sở", "Thực Chiến", "Góc Chuyên Gia", "Bí Quyết Tìm Việc", "Khác...");
                                for (var hi = 0; hi < states.length; hi++)
                                    document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                            </script>
                        </select>
                        <!-- <div class="item_nc">
                            <span class=""><a class="tk_nc">Tìm kiến nâng cao <i class="fa-solid fa-chevron-down"></i></a></span>
                        </div> -->
                        <div class="mgt-15 item_bs">
                            <span class="icon_chucdanh"><i class="fa-sharp fa-solid fa-file-signature"></i>
                            </span>
                            <select name="" id="" class="sl1">
                                <script language="javascript">
                                    var states = new Array("Chọn chức danh...", "Fulltime", "Partime", "Thực Tập", "Thời Vụ", "Tự Lập", "Hợp Đồng", "Permanent", "Casual/Temporary");
                                    for (var hi = 0; hi < states.length; hi++)
                                        document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                                </script>
                            </select>
                            <span class="icon_type"><i class="fa-solid fa-filter"></i></span>
                            <select name="" id="" class="sl2">
                                <script language="javascript">
                                    var states = new Array("Chọn thể loại...", "Fulltime", "Partime", "Thực Tập", "Thời Vụ", "Tự Lập", "Hợp Đồng", "Permanent", "Casual/Temporary");
                                    for (var hi = 0; hi < states.length; hi++)
                                        document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                                </script>
                            </select>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center list_searchh">
                <?php if (count($sql4)) {
                    for ($i = 0; $i < count($sql4); $i++) { ?>
                        <div class="col mb-5">
                            <div class="card h-100 hoverr">
                                <!-- Product image-->
                                <img class="card-img-top mh-150 mw-240" src="Img/<?= $sql4[$i]['imgblog'] ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->

                                        <h5 class="fw-bolder title_blogg"><?= $sql4[$i]['titleblog'] ?></h5>
                                        <!-- Product price-->
                                        <span class="chucdanh content_blogg"><?= $sql4[$i]['contentblog'] ?></span>
                                        <div class="mgt-15 detail_job">
                                            <span><i>Ngày đăng tải : <?= $sql4[$i]['timeblog'] ?></i></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="fl_icon mgb-10">
                                    <?php if ($countt) {
                                        $d = 0;
                                        for ($j = 0; $j < $countt; $j++) {
                                            if ($sql18[$j]['idblog'] ==  $sql4[$i]['idblog']) $d += 1;
                                        }
                                        if ($d == 0) { ?>
                                            <div>
                                                <a href="SearchBlog.php?idd=<?= $sql4[$i]['idblog'] ?>" class="fl "><i class="fa-solid fa-heart"></i></a>
                                            </div>
                                        <?php   }
                                    } else { ?>
                                        <div>
                                            <a href="SearchBlog.php?idd=<?= $sql4[$i]['idblog'] ?>" class="fl"><i class="fa-solid fa-heart"></i></a>
                                        </div>
                                    <?php  } ?>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent mgt-10">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="BlogPost.php?id=<?= $sql4[$i]['idblog'] ?>">Xem Thêm</a></div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
            </div>
            <div class="pagination">
                <ul class="" style="display: flex;">
                    <li class="btn-prev btn-active"><a href="#" class=""><b>&laquo;</b></a></li>
                    <div id="number-page" class="number-page" style="display: flex;">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                    </div>
                    <li class="btn-next"><a href="#" class=""><b>&raquo;</b></a></li>
                </ul>

            </div>
        <?php  } else { ?>
            <div class="centerrr error_tk">
                <Span><i class="fa-solid fa-circle-exclamation"></i><b>Không Tìm Thấy Kết Qủa Tìm Kiếm...</b></Span>
                <div class="mgt-20">
                    <a href="SearchBlog.php">
                        <- Trở Lại</a>
                </div>
            </div>
        <?php } ?>
        <!-- <div class="col mb-5">
                    <div class="card h-100 hoverr">
                     
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    
                        <img class="card-img-top" src="Img/imgsearch.jfif" alt="..." />
                        
                        <div class="card-body p-4">
                            <div class="text-center">
                            
                                <h5 class="fw-bolder">Special Item</h5>
                                
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                             
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                        
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Xem Thêm</a></div>
                        </div>
                    </div>
                </div> -->
        <!-- ==================================job  -->



        </div>
    </section>
    <?php include_once './Footer.php' ?>
    <!-- Footer-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>



    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</body>

</html>