<?php
include "db.php";

$id=$_POST['userID'];
$pw=$_POST['userPass'];
$name=$_POST['userName'];
$email=$_POST['userEmail'];
$major=$_POST['userMajor'];


if($major=="soft") $major = "뉴미디어 소프트웨어과";
else if($major=="web")$major = "뉴미디어 웹솔루션과";
else if($major=="design")$major = "뉴미디어 디자인과";

$sql  = "INSERT INTO user (id,pass,name,email,major) VALUES ('$id','$pw','$name','$email','$major')";
$result = mysqli_query($conn, $sql);
if($result==true){
?>
<script>
    alert("회원가입이 완료되었습니다. 로그인 후 이용해 주세요");
    location.href='main.html';
</script>
<?php
}else{
?>
<script>
    alert("아이디와 비밀번호를 다시 확인해 주세요");
    location.href='join.html';
</script>   

<?php
}
?>
