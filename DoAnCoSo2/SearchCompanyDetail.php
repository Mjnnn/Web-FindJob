<?php
include 'Config.php';
include  'ConnectMySQL.php';
$us = '';
$sql18 = '';
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
}

if ($us != '' && $us != ' ') {
    $sql17 = "SELECT * FROM `followcompany` WHERE `username`= '$us'";
    $sql18 = execute($sql17);
} else {
    $sql18 = [];
}
$countt = count($sql18);
$find = $_POST['data3'];
$sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' AND `tencongty` LIKE '%$find%' OR `loaihinhhd` LIKE '%$find%' OR `tinh_tp` LIKE '%$find%' ORDER BY ngaydangky DESC LIMIT 0,8";
$sql4 = execute($sql3);
if (count($sql4)) {
    for ($i = 0; $i < count($sql4); $i++) {
?>
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
                        <div class="mgt-5 detail_job">
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
<?php  } else { ?>
    <div class="centerrr error_tk">
        <Span><i class="fa-solid fa-circle-exclamation"></i><b>Không Tìm Thấy Kết Qủa Tìm Kiếm...</b></Span>
        <div class="mgt-20">
            <a href="SearchCompany.php">
                <- Trở Lại</a>
        </div>
    </div>
<?php } ?>