<?php

/**
 *
 * @param <type> $oErrMessage
 * @param <type> $oResultCode
 * @param <type> $oDataUser
 * @param <type> $iMySqli
 * @param <type> $iUser
 * @param <type> $iPass
 * @return <type>
 */
function funcLogin_3(&$oErrMessage, &$oResultCode, &$oDataUser, $iMySqli, $iUserLogin, $iPass) {
    $retVal = true;

    //  1. Query user dan password
    $tmpQuery = sprintf("
        SELECT user_login, user_last_ip, user_last_login
        FROM 05sec_sysadmin_id
        WHERE user_login = '%s'
            AND user_password = password('%s');",
            addslashes(strtoupper($iUserLogin)),
            addslashes($iPass));

    if ($iMySqli->real_query($tmpQuery)) {
        $tmpResult = $iMySqli->store_result();

        if ($row = $tmpResult->fetch_assoc()) {
            //  1a. Berhasil
            //  1a1. Ambil data user.
            $tmpIPAddress = $_SERVER['REMOTE_ADDR'];
            $oDataUser['user_id'] = $iUserLogin;
            $oDataUser['last_time'] = $row['user_last_login'];
            $oDataUser['last_ip'] = $row['user_last_ip'];
            $oDataUser['curr_ip'] = $tmpIPAddress;
            
            //  1a2. Update time login dan lain-lain di data user.
            $tmpQuery = sprintf("
                UPDATE `05sec_sysadmin_id`
                SET `user_last_ip` = '%s',
                    `user_last_login` = now()
                WHERE
                    `user_login` = '%s'; ",
                    $tmpIPAddress,
                    addslashes(strtoupper($iUserLogin)));
            if ($iMySqli->real_query($tmpQuery)) {
                $oErrMessage = "";
                $oResultCode = 0;
                $retVal = true;
            } else {
                $oErrMessage = "DATABASE failed. " . htmlentities($iMySqli->error);
                $oResultCode = 1;
                $retVal = false;
            }
        } else {
            //  1b. Gagal.
            //  1b1. Error
            $oErrMessage = "User and Password not found";
            $oResultCode = 2;
        }
    } else {
        $oErrMessage = "DATABASE failed. " . htmlentities($iMySqli->error);
        $oResultCode = 1;
        $retVal = false;
    }

    return $retVal;
}

?>
