<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Buat daftar produk
 */
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT 10sys_rec__location_id.location_id AS location_id,
                10sys_rec__location_id.location_name AS location_name,
                10sys_rec__location_id.location_index AS location_index,
                10sys_rec__area_id.area_id AS area_id,
                10sys_rec__area_id.area_name AS area_name,
                10sys_rec__area_id.area_index AS area_index
            FROM `10sys_rec__area_id`
            LEFT JOIN `10sys_rec__location_id`
        	ON 10sys_rec__area_id.location_id = 10sys_rec__location_id.location_id
            ORDER BY
                10sys_rec__location_id.location_index,
                10sys_rec__location_id.location_id,
                10sys_rec__area_id.area_index,
                10sys_rec__area_id.area_id ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpParent = $row['location_index'].'. '.$row['location_id'].' - '.$row['location_name'];
            $tmpID = $row['location_id'].'-'.$row['area_id'];
            $tmpData[] = $tmpParent;
            $tmpData[] = $row['area_id'];
            $tmpData[] = $row['area_name'];
            $tmpData[] = $row['area_index'];
            $tmpData[] = $tmpID;
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
