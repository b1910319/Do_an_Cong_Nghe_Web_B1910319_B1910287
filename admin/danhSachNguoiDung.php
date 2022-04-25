
<!DOCTYPE html>
<html lang="en">
<?php
    include("include/link.php");
?>
<title>Danh sách người dùng</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <?php
            if (isset($_GET['maXoa']) && $_GET['maXoa']){
                $maXoa = $_GET['maXoa'];
                $delete_nguoidung = $nguoiDung->delete_nguoidung($maXoa);
            }
        ?>
        <div class="content-page">
            <div class="container">
                <div class="alert alert-primary mt-2" role="alert">
                    <h3 class="text-center">DANH SÁCH TÀI KHOẢN NGƯỜI DÙNG</h3>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <nav class="navbar navbar-light">
                            <div style="width: 100%;">
                                <form class="d-flex" action="timTaiKhoan.php" method="POST">
                                    <input name="tukhoa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <?php
                            if (isset($delete_nguoidung)){
                                echo $delete_nguoidung;
                            }
                        ?>
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Username</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $show_nguoidung = $nguoiDung->show_nguoidung();
                                if ($show_nguoidung){
                                    $i=0;
                                    while($resultND = $show_nguoidung->fetch_assoc()){
                                        $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultND['user_nguoidung'] ?></td>
                                                <td><?php echo $resultND['hoten_nguoidung'] ?></td>
                                                <td><?php echo $resultND['sdt_nguoidung'] ?></td>
                                                <td><?php echo $resultND['diachi_nguoidung'] ?></td>
                                                <td>
                                                    <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultND['user_nguoidung'] ?> không?')" href="?maXoa=<?php echo $resultND['ma_nguoidung'] ?>">
                                                        <button type="button" class="btn xoa" style="color: white;">
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
</body>

</html>