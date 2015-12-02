<?php
header('Content-type: text/html; charset=utf-8');
$mysqli=@new mysqli('127.0.0.1','root','123456','teach');
if(mysqli_connect_errno()){
	die("连接失败: ".mysqli_connect_error());
}
echo "连接成功<br>";

$mysqli->autocommit(0);##关闭自动提交
$error=true;
$price=50;
$sql="update zh set ye=ye-{$price} where name='zhangsan'";
$result=$mysqli->query($sql);
if(!$result){
	$error=false;
	echo "zhangsan zhuan zhang fail";
}else{
	if($mysqli->affected_rows==0){
		$error=false;
		echo "zhangsan money have none change";
	}else{
		$error=true;
		echo "zhangsan zhuan zhang {$price} yuan<br>";
	} 
}
$sql="update zh set ye=ye+{$price} where name='lisi'";
$result=$mysqli->query($sql);
if(!$result){
	$error=false;
	echo "lisi zhuan ru fail";
}else{
	if($mysqli->affected_rows==0){
		$error=false;
		echo "lisi money have none change";
	}else{
		$error=true;
		echo "lisi zhuan jieshou {$price} yuan<br>";
	} 
}
if($error){
	echo "zhangzhang ok";
	$mysqli->commit();
}else{
	echo 'zhuanzhang fail';
	$mysqli->rollback();
}
$mysqli->autocommit(1);##关闭自动提交
$mysqli->close();
?>
