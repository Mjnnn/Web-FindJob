<?php
include 'Config.php';
include  'ConnectMySQL.php';

$us = '';
$sql18 = '';
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
}

if ($us != '' && $us != ' ') {
    $sql17 = "SELECT * FROM `followhired` WHERE `username`= '$us'";
    $sql18 = execute($sql17);
} else {
    $sql18 = [];
}
$countt = count($sql18);

$find = $_POST['data'];
$sql3 = "SELECT * FROM `hired` WHERE `trangthai` = 'Chấp Nhận' AND  `nganhnghe` LIKE '%$find%' OR `chucdanh` LIKE '%$find%'";
$sql4 = execute($sql3);
if (count($sql4)) {
    for ($i = 0; $i < count($sql4); $i++) { ?>
        <div class="col mb-5">
            <div class="card h-100 hoverr">
                <!-- Product image-->
                <img class="card-img-top mh-150 mw-240" src="Img/<?= $sql4[$i]['imgcongviec'] ?>" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder mh-43_5"><?= $sql4[$i]['nganhnghe'] ?></h5>
                        <!-- Product price-->
                        <span class="chucdanh"><?= $sql4[$i]['chucdanh'] ?></span>
                        <div class="mgt-15 detail_job">
                            <p><b>Mức Lương: <?= $sql4[$i]['mucluong'] ?>$</b></p>
                            <span><i>Hạn kết thúc : <?= $sql4[$i]['ngayketthuc'] ?></i></span>
                        </div>
                        <div class="fl_icon mgt-20a">
                            <?php if ($countt) {
                                $d = 0;
                                for ($j = 0; $j < $countt; $j++) {
                                    if ($sql18[$j]['idcongviec'] ==  $sql4[$i]['idcongviec']) {
                                        $d += 1;
                                        break;
                                    }
                                }
                                if ($d == 0) { ?>
                                    <div>
                                        <a href="Search.php?idjob=<?= $sql4[$i]['idcongviec'] ?>" class="fl "><i class="fa-solid fa-heart"></i></a>
                                    </div>
                                <?php   }
                            } else { ?>
                                <div>
                                    <a href="Search.php?idjob=<?= $sql4[$i]['idcongviec'] ?>" class="fl"><i class="fa-solid fa-heart"></i></a>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>

                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="JobDetail.php?idcvv=<?= $sql4[$i]['idcongviec'] ?>">Xem Thêm</a></div>
                </div>
            </div>
        </div>

    <?php } ?>
<?php } else { ?>
    <div class="centerrr error_tk">
        <Span><i class="fa-solid fa-circle-exclamation"></i><b>Không Tìm Thấy Kết Qủa Tìm Kiếm...</b></Span>
        <div class="mgt-20">
            <a href="Search.php">
                <- Trở Lại</a>
        </div>
    </div>
<?php } ?>