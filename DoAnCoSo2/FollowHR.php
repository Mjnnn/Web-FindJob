<?php
include 'Config.php';
include  'ConnectMySQL.php';

$find = $_POST['data9'];
$us = $_SESSION['us'];
if ($find == '' || $find == ' ') {
    $sql13 = "SELECT followhired.idcongviec,followhired.username,nganhnghe,theloai,chucdanh,ngaydangky,ngayketthuc FROM followhired,hired WHERE followhired.idcongviec = hired.idcongviec AND hired.trangthai='Chấp Nhận' AND followhired.username = '$us'";
    $sql14 = execute($sql13);
} else {
    $sql13 = "SELECT followhired.idcongviec,followhired.username,nganhnghe,theloai,chucdanh,ngaydangky,ngayketthuc FROM followhired,hired WHERE followhired.idcongviec = hired.idcongviec AND hired.trangthai='Chấp Nhận' AND followhired.username = '$us' AND (`nganhnghe` LIKE '%$find%' OR `theloai` LIKE '%$find%' OR `chucdanh` LIKE '%$find%' OR `ngaydangky` LIKE '%$find%' OR `ngayketthuc` LIKE '%$find%')";
    $sql14 = execute($sql13);
}
if (count($sql14)) {
    for ($i = 0; $i < count($sql14); $i++) { ?>
        <div class="row-recent1">
            <div class="row-recent-container " style="justify-content: space-between;">
                <!-- row-item -->
                <div class="row-item">
                    <div class="name-job">
                        <h2 class="name shortt"><?= $sql14[$i]['nganhnghe'] ?></h2>
                        <div class="level">
                            <span class="sp-level"><?= $sql14[$i]['theloai'] ?></span>
                        </div>

                    </div>

                    <div class="address-job">
                        <div class="company">
                            <i class="fa-solid fa-bookmark"></i>
                            <a class="company-name">Chức danh: <?= $sql14[$i]['chucdanh'] ?></a>
                        </div>
                        <div class="company">
                            <i class="ti-layers-alt"></i>
                            <a href="" class="company-name">Ngày đăng tuyển: <?= $sql14[$i]['ngaydangky'] ?> - Ngày kết thúc: <?= $sql14[$i]['ngayketthuc'] ?></a>
                        </div>



                    </div>
                </div>
                <!-- apply -->
                <div class="apply">
                    <a href="JobDetail.php?idcvv=<?= $sql14[$i]['idcongviec'] ?>" class="apply-job">Xem Chi Tiết</a>

                </div>
            </div>
        </div>

    <?php   }
} else { ?>
    <div class="text-center mgt-25">
        <div class="">
            Bạn chưa theo dõi công việc nào với thông tin tìm kiếm này... <a href="Search.php">Xem danh sách tuyển dụng</a>
        </div>
    </div>
<?php }
?>