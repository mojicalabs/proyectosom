<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tarifasrd = "localhost";
$database_tarifasrd = "tarifas1_database";
$username_tarifasrd = "root";
$password_tarifasrd = "";
$tarifasrd = mysql_pconnect($hostname_tarifasrd, $username_tarifasrd, $password_tarifasrd) or trigger_error(mysql_error(),E_USER_ERROR); 
?>