<?php

$isRun = true;
/**
 * PSEDUO DELETE
 * 1. Hapus data
 */
//  Hapus data Loc
if ($isRun) {

    //  Table
    $varProfileID = $_REQUEST['id'];
    $varAppID = $_REQUEST['app'];
}

if ($isRun) {
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_appmod_list
        WHERE profile_id = '%s'
            AND app_id = '%s'; ",
            $varProfileID,
            $varAppID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }

    $arrChkBox = $_REQUEST['iChkBox'];
    if (isset($arrChkBox)) {
        if (count($arrChkBox)) {
            foreach ($arrChkBox as $key => $val) {
                $tmpQueryString = sprintf("
                INSERT INTO 15sys_rec__profile_appmod_list
                    (profile_id, app_id, appmod_id, access_level)
                VALUES
                    ('%s', '%s', '%s', '%s'); ",
                        $varProfileID, $varAppID, $key, $val);
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
}

if ($isRun) {
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $_SESSION['user']['id'], 'MOD-PROFILE', 'EDIT',
            'Update Module PROFILE_ID = ' . $varProfileID);
}


$varPAGE = 'JSON';
$JSON = json_encode($data);
?>