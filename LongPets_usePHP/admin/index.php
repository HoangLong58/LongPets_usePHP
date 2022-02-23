<?php
require_once('../database/database.php');
require_once('../utils/utils.php');

$nguoimua = getAdminToken();
$nhanvien = getNhanVienToken();
if($nguoimua == null && $nhanvien == null) {
    header('Location: ./admin_authen/login_admin.php');
    die();
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
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Biểu đồ -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        </script>
        <script>
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
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

        function toast({ title = "", message = "", type = "info", duration = 3000 }) {
            const main = document.getElementById("toast");
            if (main) {
            const toast = document.createElement("div");
        
            // Auto remove toast
            const autoRemoveId = setTimeout(function () {
                main.removeChild(toast);
            }, duration + 1000);
        
            // Remove toast when clicked
            toast.onclick = function (e) {
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
                            <img src="../assets/img/admin2.png" alt="" class="header__logo_admin-img">
                        </a>
                    </div>
                    <nav class="header__navbar" style="position:relative; left: 670px;">
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
                                    <img src="../assets/img/user.jpg" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name">'.$nguoimua['hotennguoimua'].'</span>
                                    <ul class="header__navbar-user-menu">
                                        <li class="header__navbar-user-item">
                                            <a href="">Tài khoản của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="">Địa chỉ của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="./admin_authen/logout_admin.php">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                                ';
                            }
                            if(!empty($nhanvien)) {
                                $hotennhanvien = $nhanvien['hotennhanvien'];
                                echo '
                                <li class="header__navbar-item header__navbar-user">
                                    <img src="../assets/img/user.jpg" alt="" class="header__navbar-user-img">
                                    <span class="header__navbar-user-name">'.$nhanvien['hotennhanvien'].'</span>
                                    <ul class="header__navbar-user-menu">
                                        <li class="header__navbar-user-item">
                                            <a href="">Tài khoản của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="">Địa chỉ của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="./admin_authen/logout_admin.php">Đăng xuất</a>
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
                        if(!empty($nhanvien))
                        if(isset($nhanvien['machucvu'])) {
                            $chucvu = $nhanvien['machucvu'];
                            switch($chucvu) {
                                case '1': //Nhân viên bán hàng - Quản lý đơn hàng, quản lý thú cưng
                                    // echo' <li class="admin_menu_items"><a href="./quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    echo '<li class="admin_menu_items"><a href="./quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    echo '<li class="admin_menu_items"><a href="./quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                                case '2': //Nhân viên maketting - Quản lý khách hàng
                                    // echo '<li class="admin_menu_items"><a href="./quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    echo '<li class="admin_menu_items"><a href="./quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    echo '<li class="admin_menu_items"><a href="./quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                                
                                case '3': //Nhân viên kế toán - Quản lý đơn hàng, quản lý thú cưng
                                    //echo '<li class="admin_menu_items"><a href="./quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    echo '<li class="admin_menu_items"><a href="./quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    echo '<li class="admin_menu_items"><a href="./quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                                case '4': //Nhân viên chuyển kho, vận chuyển - Quản lý đơn hàng
                                    // echo '<li class="admin_menu_items"><a href="./quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                    // echo '<li class="admin_menu_items"><a href="./quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                    echo '<li class="admin_menu_items"><a href="./quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                    break;
                            }
                        }

                        // ADMIN - TOÀN QUYỀN
                        if(!empty($nguoimua)) {
                            echo '
                            <li class="admin_menu_items"><a href="./quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>
                            <li class="admin_menu_items"><a href="./quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>
                            <li class="admin_menu_items"><a href="./quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>
                            <li class="admin_menu_items"><a href="./quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>
                            <li class="admin_menu_items"><a href="./quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>
                            ';
                        }
                        ?>
                    </ul>
                </div>
                <!-- <div class="col-sm-3 sidenav">
                    <span class="admin_menu_header">Trang chủ admin</span>
                    <ul class="admin_menu_list">
                        <li class="admin_menu_items"><a href="./quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>
                        <li class="admin_menu_items"><a href="./quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>
                        <li class="admin_menu_items"><a href="./quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>
                        <li class="admin_menu_items"><a href="./quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>
                        <li class="admin_menu_items"><a href="./quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>
                    </ul>
                </div> -->
          
                <div class="col-md-9">
                    <div class="grid__row">
                        <div class="col-md-8 thongke" style="background-color: #ffffff; margin-top: 10px;">
                            <div style="margin: 10px 0 5px 0;">
                                Thống kê doanh thu theo tháng
                            </div>
                            <hr style="margin: 5px 0 20px 0;">
                            <?php
                            $sql = "select 
                            sum(case month(ngaydathang) when 1 then tongtiendathang
                                    else 0 END) as thang1,
                            sum(case month(ngaydathang) when 2 then tongtiendathang
                                    else 0 END) as thang2,
                            sum(case month(ngaydathang) when 3 then tongtiendathang
                                    else 0 END) as thang3,
                            sum(case month(ngaydathang) when 4 then tongtiendathang
                                    else 0 END) as thang4,
                            sum(case month(ngaydathang) when 5 then tongtiendathang
                                    else 0 END) as thang5,
                            sum(case month(ngaydathang) when 6 then tongtiendathang
                                    else 0 END) as thang6,
                            sum(case month(ngaydathang) when 7 then tongtiendathang
                                    else 0 END) as thang7,
                            sum(case month(ngaydathang) when 8 then tongtiendathang
                                    else 0 END) as thang8,
                            sum(case month(ngaydathang) when 9 then tongtiendathang
                                    else 0 END) as thang9,
                            sum(case month(ngaydathang) when 10 then tongtiendathang
                                    else 0 END) as thang10,
                            sum(case month(ngaydathang) when 11 then tongtiendathang
                                    else 0 END) as thang11,
                            sum(case month(ngaydathang) when 12 then tongtiendathang
                                    else 0 END) as thang12,
                                    sum(tongtiendathang) as canam
                            from dathang
                            WHERE year(ngaydathang) = 2021 and trangthaidathang = 2";
                            $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
                            mysqli_set_charset($conn, 'utf8');
                            $x1 = [1,2,3,4,5,6,7,8,9,10,11,12];
                            $y1 = [];
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result, 1)) {
                            $y1[0] = $row['thang1'];
                            $y1[1] = $row['thang2'];
                            $y1[2] = $row['thang3'];
                            $y1[3] = $row['thang4'];
                            $y1[4] = $row['thang5'];
                            $y1[5] = $row['thang6'];
                            $y1[6] = $row['thang7'];
                            $y1[7] = $row['thang8'];
                            $y1[8] = $row['thang9'];
                            $y1[9] = $row['thang10'];
                            $y1[10] = $row['thang11'];
                            $y1[11] = $row['thang12'];
                            }
                            ?>
                            <canvas id="DoanhSo" style="width:100%;max-width:600px"></canvas>
                            <script>
                            var xValues = [
                            <?php
                            $demx = count($x1);
                            for ($i = 0; $i < $demx; $i++) {
                                if ($i != $demx - 1) {
                                    echo "'$x1[$i]' ,";
                                } else {
                                    echo "'$x1[$i]'";
                                }
                            }
                            ?>
                            ];
                            var yValues = [
                            <?php
                            $demy = count($y1);
                            for ($i = 0; $i < $demy; $i++) {
                                if ($i != $demy - 1) {
                                    echo "'$y1[$i]',";
                                } else {
                                    echo "'$y1[$i]'";
                                }
                            }
                            ?>
                            ];

                            new Chart("DoanhSo", {
                            type: "line",
                            data: {
                                labels: xValues,
                                datasets: [{
                                fill: false,
                                lineTension: 0,
                                backgroundColor: "rgba(0,0,255,1.0)",
                                borderColor: "rgba(0,0,255,0.1)",
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                scales: {
                                yAxes: [{ticks: {min: 0, max:200000000}}],
                                }
                            }
                            });
                            </script>
                        </div>

                        <div class="col-md-4" style="margin-top: 10px;">
                            <?php
                            $sql = "select count(mathucung) as soluong from thucung";
                            $soluong = executeResult($sql, true);
                            $soluongthucung = $soluong['soluong'];
                            $sql1 = "select count(manguoimua) as soluong from nguoimua where manguoimua != 0 and manguoimua != 1";
                            $soluong1 = executeResult($sql1, true);
                            $soluongkhachhang = $soluong1['soluong'];
                            $sql2 = "select count(manhanvien) as soluong from nhanvien where manhanvien != 0";
                            $soluong2 = executeResult($sql2, true);
                            $soluongnhanvien = $soluong2['soluong'];
                            ?>
                            <div class="thongke">
                                <span class="thongke_heading">Số lượng thú cưng hiện tại:</span> 
                                <div class="thongke_body">
                                    <span class="thongke_number"><?=$soluongthucung?></span>
                                    <div class="thongke_icon"><i class="fas fa-paw" style="font-size:20px;color:#ffffff; position: relative; top:15px;"></i></div>
                                </div>
                                <span class="thongke_day">Ngày <?=date('d')?> - Tháng <?=date('m')?> ( Năm <?=date('Y')?>)</span>
                            </div>
                            <div class="thongke">
                                <span class="thongke_heading">Số lượng khách hàng hiện tại:</span> 
                                <div class="thongke_body">
                                    <span class="thongke_number"><?=$soluongkhachhang?></span>
                                    <div class="thongke_icon"><i class="fas fa-comments-dollar" style="font-size:23px;color:#ffffff; position: relative; top:15px;"></i></div>
                                </div>
                                <span class="thongke_day">Ngày <?=date('d')?> - Tháng <?=date('m')?> ( Năm <?=date('Y')?>)</span>
                            </div>
                            <div class="thongke">
                                <span class="thongke_heading">Số lượng nhân viên hiện tại:</span> 
                                <div class="thongke_body">
                                    <span class="thongke_number"><?=$soluongnhanvien?></span>
                                    <div class="thongke_icon"><i class="far fa-address-card" style="font-size:20px;color:#ffffff; position: relative; top:15px;"></i></div>
                                </div>
                                <span class="thongke_day">Ngày <?=date('d')?> - Tháng <?=date('m')?> ( Năm <?=date('Y')?>)</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid__row">
                        <div class="thongke" style="padding-right:0; width:1083px;">
                            <?php
                                // Don hang hom nay
                                $sql = "select count(madathang) as soluongdathang
                                from dathang
                                where day(ngaydathang) = day(now()) and month(ngaydathang) = month(now()) and year(ngaydathang) = year(now())";
                                $soluongdonhang = executeResult($sql, true);
                                $sodonhomnay = 0;
                                if(isset($soluongdonhang['soluongdathang'])){
                                    $sodonhomnay = $soluongdonhang['soluongdathang'];
                                }
                                // Doanh thu hom nay
                                $sql1 = "select sum(tongtiendathang) as tongtien
                                from dathang
                                where day(ngaydathang) = day(now()) and month(ngaydathang) = month(now()) and year(ngaydathang) = year(now()) and trangthaidathang = 2";
                                $tiendathang = executeResult($sql1, true);
                                $tongtien = 0;
                                if(isset($tiendathang['tongtien'])){
                                    $tongtien = $tiendathang['tongtien'];
                                }
                                $tongtien = $tiendathang['tongtien'];
                                // So don hang cho duyet 
                                $sql2 = "select count(madathang) as sodonchoduyet
                                from dathang
                                where day(ngaydathang) = day(now()) and month(ngaydathang) = month(now()) and year(ngaydathang) = year(now()) and trangthaidathang = 1";
                                $choduyet = executeResult($sql2, true);
                                $sodonchoduyet = 0;
                                if(isset($choduyet['sodonchoduyet'])){
                                    $sodonchoduyet = $choduyet['sodonchoduyet'];
                                }
                                $sodonchoduyet = $choduyet['sodonchoduyet'];
                                // So don hang da huy
                                $sql3 = "select count(madathang) as sodondahuy
                                from dathang
                                where day(ngaydathang) = day(now()) and month(ngaydathang) = month(now()) and year(ngaydathang) = year(now()) and trangthaidathang = 4";
                                $dahuy = executeResult($sql3, true);
                                $sodondahuy = 0;
                                if(isset($dahuy['sodondahuy'])){
                                    $sodondahuy = $dahuy['sodondahuy'];
                                }
                                $sodondahuy = $dahuy['sodondahuy'];
                                // Ti le cho duyet
                                if($sodonhomnay == 0){
                                    $tilechoduyet = 0;
                                }else{
                                    $tilechoduyet = round(($sodonchoduyet / $sodonhomnay)*100, 2);
                                }
                                // Ti le huy don
                                if($sodonhomnay == 0){
                                    $tilehuydon = 0;
                                }else{
                                    $tilehuydon = round(($sodondahuy / $sodonhomnay)*100, 2);
                                }
                                ?>
                            <div class="col-md-3">
                                <span class="thongke2_heading">
                                    Số lượng đơn hàng hôm nay: </br>
                                </span>
                                <div style="display: flex; justify-content:space-around;">
                                    <span class="thongke2_number" >
                                        <?=$sodonhomnay?>
                                    </span>
                                    <span style="margin-right: 60px; font-size:13px; font-weight:500;">đơn hàng</span>
                                </div>
                                <!-- <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                        50% Complete (info)
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-3">
                                <span class="thongke2_heading">
                                    Doanh thu hôm nay: </br>
                                </span>
                                <div style="display: flex; justify-content:space-around;">
                                    <span class="thongke2_number" >
                                        <?=money_format($tongtien) ?>
                                    </span>
                                    <span style="margin-right: 60px; font-size:13px; font-weight:500;">&nbspVNĐ</span>
                                </div>
                                <!-- <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                        50% Complete (info)
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-3">
                                <span class="thongke2_heading">
                                    Số đơn hàng chờ duyệt: </br>
                                </span>
                                <div style="display: flex; justify-content:space-around;">
                                    <span class="thongke2_number" >
                                        <?=$sodonchoduyet?>
                                    </span>
                                    <span style="margin-right: 60px; font-size:13px; font-weight:500;">đơn hàng</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$tilechoduyet?>"
                                    aria-valuemin="0" aria-valuemax="100" style="width:<?=$tilechoduyet?>%">
                                    <?=$tilechoduyet?>%
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="thongke2_heading">
                                    Số đơn hàng đã hủy: </br>
                                </span>
                                <div style="display: flex; justify-content:space-around;">
                                    <span class="thongke2_number" >
                                        <?=$sodondahuy?>
                                    </span>
                                    <span style="margin-right: 60px; font-size:13px; font-weight:500;">đơn hàng</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$tilehuydon?>"
                                    aria-valuemin="0" aria-valuemax="100" style="width:<?=$tilehuydon?>%">
                                    <?=$tilehuydon?>%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid__row">
                        <div class="col-sm-6 thongke" style="width: 530px; margin-right:19px" >
                            <?php
                            $sql = "SELECT a.tendanhmuc as tendanhmuc , sum(a.tongsoluong) as tongsoluong
                            from(SELECT chitietdathang.mathucung,sum(soluongchitietdathang) as tongsoluong,danhmuc.tendanhmuc
                            FROM chitietdathang,danhmuc,thucung
                            WHERE chitietdathang.mathucung=thucung.mathucung and thucung.madanhmuc=danhmuc.madanhmuc
                            GROUP BY mathucung) a
                            GROUP BY a.tendanhmuc";
                            $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
                            mysqli_set_charset($conn, 'utf8');
                            $x = [];
                            $y = [];
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result, 1)) {
                            $x[] = $row['tendanhmuc'];
                            $y[] = $row['tongsoluong'];
                            }
                            ?>
                            <div id="DanhMuc" style="width:100%; max-width:600px; height:500px;">
                            </div>

                            <script>
                                google.charts.load('current', {
                                'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Contry', 'Mhl'],

                                    <?php
                                    $count = count($x);
                                    for ($i = 0; $i < $count; $i++) {
                                    if ($i != $count - 1) {
                                        echo "[" . "'$x[$i]',$y[$i]" . "],\n";
                                    } else {
                                        echo "[" . "'$x[$i]',$y[$i]" . "]";
                                    }
                                    }
                                    ?>
                                ]);

                                var options = {
                                    title: 'Thống kê số lượng thú cưng bán được theo danh mục'
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('DanhMuc'));
                                chart.draw(data, options);
                                }
                            </script>
                        </div>
                        <div class="col-sm-6 thongke" style="margin-left: -15px;">
                            <?php
                            $sql4 = "select dm.tendanhmuc, sum(d.tongtiendathang) as tongtiengiaodich
                            from dathang d join chitietdathang cd on d.madathang = cd.madathang join thucung t on cd.mathucung = t.mathucung join danhmuc dm on t.madanhmuc = dm.madanhmuc join nguoimua n on d.manguoimua = n.manguoimua 
                            where d.trangthaidathang = 2
                            GROUP by dm.madanhmuc";
                            $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
                            mysqli_set_charset($conn, 'utf8');
                            $x2 = [];
                            $y2 = [];
                            $result = mysqli_query($conn, $sql4);
                            while ($row = mysqli_fetch_array($result, 1)) {
                            $x2[] = $row['tendanhmuc'];
                            $y2[] = $row['tongtiengiaodich'];
                            }
                            $demx2 = count($x2);
                            $demy2 = count($y2);

                            ?>
                            <canvas id="thongkedoanhthutheodanhmuc" style="width:100%;max-width:600px"></canvas>
                            <script>
                                var xValues = [
                                <?php
                                for ($i = 0; $i < $demx2; $i++) {
                                    if ($i != $demx2 - 1) {
                                        echo "'$x2[$i]' ,";
                                    } else {
                                        echo "'$x2[$i]'";
                                    }
                                }
                                ?>
                                ];
                                var yValues = [
                                <?php
                                for ($i = 0; $i < $demy2; $i++) {
                                    if ($i != $demy2 - 1) {
                                        echo "'$y2[$i]',";
                                    } else {
                                        echo "'$y2[$i]'";
                                    }
                                }
                                ?>
                                ];
                                var barColors = ["red", "green","blue","orange","brown","yello","pink","purple"];
                                
                                new Chart("thongkedoanhthutheodanhmuc", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                    }]
                                },
                                options: {
                                    legend: {display: false},
                                    title: {
                                    display: true,
                                    text: "Thống kê doanh thu theo danh mục"
                                    }
                                }
                                });
                            </script>
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