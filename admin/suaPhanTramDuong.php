<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");

?>
<title>Sửa phần trăm đường</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <div class="alert alert-primary row mt-2" role="alert">
                    <a href="phanTramDuong.php" class="col-2 mt-1">
                        <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                            <i class="fas fa-angle-double-left"></i> Trở lại
                        </button>
                    </a>
                    <h3 class="col-10 text-center">SỬA PHẦN TRĂM ĐƯỜNG</h3>
                </div>
                <?php
                if (isset($_GET['ma_duong']) && $_GET['ma_duong'] != NULL) {
                    $ma_duong = $_GET['ma_duong'];
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sua'])) {
                        $phantram_duong = $_POST['phantram_duong'];
                        $update_duong = $duong->update_duong($phantram_duong, $ma_duong);
                        if ($update_duong) {
                            echo $update_duong;
                        }
                    }
                }
                ?>
                <div>
                    <form action="" method="POST">
                        <table class="table">
                            <?php
                            $show_duong_ma = $duong->show_duong_ma($ma_duong);
                            if ($show_duong_ma) {
                                $resultD_ma = $show_duong_ma->fetch_assoc();
                                ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Phần trăm đường: </th>
                                            <td class="was-validated">
                                                <input type='text' class='form-control' required name="phantram_duong" value="<?php echo $resultD_ma['phantram_duong'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <button type="submit" class="btn btn-outline-danger font-weight-bold" name="sua">
                                                    <i class="fas fa-pen"></i>
                                                    Sửa
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </form>
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