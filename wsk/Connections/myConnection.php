<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myConnection = "localhost";
$database_myConnection = "group1";
$username_myConnection = "root";
$password_myConnection = "12345678";
$myConnection = mysql_pconnect($hostname_myConnection, $username_myConnection, $password_myConnection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>