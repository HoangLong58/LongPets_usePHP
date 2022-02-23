<?php
session_start();
require_once('../../utils/utils.php');
require_once('../../database/database.php');

$emaildangnhap = $matkhaudangnhap = '';

if(!empty($_POST)) {
    $emaildangnhap = getPost('emaildangnhap');
    $matkhaudangnhap = getPost('matkhaudangnhap');
    $matkhaudangnhap = getSecurityMD5($matkhaudangnhap);
    
    $sql = "select * from nguoimua where emailnguoimua = '$emaildangnhap' && matkhau = '$matkhaudangnhap' && maquyentruycap = '2'";
    $nguoimua = executeResult($sql, true);
    if($nguoimua == null or $nguoimua['maquyentruycap'] != '2') {
        echo "Đăng nhập không thành công, kiểm tra lại email và mật khẩu";
        // var_dump($msg);
    } else {
        echo "Đăng nhập thành công";
        //login thanh cong
        // var_dump($msg);
        $token = getSecurityMD5($nguoimua['emailnguoimua'].time());
        setcookie('tokenUser', $token, time() + 7 * 24 * 60 * 60, '/');

        $_SESSION['nguoimua'] = $nguoimua;

        $created_at = date('Y-m-d H:i:s');
        $manguoimua = $nguoimua['manguoimua'];
        $sql = "insert into tokens (manguoimua, token, created_at) values ('$manguoimua', '$token', '$created_at')";
        execute($sql);
    }

}

