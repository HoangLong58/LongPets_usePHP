<?php
session_start();
require_once('../../utils/utils.php');
require_once('../../database/database.php');

$nguoimua = getAdminToken();
if($nguoimua != null) {
	$token = getCookie('tokenAdmin');
	$manguoimua = $nguoimua['manguoimua'];
	$sql = "delete from tokens where manguoimua = '$manguoimua' and token = '$token'";
	execute($sql);
	setcookie('tokenAdmin', '', time() - 100, '/');
}

$nhanvien = getNhanVienToken();
if($nhanvien != null) {
	$token = getCookie('tokenNhanVien');
	$manhanvien = $nhanvien['manhanvien'];
	$sql = "delete from nhanvien_tokens where manhanvien = '$manhanvien' and token = '$token'";
	execute($sql);
	setcookie('tokenNhanVien', '', time() - 100, '/');
}
header('Location: login_admin.php');

session_destroy();