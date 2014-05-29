<?php
$dblocation = "127.0.0.1";
$dbname = "test";
$dbuser = "root";
$dbpasswd = "19alex89"; /* Укажите пароль который вы вводили при 
установке MySQL */
$dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
if (!$dbcnx)
{
echo "Не доступен сервер mySQL";
exit();
}
if (!@mysql_select_db($dbname,$dbcnx))
{
echo "Не доступна база данных";
exit();
}
$ver = mysql_query("SELECT VERSION()");
if(!$ver)
{
echo "Ошибка в запросе"; 
exit();
}
echo mysql_result($ver, 0);
?>