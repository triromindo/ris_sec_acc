<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function funcLoadSecurity_Apps(&$oErrMessage, &$oDataSecurity, $iMySqli, $iAppsID) {
    $retVal = true;

    //  Load Application
    $tmpQuery = sprintf("
        SELECT b.app_id, b.app_name, b.app_index, b.app_navname
        FROM  `15sys_rec__profile_app_list` a
        LEFT JOIN  `10sys_rec__app_id` b ON a.app_id = b.app_id
        AND b.rec_status =  'OK'
        WHERE a.profile_id = '%s'
        ORDER BY b.app_index;",
        $iAppsID);
		//print_r($tmpQuery);
		//exit();
    // Untuk menampilkan list application 
    if ($iMySqli->real_query($tmpQuery)) {
        $tmpResult = $iMySqli->store_result();

        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['app_id']    = $row['app_id'];
            $tmpData['app_name']  = $row['app_name'];
            $tmpData['nav_name']  = $row['app_navname'];
            $tmpData['index']     = $row['app_index'];
            $oDataSecurity[] = $tmpData;
        }
        // digunakan untuk menampilkan pada list application
    } else {
        
        $oErrMessage = 'Query error: '.$tmpQuery;
        $retVal = false;
    }

    return $retVal;
}
function funcLoadSecurity_Apps_old(&$oErrMessage, &$oDataSecurity, $iMySqli, $iAppsID) {
    $retVal = true;

    //  Load Application
    $tmpQuery = sprintf("
        SELECT b.app_id, b.app_name, b.app_index, b.app_navname
        FROM  `20sys_rec__profile_application_list` a
        LEFT JOIN  `10sys_rec__app_id` b ON a.app_id = b.app_id
        AND b.rec_status =  'OK'
        WHERE a.profile_application_id = '%s'
        ORDER BY b.app_index;",
        $iAppsID);
    // Untuk menampilkan list application 
    if ($iMySqli->real_query($tmpQuery)) {
        $tmpResult = $iMySqli->store_result();

        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['app_id']    = $row['app_id'];
            $tmpData['app_name']  = $row['app_name'];
            $tmpData['nav_name']  = $row['app_navname'];
            $tmpData['index']     = $row['app_index'];
            $oDataSecurity[] = $tmpData;
        }
        // digunakan untuk menampilkan pada list application
    } else {
        
        $oErrMessage = 'Query error: '.$tmpQuery;
        $retVal = false;
    }

    return $retVal;
}


function funcLoadUserData(&$oErrMessage, &$oUserData, $iMySqli, $iUserID) {
    $retVal = true;

    //  Load Application
    $tmpQuery = sprintf("
        SELECT `user_name`, `user_last_ip`, `user_last_login`, `user_last_active`, 
          `user_curr_ip`, `user_curr_login` 
        FROM `10sys_rec__user_id` 
        WHERE `user_id` = '%s';",
        $iUserID);
    
    if ($iMySqli->real_query($tmpQuery)) {
        $tmpResult = $iMySqli->store_result();

        $row = $tmpResult->fetch_assoc();
        $oUserData['user_name']     = $row['user_name'];
        $oUserData['last_ip']       = $row['user_last_ip'];
        $oUserData['last_login']    = $row['user_last_login'];
        $oUserData['last_logout']   = $row['user_last_active'];
        $oUserData['curr_ip']       = $row['user_curr_ip'];
        $oUserData['curr_logout']   = $row['user_curr_login'];
        
        
        
    } else {
        $oErrMessage = 'Query error: '.$tmpQuery;
        $retVal = false;
    }

    return $retVal;
}

function funcOnline_user(&$oErrMessage, &$oDataSecurity, $iMySqli,$userID) {
    $retVal = true;

    //  Load Application
    $tmpQuery = sprintf("
        SELECT `user_name`, `user_last_ip`, `user_last_login`, `user_last_active`,
          `user_curr_ip`, `user_curr_login` 
        FROM `10sys_rec__user_id` 
        WHERE `user_is_login` = '1' AND 
		user_id='%s';",$userID);
    // Untuk menampilkan list 
    if ($iMySqli->real_query($tmpQuery)) {
        $tmpResult = $iMySqli->store_result();

        while ($row = $tmpResult->fetch_assoc()) {
           $tmpData['user_name']     = $row['user_name'];
        $tmpData['last_ip']       = $row['user_last_ip'];
        $tmpData['last_login']    = $row['user_last_login'];
        $tmpData['last_logout']   = $row['user_last_aktive'];
        $tmpData['curr_ip']       = $row['user_curr_ip'];
        $tmpData['user_curr_login']   = $row['user_curr_login'];

            $oDataSecurity[] = $tmpData;
        }
        // digunakan untuk menampilkan pada list application
    } else {
        
        $oErrMessage = 'Query error: '.$tmpQuery;
        $retVal = false;
    }

    return $retVal;
}


?>
