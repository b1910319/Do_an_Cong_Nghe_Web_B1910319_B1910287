<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
?>
<?php
    class nguoiDung{
        private $database ;
        private $format;
        public function __construct()
        {
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function insert_nguoidung($data){
            $user_nguoidung = mysqli_real_escape_string($this->database->link, $data['user_nguoidung']);
            $pass_nguoidung = mysqli_real_escape_string($this->database->link, md5($data['pass_nguoidung']));
            $hoten_nguoidung = mysqli_real_escape_string($this->database->link, $data['hoten_nguoidung']);
            $sdt_nguoidung = mysqli_real_escape_string($this->database->link, $data['sdt_nguoidung']);
            $diachi_nguoidung = mysqli_real_escape_string($this->database->link, $data['diachi_nguoidung']);
            if(empty($user_nguoidung) || empty($pass_nguoidung) || 
            empty($hoten_nguoidung)||empty($sdt_nguoidung) || 
            empty($diachi_nguoidung)){
                $alert = '<span style="color: #eb3007; font-weight: bold;">Các trường không được trống</span>';
                return $alert;
            } else{
                $check_user = "SELECT * FROM `nguoidung` WHERE 	user_nguoidung='$user_nguoidung' LIMIT 1 ";
                $resultcheck = $this->database->select($check_user);
                if ($resultcheck){
                    $alert = '<span style="color: #eb3007;">Username đã tồn tại vui lòng đặt lại</span>';
                    return $alert;
                } else{
                    $query = "INSERT INTO `nguoidung`( `user_nguoidung`, `pass_nguoidung`, 
                    `hoten_nguoidung`, `sdt_nguoidung`, `diachi_nguoidung`) 
                    VALUES ('$user_nguoidung','$pass_nguoidung','$hoten_nguoidung','$sdt_nguoidung','$diachi_nguoidung')";
                    $result = $this->database->insert($query);
                    if($result){
                        $alert = '<span style=" color: black; font-weight: bold;">Tài khoản của quý khách đã đăng ký thành công</span>';
                        return $alert;
                    } else{
                        $alert = '<span style="color: black; font-weight: bold;">Tài khoản của quý khách đăng ký không thành công vui lòng kiểm tra lại thông tin</span>';
                        return $alert;
                    }
                }
            }
        }
        public function login_nguoidung($data){
            $user_nguoidung = mysqli_real_escape_string($this->database->link, $data['user_nguoidung']);
            $pass_nguoidung = mysqli_real_escape_string($this->database->link, md5($data['pass_nguoidung']));
            if($user_nguoidung == ' ' || $pass_nguoidung == ' '){
                $alert = '<span style="color: #eb3007; font-weight: bold;">Username và Password không được trống</span>';
                return $alert;
            } else{
                $check_login = "SELECT * FROM `nguoidung` WHERE  user_nguoidung='$user_nguoidung' AND pass_nguoidung = '$pass_nguoidung' ";
                $resultcheck = $this->database->select($check_login);
                if ($resultcheck!= false){
                    $resultlogin = $resultcheck->fetch_assoc();
                    Session::set('login_nguoidung', true);
                    Session::set('login_ma', $resultlogin['ma_nguoidung']);
                    Session::set('login_ten', $resultlogin['hoten_nguoidung']);
                    Session::set('login_user', $resultlogin['user_nguoidung']);
                    header("location: index.php");
                } else{
                    $alert = '<span style="color: #eb3007;  font-weight: bold;">Username hoặc Password sai quy khách vui lòng đặt lại</span>';
                    return $alert;
                }
            }
        }
        public function show_thongTin($ma_nguoidung){
            $query = "SELECT * FROM `nguoidung` WHERE ma_nguoidung = '$ma_nguoidung'";
            $result= $this ->database->select($query);
            return $result;
        }
        public function show_nguoidung(){
            $query = "SELECT * FROM `nguoidung` ORDER BY ma_nguoidung desc";
            $result= $this ->database->select($query);
            return $result;
        }
        public function update_info_nguoidung($data,$login_ma){
            $hoten_nguoidung = mysqli_real_escape_string($this->database->link, $data['hoten_nguoidung']);
            $sdt_nguoidung = mysqli_real_escape_string($this->database->link, $data['sdt_nguoidung']);
            $diachi_nguoidung = mysqli_real_escape_string($this->database->link, $data['diachi_nguoidung']);
            $login_ma = mysqli_real_escape_string($this->database->link, $login_ma);
            if(empty($hoten_nguoidung) || empty($sdt_nguoidung) || 
            empty($diachi_nguoidung)){
                $alert = '<span style="color: #eb3007; font-weight: bold;">Các trường không được trống</span>';
                return $alert;
            } else{
                    $query = "UPDATE `nguoidung` SET `hoten_nguoidung`='$hoten_nguoidung',
                    `sdt_nguoidung`='$sdt_nguoidung',`diachi_nguoidung`='$diachi_nguoidung' 
                    WHERE ma_nguoidung = '$login_ma'";
                    $result = $this->database->insert($query);
                    if($result){
                        header("location: thongTinNguoiDung.php");
                    } else{
                        $alert = '<span style="color: #eb3007; font-weight: bold;">Thông tin của quý khách sửa không thành công vui lòng kiểm tra lại thông tin</span>';
                        return $alert;
                    }
            }
        }
        public function timkiem_taikhoan($tukhoa){
            $query = "SELECT * FROM  `nguoidung` WHERE user_nguoidung LIKE '%".$tukhoa."%' ";
            $result = $this ->database->select($query);
            return $result;
        }
        public function delete_nguoidung($maXoa){
            $query = "DELETE FROM `nguoidung` WHERE ma_nguoidung = '$maXoa'";
            $result = $this->database->delete($query);
            if($result){
                $alert = '<span style="color: #038018; font-weight: bold;">Người dùng xóa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Người dùng xóa không thành công</span>';
                return $alert;
            }
        }
    }
?>