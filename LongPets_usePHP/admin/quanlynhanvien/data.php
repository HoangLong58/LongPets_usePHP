<?php
require_once('../../database/database.php');
require_once('../../utils/utils.php');
if(isset($_POST['send_manhanvien'])){
    $manhanvien = $_POST['send_manhanvien'];
    $sql = "select * from nhanvien n join chucvunhanvien c on n.machucvu = c.machucvu join xaphuongthitran x on n.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho where manhanvien = '$manhanvien';";
    $NhanVienList = executeResult($sql, true);
    if( $NhanVienList != NULL){
        $machucvunhanvien = $NhanVienList['machucvu'];
        $chucvunhanvien = $NhanVienList['tenchucvu'];
        $emailnhanvien = $NhanVienList['emailnhanvien'];
        $matkhaunhanvien = $NhanVienList['matkhau'];
        $hotennhanvien = $NhanVienList['hotennhanvien'];
        $ngaysinhnhanvien = $NhanVienList['ngaysinhnhanvien'];
        $gioitinhnhanvien = $NhanVienList['gioitinhnhanvien'];
        $sdtnhanvien = $NhanVienList['sdtnhanvien'];
        $diachinhanvien = $NhanVienList['diachinhanvien'];
        $maxanhanvien = $NhanVienList['maxa'];
        $tenxanhanvien = $NhanVienList['tenxa'];
        $maquanhuyennhanvien = $NhanVienList['maquanhuyen'];
        $tenquanhuyennhanvien = $NhanVienList['tenquanhuyen'];
        $mathanhphonhanvien = $NhanVienList['mathanhpho'];
        $tenthanhphonhanvien = $NhanVienList['tenthanhpho'];
    }
    ?>
        <form action="" method="POST">
            <div class="panel-heading" style="background-color:var(--primary-color); border-color:var(--primary-color);">
                <h2 class="text-center" style="color: var(--white-color);">Cập nhật thông tin nhân viên</h2>
            </div>
            <div class="panel-body">
            <input style="display:none;"required="true" type="sodienthoai" class="form-control" id="sdtnhanvien" name="manhanvienchinhsua" placeholder="Số điện thoại của nhân viên" value="<?=$manhanvien?>">
                <div class="form-group" style="padding:0 15px;">
                    <label for="chucvunhanvien">Chức vụ:</label>
                    <select required="true" class="form-control" id="chucvunhanvien" name="chucvunhanvien">
                        <option selected value="">-- Chọn chức vụ --</option>
                        <?php
                        $sql = "select * from chucvunhanvien";
                        $chucvu = executeResult($sql, false);
                        foreach ($chucvu as $cv) {
                            if($cv['machucvu'] == $machucvunhanvien ){
                                echo '
                                <option selected value="' . $cv['machucvu'] . '">' . $cv['tenchucvu'] . '</option>
                                ';
                            }else {
                                echo '
                                <option  value="' . $cv['machucvu'] . '">' . $cv['tenchucvu'] . '</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="emailnhanvien">Email:</label>
                    <input required="true" readonly="true" type="email" class="form-control" id="emailnhanvien" name="emailnhanvien" placeholder="Email của nhân viên" value="<?=$emailnhanvien?>">
                </div>
                <!-- Mat khau nhan vien -->
                <!-- <div class="form-group" style="padding:0 15px;">
                    <label for="passwordnhanvien">Mật khẩu:</label>
                    <input required="true" type="password" class="form-control" id="passwordnhanvien" name="passwordnhanvien" placeholder="Mật khẩu của nhân viên" minlength="8" value="<?=$matkhaunhanvien?>">
                </div> -->
                <div class="form-group" style="padding:0 15px;">
                    <label for="usr">Họ tên:</label>
                    <input required="true" type="text" class="form-control" id="hotennhanvien" name="hotennhanvien" placeholder="Họ tên của nhân viên" value="<?=$hotennhanvien?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="birthday">Ngày sinh:</label>
                        <input type="date" class="form-control" id="ngaysinhnhanvien" name="ngaysinhnhanvien" value="<?=$ngaysinhnhanvien?>">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">Giới tính</label>
                        <select class="form-control" name="gioitinhnhanvien">
                            <?php
                            if($gioitinhnhanvien == "Nam"){
                                echo ' 
                                <option value="Nam" selected>Nam</option>
                                <option value="Nữ">Nữ</option>
                            ';
                            }else {
                                echo '
                                <option value="Nữ" selected>Nữ</option>
                                <option value="Nam">Nam</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="sodienthoai">Số điện thoại:</label>
                    <input required="true" type="sodienthoai" class="form-control" id="sdtnhanvien" name="sdtnhanvien" placeholder="Số điện thoại của nhân viên" value="<?=$sdtnhanvien?>">
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="diachinhanvien" name="diachinhanvien" placeholder="Địa chỉ của nhân viên" value="<?=$diachinhanvien?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="">Tỉnh, thành phố:</label>
                        <select class="form-control" name="tinhthanhpho" id="tinhthanhpho">
                            <option value="">-- Chọn tỉnh, thành phố --</option>
                            <?php
                            $sql = "select * from tinhthanhpho";
                            $tenthanhpho_1 = executeResult($sql);
                            foreach ($tenthanhpho_1 as $item) {
                                if ($item['mathanhpho'] == $mathanhphonhanvien) {
                                    echo '<option selected value="' . $item['mathanhpho'] . '">' . $item['tenthanhpho'] . '</option> ';
                                } else {
                                    echo '<option value="' . $item['mathanhpho'] . '">' . $item['tenthanhpho'] . '</option> ';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Quận, huyện:</label>
                        <select class="form-control" name="quanhuyen" id="quanhuyen">
                            <option value="">-- Chưa chọn tỉnh, thành phố --</option>
                            <?php
                            $sql = "select * from quanhuyen where mathanhpho = '$mathanhphonhanvien'";
                            $quanhuyen = executeResult($sql);
                            foreach ($quanhuyen as $item) {
                                if ($item['maquanhuyen'] == $maquanhuyennhanvien) {
                                    echo '<option selected value="' . $item['maquanhuyen'] . '">' . $item['tenquanhuyen'] . '</option> ';
                                } else {
                                    echo '<option value="' . $item['maquanhuyen'] . '">' . $item['tenquanhuyen'] . '</option> ';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Phường, xã:</label>
                        <select class="form-control" name="phuongxa" id="phuongxa">
                            <option value="">-- Chưa chọn quận, huyện --</option>
                            <?php
                            $sql = "select * from xaphuongthitran where maquanhuyen ='$maquanhuyennhanvien'";
                            $tenxa_1 = executeResult($sql);
                            foreach ($tenxa_1 as $item) {
                                if ($item['maxa'] == $maxanhanvien) {
                                    echo '<option selected value="' . $item['maxa'] . '">' . $item['tenxa'] . '</option> ';
                                } else {
                                    echo '<option value="' . $item['maxa'] . '">' . $item['tenxa'] . '</option> ';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="themthucung_btn">
                    <button type="submit" id="themnhanvien" class="btn btn--primary">Cập nhật</button>
                    <button type="reset" class="btn btn--primary">Làm lại</button>
                    <button class="btn btn--primary"data-dismiss="modal">Trở về</button>
                </div>
            </div>
        </form>
    <?php
}
if(isset($_POST['manhanvienxoa'])) {
    $manhanvienxoa = $_POST['manhanvienxoa'];

    $sql = 'delete from nhanvien where manhanvien = '.$manhanvienxoa;
    execute($sql);
    echo 'Xóa nhân viên thành công';
}
if(isset($_POST['send_timkiemnv'])){
    $timkiem= $_POST['send_timkiemnv'];
    $sql = 'select * from nhanvien n join xaphuongthitran x on n.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho join chucvunhanvien c on n.machucvu = c.machucvu where n.hotennhanvien like "%'.$timkiem .'%"';
        $NhanVienList = executeResult($sql, false);
        $dem = 0;
        foreach ($NhanVienList as $nv) {
            $dem++;
            echo '
            <tr>
                <td>' . $dem . '</td>
                <td>' . $nv['tenchucvu'] . '</td>
                <td>' . $nv['emailnhanvien'] . '</td>
                <td>' . $nv['hotennhanvien'] . '</td>
                <td>' . $nv['gioitinhnhanvien'] . '</td>
                <td>' . $nv['ngaysinhnhanvien'] . '</td>
                <td>' . $nv['sdtnhanvien'] . '</td>
                <td>' . $nv['diachinhanvien'] . ', ' . $nv['tenxa'] . ', ' . $nv['tenquanhuyen'] . ',' . $nv['tenthanhpho'] . '</td>
                <td style="background-color: #f1f2f7;"><button name="chinhsuanhanvien" class="danhmuc_remove-icon" value="' . $nv['manhanvien'] . '" ><i class="far fa-edit"></i></i></button></td>
                <td style="background-color: #f1f2f7;"><button name="xoanhanvien" class="danhmuc_remove-icon" value="'. $nv['manhanvien'].'"><i class="far fa-trash-alt"></i></button></td>
            </tr>
            ';
        }

}