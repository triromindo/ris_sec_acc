<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function funcSharedDB_Connect(&$errMessage, &$oMySqli, $iServer, $iUser, $Password, $Database) {
    $retVal = true;
    $oMySqli = new mysqli($iServer, $iUser, $Password, $Database);
    if ($oMySqli->connect_error) {
        $retVal = false;
        $errMessage = $oMySqli->error;
    }
    return $retVal;
}
?>
