<?php

use Carbon\Carbon;

    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
    include_once($filepath."/../lib/Carbon-2.57.0/autoload.php");
?>
<?php
    class thongKe{
        private $database ;
        private $format;
        public function __construct()
        {
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function show_thongke(){
            $query = "SELECT * FROM `thongke` order by ngay_thongke desc ";
            $result = $this->database->select($query);
            return $result;
        }
        public function thongke_danhthu_ngay (){
            $query = "SELECT * FROM thongke ";
            $result = $this->database->select($query);
            return $result;
        }
        public function thongke_dieukien ($thongke_tu, $thongke_den){
            $query = "SELECT * FROM thongke WHERE ngay_thongke BETWEEN '$thongke_tu' AND '$thongke_den'  ";
            $result = $this->database->select($query);
            return $result;
        }
    }
?>