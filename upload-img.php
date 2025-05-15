<?php
$imgs = $_FILES['files']['name'];
$imgs_tmp = $_FILES['files']['tmp_name'];
$paths = "student_imgs/".$imgs;
move_uploaded_file($imgs_tmp, $paths);
echo '<img src="'.$paths.'" height="30" width="30" class="img-fluid" style="overflow:hidden;border-radius:50%;" />';
?>