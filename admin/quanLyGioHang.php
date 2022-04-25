
<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");

?>
<title>Quản lý giỏ hàng</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">GIỎ HÀNG</h3>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <nav class="navbar navbar-light">
                            <div style="width: 100%;">
                                <form class="d-flex" action="" method="POST">
                                    <input name="tukhoa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Username</th>
                                <th scope="col">Tên trà sữa</th>
                                <th scope="col">Phần trăm đá</th>
                                <th scope="col">Phần trăm đường</th>
                                <th scope="col">Số lượng đặt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $show_all_giohang = $gioHang->show_all_giohang();
                                if ($show_all_giohang){
                                    $i=0;
                                    while($resultAll_GH = $show_all_giohang->fetch_assoc()){
                                        $i++;
                                        $show_thongTin = $nguoiDung->show_thongTin($resultAll_GH['ma_nguoidung']);
                                        if ($show_thongTin){
                                            $resultND = $show_thongTin->fetch_assoc();
                                        }
                                        $show_trasua_ma= $traSua->show_trasua_ma($resultAll_GH['ma_trasua']);
                                        if($show_trasua_ma){
                                            $resultTS = $show_trasua_ma->fetch_assoc();
                                        }
                                        $show_da_ma = $da->show_da_ma($resultAll_GH['ma_phantramda']);
                                        if ($show_da_ma){
                                            $resultD = $show_da_ma->fetch_assoc();
                                        }
                                        $show_duong_ma = $duong->show_duong_ma($resultAll_GH['ma_phamtramduong']);
                                        if ($show_duong_ma){
                                            $resultDuong = $show_duong_ma->fetch_assoc();
                                        }
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultND['user_nguoidung'] ?></td>
                                                <td><?php echo $resultTS['ten_trasua'] ?></td>
                                                <td><?php echo $resultD['phantram_da'] ?></td>
                                                <td> <?php echo $resultDuong['phantram_duong'] ?></td>
                                                <td><?php echo $resultAll_GH['soluong_dat'] ?></td>
                                            </tr>
                                        <?php
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