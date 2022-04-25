<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");

?>
<title>Sửa phần trăm đá</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <div class="alert alert-primary row mt-2" role="alert">
                    <a href="phanTramDa.php" class="col-2 mt-1">
                        <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                            <i class="fas fa-angle-double-left"></i> Trở lại
                        </button>
                    </a>
                    <h3 class="col-10 text-center">SỬA PHẦN TRĂM ĐÁ</h3>
                </div>
                <?php
                if (isset($_GET['ma_da']) && $_GET['ma_da'] != NULL) {
                    $ma_da = $_GET['ma_da'];
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sua'])) {
                        $phantram_da = $_POST['phantram_da'];
                        $update_da = $da->update_da($phantram_da, $ma_da);
                        if ($update_da) {
                            echo $update_da;
                        }
                    }
                }
                ?>
                <div>
                    <form action="" method="POST">
                        <table class="table">
                            <?php
                            $show_da_ma = $da->show_da_ma($ma_da);
                            if ($show_da_ma) {
                                $resultDa_ma = $show_da_ma->fetch_assoc();
                                ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Phần trăm đá: </th>
                                            <td class="was-validated">
                                                <input type='text' class='form-control' required name="phantram_da" value="<?php echo $resultDa_ma['phantram_da'] ?>">
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