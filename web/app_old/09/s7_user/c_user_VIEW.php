<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */
if ($isRun) {

    //  Table
    $varProdID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            SELECT `user_id`, `user_login`, `user_name`,
                `user_last_ip`, `user_last_login`, 
                `user_is_login`, `user_is_locked`, 
                `user_is_deleted`, `user_is_suspend`, 
                `user_type`
            FROM `10sys_rec__user_id` 
            WHERE `user_id` = '%s' ;", $varProdID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $tmpLastLogin = $row['user_last_ip'] .'/'.$row['user_last_login'];
            $tmpStatus = 'OFF';
            if ($row['user_is_login'] == 1) {
                $tmpStatus = 'LOGIN';
            }
            if ($row['user_is_locked'] == 1) {
                $tmpStatus = 'TERKUNCI';
            }
            if ($row['user_is_deleted'] == 1) {
                $tmpStatus = 'DIHAPUS PERMANEN';
            }
            if ($row['user_is_suspend'] == 1) {
                $tmpStatus = 'DITANGGUHKAN';
            }
            $data['data']['user_id']         = $row['user_id'];
            $data['data']['user_login']      = $row['user_login'];
            $data['data']['user_name']       = $row['user_name'];
            $data['data']['user_lastlogin']  = $tmpLastLogin;
            $data['data']['user_status']     = $tmpStatus;
            $data['data']['user_is_locked']  = $row['user_is_locked'];
            $data['data']['user_is_deleted'] = $row['user_is_deleted'];
            $data['data']['user_is_suspend'] = $row['user_is_suspend'];
            
        } else {
            $data['status']  = false;
            $data['err_msg'] = "Data not found";
            $isRun = false;
        }
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($data);
?>