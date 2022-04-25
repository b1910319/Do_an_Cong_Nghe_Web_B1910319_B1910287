<!DOCTYPE html>
<html lang="en">
<?php
    include("include/link.php");
?>
<title>Danh sách trà sữa</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['them'])) {
                    $inset_trasua = $traSua->insert_trasua($_POST, $_FILES);
                }
                if (isset($_GET['maXoa'])) {
                    $maXoa = $_GET['maXoa'];
                    $delete_trasua = $traSua->delete_trasua($maXoa);
                }
                ?>
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">THÊM THÔNG TIN TRÀ SỮA</h3>
                </div>
                <div>
                    <form action="danhSachTraSua.php" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Tên trà sữa: </th>
                                    <td class="was-validated">
                                        <input type='text' class='form-control' required name="ten_trasua">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Gía: </th>
                                    <td class="was-validated">
                                        <input type='text' class='form-control' required name="gia_trasua">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Danh mục: </th>
                                    <td>
                                        <select class="custom-select" name="ma_danhmuc">
                                            <option>Chọn......</option>
                                            <?php
                                            $show_danhmuc = $danhMuc->show_danhmuc();
                                            if ($show_danhmuc) {
                                                while ($resultDM = $show_danhmuc->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $resultDM['ma_danhmuc'] ?>"><?php echo $resultDM['ten_danhmuc'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tóm tắt: </th>
                                    <td class="was-validated">
                                        <textarea name="tomtat_trasua" id="" cols="60" rows="10" placeholder="Tóm tắt"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Hình ảnh sản phẩm: </th>
                                    <td class="was-validated">
                                        <input type='file' required name="hinhanh_trasua">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button name="them" type="submit" class="btn btn-outline-danger font-weight-bold">
                                            <i class="fas fa-plus-square"></i>
                                            Thêm
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">TRÀ SỮA</h3>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <nav class="navbar navbar-light">
                            <div style="width: 100%;">
                                <form class="d-flex" action="timTraSua.php" method="POST">
                                    <input name="tukhoa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <?php
                    if (isset($delete_trasua)) {
                        echo $delete_trasua;
                    }
                ?>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr style="background-color: black;">
                                <th scope="col" id="title_table">STT</th>
                                <th scope="col" id="title_table">Tên sản phẩm</th>
                                <th scope="col" id="title_table">Gía</th>
                                <th scope="col" id="title_table">Hình ảnh</th>
                                <th scope="col" id="title_table">Tóm tắt</th>
                                <th scope="col" id="title_table">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $show_trasua = $traSua->show_trasua();
                                if ($show_trasua) {
                                    $i = 0;
                                    while ($resultTS = $show_trasua->fetch_assoc()) {
                                        $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultTS['ten_trasua'] ?></td>
                                                <td><?php echo number_format($resultTS['gia_trasua'], 0, ',', '.') . ' <sup>đ</sup>' ?></td>
                                                <td>
                                                    <img src="uploads/<?php echo $resultTS['hinhanh_trasua'] ?>" width="100px">
                                                </td>
                                                <td><?php echo $resultTS['tomtat_trasua'] ?> </td>
                                                <td style="width: 15%;">
                                                    <a href="suaTraSua.php?ma_trasua=<?php echo $resultTS['ma_trasua'] ?>">
                                                        <button type="button" class="btn sua">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultTS['ten_trasua'] ?> không?')" href="?maXoa=<?php echo $resultTS['ma_trasua'] ?>">
                                                        <button type="button" class="btn xoa">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </a>
                                                </td>
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