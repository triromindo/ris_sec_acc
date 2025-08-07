<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Ambil data satu produk
 */
if ($isRun) {

    //  Table
    $varProdGrpID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            SELECT `prodgrp_id`, `prodgrp_name`, `prodgrp_index`
            FROM `10sys_rec__prodgrp_id` 
            WHERE `prodgrp_id` = '%s' ;", $varProdGrpID);
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $data['status'] = true;
            $data['data']['prodgrp_id']    = $row['prodgrp_id'];
            $data['data']['prodgrp_name']  = $row['prodgrp_name'];
            $data['data']['prodgrp_index'] = $row['prodgrp_index'];
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