<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");
?>
<title>Tìm danh mục</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tukhoa']) && $_POST['tukhoa'] != NULL) {
                    $tukhoa = $_POST['tukhoa'];
                    $timkiem_danhmuc  = $danhMuc->timkiem_danhmuc($tukhoa);
                }
                ?>
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">THÊM LOẠI SẢN PHẨM</h3>
                </div>
                <div>
                    <form action="danhMucTraSua.php" method="POST">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Tên danh mục: </th>
                                    <td class="was-validated">
                                        <input type='text' class='form-control' required name="ten_danhmuc">
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
                <div class="container">
                    <div class="alert alert-primary mt-2" role="alert">
                        <h3 class="text-center">DANH SÁCH LOẠI SẢN PHẨM</h3>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="danhMucTraSua.php" class="col-2 mt-1">
                                <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                                    <i class="fas fa-angle-double-left"></i> Trở lại
                                </button>
                            </a>
                        </div>
                        <div class="col-6">
                            <nav class="navbar navbar-light">
                                <div style="width: 100%;">
                                    <form class="d-flex" action="timDanhMuc.php" method="POST">
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
                                <tr style="background-color: black;">
                                    <th scope="col" id="title_table">STT</th>
                                    <th scope="col" id="title_table">Tên</th>
                                    <th scope="col" id="title_table">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($timkiem_danhmuc) {
                                    $i = 0;
                                    while ($resultTK_DM = $timkiem_danhmuc->fetch_assoc()) {
                                        $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultTK_DM['ten_danhmuc'] ?></td>
                                                <td style="width: 15%;">
                                                    <a href="suaDanhMuc.php?ma_loai=<?php echo $resultTK_DM['ma_danhmuc'] ?>">
                                                        <button type="button" class="btn sua">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultTK_DM['ten_danhmuc'] ?> không?')" href="danhMucTraSua.php?maXoa=<?php echo $resultTK_DM['ma_danhmuc'] ?>">
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