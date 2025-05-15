<?php
require_once("source/head-section.php"); 

if(isset($_POST['input'])){
    
    $input = $_POST['input'];
    
$result = mysqli_query($con,"select * from itemRecord where item LIKE '{$input}%' && institute_id='$userId'");

if(mysqli_num_rows($result) == 1){ 
while($row = mysqli_fetch_array($result)){
    
    
    $sale_unit_price = $row['sale_unit_price'];
    $instituteId = $row['instituteId'];
?>
<input value="<?php echo $sale_unit_price; ?>" type="text">
<?php
}  
}elseif(mysqli_num_rows($result) == 0){
    echo "<div class='alert alert-danger text-uppercase'> there are no record.</div>";
}  
    }
?>