<?php

function funcSharedLog_WriteLog(&$errMessage, $iMySqli, $iUser, $iModule, $iAction, $iMemo) {
    $retVal = true;

    $tmpQueryString = sprintf("
            INSERT INTO `05sec_log` 
                (`rec_id`, `rec_timestamp`, 
                `user_id`, `module`, `action`, `memo`) 
            VALUES 
                (NULL, NOW(), 
                '%s', '%s', '%s', '%s'); ",
            addslashes($iUser),
            addslashes($iModule),
            addslashes($iAction),
            addslashes($iMemo));
    if ($iMySqli->query($tmpQueryString)) {
        //  OK
    } else {
        $errMessage = 'Database error';
        $retVal = false;
    }

    return $retVal;
}

?>