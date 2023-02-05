<?php
include 'Config.php';
include  'ConnectMySQL.php';

$find = $_POST['data6'];
$us = $_SESSION['us'];
if ($find == '' || $find == ' ') {
    $sql7 = "SELECT * FROM `hired` WHERE  `username` = '$us' AND `trangthai`= 'Chấp Nhận'";
    $sql8 = execute($sql7);
} else {
    $sql7 = "SELECT * FROM `hired` WHERE  `username` = '$us' AND `trangthai`= 'Chấp Nhận' AND `nganhnghe` LIKE '%$find%' OR `chucdanh` OR '%$find%' OR `theloai` LIKE '%$find%'";
    $sql8 = execute($sql7);
}
if (count($sql8)) {
    for ($i = 0; $i < count($sql8); $i++) { ?>
        <div class="row-recent1">
            <div class="row-recent-container " style="justify-content: space-between;">
                <!-- row-item -->
                <div class="row-item">
                    <div class="name-job">
                        <h2 class="name shortt"><?= $sql8[$i]['nganhnghe'] ?></h2>
                        <div class="level">
                            <span class="sp-level"><?= $sql8[$i]['theloai'] ?></span>
                        </div>

                    </div>

                    <div class="address-job">
                        <div class="company">
                            <i class="fa-solid fa-bookmark"></i>
                            <a class="company-name">Chức danh: <?= $sql8[$i]['chucdanh'] ?></a>
                        </div>
                        <div class="company">
                            <i class="ti-layers-alt"></i>
                            <a href="" class="company-name">Ngày đăng tuyển: <?= $sql8[$i]['ngaydangky'] ?> - Ngày kết thúc: <?= $sql8[$i]['ngayketthuc'] ?></a>
                        </div>



                    </div>
                </div>
                <!-- apply -->
                <div class="apply">
                    <a href="JobDetail.php?idcvv=<?= $sql8[$i]['idcongviec'] ?>" class="apply-job">Xem Chi Tiết</a>

                </div>
            </div>
        </div>

    <?php   }
} else { ?>
    <div class="text-center mgt-25">
        <div class="">
            Bạn chưa đăng tải bất kì công việc nào với giống với thông tin tìm kiếm... <a href="Hired.php">Tuyển dụng</a>
        </div>
    </div>
<?php }
?>