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
}

if ($isRun) {
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_acc_loc_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }

    $arrLocID = $_REQUEST['iLoc'];
    if (isset($arrLocID)) {
        if (count($arrLocID)) {
            foreach ($arrLocID as $key => $val) {
                $tmpQueryString = sprintf("
                INSERT INTO 15sys_rec__profile_acc_loc_list
                    (profile_id, acc_location_id)
                VALUES
            ('%s', '%s'); ",
                        $varProfileID, $val);
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
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_acc_area_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }

    $arrAreaID = $_REQUEST['iArea'];
    if (isset($arrAreaID)) {
        if (count($arrAreaID)) {
            foreach ($arrAreaID as $key => $val) {
                $tmpQueryString = sprintf("
                INSERT INTO 15sys_rec__profile_acc_area_list
                    (profile_id, acc_area_id)
                VALUES
            ('%s', '%s'); ",
                        $varProfileID, $val);
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
    $tmpQueryString = sprintf("
        DELETE FROM 15sys_rec__profile_acc_rayon_list
        WHERE profile_id = '%s'; ",
            $varProfileID);
    if ($varMySqli->query($tmpQueryString)) {
        $data['status'] = true;
    } else {
        $data['status']  = false;
        $data['err_msg'] = "Query error";
        $isRun = false;
    }

    $arrRayonID = $_REQUEST['iRayon'];
    if (isset($arrRayonID)) {
        if (count($arrRayonID)) {
            foreach ($arrRayonID as $key => $val) {
                $tmpQueryString = sprintf("
                INSERT INTO 15sys_rec__profile_acc_rayon_list
                    (profile_id, acc_rayon_id)
                VALUES
            ('%s', '%s'); ",
                        $varProfileID, $val);
                
                    $data['err_msg'] = $tmpQueryString;
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
            'Update Lokasi PROFILE_ID = ' . $varProfileID);
}

$varPAGE = 'JSON';
$JSON = json_encode($data);
?>