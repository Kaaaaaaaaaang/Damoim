<?php

include "db.php";
session_start();

$id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$intro = $_POST['intro'];

$uploaddir = '../profile/';
echo $_FILES['img_path']['name']."<br>";
echo $_FILES['img_path']['type']."<br>";
echo $_FILES['img_path']['size']."<br>";
echo $_FILES['img_path']['tmp_name']."<br>";
echo $_FILES['img_path']['error']."<br>";

$uploadfile = $uploaddir.$_FILES['img_path']['name'];
$f_name = $_FILES['img_path']['name'];
$f_type = $_FILES['img_path']['type'];
$f_size = $_FILES['img_path']['size'];
$tmp_name= $_FILES['img_path']['tmp_name'];
$profile_image = $uploadfile;

if(move_uploaded_file($_FILES['img_path']['tmp_name'], $uploadfile)){
  $profile_image = $uploadfile;
  move_uploaded_file($tmp_name,$uploaddir);
}
echo $uploadfile;

$sql = "UPDATE user SET name='$name', email='$email', img_path='$profile_image', intro='$intro' WHERE id='$id';";

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
