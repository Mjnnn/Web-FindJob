<?php
$img2 = 'acc.png';
if (isset($_SESSION['img2'])) {
    $img2 = $_SESSION['img2'];
}
// if (isset($_SESSION['user_img'])) {
//     $img2 =  $_SESSION['user_img'];
// }

$us = '';
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
}

$sqlllv2 = [];
$sqlllv = "SELECT * FROM `notification` WHERE `usernametopic`= '$us' ORDER BY `time` DESC LIMIT 0,5";
$sqlllv2 = execute($sqlllv);
$counttv = count($sqlllv2);

$sqlllvv4 = [];
$sqlllvv3 = "SELECT * FROM `notificationadmin` WHERE `username` = '$us' ORDER BY `time` DESC LIMIT 0,5";
$sqlllvv4 = execute($sqlllvv3);
$counttv2 = count($sqlllvv4);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="Css/styleHeader.css">
    <link rel="stylesheet" href="Css/styleHeaderLogin.css">

    <!-- Library -->
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="Hover-master/css/hover-min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.css">

    <!-- Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">

    <!-- Icon Web -->
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">

    <title>FindJob</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <nav class=" navbar navbar-expand-lg navbar-light topbar   sticky-top  bgr_nav ">
        <div class="container-fluid menu">
            <a href="index.php" class="navbar-branch nav-home shake-chunk">FindJob</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto nav-ull" id="navv">
                    <li class="nav-item"><a href="index.php" class="nav-link hvr-underline-from-left">Trang Chủ</a></li>
                    <li class="nav-item"><a href="Company.php" class="nav-link hvr-underline-from-left">Công Ty</a></li>
                    <li class="nav-item"><a href="Blog.php" class="nav-link hvr-underline-from-left">Blog</a></li>
                    <li class="nav-item"><a href="Contact.php" class="nav-link hvr-underline-from-left">Liên Hệ</a></li>
                    <li class="nav-item a1">
                        <button type="button" class="btn btn-success" style="width: 100%;">
                            <a href="MyCV.php" class="btn-nav">Tạo CV</a>
                        </button>
                    </li>

                    <li class="nav-item a1">
                        <button type="button" class="btn btn-primary" style="width: 100%;">
                            <a href="Hired.php" class="btn-nav">Nhà Tuyển Dụng</a>
                        </button>

                    </li>
                    <li class="nav-item a1">
                        <button type="button" class="btn btn-warning" style="width: 100%;">
                            <a href="Search.php" class="btn-nav"> Tìm Kiếm </a>
                        </button>
                    </li>
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <!-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> -->
                    <div class="flx-jt-ct">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1 a2">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?= $counttv ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Thông báo
                                </h6>
                                <?php if ($counttv) {
                                    for ($i = 0; $i < $counttv; $i++) {
                                        $usn = $sqlllv2[$i]['username'];
                                        $imgg = '';
                                        $sqlllv3 = "SELECT imgavata FROM `notification`,`account` WHERE account.username = notification.username AND notification.username = '$usn'";
                                        $sqlllv4 = execute($sqlllv3);
                                        foreach ($sqlllv4 as $value) {
                                            $imgg = $value['imgavata'];
                                        }
                                        if ($sqlllv2[$i]['topic'] == 'blog') { ?>
                                            <a class="dropdown-item d-flex align-items-center" href="BlogPost.php?id=<?= $sqlllv2[$i]['idtopic'] ?>">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <img src="Img/<?= $imgg ?>" alt="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="font-weight-bold"><?= $sqlllv2[$i]['username'] ?> đã bình luận blog của bạn</span>
                                                    <div class="small text-gray-500">vào lúc: <?= $sqlllv2[$i]['time'] ?></div>

                                                </div>
                                            </a>
                                        <?php  } else if ($sqlllv2[$i]['topic'] == 'company') { ?>
                                            <a class="dropdown-item d-flex align-items-center" href="CompanyDetail.php?idcompany=<?= $sqlllv2[$i]['idtopic'] ?>">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <img src="Img/<?= $imgg ?>" alt="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="font-weight-bold"><?= $sqlllv2[$i]['username'] ?> đã bình luận công ty của bạn</span>
                                                    <div class="small text-gray-500">vào lúc: <?= $sqlllv2[$i]['time'] ?></div>
                                                </div>
                                            </a>
                                    <?php  }
                                    }
                                } else { ?>
                                    <div class="no-notify">Hiện tại bạn không có thông báo nào</div>
                                <?php    } ?>
                                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a> -->
                                <?php if ($counttv) { ?>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                <?php   } ?>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1 a2">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?= $counttv2 ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Thông báo từ admin
                                </h6>
                                <?php if ($counttv2) {
                                    for ($j = 0; $j < $counttv2; $j++) {
                                        if ($sqlllvv4[$j]['trangthai'] == 'chấp nhận') {
                                            if ($sqlllvv4[$j]['topic'] == 'Công Ty') { ?>
                                                <a class="dropdown-item d-flex align-items-center" href="CompanyDetail.php?idcompany=<?= $sqlllvv4[$j]['idtopic'] ?>">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" src="Img/adminn.jpg" alt="...">
                                                        <div class="status-indicator bg-success"></div>
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <div class="text-truncate">admin đã <span class="correct">xác nhận</span> công ty của bạn</div>
                                                        <!-- <div class="small text-gray-500">Emily Fowler · 58m</div> -->
                                                    </div>
                                                </a>
                                            <?php    } else if ($sqlllvv4[$j]['topic'] == 'Blog') { ?>
                                                <a class="dropdown-item d-flex align-items-center" href="BlogPost.php?id=<?= $sqlllvv4[$j]['idtopic'] ?>">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" src="Img/adminn.jpg" alt="...">
                                                        <div class="status-indicator bg-success"></div>
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <div class="text-truncate">admin đã <span class="correct">xác nhận</span> blog của bạn</div>
                                                        <!-- <div class="small text-gray-500">Emily Fowler · 58m</div> -->
                                                    </div>
                                                </a>

                                            <?php   } else if ($sqlllvv4[$j]['topic'] == 'Công Việc') { ?>
                                                <a class="dropdown-item d-flex align-items-center" href="JobDetail.php?idcvv=<?= $sqlllvv4[$j]['idtopic'] ?>">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" src="Img/adminn.jpg" alt="...">
                                                        <div class="status-indicator bg-success"></div>
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <div class="text-truncate">admin đã <span class="correct">xác nhận</span> công việc của bạn</div>
                                                        <!-- <div class="small text-gray-500">Emily Fowler · 58m</div> -->
                                                    </div>
                                                </a>

                                            <?php }
                                        } else if ($sqlllvv4[$j]['trangthai'] == 'từ chối') {
                                            if ($sqlllvv4[$j]['topic'] == 'Công Ty') { ?>
                                                <a class="dropdown-item d-flex align-items-center">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" src="Img/adminn.jpg" alt="...">
                                                        <div class="status-indicator bg-success"></div>
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <div class="text-truncate">admin đã <span class="error_correct">từ chối</span> xác nhận công ty của bạn</div>
                                                        <!-- <div class="small text-gray-500">Emily Fowler · 58m</div> -->
                                                    </div>
                                                </a>
                                            <?php    } else if ($sqlllvv4[$j]['topic'] == 'Blog') { ?>
                                                <a class="dropdown-item d-flex align-items-center">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" src="Img/adminn.jpg" alt="...">
                                                        <div class="status-indicator bg-success"></div>
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <div class="text-truncate">admin đã <span class="error_correct">từ chối</span> xác nhận blog của bạn</div>
                                                        <!-- <div class="small text-gray-500">Emily Fowler · 58m</div> -->
                                                    </div>
                                                </a>

                                            <?php   } else if ($sqlllvv4[$j]['topic'] == 'Công Việc') { ?>
                                                <a class="dropdown-item d-flex align-items-center">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" src="Img/adminn.jpg" alt="...">
                                                        <div class="status-indicator bg-success"></div>
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <div class="text-truncate">admin đã <span class="error_correct">từ chối</span> xác nhận công việc của bạn</div>
                                                        <!-- <div class="small text-gray-500">Emily Fowler · 58m</div> -->
                                                    </div>
                                                </a>

                                    <?php }
                                        }
                                    }
                                } else { ?>
                                    <div class="no-notify">Hiện tại bạn không có thông báo nào từ admin</div>
                                <?php    } ?>
                                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="Img/adminn.jpg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a> -->
                                <?php if ($counttv2) { ?>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                <?php  } else {
                                } ?>

                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow a2">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span> -->
                                <img class="img-profile rounded-circle" src="Img/<?= $img2 ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="Profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hồ Sơ
                                </a>
                                <a class="dropdown-item" href="Manager.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Quản Lí
                                </a>
                                <a class="dropdown-item" href="Follow.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Theo Dõi
                                </a>
                                <a class="dropdown-item" href="ChangePass.php">
                                    <i class="fa-solid fa-lock text-gray-400 mr-2"></i>
                                    Đổi mật khẩu
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./LoginOut.php" data-toggle="" data-target="#logoutModal">
                                    <!-- modal -->
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng Xuất
                                </a>
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <script src="Js/headerLogin.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->

    <!-- Page level plugins -->
    <script src="Js/chart-area-demo.js"></script>
    <script src="Js/chart-pie-demo.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
<script>
    AOS.init();
</script>

</html>