<?php
/**
 * Untuk koneksi ke database MSSQL
 * 
 * @param string $errMessage
 * @param type $oSqlSrv
 * @param type $iServer
 * @param type $iUser
 * @param type $iPassword
 * @param type $iDatabase
 * @return boolean 
 */
function funcSharedDB_ConnectMSSql(&$errMessage, &$oSqlSrv, $iServer, $iUser, $iPassword, $iDatabase) {
  $retVal = true;

  $tmpServerName = $iServer;
  $tmpConnInfo = array("UID" => $iUser,
      "PWD" => $iPassword,
      "Database" => $iDatabase);

  /* Connect using SQL Server Authentication. */

  $oSqlSrv = sqlsrv_connect($tmpServerName, $tmpConnInfo);
  if ($oSqlSrv === false) {
    echo 'ERROR: User='.$iUser.' Pass='.$iPassword.' DB='.$iDatabase;
    $errMessage = "Tidak bisa terhubung MSSQL = " . print_r(sqlsrv_errors());
    $retVal = false;
  }

  return $retVal;
}
?>
