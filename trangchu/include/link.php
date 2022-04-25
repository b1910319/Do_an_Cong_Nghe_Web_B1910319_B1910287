    <?php
        include("../lib/session.php");
        Session::init();
    ?>
    <?php
        include("../class/nguoiDung.php");
        $nguoiDung = new nguoiDung();
        include("../class/danhMuc.php");
        $danhMuc = new danhMuc();
        include("../class/da.php");
        $da = new da();
        include("../class/duong.php");
        $duong = new duong();
        include("../class/traSua.php");
        $traSua = new traSua();
        include("../class/gioHang.php");
        $gioHang = new gioHang();
        include("../class/donHang.php");
        $donHang = new donHang();
        include("../class/thongKe.php");
        $thongKe = new thongKe();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- link icon  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">