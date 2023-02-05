<?php
include '../Config.php';
include '../ConnectMySQL.php';

$codextemail = '';
if (isset($_SESSION['codextemail'])) {
    $codextemail = $_SESSION['codextemail'];
}
$codexacthuc = '';
$mess1 = '';
$mess2 = '';
if (isset($_POST['xacthuc'])) {
    $codexacthuc = $_POST['codexacthuc'];
    if ($codexacthuc == '' || $codexacthuc == ' ') {
        $mess1 = 'Vui lòng nhập mã xác thực email của bạn!';
    } else {
        if ($codexacthuc != $codextemail) {
            $mess2 = 'Mã không chính xác, vui lòng kiểm tra và thử lại!';
        } else {
            header('location: Update-Pass.php');
        }
    }
    // if ($mess1 == '' && $mess2 == '') {
    //     $sql = "SELECT * FROM `admin` WHERE `email`='$emaill'";
    //     $sql2 = selectA($sql);
    //     if ($sql2) {
    //         echo '<script language="javascript">
    //         alert("Xác thực thành công!!!");
    //     </script>';
    //         header('location: index.php');
    //     } else {
    //         echo '<script language="javascript">
    //         alert("Không tìm thấy email của bạn, vui lòng kiểm tra lại!!!");
    //     </script>';
    //     }
    // }
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

    <title>Xác thực mã email</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleForgot-password.css">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Nhập mã xác thực email!</h1>
                                        <p class="mb-4">Chúng tôi đã gửi mã xác thực về email của bạn vui lòng xem và xác thực mã để cập nhật lại mật khẩu của mình!</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập mã xác thực email..." name="codexacthuc" value="<?php echo $codexacthuc ?>">
                                            <div>
                                                <span><?php if ($mess1 != '') {
                                                            echo $mess1;
                                                        } else if ($mess2 != '') {
                                                            echo $mess2;
                                                        }
                                                        ?></span>
                                            </div>
                                        </div>
                                        <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </a> -->
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Xác thực" name="xacthuc">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="Register.php">Tạo tài khoản mới!</a>
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