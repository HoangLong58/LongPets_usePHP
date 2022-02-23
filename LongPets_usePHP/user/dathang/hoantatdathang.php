<?php
session_start();
require_once('../../database/database.php');
require_once('../../utils/utils.php');

$nguoimua = getUserToken();
header( "refresh:5; url=http://localhost/LongPets_usePHP/user/" );
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


                </div>
            </div>
        </header>
        <div class="container" style="background-color: var(--white-color); text-align:center;">
            <?php
                echo("<h1 style='color:red;'>Bạn đã đặt mua thú cưng tại Long Pets thành công !!!!!</h1></br>");
                echo("<h1 style='color:red;'>Thông tin đặt hàng đã được gửi đến email của bạn.</h1></br>");
            ?>
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
</body>
</html>