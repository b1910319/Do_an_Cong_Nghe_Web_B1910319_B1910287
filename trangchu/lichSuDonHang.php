<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ("include/link.php");
    ?>
    <title>Lịch sử đơn hàng</title>
</head>
<body>
    <div class="container-fulid">
        <?php
            include("include/header.php");
        ?>
        <div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h3 class="text-center">
                    LỊCH SỬ ĐƠN HÀNG
                </h3>
            </div>
            <div>
                <a href="index.php" class="col-2 mt-2" >
                    <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                        <i class="fas fa-home"></i> Trang chủ
                    </button>
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col" >Thời gian đặt</th>
                    <th scope="col" >Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $logincheck = Session::get('login_nguoidung');
                        $login_ten = Session::get('login_ten');
                        $login_ma = Session::get('login_ma');
                        $show_donhang_ma_thoigian = $donHang->show_donhang_ma_thoigian($login_ma);
                        if ($show_donhang_ma_thoigian){
                            $i = 0;
                            while($resultDH_TG = $show_donhang_ma_thoigian->fetch_assoc()){
                                $i ++;
                                if($resultDH_TG['tintrang_donhang'] == '0'){
                                    ?>
                                        <tr>
                                            <th scope="row" ><?php echo $i ?></th>
                                            <td style="color: #ee3500; font-weight: bold;" ><?php echo $resultDH_TG['thoigian_dathang'] ?></td>
                                            <td>
                                                <a href="chiTietLichSuDonHang.php?thoigian_dathang=<?php echo $resultDH_TG['thoigian_dathang'] ?>">
                                                    <button type="button" class="btn chitiet_donhang" >
                                                        <i class="fas fa-info-circle"></i> 
                                                        Chi tiết đơn hàng
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                } else{
                                    ?>
                                        <tr>
                                            <th scope="row" ><?php echo $i ?></th>
                                            <td ><?php echo $resultDH_TG['thoigian_dathang'] ?></td>
                                            <td>
                                                <a href="chiTietLichSuDonHang.php?thoigian_dathang=<?php echo $resultDH_TG['thoigian_dathang'] ?>">
                                                    <button type="button" class="btn chitiet_donhang" >
                                                        <i class="fas fa-info-circle"></i> 
                                                        Chi tiết đơn hàng
                                                    </button>
                                                </a>
                                            </td>
                                            
                                        </tr>
                                    <?php
                                }
                            }
                        }
                    ?>
                    
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