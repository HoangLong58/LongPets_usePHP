<?php
    session_start();
    require_once('../database/database.php');
    require_once('../utils/utils.php');
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
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                            Vào cửa hàng trên ứng dụng Long Pets
                            
                            <!-- Header QR code -->
                            <div class="header__qr">
                                <img src="../assets/img/qr_code.png" alt="QR code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="../assets/img/google_play.png" alt="Google Play" class="header__qr-download-img">
                                    </a>
                                    <a href="" class="header__qr-link">
                                        <img src="../assets/img/app_store.png" alt="App Store" class="header__qr-download-img">
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
                                <img src="../assets/img/user.jpg" alt="" class="header__navbar-user-img">
                                <span class="header__navbar-user-name">'.$nguoimua['hotennguoimua'].'</span>
                                <ul class="header__navbar-user-menu">
                                    <li class="header__navbar-user-item">
                                        <a href="">Tài khoản của tôi</a>
                                    </li>
                                    <li class="header__navbar-user-item">
                                        <a href="http://localhost/LongPets_usePHP/user/capnhatthongtin/capnhatthongtin.php">Địa chỉ của tôi</a>
                                    </li>
                                    <li class="header__navbar-user-item">
                                        <a href="./xemdondathang/xemdondathang.php">Đơn mua</a>
                                    </li>
                                    <li class="header__navbar-user-item header__navbar-user-item--separate">
                                        <a href="./authen/logout.php">Đăng xuất</a>
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
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="http://localhost/LongPets_usePHP/user/" class="header__logo-link">
                            <img src="../assets/img/logo.svg" alt="" class="header__logo-img">
                        </a>
                    </div>
                
                    
                    <form action="timkiem.php" method="GET" style="width: 850px;">
                        <div class="header__search">
                            <div class="header__search-input-wrap">
                                <input type="text" name="timkiemthucung" class="header__search-input" placeholder="Nhập để tìm kiếm thú cưng VD: Alaska">

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
                            <button class="header__search-btn" type="submit">
                                <i class="header__search-btn-icon fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <?php
                    if(!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    } 
                    $count = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $count += $item['soluong'];
                    }
                    ?>

                    <!-- Cart layout -->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <span class="header__cart-notice"><?=$count?></span>

                            <!-- No cart:( thì thêm vô class này) header__cart-list--no-cart -->
                            <div class="header__cart-list ">
                                <img src="../assets/img/no_cart.PNG" alt="Chưa có sản phẩm nào" class="header__cart-no-cart-img">
                                <span class="header__cart-list-no-cart-msg">
                                    Chưa có sản phẩm
                                </span>

                                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-list-item">
                                    <!-- GIO HANG- MINI -->
                                    <?php
                                    if(!isset($_SESSION['cart'])) {
                                        $_SESSION['cart'] = [];
                                    }
                                    foreach ($_SESSION['cart'] as $thucung) {
                                        $hinhanh = substr($thucung['hinhanh'],3);
                                        echo '
                                        <li class="header__cart-item">
                                            <img src="'.$hinhanh.'" alt="" class="header__cart-img">
                                            <div class="header__cart-item-info">
                                                <div class="header__cart-item-head">
                                                    <h5 class="header__cart-item-name">'.$thucung['tieude'].'</h5>
                                                    <div class="header__cart-item-price-wrap">
                                                        <span class="header__cart-item-price">'.money_format($thucung['giamgia']).' đ</span>
                                                        <span class="header__cart-item-multiply">x</span>
                                                        <span class="header__cart-item-qnt">'.$thucung['soluong'].'</span>
                                                    </div>
                                                </div>
                                                <div class="header__cart-item-body">
                                                    <span class="header__cart-item-description">
                                                        Phân loại: '.$thucung['tendanhmuc'].'
                                                    </span>
                                                    <div class="header__cart-item-remove" onclick="CapNhatGioHang('.$thucung['mathucung'].',0);">Xóa</div>
                                                </div>
                                            </div>
                                        </li>
                                        ';
                                    }
                                    ?>
                                </ul>
                                <a href="./giohang/giohang.php" class="header__cart-view-cart btn btn--primary" style="margin-bottom:10px;">Xem giỏ hàng</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__heading">Danh mục</h3>
            
                            <ul class="category-list">
                                <?php
                                $sql = "select * from danhmuc";
                                $danhmucList = executeResult($sql);
                                foreach($danhmucList as $dm) {
                                    echo'
                                    <li class="category-item /*category-item--active*/">
                                    <a href="danhmuc.php?id='.$dm['madanhmuc'].'" class="category-item__link">'.$dm['tendanhmuc'].'</a>
                                    </li>
                                    ';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
    
                    <div class="grid__column-10">
                        <div class="home-filter">
                            <span class="home-filter__label">Sắp xếp theo</span>
                            <button class="home-filter__btn btn">Phổ biến</button>
                            <button class="home-filter__btn btn btn--primary">Mới nhất</button>
                            <button class="home-filter__btn btn">Bán chạy</button>

                            <div class="select-input">
                                <span class="select-input__label">Giá</span>
                                <i class="select-input__icon fas fa-angle-down"></i>

                                <!-- List options -->
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="" class="select-input__link">Giá: Thấp đến cao</a>
                                    </li>
                                    <li class="select-input__item">
                                        <a href="" class="select-input__link">Giá: Cao đến thấp</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="home-filter__page">
                                <span class="home-filter__page-num">
                                    <?php
                                    $current_page=1;
                                    $sql = 'select mathucung, count(mathucung) as number from thucung';
                                    $result = executeResult($sql);
                                    $number = 0;
                                    if($result != null && count($result) >0) {
                                        $number = $result[0]['number'];
                                    }
                                    $pages = ceil($number / 10);
                                    if(isset($_GET['page'])) {
                                        $current_page = $_GET['page'];
                                    }

                                    echo '
                                    <span class="home-filter__page-current">'.$current_page.'</span>/'.$pages.'
                                    ';
                                    ?>
                                </span>
                                <div class="home-filter__page-control">
                                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                                        <i class="home-filter__page-icon fas fa-angle-left"></i>
                                    </a>
                                    <a href="" class="home-filter__page-btn">
                                        <i class="home-filter__page-icon fas fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="home-product">
                            <div class="grid__row">
                                <!-- Product item -->
                                
                        <?php
                        $sql = 'select mathucung, count(mathucung) as number from thucung';
                        $result = executeResult($sql);
                        $number = 0;
                        if($result != null && count($result) >0) {
                            $number = $result[0]['number'];
                        }
                        $pages = ceil($number / 10);
                        $current_page = 1;
                        if(isset($_GET['page'])) {
                            $current_page = $_GET['page'];
                        }
                        $index = ($current_page-1)*10;

                        $sql = 'select * from thucung where soluong > 0 limit '.$index.', 10';
                        $result = executeResult($sql);
                        foreach ($result as $thucung) {
                            $thucung['hinhanh'] = substr($thucung['hinhanh'], 3);
                            echo '
                            <div class="grid__column-2-4">
                            <a class="home-product-item" href="chitietthucung.php?mathucung=' . $thucung['mathucung'] . '">
                                <div class="home-product-item__img" style="background-image: url('.$thucung['hinhanh'].');"></div>
                                <h4 class="home-product-item__name">'.$thucung['tieude'].'</h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old">'.money_format($thucung['giaban']).'đ</span>
                                    <span class="home-product-item__price-current">'.money_format($thucung['giamgia']).'đ</span>
                                </div>
                                <div class="home-product-item__action">
                                    <span class="home-product-item__like home-product-item__like--liked">
                                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item__rating">
                                        <i class="home-product-item__star--gold fas fa-star"></i>
                                        <i class="home-product-item__star--gold fas fa-star"></i>
                                        <i class="home-product-item__star--gold fas fa-star"></i>
                                        <i class="home-product-item__star--gold fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="home-product-item__sold">5 đã bán</span>
                                </div>
                                <div class="home-product-item__origin">
                                    <span class="home-product-item__brand">'.$thucung['tenthucung'].'</span>
                                    <span class="home-product-item__origin-name">TP.Hồ Chí Minh</span>
                                </div>
                                <div class="home-product-item__favourite">
                                    <i class="fas fa-check"></i>
                                    <span>Yêu thích</span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent">10%</span>
                                    <span class="home-product-item__sale-off-label">GIẢM</span>
                                </div>
                            </a>
                        </div>
                            ';
                        }
                        ?>
                            </div>
                        </div>

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
                            <img src="../assets/img/qr_code.png" alt="Download QR" class="footer__download-qr">
                            <div class="footer__download-apps">
                                <a href="" class="footer__download-app-link">
                                    <img src="../assets/img/app_store.png" alt="App Store" class="footer__download-app-img">
                                </a>
                                <a href="" class="footer__download-app-link">
                                    <img src="../assets/img/google_play.png" alt="Google Play" class="footer__download-app-img">
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
        $.post('./authen/login.php', {
            'emaildangnhap': email,
            'matkhaudangnhap':matkhau
        }, function(data){
            alert(data);
            location.reload();
        })
        }

        function DangKyUser(hoten, email, matkhau){
        $.post('./authen/register.php', {
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

        function CapNhatGioHang(mathucung, soluong) {
        $.post('../api/ajax_request.php', {
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