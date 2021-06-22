<?php

$major = $_POST['major'];
$grade = $_POST['grade'];
$category = $_POST['category'];

$sql = "where '$major' in ('뉴미디어소프트웨어과', '뉴미디어웹솔루션과', '뉴미디어디자인과') and '$grade' in ('1학년', '2학년', '3학년') and category='$category';";
?>
<script>
    location.href="group_lookup.php?search=<?php echo $sql;?>";
</script>