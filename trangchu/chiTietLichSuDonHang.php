<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ("include/link.php");
    ?>
    <title>Chi tiết lịch sử đơn hàng</title>
</head>
<body>
    <div class="container-fulid">
        <?php
            include("include/header.php");
        ?>
        <div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h3 class="text-center">
                    CHI TIẾT LỊCH SỬ ĐƠN HÀNG
                </h3>
            </div>
            <div>
                <a href="lichSuDonHang.php" class="col-2 mt-2" >
                    <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                        <i class="fas fa-angle-double-left"></i> Trở lại
                    </button>
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">STT</th>
                        <th scope="col"style="width: 20%;">Tên món</th>
                        <th scope="col"style="width: 20%;">Hình ảnh</th>
                        <th scope="col"style="width: 10%;">Số lượng</th>
                        <th scope="col" style="width: 15%;">Gía</th>
                        <th scope="col"style="width: 15%;">Thành tiền</th>
                        <th scope="col" style="width: 15%;">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $logincheck = Session::get('login_nguoidung');
                        $login_ten = Session::get('login_ten');
                        $login_ma = Session::get('login_ma');
                        if(isset($_GET['thoigian_dathang']) && $_GET['thoigian_dathang'] != NULL){
                            $thoigian_dathang = $_GET['thoigian_dathang'];
                            $show_chitiet_donhang_thoigian = $donHang->show_chitiet_donhang_thoigian($login_ma, $thoigian_dathang);
                            if ($show_chitiet_donhang_thoigian){
                                $i = 0;
                                $thanhtien =0;
                                $tonngtien = 0;
                                while($resultDH = $show_chitiet_donhang_thoigian->fetch_assoc()){
                                    $i++;
                                    $show_giohang_ma = $gioHang->show_giohang_ma($resultDH['ma_giohang']);
                                    if($show_giohang_ma){
                                        $resultGH_M = $show_giohang_ma->fetch_assoc();
                                        $show_trasua_ma = $traSua->show_trasua_ma($resultGH_M['ma_trasua']);
                                        if($show_trasua_ma){
                                            $resultTS_M = $show_trasua_ma->fetch_assoc();
                                            $thanhtien = $resultTS_M['gia_trasua'] * $resultGH_M['soluong_dat'];
                                            $tonngtien = $tonngtien + $thanhtien;
                                            ?>
                                                <tr>
                                                    <th scope="row" style="width: 5%;" ><?php echo $i ?></th>
                                                    <td style="width: 20%;"><?php echo $resultTS_M['ten_trasua'] ?></td>
                                                    <td style="width: 20%;"><img src="../admin/uploads/<?php echo $resultTS_M['hinhanh_trasua'] ?>" style="width: 40%;"></td>
                                                    <td style="width: 10%;"><?php echo $resultGH_M['soluong_dat'] ?></td>
                                                    <td style="width: 15%;"><?php echo number_format($resultTS_M['gia_trasua'], 0, ',', '.') . ' <sup>đ</sup>' ?></td>
                                                    <td style="width: 15%;"><?php echo number_format($thanhtien, 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                                                    <td style="width: 15%;">
                                                    <?php
                                                        if ($resultDH['tintrang_donhang'] == '0'){
                                                            ?>
                                                                <a href="#" >
                                                                    <button type="button" class="btn dang-xu-ly">
                                                                        Đang chờ xử lý
                                                                    </button>
                                                                </a>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a href="#" >
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
                    <tr>
                        <td colspan="7">
                            <button type="button" class="btn btn-warning" style="float: right; font-weight: bold; font-size: 18px;">
                                Tổng tiền:  <?php echo number_format($tonngtien, 0, ',', '.') . ' <sup>đ</sup>'   ?>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <?php
                include("include/footer.php");
            ?>
        </div>
    </div>
</body>
</html>