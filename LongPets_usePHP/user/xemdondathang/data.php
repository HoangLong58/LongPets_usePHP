<?php
require_once('../../database/database.php');
require_once('../../utils/utils.php');

if(isset($_POST['send_madathang'])){
    $madathang = $_POST['send_madathang'];
    $sql = "select * from dathang d join trangthaidonhang tt on d.trangthaidathang = tt.trangthaidathang join nhanvien n on d.manhanvien = n.manhanvien join xaphuongthitran x on d.maxa = x.maxa join quanhuyen q on x.maquanhuyen = q.maquanhuyen join tinhthanhpho t on q.mathanhpho = t.mathanhpho where d.madathang = $madathang;";
    $DonHang = executeResult($sql, true);
    if( $DonHang != NULL){
        $manguoimua = $DonHang['manguoimua'];
        $tenxa = $DonHang['tenxa'];
        $tenquanhuyen = $DonHang['tenquanhuyen'];
        $tenthanhpho = $DonHang['tenthanhpho'];
        $hotennhanvien = $DonHang['hotennhanvien'];
        $tentrangthaidathang = $DonHang['tentrangthaidathang'];
        $tongtiendathang = $DonHang['tongtiendathang'];
        $ngaydathang = $DonHang['ngaydathang'];
        $ghichudathang = $DonHang['ghichudathang'];
        $diachidathang = $DonHang['diachidathang'];
        $sodienthoaidathang = $DonHang['sodienthoaidathang'];
        $emaildathang = $DonHang['emaildathang'];
        $hotendathang = $DonHang['hotendathang'];
    }
    ?>
        <form action="" method="POST">
            <div class="panel-heading" style="background-color:var(--primary-color); border-color:var(--primary-color);">
                <h2 class="text-center" style="color: var(--white-color);">Chi tiết đơn đặt thú cưng</h2>
            </div>
            <div class="panel-body">
                <div class="form-row">
                    <div class="form-group col-sm-4" style="padding:0 15px;">
                        <label for="trangthaidonhang">Trạng thái đơn hàng:</label>
                        <input type="text" readonly="true" class="form-control" id="trangthaidonhang" name="trangthaidonhang" value="<?=$tentrangthaidathang?>">
                    </div>
                    <div class="form-group col-sm-4" style="padding:0 15px;">
                        <label for="madonhang">Mã đơn hàng:</label>
                        <input type="text" readonly="true" class="form-control" id="madonhang" name="madonhang" value="<?=$madathang?>">
                    </div>
                    <div class="form-group col-sm-4" style="padding:0 15px;">
                        <label for="ngaydathang">Ngày đặt hàng:</label>
                        <input type="text" readonly="true" class="form-control" id="ngaydathang" name="ngaydathang" value="<?=$ngaydathang?>">
                    </div>
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="tennhanhvien">Nhân viên duyệt đơn:</label>
                    <input type="text" readonly="true" class="form-control" id="tennhanhvien" name="tennhanhvien" value="<?=$hotennhanvien?>">
                </div>
                <div class="form-row">
                    <div class="form-group  col-sm-6" style="padding:0 15px;">
                        <label for="emaildathang">Email:</label>
                        <input type="email" readonly="true" class="form-control" id="emaildathang" name="emaildathang" value="<?=$emaildathang?>">
                    </div>
                    <div class="form-group  col-sm-6" style="padding:0 15px;">
                        <label for="sodienthoaidathang">Số điện thoại:</label>
                        <input type="text" readonly="true" class="form-control" id="sodienthoaidathang" name="sodienthoaidathang" value="<?=$sodienthoaidathang?>">
                    </div>
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="hotendathang">Họ tên:</label>
                    <input type="text" readonly="true" class="form-control" id="hotendathang" name="hotendathang" value="<?=$hotendathang?>">
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="diachidathang">Địa chỉ:</label>
                    <input type="text" readonly="true" class="form-control" id="diachidathang" name="diachidathang" value="<?=$diachidathang?>">
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="ghichudathang">Ghi chú:</label>
                    <input type="text" readonly="true" class="form-control" id="ghichudathang" name="ghichudathang" value="<?=$ghichudathang?>">
                </div>
                <div class="form-group" style="padding:0 15px;">
                    <label for="bangthucung">Thú cưng bạn đã đặt mua:</label>
                    <table class="table table-bordered" id="bangthucung" style="margin-top: 15px; font-size: 1.6rem;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Tên thú cưng</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody id="mytable">
                            <?php
                            $sql = "select * from chitietdathang c join thucung t on c.mathucung = t.mathucung WHERE c.madathang = $madathang;";
                            $ChiTietList = executeResult($sql, false);
                            $dem = 0;
                            $tongtien = 0;
                            foreach ($ChiTietList as $ct) {
                                $tongtien = $ct['soluongchitietdathang'] * $ct['giamgia'];
                                $dem++;
                                echo '
                                <tr>
                                    <td>' . $dem . '</td>
                                    <td>' . $ct['tieude'] . '</td>
                                    <td>' . $ct['tenthucung'] . '</td>
                                    <td>' . $ct['soluongchitietdathang'] . '</td>
                                    <td>' . money_format($ct['giamgia']) .' VNĐ</td>
                                    <td>' . money_format($tongtien) . ' VNĐ</td>
                                </tr>
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <hr style="  border: 2px solid var(--primary-color); border-radius: 5px;">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    </div>
                    <div class="form-group col-md-6" style="padding:0 15px;">
                    <div  style="display: flex; align-items:center; justify-content:space-between">
                        <p>Tổng tiền thú cưng</p>
                        <p><?=money_format($tongtiendathang)?> VNĐ</p>
                    </div>
                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <p>Phí vận chuyển</p>
                        <p>0.00 VNĐ</p>
                    </div>
                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <p style="color:var(--primary-color);"><b>Tổng cộng</b></p>
                        <p style="color:var(--primary-color);"><b><?=money_format($tongtiendathang)?> VNĐ</b></p>
                    </div>
                </div>
                <button class="btn btn--primary" style="float:right;" data-dismiss="modal">Đóng</button>
                </div>
        </form>
    <?php
}

if(isset($_POST['madathang_huy'])) {
    $madathang_huy = $_POST['madathang_huy'];
    $sql = "select * from dathang where madathang = $madathang_huy";
    $kq = executeResult($sql, true);
    $trangthaidonhang = $kq['trangthaidathang'];
    if($trangthaidonhang == 1) {
        $sql1 = "update dathang set manhanvien= 0, trangthaidathang = 4 where madathang = $madathang_huy";
        execute($sql1);
        $sql2 = "select * from chitietdathang where madathang = $madathang_huy";
        $chitietDHList = executeResult($sql2);
        foreach($chitietDHList as $ct){
            $mahangchitiet = $ct['mathucung'];
            $soluongchitiet = $ct['soluongchitietdathang'];
            $sql3 = "update thucung set soluong = soluong + $soluongchitiet where mathucung = $mahangchitiet";
            execute($sql3);
        }
        echo("Hủy đơn thành công");
    }else{
        echo("Chỉ có thể hủy khi đơn hàng Chờ xác nhận, hãy liên hệ quản trị viên để hướng dẫn hủy đơn!");
    }
}
?>