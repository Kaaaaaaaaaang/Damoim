<?php

include "db.php";
session_start();

$id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$intro = $_POST['intro'];
$img_path = $_['profile_img'];

$uploaddir = 'profile/';
echo $_FILES['profile_img']['name']."<br>";
echo $_FILES['profile_img']['type']."<br>";
echo $_FILES['profile_img']['size']."<br>";
echo $_FILES['profile_img']['tmp_name']."<br>";
echo $_FILES['profile_img']['error']."<br>";

$uploadfile = $uploaddir.$_FILES['profile_img']['name'];
$f_name = $_FILES['profile_img']['name'];
$f_type = $_FILES['profile_img']['type'];
$f_size = $_FILES['profile_img']['size'];
$tmp_name= $_FILES['profile_img']['tmp_name'];
$img_path = $uploadfile;

if(move_uploaded_file($_FILES['profile_img']['tmp_name'], $uploadfile)){
  $img_path = $uploadfile;
  move_uploaded_file($tmp_name,$uploaddir);
}
echo $uploadfile;

$sql = "UPDATE user SET name='$name', email='$email', intro='$intro' img_path='$img_path' WHERE id='$id'";

$result = mysqli_query($conn, $sql);

if($result==true){
?>
  <script>
      alert("프로필 수정이 완료되었습니다.");
      location.href='mypage.php';
  </script>

<?php
}else{
?>

<script>
    alert("프로필 수정에 실패했습니다.");
    location.href='mypage.php';
</script>

<?php
}
?>
