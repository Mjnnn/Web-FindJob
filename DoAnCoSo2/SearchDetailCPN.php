<?php
include 'Config.php';
include  'ConnectMySQL.php';

$find = $_POST['data4'];
$us = $_SESSION['us'];
if ($find == '' || $find == ' ') {
    $sql3 = "SELECT * FROM `company` WHERE  `username` = '$us' AND `trangthaichitiet`= 'Chấp Nhận'";
    $sql4 = execute($sql3);
} else {
    $sql3 = "SELECT * FROM `company` WHERE  `username` = '$us' AND `trangthaichitiet`= 'Chấp Nhận' AND `tencongty` LIKE '%$find%' OR `loaihinhhd` OR '%$find%' OR `trangthaicty` LIKE '%$find%'";
    $sql4 = execute($sql3);
}
if (count($sql4)) {
    for ($i = 0; $i < count($sql4); $i++) { ?>
        <div class="row-recent1">
            <div class="row-recent-container " style="justify-content: space-between;">
                <!-- row-item -->
                <div class="row-item">
                    <div class="name-job">
                        <h2 class="name shortt"><?= $sql4[$i]['tencongty'] ?></h2>
                        <div class="level">
                            <span class="sp-level"><?= $sql4[$i]['loaihinhhd'] ?></span>
                        </div>

                    </div>

                    <div class="address-job">
                        <div class="company">
                            <i class="ti-layers-alt"></i>
                            <a href="" class="company-name"><?= $sql4[$i]['trangthaicty'] ?></a>
                        </div>

                        <div class="address">
                            <i class="ti-location-pin"></i>
                            <span class="name-address"><?= $sql4[$i]['diachi'] . ',' . $sql4[$i]['tinh_tp'] . ',' . $sql4[$i]['quocgia'] ?></span>
                        </div>

                    </div>
                </div>
                <!-- apply -->
                <div class="apply">
                    <a href="CompanyDetail.php?idcompany=<?= $sql4[$i]['idcongty'] ?>" class="apply-job">Xem Chi Tiết</a>

                </div>
            </div>
        </div>

    <?php   }
} else { ?>
    <div class="text-center mgt-25">
        <div class="">
            Bạn chưa đăng ký công ty nào với thông tin tìm kiếm này... <a href="ConnectCompany.php">Đăng ký</a>
        </div>
    </div>
<?php }
?>