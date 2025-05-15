<?php
if($_FILES["file"]["name"] != '')
{
    
 $test = $_FILES["file"]["name"];
 $test_tmp = $_FILES["file"]["tmp_name"];
 $location = './staff_imgs/' . $test;  
 move_uploaded_file($test_tmp,$location);
 echo '<img src="'.$location.'" height="50" width="50" class="img-fluid" style="overflow:hidden;border-radius:50%;" />';
}
?>
