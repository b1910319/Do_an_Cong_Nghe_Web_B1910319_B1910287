<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");

?>
<title>Sửa thông tin trà sữa</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <div class="alert alert-primary row mt-2" role="alert">
                    <a href="danhSachTraSua.php" class="col-2 mt-1">
                        <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                            <i class="fas fa-angle-double-left"></i> Trở lại
                        </button>
                    </a>
                    <h3 class="col-10 text-center">SỬA THÔNG TIN TRÀ SỮA</h3>
                </div>
                <?php
                    if (isset($_GET['ma_trasua']) && $_GET['ma_trasua'] != NULL) {
                        $ma_trasua = $_GET['ma_trasua'];
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sua'])) {
                            $update_trasua = $traSua->update_trasua($_POST, $_FILES, $ma_trasua);
                            if ($update_trasua) {
                                echo $update_trasua;
                            }
                        }
                    }
                ?>
                <div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <?php
                            $show_trasua_ma = $traSua->show_trasua_ma($ma_trasua);
                            if ($show_trasua_ma) {
                                $resultTS_ma = $show_trasua_ma->fetch_assoc();
                                ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Tên trà sữa: </th>
                                            <td class="was-validated">
                                                <input type='text' class='form-control' required name="ten_trasua" value="<?php echo $resultTS_ma['ten_trasua'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gía: </th>
                                            <td class="was-validated">
                                                <input type='text' class='form-control' required name="gia_trasua" value="<?php echo $resultTS_ma['gia_trasua'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Danh mục: </th>
                                            <td>
                                                <select class="custom-select" name="ma_danhmuc">
                                                    <option>Chọn ......</option>
                                                    <?php
                                                        $show_danhmuc = $danhMuc->show_danhmuc();
                                                        if ($show_danhmuc) {
                                                            while ($resultDM = $show_danhmuc->fetch_assoc()) {
                                                            ?>
                                                                <option <?php
                                                                        if ($resultDM['ma_danhmuc'] == $resultTS_ma['ma_danhmuc']) {
                                                                            echo 'selected';
                                                                        }
                                                                        ?> value="<?php echo $resultDM['ma_danhmuc'] ?>"><?php echo $resultDM['ten_danhmuc'] ?>
                                                                </option>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hình ảnh sản phẩm: </th>
                                            <td class="was-validated">
                                                <input type='file' required name="hinhanh_trasua">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <img  name="hinhanh_trasua" src="uploads/<?php echo $resultTS_ma['hinhanh_trasua'] ?>" width="100px">
                                            </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tóm tắt: </th>
                                            <td class="was-validated">
                                                <textarea name="tomtat_trasua" id="" cols="60" rows="10"><?php echo $resultTS_ma['tomtat_trasua'] ?></textarea>
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
        <!-- trình soạn thảo  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> -->
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('tomtat_trasua');
    </script>
    <!--  -->
</body>

</html>