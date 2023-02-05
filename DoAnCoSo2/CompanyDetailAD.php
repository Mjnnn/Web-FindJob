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
$idcompany = '';
$namecompany = '';
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
    header('location: ../Admin/404.html');
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
    <link rel="stylesheet" href="Css/styleCompanyDeatil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <!-- find -->
    <section class="job-post pdt-80">
        <div class="job-container">
            <div class="bg-find">
                <form action="" class="form-search flex-item">
                    <span class="fa fa-search"></span>
                    <input type="text" class="search" placeholder="Tên Công ty, từ khóa...">
                    <div class="location-icon">
                        <input type="text" class="searchs s-address" placeholder="Địa chỉ">
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

                    <div class="doc-right" style="display: none;">
                        <div class="apply">
                            <a href="./login.html" class="apply-job">Apply Job</a>

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
                                        + <a href="JobDetailAD.php?idcvv=<?= $sql6[$j]['idcongviec'] ?>"><?= $sql6[$j]['nganhnghe'] . ' '  ?>(<?= '' . $sql6[$j]['chucdanh'] . '' ?>)</a>
                                    <?php } ?>

                                </p>
                            </div>
                        </div>
                        <div class="tab-content" id="doc-cong-ty" style="text-align: center;">
                            <div><?php if ($sql4[$i]['nhunglocation'] == '' || $sql4[$i]['nhunglocation'] == ' ') { ?>
                                    <div class="pdb-50 fn-st">
                                        <?= $sql4[$i]['username'] ?> chưa cập nhật địa chỉ công ty mình trên map website JindJob...
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

    <?php } ?>

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