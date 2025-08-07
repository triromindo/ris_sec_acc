<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */
if ($isRun) {

    //  Table
    $varProfileID = $_REQUEST['id'];
    $varAppID     = $_REQUEST['app'];

    $tmpQueryString = sprintf("
            SELECT 15sys_rec__profile_appmod_list.access_level AS access_level, 
                11sys_rec__appmod_id.appmod_name AS appmod_name
            FROM `11sys_rec__appmod_id`
            LEFT JOIN `15sys_rec__profile_appmod_list`
                    ON 15sys_rec__profile_appmod_list.app_id = 11sys_rec__appmod_id.app_id
                    AND 15sys_rec__profile_appmod_list.appmod_id = 11sys_rec__appmod_id.appmod_id
                    AND 15sys_rec__profile_appmod_list.profile_id = '%s'
            WHERE 11sys_rec__appmod_id.app_id = '%s'
            ORDER BY 11sys_rec__appmod_id.appmod_index ;",
            $varProfileID,
            $varAppID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['access_level'] = $row['access_level'];
            $tmpData['appmod_name'] = $row['appmod_name'];
            if ($tmpData['access_level'] == 0) {
                $varDataResult_0[] = $tmpData;
            } elseif ($tmpData['access_level'] == 1) {
                $varDataResult_1[] = $tmpData;
            } elseif ($tmpData['access_level'] == 2) {
                $varDataResult_2[] = $tmpData;
            } elseif ($tmpData['access_level'] == 3) {
                $varDataResult_3[] = $tmpData;
            } elseif ($tmpData['access_level'] == 4) {
                $varDataResult_4[] = $tmpData;
            } else {
                $varDataResult_0[] = $tmpData;
            }
        }
    } else {
        $data['status'] = false;
        $data['err_msg'] = "Query error" . $tmpQueryString;
        $isRun = false;
    }
}

$data['data']['lvl_0'] = $varDataResult_0;
$data['data']['lvl_1'] = $varDataResult_1;
$data['data']['lvl_2'] = $varDataResult_2;
$data['data']['lvl_3'] = $varDataResult_3;
$data['data']['lvl_4'] = $varDataResult_4;
$varPAGE = 'JSON';
$JSON = json_encode($data);
?>