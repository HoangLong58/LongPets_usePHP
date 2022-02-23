<option  value="">-- Chọn quận, huyện --</option>
<?php
    require_once('../../database/database.php');
    require_once('../../utils/utils.php');
    if(!empty($_POST)) {
        if(isset($_POST['mathanhpho'])){
            $mathanhpho = $_POST['mathanhpho'];
        }
        $sql = "select * from quanhuyen where mathanhpho = '$mathanhpho'";
        $QuanHuyenList = executeResult($sql, false);
        foreach ($QuanHuyenList as $qh) {
            echo '
            <option  value="'.$qh['maquanhuyen'].'">'.$qh['tenquanhuyen'].'</option>
            ';
        }
    }