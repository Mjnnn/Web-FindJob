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
} else {
    header('location: Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/styleMyCV.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <!-- modal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.cc1').hover(function() {
                $('#clll3').css('background-color', 'aqua')
            })
            $('.cc2').hover(function() {
                $('#clll3').css('background-color', 'bisque')
            })
            $('.cc3').hover(function() {
                $('#clll3').css('background-color', ' darkgray')
            })
            $('.cc4').hover(function() {
                $('#clll3').css('background-color', 'chartreuse')
            })


        });
    </script>
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <!-- find -->
    <!-- body start -->
    <section style=" height:auto; margin-top: 100px;">
        <div class="container-fluid mycv">
            <div class="row top-40">
                <!-- left -->


                <div class="col-lg-3 nav-search bd-rd">

                    <h1 class="title">Tìm mẫu CV phù hợp</h1>
                    <hr>

                    <div class="province">

                        <select name=slist class="slist">
                            <script language="javascript">
                                var states = new Array("Tiếng Việt", "Tiếng Anh");
                                for (var hi = 0; hi < states.length; hi++)
                                    document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                            </script>
                        </select>

                    </div>
                    <div class="category">

                        <select name=slist class="slist">
                            <script language="javascript">
                                var states = new Array("Vị trí", "Programer", "Edittor", "Web Developer", "Designer");
                                for (var hi = 0; hi < states.length; hi++)
                                    document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                            </script>
                        </select>

                    </div>
                    <div class="search">
                        <select name=slist class="slist">
                            <script language="javascript">
                                var states = new Array("Tất cả thiết kế", "Đơn giản", "Kinh nghiệm", "Màu sắc", "Công nghệ", "Xã hội");
                                for (var hi = 0; hi < states.length; hi++)
                                    document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                            </script>
                        </select>
                    </div>
                    <button class="btn-search">Search</button>

                    <!-- </div> -->

                </div>
                <!-- right -->
                <div class="col-lg">
                    <div class="container-fluid">

                        <div class="row d-inline-flex">
                            <!-- Gallery Item 1 -->
                            <div class="col-12 col-sm-6 col-md-4 p-2 element">
                                <div class="d-flex flex-column text-center border height100">
                                    <div>
                                        <div class="image">

                                            <img class="image__img" src="Img/cv0.png" />

                                            <div class="image__overlay image__overlay--primary">
                                                <div class="image__title"><i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                                <p class="image__description">
                                                    Sử dụng mẫu này
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="" style="color: black;text-decoration: none;" data-toggle="modal" data-target="#myModal">Mẫu CV Lập trình viên
                                        </a></h3>
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content animate__animated animate__rubberBand" style="background-color:aliceblue;min-width: 1000px;
                                                margin-left: -215px;" id="clll3">
                                                <div class="modal-header">
                                                    <!-- <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button> -->
                                                    <h4 class="modal-title"><b>Mẫu CV Lập Trình Viên</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="display: flex;" class="an1">
                                                        <div style="flex: 1;">
                                                            <label for="">Họ và Tên Đệm</label> <br>
                                                            <input type="text" name="ho" value="" style="padding-left: 10px" placeholder="Ví dụ: Nguyễn Văn"><br>
                                                            <div style="margin-top: 30px;min-height: 60px;">
                                                                <label for="">Ngày Sinh</label> <br>
                                                                <input type="date" style="padding-left: 10px;">
                                                            </div>
                                                            <div style="margin-top: 30px;">
                                                                <label for="">Quê Quán</label> <br>
                                                                <select name=slist class="slist" style="min-width: 200px;border-radius: 20px;border: black; width: 42% !important;">
                                                                    <script language="javascript">
                                                                        var states = new Array("Chọn Tỉnh/Thành Phố...", "An Giang", "Bac Giang", "Bac Kan", "Bac Lieu", "Bac Ninh", "Ba Ria-Vung Tau", "Ben Tre", "Binh Dinh", "Binh Duong", "Binh Phuoc", "Binh Thuan", "Ca Mau", "Cao Bang", "Dac Lak", "Dac Nong", "Dien Bien", "Dong Nai", "Dong Thap", "Gia Lai", "Ha Giang", "Hai Duong", "Ha Nam", "Ha Tay", "Ha Tinh", "Hau Giang", "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", "Kon Tum", "Lai Chau", "Lam Dong", "Lang Son", "Lao Cai", "Long An", "Nam Dinh", "Nghe An", "Ninh Binh", "Ninh Thuan", "Phu Tho", "Phu Yen", "Quang Binh", "Quang Nam", "Quang Ngai", "Quang Ninh", "Quang Tri", "Soc Trang", "Son La", "Tay Ninh", "Thai Binh", "Thai Nguyen", "Thanh Hoa", "Thua Thien-Hue", "Tien Giang", "Tra Vinh", "Tuyen Quang", "Vinh Long", "Vinh Phuc", "Yen Bai", "Can Tho", "Da Nang", "Hai Phong", "Hanoi", "Ho Chi Minh");
                                                                        for (var hi = 0; hi < states.length; hi++)
                                                                            document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                                                                    </script>
                                                                </select>
                                                            </div>
                                                            <div style="margin-top: 30px;">
                                                                <label for="">Học Vấn?</label> <br>
                                                                <textarea name="" id="" cols="25" rows="2"></textarea>
                                                            </div>

                                                        </div>
                                                        <div style="flex: 1;">
                                                            <label for="">Tên</label> <br>
                                                            <input type="text" name="ho" value="" style="padding-left: 10px;" placeholder="Ví dụ: A"><br>
                                                            <!-- gioitinh -->
                                                            <div style="margin-top: 31px;min-height: 60px;">
                                                                <label for="">Email</label> <br>
                                                                <input type="email" placeholder="Ví dụ: abc@gmail.com" style="padding-left: 10px;">
                                                            </div>
                                                            <div style="margin-top: 30px;">
                                                                <label for=""></label> <br>
                                                                <select name=slist class="slist" style="min-width: 200px;border-radius: 20px;border: black;width: 42% !important;">
                                                                    <script language="javascript">
                                                                        var states = new Array("Chọn Quận/Huyện...", "An Giang", "Bac Giang", "Bac Kan", "Bac Lieu", "Bac Ninh", "Ba Ria-Vung Tau", "Ben Tre", "Binh Dinh", "Binh Duong", "Binh Phuoc", "Binh Thuan", "Ca Mau", "Cao Bang", "Dac Lak", "Dac Nong", "Dien Bien", "Dong Nai", "Dong Thap", "Gia Lai", "Ha Giang", "Hai Duong", "Ha Nam", "Ha Tay", "Ha Tinh", "Hau Giang", "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", "Kon Tum", "Lai Chau", "Lam Dong", "Lang Son", "Lao Cai", "Long An", "Nam Dinh", "Nghe An", "Ninh Binh", "Ninh Thuan", "Phu Tho", "Phu Yen", "Quang Binh", "Quang Nam", "Quang Ngai", "Quang Ninh", "Quang Tri", "Soc Trang", "Son La", "Tay Ninh", "Thai Binh", "Thai Nguyen", "Thanh Hoa", "Thua Thien-Hue", "Tien Giang", "Tra Vinh", "Tuyen Quang", "Vinh Long", "Vinh Phuc", "Yen Bai", "Can Tho", "Da Nang", "Hai Phong", "Hanoi", "Ho Chi Minh");
                                                                        for (var hi = 0; hi < states.length; hi++)
                                                                            document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                                                                    </script>
                                                                </select>
                                                            </div>
                                                            <div style="margin-top: 30px;">
                                                                <label for="">Kinh Nghiệm Và Kỹ Năng?</label> <br>
                                                                <textarea name="" id="" cols="25" rows="2"></textarea>
                                                            </div>


                                                        </div>
                                                        <div style="flex: 1;">

                                                            <label for="">Giới Tính</label> <br>
                                                            <input type="radio" style="min-height: 10px !important;min-width: 20px !important;">
                                                            Nam
                                                            <!-- <label for="" style="font-size: 14px;">Nam</label> -->
                                                            <input type="radio" style="min-height: 10px !important; min-width: 20px !important;">
                                                            Nữ
                                                            <!-- <label for="" style="font-size: 14px;">Nữ</label> -->
                                                            <input type="radio" style="min-height: 10px !important; min-width: 20px !important;">
                                                            Khác

                                                            <div style="margin-top: 45px;min-height: 60px;">
                                                                <label for="">Số Điện Thoại</label> <br>
                                                                <input type="tel" placeholder="Ví dụ: 0********" style="padding-left: 10px;">
                                                            </div>
                                                            <div style="margin-top: 30px;">
                                                                <label for=""></label> <br>
                                                                <select name=slist class="slist" style="min-width: 200px;border-radius: 20px;border: black;width: 42% !important;">
                                                                    <script language="javascript">
                                                                        var states = new Array("Chọn Phường/Thôn...", "An Giang", "Bac Giang", "Bac Kan", "Bac Lieu", "Bac Ninh", "Ba Ria-Vung Tau", "Ben Tre", "Binh Dinh", "Binh Duong", "Binh Phuoc", "Binh Thuan", "Ca Mau", "Cao Bang", "Dac Lak", "Dac Nong", "Dien Bien", "Dong Nai", "Dong Thap", "Gia Lai", "Ha Giang", "Hai Duong", "Ha Nam", "Ha Tay", "Ha Tinh", "Hau Giang", "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", "Kon Tum", "Lai Chau", "Lam Dong", "Lang Son", "Lao Cai", "Long An", "Nam Dinh", "Nghe An", "Ninh Binh", "Ninh Thuan", "Phu Tho", "Phu Yen", "Quang Binh", "Quang Nam", "Quang Ngai", "Quang Ninh", "Quang Tri", "Soc Trang", "Son La", "Tay Ninh", "Thai Binh", "Thai Nguyen", "Thanh Hoa", "Thua Thien-Hue", "Tien Giang", "Tra Vinh", "Tuyen Quang", "Vinh Long", "Vinh Phuc", "Yen Bai", "Can Tho", "Da Nang", "Hai Phong", "Hanoi", "Ho Chi Minh");
                                                                        for (var hi = 0; hi < states.length; hi++)
                                                                            document.write("<option value=\"" + states[hi] + "\">" + states[hi] + "</option>");
                                                                    </script>
                                                                </select>
                                                            </div>
                                                            <div style="margin-top: 30px;">
                                                                <label for="">Chứng Chỉ Và Giải Thưởng</label> <br>
                                                                <textarea name="" id="" cols="25" rows="2"></textarea>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div style="display: flex; margin: auto;">
                                                        <a href="" class="cc1">
                                                            <div class="template-cv-colors" style="background-color: aqua;">
                                                            </div>
                                                        </a>
                                                        <a href="" class="cc2">
                                                            <div class="template-cv-colors" style="background-color: bisque;">
                                                            </div>
                                                        </a>
                                                        <a href="" class="cc3">
                                                            <div class="template-cv-colors" style="background-color: darkgray;">
                                                            </div>
                                                        </a>
                                                        <a href="" class="cc4">
                                                            <div class="template-cv-colors" style="background-color: chartreuse;">
                                                            </div>
                                                        </a>

                                                    </div>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: chartreuse;">Hoàn Thành</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: red;">Thoát</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <p>Info..</p>
                                    <div style="display: flex; margin: auto;">
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: aqua;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: red;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: darkgray;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: chartreuse;">
                                            </div>
                                        </a>

                                    </div>
                                </div>

                            </div>
                            <!-- Gallery Item 2 -->
                            <div class="col-12 col-sm-6 col-md-4 p-2 element">
                                <div class="d-flex flex-column text-center border height100">
                                    <div>
                                        <div class="image">

                                            <img class="image__img" src="Img/cv10.jpeg" />

                                            <div class="image__overlay image__overlay--primary">
                                                <div class="image__title"><i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                                <p class="image__description">
                                                    Sử dụng mẫu này
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="" style="color: black;text-decoration: none;">Mẫu CV Basic
                                        </a></h3>
                                    <p>Info..</p>
                                    <div style="display: flex; margin: auto;">
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: darkmagenta;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #ba40b4;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #bd7222;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #e61818;">
                                            </div>
                                        </a>

                                    </div>
                                </div>

                            </div>
                            <!-- Gallery Item 3 -->
                            <div class="col-12 col-sm-6 col-md-4 p-2 element">
                                <div class="d-flex flex-column text-center border height100">
                                    <div>
                                        <div class="image">

                                            <img class="image__img" src="Img/cv8.jpeg" />

                                            <div class="image__overlay image__overlay--primary">
                                                <div class="image__title"><i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                                <p class="image__description">
                                                    Sử dụng mẫu này
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="" style="color: black;text-decoration: none;">Mẫu CV Gradient
                                        </a></h3>
                                    <p>Info..</p>
                                    <div style="display: flex; margin: auto;">
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: crimson;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: darkgoldenrod;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: violet;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: darkgrey;">
                                            </div>
                                        </a>

                                    </div>
                                </div>

                            </div>
                            <!-- Gallery Item 4 -->
                            <div class="col-12 col-sm-6 col-md-4 p-2 element">
                                <div class="d-flex flex-column text-center border height100">
                                    <div>
                                        <div class="image">

                                            <img class="image__img" src="Img/cv7.png" />

                                            <div class="image__overlay image__overlay--primary">
                                                <div class="image__title"><i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                                <p class="image__description">
                                                    Sử dụng mẫu này
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="" style="color: black;text-decoration: none;">Mẫu CV Outstanding
                                        </a></h3>
                                    <p>Info..</p>
                                    <div style="display: flex; margin: auto;">
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: brown;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: chartreuse;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: coral;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #00B4D8;">
                                            </div>
                                        </a>

                                    </div>
                                </div>

                            </div>
                            <!-- Gallery Item 5 -->
                            <div class="col-12 col-sm-6 col-md-4 p-2 element">
                                <div class="d-flex flex-column text-center border height100">
                                    <div>
                                        <div class="image">

                                            <img class="image__img" src="Img/cv9.jpeg" />

                                            <div class="image__overlay image__overlay--primary">
                                                <div class="image__title"><i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                                <p class="image__description">
                                                    Sử dụng mẫu này
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="" style="color: black;text-decoration: none;">Mẫu CV Senior
                                        </a></h3>
                                    <p>Info..</p>
                                    <div style="display: flex; margin: auto;">
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #FF823C;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #40BA77;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #5D5FEF;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #00B4D8;">
                                            </div>
                                        </a>

                                    </div>
                                </div>

                            </div>
                            <!-- Gallery Item 6 -->
                            <div class="col-12 col-sm-6 col-md-4 p-2 element">
                                <div class="d-flex flex-column text-center border height100">
                                    <div>
                                        <div class="image">

                                            <img class="image__img" src="Img/cv6.jpeg" />

                                            <div class="image__overlay image__overlay--primary">
                                                <div class="image__title"><i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                                <p class="image__description">
                                                    Sử dụng mẫu này
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <h3><a href="" style="color: black;text-decoration: none;">Mẫu CV Toppier
                                        </a></h3>
                                    <p>Info..</p>
                                    <div style="display: flex; margin: auto;">
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: red;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: aqua;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: #5D5FEF;">
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="template-cv-colors" style="background-color: blueviolet;">
                                            </div>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- =========================== -->
                    <div class="pagination">
                        <ul class="" style="display: flex;">
                            <li class="btn-prev btn-active"><a href="#" class=""><b>&laquo;</b></a></li>
                            <div id="number-page" class="number-page" style="display: flex;">
                                <li class="active"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                            </div>
                            <li class="btn-next"><a href="#" class=""><b>&raquo;</b></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once './Footer.php' ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- slick slide -->
    <script>

    </script>
    <!-- modal -->
    <script>
        $("#image").hover(function() {

        })
    </script>
    <!-- animation header -->
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            var header = document.querySelector('.header');
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>