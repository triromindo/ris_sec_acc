<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varCodeID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
            DELETE FROM `80set_rec_login_code` 
            WHERE `code_number` = '%s' ;", $varCodeID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status'] = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

// if ($isRun) {
//     $tmpMod = 'MOD-LOCATION';
//     $tmpAct = 'DELETE';
//     $tmpMemo = 'Delete LOC_ID = ' . $varCodeID;
//     funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], $tmpMod, $tmpAct, $tmpMemo);
// }
$varPAGE = 'JSON';
$JSON = json_encode($data);
?>