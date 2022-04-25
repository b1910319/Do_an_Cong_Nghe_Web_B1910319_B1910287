<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("include/link.php");
    ?>
    <title>Giỏ hàng</title>
</head>

<body>
    <div class="container-fulid">
        <?php
        include("include/header.php");
        ?>
        <div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h3 class="text-center">
                    GIỎ HÀNG
                </h3>
            </div>
            <!-- cập nhật số lượng sản phẩm đặt  -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
                $ma_giohang = $_POST['ma_giohang'];
                $soluong_dat = $_POST['soluong_dat'];
                $update_giohang = $gioHang->update_giohang($soluong_dat, $ma_giohang);
            }
            ?>
            <!-- xóa sản phẩm khỏi giỏ hàng  -->
            <?php
            if (isset($_GET['ma_giohang']) && $_GET['ma_giohang'] != NULL) {
                $ma_giohang = $_GET['ma_giohang'];
                $delete_giohang_ma = $gioHang->delete_giohang_ma($ma_giohang);
            }
            ?>
            <table class="table table-striped">
                <?php
                $logincheck = Session::get('login_nguoidung');
                $login_ten = Session::get('login_ten');
                $login_ma = Session::get('login_ma');
                $show_giohang = $gioHang->show_giohang($login_ma);
                if ($login_ma != 0 && isset($show_giohang) && $show_giohang != NULL) {
                ?>
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%;">STT</th>
                            <th scope="col" style="width: 20%;">Tên sản phẩm</th>
                            <th scope="col" style="width: 30%;">Hình ảnh</th>
                            <th scope="col" style="width: 20%;">Số lượng</th>
                            <th scope="col" style="width: 10%;">Gía</th>
                            <th scope="col" style="width: 10%;">Tổng tiền</th>
                            <th scope="col" style="width: 5%;">Xóa</th>
                        </tr>
                    </thead>
                <?php
                }
                ?>
                <tbody>
                    <?php
                    $logincheck = Session::get('login_nguoidung');
                    $login_ten = Session::get('login_ten');
                    $login_ma = Session::get('login_ma');
                    if ($login_ma != 0) {
                        $show_giohang = $gioHang->show_giohang($login_ma);
                        if (isset($show_giohang) && $show_giohang != NULL) {
                            $i = 0;
                            $thanhtien = 0;
                            while ($resultGH = $show_giohang->fetch_assoc()) {
                                $i++;
                                //lấy thông tin trà sữa
                                $show_trasua_ma = $traSua->show_trasua_ma($resultGH['ma_trasua']);
                                if (isset($show_trasua_ma)) {
                                    $resultTS = $show_trasua_ma->fetch_assoc();
                                }
                    ?>
                                <tr>
                                    <th scope="row" style="width: 5%;"><?php echo $i ?></th>
                                    <td style="width: 20%;"><?php echo $resultTS['ten_trasua'] ?></td>
                                    <td style="width: 30%;"><img src="../admin/uploads/<?php echo $resultTS['hinhanh_trasua'] ?>" alt="" style="width: 20%;"></td>
                                    <td style="width: 20%;">
                                        <form action="" method="POST">
                                            <div class="input-group mb-3">
                                                <input type="hidden" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" name="ma_giohang" value="<?php echo $resultGH['ma_giohang'] ?>">
                                                <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" min="0" max="10" name="soluong_dat" value="<?php echo $resultGH['soluong_dat'] ?>">
                                                <button class="btn btn-success" name="update" type="submit" id="button-addon2">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td style="width: 10%;"><?php echo number_format($resultTS['gia_trasua'], 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                                    <?php $thanhtien = $resultTS['gia_trasua'] * $resultGH['soluong_dat']  ?>
                                    <td style="width: 10%;"><?php echo number_format($thanhtien, 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                                    <td style="width: 5%;">
                                        <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultTS['ten_trasua'] ?> không?')" href="?ma_giohang=<?php echo $resultGH['ma_giohang'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            ?>
                                <img src="img/logo/empty-cart.png"  style="width: 20%; margin-left: 40%;">
                                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                    <a href="lichSuDonHang.php"><button class="btn btn-primary btn_lichsudonhang" type="button" style="width: 100%;">LỊCH SỬ ĐƠN HÀNG</button></a>
                                </div>
                            <?php
                        }
                    } else {
                        ?>
                        <h4 class="text-center">Bạn vui lòng
                            <a href="dangNhap.php">
                                <button type="button" class="btn btn-danger chucnang"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
                            </a>
                            để tiếp tục mua hàng
                        </h4>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            $logincheck = Session::get('login_nguoidung');
            $login_ten = Session::get('login_ten');
            $login_ma = Session::get('login_ma');
            if ($login_ma != 0) {
                $show_giohang = $gioHang->show_giohang($login_ma);
                if ($show_giohang == NULL) {
                    echo " ";
                } else {
                    if (isset($show_giohang)) {
                        $tongtien = 0;
                        while ($resultGH = $show_giohang->fetch_assoc()) {
                            $show_trasua_ma = $traSua->show_trasua_ma($resultGH['ma_trasua']);
                            if (isset($show_trasua_ma)) {
                                $resultTS_M = $show_trasua_ma->fetch_assoc();
                                $tongtien = $tongtien + ($resultGH['soluong_dat'] * $resultTS_M['gia_trasua']);
                            }
                        }
                    }
            ?>
                    <div class="row">
                        <div class="col-6">
                            <table class="table mt-2">
                                <tbody>
                                    <tr>
                                        <th scope="row">Tạm tính </th>
                                        <td style="text-align: right; font-weight: bold; color: #8f8fa7;">
                                            <?php echo number_format($tongtien, 0, ',', '.') . ' <sup>đ</sup>'  ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Giảm giá </th>
                                        <td style="text-align: right; font-weight: bold; color: #8f8fa7;">0 <sup>đ</sup></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Vận chuyển </th>
                                        <td style="text-align: right; font-weight: bold; color: #8f8fa7;">10.000<sup>đ</sup></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="color: #038018;">TỔNG THANH TOÁN </th>
                                        <td style="text-align: right; color: #eb3007; font-weight: bold; font-size: 20px;"><?php echo number_format($tongtien + 10000, 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <div class="mt-2" style="margin-bottom: 20px;">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="thanhToan.php"><button class="btn btn-primary btn_thanhtoan" type="button" style="width: 100%;">THANH TOÁN</button></a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                    <a href="lichSuDonHang.php"><button class="btn btn-primary btn_lichsudonhang" type="button" style="width: 100%;">LỊCH SỬ ĐƠN HÀNG</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="footer">
            <?php
            include("include/footer.php");
            ?>
        </div>
    </div>
</body>

</html>