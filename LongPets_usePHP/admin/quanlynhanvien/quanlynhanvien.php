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

$hotennhanvien = "";
$ngaysinhnhanvien = "";
$gioitinhnhanvien = "";
$emailnhanvien = "";
$sdtnhanvien = "";
$diachinhanvien = "";
$tinhthanhpho = "";
$quanhuyen = "";
$phuongxa = "";
$chucvunhanvien = "";
if (!empty($_POST)) {
    if (isset($_POST['chucvunhanvien'])) {
        $chucvunhanvien = $_POST['chucvunhanvien'];
    }
    if (isset($_POST['emailnhanvien'])) {
        $emailnhanvien = $_POST['emailnhanvien'];
    }
    if (isset($_POST['passwordnhanvien'])) {
        $passwordnhanvien = $_POST['passwordnhanvien'];
        $passwordnhanvien = getSecurityMD5($passwordnhanvien);
    }
    if (isset($_POST['hotennhanvien'])) {
        $hotennhanvien = $_POST['hotennhanvien'];
    }
    if (isset($_POST['ngaysinhnhanvien'])) {
        $ngaysinhnhanvien = $_POST['ngaysinhnhanvien'];
    }
    if (isset($_POST['gioitinhnhanvien'])) {
        $gioitinhnhanvien = $_POST['gioitinhnhanvien'];
    }
    if (isset($_POST['sdtnhanvien'])) {
        $sdtnhanvien = $_POST['sdtnhanvien'];
    }
    if (isset($_POST['diachinhanvien'])) {
        $diachinhanvien = $_POST['diachinhanvien'];
    }
    if (isset($_POST['tinhthanhpho'])) {
        $tinhthanhpho = $_POST['tinhthanhpho'];
    }
    if (isset($_POST['quanhuyen'])) {
        $quanhuyen = $_POST['quanhuyen'];
    }
    if (isset($_POST['phuongxa'])) {
        $phuongxa = $_POST['phuongxa'];
    }
    if (isset($_POST['manhanvienchinhsua'])) {
        $manhanvienchinhsua = $_POST['manhanvienchinhsua'];
        $sql = "update nhanvien set machucvu = '$chucvunhanvien', maxa = '$phuongxa', matkhau = '$passwordnhanvien', hotennhanvien = '$hotennhanvien', ngaysinhnhanvien = '$ngaysinhnhanvien', gioitinhnhanvien = '$gioitinhnhanvien', sdtnhanvien = '$sdtnhanvien', diachinhanvien = '$diachinhanvien' where manhanvien = '$manhanvienchinhsua';";
        execute($sql);
        echo '<script>alert("Cập nhật nhân viên thành công")</script>';
    }else {
        $sql = "insert into nhanvien (machucvu, maxa, emailnhanvien, matkhau, hotennhanvien, ngaysinhnhanvien, gioitinhnhanvien, sdtnhanvien, diachinhanvien) values ($chucvunhanvien, '$phuongxa', '$emailnhanvien', '$passwordnhanvien', '$hotennhanvien', '$ngaysinhnhanvien', '$gioitinhnhanvien', '$sdtnhanvien', '$diachinhanvien');";
        execute($sql);
        echo '<script>alert("Thêm nhân viên thành công")</script>';
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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }
    </script>

    <script>
        function showSuccessToast() {
            toast({
                title: "Thành công!",
                message: "Bạn đã thêm một danh mục mới.",
                type: "success",
                duration: 5000
            });
        }

        function showErrorToast() {
            toast({
                title: "Thất bại!",
                message: "Có lỗi xảy ra, danh mục đã tồn tại.",
                type: "error",
                duration: 5000
            });
        }

        function toast({
            title = "",
            message = "",
            type = "info",
            duration = 3000
        }) {
            const main = document.getElementById("toast");
            if (main) {
                const toast = document.createElement("div");

                // Auto remove toast
                const autoRemoveId = setTimeout(function() {
                    main.removeChild(toast);
                }, duration + 1000);

                // Remove toast when clicked
                toast.onclick = function(e) {
                    if (e.target.closest(".toast__close")) {
                        main.removeChild(toast);
                        clearTimeout(autoRemoveId);
                    }
                };

                const icons = {
                    success: "fas fa-check-circle",
                    info: "fas fa-info-circle",
                    warning: "fas fa-exclamation-circle",
                    error: "fas fa-exclamation-circle"
                };
                const icon = icons[type];
                const delay = (duration / 1000).toFixed(2);

                toast.classList.add("toast", `toast--${type}`);
                toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

                toast.innerHTML = `
                        <div class="toast__icon">
                            <i class="${icon}"></i>
                        </div>
                        <div class="toast__body">
                            <h3 class="toast__title">${title}</h3>
                            <p class="toast__msg">${message}</p>
                        </div>
                        <div class="toast__close">
                            <i class="fas fa-times"></i>
                        </div>
                    `;
                main.appendChild(toast);
            }
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
                            <input type="text" id="timkiem" class="header__search-input" placeholder="Nhập tên nhân viên cần tìm. VD: Nguyễn Văn C">
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
                            if (!empty($nguoimua)) {
                                $hotennguoimua = $nguoimua['hotennguoimua'];
                                echo '
                                <li class="header__navbar-item header__navbar-user">
                                    <img src="../../assets/img/user.jpg" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name">' . $nguoimua['hotennguoimua'] . '</span>
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
                    if(!empty($nhanvien)) {
                        if(isset($nhanvien['machucvu'])) {
                            $chucvu = $nhanvien['machucvu'];
                            switch($chucvu) {
                                case '1': //Nhân viên bán hàng - Quản lý đơn hàng
                                    // echo' <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                                case '2': //Nhân viên maketting - Quản lý khách hàng
                                    // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                                
                                case '3': //Nhân viên kế toán - Quản lý đơn hàng, quản lý thú cưng
                                    //echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                                case '4': //Nhân viên chuyển kho, vận chuyển - Quản lý đơn hàng
                                    // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                            }
                        }
                    }
                    if(!empty($nguoimua)) {
                        echo '
                        <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>
                        <li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>
                        <li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>
                        <li class="admin_menu_items"><a href="quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>
                        <li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>
                        ';
                    }
                    
                    ?>
                </ul>
            </div>

            <div class="col-md-9">
                <h1 style="margin: 20px;">Quản lý nhân viên</h1>
                <div id="toast"></div>
                <div class="danhmuc_content thongke" id="noidung">
                    <div class="" style="display: flex;justify-content:space-between;">
                        <div class="admin_menu_items" style="width: 200px; position: relative; right: 13px; top:2px;">
                            <a href="" class="" style="text-decoration: none; color: var(--white-color);" data-toggle="modal" data-target="#ThemNhanVienModal">Thêm nhân viên mới</a>
                            <!-- Modal -->
                            <div id="ThemNhanVienModal" class="modal fade" role="dialog">
                                <div class="modal-dialog" style="width: 1000px;">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <!-- FORM NHAP THONG TIN CA NHAN CUA NHAN VIEN -->
                                            <form action="" method="POST">
                                                <div class="panel-heading" style="background-color:var(--primary-color); border-color:var(--primary-color);">
                                                    <h2 class="text-center" style="color: var(--white-color);">Thêm nhân viên mới</h2>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="chucvunhanvien">Chức vụ:</label>
                                                        <select required="true" class="form-control" id="chucvunhanvien" name="chucvunhanvien">
                                                            <option selected value="">-- Chọn chức vụ --</option>
                                                            <?php
                                                            $sql = "select * from chucvunhanvien";
                                                            $chucvu = executeResult($sql, false);
                                                            var_dump($chucvu);
                                                            foreach ($chucvu as $cv) {
                                                                echo '
                                                                    <option  value="' . $cv['machucvu'] . '">' . $cv['tenchucvu'] . '</option>
                                                                    ';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="emailnhanvien">Email:</label>
                                                        <input required="true" type="email" class="form-control" id="emailnhanvien" name="emailnhanvien" placeholder="Email của nhân viên" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="passwordnhanvien">Mật khẩu:</label>
                                                        <input required="true" type="password" class="form-control" id="passwordnhanvien" name="passwordnhanvien" placeholder="Mật khẩu của nhân viên" minlength="8" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="repasswordnhanvien">Xác nhận mật khẩu:</label>
                                                        <input required="true" type="password" class="form-control" id="repasswordnhanvien" placeholder="Xác nhận mật khẩu của nhân viên" minlength="8" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="usr">Họ tên:</label>
                                                        <input required="true" type="text" class="form-control" id="hotennhanvien" name="hotennhanvien" placeholder="Email của nhân viên" value="">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-6">
                                                            <label for="birthday">Ngày sinh:</label>
                                                            <input type="date" class="form-control" id="ngaysinhnhanvien" name="ngaysinhnhanvien" value="">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="">Giới tính</label>
                                                            <select class="form-control" name="gioitinhnhanvien">
                                                                <option value="Nam">Nam</option>
                                                                <option value="Nữ">Nữ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="sodienthoai">Số điện thoại:</label>
                                                        <input required="true" type="sodienthoai" class="form-control" id="sdtnhanvien" name="sdtnhanvien" placeholder="Số điện thoại của nhân viên" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="address">Địa chỉ:</label>
                                                        <input type="text" class="form-control" id="diachinhanvien" name="diachinhanvien" placeholder="Địa chỉ của nhân viên" value="">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-4">
                                                            <label for="">Tỉnh, thành phố:</label>
                                                            <select class="form-control" name="tinhthanhpho" id="tinhthanhpho">
                                                                <option value="">-- Chọn tỉnh, thành phố --</option>
                                                                <?php
                                                                $sql = "select * from tinhthanhpho";
                                                                $tenthanhpho_1 = executeResult($sql);
                                                                foreach ($tenthanhpho_1 as $item) {
                                                                    if ($item['mathanhpho'] == $tenthanhpho) {
                                                                        echo '<option selected value="' . $item['mathanhpho'] . '">' . $item['tenthanhpho'] . '</option> ';
                                                                    } else {
                                                                        echo '<option value="' . $item['mathanhpho'] . '">' . $item['tenthanhpho'] . '</option> ';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="">Quận, huyện:</label>
                                                            <select class="form-control" name="quanhuyen" id="quanhuyen">
                                                                <option value="">-- Chưa chọn tỉnh, thành phố --</option>
                                                                <?php
                                                                $sql = "select * from quanhuyen where mathanhpho = '$tenthanhpho'";
                                                                $quanhuyen = executeResult($sql);
                                                                foreach ($quanhuyen as $item) {
                                                                    if ($item['maquanhuyen'] == $tenhuyen) {
                                                                        echo '<option selected value="' . $item['maquanhuyen'] . '">' . $item['tenquanhuyen'] . '</option> ';
                                                                    } else {
                                                                        echo '<option value="' . $item['maquanhuyen'] . '">' . $item['tenquanhuyen'] . '</option> ';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="">Phường, xã:</label>
                                                            <select class="form-control" name="phuongxa" id="phuongxa">
                                                                <option value="">-- Chưa chọn quận, huyện --</option>
                                                                <?php
                                                                $sql = "select * from xaphuongthitran where maquanhuyen ='$tenhuyen'";
                                                                $tenxa_1 = executeResult($sql);
                                                                foreach ($tenxa_1 as $item) {
                                                                    if ($item['maxa'] == $tenxa) {
                                                                        echo '<option selected value="' . $item['maxa'] . '">' . $item['tenxa'] . '</option> ';
                                                                    } else {
                                                                        echo '<option value="' . $item['maxa'] . '">' . $item['tenxa'] . '</option> ';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="themthucung_btn">
                                                        <button type="submit" id="themnhanvien" class="btn btn--primary">Thêm</button>
                                                        <button type="reset" class="btn btn--primary">Làm lại</button>
                                                        <button class="btn btn--primary" data-dismiss="modal">Trở về</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Sửa Nhan Vien-->
                            <div id="SuaNhanVienModal" class="modal fade" role="dialog">
                                <div class="modal-dialog" style="width: 1000px;">
                                    <div class="modal-content">
                                        <div class="modal-body" id="suanhanvien">
                                            <!-- FORM CAP NHAT THONG TIN CA NHAN CUA NHAN VIEN -->
                                            <form action="" method="POST">
                                                <div class="panel-heading" style="background-color:var(--primary-color); border-color:var(--primary-color);">
                                                    <h2 class="text-center" style="color: var(--white-color);">Cập nhật thông tin nhân viên</h2>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="chucvunhanvien">Chức vụ:</label>
                                                        <select required="true" class="form-control" id="chucvunhanvien" name="chucvunhanvien">
                                                            <option selected value="">-- Chọn chức vụ --</option>
                                                            <?php
                                                            $sql = "select * from chucvunhanvien";
                                                            $chucvu = executeResult($sql, false);
                                                            foreach ($chucvu as $cv) {
                                                                echo '
                                                                    <option  value="' . $cv['machucvu'] . '">' . $cv['tenchucvu'] . '</option>
                                                                    ';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="emailnhanvien">Email:</label>
                                                        <input required="true" type="email" class="form-control" id="emailnhanvien" name="emailnhanvien" placeholder="Email của nhân viên" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="passwordnhanvien">Mật khẩu:</label>
                                                        <input required="true" type="password" class="form-control" id="passwordnhanvien" name="passwordnhanvien" placeholder="Mật khẩu của nhân viên" minlength="8" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="repasswordnhanvien">Xác nhận mật khẩu:</label>
                                                        <input required="true" type="password" class="form-control" id="repasswordnhanvien" placeholder="Xác nhận mật khẩu của nhân viên" minlength="8" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="usr">Họ tên:</label>
                                                        <input required="true" type="text" class="form-control" id="hotennhanvien" name="hotennhanvien" placeholder="Email của nhân viên" value="">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-6">
                                                            <label for="birthday">Ngày sinh:</label>
                                                            <input type="date" class="form-control" id="ngaysinhnhanvien" name="ngaysinhnhanvien" value="">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="">Giới tính</label>
                                                            <select class="form-control" name="gioitinhnhanvien">
                                                                <option value="Nam">Nam</option>
                                                                <option value="Nữ">Nữ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="sodienthoai">Số điện thoại:</label>
                                                        <input required="true" type="sodienthoai" class="form-control" id="sdtnhanvien" name="sdtnhanvien" placeholder="Số điện thoại của nhân viên" value="">
                                                    </div>
                                                    <div class="form-group" style="padding:0 15px;">
                                                        <label for="address">Địa chỉ:</label>
                                                        <input type="text" class="form-control" id="diachinhanvien" name="diachinhanvien" placeholder="Địa chỉ của nhân viên" value="">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-4">
                                                            <label for="">Tỉnh, thành phố:</label>
                                                            <select class="form-control" name="tinhthanhpho" id="tinhthanhpho">
                                                                <option value="">-- Chọn tỉnh, thành phố --</option>
                                                                <?php
                                                                $sql = "select * from tinhthanhpho";
                                                                $tenthanhpho_1 = executeResult($sql);
                                                                foreach ($tenthanhpho_1 as $item) {
                                                                    if ($item['mathanhpho'] == $tenthanhpho) {
                                                                        echo '<option selected value="' . $item['mathanhpho'] . '">' . $item['tenthanhpho'] . '</option> ';
                                                                    } else {
                                                                        echo '<option value="' . $item['mathanhpho'] . '">' . $item['tenthanhpho'] . '</option> ';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="">Quận, huyện:</label>
                                                            <select class="form-control" name="quanhuyen" id="quanhuyen">
                                                                <option value="">-- Chưa chọn tỉnh, thành phố --</option>
                                                                <?php
                                                                $sql = "select * from quanhuyen where mathanhpho = '$tenthanhpho'";
                                                                $quanhuyen = executeResult($sql);
                                                                foreach ($quanhuyen as $item) {
                                                                    if ($item['maquanhuyen'] == $tenhuyen) {
                                                                        echo '<option selected value="' . $item['maquanhuyen'] . '">' . $item['tenquanhuyen'] . '</option> ';
                                                                    } else {
                                                                        echo '<option value="' . $item['maquanhuyen'] . '">' . $item['tenquanhuyen'] . '</option> ';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="">Phường, xã:</label>
                                                            <select class="form-control" name="phuongxa" id="phuongxa">
                                                                <option value="">-- Chưa chọn quận, huyện --</option>
                                                                <?php
                                                                $sql = "select * from xaphuongthitran where maquanhuyen ='$tenhuyen'";
                                                                $tenxa_1 = executeResult($sql);
                                                                foreach ($tenxa_1 as $item) {
                                                                    if ($item['maxa'] == $tenxa) {
                                                                        echo '<option selected value="' . $item['maxa'] . '">' . $item['tenxa'] . '</option> ';
                                                                    } else {
                                                                        echo '<option value="' . $item['maxa'] . '">' . $item['tenxa'] . '</option> ';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="themthucung_btn">
                                                        <button type="submit" id="themnhanvien" class="btn btn--primary">Cập nhật</button>
                                                        <button type="reset" class="btn btn--primary">Làm lại</button>
                                                        <button class="btn btn--primary" data-dismiss="modal">Trở về</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                                 
                        </div>
                        <?php
                        $sqlsoluong = "select count(manhanvien) as soluong from nhanvien where manhanvien != 0;";
                        $soluong = executeResult($sqlsoluong);
                        foreach($soluong as $sl) {
                        echo '
                        <h4 style="position: relative; text-align: center;margin:0;top:25px;">Hiện có <b style="color: var(--primary-color);">'.$sl['soluong'].'</b> nhân viên</h4>
                        ';
                        }
                        ?>
                    </div>
                    <table class="table table-bordered" style="margin-top: 15px; font-size: 1.6rem;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Chức vụ</th>
                                <th>Email</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th style="background-color: #f1f2f7;">Chỉnh sửa</th>
                                <th style="background-color: #f1f2f7;">Xóa</th>
                            </tr>
                        </thead>
                        <tbody id="mytable">
                            <?php
                            $sql = "select count(manhanvien) as number from nhanvien where manhanvien != 0";
                            $result = executeResult($sql, true);
                            $number = 0;
                            if($result != null && count($result) >0) {
                                $number = $result['number'];
                            }
                            $pages = ceil($number / 10);
                            $current_page = 1;
                            if(isset($_GET['page'])) {
                                $current_page = $_GET['page'];
                            }
                            $index = ($current_page-1)*10;

                            $sql = "select * from nhanvien n join xaphuongthitran x on n.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho join chucvunhanvien c on n.machucvu = c.machucvu where n.manhanvien != 0 limit $index, 10;";
                            $NhanVienList = executeResult($sql, false);
                            $dem = $index + 1;
                            foreach ($NhanVienList as $nv) {
                                echo '
                                <tr>
                                    <td>' . $dem++ . '</td>
                                    <td>' . $nv['tenchucvu'] . '</td>
                                    <td>' . $nv['emailnhanvien'] . '</td>
                                    <td>' . $nv['hotennhanvien'] . '</td>
                                    <td>' . $nv['gioitinhnhanvien'] . '</td>
                                    <td>' . $nv['ngaysinhnhanvien'] . '</td>
                                    <td>' . $nv['sdtnhanvien'] . '</td>
                                    <td>' . $nv['diachinhanvien'] . ', ' . $nv['tenxa'] . ', ' . $nv['tenquanhuyen'] . ',' . $nv['tenthanhpho'] . '</td>
                                    <td style="background-color: #f1f2f7;"><button name="chinhsuanhanvien" class="danhmuc_remove-icon" value="' . $nv['manhanvien'] . '" ><i class="far fa-edit"></i></i></button></td>
                                    <td style="background-color: #f1f2f7;"><button name="xoanhanvien" class="danhmuc_remove-icon" value="'. $nv['manhanvien'].'"><i class="far fa-trash-alt"></i></button></td>
                                </tr>
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                    <ul class="pagination home-product__pagination" style="display: flex;">
                            <?php
                            if($current_page > 1) {
                                ?>
                                <li class="pagination-item">
                                <a href="?page=<?=$current_page-1?>" class="pagination-item__link">
                                <i class="pagination-item__icon fas fa-angle-left"></i>
                                </a>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            for ($i=1; $i <= $pages; $i++) { 
                                echo '
                                <li class="pagination-item pagination-item--active">
                                <a href="?page='.$i.'" class="pagination-item__link">'.$i.'</a>
                                </li>
                                ';
                            }
                            ?>
                            <?php
                            if($current_page < $pages) {
                                ?>
                                <li class="pagination-item">
                                <a href="?page=<?=$current_page + 1?>" class="pagination-item__link">
                                <i class="pagination-item__icon fas fa-angle-right"></i>
                                </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                </div>
            </div>

        </div>
        <footer class="container-fluid">
            <p></p>
        </footer>
    </div>
    <!-- SCRIPT Tinh thanh pho -->
    <script>
        $(document).ready(function() {
            $("#tinhthanhpho").change(function(e) {
                mathanhpho = $("#tinhthanhpho").val();
                $.post('../../user/capnhatthongtin/quanhuyen.php', {
                    "mathanhpho": mathanhpho
                }, function(data) {
                    $("#quanhuyen").html(data);
                })
            });
            $("#quanhuyen").change(function(e) {
                maquanhuyen = $("#quanhuyen").val();
                $.post('../../user/capnhatthongtin/phuongxa.php', {
                    "maquanhuyen": maquanhuyen
                }, function(data) {
                    $("#phuongxa").html(data);
                })
            });
        });
    </script>
    <!-- Script tim kiem -->
    <script>
        $(document).ready(function() {
            $("#timkiem").on("keyup", function() {
                var timkiem = $("#timkiem").val().toLowerCase();
                $.post("data.php", {
                    send_timkiemnv: timkiem
                }, function(result) {
                    $('#mytable').html(result);
                })
            });
        });
    </script>
    <!-- Script bat validate -->
    <script>
        $(function() {
            $('#themnhanvien').on('click', function(e) {
                var hotennhanvien = $('#hotennhanvien').val();
                var emailnhanvien = $('#emailnhanvien').val();
                var passwordnhanvien = $('#passwordnhanvien').val();
                var repasswordnhanvien = $('#repasswordnhanvien').val();
                var sdtnhanvien = $('#sdtnhanvien').val();
                var diachinhanvien = $('#diachinhanvien').val();
                // alert(rematkhaunguoimua);

                if (tennguoimua == "" || emailnguoimua == "" || matkhaunguoimua == "" || rematkhaunguoimua == "" || sdtnhanvien == "" || diachinhanvien == "") {
                    e.preventDefault();
                    alert('Bạn chưa nhập thông tin');
                    window.location.reload();
                }
                if (passwordnhanvien != repasswordnhanvien) {
                    e.preventDefault();
                    alert('Mật khẩu không trùng khớp, vui lòng nhập lại');
                    window.location.reload();
                }
            })
        })
    </script>
    <!-- Script Cap nhat Nhan Vien -->
    <script>
        $(function() {
            $(document).on('click', 'button[name = chinhsuanhanvien]', function() {
                var manhanvien = $(this).val();
                $.post("data.php", {
                    send_manhanvien: manhanvien
                }, function(result) {
                    $('#suanhanvien').html(result);
                    $('#SuaNhanVienModal').modal('show');
                })
            })
        })
    </script>
    <!-- SCRIPT xoa nhan vien -->
    <script>
        $(function() {
            $(document).on('click', 'button[name = xoanhanvien]', function() {
                var manhanvienxoa = $(this).val();
                option = confirm("Bạn muốn xóa nhân viên này?")
                if(!option) {
                    return;
                }
                $.post('data.php', {
                    'manhanvienxoa': manhanvienxoa
                }, function(data) {
                    alert(data);
                    location.reload()
                })
            })
        })
        // function deleteNhanVien(manhanvienxoa) {
        //     option = confirm("Bạn muốn xóa nhân viên này?")
        //     if(!option) {
        //         return;
        //     }
        //     $.post('data.php', {
        //         'manhanvienxoa': manhanvienxoa
        //     }, function(data) {
        //         alert(data);
        //         location.reload()
        //     })
        // }
    </script>

</body>

</html>