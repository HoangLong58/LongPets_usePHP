<?php
session_start();
require_once('../database/database.php');
require_once('../utils/utils.php');
require_once('../mail/sendmail.php');

$action = getPost('action');
switch ($action) {
    case 'cart':
        ThemGioHang();
        break;
    case 'update_cart':
        CapNhatGioHang();
        break;
    case 'dathang':
        DatHang();
        break;
}

function DatHang() {
    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        return;
    }
    $emaildathang = getPost("emaildathang");
    if($emaildathang == ""){
        return;
    }
    $hotendathang = getPost("hotendathang");
    if($hotendathang == ""){
        return;
    }
    $sodienthoaidathang = getPost("sodienthoaidathang");
    if($sodienthoaidathang == ""){
        return;
    }
    $diachidathang = getPost("diachidathang");
    if($diachidathang == ""){
        return;
    }
    $maxa = getPost("maxa");
    if($maxa == ""){
        return;
    }
    $maquanhuyen = getPost("maquanhuyen");
    if($maquanhuyen == ""){
        return;
    }
    $mathanhpho = getPost("mathanhpho");
    if($mathanhpho == ""){
        return;
    }
    $ghichudathang = getPost("ghichudathang");

    $nguoimua = getUserToken();
    $manguoimua = 0;
    if($nguoimua != null) {
        $manguoimua = $nguoimua['manguoimua'];
    }

    $ngaydathang = date('Y-m-d H:i:s');

    $tongtiendathang = 0;
    foreach($_SESSION['cart'] as $item) {
        $tongtiendathang += $item['giamgia'] * $item['soluong']; 
    }
    // Them vao dathang
    $sql = "insert into dathang (manguoimua, maxa, manhanvien, hotendathang, emaildathang, sodienthoaidathang, diachidathang, ghichudathang, ngaydathang, trangthaidathang, tongtiendathang) values ($manguoimua, '$maxa', 0,'$hotendathang', '$emaildathang', '$sodienthoaidathang', '$diachidathang', '$ghichudathang', '$ngaydathang', 1, $tongtiendathang)";
    execute($sql);

    // Them vao chitietdathang
    $sql = "select * from dathang where ngaydathang = '$ngaydathang'";
    $dathangitem = executeResult($sql, true);
    $madathang = $dathangitem['madathang'];
    foreach($_SESSION['cart'] as $item) {
        $mathucung = $item['mathucung'];
        $giachitietdathang = $item['giamgia'];
        $soluongchitietdathang = $item['soluong'];
        $tongtienchitietdathang = $item['giamgia'] * $item['soluong'];
        $sql = "insert into chitietdathang (mathucung, madathang, giachitietdathang, soluongchitietdathang, tongtienchitietdathang) values ($mathucung, $madathang, $giachitietdathang, $soluongchitietdathang, $tongtienchitietdathang)";
        execute($sql);
        $sql1 = "update thucung set soluong = soluong - $soluongchitietdathang where mathucung = $mathucung";
        execute($sql1);
    }

    // N???i dung mail
    $tieudemail = "?????t h??ng t???i Long Pets th??nh c??ng!";
    // N???i dung
    $noidung = '';
    $noidung .= '<div><p>C???m ??n b???n ???? tin t?????ng v?? ?????t mua th?? c??ng t???i <font color="#fd5d32"><b>Long Pets</b></font> v???i m?? ????n: '.$madathang.'</p></div>';
    // Th??ng tin Kh??ch h??ng

    $sql = "select x.tenxa, q.tenquanhuyen, t.tenthanhpho from dathang d join xaphuongthitran x on d.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho where d.maxa = '$maxa';";
    $tenxa = executeResult($sql, true);

    $noidung .= '<p>
    <b>Kh??ch h??ng:</b> '.$hotendathang.'<br />
    <b>Email:</b> '.$emaildathang.'<br />
    <b>??i???n tho???i:</b> '.$sodienthoaidathang.'<br />
    <b>?????a ch???:</b> '.$diachidathang.', '.$tenxa['tenxa'].', '.$tenxa['tenquanhuyen'].', '.$tenxa['tenthanhpho'].'
    </p>';
    // Danh s??ch S???n ph???m ???? mua
    $noidung .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
    width="100%">
    <tr>
    <td align="center" bgcolor="#fd5d32" colspan="4"><font
    color="white"><b>????N ?????T MUA C???A B???N</b></font></td>
    </tr>
    <tr id="invoice-bar">
    <td width="45%"><b>Ti??u ?????</b></td>
    <td width="20%"><b>Gi??</b></td>
    <td width="15%"><b>S??? l?????ng</b></td>
    <td width="20%"><b>Th??nh ti???n</b></td>
    </tr>';
    foreach($_SESSION['cart'] as $item) {
        $tieude = $item['tieude'];
        $giachitietdathang = $item['giamgia'];
        $soluongchitietdathang = $item['soluong'];
        $tongtienchitietdathang = $item['giamgia'] * $item['soluong'];
        $noidung .= '<tr>
        <td class="prd-name">'.$tieude.'</td>
        <td class="prd-price"><font color="#C40000">'.$giachitietdathang.'
        VN??</font></td>
        <td class="prd-number">'.$soluongchitietdathang.'</td>
        <td class="prd-total"><font color="#C40000">'.money_format($tongtienchitietdathang).'
        VN??</font></td>
        </tr>';
    }
    $noidung .= '<tr>
    <td class="prd-name">T???ng gi?? tr??? ????n h??ng l??:</td>
    <td colspan="2"></td>
    <td class="prd-total"><b><font color="#C40000">'.money_format($tongtiendathang).'
    VN??</font></b></td>
    </tr>
    </table>';
    $noidung .= '<p align="justify">
    <b>Qu?? kh??ch ???? ?????t th?? c??ng th??nh c??ng!</b><br />
    ??? Th?? c??ng c???a Qu?? kh??ch s??? ???????c chuy???n ?????n ?????a ch??? c?? trong ph???n
    Th??ng tin Kh??ch h??ng c???a ch??ng T??i sau th???i gian 2 ?????n 3 ng??y, t??nh t??? th???i ??i???m n??y.<br
    />
    ??? Nh??n vi??n giao h??ng s??? li??n h??? v???i Qu?? kh??ch qua S??? ??i???n tho???i tr?????c
    khi giao h??ng 24 ti???ng.<br />
    <b><br />C??m ??n Qu?? kh??ch ???? l???a ch???n th?? c??ng ??? c???a h??ng ch??ng
    t??i!</b>
    </p>';
    $maildathang = $emaildathang;
    $mail = new Mailer();
    $mail->dathangmail($tieudemail, $noidung, $maildathang);

    // Huy SESSION CART
    unset($_SESSION['cart']);
}

