<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */
if ($isRun) {

    //  Table
    $tmpID = $_REQUEST['id'];
    $arrID = explode(',', $tmpID);
    $varAppID = $arrID[0];
    $varAppModID = $arrID[1];

    $tmpQueryString = sprintf("
            SELECT appmod_id, 
                appmod_name, 
                appmod_index, 
                appmod_navname, 
                appmod_group, 
                appmod_type, 
                appmod_ver, 
                appmod_note, 
                access_type,
                a.app_id AS app_id,
                b.app_name AS app_name
            FROM 11sys_rec__appmod_id AS a
            LEFT JOIN 10sys_rec__app_id AS b
                ON b.app_id = a.app_id
            WHERE a.app_id = '%s'
                AND a.appmod_id = '%s'",
            $varAppID,
            $varAppModID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $tmpData['app_id_name'] = $row['app_id'].' - '.$row['app_name'];
            $tmpData['id'] = $row['appmod_id'];
            $tmpData['name'] = $row['appmod_name'];
            $tmpData['index'] = $row['appmod_index'];
            $tmpData['navname'] = $row['appmod_navname'];
            $tmpData['group'] = $row['appmod_group'];
            $tmpData['type'] = $row['appmod_type'];
            $tmpData['ver'] = $row['appmod_ver'];
            $tmpData['note'] = $row['appmod_note'];
            $tmpData['acc'] = $row['access_type'];
            
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