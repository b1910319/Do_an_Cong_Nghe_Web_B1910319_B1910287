<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("include/link.php");
    ?>
    <title>Thanh Toán</title>
</head>

<body>
    <div class="container-fulid">
        <?php
        include("include/header.php");
        ?>
        <div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h3 class="text-center">
                    THANH TOÁN
                </h3>
            </div>
            <?php
                $logincheck = Session::get('login_nguoidung');
                $login_ten = Session::get('login_ten');
                $login_ma = Session::get('login_ma');
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dathang'])) {
                    $ghichu_nguoidung = $_POST['ghichu_nguoidung'];
                    $insert_donhang = $donHang->insert_donhang($login_ma, $ghichu_nguoidung);
                }
                ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <?php
                            $logincheck = Session::get('login_nguoidung');
                            $login_ten = Session::get('login_ten');
                            $login_ma = Session::get('login_ma');
                            if ($login_ma != 0) {
                            ?>
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%;">STT</th>
                                        <th scope="col" style="width: 20%;">Tên sản phẩm</th>
                                        <th scope="col" style="width: 30%;">Hình ảnh</th>
                                        <th scope="col" style="width: 5%;">Số lượng</th>
                                        <th scope="col" style="width: 15%;">Gía</th>
                                        <th scope="col" style="width: 20%;">Tổng tiền</th>
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
                                    if (isset($show_giohang)) {
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
                                                    <input type="hidden" name="ma_giohang" value="<?php echo $resultGH['ma_giohang'] ?>">
                                                    <th scope="row" style="width: 10%;"><?php echo $i ?></th>
                                                    <td style="width: 20%;"><?php echo $resultTS['ten_trasua'] ?></td>
                                                    <td style="width: 30%;"><img src="../admin/uploads/<?php echo $resultTS['hinhanh_trasua'] ?>" alt="" style="width: 50%;"></td>
                                                    <td style="width: 5%;">
                                                        <?php echo $resultGH['soluong_dat'] ?>
                                                    </td>
                                                    <td style="width: 15%;"><?php echo number_format($resultTS['gia_trasua'], 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                                                    <?php $thanhtien = $resultTS['gia_trasua'] * $resultGH['soluong_dat']  ?>
                                                    <td style="width: 20%;"><?php echo number_format($thanhtien, 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                                                </tr>
                                            <?php
                                        }
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
                            $show_giohang = $gioHang->show_giohang($login_ma);
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
                            <div class="col">
                                <table class="table mt-4">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="color: #038018;">TỔNG THANH TOÁN </th>
                                            <td style="text-align: right; color: #eb3007; font-weight: bold; font-size: 20px;">
                                                <input type="hidden" name="tongtien_donhang" value="<?php echo $thanhtien ?>">
                                                <?php echo number_format($tongtien, 0, ',', '.') . ' <sup>đ</sup>'  ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="" style="margin-bottom: 20px;">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary btn_thanhtoan" type="submit" style="width: 100%;" name="dathang">ĐẶT HÀNG</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h4 class="text-center">THÔNG TIN KHÁCH HÀNG</h4>
                        <table class="table mt-4">
                            <?php
                                $logincheck = Session::get('login_nguoidung');
                                $login_ten = Session::get('login_ten');
                                $login_ma = Session::get('login_ma');
                                $show_thongTin = $nguoiDung->show_thongTin($login_ma);
                                if (isset($show_thongTin)){
                                    $resultND = $show_thongTin->fetch_assoc();
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Họ tên: </th>
                                                <td>
                                                    <?php echo $resultND['hoten_nguoidung'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Số điện thoại </th>
                                                <td><?php echo $resultND['sdt_nguoidung'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Địa chỉ</th>
                                                <td><?php echo $resultND['diachi_nguoidung'] ?></td>
                                            </tr>
                                        </tbody>
                                    <?php
                                }
                            ?>
                            
                        </table>
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea name="ghichu_nguoidung" style="resize: none;" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ghi chú của khách hàng"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="footer">
            <?php
            include("include/footer.php");
            ?>
        </div>
    </div>
</body>

</html>