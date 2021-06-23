<?php

include "db.php";
session_start();

$id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$intro = $_POST['intro'];

$sql = "SELECT * FROM user WHERE id ='".$id."'";
$result=mysqli_query($conn, $sql)or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
if($_FILES['img_path']['name']==null) {
  $uploadfile = $row['img_path'];
} else {
  $uploaddir = 'profile/';
  $uploadfile = $uploaddir.$_FILES['img_path']['name'];
  $f_name = $_FILES['img_path']['name'];
  $f_type = $_FILES['img_path']['type'];
  $f_size = $_FILES['img_path']['size'];
  $tmp_name= $_FILES['img_path']['tmp_name'];
  $img_ad = $uploadfile;
  if(move_uploaded_file($_FILES['img_path']['tmp_name'], $uploadfile)){
    $img_ad = $uploadfile;
    move_uploaded_file($tmp_name,$uploaddir);
  }
  echo $uploadfile;
}


$sql = "UPDATE user SET name='$name', email='$email', img_path='$uploadfile', intro='$intro' WHERE id='$id';";

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
