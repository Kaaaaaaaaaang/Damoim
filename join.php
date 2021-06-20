<?php
include "db.php";

$id=$_POST['userID'];
$pw=$_POST['userPass'];
$name=$_POST['userName'];
$email=$_POST['userEmail'];
$major=$_POST['userMajor'];
$grade = $_POST['userGrade'];

$sql  = "INSERT INTO user (id,pass,name,email,major,grade,img_path,intro) VALUES ('$id','$pw','$name','$email','$major','$grade','./img/sample_profile.png','나를 소개하세요.')";

$result = mysqli_query($conn, $sql);
if($result==true){
?>
<script>
    alert("회원가입이 완료되었습니다. 로그인 후 이용해 주세요");
    location.href='main.php';
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
