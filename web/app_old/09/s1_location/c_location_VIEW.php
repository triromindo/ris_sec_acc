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
            SELECT `location_index`, `location_id`, `location_name`
            FROM `10sys_rec__location_id`
            WHERE `location_id` = '%s' ;", $varProdID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $data['data']['loc_index'] = $row['location_index'];
            $data['data']['loc_id']    = $row['location_id'];
            $data['data']['loc_name']  = $row['location_name'];
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