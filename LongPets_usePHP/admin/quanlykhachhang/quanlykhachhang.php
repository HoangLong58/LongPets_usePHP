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
    if($nhanvien['machucvu'] == 1 or $nhanvien['machucvu'] == 3 or $nhanvien['machucvu'] == 4){
        header('Location: ../admin_authen/login_admin.php');
        die();
    }
}
$chucvu = 0;
if(isset($nhanvien)){
    $chucvu = $nhanvien['machucvu'];
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
                            <img src="../../assets/img/admin2.png" alt="" class="header__logo_admin-img">
                        </a>
                    </div>
                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" id="timkiem" class="header__search-input" placeholder="Nhập tên khách hàng cần tìm. VD: Lê Văn C">
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
                                        // echo' <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                        break;
                                    case '2': //Nhân viên maketting - Quản lý khách hàng
                                        // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        echo '<li class="admin_menu_items"><a href="quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                        break;
                                    
                                    case '3': //Nhân viên kế toán - Quản lý đơn hàng, quản lý thú cưng
                                        //echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                        break;
                                    case '4': //Nhân viên chuyển kho, vận chuyển - Quản lý đơn hàng
                                        // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
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
                            <li class="admin_menu_items"><a href="quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>
                            <li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>
                            <li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>
                            ';
                        }
            
                        ?>
                    </ul>
                </div>
          
                <div class="col-md-9">
                    <h1 style="margin: 20px;">Quản lý khách hàng</h1>
                    <div id="toast"></div>   
                    <div class="danhmuc_content thongke" id="noidung">
                        <div class="">
                        <?php
                            $sqlsoluong = "select count(manguoimua) as soluong from nguoimua where maquyentruycap ='2' and manguoimua != '0';";
                            $soluong = executeResult($sqlsoluong);
                            foreach($soluong as $sl) {
                            echo '
                            <h4 style="text-align:right;">Hiện có <b style="color: var(--primary-color);">'.$sl['soluong'].'</b> khách hàng</h4>
                            ';
                            }
                            ?>
                        </div>
                        <table class="table table-bordered thongke" style="margin-top: 15px; font-size: 1.6rem;">
                            <thead>
                              <tr>
                                <th>STT</th>
                                <th>Email</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <?php
                                if(isset($chucvu)){
                                    if($chucvu == 2){
                                        echo "";
                                    }else{
                                        ?>
                                        <th style="background-color: #f1f2f7;">Xóa</th>
                                        <?php
                                    }
                                }
                                ?>
                              </tr>
                            </thead>
                            <tbody id="mytable"> 
                            <?php

                            $sql = "select count(manguoimua) as number from nguoimua where manguoimua != 0 and maquyentruycap = 2";
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

                            $sql = "select n.manguoimua, n.maquyentruycap, n.emailnguoimua, n.hotennguoimua, n.ngaysinhnguoimua, n.gioitinhnguoimua, n.sdtnguoimua, n.diachinguoimua, x.tenxa, q.tenquanhuyen, t.tenthanhpho from nguoimua n join xaphuongthitran x on n.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho where n.maquyentruycap=2 and n.manguoimua != '0' limit $index, 10;";
                            $NguoiMuaList = executeResult($sql, false);
                            $dem = $index + 1;
                            foreach($NguoiMuaList as $nm) {
                                if(isset($chucvu)){
                                    if($chucvu == 2){
                                        echo '
                                        <tr>
                                            <td>'.$dem ++.'</td>
                                            <td>'.$nm['emailnguoimua'].'</td>
                                            <td>'.$nm['hotennguoimua'].'</td>
                                            <td>'.$nm['gioitinhnguoimua'].'</td>
                                            <td>'.$nm['ngaysinhnguoimua'].'</td>
                                            <td>'.$nm['sdtnguoimua'].'</td>
                                            <td>'.$nm['diachinguoimua'].', '.$nm['tenxa'].', '.$nm['tenquanhuyen'].','. $nm['tenthanhpho'].'</td>
                                        </tr>
                                        ';
                                    }else{
                                        echo '
                                        <tr>
                                            <td>'.$dem ++.'</td>
                                            <td>'.$nm['emailnguoimua'].'</td>
                                            <td>'.$nm['hotennguoimua'].'</td>
                                            <td>'.$nm['gioitinhnguoimua'].'</td>
                                            <td>'.$nm['ngaysinhnguoimua'].'</td>
                                            <td>'.$nm['sdtnguoimua'].'</td>
                                            <td>'.$nm['diachinguoimua'].', '.$nm['tenxa'].', '.$nm['tenquanhuyen'].','. $nm['tenthanhpho'].'</td>
                                            <td style="background-color: #f1f2f7;"><button class="danhmuc_remove-icon" name="xoakhachhang" value="'.$nm['manguoimua'].'"><i class="far fa-trash-alt"></i></button></td>
                                        </tr>
                                        ';
                                    }
                                }
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
    <script>

    $(function() {
        $(document).on('click', 'button[name = xoakhachhang]', function() {
            var manguoimuaxoa = $(this).val();
            option = confirm("Bạn muốn xóa khách hàng này?");
            if(!option) {
                return;
            }
            $.post('search_data.php', {
                'manguoimuaxoa': manguoimuaxoa
            }, function(data) {
                alert(data);
                location.reload();
            })
        })
    })

        // function deleteKhachHang(manguoimuaxoa) {
        //     option = confirm("Bạn muốn xóa khách hàng này?");
        //     if(!option) {
        //         return;
        //     }
        //     $.post('search_data.php', {
        //         'manguoimuaxoa': manguoimuaxoa
        //     }, function(data) {
        //         alert(data);
        //         location.reload();
        //     })
        // }
    </script>
    <script>
    $(document).ready(function() {
    $(document).on("keyup", "#timkiem", function() {
        var timkiem = $("#timkiem").val().toLowerCase();
        $.post("search_data.php", { send_timkiemkh: timkiem }, function (result) {
        $('#mytable').html(result);
        })
    });
    });
    </script>
</body>
</html>