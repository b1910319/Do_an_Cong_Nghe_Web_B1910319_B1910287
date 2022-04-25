<?php
    class fomat{
        // định dạng ngày
        public function formatDate($date){
            return date('F j, Y, g:i a', strtotime($date));
        }
        // kiểm tra kí tự có hợp lệ không
        public function validation ($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        public function title (){
            $path = $_SERVER['SCRIPT_FILENAME'];
            $title = basename($path, '.php');
            if ($title == 'index'){
                $title = 'home';
            } elseif ($title == 'contact'){
                $title = 'contact';
            }
            return $title = ucfirst($title);
        }
        //chuyển chữ có dấu thành không dấu
        public function stripUnicode($str){
            if(!$str) return false;
            $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            );
            foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
            return $str;
        }
    }
?>