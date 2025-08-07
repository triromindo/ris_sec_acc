<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Buat daftar produk
 */
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT `profile_id`, `profile_name`, `profile_desc`, `location_id`
            FROM `11sys_rec__profile_id` 
            ORDER BY `profile_id` ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData[] = $row['profile_id'];
            $tmpData[] = $row['profile_name'];
            $tmpData[] = $row['profile_desc'];
            $tmpData[] = $row['location_id'];
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
