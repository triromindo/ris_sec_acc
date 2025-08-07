<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Buat daftar produk
 */
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT `prodgrp_id`, `prodgrp_name`, `prodgrp_index`
            FROM `10sys_rec__prodgrp_id` 
            ORDER BY `prodgrp_index` ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData[] = $row['prodgrp_id'];
            $tmpData[] = $row['prodgrp_name'];
            $tmpData[] = $row['prodgrp_index'];
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
