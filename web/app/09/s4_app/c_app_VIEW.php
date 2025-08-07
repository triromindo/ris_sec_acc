<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */
if ($isRun) {

    //  Table
    $varID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            SELECT app_id, app_name, app_index, app_navname, app_ver
            FROM `10sys_rec__app_id`
            WHERE app_id = '%s'",
            $varID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $tmpData['id'] = $row['app_id'];
            $tmpData['name'] = $row['app_name'];
            $tmpData['index'] = $row['app_index'];
            $tmpData['navname'] = $row['app_navname'];
            $tmpData['ver'] = $row['app_ver'];
            
            $data['status'] = true;
            $data['data'] = $tmpData;
        } else {
            $data['status'] = false;
            $data['err_msg'] = "Data not found";
            $isRun = false;
        }
    } else {
            $data['status'] = false;
            $data['err_msg'] = "Data not found";
            $isRun = false;
    }
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>