<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ("include/link.php");
    ?>
    <title>Sửa thông tin người dùng</title>
</head>
<body>
    <div class="container-fulid">
        <?php
            include("include/header.php");
        ?>
        <div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h3 class="text-center">
                    SỬA THÔNG TIN NGƯỜI DÙNG
                </h3>
            </div>
            <form action="" method="POST">
                <table class="table">
                    <?php
                        $login_ma = Session::get('login_ma');
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
                            $update_info_nguoidung = $nguoiDung->update_info_nguoidung($_POST,$login_ma);
                        }
                    ?>
                    <?php
                        if (isset($update_info_nguoidung)){
                            echo $update_info_nguoidung;
                        }
                    ?>
                    <?php
                        $login_ma = Session::get('login_ma');
                        $show_thongTin = $nguoiDung->show_thongTin($login_ma);
                        if ($show_thongTin){
                            while ($resultND = $show_thongTin->fetch_assoc()){
                                ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Họ tên: </th>
                                            <td><input class="boder-none" type="text" name="hoten_nguoidung" value="<?php echo $resultND['hoten_nguoidung'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Số điện thoại: </th>
                                            <td><input class="boder-none" type="text" name="sdt_nguoidung" value="<?php echo $resultND['sdt_nguoidung'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Địa chỉ</th>
                                            <td><input class="boder-none" type="text" name="diachi_nguoidung" value="<?php echo $resultND['diachi_nguoidung'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <a href="thongTinNguoiDung.php">
                                                    <i class="fas fa-caret-left next-info"></i>
                                                </a>
                                            </td>
                                            <td >
                                                <input name="save" type="submit" class="btn btn-primary " value="Save" 
                                                style="width: 30%; background-color: #eb3007; border: none; font-weight: bold;">
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                            }
                        }
                    ?>
                </table>
            </form>
        </div>
        <div class="footer">
            <?php
                include("include/footer.php");
            ?>
        </div>
    </div>
</body>
</html>