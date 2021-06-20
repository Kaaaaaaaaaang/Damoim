<?php

include "db.php";
session_start();

$id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$intro = $_POST['intro'];

$sql = "UPDATE user SET name='$name', email='$email', intro='$intro' WHERE id='$id'";

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
