<?php
require_once('../../database/database.php');
require_once('../../utils/utils.php');

$nguoimua = getAdminToken();
$nhanvien = getNhanVienToken();
if($nguoimua == null && $nhanvien == null) {
    header('Location: ../admin_authen/login_admin.php');
    die();
}

if(!empty($_POST)) {
    $mathucung = "";
    $danhmuc = "";
    $tenthucung = "";
    $tuoithucung = "";
    $gioitinhthucung = "";
    $datiemchung = "";
    $baohanhsuckhoe = "";
    $tieude = "";
    $mota = "";
    $ghichu = "";
    $hinhanh = "";
    $soluong = "";
    $giaban = "";
    $giamgia = "";
    if(isset($_POST['mathucung']) and $_POST['mathucung'] != "") {
        $mathucung = $_POST['mathucung'];
    }
    if(isset($_POST['danhmuc']) and $_POST['danhmuc'] != "") {
        $danhmuc = $_POST['danhmuc'];
    }
    if(isset($_POST['tenthucung'])) {
        $tenthucung = $_POST['tenthucung'];
    }
    if(isset($_POST['tuoithucung'])) {
        $tuoithucung = $_POST['tuoithucung'];
    }
    if(isset($_POST['gioitinhthucung'])) {
        $gioitinhthucung = $_POST['gioitinhthucung'];
    }
    if(isset($_POST['datiemchung'])) {
        $datiemchung = $_POST['datiemchung'];
    }
    if(isset($_POST['baohanhsuckhoe'])) {
        $baohanhsuckhoe = $_POST['baohanhsuckhoe'];
    }
    if(isset($_POST['tieude'])) {
        $tieude = $_POST['tieude'];
    }
    if(isset($_POST['mota'])) {
        $mota = $_POST['mota'];
    }
    if(isset($_POST['ghichu'])) {
        $ghichu = $_POST['ghichu'];
    }
    if(isset($_POST['hinhanh'])) {
        $hinhanh = $_POST['hinhanh'];
    }
    if(isset($_POST['soluong'])) {
        $soluong = $_POST['soluong'];
    }
    if(isset($_POST['giaban'])) {
        $giaban = $_POST['giaban'];
    }
    if(isset($_POST['giamgia'])) {
        $giamgia = $_POST['giamgia'];
    }

    $danhmuc = str_replace('\'', '\\\'', $danhmuc);
    $tenthucung = str_replace('\'', '\\\'', $tenthucung);
    $gioitinhthucung = str_replace('\'', '\\\'', $gioitinhthucung);
    $tuoithucung = str_replace('\'', '\\\'', $tuoithucung);
    $datiemchung = str_replace('\'', '\\\'', $datiemchung);
    $baohanhsuckhoe = str_replace('\'', '\\\'', $baohanhsuckhoe);
    $tieude = str_replace('\'', '\\\'', $tieude);
    $mota = str_replace('\'', '\\\'', $mota);
    $ghichu = str_replace('\'', '\\\'', $ghichu);
    $hinhanh = str_replace('\'', '\\\'', $hinhanh);
    $soluong = str_replace('\'', '\\\'', $soluong);
    $giaban = str_replace('\'', '\\\'', $giaban);
    $giamgia = str_replace('\'', '\\\'', $giamgia);
    $link = "../../assets/img/";
    if($mathucung != "") {
        if($hinhanh == "") {
            $sql = "update thucung set madanhmuc='$danhmuc', tenthucung='$tenthucung', gioitinhthucung='$gioitinhthucung', tuoithucung='$tuoithucung', datiemchung='$datiemchung', baohanhsuckhoe='$baohanhsuckhoe', tieude='$tieude', mota='$mota', ghichu='$ghichu', soluong='$soluong', giaban='$giaban', giamgia='$giamgia' where mathucung =".$mathucung;    
        }else{
            $sql = "update thucung set madanhmuc='$danhmuc', tenthucung='$tenthucung', gioitinhthucung='$gioitinhthucung', tuoithucung='$tuoithucung', datiemchung='$datiemchung', baohanhsuckhoe='$baohanhsuckhoe', tieude='$tieude', mota='$mota', ghichu='$ghichu', hinhanh='$link$hinhanh', soluong='$soluong', giaban='$giaban', giamgia='$giamgia' where mathucung =".$mathucung;
        }
    }
    execute($sql);
    header("Location: quanlythucung.php");
    die();
}
$mathucungget ="";
if(isset($_GET['mathucung'])) {
    $mathucungget = $_GET['mathucung'];
    $sql = 'select * from thucung where mathucung = '.$mathucungget.'';
    $tcList = executeResult($sql);
    if($tcList != null && count($tcList) > 0) {
        $tc = $tcList[0];
        $madanhmucget = $tc['madanhmuc'];
        $tenthucungget = $tc['tenthucung'];
        $gioitinhthucungget = $tc['gioitinhthucung'];
        $tuoithucungget = $tc['tuoithucung'];
        $datiemchungget = $tc['datiemchung'];
        $baohanhsuckhoeget = $tc['baohanhsuckhoe'];
        $tieudeget = $tc['tieude'];
        $motaget = $tc['mota'];
        $ghichuget = $tc['ghichu'];
        $hinhanhget = $tc['hinhanh'];
        $soluongget = $tc['soluong'];
        $giabanget = $tc['giaban'];
        $giamgiaget = $tc['giamgia'];
    }
    else {
        $mathucungget ="";
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
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
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
        title: "Th??nh c??ng!",
        message: "B???n ???? th??m m???t danh m???c m???i.",
        type: "success",
        duration: 5000
        });
    }

    function showErrorToast() {
        toast({
        title: "Th???t b???i!",
        message: "C?? l???i x???y ra, danh m???c ???? t???n t???i.",
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
    <div  class="container-fluid" style="background-color: #f1f2f7;">
        <div class="col-sm-3 thongke">
            <span class="admin_menu_header">Trang ch??? admin</span>
            <ul class="admin_menu_list">
                <?php
                if(!empty($nhanvien)) {
                    if(isset($nhanvien['machucvu'])) {
                        $chucvu = $nhanvien['machucvu'];
                        switch($chucvu) {
                            case '1': //Nh??n vi??n b??n h??ng - Qu???n l?? ????n h??ng
                                // echo' <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                break;
                            case '2': //Nh??n vi??n maketting - Qu???n l?? kh??ch h??ng
                                // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                // echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                break;
                            
                            case '3': //Nh??n vi??n k??? to??n - Qu???n l?? ????n h??ng, qu???n l?? th?? c??ng
                                //echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                break;
                            case '4': //Nh??n vi??n chuy???n kho, v???n chuy???n - Qu???n l?? ????n h??ng
                                // echo '<li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>';
                                // echo '<li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>';
                                // echo '<li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>';
                                echo '<li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>';
                                break;
                        }
                    }
                }
                //ADMIN - TO??N QUY???N
                if(!empty($nguoimua)) {
                    echo '
                    <li class="admin_menu_items"><a href="../quanlydanhmuc/quanlydanhmuc.php" class="" style="text-decoration: none;">Qu???n l?? danh m???c</a></li>
                    <li class="admin_menu_items"><a href="quanlythucung.php" class="" style="text-decoration: none;">Qu???n l?? th?? c??ng</a></li>
                    <li class="admin_menu_items"><a href="../quanlykhachhang/quanlykhachhang.php" class="" style="text-decoration: none;">Qu???n l?? kh??ch h??ng</a></li>
                    <li class="admin_menu_items"><a href="../quanlynhanvien/quanlynhanvien.php" class="" style="text-decoration: none;">Qu???n l?? nh??n vi??n</a></li>
                    <li class="admin_menu_items"><a href="../quanlydonhang/quanlydonhang.php" class="" style="text-decoration: none;">Qu???n l?? ????n h??ng</a></li>
                    ';
                }
                
                ?>
            </ul>
        </div>
        <div class="col-sm-9" style="padding-right:0;">
            <div class="themthucung_form thongke">
                <div class="form-row">
                    <h1 class="themthucung_heading">S???a th??ng tin th?? c??ng</h1>
                    <div id="toast"></div>  
                </div>
                <div class="form-row ">
                    <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="form-group" style="padding:0 15px;">
                            <label for="">Danh m???c</label>
                            <select class="form-control" name="danhmuc">
                                <?php
                                $sql = 'select * from danhmuc where madanhmuc = '.$madanhmucget.'';
                                $dmList = executeResult($sql);
                                $dm = $dmList[0];
                                echo '
                                    <option selected value="'.$dm['madanhmuc'].'">'.$dm['tendanhmuc'].'</option>
                                ';
                                ?>
                                <?php
                                $sql = 'select * from danhmuc where madanhmuc != '.$madanhmucget.';';
                                $dmList = executeResult($sql);
                                foreach($dmList as $dm) {
                                    echo '
                                        <option value="'.$dm['madanhmuc'].'">'.$dm['tendanhmuc'].'</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" style="padding:0 15px;">
                            <label for="">T??n th?? c??ng</label>
                            <input type="number" name="mathucung" value="<?=$mathucungget?>" style="display: none;">
                            <input type="text" class="form-control" placeholder="T??n th?? c??ng" name="tenthucung" value="<?php if(isset($tenthucungget)){echo $tenthucungget; };?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-9" style="padding:0 15px;">
                                <label for="">Tu???i</label>
                                <input type="text" class="form-control" placeholder="Tu???i th?? c??ng" name="tuoithucung"value="<?=$tuoithucungget?>">
                            </div>
                            <div class="form-group col-sm-3" style="padding:0 15px;">
                                <label for="">Gi???i t??nh</label>
                                <select class="form-control" name="gioitinhthucung">
                                    <option selected value="<?=$gioitinhthucungget?>"><?=$gioitinhthucungget?></option>
                                    <?php
                                    if($gioitinhthucungget == "?????c"){
                                        echo '
                                        <option value="C??i">C??i</option>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <option value="?????c">?????c</option>
                                        ';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="">???? ti??m ch???ng</label>
                                <?php 
                                if(isset($datiemchungget) && $datiemchungget == "???? ti??m ch???ng") {
                                    echo '
                                    <input type="checkbox" name="datiemchung" value="???? ti??m ch???ng" checked="checked">
                                    ';
                                }
                                else {
                                    echo '
                                    <input type="checkbox" name="datiemchung" value="???? ti??m ch???ng">
                                    ';
                                }
                                ?>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">B???o h??nh s???c kh???e</label>
                                <?php 
                                if(isset($baohanhsuckhoeget) && $baohanhsuckhoeget == "???????c b???o h??nh s???c kh???e") {
                                    echo '
                                    <input type="checkbox" name="baohanhsuckhoe" value="???????c b???o h??nh s???c kh???e" checked="checked">
                                    ';
                                }
                                else {
                                    echo '
                                    <input type="checkbox" name="baohanhsuckhoe" value="???????c b???o h??nh s???c kh???e">
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group" style="padding:0 15px;">
                            <label for="">Ti??u ?????</label>
                            <input type="textarea" class="form-control" placeholder="Ti??u ?????" name="tieude" value="<?php if(isset($tieudeget)){echo $tieudeget; };?>">
                        </div>
                        <div class="form-group" style="padding:0 15px;">
                            <label for="">M?? t???</label>
                            <textarea class="form-control" name="mota" id="mota"><?=$motaget?></textarea>
                        </div>
                        <div class="form-group" style="padding:0 15px;">
                            <label for="">Ghi ch??</label>
                            <textarea class="form-control" name="ghichu"><?=$ghichuget?></textarea>
                        </div>

                        <div class="form-group" style="padding:0 15px;">
                            <label for="hinhanh">H??nh ???nh</label>
                            <div style="clear: both;"></div>
                            <input type="file" name="hinhanh" id="hinhanh" class="form control" style="width: 80px; border: none; padding: 1px; float: left;">
                            <input type="text" name="spanhinhanh" id="spanhinhanh" style="float: left; width: 500px; border-radius: 4px; border: 1px black solid;" value="<?=$hinhanhget?>">
                            <div style="clear: both;"></div>
                            <img id="hienthianh" src="<?=$hinhanhget?>" class="img-thumbnail" alt="Cinque Terre" width="350px" height="200px"style="background-repeat: no-repeat;background-size: contain;background-position: center;border-top-left-radius: 2px;border-top-right-radius: 2px;">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-4" style="padding:0 15px;">
                                <label for="">S??? l?????ng</label>
                                <input type="number" class="form-control" placeholder="S??? l?????ng" name="soluong"value="<?=$soluongget?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="">Gi?? b??n</label>
                                <input type="text" class="form-control" placeholder="Gi?? b??n" name="giaban"value="<?=$giabanget?>">
                            </div>
                            <div class="form-group col-sm-4" style="padding:0 15px;">
                                <label for="">Gi???m gi??</label>
                                <input type="text" class="form-control" placeholder="Gi???m gi??" name="giamgia"value="<?=$giamgiaget?>">
                            </div>
                        </div>
                        <div class="themthucung_btn">
                            <button type="submit" class="btn btn--primary">S???a</button>
                            <button type="reset" class="btn btn--primary">L??m l???i</button>
                            <button class="btn btn--primary">Tr??? v???</button>
                        </div>
                    </form>
                </div>
                

            </div>
        </div>

    </div>
    <footer class="container-fluid">
        <p></p>
    </footer>
    <script type="text/javascript">
    $('#hinhanh').on('change', function() {
        var tenfile = $('#hinhanh').val();
        tenfile = tenfile.substr(12);
        
        $('#spanhinhanh').val(tenfile);

        var filehientai = $('#spanhinhanh').val();
        $('#hienthianh').attr('src','../../assets/img/' + filehientai);
    })

    $(function() {
        $('#mota').summernote({
            height: 200,
            codemirror: {
                theme: 'monokai'
            }
        });
    })

    </script>
</body>
</html>