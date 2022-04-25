
<!DOCTYPE html>
<html lang="en">
<?php
    include("include/link.php");
?>
<title>Quản lý đơn hàng</title>

<body>
    <div id="wrapper">
        <?php
            include("include/header.php");
            include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">ĐƠN HÀNG</h3>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <nav class="navbar navbar-light">
                            <div style="width: 100%;">
                                <form class="d-flex" action="timDonHang.php" method="POST">
                                    <input name="tukhoa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Username</th>
                                <th scope="col">Thời gian đặt</th>
                                <th scope="col">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $showall_donhang_ma_thoigian = $donHang->showall_donhang_ma_thoigian();
                            if ($showall_donhang_ma_thoigian) {
                                $i = 0;
                                while ($resultDH_TG = $showall_donhang_ma_thoigian->fetch_assoc()) {
                                    $i++;
                                    if ($resultDH_TG['tintrang_donhang'] == '0'){
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td style="color: #ee3500; font-weight: bold;"><?php echo $resultDH_TG['user_nguoidung'] ?></td>
                                                <td><?php echo $resultDH_TG['thoigian_dathang'] ?></td>
                                                <td>
                                                    <a href="chiTietDonHang.php?thoigian_dathang=<?php echo $resultDH_TG['thoigian_dathang'] ?>&&ma_nguoidung=<?php echo $resultDH_TG['ma_nguoidung'] ?>">
                                                        <button type="button" class="btn btn_chitietdonhang">
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
                                                <th scope="row"><?php echo $i ?></th>
                                                <td style="font-weight: bold;"><?php echo $resultDH_TG['user_nguoidung'] ?></td>
                                                <td><?php echo $resultDH_TG['thoigian_dathang'] ?></td>
                                                <td>
                                                    <a href="chiTietDonHang.php?thoigian_dathang=<?php echo $resultDH_TG['thoigian_dathang'] ?>&&ma_nguoidung=<?php echo $resultDH_TG['ma_nguoidung'] ?>">
                                                        <button type="button" class="btn btn_chitietdonhang">
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