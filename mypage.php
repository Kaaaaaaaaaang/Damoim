<?php
session_start();
include "db.php";
if(!isset($_SESSION['user_name'])) echo("<script>location.href='login.html';</script>"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>다모임</title>
     <link rel='icon' type='images/png'href='img/logo.png'>
	<link href="css/mypage.css" rel="stylesheet" type="text/css" />
     <link href="css/common.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow-x:hidden;">
     	<div class="container2" style="float: left;">
     		<div class="box" style="background: #BDBDBD;"><img id="profile_img" src="img/sample_proflie.png"></div>
               <?php
                    $sql = "SELECT * FROM user WHERE id ='".$_SESSION['user_id']."'";
                    $result=mysqli_query($conn, $sql)or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($result);
               ?>
     		<h3 id="mypage_name"><?php echo $row['id']?></h3>
     		<h3 id="mypage_school">미림여자정보과학고등학교</h3>
     		<h3 id="mypage_hakgwa"><?php echo $row['major']?></h3>
     		<h3 id="mypage_email"><?php echo $row['email']?></h3><br>
               <div class="mypage_about_box">
                    <p id="mypage_about">나를 소개 해봐요.</p>
               </div>
     		<a href="mypage_edit.php"><span>수정</span></a>
     		<span>|</span>
     		<span>탈퇴</span>
     	</div>
     	<div class="group_list" style="float: left;">
               <?php

               $sql1 = "select COUNT(*) FROM study where member like '%".$_SESSION['user_id']."%'";
               $cnt1=mysqli_query($conn, $sql1);

               $sql = "select * FROM study where member like '%".$_SESSION['user_id']."%'";
               $result=mysqli_query($conn, $sql);
               $row=mysqli_fetch_array($result);
               if($cnt == 0){
                    ?>
                    <h1>참여하는 모임이 없습니다.</h1>
                    <?php
               }else{
                    for($i=0; $i<$cnt1; $i++){
               ?>
                    <figure class="group_about_box">
          		<img id="group_img" src="img/group_img1.png">
                    <figcaption>
                         <br>
                        <h3 id="group_title"><?php $row['title'][$i]?></h3><br>
                        <p id="gro up_about"><?php $row['intro'][$i]?></p>
                    </figcaption>
                    <a href="my_group.html"></a>
               </figure>
               <?php
                    }
                    
               }
               ?>

               

     	</div>
          <!--하단 빈공간-->
          <div class="footer"></div>
          <!--상단메뉴-->
          <div class="menu">
			<a href="main.php"><img id="logo" src="img/logo.png"></a>
			<a href="mypage.php"><h3 id="mypage">마이페이지</h3></a>
			<h3>|</h3>
			<a href="group_lookup.php"><h3 id="lookup">그룹조회</h3></a>
			<h3>|</h3>
			<a href="group_create.php"><h3 id="create">그룹생성</h3></a>
			<h3>|</h3>
			<a href="recommand.php"><h3 id="recommand">추천받기</h3></a>
		</div>
<script type="text/javascript" src="js/mypage.js"></script> 
</body>
</html>
  