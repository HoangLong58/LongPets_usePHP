<?php
require_once('../../database/database.php');
require_once('../../utils/utils.php');

$nguoimua = getAdminToken();
$nhanvien = getNhanVienToken();
if($nguoimua == null && $nhanvien == null) {
    header('Location: ../admin_authen/login_admin.php');
    die();
}
if(isset($nhanvien)){
    if($nhanvien['machucvu'] == 1 or $nhanvien['machucvu'] == 2 or $nhanvien['machucvu'] == 3 or $nhanvien['machucvu'] == 4){
        header('Location: ../admin_authen/login_admin.php');
        die();
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
                    <nav class="header__navbar" style="position:relative; left: 670px;">
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
                    <h1 style="margin: 20px;">Qu???n l?? danh m???c</h1>
                    <div id="toast"></div>   
                    <div class="danhmuc_content thongke" id="noidung">
                        <div class="admin_menu_items" style="width: 200px; position: relative; right: 13px; top:2px;">
                            <a href="" class="" style="text-decoration: none; color: var(--white-color);" data-toggle="modal" data-target="#myModal">Th??m danh m???c m???i</a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                <!-- Th??m danh m???c -->
                                <?php
                                $themdanhmuc = "";
                                if(!empty($_POST)) {
                                    //$new_danhmuc = "";
                                    if(isset($_POST['new_danhmuc']) and $_POST['new_danhmuc'] != "" ) {
                                        $new_danhmuc = $_POST['new_danhmuc'];
                                        $laydanhmuc = "SELECT * FROM danhmuc WHERE tendanhmuc = '$new_danhmuc'";
                                        $danhmucList = executeResult($laydanhmuc);
                                        if(empty($danhmucList)){
                                            $sql = "insert into danhmuc(tendanhmuc) value ('$new_danhmuc')";
                                            execute($sql);
                                            $themdanhmuc = 1;
                                        }
                                        else {
                                            $themdanhmuc = 0;
                                        }
                                    }
                                }
                                if($themdanhmuc == 1) {
                                    echo '
                                    <script type="text/javascript">showSuccessToast();</script>
                                    ';
                                }
                                if($themdanhmuc == 0) {
                                    echo '
                                    <script type="text/javascript">showErrorToast();</script>
                                    ';
                                }
                                ?>

                                <!-- S???a danh m???c -->
                                <?php
                                if(isset($_GET['madanhmuc'])) {
                                    
                                }



                                ?>
                                
                                <!-- Modal content-->
                                <form action="" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Th??m danh m???c m???i</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>T??n danh m???c:</p>
                                            <input type="text" name="new_danhmuc" charset="utf-8" placeholder="Danh m???c m???i" style="width: 400px; margin-bottom: 12px;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Th??m</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
                                        </div>
                                    </div>
                                </form>  
                                </div>
                            </div>
                            <!-- Modal S???a danh m???c-->
                            <div class="modal fade" id="myModal_fix" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                <form action="" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">S???a danh m???c</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>T??n danh m???c:</p>
                                            <input type="text" placeholder="Danh m???c m???i" style="width: 400px; margin-bottom: 12px;">
                                            <?php
                                            echo $dm['madanhmuc'];
                                            ?>
                                            <!-- message Th??nh c??ng/ th???t b???i -->
                                            <div class="alert alert-success"style="margin-bottom: 0;">
                                                <strong>S???a th??nh c??ng!</strong> T??n danh m???c ???? ???????c thay ?????i.
                                            </div>
                                            <!-- <div class="alert alert-danger"style="margin-bottom: 0;">
                                                <strong>Th??m th???t b???i!</strong> Danh m???c n??y ???? t???n t???i.
                                            </div> -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">S???a</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">????ng</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered thongke" style="margin-top: 15px; font-size: 1.6rem;">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Danh m???c</th>
                                <th style="background-color: #f1f2f7;">S???a</th>
                                <th style="background-color: #f1f2f7;">X??a</th>
                              </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $sql = "select count(madanhmuc) as number from danhmuc";
                            $result = executeResult($sql, true);
                            $number = 0;
                            if($result != null && count($result) >0) {
                                $number = $result['number'];
                            }
                            $pages = ceil($number / 5);
                            $current_page = 1;
                            if(isset($_GET['page'])) {
                                $current_page = $_GET['page'];
                            }
                            $index = ($current_page-1)*5;
                            $sql = "select * from danhmuc limit $index , 5";
                            $danhmucList = executeResult($sql, false);
                            foreach($danhmucList as $dm) {
                                echo '
                                <tr>
                                    <td>'.$dm['madanhmuc'].'</td>
                                    <td>'.$dm['tendanhmuc'].'</td>
                                    <td style="background-color: #f1f2f7;"><a href="" class="danhmuc_fix-icon" data-toggle="modal" data-target="#myModal_fix" onclick=\'window.open("suadanhmuc.php?madanhmuc='.$dm['madanhmuc'].'","_self")\'><i class="far fa-edit"></i></a></td>
                                    <td style="background-color: #f1f2f7;"><a href="" class="danhmuc_remove-icon" onclick="deleteDanhMuc('.$dm['madanhmuc'].');"><i class="far fa-trash-alt"></i></a></td>
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
    <script>
        function deleteDanhMuc(madanhmuc) {
            option = confirm("B???n mu???n x??a danh m???c n??y?")
            if(!option) {
                return;
            }
            $.post('xoadanhmuc.php', {
                'madanhmuc': madanhmuc
            }, function(data) {
                location.reload()
            })
        }
    </script>
</body>
</html>