<?php

$major = $_POST['major'];
$age = $_POST['age'];
$category = $_POST['category'];

$sql = "major=$major and grage=$age and category=$category";

?>
<script>
    location.href='group_lookup.php?search=<?echo $sql?>';
</script>