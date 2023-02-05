<?php
include 'Config.php';
include  'ConnectMySQL.php';

$find = $_POST['data5'];
$us = $_SESSION['us'];
if ($find == '' || $find == ' ') {
    $sql5 = "SELECT * FROM `blog` WHERE  `username` = '$us' AND `trangthai`= 'Chấp Nhận'";
    $sql6 = execute($sql5);
} else {
    $sql5 = "SELECT * FROM `blog` WHERE  `username` = '$us' AND `trangthai`= 'Chấp Nhận' AND `titleblog` LIKE '%$find%' AND `contentblog` LIKE '%$find%' AND  `topicblog` LIKE '%$find%'";
    $sql6 = execute($sql5);
}
if (count($sql6)) {
    for ($i = 0; $i < count($sql6); $i++) { ?>
        <div class="row-recent1">
            <div class="row-recent-container " style="justify-content: space-between;">
                <!-- row-item -->
                <div class="row-item">
                    <div class="name-job">
                        <h2 class="name shortt"><?= $sql6[$i]['titleblog'] ?></h2>
                        <div class="level">
                            <span class="sp-level"><?= $sql6[$i]['topicblog'] ?></span>
                        </div>

                    </div>

                    <div class="address-job">
                        <div class="company">
                            <i class="ti-layers-alt"></i>
                            <a href="" class="company-name">Ngày đăng tải: <?= $sql6[$i]['timeblog'] ?></a>
                        </div>



                    </div>
                </div>
                <!-- apply -->
                <div class="apply">
                    <a href="BlogPost.php?id=<?= $sql6[$i]['idblog'] ?>" class="apply-job">Xem Chi Tiết</a>

                </div>
            </div>
        </div>

    <?php   }
} else { ?>
    <div class="text-center mgt-25">
        <div class="">
            Bạn chưa đăng tải bất kì blog nào với thông tin tìm kiếm này... <a href="PostBlog.php">Đăng blog</a>
        </div>
    </div>
<?php }
?>