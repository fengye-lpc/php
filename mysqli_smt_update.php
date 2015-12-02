<?php
$mysqli=new mysqli("127.0.0.1",'root','123456','teach');
#$stmt=$mysqli->stmt_init();
$sql="update shops set name=?,price=?,num=?,desn=? where id=?";
#$stmt->prepare($sql);
$stmt=$mysqli->prepare($sql);
$stmt->bind_param('sdisi',$name,$price,$num,$desn,$id);
$name="zhangsan";
$price="12.45";
$num='40';
$desn="zhangsan de ge";
$id=45;
$stmt->execute();
$name="lisi";
$price="3,4";
$num='4';
$desn="lisi de ge";
$id=46;
$stmt->execute();
$name="wangwu";
$price="30,4";
$num='90';
$desn="select * from shops";
$id=47;
$stmt->execute();
echo '最后的ID: '.$stmt->insert_id.'<br>';
echo '影响了: '.$stmt->affected_rows.'行<br>';
$stmt->close();
?>
