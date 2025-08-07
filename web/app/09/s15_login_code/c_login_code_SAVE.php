<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varProdID = $_REQUEST['id'];
    if (funcShareHtml_getInput($oErrMsg, $data['code_id'], $_REQUEST['iCodeId'], 'ALPNUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Kode diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }


//    $data['loc_id'] = $_REQUEST['iLocId'];     
//    $data['loc_name'] = $_REQUEST['iLocName'];      
//    $data['loc_index'] = $_REQUEST['iLocIndex'];  

}

if ($isRun) {
    $tmpQueryString = sprintf("
            INSERT INTO `80set_rec_login_code` 
                (`rec_id`, `code_number`, `code_end`, 
                `created_at`, `updated_at`) 
            VALUES 
                (NULL, '%s', '%s', NOW(), NOW()); ",
            $data['code_id'],
            $_REQUEST['iCodeExp']);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $tmpErrText = date("Y-m-d H:i:s").' S15 Login Code - SAVE - Query Error. Mysql = '.$tmpQueryString;
        error_log($tmpErrText . PHP_EOL, 3, $varErrPath);
        $isRun = false;
    }
}

// if ($isRun) {
//     $tmpMod = 'MOD-LOCATION';
//     $tmpAct = 'ADD';
//     $tmpMemo = 'Add LOC_ID = ' . $data['loc_id']
//             . ' with name = ' . $data['loc_name']
//             . ' and index = ' . $data['loc_name'];
//     funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], $tmpMod, $tmpAct, $tmpMemo);
// }

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>