<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


    if ($varCmd == 'LOGOUT') {
        $varPAGE = 'LOGOUT';
        unset($_SESSION['user']['id']);
        session_destroy();
    }
    
    
    //  5. Link ke page
    if ($varPAGE == 'LOGOUT') {
        include ('logout/v_logout.php');
    } else if ($varPAGE == 'JUMP') {
        header('Location: '.$JUMP_location);
    }
?>
