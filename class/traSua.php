<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
?>
<?php
    class traSua{
        private $database ;
        private $format;
        public function __construct(){
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function insert_trasua($data, $files){
            $ten_trasua = mysqli_real_escape_string($this->database->link, $data['ten_trasua']);
            $gia_trasua = mysqli_real_escape_string($this->database->link, $data['gia_trasua']);
            $ma_danhmuc = mysqli_real_escape_string($this->database->link, $data['ma_danhmuc']);
            $tomtat_trasua = mysqli_real_escape_string($this->database->link, $data['tomtat_trasua']);
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['hinhanh_trasua']['name'];
            $file_size = $_FILES['hinhanh_trasua']['size'];
            $file_temp = $_FILES['hinhanh_trasua']['tmp_name'];
            $div = explode(' . ', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0 ,10). ' . ' .$file_ext;
            $uploaded_image = "uploads/" .$unique_image;
            if(empty($file_name) && empty($ten_sanpham)){
                $alert = '<span style="color: #eb3007; font-weight: bold;">Các trường không được trống</span>';
                return $alert;
            } else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO `trasua`(`ten_trasua`, `ma_danhmuc`, 
                `hinhanh_trasua`, `gia_trasua`, `tomtat_trasua`) 
                VALUES ('$ten_trasua','$ma_danhmuc','$unique_image','$gia_trasua','$tomtat_trasua')";
                $result = $this->database->insert($query);
            }
        }
        public function show_trasua(){
            $query = "SELECT * FROM `trasua`  ORDER BY ma_trasua desc";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_trasua_moi(){
            $query = "SELECT * FROM `trasua`  ORDER BY ma_trasua desc limit 10";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_trasua_ma($ma_trasua){
            $query = "SELECT * FROM `trasua` WHERE ma_trasua= '$ma_trasua'  LIMIT 1";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_trasua_danhmuc($ma_danhmuc){
            $query = "SELECT * FROM `trasua` WHERE ma_danhmuc= '$ma_danhmuc' ";
            $result = $this->database->select($query);
            return $result;
        }
        public function update_trasua($data, $files, $ma_trasua){
            $ten_trasua = mysqli_real_escape_string($this->database->link, $data['ten_trasua']);
            $gia_trasua = mysqli_real_escape_string($this->database->link, $data['gia_trasua']);
            $ma_danhmuc = mysqli_real_escape_string($this->database->link, $data['ma_danhmuc']);
            $tomtat_trasua = mysqli_real_escape_string($this->database->link, $data['tomtat_trasua']);
            $ma_trasua = mysqli_real_escape_string($this->database->link, $ma_trasua);
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['hinhanh_trasua']['name'];
            $file_size = $_FILES['hinhanh_trasua']['size'];
            $file_temp = $_FILES['hinhanh_trasua']['tmp_name'];
            $div = explode(' . ', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0 ,10). ' . ' .$file_ext;
            $uploaded_image = "uploads/" .$unique_image;
            if( empty($ten_trasua) || empty($gia_trasua) || empty($ma_danhmuc) || empty($tomtat_trasua)){
                $alert = '<span style="color: #eb3007; font-weight: bold;">Các trường không được trống</span>';
                return $alert;
            }
            else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE `trasua` SET`ten_trasua`='$ten_trasua',
                `ma_danhmuc`='$ma_danhmuc',`hinhanh_trasua`='$unique_image',
                `gia_trasua`='$gia_trasua',`tomtat_trasua`='$tomtat_trasua' WHERE ma_trasua = '$ma_trasua'";
                $result = $this->database->update($query);
                if($result  != NULL){
                    $alert = '<span style="color: #038018; font-weight: bold;">Thông tin trà sữa được sửa thành công</span>';
                    return $alert;
                } else{
                    $alert = '<span style="color: #eb3007; font-weight: bold;">Thông tin trà sữa sửa không thành công</span>';
                    return $alert;
                }
            }
        }
        public function delete_trasua($maXoa){
            $query = "DELETE FROM `trasua` WHERE ma_trasua = '$maXoa'";
            $result = $this->database->delete($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Thông tin trà sữa được xóa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Thông tin trà sữa xóa không thành công</span>';
                return $alert;
            }
        }
        public function timkiem_trasua($tukhoa){
            $query = "SELECT * FROM `trasua` WHERE ten_trasua LIKE '%".$tukhoa."%' ";
            $result = $this ->database->select($query);
            return $result;
        }
    }
?>