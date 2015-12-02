<?php
header('Content-type: text/html; charset=utf-8');
$mysqli=@new mysqli('127.0.0.1','root','123456','teach');
if(mysqli_connect_errno()){
	die("连接失败: ".mysqli_connect_error());
}
echo "连接成功<br>";

echo 'character_set_name:'.$mysqli->character_set_name()."<br>";
echo 'get_client_info:'.$mysqli->get_client_info()."<br>";
echo 'host_info:'.$mysqli->host_info."<br>";
echo 'server_info:'.$mysqli->server_info."<br>";

for($i=0;$i<20;$i++){
	$b=34.56+$i*2+$b;
	$c=22+$i*3+$c;
	$sql="insert into shops set name='hello{$i}',price={$b},num={$c},desn='good{$i}'";
	print $sql;
	$result=$mysqli->query($sql);
	if($result){
		echo "$sql is ok\n";
	}else{
		echo "$sql is error\n";
	}
}
$mysqli->close();
?>
