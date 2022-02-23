<?php
require_once('../../database/database.php');
require_once('../../utils/utils.php');

$nguoimua = getAdminToken();
$nhanvien = getNhanVienToken();
if($nguoimua == null && $nhanvien == null) {
    header('Location: ../admin_authen/login_admin.php');
    die();
}
// Khong phai admin thi thoat ra
if(isset($nhanvien)){
    if($nhanvien['machucvu'] == 1 or $nhanvien['machucvu'] == 2 or $nhanvien['machucvu'] == 3 or $nhanvien['machucvu'] == 4){
        header('Location: ../admin_authen/login_admin.php');
        die();
    }
}

$madanhmuc = "";
if(!empty($_POST)) {
    $madanhmuc = "";
    if(isset($_POST['tendanhmuc']) and $_POST['tendanhmuc'] != '') {
        $tendanhmuc = $_POST['tendanhmuc'];
    }
    if(isset($_POST['madanhmuc'])) {
        $madanhmuc = $_POST['madanhmuc'];
    }
    $tendanhmuc = str_replace('\'', '\\\'', $tendanhmuc);
    $madanhmuc = str_replace('\'', '\\\'', $madanhmuc);
    if($madanhmuc != "") {
        $sql = "update danhmuc set tendanhmuc = '$tendanhmuc' where madanhmuc = ".$madanhmuc;
    }
    execute($sql);
    header("Location: quanlydanhmuc.php");
    die();
}

