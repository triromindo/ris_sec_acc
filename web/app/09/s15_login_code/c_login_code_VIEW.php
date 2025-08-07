<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */
if ($isRun) {

    //  Table
    $varCodeID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            SELECT `code_number`, `code_end`
            FROM `80set_rec_login_code`
            WHERE `code_number` = '%s' ;", $varCodeID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $data['data']['code_id']    = $row['code_number'];
            $data['data']['code_exp']  = $row['code_end'];
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