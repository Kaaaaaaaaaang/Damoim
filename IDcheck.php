<?php

	include "db.php";
	$uid = $_GET["userID"];
	$sql = mysqli_query($conn,"select * from user where id='".$uid."'");
	$member = $sql->fetch_array();
	if($member==0)
	{
?>
	<div style='font-family:"malgun gothic"';><?php echo $uid; ?>는 사용가능한 아이디입니다.</div>
<?php 
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?> 사용중인 아이디입니다. <div>
<?php
	}
?>