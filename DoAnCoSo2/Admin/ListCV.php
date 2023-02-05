<?php
include '../Config.php';
include '../ConnectMySQL.php';
$us = '';
if (isset($_SESSION['userAD'])) {
    $us = $_SESSION['userAD'];
} else {
    header('location: 404.html');
}

$vl0 = 0;
$vl1 = 0;
$vl2 = 0;
$vl3 = 0;
$vl4 = 0;
$vl5 = 0;
$vl6 = 0;

$sqll = "SELECT * FROM `cv`";
$sqlll = execute($sqll);

foreach ($sqlll as $value) {
    if ($value['topic'] == 'Kinh Nghiệm') {
        $vl1 += 1;
        $vl0 += 1;
    } else if ($value['topic'] == 'Đơn giản') {
        $vl0 += 1;
        $vl2 += 1;
    } else if ($value['topic'] == 'Màu sắc') {
        $vl0 += 1;
        $vl3 += 1;
    } else if ($value['topic'] == 'Công nghệ') {
        $vl0 += 1;
        $vl4 += 1;
    } else if ($value['topic'] == 'Xã hội') {
        $vl0 += 1;
        $vl5 += 1;
    } else {
        $vl0 += 1;
        $vl6 += 1;
    }
}
$idvcv = '';
if (isset($_GET['idvcv'])) {
    $idvcv = $_GET['idvcv'];
    $sqlcv = "DELETE FROM `cv` WHERE `idcv` = '$idvcv'";
    $sqlcv2 = insertA($sqlcv);
    if ($sqlcv2) {
        echo '<script language="javascript">
            alert("Xóa thành công!!!");
        </script>';
    } else {
        echo '<script language="javascript">
            alert("Xóa không thành công, Vui lòng kiểm tra lại!!!");
        </script>';
    }
    header('location: ListCV.php');
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

    <title>Quản Lí CV</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                    <h1 class="h3 mb-2 text-gray-800 centerrr">Danh Sách Quản Lí CV</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thông Kê Chi Tiết:</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><span class="s0">Tổng Số CV Hiện Tại</span></th>
                                            <th><span class="s1">Mẫu Kinh Nghiệm</span></th>
                                            <th><span class="s3">Mẫu Đơn Giản</span> </th>
                                            <th><span class="s4">Mẫu Màu Sắc</span> </th>
                                            <th><span class="s2">Mẫu Công Nghệ</span></th>
                                            <th><span class="s5">Mẫu Xã Hội</span> </th>
                                            <th><span class="s6">Các Mẫu Khác</span> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span id="s1"><?= $vl0 ?></span></td>
                                            <td><span id="s2"><?= $vl1 ?></span></td>
                                            <td><span id="s3"><?= $vl2 ?></span></td>
                                            <td><span id="s4"><?= $vl3 ?></span></td>
                                            <td><span id="s5"><?= $vl4 ?></span></td>
                                            <td><span id="s6"><?= $vl5 ?></span></td>
                                            <td><span id="s7"><?= $vl6 ?></span></td>
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
                        <div class="card-header py-3 dlp-f">
                            <h6 class="m_auto font-weight-bold text-primary">Danh Sách Chi Tiết:</h6>
                            <div class="">
                                <a href="NewCV.php" class="btn btn-success">Thêm CV Mới</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Chủ Đề</th>
                                            <th>Thể Loại</th>
                                            <th>Thời gian đăng tải</th>
                                            <th>Thực Hiện</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Chủ Đề</th>
                                            <th>Thể Loại</th>
                                            <th>Thời gian đăng tải</th>
                                            <th>Thực Hiện</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($sqlll); $i++) { ?>
                                            <tr>
                                                <td><?= $sqlll[$i]['titlecv']  ?></td>
                                                <td><?= $sqlll[$i]['topic']  ?></td>
                                                <td><?php echo $sqlll[$i]['time']  ?></td>
                                                <!-- <td><a target="_blank" href="../MyCV.php">Xem chi tiết</a></td> -->
                                                <td>
                                                    <form method="POST">
                                                        <a href="UpdateCV.php?idcvcv=<?= $sqlll[$i]['idcv'] ?>" class="btn btn-warning">Cập nhật</a> || <a href="ListCV.php?idvcv=<?= $sqlll[$i]['idcv'] ?>" class="btn btn-danger" onclick="return confirm('Bạn Muốn Xóa Mẫu CV Này?')">Xóa</a>
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