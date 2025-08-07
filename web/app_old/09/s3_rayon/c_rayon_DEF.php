<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Query Combo
 */
//  Query Combo
if ($isRun) {

    //  Combo LOC-AREA
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
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpKey = $row['location_id'] . '-' . $row['area_id'];
            $tmpCb[$tmpKey] = $row['location_id'] . '-' . $row['location_name'] . ' / ' . $row['area_id'] . '-' . $row['area_name'];
        }
        if (isset($tmpCb)) {
            $PAGE['form']['cbLocArea'] = funcSharedHtml_select($tmpCb, '');
        }
    }
}
$varPAGE = 'DEF';
?>
