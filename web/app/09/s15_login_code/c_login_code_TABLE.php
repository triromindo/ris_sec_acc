<?php

$isRun = true;
/**
 * PSEDUO
 * 1. Buat daftar produk
 */
if ($isRun) {
    //  Table
    $tmpQueryString = sprintf("
            SELECT `code_number`, `code_end`
            FROM `80set_rec_login_code` 
            ORDER BY `code_end` DESC ;");
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        $PAGE['table_queue']['count'] = 0;
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData[] = $row['code_number'];
            $tmpData[] = $row['code_end'];
            $tmpResultQueue['data'][] = $tmpData;
            unset($tmpData);
        }
    }
}
$varPAGE = 'JSON';
$JSON = json_encode($tmpResultQueue);
?>
