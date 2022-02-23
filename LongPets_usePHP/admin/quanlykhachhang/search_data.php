<?php
require_once('../../database/database.php');
require_once("../../utils/utils.php");
$nhanvien = getNhanVienToken();
$chucvu = 0;
if(isset($nhanvien)){
    $chucvu = $nhanvien['machucvu'];
}
if(isset($_POST['send_timkiemkh'])){
    $index=1;
    $timkiem= $_POST['send_timkiemkh'];
    $sql = 'select n.manguoimua, n.maquyentruycap, n.emailnguoimua, n.hotennguoimua, n.ngaysinhnguoimua, n.gioitinhnguoimua, n.sdtnguoimua, n.diachinguoimua, x.tenxa, q.tenquanhuyen, t.tenthanhpho from nguoimua n join xaphuongthitran x on n.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho where n.maquyentruycap=2 and n.manguoimua != 0 and n.hotennguoimua like "%'.$timkiem .'%";';
    $NguoiMuaList = executeResult($sql, false);
    $dem = 0;
    foreach($NguoiMuaList as $nm) {
        if(isset($chucvu)){
            if($chucvu == 2){
                echo '
                <tr>
                    <td>'.++$dem.'</td>
                    <td>'.$nm['emailnguoimua'].'</td>
                    <td>'.$nm['hotennguoimua'].'</td>
                    <td>'.$nm['gioitinhnguoimua'].'</td>
                    <td>'.$nm['ngaysinhnguoimua'].'</td>
                    <td>'.$nm['sdtnguoimua'].'</td>
                    <td>'.$nm['diachinguoimua'].', '.$nm['tenxa'].', '.$nm['tenquanhuyen'].','. $nm['tenthanhpho'].'</td>
                </tr>
                ';
            }else{
                echo '
                <tr>
                    <td>'.++$dem.'</td>
                    <td>'.$nm['emailnguoimua'].'</td>
                    <td>'.$nm['hotennguoimua'].'</td>
                    <td>'.$nm['gioitinhnguoimua'].'</td>
                    <td>'.$nm['ngaysinhnguoimua'].'</td>
                    <td>'.$nm['sdtnguoimua'].'</td>
                    <td>'.$nm['diachinguoimua'].', '.$nm['tenxa'].', '.$nm['tenquanhuyen'].','. $nm['tenthanhpho'].'</td>
                    <td style="background-color: #f1f2f7;"><button class="danhmuc_remove-icon" name="xoakhachhang" value="'.$nm['manguoimua'].'"><i class="far fa-trash-alt"></i></button></td>
                </tr>
                ';
            }
        }
    }
}
if(isset($_POST['manguoimuaxoa'])) {
    $manguoimuaxoa = $_POST['manguoimuaxoa'];

    $sql = 'delete from nguoimua where manguoimua = '.$manguoimuaxoa;
    execute($sql);
    echo 'Xóa khách hàng thành công';
}
?>