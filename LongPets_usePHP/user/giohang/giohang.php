<?php
    session_start();
    require_once('../../database/database.php');
    require_once('../../utils/utils.php');

    $nguoimua = getUserToken();
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
</head>
<body>
    <div class="app"style="background-color:#f5f5f5;">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                            Vào cửa hàng trên ứng dụng Long Pets
                            
                            <!-- Header QR code -->
                            <div class="header__qr">
                                <img src="../../assets/img/qr_code.png" alt="QR code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="../../assets/img/google_play.png" alt="Google Play" class="header__qr-download-img">
                                    </a>
                                    <a href="" class="header__qr-link">
                                        <img src="../../assets/img/app_store.png" alt="App Store" class="header__qr-download-img">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-poiter">Kết nối</span>
                            <a href="" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-facebook"></i>
                            </a>
                            <a href="" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-instagram"></i>
                            </a>
                        </li>
    
                    </ul>
    
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
                                        <a href="http://localhost/LongPets_usePHP/user/chitietthucung.php?mathucung=301" class="header__notify-link">
                                            <img src="https://lh6.googleusercontent.com/X7JYEBXkxFMLWlXgsipqGbOYN6j9Lh_83FdKL-WPAtVKZsNnwrEE-VJVR83IXO73jgq4NrVuwPER2JVgkuyIpFMDMLzN3kbY1uHnD2_5enIx52yB-0IWf_VIfgFcpQBb4Yp3-an0" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">[BÁN] Gâu đần siêu xinh cần tìm chủ mới cho bé</span>
                                                <span class="header__notify-descriotion">- Tặng kèm microchip định danh thú cưng- Tặng kèm microchip định danh thú cưng</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="http://localhost/LongPets_usePHP/user/chitietthucung.php?mathucung=302" class="header__notify-link">
                                            <img src="https://ipet.vn/wp-content/uploads/2019/06/husky.png" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">[BÁN] Chó husky chân lùn 52 ngày tuổi (đực - cái) đều có</span>
                                                <span class="header__notify-descriotion">Tìm chủ cho bầy pug thuần chủng đã được 50 ngày tuổi</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="http://localhost/LongPets_usePHP/user/chitietthucung.php?mathucung=303" class="header__notify-link">
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
                                <i class="header__navbar-icon far fa-question-circle"></i>
                                Trợ giúp
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
                                        <a href="http://localhost/LongPets_usePHP/user/capnhatthongtin/capnhatthongtin.php">Địa chỉ của tôi</a>
                                    </li>
                                    <li class="header__navbar-user-item">
                                        <a href="../xemdondathang/xemdondathang.php">Đơn mua</a>
                                    </li>
                                    <li class="header__navbar-user-item header__navbar-user-item--separate">
                                        <a href="../authen/logout.php">Đăng xuất</a>
                                    </li>
                                </ul>
                            </li>
                            ';
                        }else {
                            echo '
                            <li><a class="header__navbar-item header__navbar-item--strong header__navbar-item--separate" data-toggle="modal" data-target="#myModalDangKy">Đăng ký</a></li>
                            <li><a class="header__navbar-item header__navbar-item--strong" data-toggle="modal" data-target="#myModalDangNhap">Đăng nhập</a> </li>
                            ';
                        }
                        ?>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search" style="width: 1030px;">
                    <div class="header__logo">
                        <a href="http://localhost/LongPets_usePHP/user/" class="header__logo-link">
                            <img src="../../assets/img/logo.svg" alt="" class="header__logo-img">
                        </a>
                    </div>
                
                    <form action="../timkiem.php" method="GET" style="width: 850px;">
                        <div class="header__search">
                            <div class="header__search-input-wrap">
                                <input type="text" class="header__search-input" name="timkiemthucung" placeholder="Nhập để tìm kiếm thú cưng">
    
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
                    </form>


                </div>
            </div>
        </header>

        <div class="container" style="padding:0;">
            <div class="row" style="margin-top: 15px;">
                <div class="panel panel-info" style="border-color: #ebebeb;">
                    <div class="panel-heading" style="background-color:#fff3ed; border-color:#ebebeb;">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-md-6" style="color: var(--primary-color);">
                                    <h5 style="font-size: 2.6rem"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng</h5>
                                </div>
                                <div class="col-md-6">
                                    <a href="http://localhost/LongPets_usePHP/user/">
                                        <button type="button" class="thanhtoan_btn" style="position:relative; left:300px;" >
                                            <span class="glyphicon glyphicon-share-alt"></span> Tiếp tục mua thú cưng
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php
                        if(!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        }
                        $tongtien = 0;
                        foreach ($_SESSION['cart'] as $thucung) {
                            $mathucung = $thucung['mathucung'];
                            $sql = "select soluong from thucung where mathucung = '$mathucung'";
                            $sl = executeResult($sql, true);
                            $soluongmax = $sl['soluong'];
                            $tongtien = $tongtien + $thucung['giamgia']*$thucung['soluong'];
                            echo '
                            <div class="row" >
                                <div class="col-md-2"><img class="img-responsive" style="width:100px;height:70px;" src="'.$thucung['hinhanh'].'">
                                </div>
                                <div class="col-md-4">
                                    <h4 class="product-name"style="font-size:2rem;color:var(--text-color); white-space: nowrap; overflow: hidden;text-overflow: ellipsis; "><strong>'.$thucung['tieude'].'</strong></h4><h4 style="font-size: 1.8rem;"><small>'.$thucung['tenthucung'].'</small></h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6 text-right">
                                        <h6 style="font-size:1.6rem;color:var(--primary-color);"><strong>'. money_format($thucung['giamgia']) .' VNĐ <span class="text-muted">x</span></strong></h6>
                                    </div>
                                    <div class="col-md-4" style="display:flex;">
                                        <input type="text"style="display:none;"id="max_'.$thucung['mathucung'].'" value="'.$soluongmax.'">
                                        <button class="tanggiambtn" onclick="ThemSoLuong('.$thucung['mathucung'].', -1)">-</button>
                                        <input type="number" readonly="true" id="num_'.$thucung['mathucung'].'" value="'.$thucung['soluong'].'" class="form-control" style="text-align:center; padding-right:0;width: 90px; border-radius: 0px" onchange="CapNhatSoLuong('.$thucung['mathucung'].')"/>
                                        <button class="tanggiambtn" onclick="ThemSoLuong('.$thucung['mathucung'].', 1)">+</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-link btn-md"style="min-width: 80px;height:35px;padding:0;" onclick="CapNhatGioHang('.$thucung['mathucung'].',0);"> 
                                            <a href="" class="danhmuc_remove-icon"style="width:100%;height:100%"><i class="far fa-trash-alt"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            ';
                        }
                        ?>
                        <!-- <div class="row">
                            <div class="text-center">
                                <div class="col-md-9">
                                    <h6 class="text-right">Added items?</h6>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-default btn-sm btn-block">
                                        Update cart
                                    </button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-md-9">
                                <h4 class="text-right">Tổng cộng:  <strong style="color: var(--primary-color);"><?=money_format($tongtien)?> VNĐ</strong></h4>
                            </div>
                            <div class="col-md-3">
                                <a href="../dathang/dathang.php" class="">
                                    <button type="button" class="thanhtoan_btn">
                                        Đặt mua
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Long Pets Mall</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Hướng dẫn mua hàng</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Về Long Pets</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Giới thiệu</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Tuyển dụng</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Điều khoản</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Danh mục</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Chó</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Mèo</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Thú cưng khác</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Theo dõi chúng tôi trên</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-facebook"></i>
                                    Facebook
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-instagram"></i>
                                    Instagram
                                    </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <i class="footer-item__icon fab fa-linkedin"></i>
                                    Linkedin
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Tải ứng dụng Long Pets ngay</h3>
                        <div class="footer__download">
                            <img src="../../assets/img/qr_code.png" alt="Download QR" class="footer__download-qr">
                            <div class="footer__download-apps">
                                <a href="" class="footer__download-app-link">
                                    <img src="../../assets/img/app_store.png" alt="App Store" class="footer__download-app-img">
                                </a>
                                <a href="" class="footer__download-app-link">
                                    <img src="../../assets/img/google_play.png" alt="Google Play" class="footer__download-app-img">
                                </a> 
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="footer__bottom">
                <div class="grid">
                    <p class="footer__text">© 2021 - Bản quyền thuộc về Long Pets</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- MODAL ĐĂNG KÝ -->
    <div id="myModalDangKy" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="auth-form" id="register-modal">
                        <div class="auth-form__container">
                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">Đăng ký</h3>
                                <a href="#myModalDangNhap" data-toggle="modal" data-dismiss="modal"class="auth-form__switch-btn">Đăng nhập</a>
                            </div>

                            <form action="" method="POST" onsubmit="DangKyUser($('[name=tennguoimua]').val(), $('[name=emailnguoimua]').val(), $('[name=matkhaunguoimua]').val());">
                                <div class="auth-form__form">
                                    <div class="auth-form__group">
                                        <input type="text" class="auth-form__input" required="true" id="tennguoimua" name="tennguoimua" placeholder="Tên của bạn là">
                                    </div>
                                    <div class="auth-form__group">
                                        <input type="email" class="auth-form__input" required="true" id="emailnguoimua" name="emailnguoimua" placeholder="Email của bạn">
                                    </div>
                                    <div class="auth-form__group">
                                        <input type="password" class="auth-form__input" required="true" id="matkhaunguoimua" name="matkhaunguoimua" placeholder="Mật khẩu của bạn" minlength="8">
                                    </div>
                                    <div class="auth-form__group">
                                        <input type="password" class="auth-form__input" required="true" id="rematkhaunguoimua" placeholder="Nhập lại mật khẩu" minlength="8">
                                    </div>
                                </div>

                                <div class="auth-form__aside">
                                    <p class="auth-form__policy-text">
                                        Bằng việc đăng kí, bạn đã đồng ý với Long Pets về
                                        <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                                        <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                                    </p>
                                </div>

                                <div class="auth-form__controls">
                                    <button class="btn btn--normal auth-form__controls-back" data-dismiss="modal">TRỞ LẠI</button>
                                    <button class="btn btn--primary" id="btn_dangky" name="btn_dangky" type="submit">ĐĂNG KÝ</button>
                                </div>
                            </form>
                        </div>

                        <div class="auth-form__socials">
                            <a href="" class="auth-form__socials--facebook auth-form__socials-icon btn btn--size-s btn--with-icon">
                                <i class="fab fa-facebook-square"></i>
                                <span class="auth-form__socials-title">
                                    Kết nối với Facebook
                                </span>
                            </a>
                            <a href="" class="auth-form__socials--google auth-form__socials-icon btn btn--size-s btn--with-icon">
                                <i class="fab fa-google"></i>
                                <span class="auth-form__socials-title">
                                    Kết nối với Google
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ĐĂNG NHẬP -->
    <div id="myModalDangNhap" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method = "POST" onsubmit="DangNhapUser($('[name=emaildangnhap]').val(),$('[name=matkhaudangnhap]').val());">
                        <div class="auth-form" id="login-modal">
                            <div class="auth-form__container">
                                <div class="auth-form__header">
                                    <h3 class="auth-form__heading">Đăng nhập</h3>
                                    <a href="#myModalDangKy" data-toggle="modal" data-dismiss="modal" class="auth-form__switch-btn">Đăng ký</a>
                                </div>

                                <div class="auth-form__form">
                                    <div class="auth-form__group">
                                        <input type="text" class="auth-form__input" name="emaildangnhap" placeholder="Email của bạn">
                                    </div>
                                    <div class="auth-form__group">
                                        <input type="password" class="auth-form__input" name="matkhaudangnhap" placeholder="Mật khẩu của bạn">
                                    </div>
                                </div>

                                <div class="auth-form__aside">
                                    <div class="auth-form__help">
                                        <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                        <span class="auth-form__help-separate"></span>
                                        <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                                    </div>
                                </div>

                                <div class="auth-form__controls">
                                    <button class="btn btn--normal auth-form__controls-back " data-dismiss="modal">TRỞ LẠI</button>
                                    <button class="btn btn--primary" type="submit">ĐĂNG NHẬP</button>
                                </div>
                            </div>
                            
                            <div class="auth-form__socials">
                                <a href="" class="auth-form__socials--facebook auth-form__socials-icon btn btn--size-s btn--with-icon">
                                    <i class="fab fa-facebook-square"></i>
                                    <span class="auth-form__socials-title">
                                        Kết nối với Facebook
                                    </span>
                                </a>
                                    <a href="" class="auth-form__socials--google auth-form__socials-icon btn btn--size-s btn--with-icon">
                                    <i class="fab fa-google"></i>
                                    <span class="auth-form__socials-title">
                                        Kết nối với Google
                                    </span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    // VaLiDate Dang Ky + Dang Nhap
    function DangNhapUser(email, matkhau){
        $.post('../authen/login.php', {
            'emaildangnhap': email,
            'matkhaudangnhap':matkhau
        }, function(data){
            alert(data);
            location.reload();
        })
        }

        function DangKyUser(hoten, email, matkhau){
        $.post('../authen/register.php', {
            'tennguoimua': hoten,
            'emailnguoimua': email,
            'matkhaunguoimua':matkhau
        }, function(data){
            alert(data);
            location.reload();
        })
        }

        $(function() {
            $('#btn_dangky').on('click', function(e) {
                var tennguoimua = $('#tennguoimua').val();
                var emailnguoimua = $('#emailnguoimua').val();
                var matkhaunguoimua = $('#matkhaunguoimua').val();
                var rematkhaunguoimua = $('#rematkhaunguoimua').val();
                // alert(rematkhaunguoimua);

                if(tennguoimua == "" || emailnguoimua == "" || matkhaunguoimua == "" || rematkhaunguoimua == "") {
                    e.preventDefault();
                    alert('Bạn chưa nhập thông tin');
                    window.location.reload();
                }
                if (matkhaunguoimua != rematkhaunguoimua) {
                    e.preventDefault();
                    alert('Mật khẩu không trùng khớp, vui lòng nhập lại');
                    window.location.reload();
                }
            })
        })
    </script>
    <script>
        function ThemSoLuong(mathucung, giatri) {
            soluongmax = parseInt($('#max_' + mathucung).val())
            soluong = parseInt($('#num_' + mathucung).val())
            // alert(soluongmax);
            // alert(soluong);
            if(soluong < soluongmax){
                soluong += giatri
                $('#num_' + mathucung).val(soluong)
                CapNhatGioHang(mathucung, soluong)
            }
            if(soluong == soluongmax){
                if(giatri == -1){
                    soluong += giatri
                    $('#num_' + mathucung).val(soluong)
                    CapNhatGioHang(mathucung, soluong)
                }
            }        
            if(soluong == soluongmax){
                if(giatri == 1){
                    alert("Số thú cưng còn lại là: " + soluongmax);
                }
            } 
	    }

        function CapNhatSoLuong(mathucung) {
            $('#num_' + mathucung).val(Math.abs($('#num_' + mathucung).val()))
            CapNhatGioHang(mathucung, $('#num_' + mathucung).val())
	    }

        function CapNhatGioHang(mathucung, soluong) {
            $.post('../../api/ajax_request.php', {
                'action' : 'update_cart',
                'mathucung' : mathucung,
                'soluong' : soluong
            }, function(data) {
                location.reload();
            })
        }
    </script>

</body>
</html>