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

$us = '';
$y = 'username';
if (isset($_SESSION['userAD'])) {
    $us = $_SESSION['userAD'];
} else {
    header('location: 404.html');
}

$vl1 = 0;
$vl2 = 0;
$vl3 = 0;


$sqll = "SELECT * FROM `account`";
$sqlll = execute($sqll);

foreach ($sqlll as $value) {
    if ($value['vaitro'] == 'Khách Hàng') {
        $vl1 += 1;
        $vl2 += 1;
    } else {
        $vl1 += 1;
        $vl3 += 1;
    }
}

if (isset($_GET['username'])) {
    $uss = $_GET['username'];
    $arr = explode('_', $uss);
    // echo $arr[0] . ' - ' . $arr[1];
    if ($arr[1] == 'Xoa') {
        $emailv = '';
        $sqlv = "SELECT email FROM account WHERE `username` = '$arr[0]'";
        $sqlv2 = execute($sqlv);
        foreach ($sqlv2 as $value) {
            $emailv = $value['email'];
        }
        $sqll2 = "DELETE FROM `account` WHERE `username`='$arr[0]'";
        $sqll3 = insertA($sqll2);
        if ($sqll3) {
            echo '<script language="javascript">
            alert("Xóa thành công!!!");
        </script>';
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
                $mail->addAddress($emailv, 'User');     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'VAN DE TAI KHOAN';
                $mail->Body    = 'Tài khoản của bạn đã bị Admin xóa truy cập khỏi website FindJob.com';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo 'Gửi Mã Thất Bại, Lỗi: ', $mail->ErrorInfo;
            }
            header('location: ListAccount.php');
        } else {
            echo '<script language="javascript">
            alert("Xóa không thành công!!!, Vui lòng kiểm tra lại");
        </script>';
            header('location: ListAccount.php');
        }
    } else if ($arr[1] == 'Huy') {
        $emailv = '';
        $sqlv = "SELECT email FROM account WHERE `username` = '$arr[0]'";
        $sqlv2 = execute($sqlv);
        foreach ($sqlv2 as $value) {
            $emailv = $value['email'];
        }
        $sqll4 = "UPDATE `account` SET `vaitro`='Hủy Quyền Truy Cập' WHERE `username`='$arr[0]'";
        $sqll5 = insertA($sqll4);
        if ($sqll5) {
            echo '<script language="javascript">
            alert("Cập nhật thành công!!!");
        </script>';
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
                $mail->addAddress($emailv, 'User');     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'VAN DE TAI KHOAN';
                $mail->Body    = 'Tài khoản của bạn đã bị Admin ngừng truy cập khỏi website FindJob.com';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo 'Gửi Mã Thất Bại, Lỗi: ', $mail->ErrorInfo;
            }
            header('location: ListAccount.php');
        } else {
            echo '<script language="javascript">
            alert("Cập nhật không thành công, Vui lòng kiểm tra lại!!!");
        </script>';
        }
    } else {
        $emailv = '';
        $sqlv = "SELECT email FROM account WHERE `username` = '$arr[0]'";
        $sqlv2 = execute($sqlv);
        foreach ($sqlv2 as $value) {
            $emailv = $value['email'];
        }
        $sqll4 = "UPDATE `account` SET `vaitro`='Khách Hàng' WHERE `username`='$arr[0]'";
        $sqll5 = insertA($sqll4);
        if ($sqll5) {
            echo '<script language="javascript">
            alert("Cập nhật thành công!!!");
        </script>';
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
                $mail->addAddress($emailv, 'User');     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'VAN DE TAI KHOAN';
                $mail->Body    = 'Admin đã câp quyền hoạt động lại cho tài khoản của bạn tại website FindJob.com';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo 'Gửi Mã Thất Bại, Lỗi: ', $mail->ErrorInfo;
            }
            header('location: ListAccount.php');
        } else {
            echo '<script language="javascript">
            alert("Cập nhật không thành công, Vui lòng kiểm tra lại!!!");
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

    <title>Danh Sách Các Tài Khoản</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleConfirmCompany.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once('HeaderAD.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('HeaderNav.php') ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 centerrr">Danh Sách Tài Khoản</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thông Kê Chi Tiết:</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><span class="s0">Tổng Số Tài Khoản</span></th>
                                            <th><span class="s1">Đã Cấp Quyền Truy Cập</span></th>
                                            <th><span class="s2">Đã Hủy Quyền Truy Cập</span> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <span id="s1"><?= $vl1 ?></span></td>
                                            <td><span id="s2"><?= $vl2 ?></span></td>
                                            <td><span id="s3"><?= $vl3 ?></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Tài Khoản</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên Đăng Nhập</th>
                                            <th>Mật Khẩu</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Email</th>
                                            <th>Lịch Sử Tìm Kiếm</th>
                                            <th>Vai Trò</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên Đăng Nhập</th>
                                            <th>Mật Khẩu</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Email</th>
                                            <th>Lịch Sử Tìm Kiếm</th>
                                            <th>Vai Trò</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($sqlll); $i++) { ?>
                                            <tr>
                                                <td> <a href="../ManagerAD.php?usr=<?= $sqlll[$i]['username']  ?>" class="" target="_blank"><?= $sqlll[$i]['username']  ?></a> </td>
                                                <td>********</td>
                                                <td><?php echo $sqlll[$i]['phonenumber']  ?></td>
                                                <td><?php echo $sqlll[$i]['email']  ?></td>
                                                <td><?php echo $sqlll[$i]['historysearch']  ?></td>
                                                <td>
                                                    <form action="" method="POST" class="ss_company list_acc">
                                                        <?php
                                                        if ($sqlll[$i]['vaitro'] == 'Khách Hàng') { ?>
                                                            <div class="pd-10">
                                                                <a href="ListAccount.php?username=<?php echo $sqlll[$i][$y] ?>_Huy" class="btn btn-warning btn-icon-split mgr-5" onclick="return confirm('Bạn Muốn Hủy Quyền Truy Cập Tài Khoản: <?= $sqlll[$i]['username']  ?>')">Hủy Truy Cập</a> ||
                                                                <a href="ListAccount.php?username=<?php echo $sqlll[$i][$y] ?>_Xoa" class="btn btn-danger btn-icon-split mgl-5" onclick="return confirm('Bạn Muốn Xóa Tài Khoản: <?= $sqlll[$i]['username']  ?>')">Xóa TK</a>
                                                                <div>
                                                                </div>
                                                            </div>

                                                        <?php } else { ?>
                                                            <div class="pd-10">
                                                                <!-- <input type="submit" value="Cấp Quyền Truy Cập" name="suces" class="btn btn-success btn-icon-split"> -->
                                                                <a href="ListAccount.php?username=<?php echo $sqlll[$i][$y] ?>_Cap" class="btn btn-success btn-icon-split mgl-23">Cấp Quyền</a> ||
                                                                <a href="ListAccount.php?username=<?php echo $sqlll[$i][$y] ?>_Xoa" class="btn btn-danger btn-icon-split mgl-5" onclick="return confirm('Bạn Muốn Xóa Tài Khoản: <?= $sqlll[$i]['username']  ?>')">Xóa TK</a>
                                                            </div>

                                                        <?php } ?>

                                                    </form>


                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Topbar -->

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('FooterAD.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include_once('LogOut.php') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>


    <!-- Custom scripts for all pages-->

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        function animateNumber(finalNumber, duration = 5000, startNumber = 0, callback) {
            let currentNumber = startNumber
            const interval = window.setInterval(updateNumber, 17)

            function updateNumber() {
                if (currentNumber >= finalNumber) {
                    clearInterval(interval)
                } else {
                    let inc = Math.ceil(finalNumber / (duration / 17))
                    if (currentNumber + inc > finalNumber) {
                        currentNumber = finalNumber
                        clearInterval(interval)
                    } else {
                        currentNumber += inc
                    }
                    callback(currentNumber)
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            animateNumber(<?= $vl1 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s1').innerText = formattedNumber
            })

            animateNumber(<?= $vl2 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s2').innerText = formattedNumber
            })

            animateNumber(<?= $vl3 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s3').innerText = formattedNumber
            })
            animateNumber(<?= $vl3 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s4').innerText = formattedNumber
            })
        })
    </script>
</body>

</html>