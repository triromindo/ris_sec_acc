<?php

$varMaxData = 10;

$isRun = true;

//  Ambil input
$varYear = $_REQUEST['iYear'];
$varMonth = $_REQUEST['iMonth'];

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
    $EXCEL['sub_title'] = 'PERIODE :'. ' ' . $varMonth . ' - ' . $varYear;

    //  Query data
    $tmpQueryString = sprintf("
            SELECT user_id, 
                day(rec_timestamp) AS login_date
            FROM `90user_log` 
            WHERE 
                rec_timestamp > '%s' 
                AND rec_timestamp < '%s' 
                AND action = 'LOGIN' 
            GROUP BY user_id, day(rec_timestamp)
            ORDER BY user_id;",
            $tmpQueryFrom,
            $tmpQueryTo);
     
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
