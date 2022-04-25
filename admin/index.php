<!DOCTYPE html>
<html lang="en">
<?php
    include("include/link.php");

?>
<title>Admin</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class=" container">
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">THỐNG KÊ DOANH THU</h3>
                </div>
                <div id="myfirstchart" style="height: 250px;"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <button type="button" class="btn btn-warning">Thời gian thống kê</button>
                        <form action="thongKe.php" method="post">
                            <div class="row mt-3">
                                <div class="col-2">
                                    <button type="button" class="btn btn-success" style="width: 100%;">Từ ngày</button>
                                </div>
                                <div class="col-2">
                                    <select class="form-select" aria-label="Default select example" name="thongke_tu" style="width: 100%;">
                                        <?php
                                        $show_thongke = $thongKe->show_thongke();
                                        if ($show_thongke) {
                                            while ($resultNgay_TK = $show_thongke->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $resultNgay_TK['ngay_thongke'] ?>"><?php echo $resultNgay_TK['ngay_thongke'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-success" style="width: 100%;">Đến ngày</button>
                                </div>
                                <div class="col-2">
                                    <select class="form-select" aria-label="Default select example" name="thongke_den" style="width: 100%;">
                                        <?php
                                        $show_thongke = $thongKe->show_thongke();
                                        if ($show_thongke) {
                                            while ($resultNgay_TK = $show_thongke->fetch_assoc()) {
                                                ?>
                                                    <option value="<?php echo $resultNgay_TK['ngay_thongke'] ?>"><?php echo $resultNgay_TK['ngay_thongke'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-danger" style="width: 100%;" name="lietke">Liệt kê</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script>
        new Morris.Bar({
            element: 'myfirstchart',
            data: [
                <?php
                $thongke_danhthu_ngay = $thongKe->thongke_danhthu_ngay();
                if ($thongke_danhthu_ngay) {
                    while ($resultTK_DTN = $thongke_danhthu_ngay->fetch_assoc()) {
                        $ngay = $resultTK_DTN['ngay_thongke'];
                        $tongtien = $resultTK_DTN['tongtien_thongke'];
                        echo "{ year: '$ngay', value: $tongtien },";
                    }
                }
                ?>
            ],
            xkey: 'year',
            ykeys: ['value'],
            labels: ['Tổng tiền']
        });
    </script>
</body>

</html>