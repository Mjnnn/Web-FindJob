<?php
include('config.php');
include  "ConnectMySQL.php";
include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email4 = '';
$error_mess11 = '';
$error_mess12 = '';
$error_mess13 = '';
$rd = mt_rand(100000, 999999);
function emailValid($email)
{
    return (bool)preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}
if (isset($_POST['xacminh'])) {
    $email4 = $_POST['email4'];
    if ($email4 == '' || $email4 == ' ') {
        $error_mess11 = "Vui lòng nhập email của bạn!!!";
    } else {
        if (!emailValid($email4)) {
            $error_mess12 = "Email không đúng!!!";
        } else {
            $sql = "SELECT email FROM account WHERE `email`= '$email4'";
            $sql2 = selectA($sql);
            if ($sql2) {
                $_SESSION['code2'] = $rd;
                $_SESSION['email2'] = $email4;
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
                    $mail->addAddress($email4, 'User');     // Add a recipient
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
                    header('location: CheckForgetPass.php');
                } catch (Exception $e) {
                    echo 'Gửi Mã Thất Bại, Lỗi: ', $mail->ErrorInfo;
                }
            } else {
                $error_mess13 = "Email không tồn tại!!!";
            }
        }
    }
}
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="Css/styleForgetPass.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Quên mật khẩu</title>
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <div class="grid">
        <div class="wide pd-112">
            <div class="form_check center animate__animated  animate__zoomIn">
                <div class="title_check">
                    <h4><i class="fa-solid fa-lock"></i>Quên Mật Khẩu</h4>
                </div>
                <form class="body_check" method="POST">
                    <input type="email" placeholder="Nhập email của bạn..." class="a1" name="email4" value="<?php echo $email4 ?>">
                    <span class="error_confirm_password"> <?php
                                                            if ($error_mess11 != '') {
                                                                echo $error_mess11;
                                                            }
                                                            if ($error_mess12 != '') {
                                                                echo $error_mess12;
                                                            }
                                                            if ($error_mess13 != '') {
                                                                echo $error_mess13;
                                                            }
                                                            ?></span>
                    <div class="sub_close">
                        <button type="button" class="btn btn-secondary"><a href="Login.php">Quay Lại</a></button>
                        <input type="submit" value="Xác Minh" name="xacminh" class="btn btn-primary">
                    </div>
                </form>

            </div>

        </div>

    </div>
    <?php include_once './Footer.php' ?>

    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>