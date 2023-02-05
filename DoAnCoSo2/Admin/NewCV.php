<?php
include '../Config.php';
include '../ConnectMySQL.php';
$us = '';
if (isset($_SESSION['userAD'])) {
    $us = $_SESSION['userAD'];
} else {
    header('location: 404.html');
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$now = getdate();
$timee = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];


// $idvcv = '';
// if (isset($_GET['idvcv'])) {
//     $idvcv = $_GET['idvcv'];
//     $sqlcv = "DELETE FROM `cv` WHERE `idcv` = '$idvcv'";
//     $sqlcv2 = insertA($sqlcv);
//     if ($sqlcv2) {
//         echo '<script language="javascript">
//             alert("Xóa thành công!!!");
//         </script>';
//     } else {
//         echo '<script language="javascript">
//             alert("Xóa không thành công, Vui lòng kiểm tra lại!!!");
//         </script>';
//     }
//     header('location: ListCV.php');
// }
$mes1 = '';
$mes2 = '';
$mes3 = '';
$titlecv = '';
$topiccv = '';
$imgcv = '';
if (isset($_POST['them'])) {
    $titlecv = $_POST['titlecv'];
    $topiccv = $_POST['topiccv'];
    $imgcv = $_POST['imgcv'];
    if ($titlecv == '' || $titlecv == ' ') {
        $mes1 = 'Vui lòng nhập tiêu đề CV';
    }
    if ($topiccv == '0' || $topiccv == 0) {
        $mes2 = ' Vui lòng chọn thể loại CV';
    }
    if ($imgcv == '' || $imgcv == ' ') {
        $mes3 = 'Vui lòng chọn ảnh CV';
    }
    if ($mes1 == '' && $mes2 == '' && $mes3 == '') {
        $sqlcv = "INSERT INTO `cv` (`titlecv`,`topic`,`imgcv`,`time`) VALUES('$titlecv','$topiccv','$imgcv','$timee')";
        $sqlcv2 = insertA($sqlcv);
        if ($sqlcv) {
            echo '<script language="javascript">
            alert("Thêm thành công!!!");
        </script>';
        } else {
            echo '<script language="javascript">
            alert("Thêm không thành công!!!, vui lòng kiểm tra lại");
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

    <title>Thêm Mới CV</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/NewCV.css">
    <link rel="stylesheet" href="css/styleConfirmCompany.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    <h1 class="h3 mb-2 text-gray-800 centerrr">Thêm Mới CV</h1>
                    <div class="card shadow mb-4 vh-70">
                        <form action="" method="POST" class="m_autoo form_cv">
                            <div class="mgb_20">
                                <label for="">Chủ đề:</label>
                                <div class="ipcv1">
                                    <input type="text" placeholder="Nhập chủ đề của cv..." name="titlecv">
                                    <div>
                                        <span class="error_cv"> <?= $mes1 ?> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="dpl-f mgb_20">
                                <div class="mgr-40">
                                    <label for="">Thể Loại:</label>
                                    <div><select name="topiccv" id="">
                                            <option value="0">Chọn thể loại...</option>
                                            <option value="Đơn giản">Đơn giản</option>
                                            <option value="Kinh Nghiệm">Kinh Nghiệm</option>
                                            <option value="Xã hội">Xã hội</option>
                                            <option value="Màu sắc">Màu sắc</option>
                                            <option value="Công nghệ">Công nghệ</option>
                                            <option value="Khác">Khác...</option>
                                        </select>
                                        <div>
                                            <span class="error_cv"> <?= $mes2 ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mgl-40">
                                    <div>
                                        <label for="">Ảnh CV:</label>
                                        <div>
                                            <input type="file" name="imgcv">
                                            <div>
                                                <span class="error_cv"> <?= $mes3 ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tl-center"><input type="submit" class="btn btn-primary tl-center" value="Thêm Mới" name="them"></div>
                        </form>

                    </div>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

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
    <script>
        var id = $('#username').val();
    </script>
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
            animateNumber(<?= $vl0 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s1').innerText = formattedNumber
            })

            animateNumber(<?= $vl1 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s2').innerText = formattedNumber
            })

            animateNumber(<?= $vl2 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s3').innerText = formattedNumber
            })
            animateNumber(<?= $vl3 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s4').innerText = formattedNumber
            })
            animateNumber(<?= $vl4 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s5').innerText = formattedNumber
            })
            animateNumber(<?= $vl5 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s6').innerText = formattedNumber
            })
            animateNumber(<?= $vl6 ?>, 3000, 0, function(number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('s7').innerText = formattedNumber
            })
        })
    </script>
</body>

</html>