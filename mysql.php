<?php
$dblocation = "127.0.0.1";
$dbname = "test";
$dbuser = "root";
$dbpasswd = "19alex89"; /* ������� ������ ������� �� ������� ��� 
��������� MySQL */
$dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
if (!$dbcnx)
{
echo "�� �������� ������ mySQL";
exit();
}
if (!@mysql_select_db($dbname,$dbcnx))
{
echo "�� �������� ���� ������";
exit();
}
$ver = mysql_query("SELECT VERSION()");
if(!$ver)
{
echo "������ � �������"; 
exit();
}
echo mysql_result($ver, 0);
?>