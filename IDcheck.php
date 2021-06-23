<?php

	include "db.php";
	$uid = $_GET["userID"];
	$sql = mysqli_query($conn,"select * from user where id='".$uid."'");
	$member = $sql->fetch_array();
	if($member==0)
	{
?>
	<script>alert("사용 가능한 아이디입니다");</script>
<?php 
	}else{
?>
	<script>alert("이미 사용 중인 아이디입니다");</script>
<?php
	}
?>