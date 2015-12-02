<?php
$mysqli=new mysqli("127.0.0.1",'root','123456','teach');
#$stmt=$mysqli->stmt_init();
$sql="insert into shops(name,price,num,desn) values(?,?,?,?)";
#$stmt->prepare($sql);
$stmt=$mysqli->prepare($sql);
$stmt->bind_param('sdis',$name,$price,$num,$desn);
$name="zhangsan";
$price="33,4";
$num='44';
$desn="zhangsan de ge";
$stmt->execute();
$name="lisi";
$price="32,4";
$num='40';
$desn="lisi de ge";
$stmt->execute();
$name="wangwu";
$price="3,4";
$num='90';
$desn="select * from shops";
$stmt->execute();
echo '最后的ID: '.$stmt->insert_id.'<br>';
echo '影响了: '.$stmt->affected_rows.'行<br>';
$stmt->close();
?>
