<?php 
namespace App\Helpers\Category;
if(!class_exists('CategoryHelper')) {
    class CategoryHelper {
        /**
         * @param 
         * categoryInput : input of form post
         * @return string
         * @return format : 1,2,3
         */
        public static function categorySelected($categoryInput){
            $data = '';
            if($categoryInput && count($categoryInput) >= 1 ) {
                foreach($categoryInput as $k => $v ) {
                    $data .= $v . ( $k + 1 == count($categoryInput) ? '' : ',' );
                }
            }
            return $data;
        }
        public static function categoryListId($data){
            if(empty($data)) {
                return [];
            }
            $data = explode(',',$data);
            return $data;
        }
    }
}