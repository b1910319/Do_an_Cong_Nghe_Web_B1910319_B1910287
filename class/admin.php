<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/session.php");
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
?>
<?php
    class admin{
        private $database ;
        private $format;
        public function __construct()
        {
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function login($user_admin, $pass_admin){
            $user_admin = $this->format->validation($user_admin);
            $pass_admin = $this->format->validation($pass_admin);
            $user_admin = mysqli_real_escape_string($this->database->link, $user_admin);
            $pass_admin = mysqli_real_escape_string($this->database->link, $pass_admin);
            if(empty($user_admin) || empty($pass_admin)){
                $alert = 'Username và Password không được trống';
                return $alert;
            } else{
                $query = "SELECT * FROM `admin` WHERE user_admin='$user_admin' AND pass_admin = '$pass_admin' LIMIT 1";
                $result = $this->database->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminLogin', true);
                    Session::set('admin_ma', $value['ma_admin']);
                    Session::set('admin_hoten', $value['hoten_admin']);
                    Session::set('admin_user', $value['user_admin']);
                    header("Location:index.php");
                }
                else{
                    $alert = 'Username hoặc Password sai bạn vui lòng nhập lại';
                    return $alert;
                }
            }
        }
    }
?>