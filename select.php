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
$sql='select current_user();desc shops;select * from shops;select current_date()';
$ret=$mysqli->multi_query($sql);
if($ret){
	echo "$sql is ok\n";
	do{
		$result=$mysqli->store_result();
		echo '<table align="center" border="1" width="'.(150*$mysqli->field_count).'">';
		echo '<tr>';
		while($field=$result->fetch_field()){
			echo '<th>'.$field->name.'</th>';
		}
		echo '</tr>';
		while($row=$result->fetch_assoc()){
			echo '<tr>';
			foreach($row as $col){
				echo '<td>'.$col.'</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
	if($mysqli->more_results()){
		echo '<p>--<p>--<p>';
	}
	}while($mysqli->next_result());
}else{
	echo "$sql is error\n".$mysqli->errno.'--'.$mysqli->error;
}

$mysqli->close();
?>
