<?php
/* php& mysqldb connection file */
$user = "root"; //mysqlusername
$pass = ""; //mysqlpassword
$host = "localhost"; //server name or ipaddress
$dbname= "jrdb"; //your db name
$dbconn= mysqli_connect($host, $user, $pass);
if(isset($dbconn)){
mysqli_select_db($dbname, $dbconn) or die("<center>Error: " . mysql_error() . "</center>");
}
else{
echo "<center>Error: Could not connect to the database.</center>";
}
?>
