<!DOCTYPE html>
<html lang="en">
<?php
    include("include/link.php");
?>
<title>Phần trăm đường</title>

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
                    $phantram_duong = $_POST['phantram_duong'];
                    $inset_duong = $duong->insert_duong($phantram_duong);
                }
                if (isset($_GET['maXoa'])) {
                    $maXoa = $_GET['maXoa'];
                    $delete_duong = $duong->delete_duong($maXoa);
                }
                ?>
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">THÊM PHẦN TRĂM ĐƯỜNG</h3>
                </div>
                <div>
                    <form action="phanTramDuong.php" method="POST">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Phần trăm đường: </th>
                                    <td class="was-validated">
                                        <input type='text' class='form-control' required name="phantram_duong" style="width: 50%;">
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
                        <h3 class="text-center">PHẦN TRĂM ĐƯỜNG</h3>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <nav class="navbar navbar-light">
                                <div style="width: 100%;">
                                    <form class="d-flex" action="timPhanTramDuong.php" method="POST">
                                        <input name="tukhoa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <?php
                    if (isset($delete_duong)) {
                        echo $delete_duong;
                    }
                    ?>
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr style="background-color: black;">
                                    <th scope="col" id="title_table">STT</th>
                                    <th scope="col" id="title_table">Phần trăm đường</th>
                                    <th scope="col" id="title_table">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $show_duong = $duong->show_duong();
                                if ($show_duong) {
                                    $i = 0;
                                    while ($resultD = $show_duong->fetch_assoc()) {
                                        $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultD['phantram_duong'] ?></td>
                                                <td style="width: 15%;">
                                                    <a href="suaPhanTramDuong.php?ma_duong=<?php echo $resultD['ma_phantramduong'] ?>">
                                                        <button type="button" class="btn sua">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultD['phantram_duong'] ?> không?')" href="?maXoa=<?php echo $resultD['ma_phantramduong'] ?>">
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