<?php
include 'conn.php';
$res=mysql_query("select *from signup");
while($s=mysql_fetch_array($res))
print($s['fname']);


?>