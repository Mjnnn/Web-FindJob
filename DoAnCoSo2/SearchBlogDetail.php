<?php
include 'Config.php';
include  'ConnectMySQL.php';

$us = '';
$sql18 = '';
if (isset($_SESSION['username3'])) {
    $us = $_SESSION['username3'];
}

if ($us != '' && $us != ' ') {
    $sql17 = "SELECT * FROM `followblog` WHERE `username`= '$us'";
    $sql18 = execute($sql17);
} else {
    $sql18 = [];
}
$countt = count($sql18);
$find = $_POST['data2'];
$sql3 = "SELECT * FROM `blog` WHERE `trangthai`='Chấp Nhận' AND `titleblog` LIKE '%$find%' OR `contentblog` LIKE '%$find%' OR `topicblog` LIKE '%$find%' ORDER BY timeblog DESC LIMIT 0,8";
$sql4 = execute($sql3);
if (count($sql4)) {
    for ($i = 0; $i < count($sql4); $i++) {
?>
        <div class="col mb-5">
            <div class="card h-100 hoverr">
                <!-- Product image-->
                <img class="card-img-top mh-150 mw-240" src="Img/<?= $sql4[$i]['imgblog'] ?>" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->

                        <h5 class="fw-bolder title_blogg"><?= $sql4[$i]['titleblog'] ?></h5>
                        <!-- Product price-->
                        <span class="chucdanh content_blogg"><?= $sql4[$i]['contentblog'] ?></span>
                        <div class="mgt-15 detail_job">
                            <span><i>Ngày đăng tải : <?= $sql4[$i]['timeblog'] ?></i></span>
                        </div>
                    </div>

                </div>

                <div class="fl_icon mgb-10">
                    <?php if ($countt) {
                        $d = 0;
                        for ($j = 0; $j < $countt; $j++) {
                            if ($sql18[$j]['idblog'] ==  $sql4[$i]['idblog']) $d += 1;
                        }
                        if ($d == 0) { ?>
                            <div>
                                <a href="SearchBlog.php?idd=<?= $sql4[$i]['idblog'] ?>" class="fl "><i class="fa-solid fa-heart"></i></a>
                            </div>
                        <?php   }
                    } else { ?>
                        <div>
                            <a href="SearchBlog.php?idd=<?= $sql4[$i]['idblog'] ?>" class="fl"><i class="fa-solid fa-heart"></i></a>
                        </div>
                    <?php  } ?>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="BlogPost.php?id=<?= $sql4[$i]['idblog'] ?>">Xem Thêm</a></div>
                </div>
            </div>
        </div>


    <?php } ?>
<?php  } else { ?>
    <div class="centerrr error_tk">
        <Span><i class="fa-solid fa-circle-exclamation"></i><b>Không Tìm Thấy Kết Qủa Tìm Kiếm...</b></Span>
        <div class="mgt-20">
            <a href="SearchBlog.php">
                <- Trở Lại</a>
        </div>
    </div>
<?php } ?>