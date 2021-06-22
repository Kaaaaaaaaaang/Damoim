<?php
session_start();
include "db.php";
if(!isset($_SESSION['user_name'])) echo("<script>location.href='login.html';</script>"); 
$group_title=$_GET['title'];

$sql = "SELECT * FROM study WHERE title ='".$group_title."'";
$result=mysqli_query($conn, $sql)or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);

$sql2 = "SELECT * FROM user WHERE id ='".$row['leader']."'";
$result2=mysqli_query($conn, $sql2)or die(mysqli_error($conn));
$row2=mysqli_fetch_array($result2);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>다모임</title>
  <link rel='icon' type='images/png'href='img/logo.png'>
	<link href="css/group.css" rel="stylesheet" type="text/css" />
  <link href="css/common.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow-x:hidden;">
<div class="container">
    <div class="container2">
      <h3 id="hashtag"></h3>
      <h3 id="title" style="float: left;"><?php echo $row['title'];?></h3><br>
      <hr>
      <div class="about_box">
        <h2>스터디 소개</h2>
        <div class="ab">
          <p id="group_about">
            <?php echo $row['intro'];?>
          </p>
        </div>
      </div>
      <hr style="margin-top: 45%;">
      <div class="head_about_box">
        <div class="box">
          <h2>모임장 소개</h2><br>
          <img id="head_profile_img" src="img/sample_proflie.png"><br>
          <span id="head_name"><?php echo $row2['name'];?></span><br>
          <span id="head_hakgwa"><?php echo $row2['major'];?></span><br>
          <span id="head_age"><?php echo $row2['grade'];?></span>
        </div>
        <div class="ab">
          <p id="head_about">
            <? echo $row2['intro'];?>
          </p>
        </div>
      </div>
      <hr style="margin-top: 45%;">
      <div class="information_box">
      <h2>상세한 정보</h2>
      <div class="ab">
      <span>학년</span> <span id="age"><?php echo $row['grade'];?></span> | 
      <span>인원</span> <span id="people"><?php echo $row['max_mem'];?></span><span>명</span><br>
      <span>날짜</span> <span id="day">주말</span> |
      <span>시간</span> <span id="time"><?php echo $row['start_time'];?>시 - <?php echo $row['end_time'];?>시</span>
      </div>
      </div>
      <?php
        if($row['leader']==$_SESSION['user_id']){
          ?>
          <button id="group_apply_btn" onclick="location.href='login.html'">모임 수정 / 삭제하기</button><br><br>
          <button id="group_apply_btn" onclick="location.href='login.html'">멤버확인하기</button><br><br>
          <?
        }else if(in_array($_SESSION['user_id'],$row['member'])){
          ?>
          <button id="group_apply_btn" onclick="location.href='login.html'">모임 탈퇴하기</button><br><br>
          <?
        }else{
          ?><button id="group_apply_btn" onclick="location.href='login.html'">모임 가입 신청하기</button><br><br><?
        }
      ?>
      
    </div>
  </div>
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
  </div>
</body>
</html>