<?php
session_start();
include "db.php";
if(!isset($_SESSION['user_name'])) echo("<script>location.href='login.html';</script>"); 
$searchSQL=$_GET['search'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>다모임</title>
	<link rel='icon' type='images/png'href='img/logo.png'>
	<link href="css/new_group_lookup.css" rel="stylesheet" type="text/css" />
	<link href="css/all.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
    	<div class="container2">
    		<span style="color: black;">그룹조회</span>
			<form method="POST" action="search.php">
				<div class="category_box">
					<div class="layout_box">
						<span>학과</span>
						<div class="layout" > 
							<label><input required type="radio" name="major" value="뉴미디어소프트웨어과"> 소프트웨어과</label>
							<label><input required type="radio" name="major" value="뉴미디어웹솔루션과"> 웹솔루션과</label>
							<label><input required type="radio" name="major" value="뉴미디어디자인과"> 디자인과</label>
						</div>
					</div>
					<div class="layout_box">
						<span>학년</span>
						<div class="layout">
							<label><input required type="radio" name="grade" value="1학년"> 1학년</label>
							<label><input required type="radio" name="grade" value="2학년"> 2학년</label>
							<label><input required type="radio" name="grade" value="3학년"> 3학년</label>
						</div>
					</div>
					<div class="layout_box">
						<span>카테고리</span>
						<div class="layout">
							<label><input required type="radio" name="category" value="취업 준비"> 취업 준비</label>
							<label><input required type="radio" name="category" value="전공과목 스터디"> 전공과목 스터디</label>
							<label><input required type="radio" name="category" value="인문과목 스터디"> 인문과목 스터디</label>
						</div>
					</div>
				</div>
				<div class="layout_box">
					<button id="submitBTN" type="submit">검색</button>		   
				</div>
			</form>
     		<div class="list">
				<?php
					if(isset($searchSQL)) {
						$sql = "select * from study ".$searchSQL;
						$sql1 = "select COUNT(*) FROM study ".$searchSQL;

					}
						
					else {
						$sql = "select * from study";
						$sql1 = "select COUNT(*) FROM study";
					}

					$cnt=mysqli_query($conn, $sql1);
					$result=mysqli_query($conn, $sql);
					if($result==0){
						?>
						<h2 style="padding-right: 8%;">조회 결과가 없습니다. 그룹을 생성해 보세요! </h2>
						<?php
					}else{
					while($row = mysqli_fetch_array($result)){
				?>
						<div class="list_box">
							<figure class="group_about_box">
								<img id="moim" src="<?php echo $row['img_path']; ?>">
								<figcaption>
									<br><br><br>  
									<h3 id="group_title"><?php echo $row['title']; ?></h3><br>
									<p id="group_about"><?php echo $row['intro']; ?> </p>
								</figcaption>
								<a href="group.php?title=<?php echo $row['title'];?>"></a>
							</figure>
						</div>
				 <?php
						}
					}
				 ?>
			</div>	
     	</div>
		</div>
		<div class="menu">
			<a href="main.php"><img id="logo" src="img/logo.png"></a>
			<h2>" 미림인이라면 다 모여라! "</h2>
			<a href="mypage.php"><h3 id="mypage">마이페이지</h3></a>
			<h3>|</h3>
			<a href="group_lookup.php"><h3 id="lookup">그룹조회</h3></a>
			<h3>|</h3>
			<a href="group_create.php"><h3 id="create">그룹생성</h3></a>
			<h3>|</h3>
			<a href="stop.html"><h3 id="recommand">추천받기</h3></a>
		</div>
	</div>


</body>
</html>