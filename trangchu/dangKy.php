<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("include/link.php");
    ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Đăng ký</title>
</head>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dangky'])) {
        $inset_nguoidung = $nguoiDung->insert_nguoidung($_POST);
    }
?>
<body>
    <div class="container-fulid">
        <?php
        include("include/header.php");
        ?>
        <div class="container mt-3">

            <section class="login-block">
                <div class="container1">
                    <div class="row">
                        <div class="col-md-4 login-sec">
                            <h2 class="text-center">Đăng ký</h2>
                            <form action="" class="login-form" method="POST">
                                <?php
                                    if (isset($inset_nguoidung)) {
                                        echo $inset_nguoidung;
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                                    <input type="text" class="form-control" name="user_nguoidung">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                                    <input type="password" class="form-control" name="pass_nguoidung">
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-uppercase">Họ Tên</label>
                                    <input type="text" class="form-control" name="hoten_nguoidung">
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-uppercase">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt_nguoidung">
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-uppercase">Địa chỉ</label>
                                    <input type="text" class="form-control" name="diachi_nguoidung">
                                </div>
                                <div class="form-check">
                                    <button type="submit" class="btn btn-login float-right" name="dangky">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 banner-sec">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</body>

</html>