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
            SELECT app_id, app_name, app_index, app_ver
            FROM `10sys_rec__app_id`
            ORDER BY
                app_index ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData[] = $row['app_id'];
            $tmpData[] = $row['app_name'];
            $tmpData[] = $row['app_index'];
            $tmpData[] = $row['app_ver'];
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
