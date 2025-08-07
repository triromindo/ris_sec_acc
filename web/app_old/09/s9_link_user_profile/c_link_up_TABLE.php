<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Buat daftar produk
 */
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
        SELECT 10sys_rec__user_id.user_id AS user_id,
                10sys_rec__user_id.user_name AS user_name,
                11sys_rec__profile_id.profile_id AS profile_id,
                11sys_rec__profile_id.profile_name AS profile_name,
                11sys_rec__profile_id.location_id AS location_id
        FROM `15sys_rec__user_profile_list` 
        LEFT JOIN 11sys_rec__profile_id
            ON 15sys_rec__user_profile_list.profile_id = 11sys_rec__profile_id.profile_id
        LEFT JOIN 10sys_rec__user_id
            ON 15sys_rec__user_profile_list.user_id = 10sys_rec__user_id.user_id
        ORDER BY 10sys_rec__user_id.user_id ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $id = $row['user_id'].'-'.$row['profile_id'];
            $tmpData[] = $row['user_id'];
            $tmpData[] = $row['user_name'];
            $tmpData[] = $row['profile_id'];
            $tmpData[] = $row['profile_name'];
            $tmpData[] = $row['location_id'];
            $tmpData[] = $id;
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
