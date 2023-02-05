<?php
include 'Config.php';
include  'ConnectMySQL.php';

$find = $_POST['data7'];
$us = $_SESSION['us'];
if ($find == '' || $find == ' ') {
    $sql5 = "SELECT followcompany.idcongty,followcompany.username,tencongty,loaihinhhd,trangthaicty,diachi,tinh_tp,quocgia FROM followcompany,company WHERE followcompany.idcongty = company.idcongty AND company.trangthaichitiet='Chấp Nhận' AND followcompany.username = '$us'";
    $sql6 = execute($sql5);
} else {
    $sql5 = "SELECT followcompany.idcongty,followcompany.username,tencongty,loaihinhhd,trangthaicty,diachi,tinh_tp,quocgia FROM followcompany,company WHERE  followcompany.idcongty = company.idcongty AND company.trangthaichitiet='Chấp Nhận' AND followcompany.username = '$us' AND (`tencongty` LIKE '%$find%' OR `loaihinhhd` LIKE '%$find%' OR `trangthaicty` LIKE '%$find%' OR `tinh_tp` LIKE '%$find%')";
    $sql6 = execute($sql5);
}
if (count($sql6)) {
    for ($i = 0; $i < count($sql6); $i++) { ?>
        <div class="row-recent1">
            <div class="row-recent-container " style="justify-content: space-between;">
                <!-- row-item -->
                <div class="row-item">
                    <div class="name-job">
                        <h2 class="name shortt"><?= $sql6[$i]['tencongty'] ?></h2>
                        <div class="level">
                            <span class="sp-level"><?= $sql6[$i]['loaihinhhd'] ?></span>
                        </div>

                    </div>

                    <div class="address-job">
                        <div class="company">
                            <i class="ti-layers-alt"></i>
                            <a href="" class="company-name"><?= $sql6[$i]['trangthaicty'] ?></a>
                        </div>

                        <div class="address">
                            <i class="ti-location-pin"></i>
                            <span class="name-address"><?= $sql6[$i]['diachi'] . ',' . $sql6[$i]['tinh_tp'] . ',' . $sql6[$i]['quocgia'] ?></span>
                        </div>

                    </div>
                </div>
                <!-- apply -->
                <div class="apply">
                    <a href="CompanyDetail.php?idcompany=<?= $sql6[$i]['idcongty'] ?>" class="apply-job">Xem Chi Tiết</a>

                </div>
            </div>
        </div>

    <?php   }
} else { ?>
    <div class="text-center mgt-25">
        <div class="">
            Bạn chưa theo dõi công ty nào với thông tin tìm kiếm này... <a href="Company.php">Xem dánh sách công ty</a>
        </div>
    </div>
<?php }
?>