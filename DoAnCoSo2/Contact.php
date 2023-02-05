<?php
include 'Config.php';
include 'ConnectMySQL.php';
include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php";
include  "./vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
function emailValid($email)
{
    return (bool)preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}

$mess1 = '';
$mess2 = '';
$mess3 = '';
$mess4 = '';
$mess5 = '';
$mess6 = '';

$myname = '';
$myemail = '';
$myphone = '';
$mytext = '';

if (isset($_POST['xacnhan'])) {
    $myname = $_POST['myname'];
    $myemail = $_POST['myemail'];
    $myphone = $_POST['myphone'];
    $mytext = $_POST['mytext'];
    if ($myname == '' || $myname == ' ') {
        $mess1 = 'Vui lòng nhập tên của bạn';
    }
    if ($myemail == '' || $myemail == ' ') {
        $mess2 = 'Vui lòng nhập địa chỉ email của bạn';
    } else {
        if (!emailValid($myemail)) {
            $mess3 = 'Email không hợp lệ, vui lòng kiểm tra lại';
        }
    }
    if ($myphone == '' || $myphone == ' ') {
        $mess4 = 'Vui lòng nhập số điện thoại của bạn';
    } else {
        if (strlen($myphone) < 10) {
            $mess5 = 'Số điện thoại phải ít nhất 10 số';
        }
    }
    if ($mytext == '' || $mytext == ' ') {
        $mess6 = 'Vui lòng nhập nội dung tin nhắn';
    }

    if ($mess1 == '' && $mess2 == '' && $mess3 == '' && $mess4 == '' && $mess5 == '' && $mess6 == '') {

        $mail = new PHPMailer(true);                        // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = "$myemail";                 // SMTP username
            $mail->Password = 'qyullmaeroqraaku';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom("$myemail", "$myname");
            $mail->addAddress('tucongminh3008@gmail.com', 'Admin');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'PHAN HOI';
            $mail->Body    =  $mytext;
            echo  '<script language="javascript">
            alert("Phản hồi thành công!!! hãy đợi Admin trả lời");
        </script>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            // echo 'Gửi Mã Thất Bại, Lỗi: ', $mail->ErrorInfo;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>FindJob</title>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/responsive.css">
    <link rel="stylesheet" href="Css/styleContact.css">
    <link rel="stylesheet" href="Css/styleContact2.css">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
</head>

<body>
    <?php if ($us == '') {
        include_once './Header.php';
    } else {
        include_once './HeaderLogin.php';
    }
    ?>
    <!-- Background Video-->
    <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="Img/mp4/bg.mp4" type="video/mp4" />
    </video>
    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <h1 class="fst-italic lh-1 mb-4 title_contact">FindJob</h1>
                <p class="mb-5" style="text-align: justify;">FindJob được tạo ra để giúp các nhà tuyển dụng, doanh nghiệp và nhân viên kết nối với nhau. Với FindJob , việc tìm kiếm việc làm và tuyển dụng nhân công sẽ dễ dàng hơn rất nhiều.
                    Hơn nữa, bạn có thể tích lũy được nhiều kinh nghiệm từ blog chia sẻ của các thành viên khác.</p>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <!-- Email address input-->
                    <!-- <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="email" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                            <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button></div>
                        </div> -->
                    <div class="invalid-feedback mt-2" data-sb-feedback="email:required">An email is required.</div>
                    <div class="invalid-feedback mt-2" data-sb-feedback="email:email">Email is not valid.</div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3 mt-2">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3 mt-2">Error sending message!</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Social Icons-->
    <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
    <!-- <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
            </div>
        </div> -->
    <div class="end_contact">
        <div class="us_contact grid pd-tb reveal" style="height: 100%; width: 100%;">
            <div class="wide">
                <div class="title_contact">
                    <h3>Về Chúng Tôi</h3>
                    <hr>
                </div>
                <div class="flex_box bgr_us_contact ">
                    <div class="ct_1">
                        <div style="text-align: center;"><img src="Img/img/us_contact.png" alt=""></div>
                    </div>
                    <div class="ct_2" style="text-align: justify;">
                        <span>Kết nối đúng người đúng việc là một bài toán rất khó ở Việt Nam,
                            là thách thức của bất kỳ nền tảng tuyển dụng nào. Với năng lực lõi là công nghệ, đặc biệt là trí tuệ nhân tạo (AI),
                            sứ mệnh của <b><i>FindJob</i></b> đặt ra cho mình là thay đổi thị trường tuyển dụng - nhân sự ngày một hiệu quả hơn.</span>
                        <br>
                        <br>

                        <span>
                            Bằng công nghệ, <b><i>FindJob</i></b> mang đến các giải pháp toàn diện giúp doanh nghiệp giải quyết đồng thời các bài toán xoay quanh vấn đề tuyển dụng,
                            từ việc quảng bá thương hiệu, xây dựng quy trình, đăng tin tuyển dụng, tìm kiếm ứng viên, sàng lọc cho đến đánh giá ứng viên và đo lường hiệu quả.
                        </span>
                        <br>
                        <br>
                        <span>Mỗi ngày, chúng tôi kết nối hàng nghìn ứng viên tiềm năng với các doanh nghiệp phù hợp,
                            đồng hành cùng hơn 110.000 doanh nghiệp tuyển dụng hiệu quả, từ các tập đoàn đa quốc gia đến các công ty khởi nghiệp trẻ.</span>

                    </div>

                </div>
            </div>

        </div>
        <div class="about_contact grid pd-tb reveal" style="height: 100%; width: 100%;">
            <div class="wide">
                <div class="title_about_contact" style="text-align: center;">
                    <h3>Báo Chí Nói Về FindJob</h3>
                    <hr>

                </div>
                <div class="img_about flex_box  row">
                    <div class="col l-6 m-12 c-12">
                        <div class="img_1">
                            <div>
                                <img src="Img/img/about/logo_bao_chi_01.webp" alt="">
                            </div>
                            <div>
                                <img src="Img/img/about/logo_bao_chi_02.webp" alt="">
                            </div>
                            <div>
                                <img src="Img/img/about/logo_bao_chi_03.webp" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col l-6 m-12 c-12">
                        <div class="img_1">
                            <div>
                                <img src="Img/img/about/logo_bao_chi_04.webp" alt="">
                            </div>
                            <div>
                                <img src="Img/img/about/logo_bao_chi_05.webp" alt="">
                            </div>
                            <div>
                                <img src="Img/img/about/logo_bao_chi_06.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="detail_contact pd-tb grid reveal" style="height: 100%; width: 100%;">
            <div class="wide">
                <div class="title_detail">
                    <h3>Số Liệu Của FindJob </h3>
                    <hr>
                </div>
                <div class="content_detail">
                    <div class="row content1 reveal ">
                        <div class="col l-4 m-4 c-12 fl-bx">
                            <div class="icon">
                                <div class="pd-icon">
                                    <i class="fas fa-briefcase text-lg"></i>
                                </div>
                            </div>
                            <div class="cnt">
                                <span>30,000+</span>
                                <p>Ứng viên đang bật tìm kiếm trung bình/thời điểm</p>
                            </div>

                        </div>
                        <div class="col l-4 m-4 c-12 fl-bx">
                            <div class="icon">
                                <div class="pd-icon">
                                    <i class="fas fa-building text-lg"></i>
                                </div>
                            </div>
                            <div class="cnt">
                                <span>150,000+</span>
                                <p>Doanh nghiệp tuyển dụng sử dụng dịch vụ tuyển dụng hiệu quả của FindJob</p>
                            </div>

                        </div>
                        <div class="col l-4 m-4 c-12 fl-bx">
                            <div class="icon">
                                <div class="pd-icon">
                                    <i class="fa-solid fa-satellite-dish"></i>
                                </div>
                            </div>
                            <div class="cnt">
                                <span>
                                    350,000+</span>
                                <p>Nhà tuyển dụng sử dụng thường xuyên để đăng tin tuyển dụng,
                                    tìm kiếm ứng viên tiềm năng chỉ với những thao tác đơn giản, nhanh gọn</p>
                            </div>

                        </div>
                    </div>

                    <div class="row content1 reveal">
                        <div class="col l-4 m-4 c-12 fl-bx">
                            <div class="icon">
                                <div class="pd-icon">
                                    <i class="fas fa-id-badge text-lg"></i>
                                </div>
                            </div>
                            <div class="cnt">
                                <span>200,000+</span>
                                <p>Ứng viên tạo mới tài khoản trên FindJob mỗi tháng

                                </p>
                            </div>

                        </div>
                        <div class="col l-4 m-4 c-12 fl-bx">
                            <div class="icon">
                                <div class="pd-icon">
                                    <i class="fas fa-search text-lg"></i>
                                </div>
                            </div>
                            <div class="cnt">
                                <span>3,150,000+</span>
                                <p>Lượt ứng viên truy cập hàng tháng, là một trong những trang tuyển dụng
                                    có lượng truy cập lớn nhất tại Việt Nam tại thời điểm này.</p>
                            </div>

                        </div>
                        <div class="col l-4 m-4 c-12 fl-bx">
                            <div class="icon">
                                <div class="pd-icon"><i class="fas fa-seedling text-lg"></i></div>
                            </div>
                            <div class="cnt">
                                <span>
                                    5,350,000+</span>
                                <p>Ứng viên tiềm năng, trong đó có 60% là ứng viên có kinh nghiệm từ 2 năm trở lên</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="mark_contact pd-tb grid reveal" style="height: 100%; width: 100%;">
            <div class="wide">
                <div class="title_mark">
                    <h3>Khách Hàng Tiêu Biểu Và Đối Tác Truyền Thông</h3>
                    <hr>
                </div>
                <div class="mark_content " style="justify-content: space-around;">
                    <div class="mark_1  l-5 m-12 c-12">
                        <div class="title_mark_content1">
                            <h5><i>Khách hàng tiêu biểu</i></h5>
                            <hr>
                        </div>
                        <div class="content_mark_content1">
                            <div class="img_content1 row">
                                <div class=" l-12 m-12 c-12" style="display: flex; justify-content: space-around;">
                                    <div class="items-center">
                                        <img src="Img/img/KHTB/flc.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTB/fpt-software.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTB/manulife.webp" alt="" class="m-auto">
                                    </div>
                                </div>

                                <div class="col l-12 m-12 c-12" style="display: flex; justify-content: space-around;">
                                    <div class="items-center">
                                        <img src="Img/img/KHTB/Techcombank_logo.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTB/tiki.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTB/viettel.webp" alt="" class="m-auto">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="mark_1  l-5 m-12 c-12">
                        <div class="title_mark_content1">
                            <h5><i>Khách hàng truyền thông</i></h5>
                            <hr>
                        </div>
                        <div class="content_mark_content1">
                            <div class="img_content1 row">
                                <div class=" l-12 m-12 c-12" style="display: flex; justify-content: space-around;">
                                    <div class="items-center">
                                        <img src="Img/img/KHTT/cafebiz.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTT/genk.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTT/vtc10.webp" alt="" class="m-auto">
                                    </div>
                                </div>

                                <div class="col l-12 m-12 c-12" style="display: flex; justify-content: space-around;">
                                    <div class="items-center">
                                        <img src="Img/img/KHTT/vtv1.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTT/vtv2.webp" alt="" class="m-auto">
                                    </div>
                                    <div class="items-center">
                                        <img src="Img/img/KHTT/vtv6.webp" alt="" class="m-auto">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="ex_contact pd-tb grid reveal" style="height: 100%; width: 100%;">
            <div class="wide">
                <div class="title_ex" style="margin-bottom: 50px;">
                    <h3>Giá Trị Khi Sử Dụng FindJob</h3>
                    <hr>
                </div>
                <div class="ex_content_contact fl_bxx ">
                    <div class="ex_content1 mg-rp">
                        <div>
                            <img src="Img/img/giatri/92836.webp" alt="" class="img-fluid">
                            <div class="pd-32">
                                <h4><b>Đối Với Doanh Nghiệp</b></h4>
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span>Đưa tuyển dụng trở thành lợi thế cạnh tranh của doanh nghiệp:
                                            <b>gia tăng cơ hội tuyển đúng người</b>, giúp thúc đẩy hoạt động kinh doanh hiệu quả,
                                            hướng đến chuyển đổi số thành công.</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span>Chuẩn hóa toàn bộ quy trình tuyển dụng thống nhất và bài bản với <b>Talent Acquisition Funnel</b>.</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span>Xây dựng thương hiệu tuyển dụng <b>uy tín, chuyên nghiệp</b>.
                                            .</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span><b>Tiết kiệm </b>thời gian, chi phí cho hoạt động tuyển dụng.
                                        </span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>


                    <div class="ex_content1">
                        <div>
                            <img src="Img/img/giatri/17732.webp" alt="" class="img-fluid">
                            <div class="pd-32">
                                <h4><b>Đối Với Nhà Tuyển Dụng</b></h4>
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span><b>Quản lý tập trung</b> tất cả các hoạt động tạo ra hiệu quả cho mỗi vị trí tuyển dụng theo chiến dịch tuyển dụng.</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span>Đăng tin tuyển dụng, tạo & quản lý nguồn ứng viên <b>hiệu quả</b>.</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span>Có <b>tư duy ứng dụng công nghệ</b> trong tuyển dụng, xử lý nghiệp vụ tuyển dụng nhanh chóng, thông minh, tổ chức công việc hiệu quả
                                            .</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check abc mr-5"></i>
                                        <span>Chủ động lên kế hoạch & <b>tối ưu chi phí</b> tuyển dụng theo các số liệu đo lường.
                                        </span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <section class="page-section end_contact reveal mgb-5" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Liên Hệ Với Chúng Tôi</h2>
                    <h3 class="section-subheading text-muted">Chúng Tôi Sẽ Giúp Bạn Giải Quyết Mọi Thắc Mắc</h3>
                </div>
                <form id="contactForm" method="POST">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" name="myname" id="name" type="text" placeholder="Tên của bạn *" value="<?= $myname  ?>" />
                                <div class="error_r"><?php if ($mess1 != '') {
                                                            echo $mess1;
                                                        } ?></div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" name="myemail" id="email" type="email" placeholder="Email *" value="<?= $myemail ?>" />
                                <div class="error_r"><?php if ($mess2 != '') {
                                                            echo $mess2;
                                                        } else if ($mess3 != '') {
                                                            echo $mess3;
                                                        } ?></div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" name="myphone" id="phone" type="tel" placeholder="Số điện thoại *" value="<?= $myphone  ?>" />
                                <div class="error_r"><?php if ($mess4 != '') {
                                                            echo $mess4;
                                                        } else if ($mess5 != '') {
                                                            echo $mess5;
                                                        } ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" name="mytext" id="message" placeholder="... *" value="<?= $mytext  ?>"></textarea>
                                <div class="error_r"><?php if ($mess6 != '') {
                                                            echo $mess6;
                                                        } ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div> -->

                    <!-- <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Lỗi, không gửi được tin nhắn!</div>
                    </div> -->
                    <div class="text-center"><input class="btn btn-primary btn-xl text-uppercase " value="Xác Nhận" name="xacnhan" type="submit"></div>
                </form>
            </div>
        </section>
        <?php include_once './Footer.php' ?>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

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

</body>

</html>