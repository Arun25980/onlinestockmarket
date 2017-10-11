<?

$user=$_SESSION['user'];
include 'conn.php';
$q=mysql_query("select *from cash where user='$user'");
$res125=mysql_fetch_row($q);
$cash=$res125[0];
echo $res125[0];
?>