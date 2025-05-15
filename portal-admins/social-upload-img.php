<?php
$imgs = $_FILES['files']['name'];
$imgs_tmp = $_FILES['files']['tmp_name'];
$paths = "social-post/".$imgs;
move_uploaded_file($imgs_tmp, $paths);
echo '<img src="'.$paths.'" height="50" width="50" class="img-fluid" style="overflow:hidden;border-radius:50%;" />';
?>