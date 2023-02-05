<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png " href="https://timviec.com.vn/favicon.png">
    <title>FindJob</title>
</head>

<body>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Home.php">
            <div class="sidebar-brand-icon">
                <!-- rotate-n-15 -->
                <!-- <i class="fas fa-laugh-wink"></i> -->
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin FindJob</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="Home.php">
                <i class="fa-solid fa-house-user"></i>
                <!-- <i class="fa-solid fa-house-user"></i> -->
                <span>Trang Chủ</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Dữ liệu website
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa-solid fa-building"></i>
                <span>Quản Lí Công Ty</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Thực hiện:</h6>
                    <a class="collapse-item" href="ConfirmCompany.php">Xác Nhận Các Công ty</a>
                    <a class="collapse-item" href="ListCompany.php">Danh Sách Các Công Ty</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-blog"></i>
                <span>Quản Lí Blog</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Thực hiện:</h6>
                    <a class="collapse-item" href="ConfirmBlog.php">Xác Nhận Các Blog</a>
                    <a class="collapse-item" href="ListBlog.php">Danh Sách Các Blog</a>
                    <!-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a> -->
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
                <i class="fa-solid fa-clipboard"></i>
                <span>Quản Lí Tuyển Dụng</span>
            </a>
            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Thực hiện:</h6>
                    <a class="collapse-item" href="ConfirmHired.php">Xác Nhận Công Việc</a>
                    <a class="collapse-item" href="ListHired.php">Dah Sách Các Công Việc</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoo" aria-expanded="true" aria-controls="collapseTwoo">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản Lí CV</span>
            </a>
            <div id="collapseTwoo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Thực hiện:</h6>
                    <a class="collapse-item" href="ListCV.php">Dah Sách Các CV</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa-solid fa-user"></i>
                <span>Quản Lí Tài Khoản</span>
            </a>
            <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Thực hiện:</h6>
                    <a class="collapse-item" href="ListAccount.php">Danh Sách Các Tài Khoản</a>
                    <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Quản lí website
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <!-- <i class="fas fa-fw fa-folder"></i> -->
                <i class="fa-solid fa-window-maximize"></i>
                <span>Các Trang</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Giao Diện:</h6>
                    <a class="collapse-item" href="../index.php" target="_blank">Trang Chủ</a>
                    <a class="collapse-item" href="../Company.php" target="_blank">Công Ty</a>
                    <a class="collapse-item" href="../Blog.php" target="_blank">Blog</a>
                    <a class="collapse-item" href="../PostBlog.php" target="_blank">Đăng Tải Blog</a>
                    <a class="collapse-item" href="../Contact.php" target="_blank">Liên Hệ</a>
                    <a class="collapse-item" href="../MyCV.php" target="_blank">Tạo CV</a>
                    <a class="collapse-item" href="../Hired.php" target="_blank">Nhà Tuyển Dụng</a>
                    <a class="collapse-item" href="../ConnectCompany.php" target="_blank">Kết Nối Công Ty</a>
                    <a class="collapse-item" href="../Search.php" target="_blank">Tìm Kiếm Công Việc</a>
                    <a class="collapse-item" href="../Login.php" target="_blank">Đăng Nhập</a>
                    <a class="collapse-item" href="../SignIn.php" target="_blank">Đăng Ký</a>
                    <!-- <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a> -->
                </div>
            </div>
        </li>


        <!-- <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li> -->

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Lịch sử
        </div>
        <li class="nav-item">
            <a class="nav-link" href="History.php">
                <!-- <i class="fas fa-fw fa-table"></i> -->
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Lịch sử hoạt động</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->
        <!-- <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

    </ul>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>