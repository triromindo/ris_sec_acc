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
            SELECT 11sys_rec__appmod_id.appmod_id, 
                11sys_rec__appmod_id.appmod_name, 
                11sys_rec__appmod_id.appmod_index,
                11sys_rec__appmod_id.app_id AS app_id, 
                10sys_rec__app_id.app_name AS app_name, 
                11sys_rec__appmod_id.appmod_group, 
                11sys_rec__appmod_id.appmod_ver, 
                11sys_rec__appmod_id.appmod_note
            FROM `11sys_rec__appmod_id`
            LEFT JOIN `10sys_rec__app_id`
        	ON 10sys_rec__app_id.app_id = 11sys_rec__appmod_id.app_id
            ORDER BY
                10sys_rec__app_id.app_index,
                10sys_rec__app_id.app_id,
                11sys_rec__appmod_id.appmod_index,
                11sys_rec__appmod_id.appmod_id ;");
    
    $tmpResultQueue['query'] = $tmpQueryString;
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpParent = $row['app_id'].'-'.$row['app_name'];
            $tmpID = $row['app_id'].','.$row['appmod_id'];
            $tmpData[] = $tmpParent;
            $tmpData[] = $row['appmod_id'];
            $tmpData[] = $row['appmod_name'];
            $tmpData[] = $row['appmod_index'];
            $tmpData[] = $row['appmod_group'];
            $tmpData[] = $row['appmod_ver'];
            $tmpData[] = $row['appmod_note'];
            $tmpData[] = $tmpID;
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
