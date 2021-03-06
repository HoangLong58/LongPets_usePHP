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
                            <input type="text" class="header__search-input" placeholder="Nh???p ????? t??m ki???m s???n ph???m">

                            <!-- Search history -->
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">L???ch s??? t??m ki???m</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="">Husky</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Ch?? ki???ng</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">M??o anh</a>
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
                                    <span>Ngo??i shop</span>
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
                                    Th??ng b??o
                                </a>
                                <!--Th??ng b??o-->
                                <div class="header__notify">
                                    <header class="header__notify-header">
                                        <h3>Th??ng b??o m???i nh???n</h3>
                                    </header>
                                    <ul class="header__notify-list">
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="" class="header__notify-link">
                                                <img src="https://lh6.googleusercontent.com/X7JYEBXkxFMLWlXgsipqGbOYN6j9Lh_83FdKL-WPAtVKZsNnwrEE-VJVR83IXO73jgq4NrVuwPER2JVgkuyIpFMDMLzN3kbY1uHnD2_5enIx52yB-0IWf_VIfgFcpQBb4Yp3-an0" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">[B??N] G??u ?????n si??u xinh c???n t??m ch??? m???i cho b??</span>
                                                    <span class="header__notify-descriotion">- T???ng k??m microchip ?????nh danh th?? c??ng- T???ng k??m microchip ?????nh danh th?? c??ng</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item">
                                            <a href="" class="header__notify-link">
                                                <img src="https://ipet.vn/wp-content/uploads/2019/06/husky.png" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">[B??N] Ch?? husky ch??n l??n 52 ng??y tu???i (?????c - c??i) ?????u c??</span>
                                                    <span class="header__notify-descriotion">T??m ch??? cho b???y pug thu???n ch???ng ???? ???????c 50 ng??y tu???i</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item">
                                            <a href="" class="header__notify-link">
                                                <img src="http://welcomelafrance.com/wp-content/uploads/2019/10/meo-anh-long-ngan.jpg" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">[B??N] M??o con lai Anh ???????c 2th??ng tu???i</span>
                                                    <span class="header__notify-descriotion">- M??o lai anh, nay b?? ???????c 2 th??ng tu???i , bi???t ??n , bi???t v??? sinh v?? thao c??t ??? . B?? r???t lanh . Ai mua alo cho m??nh nha . Em c?? m??o ??en ( c??i) , m??o tr???ng ( ?????c, c??i) </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer class="header__notify-footer">
                                        <a href="" class="header__notify-footer-btn">Xem t???t c???</a>
                                    </footer>
    
                                </div>
                            </li>
                            <li class="header__navbar-item">
                                <a href="" class="header__navbar-item-link">
                                    <i class="header__navbar-icon far fa-comments"></i>
                                    Tin nh???n
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
                                            <a href="">T??i kho???n c???a t??i</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="">?????a ch??? c???a t??i</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="../admin_authen/logout_admin.php">????ng xu???t</a>
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
                                            <a href="">T??i kho???n c???a t??i</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="">?????a ch??? c???a t??i</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="../admin_authen/logout_admin.php">????ng xu???t</a>
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
                <span class="admin_menu_header">Trang ch??? admin</span>
                <ul class="admin_menu_list">
                        <?php
                        if(!empty($nhanvien)){
                            if(isset($nhanvien['machucvu'])) {
                                $chucvu = $nhanvien['machucvu'];
                                switch($chucvu) {
                                    case '1': //Nh??n vi??n b??n h??ng - Qu???n l?? ????n h??ng
                                        // echo' <li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                        break;
                                    case '2': //Nh??n vi??n maketting - Qu???n l?? kh??ch h??ng
                                        // echo '<li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                        break;
                                    
                                    case '3': //Nh??n vi??n k??? to??n - Qu???n l?? ????n h??ng, qu???n l?? th?? c??ng
                                        //echo '<li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                        break;
                                    case '4': //Nh??n vi??n chuy???n kho, v???n chuy???n - Qu???n l?? ????n h??ng
                                        // echo '<li class="admin_menu_items"><a href="quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                        // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                        echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                        break;
                                }
                            }
                        }
                        // ADMIN - TO??N QUY???N
                        if(!empty($nguoimua)) {
                            echo '
                            <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>
                            <li class="admin_menu_items"><a href="../quanlythucung/quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>
                            <li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>
                            <li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>
                            <li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>
                            ';
                        }
                        
                        ?>
                    </ul>
            </div>
            
            <div class="col-md-9">
                <div class="row">
                    <div class="suadanhmuc_duongdan"><a href="admin.php">Admin</a>/ <a href="quanlydanhmuc.php" class="">Qu???n l?? danh m???c</a>/ S???a danh m???c</div>
                </div>
                <div class="row">
                    <div class="suadanhmuc_container thongke">
                        <h1 class="suadanhmuc_header">S???a danh m???c</h1>
                        <form action="" class="suadanhmuc_form" method ="POST">
                            <div class="suadanhmuc_form_content">
                                <span class="suadanhmuc_form_header">T??n danh m???c:</span>
                                <input type="number" name="madanhmuc" value="<?=$madanhmucget?>" style="display: none;">
                                <input class="suadanhmuc_form_input" type="text"id="tendanhmuc" name="tendanhmuc" value="<?php if(isset($tendanhmucget)){echo $tendanhmucget; };?>">
                            </div>
                            <div class="suadanhmuc_form_button">
                                <button type="submit" class="btn suadanhmuc_btn-sua">S???a</button>
                                <button type="button" class="btn suadanhmuc_btn-lamlai"onclick="lamlai()">L??m l???i</button>
                                <button type="button" class="btn suadanhmuc_btn-trove" onclick="trove()">Tr??? v???</button>
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