<?php
function fixSqlInject($sql) {
	$sql = str_replace('\\', '\\\\', $sql);
	$sql = str_replace('\'', '\\\'', $sql);
	return $sql;
}

function getGet($key) {
	$value = '';
	if(isset($_GET[$key])) {
		$value = $_GET[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getPost($key) {
	$value = '';
	if(isset($_POST[$key])) {
		$value = $_POST[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getRequest($key) {
	$value = '';
	if(isset($_REQUEST[$key])) {
		$value = $_REQUEST[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getCookie($key) {
	$value = '';
	if(isset($_COOKIE[$key])) {
		$value = $_COOKIE[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getSecurityMD5($pwd) {
	return md5(md5($pwd).PRIVATE_KEY);
}

function getUserToken() {
	if(isset($_SESSION['nguoimua'])) {
		$nguoimua = $_SESSION['nguoimua'];
		if(isset($nguoimua['maquyentruycap']) and $nguoimua['maquyentruycap'] == 2){
			return $_SESSION['nguoimua'];
		}
	}
	$token = getCookie('tokenUser');
	$sql = "select * from Tokens t join nguoimua n on t.manguoimua=n.manguoimua where t.token = '$token' and n.maquyentruycap = '2'";
	$item = executeResult($sql, true);
	if($item != null) {
		$manguoimua = $item['manguoimua'];
		$sql = "select * from nguoimua where manguoimua = '$manguoimua'";
		$item = executeResult($sql, true);
		if($item != null) {
			$_SESSION['nguoimua'] = $item;
			return $item;
		}
	}
	return null;
}

function getAdminToken() {
	if(isset($_SESSION['nguoimua'])) {
		$nguoimua = $_SESSION['nguoimua'];
		if($nguoimua['maquyentruycap'] == 1){
			return $_SESSION['nguoimua'];
		}
	}
	$token = getCookie('tokenAdmin');
	$sql = "select * from Tokens t join nguoimua n on t.manguoimua=n.manguoimua where t.token = '$token' and n.maquyentruycap != '2'";
	$item = executeResult($sql, true);
	if($item != null) {
		$manguoimua = $item['manguoimua'];
		$sql = "select * from nguoimua where manguoimua = '$manguoimua'";
		$item = executeResult($sql, true);
		if($item != null) {
			$_SESSION['nguoimua'] = $item;
			return $item;
		}
	}
	return null;
}

function getNhanVienToken() {
	if(isset($_SESSION['nhanvien'])) {
		$nhanvien = $_SESSION['nhanvien'];
	}
	$token = getCookie('tokenNhanVien');
	$sql = "select * from nhanvien_tokens t join nhanvien n on t.manhanvien=n.manhanvien where t.token = '$token'";
	$item = executeResult($sql, true);
	if($item != null) {
		$manhanvien = $item['manhanvien'];
		$sql = "select * from nhanvien where manhanvien = '$manhanvien'";
		$item = executeResult($sql, true);
		if($item != null) {
			$_SESSION['nhanvien'] = $item;
			return $item;
		}
	}
	return null;
}

function money_format($n){
    $n = (string)$n; 
    $n = strrev($n);
    $result = '';
    for($i = 0; $i < strlen($n); $i++ ){
        if($i%3 == 0 && $i != 0){
            $result.='.';
        }
        $result.=$n[$i];
    }
    $result = strrev($result);

    return $result;
}