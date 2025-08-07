<?php

$varMaxData = 10;

$isRun = true;

//  Ambil input
$varFrom = $_REQUEST['iFrom'];
$varTo = $_REQUEST['iTo'];
$varUser = $_REQUEST['iUser'];
$varModule = $_REQUEST['iModule'];
$varAction = $_REQUEST['iAction'];
$varMemo = $_REQUEST['iMemo'];
$varPage = $_REQUEST['iPage'];

//  Default value
if (isset($varFrom)) {
    $PAGE['form']['valFrom'] = $varFrom;
} else {
    $varFrom = date('Y/m/01');
    $PAGE['form']['valFrom'] = date('Y/m/01');
}
if (isset($varTo)) {
    $varTo = date('Y/m/d', strtotime($varTo . ' +1 day'));
    $PAGE['form']['valTo'] = $varTo;
} else {
    $varTo = date('Y/m/d');
    $varTo = date('Y/m/d', strtotime($varTo . ' +1 day'));
    $PAGE['form']['valTo'] = $varTo;
}
if (isset($varPage)) {
    $PAGE['form']['page'] = $varPage;
} else {
    $varPage = 0;
    $PAGE['form']['page'] = $varPage;
}

//  User
$arrUser[''] = 'All';
$arrUser['SYSADMIN1'] = 'SYSADMIN1';
$arrUser['SYSADMIN2'] = 'SYSADMIN2';
$PAGE['form']['cbUser'] = funcSharedHtml_select($arrUser, $varUser);
//  Module
$arrMod[''] = 'All';
$arrMod['MOD-GATEWAY'] = 'MOD-GATEWAY';
$arrMod['MOD-LOCATION'] = 'MOD-LOCATION';
$arrMod['MOD-AREA'] = 'MOD-AREA';
$arrMod['MOD-RAYON'] = 'MOD-RAYON';
$arrMod['MOD-APP'] = 'MOD-APP';
$arrMod['MOD-APPMOD'] = 'MOD-APPMOD';
$arrMod['MOD-PRODGRUP'] = 'MOD-PRODGRUP';
$arrMod['MOD-USER'] = 'MOD-USER';
$arrMod['MOD-PROFILE'] = 'MOD-PROFILE';
$arrMod['MOD-LINK-USER-PROFILE'] = 'MOD-LINK-USER-PROFILE';
$PAGE['form']['cbMod'] = funcSharedHtml_select($arrMod, $varModule);
//  Action
$arrAct[''] = 'ALL';
$arrAct['LOGIN'] = 'LOGIN';
$arrAct['GATEWAY'] = 'GATEWAY';
$arrAct['LOGOUT'] = 'LOGOUT';
$arrAct['ADD'] = 'ADD';
$arrAct['EDIT'] = 'EDIT';
$arrAct['DELETE'] = 'DELETE';
$PAGE['form']['cbACt'] = funcSharedHtml_select($arrAct, $varAction);
//  Memo
$PAGE['form']['valMemo'] = $varMemo;

if ($isRun) {
    //  Combo
    if (strlen($varFrom) > 0) {
        $tmpQueryFrom = " AND rec_timestamp >= '" . $varFrom . "'";
    }
    if (strlen($varTo) > 0) {
        $tmpQueryTo = " AND rec_timestamp <= '" . $varTo . "'";
    }
    if (strlen($varUser) > 0) {
        $tmpQueryUser = " AND user_id  = '" . $varUser . "'";
    }
    if (strlen($varModule) > 0) {
        $tmpQueryModule = " AND module  = '" . $varModule . "'";
    }
    if (strlen($varAction) > 0) {
        $tmpQueryAction = " AND action  = '" . $varAction . "'";
    }
    if (strlen($varMemo) > 0) {
        $tmpQueryMemo = " AND memo  like '%" . $varMemo . "%'";
    }

    $PAGE['show']['btnPrev'] = false;
    $PAGE['show']['btnNext'] = false;
    if ($varPage == 0) {
        //  Halaman pertama, offset kosong
        $tmpOffset = ' ';
    } elseif ($varPage > 0) {
        //  Diatas halaman pertama, offset ditampilkan
        $PAGE['show']['btnPrev'] = true;
        $tmpPage = $varPage * $varMaxData;
        $tmpOffset = ' OFFSET ' . $tmpPage;
    } else {
        //  Bila tidak ada page, tidak ditampilkan
        $tmpOffset = ' ';
    }

    $tmpQueryStringTotal = sprintf("
            SELECT count(*) AS total
            FROM 05sec_log
            WHERE rec_id > 0
            %s
            %s
            %s
            %s
            %s
            %s;",
            $tmpQueryFrom,
            $tmpQueryTo,
            $tmpQueryUser,
            $tmpQueryModule,
            $tmpQueryAction,
            $tmpQueryMemo);
    if ($tmpResult = $varMySqli->query($tmpQueryStringTotal)) {
        if ($row = $tmpResult->fetch_assoc()) {
            $tmpDataTotal = $row['total'];
        }
        $PAGE['form']['total'] = $tmpDataTotal;
    }

    //  Query data
    $tmpQueryString = sprintf("
            SELECT rec_id, rec_timestamp, user_id, module, action, memo
            FROM 05sec_log
            WHERE rec_id > 0
            %s
            %s
            %s
            %s
            %s
            %s
            ORDER BY rec_timestamp DESC, rec_id DESC
            LIMIT %s 
            %s;",
            $tmpQueryFrom,
            $tmpQueryTo,
            $tmpQueryUser,
            $tmpQueryModule,
            $tmpQueryAction,
            $tmpQueryMemo,
            $varMaxData,
            $tmpOffset);
    
    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        if ($tmpResult->num_rows == $varMaxData) {
            $tmpEndData = $tmpPage + $varMaxData;
            if ($tmpEndData == $tmpDataTotal) {
                //  Sama dengan total data
            } else {
                //  Masih dibawah data total
                $PAGE['show']['btnNext'] = true;
            }
        } else {
            $tmpEndData = $tmpPage + $tmpResult->num_rows;
        }
        $tmpStartData = $tmpPage + 1;
        $PAGE['show']['display_text'] = 'Tampilkan data <b>' . $tmpStartData . '</b> s/d <b>' . $tmpEndData . '</b> dari <b>' . $tmpDataTotal . '</b> data.';


        while ($row = $tmpResult->fetch_assoc()) {
            $tmpData['index'] = $row['rec_id'];
            $tmpData['time'] = $row['rec_timestamp'];
            $tmpData['user'] = $row['user_id'];
            $tmpData['module'] = $row['module'];
            $tmpData['action'] = $row['action'];
            $tmpData['memo'] = $row['memo'];
            $tmpTable[] = $tmpData;
        }
        $PAGE['form']['table'] = $tmpTable;
    }
}
$varPAGE = 'DEF';
?>