$madanhmucget ="";
if(isset($_GET['madanhmuc'])) {
    $madanhmucget = $_GET['madanhmuc'];
    $sql = 'select * from danhmuc where madanhmuc = '.$madanhmucget;
    $dmList = executeResult($sql);
    if($dmList != null && count($dmList) > 0) {
        $dm = $dmList[0];
        $tendanhmucget = $dm['tendanhmuc'];
    }
    else {
        $madanhmucget ="";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Long Pets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
<script>
    function lamlai() {
        document.getElementById("tendanhmuc").value = "";
    }
    function trove() {
        window.open("quanlydanhmuc.php","_self");
    }
</script>
</head>
<body>
    <div class="app">
        <header class="header" style="height: 90px;">
            <div class="grid">
                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="http://localhost/LongPets_usePHP/admin/" class="header__logo-link">
                            <img src="../../assets/img/admin2.png" alt="" class="header__logo_admin-img">
                        </a>
                    </div>
                

                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">

                            <!-- Search history -->
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="">Husky</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Chó kiểng</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Mèo anh</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="header__search-select">
                            <span class="header__search-select-label">Trong shop</span>
                            <i class="header__search-select-icon fas fa-angle-down"></i>

                            <ul class="header__search-option">
                                <li class="header__search-option-item header__search-option-item--active">
                                    <span>Trong shop</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="header__search-option-item">
                                    <span>Ngoài shop</span>
                                    <i class="fas fa-check"></i>
                                </li>
                            </ul>
                        </div>
                        <button class="header__search-btn">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </div>

                    <nav class="header__navbar">
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item header__navbar-item--has-notify">
                                <a href="" class="header__navbar-item-link">
                                    <i class="header__navbar-icon far fa-bell"></i>
                                    Thông báo
                                </a>
                                <!--Thông báo-->
                                <div class="header__notify">
                                    <header class="header__notify-header">
                                        <h3>Thông báo mới nhận</h3>
                                    </header>
                                    <ul class="header__notify-list">
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="" class="header__notify-link">
                                                <img src="https://lh6.googleusercontent.com/X7JYEBXkxFMLWlXgsipqGbOYN6j9Lh_83FdKL-WPAtVKZsNnwrEE-VJVR83IXO73jgq4NrVuwPER2JVgkuyIpFMDMLzN3kbY1uHnD2_5enIx52yB-0IWf_VIfgFcpQBb4Yp3-an0" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">[BÁN] Gâu đần siêu xinh cần tìm chủ mới cho bé</span>
                                                    <span class="header__notify-descriotion">- Tặng kèm microchip định danh thú cưng- Tặng kèm microchip định danh thú cưng</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item">
                                            <a href="" class="header__notify-link">
                                                <img src="https://ipet.vn/wp-content/uploads/2019/06/husky.png" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">[BÁN] Chó husky chân lùn 52 ngày tuổi (đực - cái) đều có</span>
                                                    <span class="header__notify-descriotion">Tìm chủ cho bầy pug thuần chủng đã được 50 ngày tuổi</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item">
                                            <a href="" class="header__notify-link">
                                                <img src="http://welcomelafrance.com/wp-content/uploads/2019/10/meo-anh-long-ngan.jpg" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">[BÁN] Mèo con lai Anh được 2tháng tuổi</span>
                                                    <span class="header__notify-descriotion">- Mèo lai anh, nay bé được 2 tháng tuổi , biết ăn , biết vệ sinh vô thao cát ạ . Bé rất lanh . Ai mua alo cho mình nha . Em có mèo đen ( cái) , mèo trắng ( đực, cái) </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer class="header__notify-footer">
                                        <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                                    </footer>
    
                                </div>
                            </li>
                            <li class="header__navbar-item">
                                <a href="" class="header__navbar-item-link">
                                    <i class="header__navbar-icon far fa-comments"></i>
                                    Tin nhắn
                                </a>
                            </li>
                            <?php
                            if(!empty($nguoimua)) {
                                $hotennguoimua = $nguoimua['hotennguoimua'];
                                echo '
                                <li class="header__navbar-item header__navbar-user">
                                    <img src="../../assets/img/user.jpg" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name">'.$nguoimua['hotennguoimua'].'</span>
                                    <ul class="header__navbar-user-menu">
                                        <li class="header__navbar-user-item">
                                            <a href="">Tài khoản của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="">Địa chỉ của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="../admin_authen/logout_admin.php">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                                ';
                            }
                            if(!empty($nhanvien)) {
                                $hotennhanvien = $nhanvien['hotennhanvien'];
                                echo '
                                <li class="header__navbar-item header__navbar-user">
                                    <img src="../../assets/img/user.jpg" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name">'.$nhanvien['hotennhanvien'].'</span>
                                    <ul class="header__navbar-user-menu">
                                        <li class="header__navbar-user-item">
                                            <a href="">Tài khoản của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="">Địa chỉ của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="../admin_authen/logout_admin.php">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                                ';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <div class="container-fluid" style="background-color: #f1f2f7;"> 
            <div class="col-sm-3 sidenav thongke">
                <span class="admin_menu_header">Trang chủ admin</span>
                <ul class="admin_menu_list">
                        <?php
                        if(!empty($nhanvien)){
                            if(isset($nhanvien['machucvu'])) {
                                $chucvu = $nhanvien['machucvu'];
                                switch($chucvu) {
                                    case '1': //Nhân viên bán hàng - Quản lý đơn hàng
                                        // echo' <li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                        break;
                                    case '2': //Nhân viên maketting - Quản lý khách hàng
                                        // echo '<li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                        break;
                                    
                                    case '3': //Nhân viên kế toán - Quản lý đơn hàng, quản lý thú cưng
                                        //echo '<li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                        break;
                                    case '4': //Nhân viên chuyển kho, vận chuyển - Quản lý đơn hàng
                                        // echo '<li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                        break;
                                }
                            }
                        }
                        // ADMIN - TOÀN QUYỀN
                        if(!empty($nguoimua)) {
                            echo '
                            <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>
                            <li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>
                            <li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>
                            <li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>
                            <li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>
                            ';
                        }
                        
                        ?>
                    </ul>
            </div>
            
            <div class="col-md-9">
                <div class="row">
                    <div class="suadanhmuc_duongdan"><a href="admin.php">Admin</a>/ <a href="quanlydanhmuc.php" class="">Quản lý danh mục</a>/ Sửa danh mục</div>
                </div>
                <div class="row">
                    <div class="suadanhmuc_container thongke">
                        <h1 class="suadanhmuc_header">Sửa danh mục</h1>
                        <form action="" class="suadanhmuc_form" method ="POST">
                            <div class="suadanhmuc_form_content">
                                <span class="suadanhmuc_form_header">Tên danh mục:</span>
                                <input type="number" name="madanhmuc" value="<?=$madanhmucget?>" style="display: none;">
                                <input class="suadanhmuc_form_input" type="text"id="tendanhmuc" name="tendanhmuc" value="<?php if(isset($tendanhmucget)){echo $tendanhmucget; };?>">
                            </div>
                            <div class="suadanhmuc_form_button">
                                <button type="submit" class="btn suadanhmuc_btn-sua">Sửa</button>
                                <button type="button" class="btn suadanhmuc_btn-lamlai"onclick="lamlai()">Làm lại</button>
                                <button type="button" class="btn suadanhmuc_btn-trove" onclick="trove()">Trở về</button>
                            </div>
                            
                        
                        </form>
                    </div>

                </div>
            </div>

        </div>
        <footer class="container-fluid">
            <p></p>
        </footer>
    </div>
</body>
</html>