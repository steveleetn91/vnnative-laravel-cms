<?php 
namespace App\Helpers\AdminUser;
if(!class_exists('AdminUserRoleHelper')) {
    class AdminUserRoleHelper {
        public static function setupAccountUser(){
            return json_encode([
                "role_add_post" => 0,
                "role_update_post" => 0,
                "role_delete_post" => 0,
                "role_see_post" => 0,
                "role_add_page" => 0,
                "role_update_page" => 0,
                "role_delete_page" => 0,
                "role_see_page" => 0,
                "role_add_category" => 0,
                "role_update_category" => 0,
                "role_delete_category" => 0,
                "role_see_category" => 0,
                "role_update_setting" => 0,
                "role_builder_menu" => 0,
                "role_manager_user" => 0,
                "role_active" => 0
            ]);
        }
        /**
         * Admin
         */
        public static function setupAccountAdmin(){
            return json_encode([
                "role_add_post" => 1,
                "role_update_post" => 1,
                "role_delete_post" => 1,
                "role_see_post" => 1,
                "role_add_page" => 1,
                "role_update_page" => 1,
                "role_delete_page" => 1,
                "role_see_page" => 1,
                "role_add_category" => 1,
                "role_update_category" => 1,
                "role_delete_category" => 1,
                "role_see_category" => 1,
                "role_update_setting" => 1,
                "role_builder_menu" => 1,
                "role_manager_user" => 1,
                "role_active" => 1
            ]);
        }
        /**
         * Update Roles
         */
        public static function updateAccountRoles($data = array()){
            return json_encode([
                "role_add_post" => !empty($data['role_add_post']) ? 1 : 0,
                "role_update_post" => !empty($data['role_update_post']) ? 1 : 0,
                "role_delete_post" => !empty($data['role_delete_post']) ? 1 : 0,
                "role_see_post" => !empty($data['role_see_post']) ? 1 : 0,
                "role_add_page" => !empty($data['role_add_page']) ? 1 : 0,
                "role_update_page" => !empty($data['role_update_page']) ? 1 : 0,
                "role_delete_page" => !empty($data['role_delete_page']) ? 1 : 0,
                "role_see_page" => !empty($data['role_see_page']) ? 1 : 0,
                "role_add_category" => !empty($data['role_add_category']) ? 1 : 0,
                "role_update_category" => !empty($data['role_update_category']) ? 1 : 0,
                "role_delete_category" => !empty($data['role_delete_category']) ? 1 : 0,
                "role_see_category" => !empty($data['role_see_category']) ? 1 : 0,
                "role_update_setting" => !empty($data['role_update_setting']) ? 1 : 0,
                "role_builder_menu" => !empty($data['role_builder_menu']) ? 1 : 0,
                "role_manager_user" => !empty($data['role_manager_user']) ? 1 : 0,
                "role_active" => !empty($data['role_active']) ? 1 : 0
            ]);
        }
        /**
         * @return Array
         * type : false is object , true is array 
         */
        public static function rolesArray($json,$type = false){
            return json_decode($json,$type);
        }
    }
}