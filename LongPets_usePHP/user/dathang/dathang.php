<?php
    session_start();
    require_once('../../database/database.php');
    require_once('../../utils/utils.php');

    $nguoimua = getUserToken();
    if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null ){
        header("Location: ../giohang/giohang.php");
    }

    $manguoimua = "";
    $hotennguoimua = "";
    $emailnguoimua = "";
    $sdtnguoimua = "";
    $diachinguoimua = "";
    $maxa = "";
    if(isset($nguoimua)) {
        if(isset($nguoimua['manguoimua'])){
            $manguoimua = $nguoimua['manguoimua'];
            $sql = "select * from nguoimua where manguoimua ='$manguoimua'";
          $result = executeResult($sql,true);
          if ($result != null) {
            $tenxa = $result['maxa'];
          }
          $sql = "select * from quanhuyen,xaphuongthitran where quanhuyen.maquanhuyen = xaphuongthitran.maquanhuyen and xaphuongthitran.maxa ='$tenxa'";
          $district = executeResult($sql,true);
          if ($district != null) {
            $tenhuyen = $district['maquanhuyen'];
          }
        
          $sql = "select * from quanhuyen,tinhthanhpho where quanhuyen.mathanhpho=tinhthanhpho.mathanhpho and quanhuyen.maquanhuyen = '$tenhuyen'";
          $province = executeResult($sql,true);
          if ($province != null) {
            $tenthanhpho = $province['mathanhpho'];
          }
        }
        if(isset($nguoimua['emailnguoimua'])){
            $emailnguoimua = $nguoimua['emailnguoimua'];
        }
        if(isset($nguoimua['hotennguoimua'])){
            $hotennguoimua = $nguoimua['hotennguoimua'];
        }
        if(isset($nguoimua['sdtnguoimua'])){
            $sdtnguoimua = $nguoimua['sdtnguoimua'];
        }
        if(isset($nguoimua['diachinguoimua'])){
            $diachinguoimua = $nguoimua['diachinguoimua'];
        }
        if(isset($nguoimua['maxa'])){
            $maxa = $nguoimua['maxa'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif
        }

        p {
            margin: 0%
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            overflow: hidden;
            background-color: #f8f9fa;
            box-shadow: 0 2px 3px #e0e0e0;
        }

        .box-1 {
            max-width: 600px;
            padding: 10px 40px;
            user-select: none;
        }

        .box-1 div .fs-12 {
            font-size: 1.6rem;
            color: white;
        }

        .box-1 div .fs-14 {
            font-size: 15px;
            color: white;
        }

        .box-1 img.pic {
            width: 20px;
            height: 20px;
            object-fit: cover;
        }

        .box-1 img.mobile-pic {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .box-1 .name {
            font-size: 1.6rem;
            font-weight: 600;
        }

        .dis {
            font-size: 1.6rem;
            font-weight: 500;
        }

        label.box {
            width: 100%;
            font-size: 1.5rem;
            background: #ddd;
            margin-top: 12px;
            padding: 10px 12px;
            border-radius: 5px;
            cursor: pointer;
            border: 1px solid transparent;
        }

        #one:checked~label.first,
        #two:checked~label.second,
        #three:checked~label.third {
            border-color: #7700ff;
        }

        #one:checked~label.first .circle,
        #two:checked~label.second .circle,
        #three:checked~label.third .circle {
            border-color: #7a34ca;
            background-color: #fff;
        }

        label.box .course {
            width: 100%
        }

        label.box .circle {
            height: 12px;
            width: 12px;
            background: #ccc;
            border-radius: 50%;
            margin-right: 15px;
            border: 4px solid transparent;
            display: inline-block
        }

        input[type="radio"] {
            display: none
        }

        .box-2 {
            width: 590px;
            padding: 10px 40px
        }

        .box-2 .box-inner-2 input.form-control {
            font-size: 1.4rem;
            font-weight: 400
        }

        .box-2 .box-inner-2 .inputWithIcon {
            position: relative
        }

        .box-2 .box-inner-2 .inputWithIcon span {
            position: absolute;
            left: 15px;
            top: 8px
        }

        .box-2 .box-inner-2 .inputWithcheck {
            position: relative
        }

        .box-2 .box-inner-2 .inputWithcheck span {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: green;
            font-size: 2rem;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            right: 15px;
            top: 6px
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: none;
            outline: none;
            border: 1px solid #7700ff
        }

        .border:focus-within {
            border: 1px solid #7700ff !important;
        }

        .box-2 .card-atm .form-control {
            border: none;
            box-shadow: none
        }

        .form-select {
            border-radius: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px
        }

        .address .form-control.zip {
            border-radius: 0;
            border-bottom-left-radius: 10px
        }

        .address .form-control.state {
            border-radius: 0;
            border-bottom-right-radius: 10px
        }

        .box-2 .box-inner-2 .btn.btn-outline-primary {
            width: 120px;
            padding: 10px;
            font-size: 11px;
            padding: 0% !important;
            display: flex;
            align-items: center;
            border: none;
            border-radius: 0;
            background-color: whitesmoke;
            color: black;
            font-weight: 600
        }

        .box-2 .box-inner-2 .btn.btn-primary {
            background-color: #7700ff;
            color: whitesmoke;
            font-size: 2rem;
            display: flex;
            align-items: center;
            font-weight: 600;
            justify-content: center;
            border: none;
            padding: 10px
        }

        .box-2 .box-inner-2 .btn.btn-primary:hover {
            background-color: #7a34ca
        }

        .box-2 .box-inner-2 .btn.btn-primary .fas {
            font-size: 2rem !important;
            color: whitesmoke
        }

        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 50%
        }

        .carousel-inner {
            width: 100%;
            height: 250px
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%
        }

        .carousel-control-prev {
            transform: translateX(-50%);
            opacity: 1
        }

        .carousel-control-prev:hover .fas.fa-arrow-left {
            transform: translateX(-5px)
        }

        .carousel-control-next {
            transform: translateX(50%);
            opacity: 1
        }

        .carousel-control-next:hover .fas.fa-arrow-right {
            transform: translateX(5px)
        }

        .fas.fa-arrow-left,
        .fas.fa-arrow-right {
            font-size: 2rem;
            transition: all .2s ease
        }

        .icon {
            width: 30px;
            height: 30px;
            background-color: #f8f9fa;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transform-origin: center;
            opacity: 1
        }

        .fas,
        .fab {
            color: #6d6c6d
        }

        ::placeholder {
            font-size: 1.6rem;
        }

        @media (max-width:768px) {
            .container {
                max-width: 700px;
                margin: 10px auto
            }

            .box-1,
            .box-2 {
                max-width: 600px;
                padding: 20px 90px;
                margin: 20px auto
            }
        }

        @media (max-width:426px) {

            .box-1,
            .box-2 {
                max-width: 400px;
                padding: 20px 10px
            }

            ::placeholder {
                font-size: 1.6rem;
            }
        }
    </style>
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

    <div class="container d-lg-flex" style="width: 1200px;">
    <div class="box-1 bg-light user">
        <div class="box-inner-1 pb-3 mb-3 ">
            <div class="d-flex justify-content-between mb-3 userdetails">
                <p class="fw-bold" style="font-size: 2rem;">Những thú cưng mà bạn muốn mua</p>
            </div>
            <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-indicators"> 
                    <?php
                    if(!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $soluongcart = count($_SESSION['cart']);
                    $cartdautien = $_SESSION['cart'][0];
                    if($cartdautien != null) {
                        echo '
                        <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> 
                        ';
                    }
                    for($i = 1; $i < $soluongcart; $i++) {
                        ?>
                        <button type="button" data-bs-target="#my" data-bs-slide-to="<?=$i?>" aria-label="Slide <?=$i+1?>"></button> 
                        <?php
                    }
                    ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    if(!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $soluongcart = count($_SESSION['cart']);
                    $cartdautien = $_SESSION['cart'][0];
                    if($cartdautien != null) {
                        ?>
                        <div class="carousel-item active"> <img src="<?=$cartdautien['hinhanh']?>" class="d-block w-100"> </div>
                        <?php
                    }
                    for($i = 1; $i < $soluongcart; $i++) {
                        $carttieptheo = $_SESSION['cart'][$i];
                        ?>
                        <div class="carousel-item"> <img src="<?=$carttieptheo['hinhanh']?>" class="d-block w-100 h-100"> </div>
                        <?php
                    }
                    ?>
                </div> 
                <button class="carousel-control-prev" type="button" data-bs-target="#my" data-bs-slide="prev">
                    <div class="icon"> 
                        <span class="fas fa-arrow-left"></span> 
                    </div> 
                    <span class="visually-hidden">Previous</span>
                </button> 
                <button class="carousel-control-next" type="button" data-bs-target="#my" data-bs-slide="next">
                    <div class="icon"> 
                        <span class="fas fa-arrow-right"></span> 
                    </div> 
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p class="dis info my-3" style="font-weight: 500;">Chi tiết giỏ hàng</p>
            <div class="radiobtn"> 
                <?php
                $count = 0;
                $tongtien = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $tong = $item['giamgia']*$item['soluong'];
                    $tongtien = $tongtien + $tong;
                    echo '
                    <input type="radio" name="box" id="'.$item['mathucung'].'"> 
                    <label for="'.$item['mathucung'].'" class="box py-2 ">
                        <div class="d-flex "> 
                            <span class="circle"></span>
                            <div class="course">
                                <div class="d-flex align-items-center justify-content-between mb-2"> 
                                    <span class="fw-bold"style="width:320px"> '.$item['tieude'].'1 </span> 
                                    <span style="font-weight: 400; color:var(--primary-color); width:145px;text-align:right;">'.money_format($tong).' VNĐ</span> 
                                </div> 
                                <span style="font-weight: 400;"><span style="color:var(--primary-color);">'.$item['soluong'].'</span> x '.$item['tenthucung'].'</span>
                            </div>
                        </div>
                    </label> 
                    ';
                }
                ?>
                <!-- <input type="radio" name="box" id="one"> 
                <label for="one" class="box py-2 ">
                    <div class="d-flex "> 
                        <span class="circle"></span>
                        <div class="course">
                            <div class="d-flex align-items-center justify-content-between mb-2"> 
                                <span class="fw-bold"> Collection 01 </span> 
                                <span class="fas fa-dollar-sign">29</span> 
                            </div> 
                            <span>10 x Presets. Released in 2018</span>
                        </div>
                    </div>
                </label> 
                
                <input type="radio" name="box" id="two"> 
                <label for="two" class="box py-2">
                    <div class="d-flex"> 
                        <span class="circle"></span>
                        <div class="course">
                            <div class="d-flex align-items-center justify-content-between mb-2"> 
                                <span class="fw-bold"> Collection 01 </span> 
                                <span class="fas fa-dollar-sign">29</span> 
                            </div> 
                            <span>10 x Presets. Released in 2018</span>
                        </div>
                    </div>
                </label> 

                <input type="radio" name="box" id="three"> 
                <label for="three" class="box py-2">
                    <div class="d-flex"> 
                        <span class="circle"></span>
                        <div class="course">
                            <div class="d-flex align-items-center justify-content-between mb-2"> <span class="fw-bold"> Collection 01 </span> <span class="fas fa-dollar-sign">29</span> </div> <span>10 x Presets. Released in 2018</span>
                        </div>
                    </div>
                </label>  -->
            </div>
        </div>
    </div>
    <?php
    if(isset($nguoimua) && $nguoimua != null){
        ?>
        <div class="box-2">
        <div class="box-inner-2">
            <div style="font-size: 2rem;">
                <p class="fw-bold">Chi tiết thanh toán</p>
                <p class="dis mb-3">Hoàn tất thanh toán bằng việc cung cấp những thông tin sau</p>
            </div>
            <!-- FORM THANH TOAN -->
            <form action="" method="POST" onsubmit="return DatHang();">
                <div class="mb-3">
                    <p class="dis fw-bold mb-2">Địa chỉ email</p> 
                    <input class="form-control" type="email" readonly="true" value="<?=$emailnguoimua?>" placeholder="Email của bạn là" name="email" required>
                </div>
                <div class="my-3">
                    <p class="dis fw-bold mb-2">Họ tên</p> 
                    <input class="form-control" type="text" value="<?=$hotennguoimua?>" placeholder="Họ tên của bạn là" name="hoten" required>
                </div>
                <div class="my-3">
                    <p class="dis fw-bold mb-2">Số điện thoại</p> 
                    <input class="form-control" type="tel" value="<?=$sdtnguoimua?>" placeholder="Số điện thoại của bạn là"name="sodienthoai" required>
                </div>
                <div class="my-3">
                    <p class="dis fw-bold mb-2">Địa chỉ</p> 
                    <input class="form-control" type="text" value="<?=$diachinguoimua?>" placeholder="Địa chỉ của bạn là"name="diachi" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="">Tỉnh, thành phố:</label>
                        <select class="form-control" name="tinhthanhpho" id="tinhthanhpho" required>
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
                    <div class="form-group">
                        <label for="">Quận, huyện:</label>
                        <select class="form-control" name="quanhuyen" id="quanhuyen" required>
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
                    <div class="form-group">
                        <label for="">Phường, xã:</label>
                        <select class="form-control" name="phuongxa" id="phuongxa" required>
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
                <div class="my-3">
                    <p class="dis fw-bold mb-2">Ghi chú</p> 
                    <textarea class="form-control" rows="3" style="font-size: 1.5rem;" name="ghichu"></textarea>
                </div>
                    <div class="d-flex flex-column dis">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Tổng tiền thú cưng</p>
                            <p><?=money_format($tongtien)?> VNĐ</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Phí vận chuyển</p>
                            <p>0.00 VNĐ</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="fw-bold"style="color:var(--primary-color);">Tổng cộng</p>
                            <p class="fw-bold"style="color:var(--primary-color);"><?=money_format($tongtien)?> VNĐ</p>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" style="background-color: #fc5932;">Đặt hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <?php
    } else {
        ?>
        <div class="box-2">
            <div class="box-inner-2">
                <div style="font-size: 2rem;">
                    <p class="fw-bold">Chi tiết thanh toán</p>
                    <p class="dis mb-3">Hoàn tất thanh toán bằng việc cung cấp những thông tin sau</p>
                </div>
                <!-- FORM THANH TOAN -->
                <form action="" method="POST" onsubmit="return DatHang();">
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Địa chỉ email</p> 
                        <input class="form-control" required="true" type="email" value="" placeholder="Email của bạn là" name="email">
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Họ tên</p> 
                        <input class="form-control" required="true" type="text" value="" placeholder="Họ tên của bạn là" name="hoten">
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Số điện thoại</p> 
                        <input class="form-control" required="true" type="tel" value="" placeholder="Số điện thoại của bạn là"name="sodienthoai">
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Địa chỉ</p> 
                        <input class="form-control" required="true" type="text" value="" placeholder="Địa chỉ của bạn là"name="diachi">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="">Tỉnh, thành phố:</label>
                            <select class="form-control" required="true" name="tinhthanhpho" id="tinhthanhpho">
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
                        <div class="form-group">
                            <label for="">Quận, huyện:</label>
                            <select class="form-control" required="true" name="quanhuyen" id="quanhuyen">
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
                        <div class="form-group">
                            <label for="">Phường, xã:</label>
                            <select class="form-control" required="true" name="phuongxa" id="phuongxa">
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
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Ghi chú</p> 
                        <textarea class="form-control" rows="3" style="font-size: 1.5rem;" name="ghichu"></textarea>
                    </div>
                    <div class="d-flex flex-column dis">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Tổng tiền thú cưng</p>
                            <p><?=money_format($tongtien)?> VNĐ</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Phí vận chuyển</p>
                            <p>0.00 VNĐ</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="fw-bold"style="color:var(--primary-color);">Tổng cộng</p>
                            <p class="fw-bold"style="color:var(--primary-color);"><?=money_format($tongtien)?> VNĐ</p>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" style="background-color: #fc5932;">Đặt hàng</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
    ?>

    
</div>

    <!-- MODAL ĐĂNG KÝ -->
    <div id="myModalDangKy" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="auth-form" id="register-modal" style="width: 100%;">
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
                        <div class="auth-form" id="login-modal"style="width: 100%;">
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
    <!-- SCRIPT DAT HANG -->
    <script>
        function DatHang() {
        $.post('../../api/ajax_request.php', {
            'action': 'dathang',
            'emaildathang': $('[name=email]').val(),
            'hotendathang': $('[name=hoten]').val(),
            'sodienthoaidathang': $('[name=sodienthoai]').val(),
            'diachidathang': $('[name=diachi]').val(),
            'maxa': $('[name=phuongxa]').val(),
            'maquanhuyen': $('[name=quanhuyen]').val(),
            'mathanhpho': $('[name=tinhthanhpho]').val(),
            'ghichudathang': $('[name=ghichu]').val(),
        }, function() {
            window.open('hoantatdathang.php', '_self');
        })
        }
    </script>
    <!-- SCRIPT Tinh thanh pho -->
    <script>
        $(document).ready(function() {
            $("#tinhthanhpho").change(function(e) {
                mathanhpho = $("#tinhthanhpho").val();
                $.post('../capnhatthongtin/quanhuyen.php', {
                    "mathanhpho": mathanhpho
                }, function(data) {
                    $("#quanhuyen").html(data);
                })
            });
            $("#quanhuyen").change(function(e) {
                maquanhuyen = $("#quanhuyen").val();
                $.post('../capnhatthongtin/phuongxa.php', {
                    "maquanhuyen": maquanhuyen
                }, function(data) {
                    $("#phuongxa").html(data);
                })
            });
        });
    </script>
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
</body>
</html>