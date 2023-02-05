<?php
include 'Config.php';
include  'ConnectMySQL.php';

$find = $_POST['data8'];
$us = $_SESSION['us'];
if ($find == '' || $find == ' ') {
    $sql9 = "SELECT followblog.idblog,followblog.username,titleblog,topicblog,timeblog FROM followblog,blog WHERE followblog.idblog = blog.idblog AND blog.trangthai='Chấp Nhận' AND followblog.username = '$us'";
    $sql10 = execute($sql9);
} else {
    $sql9 = "SELECT followblog.idblog,followblog.username,titleblog,topicblog,timeblog FROM followblog,blog WHERE followblog.idblog = blog.idblog AND blog.trangthai='Chấp Nhận' AND followblog.username = '$us' AND (`titleblog` LIKE '%$find%' OR `topicblog` LIKE '%$find%' OR `contentblog` LIKE '%$find%' OR `timeblog` LIKE '%$find%' )";
    $sql10 = execute($sql9);
}
if (count($sql10)) {
    for ($i = 0; $i < count($sql10); $i++) { ?>
        <div class="row-recent1">
            <div class="row-recent-container " style="justify-content: space-between;">
                <!-- row-item -->
                <div class="row-item">
                    <div class="name-job">
                        <h2 class="name shortt"><?= $sql10[$i]['titleblog'] ?></h2>
                        <div class="level">
                            <span class="sp-level"><?= $sql10[$i]['topicblog'] ?></span>
                        </div>

                    </div>

                    <div class="address-job">
                        <div class="company">
                            <i class="ti-layers-alt"></i>
                            <a href="" class="company-name">Ngày đăng tải: <?= $sql10[$i]['timeblog'] ?></a>
                        </div>



                    </div>
                </div>
                <!-- apply -->
                <div class="apply">
                    <a href="BlogPost.php?id=<?= $sql10[$i]['idblog'] ?>" class="apply-job">Xem Chi Tiết</a>

                </div>
            </div>
        </div>

    <?php   }
} else { ?>
    <div class="text-center mgt-25">
        <div class="">
            Bạn chưa theo dõi blog nào với thông tin tìm kiếm này... <a href="Blog.php">Xem các blog</a>
        </div>
    </div>
<?php }
?>