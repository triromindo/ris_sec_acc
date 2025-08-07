<?php

$varMaxData = 10;

$isRun = true;

//  Ambil input
$varYear = $_REQUEST['iYear'];
$varMonth = $_REQUEST['iMonth'];
$varUser = $_REQUEST['iUser'];

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
//  User
$tmpQueryString = sprintf("
            SELECT `user_id`, `user_login`, `user_name`
            FROM `10sys_rec__user_id` 
            WHERE `user_type` <> 'SA'
            ORDER BY `user_id` ;");
$tmpResultQueue['q'] = $tmpQueryString;
if ($tmpResult = $varMySqli->query($tmpQueryString)) {
    $PAGE['table_queue']['count'] = 0;
    while ($row = $tmpResult->fetch_assoc()) {
        $arrUser[$row['user_id']] = substr($row['user_id'] . ' - ' . $row['user_name'], 0, 80);
    }
}
$PAGE['form']['cbUser'] = funcSharedHtml_select($arrUser, $varUser);

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
            SELECT module, 
                day(rec_timestamp) AS login_date
            FROM `90user_log` 
            WHERE 
                rec_timestamp > '%s' 
                AND rec_timestamp < '%s' 
                AND action = 'OPEN' 
                AND user_id = '%s'
            GROUP BY module, day(rec_timestamp)
            ORDER BY module;",
            $tmpQueryFrom,
            $tmpQueryTo,
            $varUser);

    if ($tmpResult = $varMySqli->query($tmpQueryString)) {
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpTable[$row['module']][$row['login_date']] = 1;
            $tmpTableCount[$row['module']] = $tmpTableCount[$row['module']] + 1;
        }
        $PAGE['form']['table'] = $tmpTable;
        $PAGE['form']['table_count'] = $tmpTableCount;
    }

	if (isset($tmpTable)) {
    foreach ($tmpTable as $key => $value) {
        //  Query module name
        $tmpQueryString = sprintf("
            SELECT appmod_name
            FROM `11sys_rec__appmod_id` 
            WHERE 
                appmod_id = '%s';",
                $key);

        if ($tmpResult = $varMySqli->query($tmpQueryString)) {
            if ($row = $tmpResult->fetch_assoc()) {
                $tmpTableModName[$key] = $row['appmod_name'];
            }
        }
        $PAGE['form']['table_modname'] = $tmpTableModName;
    }
	}
}
$varPAGE = 'DEF';
?>
