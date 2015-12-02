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
$sql="delete from shops where id=20";
$result=$mysqli->query($sql);
	if($result){
		echo "$sql is ok\n";
	}else{
		echo "$sql is error\n";
	}
$num=$mysqli->affected_rows;
if($num>0){
	echo "影响了{$num}个数据\n";
}else{
	echo "没有影响\n";
}
echo '最后自动增加的ID:'.$mysqli->insert_id;
echo '最后自动增加的ID:'.$mysqli->last_id;

$mysqli->close();
?>
