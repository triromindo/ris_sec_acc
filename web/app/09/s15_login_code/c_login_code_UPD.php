<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varLocID = $_REQUEST['id'];

   // $data['loc_id']    = $_REQUEST['id'];
   // $data['loc_name']  = $_REQUEST['iLocName'];
   // $data['loc_index'] = $_REQUEST['iLocIndex'];
   
     if (funcShareHtml_getInput($oErrMsg, $data['code_id'], $_REQUEST['iCodeId'], 'ALPNUM') == false) {
        $data['status']  = false;
        $data['err_msg'] = 'Kode diisi alphanumerik dan tanpa spasi';
        $isRun = false;
    }
}
    
if ($isRun) {
    $tmpQueryString = sprintf("
            UPDATE `80set_rec_login_code` 
            SET `updated_at` = NOW(), 
                `code_number` = '%s', 
                `code_end` = '%s'
            WHERE `code_number` = '%s' ;", 
                $data['code_id'], 
                $_REQUEST['iCodeExp'], 
                $varLocID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

// if ($isRun) {
//     $tmpMod = 'MOD-LOCATION';
//     $tmpAct = 'EDIT';
//     $tmpMemo = 'Update LOC_ID = ' . $varLocID
//             . ' with name = '.$data['loc_name']
//             . ' and index = '.$data['loc_name'];
//     funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], $tmpMod, $tmpAct, $tmpMemo);
// }

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>