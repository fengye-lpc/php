<?php
$mysqli=new mysqli("127.0.0.1",'root','123456','teach');
$sql="select * from stu_view order by phpc";
$result=$mysqli->query($sql);
echo '<table align="center" border="1" width="800">';
echo '<caption><h1>mysql view damo</h1>/caption>';
while($row=$result->fetch_assoc()){
	echo '<tr>';
	foreach($row as $col){
		echo "<td>{$col}</td>";
	}
	echo '</tr>';
}
echo '</table>';
$mysqli->close();
?>
