<?php
session_start();
require_once('../../utils/utils.php');
require_once('../../database/database.php');

$nguoimua = getUserToken();
if($nguoimua != null) {
	$token = getCookie('tokenUser');
	$manguoimua = $nguoimua['manguoimua'];
	$sql = "delete from tokens where manguoimua = '$manguoimua' and token = '$token'";
	execute($sql);
	setcookie('tokenUser', '', time() - 100, '/');
}
header('Location: http://localhost/LongPets_usePHP/user/index.php');

session_destroy();
