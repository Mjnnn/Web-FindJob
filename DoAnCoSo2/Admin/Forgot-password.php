<?php
include '../Config.php';
include '../ConnectMySQL.php';
include  "../PHPMailer/src/PHPMailer.php";
include  "../PHPMailer/src/Exception.php";
include  "../PHPMailer/src/OAuth.php";
include  "../PHPMailer/src/POP3.php";
include  "../PHPMailer/src/SMTP.php";
include  "../vendor/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$rd = mt_rand(100000, 999999);

$emaill = '';
$mess1 = '';
$mess2 = '';
function emailValid($email)
{
    return (bool)preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}

if (isset($_POST['xacthuc'])) {
    $emaill = $_POST['emaill'];
    if ($emaill == '' || $emaill == ' ') {
        $mess1 = 'Vui lòng nhập email để xác thực';
    } else {
        if (!emailValid($emaill)) {
            $mess2 = 'Email không hợp lệ,vui lòng kiểm tra lại';
        }
    }
    if ($mess1 == '' && $mess2 == '') {
        $sql = "SELECT * FROM `admin` WHERE `email`='$emaill'";
        $sql2 = selectA($sql);
        if ($sql2) {
            echo '<script language="javascript">
            alert("Xác thực thành công!!!");
        </script>';
            $_SESSION['codextemail'] = $rd;
            $_SESSION['emaill'] = $emaill;
            $mail = new PHPMailer(true);                        // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'tucongminh3008@gmail.com';                 // SMTP username
                $mail->Password = 'qyullmaeroqraaku';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('tucongminh3008@gmail.com', 'FindJob');
                $mail->addAddress($emaill, 'User');     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Xac Minh Gmail';
                $mail->Body    = 'Mã Xác Minh Gmail của bạn là: ' . $rd;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                header('location: CheckGmail.php');
            } catch (Exception $e) {
                echo 'Gửi Mã Thất Bại, Lỗi: ', $mail->ErrorInfo;
            }
            header('location: Check-Forgot-Pass.php');
        } else {
            echo '<script language="javascript">
            alert("Không tìm thấy email của bạn, vui lòng kiểm tra lại!!!");
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

    <title>Xác thực email</title>

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
                                        <h1 class="h4 text-gray-900 mb-2">Bạn đã quên mật khẩu?</h1>
                                        <p class="mb-4">Chúng tôi hiểu nó, mọi thứ sẽ xảy ra. Chỉ cần nhập địa chỉ email
                                            của bạn vào bên dưới và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn!</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập Email tài khoản của bạn..." name="emaill" value="<?php echo $emaill ?>">
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