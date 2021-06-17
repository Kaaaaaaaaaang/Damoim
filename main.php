<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>다모임</title>
	<link rel='icon' type='images/png'href='img/logo.png'>
	<link href="css/main.css" rel="stylesheet" type="text/css" />
	<link href="css/common.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow:hidden;">
	<div class="container">
		<video muted autoplay loop>
        	<source src="img/background.mp4" type="video/mp4">
     	</video>
     	<div class="background_box"></div>
     	<div class="container2">
     		<h3>다모임</h3>
     		<p>미림인이라면 여기로 다 모여라!</p>
     		<p>미림인이 다모인 여기, 같이 공부합시다!</p>
     		

			<?php
				session_start();
				if(isset($_SESSION['user_name'])){?>
					<button onclick="location.href='recommand.html'">모임 추천받기</button>
				<?php
				}else{
				?>
					<button onclick="location.href='login.html'">다모임 가입하기</button>
				<?php
				}
			?>
     	</div>
		 <div class="menu">
			<a href="main.php"><img id="logo" src="img/logo.png"></a>
			<a href="mypage.html"><h3 id="mypage">마이페이지</h3></a>
			<h3>|</h3>
			<a href="group_lookup.html"><h3 id="lookup">그룹조회</h3></a>
			<h3>|</h3>
			<a href="group_create.html"><h3 id="create">그룹생성</h3></a>
			<h3>|</h3>
			<a href="recommand.html"><h3 id="recommand">추천받기</h3></a>
		</div>
	</div>
</body>
</html>