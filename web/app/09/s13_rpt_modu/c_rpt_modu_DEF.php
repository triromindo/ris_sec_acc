<?php

$varMaxData = 10;

$isRun = true;

//  Ambil input
$varYear = $_REQUEST['iYear'];
$varMonth = $_REQUEST['iMonth'];
$varAppMod = $_REQUEST['iAppMod'];

//  Default value
//  Year
if (isset($varYear)) {
    
} else {
    $varYear = date('Y');
}
$arrYear[$varYear + 1] = $varYear + 1;
$arrYear[$varYear] = $varYear;
$arrYear[$varYear - 1] = $varYear - 1;
$PAGE['form']['cbYear'] = funcSharedHtml_select($arrYear, $varYear);
//  Month
$PAGE['form']['cbMonth'] = funcSharedHtml_select_month($varMonth);
//  Module
$tmpQueryString = sprintf("
            SELECT 11sys_rec__appmod_id.appmod_id, 
                11sys_rec__appmod_id.appmod_name, 
                11sys_rec__appmod_id.appmod_index,
                11sys_rec__appmod_id.app_id AS app_id, 
                10sys_rec__app_id.app_name AS app_name, 
                11sys_rec__appmod_id.appmod_group, 
                11sys_rec__appmod_id.appmod_ver, 
                11sys_rec__appmod_id.appmod_note
            FROM `11sys_rec__appmod_id`
            LEFT JOIN `10sys_rec__app_id`
        	ON 10sys_rec__app_id.app_id = 11sys_rec__appmod_id.app_id
            ORDER BY
                10sys_rec__app_id.app_index,
                10sys_rec__app_id.app_id,
                11sys_rec__appmod_id.appmod_index,
                11sys_rec__appmod_id.appmod_id ;");

$tmpResultQueue['query'] = $tmpQueryString;
if ($tmpResult = $varMySqli->query($tmpQueryString)) {
    $PAGE['table_queue']['count'] = 0;
    while ($row = $tmpResult->fetch_assoc()) {
        $arrAppMod[$row['appmod_id']] = substr($row['app_name'] . ' - ' . $row['appmod_name'], 0, 80);
    }
}
$PAGE['form']['cbAppMod'] = funcSharedHtml_select($arrAppMod, $varAppMod);

if ($isRun) {
    $tmpQueryFrom = $varYear . '-' . $varMonth . '-01';
    $varToYear = $varYear;
    $varToMonth = $varMonth + 1;
    if ($varToMonth > 12) {
        $varToYear = $varToYear + 1;
        $varToMonth = '01';
    }
    $tmpQueryTo = $varToYear . '-' . $varToMonth . '-01';

    $PAGE['show']['display_text'] = 'Tampilkan data <b>' . $varYear . ' - ' . $varMonth . '</b>';

    //  Query data
    $tmpQueryString = sprintf("
            SELECT user_id, 
                day(rec_timestamp) AS login_date
            FROM `90user_log` 
            WHERE 
                rec_timestamp > '%s' 
                AND rec_timestamp < '%s' 
                AND action = 'OPEN' 
                AND module = '%s'
            GROUP BY user_id, day(rec_timestamp)
            ORDER BY user_id;",
            $tmpQueryFrom,
            $tmpQueryTo,
            $varAppMod);

    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpTable[$row['user_id']][$row['login_date']] = 1;
            $tmpTableCount[$row['user_id']] = $tmpTableCount[$row['user_id']] + 1;
        }
        $PAGE['form']['table'] = $tmpTable;
        $PAGE['form']['table_count'] = $tmpTableCount;
    }
}
$varPAGE = 'DEF';
?>
