<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("include/link.php");
    ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Đăng nhập</title>
</head>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dangnhap'])) {
        $login_nguoidung = $nguoiDung->login_nguoidung($_POST);
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
                    <div class="row" >
                        <div class="col-md-4 login-sec">
                            <h2 class="text-center">Đăng Nhập</h2>
                            <?php
                                if (isset($login_nguoidung)){
                                    echo $login_nguoidung;
                                }
                            ?>
                            <form class="login-form" method="POST" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                                    <input type="text" class="form-control" name="user_nguoidung">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                                    <input type="password" class="form-control" name="pass_nguoidung">
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        <small>Remember Me</small>
                                    </label>
                                    <button type="submit" class="btn btn-login float-right" name="dangnhap" style="font-weight: bold;">Đăng nhập</button>
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