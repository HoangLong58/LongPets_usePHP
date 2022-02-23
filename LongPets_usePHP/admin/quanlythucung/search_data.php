<?php
require_once('../../database/database.php');
require_once("../../utils/utils.php");
$chucvu = 0;
if(isset($nhanvien)){
    $chucvu = $nhanvien['machucvu'];
}
if(isset($_POST['send_timkiem'])){
    $index=1;
    $timkiem= $_POST['send_timkiem'];
    $sql = 'select thucung.mathucung,thucung.madanhmuc,thucung.tenthucung,thucung.gioitinhthucung,thucung.tuoithucung,thucung.datiemchung,thucung.baohanhsuckhoe,thucung.tieude,thucung.mota,thucung.ghichu,thucung.hinhanh,thucung.soluong,thucung.giaban,thucung.giamgia,danhmuc.tendanhmuc from thucung join danhmuc on thucung.madanhmuc=danhmuc.madanhmuc where thucung.tenthucung like "%'.$timkiem .'%"';
    $result_timkiem = executeResult($sql);
    $thucungList = executeResult($sql);
    foreach ($thucungList as $tc) {
        if(isset($chucvu) and $chucvu == 3){
            echo '
            <tr>
                <td>' . $index++ . '</td>
                <td>' . $tc['tendanhmuc'] . '</td>
                <td>' . $tc['tenthucung'] . '</td>
                <td>' . $tc['gioitinhthucung'] . '</td>
                <td>' . $tc['tuoithucung'] . '</td>
                <td>' . $tc['datiemchung'] . '</td>
                <td>' . $tc['baohanhsuckhoe'] . '</td>
                <td><img id="hienthianh" src="' . $tc['hinhanh'] . '" class="background-image" alt="Chưa có hình ảnh" width="150px" height="100px"style="background-repeat: no-repeat;background-size: contain;background-position: center;border-top-left-radius: 2px;border-top-right-radius: 2px;"></td>
                <td>' . $tc['soluong'] . '</td>
                <td>' . money_format($tc['giaban']) . ' VNĐ</td>
                <td>' . money_format($tc['giamgia']) . ' VNĐ</td>
            </tr>';
        }else{
            echo '
            <tr>
                <td>' . $index++ . '</td>
                <td>' . $tc['tendanhmuc'] . '</td>
                <td>' . $tc['tenthucung'] . '</td>
                <td>' . $tc['gioitinhthucung'] . '</td>
                <td>' . $tc['tuoithucung'] . '</td>
                <td>' . $tc['datiemchung'] . '</td>
                <td>' . $tc['baohanhsuckhoe'] . '</td>
                <td><img id="hienthianh" src="' . $tc['hinhanh'] . '" class="background-image" alt="Chưa có hình ảnh" width="150px" height="100px"style="background-repeat: no-repeat;background-size: contain;background-position: center;border-top-left-radius: 2px;border-top-right-radius: 2px;"></td>
                <td>' . $tc['soluong'] . '</td>
                <td>' . money_format($tc['giaban']) . ' VNĐ</td>
                <td>' . money_format($tc['giamgia']) . ' VNĐ</td>
                <td style="background-color: #f1f2f7;"><a href="suathucung.php?mathucung=' . $tc['mathucung'] . '" class="danhmuc_fix-icon"><i class="far fa-edit"></i></a></td>
                <td style="background-color: #f1f2f7;"><button name="xoathucung" class="danhmuc_remove-icon" value="' . $tc['mathucung'] . '"><i class="far fa-trash-alt"></i></button></td>
            </tr>
            ';
        } 
    }
}
?>