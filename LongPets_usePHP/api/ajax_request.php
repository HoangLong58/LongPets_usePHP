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

    // Nội dung mail
    $tieudemail = "Đặt hàng tại Long Pets thành công!";
    // Nội dung
    $noidung = '';
    $noidung .= '<div><p>Cảm ơn bạn đã tin tưởng và đặt mua thú cưng tại <font color="#fd5d32"><b>Long Pets</b></font> với mã đơn: '.$madathang.'</p></div>';
    // Thông tin Khách hàng

    $sql = "select x.tenxa, q.tenquanhuyen, t.tenthanhpho from dathang d join xaphuongthitran x on d.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho where d.maxa = '$maxa';";
    $tenxa = executeResult($sql, true);

    $noidung .= '<p>
    <b>Khách hàng:</b> '.$hotendathang.'<br />
    <b>Email:</b> '.$emaildathang.'<br />
    <b>Điện thoại:</b> '.$sodienthoaidathang.'<br />
    <b>Địa chỉ:</b> '.$diachidathang.', '.$tenxa['tenxa'].', '.$tenxa['tenquanhuyen'].', '.$tenxa['tenthanhpho'].'
    </p>';
    // Danh sách Sản phẩm đã mua
    $noidung .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
    width="100%">
    <tr>
    <td align="center" bgcolor="#fd5d32" colspan="4"><font
    color="white"><b>ĐƠN ĐẶT MUA CỦA BẠN</b></font></td>
    </tr>
    <tr id="invoice-bar">
    <td width="45%"><b>Tiêu đề</b></td>
    <td width="20%"><b>Giá</b></td>
    <td width="15%"><b>Số lượng</b></td>
    <td width="20%"><b>Thành tiền</b></td>
    </tr>';
    foreach($_SESSION['cart'] as $item) {
        $tieude = $item['tieude'];
        $giachitietdathang = $item['giamgia'];
        $soluongchitietdathang = $item['soluong'];
        $tongtienchitietdathang = $item['giamgia'] * $item['soluong'];
        $noidung .= '<tr>
        <td class="prd-name">'.$tieude.'</td>
        <td class="prd-price"><font color="#C40000">'.$giachitietdathang.'
        VNĐ</font></td>
        <td class="prd-number">'.$soluongchitietdathang.'</td>
        <td class="prd-total"><font color="#C40000">'.money_format($tongtienchitietdathang).'
        VNĐ</font></td>
        </tr>';
    }
    $noidung .= '<tr>
    <td class="prd-name">Tổng giá trị đơn hàng là:</td>
    <td colspan="2"></td>
    <td class="prd-total"><b><font color="#C40000">'.money_format($tongtiendathang).'
    VNĐ</font></b></td>
    </tr>
    </table>';
    $noidung .= '<p align="justify">
    <b>Quý khách đã đặt thú cưng thành công!</b><br />
    • Thú cưng của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
    Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
    />
    • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
    khi giao hàng 24 tiếng.<br />
    <b><br />Cám ơn Quý khách đã lựa chọn thú cưng ở cửa hàng chúng
    tôi!</b>
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
                echo("Số lượng mua đã đạt giới hạn!");
                return;
            }
            if($soluong <= $soluongcothemua){
                $_SESSION['cart'][$i]['soluong'] += $soluong;
                echo("Thêm vào giỏ hàng thành công!");
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
        echo("Thêm vào giỏ hàng thành công!");
    }
}



?>