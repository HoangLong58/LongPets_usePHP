<option  value="">-- Chọn phường, xã --</option>
<?php
    require_once('../../database/database.php');
    require_once('../../utils/utils.php');
    if(!empty($_POST)) {
        if(isset($_POST['maquanhuyen'])){
            $maquanhuyen = $_POST['maquanhuyen'];
        }
        $sql = "select * from xaphuongthitran where maquanhuyen = '$maquanhuyen'";
        $PhuongXaList = executeResult($sql, false);
        foreach ($PhuongXaList as $px) {
            echo '
            <option  value="'.$px['maxa'].'">'.$px['tenxa'].'</option>
            ';
        }
    }