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
$idupcv = '';
$mes1 = '';
$mes2 = '';
$mes3 = '';
$titlecv = '';
$topiccv = '';
$imgcv = '';
$newimgcv = '';
$titlecv2 = '';
$topiccv2 = '';
$imgcv2 = '';

if (isset($_GET['idcvcv'])) {
    $idupcv = $_GET['idcvcv'];
    $sqlcv3 = "SELECT * FROM `cv` WHERE `idcv`= '$idupcv'";
    $sqlcv4 = execute($sqlcv3);
    foreach ($sqlcv4 as $value) {
        $titlecv = $value['titlecv'];
        $topiccv = $value['topic'];
        $imgcv = $value['imgcv'];
    }
}
if (isset($_POST['them'])) {
    if (isset($_POST['titlecv'])) {
        $titlecv2 = $_POST['titlecv'];
    }
    if (isset($_POST['topiccv'])) {
        $topiccv2 = $_POST['topiccv'];
    }
    $imgcv2 = $_POST['newimgcv'];
    // $newimgcv = $_POST['newimgcv'];
    if ($titlecv2 == '' || $titlecv2 == ' ') {
        $titlecv2 = $titlecv;
    }
    if ($topiccv2 == '0' || $topiccv2 == 0) {
        $topiccv2 = $topiccv;
    }
    echo $topiccv2 . 'huhuhuhu';
    if ($imgcv2 == '' || $imgcv2 == ' ') {
        $imgcv2 = $imgcv;
    }
    // echo $titlecv2 . '-' . $topiccv2 . '-' . $imgcv2;
    if ($titlecv2 != '' && $topiccv2 != 0 && $imgcv2 != '') {
        $sqlcv = "UPDATE `cv` SET `titlecv`= '$titlecv2', `topic` = '$topiccv2',`imgcv`='$imgcv2' WHERE `idcv`= '$idupcv'";
        $sqlcv2 = insertA($sqlcv);
        if ($sqlcv) {
            echo '<script language="javascript">
            alert("Cập nhật thành công!!!");
        </script>';
            header("location: UpdateCV.php?idcvcv=$idupcv");
        } else {
            echo '<script language="javascript">
            alert("Cập nhật không thành công!!!, vui lòng kiểm tra lại");
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

    <title>Cập Nhật CV</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/NewCV.css">
    <link rel="stylesheet" href="css/styleConfirmCompany.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    <h1 class="h3 mb-2 text-gray-800 centerrr">Cập Nhật CV</h1>
                    <div class="card shadow mb-4 vh-70 bdriu">
                        <div class="pd-form">
                            <form action="" method="POST" class="form_upcv">
                                <div class="up_imgcv">
                                    <div class="tf_center">
                                        <img src="../Img/<?= $imgcv ?>" alt="" class="img_up">
                                    </div>
                                    <div class="upload_file">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Cập nhật lại ảnh CV</span>
                                            <input type="file" class="upload" name="newimgcv">
                                        </div>
                                    </div>
                                </div>
                                <div class="up_cnt pss-rl">
                                    <div class="mgb_10">
                                        <label for="">Chủ đề:</label>
                                        <div class="ipcv1 dpfl">
                                            <div class="mgr-20">
                                                <input type="text" disabled="disabled" placeholder="Nhập chủ đề của cv..." name="titlecv" value="<?= $titlecv ?> " class="iptitlecv">
                                                <!-- <div>
                                                    <span class="error_cv"></span>
                                                </div> -->
                                            </div>
                                            <div class="pss-rl">
                                                <a class="updatee a3"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mgb-40">
                                        <label for="">Thể Loại:</label>
                                        <div class="dpfl">
                                            <div>
                                                <input type="text" value="<?= $topiccv ?>" class="ip_topic" disabled="disabled">
                                            </div>
                                            <div class="dp_none"><select name="topiccv" id="">
                                                    <option value="0">Chọn thể loại...</option>
                                                    <option value="Đơn giản">Đơn giản</option>
                                                    <option value="Kinh Nghiệm">Kinh Nghiệm</option>
                                                    <option value="Xã hội">Xã hội</option>
                                                    <option value="Màu sắc">Màu sắc</option>
                                                    <option value="Công nghệ">Công nghệ</option>
                                                    <option value="Khác">Khác...</option>
                                                </select>
                                                <!-- <div>
                                                    <span class="error_cv"> </span>
                                                </div> -->
                                            </div>
                                            <div class="pss-rl">
                                                <a class="updatee a4"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="tl-center pss-ab"><input type="submit" class="btn btn-primary tl-center pd-10-60" value="Cập Nhật" name="them"></div>
                                </div>

                            </form>
                        </div>
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
        $('.a3').click(function() {
            $('.iptitlecv').removeAttr('disabled')
        })
        $('.a4').click(function() {
            $('.dp_none').toggle()
        })
    </script>
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