<?php
include 'Config.php';
include 'ConnectMySQL.php';
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

$sql3 = "SELECT * FROM `company` WHERE `trangthaichitiet`='Chấp Nhận' LIMIT 0,8";
$sql4 = execute($sql3);
$findcompany = '';
if (isset($_POST['timkiem'])) {
  $findcompany = $_POST['findcompany'];
  if ($findcompany != '' && $findcompany != ' ') {
    $_SESSION['findcompany'] = $_POST['findcompany'];
  }
  header('location: SearchCompany.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Company</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
  <link rel="stylesheet" href="Css/styleComany.css">
  <link rel="stylesheet" href="Css/styleCompany2.css">
  <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">


</head>

<body class="page-index">
  <?php if ($us == '') {
    include_once './Header.php';
  } else {
    include_once './HeaderLogin.php';
  }
  ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up">Công ty</h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p>Các công ty đi đầu trong lĩnh vực tuyển dụng, tạo ra nguồn công việc cho người lao động.</p>
          </blockquote>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="ConnectCompany.php" class="btn-get-started">Bắt Đầu</a>
            <a href="https://youtu.be/I1x2UaNfHvg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Xem Video</span></a>
          </div>

        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
    <div class="search_company container mgt-50 mgb-50">
      <form class=" search_cpn" method="POST">
        <input type="text" class="input_search" placeholder="Nhập từ khóa tìm kiếm..." name="findcompany">
        <span class="icon_search"><i class="fa-solid fa-magnifying-glass"></i></span>
        <input type="submit" class="btn btn-primary btn_submit" value="Tìm Kiếm" name="timkiem">
      </form>

    </div>

    <div class="companys mgb-80">
      <div class="container">
        <div class="title_company mgb-40">
          <h2 class="title_company1"><span>
              <b>Công Ty có lượt tìm kiếm nhiều nhất</b>
            </span></h2>
        </div>
        <div class="row gy-5" id="list__company">
          <?php for ($i = 0; $i <= 7; $i++) { ?>
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="post-box">
                <div class="post-img imggg4" style="position:relative ;"><img src="Img/<?php echo $sql4[$i]['imgcompany'] ?>" class="img-fluid ps_abbs" alt=""></div>
                <div class="centerrr">
                  <ul class="icon__star">
                    <li><i class="bx bxs-star"></i></li>
                    <li><i class="bx bxs-star"></i></li>
                    <li><i class="bx bxs-star"></i></li>
                    <li><i class="bx bxs-star"></i></li>
                    <li><i class="bx bxs-star"></i></li>

                  </ul>
                </div>
                <h4 class="post-title"><b><?php echo $sql4[$i]['tencongty'] ?></b></h4>
                <div>
                  <span>Loại hình hoạt động: <?php echo $sql4[$i]['loaihinhhd'] ?></span>
                </div>
                <div>
                  <span>Số lượng nhân viên: <b><?php echo $sql4[$i]['sonv'] ?></b></span>
                </div>
                <div>
                  <span>Trạng thái: <span style="font-style: italic;"><?php echo $sql4[$i]['trangthaicty'] ?></span></span>
                </div>
                <p><u>Địa chỉ:</u> <?php echo $sql4[$i]['diachi'] . ',' . $sql4[$i]['tinh_tp'] . ',' . $sql4[$i]['quocgia']  ?></p>
                <a href="CompanyDetail.php?idcompany=<?php echo $sql4[$i]['idcongty'] ?>" class="readmore stretched-link bd"><span>Xem Thêm</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>
      <div class="pagination reveal">
        <ul class="" style="display: flex;">
          <li class="btn-prev btn-active"><a href="#" class=""><b>&laquo;</b></a></li>
          <div id="number-page" class="number-page" style="display: flex;">
            <li class="active"><a href="#">1</a></li>
            <li><a href="javascript:void(0);">2</a></li>
            <li><a href="javascript:void(0);">3</a></li>
            <li><a href="javascript:void(0);">4</a></li>
          </div>
          <li class="btn-next"><a href="#" class=""><b>&raquo;</b></a></li>
        </ul>

      </div>
    </div>


    <!-- ======= Why Choose Us Section ======= -->
    <sect ion id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Công Ty Lớn</h2>

        </div>

        <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

          <div class="col-xl-5 img-bg" style="background-image: url('Img/why-us-bg.jpg')"></div>
          <div class="col-xl-7 slides  position-relative">

            <div class="slides-1 swiper">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Cơ hội học hỏi kinh nghiệm</h3>
                    <!-- <h4 class="mb-3">Optio reiciendis accusantium iusto architecto at quia minima maiores quidem, dolorum.</h4> -->
                    <p>Các công ty lớn thường có một đội ngũ nhân viên quản lý, điều hành giỏi. Và khi làm việc với họ, bạn sẽ có cơ hội để học hỏi được những kinh nghiệm quý báu về cách làm việc, chỉ đạo người khác,….Đây chính là những bước đệm để bạn trở thành một người quản lý cấp cao hay thậm chí là chủ một doanh nghiệp riêng trong tương lai.</p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Mức lương khởi điểm cao</h3>
                    <!-- <h4 class="mb-3">Amet cumque nam sed voluptas doloribus iusto. Dolorem eos aliquam quis.</h4> -->
                    <p>Với quy mô lớn, ngân sách nhiều nên mức lương khởi điểm của bạn khi làm việc ở công ty lớn chắc hẳn sẽ tốt hơn so với các công ty nhỏ. Bên cạnh đó, bạn có thể yêu cầu mức lương cao hơn dựa theo năng lực của bản thân cũng như khả năng thành công của dự án.</p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Chính sách phúc lợi tốt</h3>
                    <!-- <h4 class="mb-3">Necessitatibus voluptatibus explicabo dolores a vitae voluptatum.</h4> -->
                    <p>Họ có chính sách phúc lợi tốt, tạo điều kiện để đời sống của nhân viên ngày một đi lên. Cụ thể hơn, bạn sẽ có thể được khám sức khỏe, tập thể hình miễn phí, mức thưởng lễ tết cao, có thời gian nghỉ phép và nghỉ ốm kéo dài, đi du lịch ở nhiều nơi.</p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Có cơ hội được đào tạo, nâng cao trình độ</h3>
                    <!-- <h4 class="mb-3">Tempora quos est ut quia adipisci ut voluptas. Deleniti laborum soluta nihil est. Eum similique neque autem ut.</h4> -->
                    <p>Các công ty lớn luôn mong muốn nâng cao trình độ đội ngũ nhân viên để chứng tỏ khả năng với các đối tác cũng như nâng cao năng suất làm việc. Chính vì vậy, họ đầu tư rất nhiều các khóa đào tạo, nâng cao trình độ và nghiệp vụ cho nhân viên. Và những khóa học này sẽ giúp “nâng cấp” giá trị của bạn, khiến bạn dễ dàng kiếm được một công việc tốt hơn trong tương lai.</p>
                  </div>
                </div><!-- End slide item -->

              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>
    </sect><!-- End Why Choose Us Section -->

    <!-- ======= Our Services Section ======= -->
    <section id="services-list" class="services-list">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Công Ty ở FindJob</h2>

        </div>

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="bi bi-briefcase" style="color: #f57813;"></i></div>
            <div>
              <h4 class="title"><a href="#" class="stretched-link">Cung cấp công việc phù hợp</a></h4>
              <p class="description">Tuyển dụng nhiều công việc, nhiều vị trí đa dạng dễ dàng lựa chọn</p>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="bi bi-card-checklist" style="color: #15a04a;"></i></div>
            <div>
              <h4 class="title"><a href="#" class="stretched-link">Hồ sơ chi tiết</a></h4>
              <p class="description">Hồ sơ công ty và thành viên công ty cụ thể</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="icon flex-shrink-0"><i class="bi bi-bar-chart" style="color: #d90769;"></i></div>
            <div>
              <h4 class="title"><a href="#" class="stretched-link">Phát triển nhanh chóng</a></h4>
              <p class="description">Qúa trình hình thành và phát triển của công ty</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="icon flex-shrink-0"><i class="bi bi-binoculars" style="color: #15bfbc;"></i></div>
            <div>
              <h4 class="title"><a href="#" class="stretched-link">Tầm nhìn chiến lược</a></h4>
              <p class="description">Tầm nhìn chiến lược cụ thể của công ty, hướng phát triển</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <div class="icon flex-shrink-0"><i class="bi bi-brightness-high" style="color: #f5cf13;"></i></div>
            <div>
              <h4 class="title"><a href="#" class="stretched-link">Liên kết rộng lớn</a></h4>
              <p class="description">Mối liên kết giữa các công ty rộng lớn, tạo môi trường tốt trong công việc</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
            <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week" style="color: #1335f5;"></i></div>
            <div>
              <h4 class="title"><a href="#" class="stretched-link">Lịch trình hoạt động rõ ràng</a></h4>
              <p class="description">Các hoạt động của công ty được biểu hiện cụ thể, phù hợp</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Our Services Section -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    <?php include_once './Footer.php' ?>

    <!-- rereal web element on scroll -->
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

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/aos/aos.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Template Main JS File -->
    <script src="Js/mainCompany.js"></script>
    <!-- <script src="Js/pagingCompany.js"></script> -->

</body>

</html>