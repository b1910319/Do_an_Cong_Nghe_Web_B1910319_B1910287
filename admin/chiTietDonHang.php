
<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");

?>
<title>Chi tiết đơn hàng</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <div class="alert alert-primary" role="alert">
                    <h3 class="text-center">
                        CHI TIẾT ĐƠN HÀNG ĐƠN HÀNG
                    </h3>
                </div>
                <div>
                    <a href="quanLyDonHang.php" class="col-2 mt-2">
                        <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                            <i class="fas fa-angle-double-left"></i> Trở lại
                        </button>
                    </a>
                </div>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%;">STT</th>
                            <th scope="col" style="width: 20%;">Tên món</th>
                            <th scope="col" style="width: 20%;">Hình ảnh</th>
                            <th scope="col" style="width: 10%;">Số lượng</th>
                            <th scope="col" style="width: 15%;">Gía</th>
                            <th scope="col" style="width: 15%;">Thành tiền</th>
                            <th scope="col" style="width: 15%;">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($_GET['ma_donhang']) && $_GET['ma_donhang'] && isset($_GET['thoigian_dathang']) && $_GET['thoigian_dathang'] != NULL){
                            $ma_donhang = $_GET['ma_donhang'];
                            $thoigian_dathang = $_GET['thoigian_dathang'];
                            $update_tinhtrang_donhang = $donHang->update_tinhtrang_donhang($ma_donhang, $thoigian_dathang);
                        }
                    ?>
                    <?php
                            if (isset($_GET['thoigian_dathang']) && $_GET['thoigian_dathang'] != NULL && isset($_GET['ma_nguoidung']) && $_GET['ma_nguoidung'] != NULL) {
                                $thoigian_dathang = $_GET['thoigian_dathang'];
                                $ma_nguoidung = $_GET['ma_nguoidung'];
                                $showall_chitiet_donhang_thoigian = $donHang->showall_chitiet_donhang_thoigian($ma_nguoidung, $thoigian_dathang);
                                if ($showall_chitiet_donhang_thoigian) {
                                    $i = 0;
                                    $thanhtien = 0;
                                    $tonngtien = 0;
                                    while ($resultDH = $showall_chitiet_donhang_thoigian->fetch_assoc()) {
                                        $i++;
                                        $show_giohang_ma = $gioHang->show_giohang_ma($resultDH['ma_giohang']);
                                        if ($show_giohang_ma) {
                                            $resultGH_M = $show_giohang_ma->fetch_assoc();
                                            $show_trasua_ma = $traSua->show_trasua_ma($resultGH_M['ma_trasua']);
                                            if ($show_trasua_ma) {
                                                $resultTS_M = $show_trasua_ma->fetch_assoc();
                                                $thanhtien = $resultTS_M['gia_trasua'] * $resultGH_M['soluong_dat'];
                                                $tonngtien = $tonngtien + $thanhtien;
                                                ?>
                                                    <tr>
                                                        <th scope="row" style="width: 5%;"><?php echo $i ?></th>
                                                        <td style="width: 20%;"><?php echo $resultTS_M['ten_trasua'] ?></td>
                                                        <td style="width: 20%;"><img src="../admin/uploads/<?php echo $resultTS_M['hinhanh_trasua'] ?>" style="width: 40%;"></td>
                                                        <td style="width: 10%;"><?php echo $resultGH_M['soluong_dat'] ?></td>
                                                        <td style="width: 15%;"><?php echo number_format($resultTS_M['gia_trasua'], 0, ',', '.') . ' <sup>đ</sup>' ?></td>
                                                        <td style="width: 15%;"><?php echo number_format($thanhtien, 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                                                        <td style="width: 15%;">
                                                            <?php
                                                            if ($resultDH['tintrang_donhang'] == '0') {
                                                            ?>
                                                                <a href="?ma_donhang=<?php echo $resultDH['ma_donhang'] ?>&&thoigian_dathang=<?php echo $resultDH['thoigian_dathang'] ?>">
                                                                    <button  class="btn dang-xu-ly">
                                                                        Đang chờ xử lý
                                                                    </button>
                                                                </a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="#">
                                                                    <button type="button" class="btn dang-van_chuyen">
                                                                        Đang vận chuyển
                                                                    </button>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include("include/rightBar.php");
    ?>
    <script src="assets\js\vendor.min.js"></script>
    <script src="assets\libs\jquery-knob\jquery.knob.min.js"></script>
    <script src="assets\libs\peity\jquery.peity.min.js"></script>
    <script src="assets\libs\jquery-sparkline\jquery.sparkline.min.js"></script>
    <script src="assets\js\pages\dashboard-1.init.js"></script>
    <script src="assets\js\app.min.js"></script>
</body>

</html>