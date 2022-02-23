<?php
session_start();
require_once('../../utils/utils.php');
require_once('../../database/database.php');

$tennguoimua = $emailnguoimua = $msg = '';
if(!empty($_POST)) {
    $tennguoimua = getPost('tennguoimua');
    $emailnguoimua = getPost('emailnguoimua');
    $matkhaunguoimua = getPost('matkhaunguoimua');
    if(empty($tennguoimua) || empty($emailnguoimua) || empty($matkhaunguoimua) || strlen($matkhaunguoimua) < 8) {

    } else {
        $nguoimua = executeResult("select * from nguoimua where emailnguoimua = '$emailnguoimua'", true);
        if($nguoimua != null) {
            echo "Email đã tồn tại! Hãy chọn một email khác";
        } else {
            $matkhaunguoimua = getSecurityMD5($matkhaunguoimua);
            $sql = "insert into nguoimua (hotennguoimua, maxa, emailnguoimua, matkhau, maquyentruycap) values ('$tennguoimua', '00001', '$emailnguoimua', '$matkhaunguoimua', '2')";
            execute($sql);
            echo "Đăng ký email thành công!";
			die();
        }
    }
}
