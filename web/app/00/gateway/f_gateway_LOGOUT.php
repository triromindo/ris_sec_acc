<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function funcLogoutDataUser(&$oErrMessage, &$oResultCode, $iMySqli, $iUserID) {
  $retVal = true;

  //  1a2. Update time login dan lain-lain di data user.
  $tmpQuery = sprintf("
                UPDATE `10sys_rec__user_id`
                SET `user_is_login` = %d,
                    `user_last_login` = `user_curr_login`,
                    `user_last_active` = now(),
                    `user_curr_login` = null
                WHERE
                    `user_id` = '%s'", 0, addslashes($iUserID));
  //echo $tmpQuery;
  if ($iMySqli->real_query($tmpQuery)) {
    $oErrMessage = "";
    $oResultCode = 0;
    $retVal = true;
  } else {
    $oErrMessage = "DATABASE failed. " . $iMySqli->error;
    $oResultCode = 1;
    $retVal = false;
  }
  
  return $retVal;
}
