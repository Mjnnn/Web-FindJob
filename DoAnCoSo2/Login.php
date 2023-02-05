<?php
include 'Config.php';
include 'ConnectMySQL.php';

if (isset($_SESSION['username3'])) {
    unset($_SESSION['username3']);
}

$username3 = '';
$password3 = '';
$error_mess1 = '';
$error_mess2 = '';
$error_mess3 = '';
if (isset($_POST['dangnhap'])) {
    $username3 = $_POST['username3'];
    $password3 = $_POST['password3'];
    if ($username3 == '' || $username3 == ' ') {
        $error_mess1 = " Vui lòng điền tên đăng nhập";
    }
    if ($password3 == '' || $password3 == ' ') {
        $error_mess2 = " Vui lòng nhập mật khẩu";
    } else {
        if (strlen($password3) < 6) {
            $error_mess3 = " Mật khẩu tối thiểu 6 ký tự";
        }
    }
    if ($error_mess1 == '' && $error_mess2 == '' && $error_mess3 == '') {
        $sql = "SELECT * FROM `account` WHERE `username` = '$username3' AND `password`= '$password3'";
        $sql2 = selectA($sql);
        if ($sql2) {
            $sql3 = "SELECT * FROM `account` WHERE `username` = '$username3' AND `password`= '$password3' AND `vaitro`='Khách Hàng'";
            $sql4 = selectA($sql3);
            if ($sql4) {
                $_SESSION['username3'] = $username3;
                header('location: index.php');
            } else {
                header('location: ../Admin/404-Login.php');
            }
        } else {
            echo '<script language="javascript">
                alert("Đăng nhập không thành công, vui lòng kiểm tra lại!!!");
            </script>';
        }
    }
}
if (isset($_GET["code"])) {
    // $_SESSION['logingg'] = 'xacnhan';
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        // print_r($data);
        $_SESSION['user_email_address'] = $data['email'];
        $_SESSION['user_first_name'] = $data['given_name'];
        $_SESSION['user_img'] = $data['picture'];
        $login_button = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css  -->
    <link rel="stylesheet" href="Css/styleLogin.css">

    <!-- Library  -->
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="themify-icons/themify-icons.css">

    <!-- Link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Icon Web  -->
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <title>Đăng Nhập</title>

</head>

<body>
    <style>
        #note,
        #note2,
        #note3,
        #note4 {
            color: red;
        }

        @media screen and (max-width: 987px) {
            .abc1 {
                position: fixed;
                top: 10% !important;
                right: 0px;
                width: 80% !important;
            }
        }
    </style>
    <!-- <div id="waral" style="position: fixed; top: 20%; right: 0; width: 40%;" class="abc1">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <strong>Warning Alert Message -</strong> Các thông tin bạn nhập chưa đúng
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    <div id="Alert" style="position: fixed; top: 20%; right: 0; width: 40%;" class="abc1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check"></i>
            <strong>Success Alert Message -</strong> Đăng nhập thành công
           
            <i class="fa-solid fa-xmark" style="margin-top: 10px;"></i>
            
        </div>
    </div> -->
    <script>
        $('#Alert').hide();
        $('#waral').hide();
    </script>
    <?php include_once './Header.php' ?>

    <section class="job-post grid">
        <div class="job-container wide">
            <div class="acc-content">
                <div class="row-acc mg-bot mg-top">
                    <div class="img-acc animate__animated animate__backInLeft">
                        <img src="Img/14_Bnefits_Collaboration-2.svg" alt="">
                    </div>
                    <form class="form-acc animate__animated animate__backInRight" method="POST" id="#login-form">

                        <h3 class="header-form animate__animated animate__bounce">FindJob</h3>
                        <div class="mb-3">
                            <!-- <label for="formGroupExampleInput" class="form-label">Tên đăng nhập</label> -->
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tên đăng nhập" name="username3" value="<?= $username3 ?>">
                            <span class="error_firstname"><?= $error_mess1 ?></span>
                            <p id="note"></p>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="formGroupExampleInput2" class="form-label">Mật khẩu</label> -->
                            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Mật khẩu" name="password3" value="<?= $password3 ?>">
                            <span class="error_password"><?php if ($error_mess2 != '') {
                                                                echo $error_mess2;
                                                            } else if ($error_mess3 != '') {
                                                                echo $error_mess3;
                                                            }
                                                            ?></span>
                            <p id="note2"></p>
                        </div>
                        <div class="text-right">
                            <a href="ForgetPassword.php" class="link-forgot">Quên mật khẩu ?</a>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary check" value="Đăng Nhập" name="dangnhap">
                            <!-- onclick="checkLogin()"  -->
                        </div>
                        <div class="register">
                            Bạn đã có tài khoản chưa?
                            <a href="SignIn.php" class="signinn">Đăng kí</a>
                        </div>
                        <div>
                            <div class="social-container">
                                <a href="<?= $login_url ?>" class="social"><i class="fab fa-facebook-f"></i></a>
                                <a href="<?= $google_client->createAuthUrl() ?>" class="social"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="social"><i class="fa-brands fa-apple"></i> </a>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="nav-end animate__animated animate__backInUp">
                    <div class="row row2">
                        <div class=" col l-4  c-4 row-acc2  center">
                            <div class="w-img">
                                <img src="Img/icon-folder.png" alt="">
                            </div>
                            <div>
                                <p>Hơn <strong>50.000</strong> hồ sơ cập nhật mỗi tháng</p>
                            </div>
                        </div>
                        <div class="col l-4  c-4 row-acc2 center ">

                            <div class="w-img">
                                <img src="Img/icon-link.png" alt="">
                            </div>

                            <div>
                                <p>Website tuyển dụng toàn cầu <strong>duy nhất</strong> tại <strong>Việt Nam</strong></p>
                            </div>
                        </div>
                        <div class="col l-4  c-4 row-acc2 center ct_last ">
                            <div class="w-img">
                                <img src="Img/icon-triangle.png" alt="" class="img-last">
                            </div>
                            <div>
                                <p>Hơn <strong>18 triệu </strong>lượt xem mỗi tháng</p>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>

    </section>

    <?php include_once './Footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            var header = document.querySelector('.header');
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("navv");
            if (x.className === "nav-ull") {
                x.classList.add("dis-none");
                console.log(x);
            } else {
                x.classList.remove("dis-none");
                console.log(x);
            }
        }
    </script>
    <!-- fom validate -->
    <script>
        $('#formGroupExampleInput').on('input', checkUser);

        $('#formGroupExampleInput2').on('input', checkPass);
        $('#formGroupExampleInput2').click(checkUser);

        function checkUser() {
            if ($('#formGroupExampleInput').val() == "") {
                $('#note').html('&times; Vui lòng nhập  tài khoản').css('color', 'red')
                return false
            } else {
                $('#note').html('').css('color', '');
                return true
            }
        }

        function checkPass() {
            if ($('#formGroupExampleInput2').val().length == 0) {
                $('#note2').html('&times; Vui lòng nhập  mật khẩu').css('color', 'red')
                return false
            }
            if ($('#formGroupExampleInput2').val().length < 7) {
                $('#note2').html('&times; Mật khẩu phải tối thiểu 6 kí tự').css('color', 'red')
                return false
            } else {
                $('#note2').html('').css('color', '');
                return true
            }
        }

        function check() {

        }

        function checkLogin() {
            if ($('#formGroupExampleInput').val() == "") {
                $('#note').html('&times; Vui lòng nhập  tài khoản').css('color', 'red')
            } else
                $('#note').html('').css('color', '');
            if ($('#formGroupExampleInput2').val().length < 7) {
                $('#note2').html('&times; Vui lòng nhập  mật khẩu').css('color', 'red')
            } else
                $('#note2').html('').css('color', '');


            if (checkPass() && checkUser()) {
                $("#Alert").show(0).delay(3000).hide(0);
            } else $("#waral").show(0).delay(3000).hide(0);
        }
    </script>

    <!-- <script>
        $(document).ready(function() {
            $("#login-form").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "Login.php",
                    data: $(this).serialize(), // serializes the form's elements.
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data["type"]) {
                            window.location.href = "./Home.php";
                        } else {
                            // $(".text-error").html(data['error']);
                        }
                    }
                });
            });
        });
    </script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> -->
</body>

</html>