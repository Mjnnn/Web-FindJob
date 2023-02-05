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

$sql18 = '';
if ($us != '' && $us != ' ') {
    $sql17 = "SELECT * FROM `followcompany` WHERE `username`= '$us'";
    $sql18 = execute($sql17);
} else {
    $sql18 = [];
}
$countt = count($sql18);

if (isset($_GET['idscpn'])) {
    if ($us == '' || $us == ' ') {
        header('location: Login.php');
    } else {
        $idscpn = $_GET['idscpn'];
        $sql15 = "INSERT INTO `followcompany` (`username`,`idcongty`) VALUES ('$us','$idscpn') ";
        $sql16 = insertA($sql15);
        if ($sql16) {
            echo '<script language="javascript">
            alert("Đã theo dõi công ty này!!!");
        </script>';
            header('location: SearchCompany.php');
        } else {
            echo '<script language="javascript">
            alert("Theo dõi không thành công, vui lòng thử lại!!!");
        </script>';
            header('location: SearchCompany.php');
        }
    }
}
$findcompany = '';
$addresscompany = '';
if (isset($_SESSION['findcompany'])) {
    $findcompany = $_SESSION['findcompany'];
    if (isset($_SESSION['addresscompany'])) {
        $addresscompany = $_SESSION['addresscompany'];
        if ($_SESSION['findcompany'] != '' && $_SESSION['findcompany'] != ' ') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận'  AND `tencongty` LIKE '%$findcompany%' OR `tinh_tp` LIKE '%$addresscompany%' OR `diachi` LIKE '%$addresscompany%' OR `loaihinhhd` LIKE '%$findcompany%' ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
            unset($_SESSION['findcompany']);
        } else {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND `tinh_tp` LIKE '%$addresscompany%' OR `diachi` LIKE '%$addresscompany%'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        }
        unset($_SESSION['addresscompany']);
    } else {
        if ($_SESSION['findcompany'] != '' && $_SESSION['findcompany'] != ' ') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận'  AND `tencongty` LIKE '%$findcompany%' OR `tinh_tp` LIKE '%$findcompany%' OR `diachi` LIKE '%$findcompany%' OR `loaihinhhd` LIKE '%$findcompany%' ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
            unset($_SESSION['findcompany']);
        } else {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        }
    }
} else if (isset($_SESSION['addresscompany'])) {
    $addresscompany = $_SESSION['addresscompany'];
    $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND `tinh_tp` LIKE '%$addresscompany%' OR `diachi` LIKE '%$addresscompany%'  ORDER BY ngaydangky DESC LIMIT 0,8";
    $sql4 = execute($sql3);
    unset($_SESSION['addresscompany']);
} else {
    $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận'  ORDER BY ngaydangky DESC LIMIT 0,8";
    $sql4 = execute($sql3);
}
$findcompanyy = '';
$chosedd = '';
$chosetl = '';
if (isset($_POST['timkiem'])) {
    $findcompanyy = $_POST['findcompanyy'];
    $chosedd = $_POST['chosedd'];
    $chosetl = $_POST['chosetl'];
    if ($findcompanyy != '' && $findcompanyy != ' ') {
        if ($chosedd != 0 && $chosedd != '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND  `loaihinhhd`= '$chosetl' AND `tinh_tp`='$chosedd'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosedd == 0 || $chosedd == '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND  `loaihinhhd`= '$chosetl' AND `tencongty` LIKE '%$findcompanyy%'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosetl == 0 || $chosetl == '0' && $chosedd != 0 && $chosedd != '0') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND  `tinh_tp`='$chosedd' AND `tencongty` LIKE '%$findcompanyy%' OR `loaihinhhd` LIKE '%$findcompanyy%'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else {
            $sql3 = "SELECT * FROM `company`  WHERE `trangthaichitiet`='Chấp Nhận' AND `tencongty` LIKE '%$findcompanyy%' OR `loaihinhhd` LIKE '%$findcompanyy%' OR `tinh_tp` LIKE '%$findcompanyy%'  ORDER BY ngaydangky DESC LIMIT 0,8  ";
            $sql4 = execute($sql3);
        }
    } else if ($findcompanyy == '' || $findcompanyy == ' ') {
        if ($chosedd == 0 && $chosetl == 0) {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosedd == 0 || $chosedd == '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND  `loaihinhhd`= '$chosetl' ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosetl == 0 || $chosetl == '0' && $chosedd != 0 && $chosedd != '0') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND `tinh_tp`='$chosedd'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
        } else if ($chosedd != 0 && $chosedd != '0' && $chosetl != 0 && $chosetl != '0') {
            $sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND `loaihinhhd`= '$chosetl' AND `tinh_tp`='$chosedd'  ORDER BY ngaydangky DESC LIMIT 0,8";
            $sql4 = execute($sql3);
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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
                $.post('SearchCompanyDetail.php', {
                    data3: txt
                }, function(data3) {
                    $('.list_searchh').html(data3);

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
                        <input type="text" placeholder="Nhập từ khóa tìm kiếm..." class="search_key" name="findcompanyy">
                        <span class="search_icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <div class="button_search">
                            <input type="submit" value="Tìm Kiếm" class="btn btn-primary search_bt" name="timkiem">
                        </div>
                        <div class="pdt-15"></div>
                        <span class="icon_location"><i class="fa-solid fa-location-dot"></i>
                        </span>
                        <select name="chosedd" id="" class="sl1">
                            <option value="0">Tìm kiếm theo tỉnh/tp</option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                            <option value="An Giang">An Giang</option>
                            <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                            <option value="Bạc Liêu">Bạc Liêu</option>
                            <option value="Bắc Cạn">Bắc Cạn</option>
                            <option value="Bắc Giang">Bắc Giang</option>
                            <option value="Bắc Ninh">Bắc Ninh</option>
                            <option value="Bến Tre">Bến Tre</option>
                            <option value="Bình Dương">Bình Dương</option>
                            <option value="Bình Định">Bình Định</option>
                            <option value="Bình Phước">Bình Phước</option>
                            <option value="Bình Thuận">Bình Thuận</option>
                            <option value="Cà Mau">Cà Mau</option>
                            <option value="Cao Bằng">Cao Bằng</option>
                            <option value="Cần Thơ">Cần Thơ</option>
                            <option value="Dak Lak">Dak Lak</option>
                            <option value="Dak Nông">Dak Nông</option>
                            <option value="Đà Nẵng">Đà Nẵng</option>
                            <option value="Điện Biên">Điện Biên</option>
                            <option value="Đồng Bằng Sông Cửu Long">Đồng Bằng Sông Cửu Long</option>
                            <option value="Đồng Nai">Đồng Nai</option>
                            <option value="Đồng Tháp">Đồng Tháp</option>
                            <option value="Gia Lai">Gia Lai</option>
                            <option value="Hà Giang">Hà Giang</option>
                            <option value="Hà Nam">Hà Nam</option>
                            <option value="Hà Tĩnh">Hà Tĩnh</option>
                            <option value="Hải Dương">Hải Dương</option>
                            <option value="Hải Phòng">Hải Phòng</option>
                            <option value="Hậu Giang">Hậu Giang</option>
                            <option value="Hòa Bình">Hòa Bình</option>
                            <option value="Hưng Yên">Hưng Yên</option>
                            <option value="Khánh Hòa">Khánh Hòa</option>
                            <option value="Kiên Giang">Kiên Giang</option>
                            <option value="Kon Tum">Kon Tum</option>
                            <option value="Lai Châu">Lai Châu</option>
                            <option value="Lạng Sơn">Lạng Sơn</option>
                            <option value="Lào Cai">Lào Cai</option>
                            <option value="Lâm Đồng">Lâm Đồng</option>
                            <option value="Long An">Long An</option>
                            <option value="Nam Định">Nam Định</option>
                            <option value="Nghệ An">Nghệ An</option>
                            <option value="Ninh Bình">Ninh Bình</option>
                            <option value="Ninh Thuận">Ninh Thuận</option>
                            <option value="Phú Thọ">Phú Thọ</option>
                            <option value="Phú Yên">Phú Yên</option>
                            <option value="Quảng Bình">Quảng Bình</option>
                            <option value="Quảng Nam">Quảng Nam</option>
                            <option value="Quảng Ngãi">Quảng Ngãi</option>
                            <option value="Quảng Ninh">Quảng Ninh</option>
                            <option value="Quảng Trị">Quảng Trị</option>
                            <option value="Sóc Trăng">Sóc Trăng</option>
                            <option value="Sơn La">Sơn La</option>
                            <option value="Tây Ninh">Tây Ninh</option>
                            <option value="Thái Bình">Thái Bình</option>
                            <option value="Thái Nguyên">Thái Nguyên</option>
                            <option value="Thanh Hóa">Thanh Hóa</option>
                            <option value="Thừa Thiên- Huế">Thừa Thiên- Huế</option>
                            <option value="Tiền Giang">Tiền Giang</option>
                            <option value="Toàn quốc">Toàn quốc</option>
                            <option value="Trà Vinh">Trà Vinh</option>
                            <option value="Tuyên Quang">Tuyên Quang</option>
                            <option value="Vĩnh Long">Vĩnh Long</option>
                            <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                            <option value="Yên Bái">Yên Bái</option>
                            <option value="Khác">Khác</option>

                        </select>
                        <span class="icon_work"><i class="fa-solid fa-briefcase"></i></span>
                        <select name="chosetl" id="" class="sl2">
                            <option value="0">Thể loại hoạt động...</option>
                            <script language="javascript">
                                var states = new Array("100% vốn nước ngoài", "Cá Nhân", "Công Ty Đa Quốc Gia", "Cổ Phần", "Liên Doanh", "Nhà Nước", "Trách Nhiệm Hữu Hạn", "Khác");
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
                                <img class="card-img-top mh-150 mw-240" src="Img/<?= $sql4[$i]['imgcompany'] ?>" alt="..." />
                                <div class="centerrr mgt-10">
                                    <ul class="icon__star">
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>
                                        <li><i class="bx bxs-star"></i></li>

                                    </ul>
                                </div>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->

                                        <h5 class="fw-bolder mh-43_5"><?= $sql4[$i]['tencongty'] ?></h5>
                                        <!-- Product price-->
                                        <span class="chucdanh ">
                                            <div class="mh-42 ">Loại hình: <?= $sql4[$i]['loaihinhhd'] ?></div>
                                        </span>
                                        <div class="mgt-5 detail_job mh-43_5">
                                            <span><i>Trạng thái: <?= $sql4[$i]['trangthaicty'] ?></i></span>
                                        </div>
                                        <div class="fl_icon mgt-20a">
                                            <?php if ($countt) {
                                                $d = 0;
                                                for ($j = 0; $j < $countt; $j++) {
                                                    if ($sql18[$j]['idcongty'] ==  $sql4[$i]['idcongty']) {
                                                        $d += 1;
                                                        break;
                                                    }
                                                }
                                                if ($d == 0) { ?>
                                                    <div>
                                                        <a href="SearchCompany.php?idscpn=<?= $sql4[$i]['idcongty'] ?>" class="fl "><i class="fa-solid fa-heart"></i></a>
                                                    </div>
                                                <?php   }
                                            } else { ?>
                                                <div>
                                                    <a href="SearchCompany.php?idscpn=<?= $sql4[$i]['idcongty'] ?>" class="fl"><i class="fa-solid fa-heart"></i></a>
                                                </div>
                                            <?php  } ?>
                                        </div>
                                    </div>

                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="CompanyDetail.php?idcompany=<?= $sql4[$i]['idcongty'] ?>">Xem Thêm</a></div>
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
                    <a href="SearchCompany.php">
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