<?php

include "db.php";
session_start();

$user_name = $_SESSION['user_name'];
$name = $_POST['name'];

$sql = "DELETE FROM study WHERE title = '$name' and leader = 'user_name';";

$result = mysqli_query($conn, $sql);

if($result==true) {
?>
  <script>
      alert("그룹 삭제가 완료되었습니다.");
      location.href='mygroup.php';
  </script>

<?php
}else{
?>

<script>
    alert("그룹 삭제에 실패했습니다.");
    location.href='mygroup.php';
</script>

<?php
}
?>
