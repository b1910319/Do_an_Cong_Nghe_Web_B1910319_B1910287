
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Đăng nhập Admin</title>
</head>
<?php
    include_once("../class/admin.php");
    $admin = new admin();
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user_admin = $_POST['user_admin'];
        $pass_admin = md5($_POST['pass_admin']) ;
        $login = $admin->login($user_admin, $pass_admin);
    }
?>
<body>
    <!-- form đăng nhập của admin  -->
    <div class="container">
        <section id="content">
            <form action="dangNhap.php" method="POST">
                <h1>Đăng nhập</h1>
                <span style="color: #eb3007; font-weight: bold; ">
                    <?php
                        if (isset($login)){
                            echo $login;
                        }
                    ?>
                </span>
                <div>
                    <input type="text" placeholder="Username" id="username" name="user_admin" />
                </div>
                <div>
                    <input type="password" placeholder="Password" id="password" name="pass_admin" />
                </div>
                <div>
                    <input type="submit" value="Đăng nhập" />
                </div>
            </form>
        </section>
    </div>
</body>

</html>