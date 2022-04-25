<!DOCTYPE html>
<html lang="en">
<?php
    include("include/link.php");

?>
<title>Phần trăm đá</title>

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
                    $phantram_da = $_POST['phantram_da'];
                    $inset_da = $da->insert_da($phantram_da);
                }
                if (isset($_GET['maXoa'])) {
                    $maXoa = $_GET['maXoa'];
                    $delete_da = $da->delete_da($maXoa);
                }
                ?>
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">THÊM PHẦN TRĂM ĐÁ</h3>
                </div>
                <div>
                    <form action="phanTramDa.php" method="POST">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Phần trăm đá: </th>
                                    <td class="was-validated">
                                        <input type='text' class='form-control' required name="phantram_da" style="width: 50%;">
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
                        <h3 class="text-center">PHẦN TRĂM ĐÁ</h3>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <nav class="navbar navbar-light">
                                <div style="width: 100%;">
                                    <form class="d-flex" action="timPhanTramDa.php" method="POST">
                                        <input name="tukhoa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <?php
                    if (isset($delete_da)) {
                        echo $delete_da;
                    }
                    ?>
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr style="background-color: black;">
                                    <th scope="col" id="title_table">STT</th>
                                    <th scope="col" id="title_table">Phần trăm đá</th>
                                    <th scope="col" id="title_table">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $show_da = $da->show_da();
                                if ($show_da) {
                                    $i = 0;
                                    while ($resultDa = $show_da->fetch_assoc()) {
                                        $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultDa['phantram_da'] ?></td>
                                                <td style="width: 15%;">
                                                    <a href="suaPhanTramDa.php?ma_da=<?php echo $resultDa['ma_phantramda'] ?>">
                                                        <button type="button" class="btn sua">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultDa['phantram_da'] ?> không?')" href="?maXoa=<?php echo $resultDa['ma_phantramda'] ?>">
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