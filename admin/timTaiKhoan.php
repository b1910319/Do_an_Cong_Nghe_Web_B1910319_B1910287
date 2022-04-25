
<!DOCTYPE html>
<html lang="en">
<?php
include("include/link.php");

?>
<title>Tìm tài khoản khách</title>

<body>
    <div id="wrapper">
        <?php
        include("include/header.php");
        include("include/leftMenu.php");
        ?>
        <div class="content-page">
            <div class="container">
                <?php
                    if(isset($_POST['tukhoa']) && $_POST['tukhoa'] != NULL){
                        $tukhoa = $_POST['tukhoa'];
                        ?>
                            <div class="alert alert-primary mt-2" role="alert">
                                <h3 class="text-center">KẾT QUẢ TÌM KIẾM VỚI TỪ KHÓA "<?php echo $tukhoa ?>"</h3>
                            </div>
                        <?php
                    }
                ?>
                <div class="row">
                    <div class="col-8">
                        <a href="danhSachNguoiDung.php" class="col-2 mt-2" >
                            <button type="button" class="btn btn-outline-success" style="font-weight: bold;">
                                <i class="fas fa-angle-double-left"></i> Trở lại
                            </button>
                        </a>
                    </div>
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
                                if(isset($_POST['tukhoa']) && $_POST['tukhoa'] != NULL){
                                    $tukhoa = $_POST['tukhoa'];
                                    $timkiem_taikhoan = $nguoiDung->timkiem_taikhoan($tukhoa);
                                }
                                if ($timkiem_taikhoan){
                                    $i=0;
                                    while($resultTim_ND = $timkiem_taikhoan->fetch_assoc()){
                                        $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $resultTim_ND['user_nguoidung'] ?></td>
                                                <td><?php echo $resultTim_ND['hoten_nguoidung'] ?></td>
                                                <td><?php echo $resultTim_ND['sdt_nguoidung'] ?></td>
                                                <td><?php echo $resultTim_ND['diachi_nguoidung'] ?></td>
                                                <td>
                                                    <a onclick="return confirm('Bạn có muốn xóa <?php echo $resultTim_ND['user_nguoidung'] ?> không?')" href="danhSachNguoiDung.php?maXoa=<?php echo $resultTim_ND['ma_nguoidung'] ?>">
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