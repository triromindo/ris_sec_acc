<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Buat daftar produk
 */
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT `user_id`, `user_login`, `user_name`,
                `user_last_ip`, `user_last_login`, 
                `user_is_login`, `user_is_locked`, 
                `user_is_deleted`, `user_is_suspend`
            FROM `10sys_rec__user_id` 
            WHERE `user_type` <> 'SA'
            ORDER BY `user_id` ;");
    $tmpResultQueue['q'] = $tmpQueryString;
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
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
            $tmpData[] = $row['user_id'];
            $tmpData[] = $row['user_login'];
            $tmpData[] = $row['user_name'];
            $tmpData[] = $tmpLastLogin;
            $tmpData[] = $tmpStatus;
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
