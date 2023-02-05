<?php
include '../Config.php';
include '../ConnectMySQL.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$us = '';
if (isset($_SESSION['userAD'])) {
    $us = $_SESSION['userAD'];
} else {
    header('location: 404.html');
}

$sqll = "SELECT * FROM `company` WHERE `trangthaichitiet`='Đang Chờ Xác Nhận'";
$sqlll = execute($sqll);

$vl4 = count($sqlll);
$now = getdate();
$timee = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"] . " " . $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
if (isset($_GET['id'])) {
    $idd = $_GET['id'];
    $usee = '';
    $arr = explode('_', $idd);
    $sqlv = "SELECT username FROM `company` WHERE `idcongty` ='$arr[0]'";
    $sqlv2 = execute($sqlv);
    foreach ($sqlv2 as $value) {
        $usee = $value['username'];
    }
    // echo $arr[0] . '-' . $arr[1];
    if ($arr[1] == 'Chap') {
        $sqll2 = "UPDATE `company` SET `trangthaichitiet`='Chấp Nhận' WHERE `idcongty`='$arr[0]'";
        $sqll3 = insertA($sqll2);
        if ($sqll3) {
            echo '<script language="javascript">
            alert("Cập nhật thành công!!!");
        </script>';
            $sqlv3 = "INSERT INTO `notificationadmin`(`username`,`usernamead`,`idtopic`,`topic`,`trangthai`,`time`) VALUES('$usee','$us','$arr[0]','Công Ty','chấp nhận','$timee')";
            $sqlv4 = insertA($sqlv3);
            header('location: ConfirmCompany.php');
        } else {
            echo '<script language="javascript">
            alert("Cập nhật không thành công!!!, Vui lòng kiểm tra lại");
        </script>';
            header('location: ConfirmCompany.php');
        }
    } else {
        $sqll2 = "UPDATE `company` SET `trangthaichitiet`='Từ Chối' WHERE `idcongty`='$arr[0]'";
        $sqll3 = insertA($sqll2);
        if ($sqll3) {
            echo '<script language="javascript">
            alert("Cập nhật thành công!!!");
        </script>';
            $sqlv3 = "INSERT INTO `notificationadmin`(`username`,`usernamead`,`idtopic`,`topic`,`trangthai`,`time`) VALUES('$usee','$us','$arr[0]','Công Ty','từ chối','$timee')";
            $sqlv4 = insertA($sqlv3);
            header('location: ConfirmCompany.php');
        } else {
            echo '<script language="javascript">
            alert("Cập nhật không thành công!!!, Vui lòng kiểm tra lại");
        </script>';
            header('location: ConfirmCompany.php');
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

    <title>Xác Nhận Công Ty</title>

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
                    <h1 class="h3 mb-2 text-gray-800 centerrr">Danh Sách Công Ty Chờ Xác Nhận</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Công Ty: <?= $vl4 ?></h6>
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Số Lượng:</h6> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên Đăng Nhập</th>
                                            <th>Tên Công Ty</th>
                                            <th>Loại Hình Hoạt Động</th>
                                            <th>Trạng Thái Công Ty</th>
                                            <th>Xem Thêm Thông Tin</th>
                                            <th>Quyết Định</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên Đăng Nhập</th>
                                            <th>Tên Công Ty</th>
                                            <th>Loại Hình Hoạt Động</th>
                                            <th>Trạng Thái Công Ty</th>
                                            <th>Xem Thêm Thông Tin</th>
                                            <th>Quyết Định</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($sqlll); $i++) { ?>
                                            <tr>
                                                <td><?= $sqlll[$i]['username']  ?></td>
                                                <td><?= $sqlll[$i]['tencongty']  ?></td>
                                                <td><?php echo $sqlll[$i]['loaihinhhd']  ?></td>
                                                <td><?php echo $sqlll[$i]['trangthaicty']  ?></td>
                                                <td><a target="_blank" href="../CompanyDetailAD.php?idcompany=<?php echo $sqlll[$i]['idcongty'] ?>">Xem chi tiết</a></td>
                                                <td>
                                                    <form action="" method="POST" class="ss_company">
                                                        <div class="btn btn-success btn-icon-split mgr-5 mw-95">
                                                            <span class="icon text-white-50 ps-rl">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <!-- <input type="submit" value="Chấp Nhận" name="suces" class="btn btn-success btn-icon-split"> -->
                                                            <a href="ConfirmCompany.php?id=<?php echo $sqlll[$i]['idcongty'] ?>_Chap" class="btn btn-success btn-icon-split mgr-5">Chấp Nhận</a>
                                                        </div>
                                                        <!-- <div style="height: 100%;width:1%"></div> -->
                                                        <div class="btn btn-danger btn-icon-split mgl-5 mw-95">
                                                            <span class="icon text-white-50 ps-rl">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <!-- <input type="submit" value="Từ Chối" name="dangerr" class="btn btn-danger btn-icon-split"> -->
                                                            <a href="ConfirmCompany.php?id=<?php echo $sqlll[$i]['idcongty'] ?>_Tu" class="btn btn-danger btn-icon-split mgl-5" onclick="return confirm('Bạn Muốn Từ Chối Xác Nhận Công Ty: `<?= $sqlll[$i]['tencongty']  ?>`  Của tài khoản `<?= $sqlll[$i]['username']  ?>`')">Từ Chối</a>
                                                        </div>

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

                <!-- Begin Page Content -->

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
</body>

</html>