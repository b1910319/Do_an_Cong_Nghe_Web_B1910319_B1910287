<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");

?>
<title>Tìm phần trăm đường</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <div class="container">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tukhoa']) && $_POST['tukhoa'] != NULL) {
                        $tukhoa = $_POST['tukhoa'];
                        $timkiem_duong  = $duong->timkiem_duong($tukhoa);
                    }
                    ?>
                    <div class="alert alert-primary mt-2" role="alert">
                        <h3 class="text-center">PHẦN TRĂM ĐƯỜNG</h3>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="phanTramDuong.php" class="col-2 mt-1">
                                <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                                    <i class="fas fa-angle-double-left"></i> Trở lại
                                </button>
                            </a>
                        </div>
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
                                if ($timkiem_duong) {
                                    $i = 0;
                                    while ($resultTK_D = $timkiem_duong->fetch_assoc()) {
                                        $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultTK_D['phantram_duong'] ?></td>
                                                <td style="width: 15%;">
                                                    <a href="suaPhanTramDuong.php?ma_duong=<?php echo $resultTK_D['ma_phantramduong'] ?>">
                                                        <button type="button" class="btn sua">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultTK_D['phantram_duong'] ?> không?')" href="phanTramDuong.php?maXoa=<?php echo $resultTK_D['ma_phantramduong'] ?>">
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