<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ("include/link.php");
    ?>
    <title>Thông tin người dùng</title>
</head>
<body>
    <div class="container-fulid">
        <?php
            include("include/header.php");
        ?>
        <div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h3 class="text-center">
                    THÔNG TIN NGƯỜI DÙNG
                </h3>
            </div>
            <table class="table">
                <?php
                    $login_ma = Session::get('login_ma');
                    $show_thongTin = $nguoiDung->show_thongTin($login_ma);
                    if ($show_thongTin){
                        while ($resultND= $show_thongTin->fetch_assoc()){
                            ?>
                                <tbody>
                                    <tr>
                                        <th scope="row">Họ tên: </th>
                                        <td><?php echo $resultND['hoten_nguoidung'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Số điện thoại: </th>
                                        <td><?php echo $resultND['sdt_nguoidung'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tên đăng nhập: </th>
                                        <td><?php echo $resultND['user_nguoidung'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Địa chỉ</th>
                                        <td><?php echo $resultND['diachi_nguoidung'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center " colspan="2">
                                            <a href="suaThongTinNguoiDung.php">
                                                <button class="btn btn-primary " style="width: 30%; background-color: #eb3007; border: none; font-weight: bold;">Update</button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
        <div class="footer">
            <?php
                include("include/footer.php");
            ?>
        </div>
    </div>
</body>
</html>