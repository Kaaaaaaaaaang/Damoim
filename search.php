<?php

$major = $_POST['major'];
$grade = $_POST['grade'];
$category = $_POST['category'];

$sql = "where major='$major' and grade='$grade' and category='$category'";
?>
<script>
    location.href="group_lookup.php?search=<?php echo $sql;?>";
</script>