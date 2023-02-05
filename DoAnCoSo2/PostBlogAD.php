<?php
include 'ConnectMySQL.php';
include 'Config.php';

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
$id = '';
$nameblog = '';
if (isset($_GET['idblog'])) {
    $id = $_GET['idblog'];
    $sql3 = "SELECT * FROM blog WHERE `idblog`= '$id'";
    $sql4 = execute($sql3);
    $topicblog = '';
    foreach ($sql4 as $value) {
        $topicblog = $value['topicblog'];
        $nameblog = $value['titleblog'];
    }
    $sql5 = "SELECT * FROM blog WHERE `topicblog`='$topicblog'ORDER BY timeblog ASC LIMIT 0,3";
    $sql6 = execute($sql5);
} else {
    header('location: ../Admin/404.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $nameblog ?></title>
    <!-- Favicon-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="Css/styleBlogPost.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <!-- Page content-->
    <div class="container ">
        <div class="row mgt-130">
            <div class="col-lg-8">
                <?php foreach ($sql4 as $value) { ?>
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $value['titleblog'] ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2 mgt-15">Đăng tải vào: <?php echo $value['timeblog'] ?> </div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="Img/<?php echo $value['imgblog'] ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?= $value['contentblog'] ?></p>

                        </section>
                    </article>
                    <!-- Comments section-->
                    <!-- <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                               
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Lời nhận xét của bạn..."></textarea></form>
                              
                                <div class="d-flex mb-4 reveal">
                               
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                    
                                        <div class="d-flex mt-4 reveal">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                       
                                        <div class="d-flex mt-4 reveal">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="d-flex reveal">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->

                <?php } ?>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header"><b>Tìm Kiếm</b></div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Nhập từ khóa tìm kiếm..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <input class="btn btn-primary" id="button-search" type="submit" value="Tìm Kiếm" name="timkiem">
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <!-- <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header"><b>Liên quan</b></div>
                    <?php foreach ($sql6 as $value) { ?>
                        <div class="">
                            <a href="#!"><img class="card-img-top" src="Img/<?php echo $value['imgblog'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">Đăng tải lúc: <?php echo $value['timeblog'] ?></div>
                                <h2 class="card-title h4"><?php echo $value['titleblog'] ?></h2>
                                <p class="card-text"><?php echo $value['contentblog'] ?></p>
                                <a class="btn btn-primary" href="BlogPost.php?id=<?php echo $value['idblog'] ?>">Xem Thêm →</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php include_once './Footer.php' ?>
    <script type="text/javascript">
        window.addEventListener('scroll', reveal);

        function reveal() {
            var reveals = document.querySelectorAll('.reveal');

            for (var i = 0; i < reveals.length; i++) {

                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add('active');
                } else {
                    reveals[i].classList.remove('active');
                }
            }
        }
    </script>
    <!--  -->
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            var bgPattern = document.getElementById("bg")
            window.addEventListener("scroll", function() {
                bgPattern.style.backgroundPosition = +window.pageXOffset + "px";
            })
        })
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>