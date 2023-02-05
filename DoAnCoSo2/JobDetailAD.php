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
$idcv = '';
if (isset($_GET['idcvv'])) {
    $idcv = $_GET['idcvv'];
    $sql3 = "SELECT * FROM `hired` WHERE `idcongviec`='$idcv'";
    $sql4 = execute($sql3);
    $idcongty = '';
    $namecongviec = '';
    foreach ($sql4 as $value) {
        $idcongty = $value['idcongty'];
        $namecongviec = $value['nganhnghe'];
    }
    $sql5 = "SELECT * FROM `company` WHERE `idcongty`='$idcongty'";
    $sql6 = execute($sql5);
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
    <title><?= $namecongviec ?></title>
    <link rel="stylesheet" href="Css/styleJobDeatil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <!-- find -->
    <section class="job-post">
        <div class="job-container pdt-35">
            <div class="bg-find">
                <form action="" class="form-search flex-item">
                    <span class="fa fa-search"></span>
                    <input type="text" class="search" placeholder="Tên Công việc, từ khóa...">
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
    <?php for ($i = 0; $i < count($sql4); $i++) { ?>
        <section class="job-post">
            <div class="job-container">

                <div class="docc">
                    <div class="doc-left">
                        <div class="image-job">
                            <img src="Img/<?= $sql4[$i]['imgcongviec'] ?>" alt="">
                        </div>
                        <div class="doc-cont">
                            <h3 class="doc-department mg-10">
                                <?= $sql4[$i]['nganhnghe'] ?>
                            </h3>
                            <p class="address-job">
                                Chức Danh: <?= $sql4[$i]['chucdanh'] ?>
                            </p>
                            <p class="deadline">Mức Lương: <?= $sql4[$i]['mucluong'] ?><b>$</b></p>
                            <p>Địa Điểm Làm Việc: <span><?php echo $sql6[$i]['diachi'] . ',' . $sql6[$i]['tinh_tp'] . ',' . $sql6[$i]['quocgia']  ?></span></p>
                            <p class="end_job">Hạn Kết thúc: <?= $sql4[$i]['ngayketthuc'] ?></p>
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
                                    Chi tiết công việc
                                </h4>
                                <p class="main-detail">
                                    <?= $sql4[$i]['luyy'] ?>

                                </p>
                            </div>
                            <div class="item-tab flex_xx fl_p">
                                <h4 class="header-detail">
                                    Thể Loại:
                                </h4>
                                <p class="main-detail">
                                    <?= $sql4[$i]['theloai'] ?>
                                </p>
                            </div>
                            <div class="item-tab flex_xx fl_p mgt-10">
                                <h4 class="header-detail">
                                    Số Lượng Tuyển Dụng:
                                </h4>
                                <p class="main-detail">
                                    <?= $sql4[$i]['soluong'] ?>
                                </p>
                            </div>
                            <div class="item-tab flex_xx fl_p mgt-10">
                                <h4 class="header-detail">
                                    Công Ty:
                                </h4>
                                <p class="main-detail cpn_1">
                                    <a href="CompanyDetailAD.php?idcompany=<?php echo $sql6[$i]['idcongty'] ?>"> <?= '' . $sql6[$i]['tencongty'] ?></a>

                                </p>
                            </div>
                        </div>
                        <div class="tab-content" id="doc-cong-ty" style="text-align: center;">
                            <div><?= $sql6[$i]['nhunglocation'] ?></div>
                        </div>
                        <div class="tab-content" id="doc-cong-ty">
                            <div class="item-tab">
                                <h4 class="header-detail">
                                    Người Liên Hệ:
                                </h4>
                                <div class="detail_lh">
                                    <img src="Img/<?php echo $sql6[$i]['imgnguoilh'] ?>" alt="" class="img_lh">
                                    <p class="main-detail centerrr">
                                        <?php echo $sql6[$i]['tennguoilh'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="item-tab">
                                <h4 class="header-detail">
                                    Chi tiết liên hệ:
                                </h4>
                                <p class="main-detail">
                                    Trụ sở chính: <?php echo $sql6[$i]['diachi'] . ',' . $sql6[$i]['tinh_tp'] . ',' . $sql6[$i]['quocgia']  ?> <br>
                                    ĐT: <?php echo $sql6[$i]['sdt'] ?>, Fax: 024. 37689433 <br>
                                    E-mail: <?php echo $sql6[$i]['email'] ?> <br>
                                    <?php if ($sql6[$i]['linkwebsite'] != '') { ?>
                                        Website: <a href="<?php echo $sql6[$i]['linkwebsite'] ?>" class="hi"><?php echo $sql6[$i]['linkwebsite'] ?></a>
                                    <?php   } ?> <br>


                                </p>
                            </div>
                        </div>
                        <div class="tab-content" id="doc-viec-lam">
                            <h4 class="header-detail">
                                CÁC PHÚC LỢI DÀNH CHO BẠN
                            </h4>
                            <p class="main-detail">
                                <?= $sql6[$i]['phucloicty'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="Js/changeTabJobDetail.js"></script>
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            var header = document.querySelector('.header');
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
</body>

</html>