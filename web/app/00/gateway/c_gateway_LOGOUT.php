<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//  Matikan session
$tmpUser = $_SESSION['user']['id'];
if (funcLogoutDataUser($varErrMessage, $varResultCode, $varMySqli, $_SESSION['user']['id'])) {
    unset($_SESSION);
    session_destroy();

    $tmpMod = 'MOD-GATEWAY';
    $tmpAct = 'LOGOUT';
    $tmpMemo = 'Logout success';
    funcSharedLog_WriteLog($varErrMessage, $varMySqli, $tmpUser, $tmpMod, $tmpAct, $tmpMemo);

    //  Jump ke logout
    $varPAGE = 'JUMP';
    $JUMP_location = 'do.php?navcmd=LOGOUT,LOGOUT';
} else {
    echo "ERROR LOGOUT";
}
?>
