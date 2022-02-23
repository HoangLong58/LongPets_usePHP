<?php
$emaildangnhap = $matkhaudangnhap = '';

// Admin
if(!empty($_POST)) {
    $emaildangnhap = getPost('emailadmin');
    $matkhaudangnhap = getPost('matkhauadmin');
    $matkhaudangnhap = getSecurityMD5($matkhaudangnhap);

    $sql = "select * from nguoimua where emailnguoimua = '$emaildangnhap' && matkhau = '$matkhaudangnhap' && maquyentruycap = '1'";
    $nguoimua = executeResult($sql, true);
    if($nguoimua == null) {
        $msg = "Đăng nhập không thành công, kiểm tra lại email và mật khẩu";
        var_dump($msg);
    } else {
        $msg = "Đăng nhập thành công";
        //login thanh cong
        var_dump($msg);
        $token = getSecurityMD5($nguoimua['emailnguoimua'].time());
        setcookie('tokenAdmin', $token, time() + 7 * 24 * 60 * 60, '/');

        $_SESSION['nguoimua'] = $nguoimua;

        $created_at = date('Y-m-d H:i:s');
        $manguoimua = $nguoimua['manguoimua'];
        $sql = "insert into tokens (manguoimua, token, created_at) values ('$manguoimua', '$token', '$created_at')";
        execute($sql);
        header("Location: http://localhost/LongPets_usePHP/admin/index.php");
    }
}

// Nhan vien
if(!empty($_POST)) {
    $emaildangnhap = getPost('emailadmin');
    $matkhaudangnhap = getPost('matkhauadmin');
    $matkhaudangnhap = getSecurityMD5($matkhaudangnhap);

    $sql = "select * from nhanvien where emailnhanvien = '$emaildangnhap' && matkhau = '$matkhaudangnhap'";
    $nhanvien = executeResult($sql, true);
    if($nhanvien == null) {
        $msg = "Đăng nhập không thành công, kiểm tra lại email và mật khẩu";
        var_dump($msg);
    } else {
        $msg = "Đăng nhập thành công";
        //login thanh cong
        var_dump($msg);
        $token = getSecurityMD5($nhanvien['emailnhanvien'].time());
        setcookie('tokenNhanVien', $token, time() + 7 * 24 * 60 * 60, '/');

        $_SESSION['nhanvien'] = $nhanvien;

        $created_at = date('Y-m-d H:i:s');
        $manhanvien = $nhanvien['manhanvien'];
        $sql = "insert into nhanvien_tokens (manhanvien, token, created_at) values ('$manhanvien', '$token', '$created_at')";
        execute($sql);
        header("Location: http://localhost/LongPets_usePHP/admin/index.php");
    }
}