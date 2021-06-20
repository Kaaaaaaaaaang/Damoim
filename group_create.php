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
	<link href="css/group_create.css" rel="stylesheet" type="text/css" />
	<link href="css/common.css" rel="stylesheet" type="text/css" />
	<meta content="BlendTrans(Duration=0.2)" http-equiv="Page-Enter">
	<meta content="BlendTrans(Duration=0.2)" http-equiv="Page-exit">
</head>
<body>
	<div class="container">
     	<div class="container2">
     		<form method="post" action="group_create2.php"  enctype="multipart/form-data">
			  <select name="people" style="color: #000000; background-color: #00000000; float: left; margin-left: 4.7%;">
			    <option value="none" style="color: #000000;">모임 최대 인원수</option>
			    <option value="1" style="color: #000000;">1명</option>
			    <option value="2" style="color: #000000;">2명</option>
			    <option value="3" style="color: #000000;">3명</option>
				<option value="4" style="color: #000000;">4명</option>
				<option value="5" style="color: #000000;">5명</option>
				<option value="6" style="color: #000000;">6명</option>
			    <option value="7" style="color: #000000;">7명</option>
			    <option value="8" style="color: #000000;">8명</option>
			    <option value="9" style="color: #000000;">9명</option>
			    <option value="10" style="color: #000000;">10명</option>
			  </select>
			  <select name="category" style="color: #000000; background-color: #00000000; margin-left: 5%;">
			    <option value="none" style="color: #000000;">카테고리</option>
			    <option value="employment" style="color: #000000;">취업 준비</option>
			    <option value="programming" style="color: #000000;">전공과목 스터디</option>
			    <option value="general_subject" style="color: #000000;">인문과목 스터디</option>
			  </select>
				<div class="layout_group_title_box">
					<input type="text" name="group_name" id="group_name" placeholder="모임명" style="color: #000000;">
				</div>
				<div class="layout_box">
					<span>가입 가능 학년</span>
					<div class="layout">
						<label><input type="checkbox" name="grade[]" value="1학년"> 1학년</label>
	      		<label><input type="checkbox" name="grade[]" value="2학년"> 2학년</label>
	      		<label><input type="checkbox" name="grade[]" value="3학년"> 3학년</label>
	      	</div>
      	</div>
      	<div class="layout_box">
					<span>학과</span>
					<div class="layout">
						<label><input type="checkbox" name="major[]" value="soft"> 소프트웨어</label>
	      		<label><input type="checkbox" name="major[]" value="web"> 웹솔루션</label>
	      		<label><input type="checkbox" name="major[]" value="design"> 디자인</label>
	      	</div>
	    	</div>
	      <div class="layout_box">
					<span>모임 방법</span>
					<div class="layout">
						<label><input type="checkbox" name="how" value="online"> 온라인</label>
	      		<label><input type="checkbox" name="how" value="offline"> 오프라인</label>
	      	</div>
	    	</div>
	    	<div class="layout_box">
					<span>모임 날짜</span>
					<div class="layout">
						<label><input type="checkbox" name="day[]" value="mon"> 월요일</label>
	      		<label><input type="checkbox" name="day[]" value="tue"> 화요일</label>
	      		<label><input type="checkbox" name="day[]" value="wed"> 수요일</label>
	      		<label><input type="checkbox" name="day[]" value="thu"> 목요일</label>
	      		<label><input type="checkbox" name="day[]" value="fri"> 금요일</label>
	      		<label><input type="checkbox" name="day[]" value="weekend"> 주말</label>
	      	</div>
	      </div>
	      <div class="layout_box">
					<span>모임 시간</span>
					<div class="layout">
						<input type='number' name="start" id="start_time" maxlength='2'></input>
						<span style="margin-right: 5%; margin-left: 0%;">시 &nbsp;&nbsp; ~</span>
						<input type='number' name="end" id="end_time" maxlength='2'></input>
						<span style="margin-left: 0%;">시</span>
					</div>
				</div>
				<div class="layout_group_about_box">
					<span>모임 설명</span>
					<br>
					<textarea id="about" name="intro"></textarea>
				</div>
				<div class="layout_group_img">
					<span>그룹 사진</span>
					<input type="file" id="group_img_src" name="study_img"></input>
				</div>
     		<button id="group_create_btn" onclick="location.href='group_create2.php'" style="margin-bottom: 30%;" type="submit">모임 생성하기</button>
     	</form>
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
	<script type="text/javascript" src="js/group_create.js"></script>
</body>
</html>