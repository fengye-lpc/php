<?php
$mysqli=new mysqli("127.0.0.1",'root','123456','teach');
$sql="select id,name,price,num,desn from shops where id=?";
$stmt=$mysqli->prepare($sql);
$stmt->bind_param('i',$id);
$stmt->bind_result($id,$name,$price,$num,$desn);
$id=45;
$stmt->execute();
$stmt->store_result();
#$stmt->data_seek(1);
$result=$stmt->result_metadata();
var_dump($result);
while($stmt->fetch()){
	echo "$id--$name--$price--$num--$desn<br>";
}
echo "记录总数:".$stmt->num_rows;
$stmt->free_result();
/*
$id=40;
$stmt->execute();
$stmt->fetch();
echo "$id--$name--$price--$num--$desn<br>";
$id=20;
$stmt->execute();
$stmt->fetch();
echo "$id--$name--$price--$num--$desn<br>";
*/
$stmt->close();
?>
