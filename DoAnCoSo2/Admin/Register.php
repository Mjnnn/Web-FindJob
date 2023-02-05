<?php
include '../Config.php';
include '../ConnectMySQL.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$usernamee = '';
$passwordd = '';
$configpasswordd = '';
$emaill = '';

$timedk = getDate();
$timedk2 = $timedk["year"] . "-" . $timedk["mon"] . "-" . $timedk["mday"];

$mess1 = '';
$mess2 = '';
$mess3 = '';
$mess4 = '';
$mess5 = '';
$mess6 = '';
$mess7 = '';
$mess8 = '';


function emailValid($email)
{
    return (bool)preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}
if (isset($_POST['dangky'])) {
    $usernamee = $_POST['usernamee'];
    $passwordd = $_POST['passwordd'];
    $configpasswordd = $_POST['configpasswordd'];
    $emaill = $_POST['emaill'];

    if ($usernamee == '' || $usernamee == ' ') {
        $mess1 = 'Vui lòng nhập tên đăng nhập';
    } else {
        if (strlen($usernamee) < 7) {
            $mess2 = 'Tên đăng nhập phải dài hơn 6 ký tự';
        }
    }
    if ($passwordd == '' || $passwordd == ' ') {
        $mess3 = 'Vui lòng nhập mật khẩu';
    } else {
        if (strlen($passwordd) < 7) {
            $mess4 = 'Mật khẩu phải dài hơn 6 ký tự';
        }
    }
    if ($configpasswordd == '' || $configpasswordd == ' ') {
        $mess5 = 'Vui lòng nhập lại mật khẩu';
    } else {
        if ($configpasswordd != $passwordd) {
            $mess6 = 'Mật khẩu không khớp';
        }
    }
    if ($emaill == '' || $emaill == ' ') {
        $mess7 = 'Vui lòng nhập email để đăng ký';
    } else {
        if (!emailValid($emaill)) {
            $mess8 = "Email không hợp lệ, vui lòng thử lại";
        }
    }
    if ($mess1 == '' && $mess2 == '' && $mess3 == '' && $mess4 == '' && $mess5 == '' && $mess6 == '' && $mess7 == '' && $mess8 == '') {
        $sql = "INSERT INTO  `admin` (`username`,`password`,`email`,`imgad`,`time`) VALUES ('$usernamee','$passwordd','$emaill','undraw_profile.svg' ,'$timedk2')";
        $sql2 = insertA($sql);
        if ($sql2) {
            echo '<script language="javascript">
            alert("Đăng Ký Thành Công!!!");
        </script>';
            header('location: index.php');
        } else {
            echo '<script language="javascript">
            alert("Đăng ký không thành công, vui lòng kiểm tra lại!!!");
        </script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tạo Tài Khoản</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleRegister.css">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
                            </div>
                            <form class="user" method="POST">
                                <!-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Tên đăng nhập..." name="usernamee" value="<?= $usernamee ?>">
                                    <div>
                                        <span><?php if ($mess1 != '') {
                                                    echo $mess1;
                                                } else if ($mess2 != '') {
                                                    echo $mess2;
                                                }
                                                ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu..." name="passwordd" value="<?= $passwordd ?>">
                                        <div>
                                            <span><?php if ($mess3 != '') {
                                                        echo $mess3;
                                                    } else if ($mess4 != '') {
                                                        echo $mess4;
                                                    }
                                                    ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu..." name="configpasswordd" value="<?= $configpasswordd ?>">
                                        <div>
                                            <span><?php if ($mess5 != '') {
                                                        echo $mess5;
                                                    } else if ($mess6 != '') {
                                                        echo $mess6;
                                                    }
                                                    ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email..." name="emaill" value="<?= $emaill ?>">
                                    <div>
                                        <span><?php if ($mess7 != '') {
                                                    echo $mess7;
                                                } else if ($mess8 != '') {
                                                    echo $mess8;
                                                }
                                                ?></span>
                                    </div>
                                </div>

                                <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> -->
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng Ký" name="dangky">
                                <hr>
                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Đăng nhập bằng Google
                                </a>
                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập bằng Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="Forgot-password.php">Quên Mật Khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Bạn đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>