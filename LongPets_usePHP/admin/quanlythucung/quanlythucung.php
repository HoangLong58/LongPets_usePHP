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
    if($nhanvien['machucvu'] == 2 or $nhanvien['machucvu'] == 4){
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
                            <input type="text" id="timkiem"  name="timkiemthucung" class="header__search-input" placeholder="Nhập để tìm kiếm thú cưng VD: Husky">

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

        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <ul class="admin_menu_list">
                <?php
                if(!empty($nhanvien)) {
                    if(isset($nhanvien['machucvu'])) {
                        $chucvu = $nhanvien['machucvu'];
                        switch($chucvu) {
                            case '1': //Nhân viên bán hàng - Quản lý đơn hàng
                                // echo' <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                break;
                            case '2': //Nhân viên maketting - Quản lý khách hàng
                                // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                // echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                break;
                            
                            case '3': //Nhân viên kế toán - Quản lý đơn hàng, quản lý thú cưng
                                //echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                break;
                            case '4': //Nhân viên chuyển kho, vận chuyển - Quản lý đơn hàng
                                // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>';
                                // echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>';
                                break;
                        }
                    }
                }
                //ADMIN - TOÀN QUYỀN
                if(!empty($nguoimua)) {
                    echo '
                    <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>
                    <li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>
                    <li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>
                    <li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Quản lý nhân viên</a></li>
                    <li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>
                    ';
                }
                
                ?>
            </ul>
        </div>


        <script>
            function openNav() {
                document.getElementById("mySidepanel").style.width = "303px";
            }

            function closeNav() {
                document.getElementById("mySidepanel").style.width = "0";
            }
        </script>

        <div class="container-fluid" style="background-color: #f1f2f7;">
            <!-- <div class="col-sm-3 sidenav">
                    <span class="admin_menu_header">Trang chủ admin</span>
                    <ul class="admin_menu_list">
                        <li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Quản lý danh mục</a></li>
                        <li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Quản lý thú cưng</a></li>
                        <li class="admin_menu_items"><a href="" class="" style="text-decoration: none;">Quản lý khách hàng</a></li>
                        <li class="admin_menu_items"><a href="" class="" style="text-decoration: none;">Quản lý đơn hàng</a></li>
                    </ul>
                </div> -->

            <div class="col-md-12 ">
                <div class="row row-quanlythucung_heading">
                    <button class="openbtn" onclick="openNav()">☰ </button>
                    <h1 style="margin: 20px;">Quản lý thú cưng</h1>
                </div>

                <div id="toast"></div>
                <div class="danhmuc_content thongke" id="noidung">
                    <div style="display:flex; justify-content:space-between;">
                        <div class="admin_menu_items" style="width: 200px; position: relative; right: 13px; top:2px;">
                            <?php
                                if(isset($chucvu) and $chucvu == 3){
                                    echo "";
                                }   
                                else{
                                    ?>
                                    <a href="themthucung.php" class="" style="text-decoration: none; color: var(--white-color);">Thêm thú cưng mới</a>
                                    <?php
                                }
                            ?>
                        </div>
                        <?php
                        $sqlsoluong = "select count(mathucung) as soluong from thucung;";
                        $soluong = executeResult($sqlsoluong);
                        foreach($soluong as $sl) {
                        echo '
                        <h4 style="position: relative; text-align: center;margin:0;top:10px;">Hiện có <b style="color: var(--primary-color);">'.$sl['soluong'].'</b> thú cưng</h4>
                        ';
                        }
                        ?>
                    </div>
                    <table class="table table-bordered thongke" style="margin-top: 15px; font-size: 1.6rem;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Danh mục</th>
                                <th>Tên thú cưng</th>
                                <th>Giới tính thú cưng</th>
                                <th>Tuổi thú cưng</th>
                                <th>Đã tiêm chủng</th>
                                <th>Bảo hành sức khỏe</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá bán</th>
                                <th>Giảm giá</th>
                                <?php
                                if(isset($chucvu)){
                                    if($chucvu == 3){
                                        echo "";
                                    }else{
                                        ?>
                                        <th style="background-color: #f1f2f7;">Sửa</th>
                                        <th style="background-color: #f1f2f7;">Xóa</th>
                                        <?php
                                    }
                                }
                                ?>   
                            </tr>
                        </thead>
                        <tbody id="mytable">
                            <?php
                            $sql = 'select mathucung, count(mathucung) as number from thucung';
                            $result = executeResult($sql);
                            $number = 0;
                            if ($result != null && count($result) > 0) {
                                $number = $result[0]['number'];
                            }
                            $pages = ceil($number / 10);
                            $current_page = 1;
                            if (isset($_GET['page'])) {
                                $current_page = $_GET['page'];
                            }
                            $index = ($current_page - 1) * 10;

                            $sql = 'select thucung.mathucung,thucung.madanhmuc,thucung.tenthucung,thucung.gioitinhthucung,thucung.tuoithucung,thucung.datiemchung,thucung.baohanhsuckhoe,thucung.tieude,thucung.mota,thucung.ghichu,thucung.hinhanh,thucung.soluong,thucung.giaban,thucung.giamgia,danhmuc.tendanhmuc from thucung,danhmuc where thucung.madanhmuc=danhmuc.madanhmuc limit ' . $index++ . ', 10';
                            $thucungList = executeResult($sql);
                            foreach ($thucungList as $tc) {
                                if(isset($chucvu) and $chucvu == 3){
                                    echo '
                                    <tr>
                                        <td>' . $index++ . '</td>
                                        <td>' . $tc['tendanhmuc'] . '</td>
                                        <td>' . $tc['tenthucung'] . '</td>
                                        <td>' . $tc['gioitinhthucung'] . '</td>
                                        <td>' . $tc['tuoithucung'] . '</td>
                                        <td>' . $tc['datiemchung'] . '</td>
                                        <td>' . $tc['baohanhsuckhoe'] . '</td>
                                        <td><img id="hienthianh" src="' . $tc['hinhanh'] . '" class="background-image" alt="Chưa có hình ảnh" width="150px" height="100px"style="background-repeat: no-repeat;background-size: contain;background-position: center;border-top-left-radius: 2px;border-top-right-radius: 2px;"></td>
                                        <td>' . $tc['soluong'] . '</td>
                                        <td>' . money_format($tc['giaban']) . ' VNĐ</td>
                                        <td>' . money_format($tc['giamgia']) . ' VNĐ</td>
                                    </tr>';
                                }else{
                                    echo '
                                    <tr>
                                        <td>' . $index++ . '</td>
                                        <td>' . $tc['tendanhmuc'] . '</td>
                                        <td>' . $tc['tenthucung'] . '</td>
                                        <td>' . $tc['gioitinhthucung'] . '</td>
                                        <td>' . $tc['tuoithucung'] . '</td>
                                        <td>' . $tc['datiemchung'] . '</td>
                                        <td>' . $tc['baohanhsuckhoe'] . '</td>
                                        <td><img id="hienthianh" src="' . $tc['hinhanh'] . '" class="background-image" alt="Chưa có hình ảnh" width="150px" height="100px"style="background-repeat: no-repeat;background-size: contain;background-position: center;border-top-left-radius: 2px;border-top-right-radius: 2px;"></td>
                                        <td>' . $tc['soluong'] . '</td>
                                        <td>' . money_format($tc['giaban']) . ' VNĐ</td>
                                        <td>' . money_format($tc['giamgia']) . ' VNĐ</td>
                                        <td style="background-color: #f1f2f7;"><a href="suathucung.php?mathucung=' . $tc['mathucung'] . '" class="danhmuc_fix-icon"><i class="far fa-edit"></i></a></td>
                                        <td style="background-color: #f1f2f7;"><button name="xoathucung" class="danhmuc_remove-icon" value="' . $tc['mathucung'] . '"><i class="far fa-trash-alt"></i></button></td>
                                    </tr>
                                    ';
                                } 
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- <div class="danhmuc_pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a class="danhmuc_active" href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                          </div> -->
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
        $(document).on('click', 'button[name = xoathucung]', function() {
            var mathucung = $(this).val();
            option = confirm("Bạn muốn xóa thú cưng này?")
            if (!option) {
                return;
            }
            $.post('xoathucung.php', {
                'mathucung': mathucung
            }, function(data) {
                location.reload()
            })
        })
    })

        // function deleteThuCung(mathucung) {
        //     option = confirm("Bạn muốn xóa thú cưng này?")
        //     if (!option) {
        //         return;
        //     }
        //     $.post('xoathucung.php', {
        //         'mathucung': mathucung
        //     }, function(data) {
        //         location.reload()
        //     })
        // }
    </script>
    <!-- <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> -->
    <script>
        $(document).ready(function() {
        $("#timkiem").on("keyup", function() {
            var timkiem = $("#timkiem").val().toLowerCase();
            $.post("search_data.php", { send_timkiem: timkiem }, function (result) {
            $('#mytable').html(result);
            })
        });
        });
    </script>
</body>

</html>