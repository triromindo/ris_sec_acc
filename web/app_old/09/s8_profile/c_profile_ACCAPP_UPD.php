<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
if ($isRun) {

    //  Table
    $varProfileID = $_REQUEST['id'];

    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_app_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }
}

if ($isRun) {

    if (isset($_REQUEST['iChkBox'])) {
        $arrSelect = $_REQUEST['iChkBox'];

        foreach ($arrSelect as $key => $value) {
            $tmpQueryString = sprintf("
            INSERT INTO `15sys_rec__profile_app_list` 
                (`rec_id`, `profile_id`, `app_id`) 
            VALUES 
                (NULL, '%s', '%s'); ",
                    $varProfileID,
                    $value);
            if ($varMySqli->query($tmpQueryString)) {
                $data['status'] = true;
            } else {
                $data['status']  = false;
                $data['err_msg'] = "Query error";
                $isRun = false;
            }
        }
    }
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PROFILE', 'EDIT',
            'Update Aplikasi PROFILE_ID = ' . $varProfileID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>