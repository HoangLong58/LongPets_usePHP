<?php
require_once('../../database/database.php');
if(isset($_POST['mathucung'])) {
    $mathucung = $_POST['mathucung'];

    $sql = 'delete from thucung where mathucung = '.$mathucung;
    execute($sql);
}
?>