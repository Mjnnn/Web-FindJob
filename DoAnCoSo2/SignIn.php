<?php
include('config.php');
include  "ConnectMySQL.php";
include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php";
include  "./vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$rd = mt_rand(100000, 999999);
$error_mess1 = '';
$error_mess2 = '';
$error_mess3 = '';
$error_mess4 = '';
$error_mess5 = '';
$error_mess6 = '';
$error_mess7 = '';
$error_mess8 = '';
$error_mess9 = '';
$username = '';
$password = '';
$confirm_password = '';
$phonenumber = '';
$email = '';
$status = '';
$login_button = true;


function emailValid($email)
{
  return (bool)preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}



if (isset($_GET["code"])) {
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
if (isset($_POST['dangky'])) {
  $username =  htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $confirm_password = htmlspecialchars($_POST['confirm_password']);
  $phonenumber = htmlspecialchars($_POST['phonenumber']);
  $email = htmlspecialchars($_POST['email']);
  $status = $_POST['status'];

  if ($username == "" || $username == " ") {
    $error_mess1 = "Vui Lòng điền tên đăng nhập";
  }
  if ($password == " " || $password == "") {
    $error_mess2 = "Vui Lòng nhập mật khẩu";
  } else {
    if (strlen($password) <= 6) {
      $error_mess3 = "Mật khẩu phải lớn hơn 6 ký tự";
    }
  }
  if ($confirm_password != $password || $confirm_password == "") {
    $error_mess4 = "Mật khẩu không khớp";
  }
  if ($phonenumber == " " || $phonenumber == "") {
    $error_mess5 = "Vui lòng nhập số điện thoại";
  } else {
    if (strlen($phonenumber) < 10) {
      $error_mess6 = " Vui lòng nhập đúng số điện thoại, tối thiểu 10 số";
    }
  }
  if ($email == "" || $email == " ") {
    $error_mess7 = "Vui lòng nhập email của bạn";
  } else {
    if (!emailValid($email)) {
      $error_mess8 = "Email không hợp lệ, vui lòng thử lại";
    }
  }
  if ($status != 1) {
    $error_mess9 = "Vui lòng xác nhận các nội quy và điều khoản để đăng kí";
  }
  if (
    $error_mess1 == '' && $error_mess2 == '' &&  $error_mess3 == '' &&  $error_mess4 == '' &&  $error_mess5 == '' &&  $error_mess6 == '' &&
    $error_mess7 == '' &&  $error_mess8 == '' && $error_mess9 == ''
  ) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['phonenumber'] = $phonenumber;
    $_SESSION['email'] = $email;
    $_SESSION['code'] = $rd;
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
      $mail->addAddress($email, 'User');     // Add a recipient
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
  }
} else {
  echo '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Css  -->
  <link rel="stylesheet" href="Css/styleSignIn.css">


  <!-- Library  -->
  <link rel="stylesheet" href="Css/responsive.css">
  <link rel="stylesheet" href="Css/reset.css">
  <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
  <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
  <link rel="stylesheet" href="fontawesome-free-6.2.0-web/js/all.js">

  <!-- Link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Icon Web  -->
  <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
  <title>Đăng Kí</title>
</head>

<body>
  <?php include './Header.php' ?>
  <div class="box-shadown grid">
    <div class=" wide pd">
      <div class="row bow animate__animated  animate__zoomInDown mgt-20">
        <div class="col l-6 col1">
          <div class="information">
            <div class="list-info" id="list-info">
              <div class="job-item">
                <div class="figure">
                  <div class="image is-blue"><img class="lazy-bg" alt="" src="img/i1.png" style=""></div>
                  <div class="figcaption">
                    <div class="title">
                      <h3>Thông báo việc làm</h3>
                    </div>
                    <div class="caption">
                      <p>Được cập nhật các cơ hội việc làm mới nhất từ nhiều công ty hàng đầu</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="job-item">
                <div class="figure">
                  <div class="image is-green"><img class="lazy-bg" alt="" src="img/i2.png" style=""></div>
                  <div class="figcaption">
                    <div class="title">
                      <h3>Kiếm việc dễ dàng</h3>
                    </div>
                    <div class="caption">
                      <p>Tìm được công việc bạn yêu thích phù hợp với kỹ năng và tiêu chí bạn quan tâm</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="job-item">
                <div class="figure">
                  <div class="image is-yellow"><img class="lazy-bg" alt="" src="img/i3.png" style=""></div>
                  <div class="figcaption">
                    <div class="title">
                      <h3>Ứng tuyển nhanh chóng</h3>
                    </div>
                    <div class="caption">
                      <p>Dễ dàng ứng tuyển nhiều vị trí mà không cần mất nhiều thời gian</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col l-6">
          <div class="main-form">
            <div class="choose-follow">
              <p>Đăng nhập bằng</p>
              <ul class="list-follow">
                <li>
                  <a href="<?= $login_url; ?>" class="fb"><i class="fa-brands fa-facebook"></i>Facebook</a>
                </li>
                <li>
                  <a href="<?= $google_client->createAuthUrl() ?>" class="gg"><i class="fa-brands fa-google"></i>Google</a>
                </li>
              </ul>
            </div>
            <div class="or-line"><span>hoặc </span></div>
            <div class="form-register">
              <form name="frmRegister" id="frmRegister" method="post" action="">
                <div class="form-group form-text">
                  <input name="username" id="fullname" maxlength="15" type="text" onkeyup="this.setAttribute('value', this.value);" value="<?php echo $username ?>">
                  <label for="">* Tài Khoản đăng nhập </label>
                  <span class="error_firstname"><?= $error_mess1 ?></span>
                </div>
                <div class="form-group form-text">
                  <input type="password" name="password" id="password" onkeyup="this.setAttribute('value', this.value);" value="<?php echo $password ?>">
                  <label for="">* Mật khẩu</label>
                  <span class="error_password"><?php if ($error_mess2 != '') {
                                                  echo $error_mess2;
                                                } else if ($error_mess3 != '') {
                                                  echo $error_mess3;
                                                }
                                                ?></span>
                </div>
                <div class="form-group form-text">
                  <input type="password" name="confirm_password" id="confirm_password" onkeyup="this.setAttribute('value', this.value);" value="<?php echo $confirm_password ?>">
                  <label for="">* Xác nhận mật khẩu</label>
                  <span class="error_confirm_password"><?php
                                                        echo $error_mess4 ?>
                  </span>
                </div>
                <div class="form-group form-text">
                  <input name="phonenumber" id="sdt" maxlength="50" type="text" onkeyup="this.setAttribute('value', this.value);" value="<?php echo $phonenumber ?>">
                  <label for="">* Số điện thoại</label>
                  <span class="error_lastname"><?php if ($error_mess5 != '') {
                                                  echo $error_mess5;
                                                } else if ($error_mess6 != '') {
                                                  echo $error_mess6;
                                                }
                                                ?></span>
                </div>
                <div class="form-group form-text">
                  <input name="email" id="email" maxlength="50" type="text" onkeyup="this.setAttribute('value', this.value);" value="<?php echo $email ?>">
                  <label for="">* Email</label>
                  <span class="error_email"><?php
                                            if ($error_mess7 != '') {
                                              echo $error_mess7;
                                            } else if (!emailValid($email)) {
                                              echo $error_mess8;
                                            }
                                            ?></span>
                </div>
                <div class="form-group form-checkbox" style="display: flex;">
                  <input type="checkbox" style="width: 15px;" checked="checked" name="status" id="chkAgree" value="1">
                  <label for="chkAgree">Đồng ý với <a href="#">Quy định bảo mật</a> và <a href="#">Thỏa thuận sử dụng</a> của FindJob</label>
                  <span class="error_chkAgree mgt-5"> <?= $error_mess9 ?></span>
                </div>
                <div class="abc" style="text-align: center;">
                  <!-- <button class="btn btn-success succ">Đăng ký</button> -->
                  <input type="submit" class="btn btn-success dk" name="dangky" value="Đăng Ký">
                </div>
                <div style="text-align: right; margin-top: 30px;">
                  <span><a href="Login.php" style="text-decoration: none ;">Đã Có tài khoản?</a></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include './Footer.php' ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>