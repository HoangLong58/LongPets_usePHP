<?php
require_once('../../database/database.php');
if(isset($_POST['madanhmuc'])) {
    $madanhmuc = $_POST['madanhmuc'];

    $sql = 'delete from danhmuc where madanhmuc = '.$madanhmuc;
    execute($sql);
}
?>