function CapNhatGioHang() {
    $mathucung = getPost('mathucung');
    $soluong = getPost('soluong');
    var_dump($mathucung);
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    for($i = 0; $i < count($_SESSION['cart']); $i ++) {
        if($_SESSION['cart'][$i]['mathucung'] == $mathucung) {
            $_SESSION['cart'][$i]['soluong'] = $soluong;
            if($soluong <= 0) {
                array_splice($_SESSION['cart'], $i, 1);
            }
            break;
        }
    }
}

function ThemGioHang() {
    $mathucung = getPost('mathucung');
    $soluong = getPost('soluong');

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    // So luong thu cung con lai cua cua hang
    $sql = "select soluong from thucung where mathucung = '$mathucung'";
    $soluongcsdl = executeResult($sql, true);

    $isFind = false;
    for($i = 0; $i < count($_SESSION['cart']); $i ++) {
        if($_SESSION['cart'][$i]['mathucung'] == $mathucung ) {
            $soluonggiohang = $_SESSION['cart'][$i]['soluong'];
                           
            $soluongcothemua = $soluongcsdl['soluong'] - $soluonggiohang;
            if($soluongcothemua == 0) {
                echo("S??? l?????ng mua ???? ?????t gi???i h???n!");
                return;
            }
            if($soluong <= $soluongcothemua){
                $_SESSION['cart'][$i]['soluong'] += $soluong;
                echo("Th??m v??o gi??? h??ng th??nh c??ng!");
                $isFind = true;
                break;
            }

        }
    }
    
    if(!$isFind) {
        $sql = 'select thucung.mathucung,thucung.madanhmuc,thucung.tenthucung,thucung.gioitinhthucung,thucung.tuoithucung,thucung.datiemchung,thucung.baohanhsuckhoe,thucung.tieude,thucung.mota,thucung.ghichu,thucung.hinhanh,thucung.soluong,thucung.giaban,thucung.giamgia,danhmuc.tendanhmuc from thucung,danhmuc where thucung.madanhmuc=danhmuc.madanhmuc and thucung.mathucung='.$mathucung.'';
        $thucung = executeResult($sql, true);
        $thucung['soluong'] = $soluong;
        $_SESSION['cart'][] = $thucung;
        echo("Th??m v??o gi??? h??ng th??nh c??ng!");
    }
}



?>