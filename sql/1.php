<?php
//sql 注入
$host = 'localhost';
$username = 'root';
$dbpwd = 'root';
$dbname = 'lhfei';

$conn = mysqli_connect($host,$username,$dbpwd,$dbname)or die('#fail to connect todb.');

$user = $_GET['user'];
$pwd  = $_GET['pwd'];
$sql = "select * from user where username='{$user}' and pwd='{$pwd}'";

$result = mysqli_query($conn,$sql);
$num_rows = mysqli_fetch_array($result);

if(empty($num_rows)){
	echo 'fail';
}else{
	echo 'succes<pre>';
	var_dump($num_rows);
}




echo "<code>SQL:$sql<code>";





