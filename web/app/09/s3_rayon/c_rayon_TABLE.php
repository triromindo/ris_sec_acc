<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Query Table
 */

//  Query Table
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT 10sys_rec__location_id.location_id AS location_id,
                10sys_rec__location_id.location_name AS location_name,
                10sys_rec__location_id.location_index AS location_index,
                10sys_rec__area_id.area_id AS area_id,
                10sys_rec__area_id.area_name AS area_name,
                10sys_rec__area_id.area_index AS area_index,
                10sys_rec__rayon_id.rayon_id AS rayon_id,
                10sys_rec__rayon_id.rayon_name AS rayon_name,
                10sys_rec__rayon_id.rayon_index AS rayon_index
            FROM `10sys_rec__rayon_id`
            LEFT JOIN `10sys_rec__location_id`
        	ON 10sys_rec__location_id.location_id = 10sys_rec__rayon_id.location_id
            LEFT JOIN `10sys_rec__area_id`
        	ON 10sys_rec__area_id.area_id = 10sys_rec__rayon_id.area_id
            ORDER BY
                10sys_rec__location_id.location_index,
                10sys_rec__location_id.location_id,
                10sys_rec__area_id.area_index,
                10sys_rec__area_id.area_id,
                10sys_rec__rayon_id.rayon_index,
                10sys_rec__rayon_id.rayon_id ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpParent = $row['location_id'].'-'.$row['location_name'] . ' / '. $row['area_id'].'-'.$row['area_name'];
            $tmpID = $row['location_id'].'-'.$row['area_id'].'-'.$row['rayon_id'];
            $tmpData[] = $tmpParent;
            $tmpData[] = $row['rayon_id'];
            $tmpData[] = $row['rayon_name'];
            $tmpData[] = $row['rayon_index'];
            $tmpData[] = $tmpID;
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
