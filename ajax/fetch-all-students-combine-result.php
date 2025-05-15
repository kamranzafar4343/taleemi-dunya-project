<?php
require_once("../functions/db.php");

$aply_cles = $_POST['aply_cles'];
$sectns = $_POST['sectns'];
$aply_inst = $_POST['aply_inst'];
$aply_sesin = $_POST['aply_sesin'];



$usr = mysqli_query($con,"select * from confirmSchools where institute_id='$aply_inst'");
$row = mysqli_fetch_assoc($usr);
$mainid = $row['id'];
$userId = $row['institute_id'];
$user = $row['owner_name'];
$instituteName = $row['institute_name'];
$campus = $row['campus'];
$email = $row['e_mail'];
$mainaddress = $row['address'];
$cell = $row['cell'];
$image = $row['logo'];
$role = $row['assign_role'];

$rank = 1;

$cbminereslts = mysqli_query($con,"select * from finalCombineResults where instituteId='$aply_inst' && session='$aply_sesin' && class='$aply_cles' && section='$sectns' order by grand_obtained desc");
while($rank <= 10000 && $results = mysqli_fetch_array($cbminereslts)){

$instituteId = $results['instituteId'];
$roll_number = $results['roll_number'];
$session = $results['session'];
$student_name = $results['student_name'];
$father_name = $results['father_name'];
$student_image = $results['student_image'];
$class = $results['class'];
$section = $results['section'];
$test1 = $results['test1'];
$test2 = $results['test2'];
$test3 = $results['test3'];
$test4 = $results['test4'];
$test5 = $results['test5'];
$test6 = $results['test6'];
$test7 = $results['test7'];
$test8 = $results['test8'];
$test9 = $results['test9'];
$test10 = $results['test10'];
$test11 = $results['test11'];
$test12 = $results['test12'];

$test1_total1 = $results['test1_total1'];
$test1_obt1 = $results['test1_obt1'];
$test2_total1 = $results['test2_total1'];
$test2_obt1 = $results['test2_obt1'];
$test3_total1 = $results['test3_total1'];
$test3_obt1 = $results['test3_obt1'];
$test4_total1 = $results['test4_total1'];
$test4_obt1 = $results['test4_obt1'];
$test5_total1 = $results['test5_total1'];
$test5_obt1 = $results['test5_obt1'];
$test6_total1 = $results['test6_total1'];
$test6_obt1 = $results['test6_obt1'];
$test7_total1 = $results['test7_total1'];
$test7_obt1 = $results['test7_obt1'];
$test8_total1 = $results['test8_total1'];
$test8_obt1 = $results['test8_obt1'];
$test9_total1 = $results['test9_total1'];
$test9_obt1 = $results['test9_obt1'];
$test10_total1 = $results['test10_total1'];
$test10_obt1 = $results['test10_obt1'];
$test11_total1 = $results['test11_total1'];
$test11_obt1 = $results['test11_obt1'];
$test12_total1 = $results['test12_total1'];
$test12_obt1 = $results['test12_obt1'];

$test1_total2 = $results['test1_total2'];
$test1_obt2 = $results['test1_obt2'];
$test2_total2 = $results['test2_total2'];
$test2_obt2 = $results['test2_obt2'];
$test3_total2 = $results['test3_total2'];
$test3_obt2 = $results['test3_obt2'];
$test4_total2 = $results['test4_total2'];
$test4_obt2 = $results['test4_obt2'];
$test5_total2 = $results['test5_total2'];
$test5_obt2 = $results['test5_obt2'];
$test6_total2 = $results['test6_total2'];
$test6_obt2 = $results['test6_obt2'];
$test7_total2 = $results['test7_total2'];
$test7_obt2 = $results['test7_obt2'];
$test8_total2 = $results['test8_total2'];
$test8_obt2 = $results['test8_obt2'];
$test9_total2 = $results['test9_total2'];
$test9_obt2 = $results['test9_obt2'];
$test10_total2 = $results['test10_total2'];
$test10_obt2 = $results['test10_obt2'];
$test11_total2 = $results['test11_total2'];
$test11_obt2 = $results['test11_obt2'];
$test12_total2 = $results['test12_total2'];
$test12_obt2 = $results['test12_obt2'];

$test1_total3 = $results['test1_total3'];
$test1_obt3 = $results['test1_obt3'];
$test2_total3 = $results['test2_total3'];
$test2_obt3 = $results['test2_obt3'];
$test3_total3 = $results['test3_total3'];
$test3_obt3 = $results['test3_obt3'];
$test4_total3 = $results['test4_total3'];
$test4_obt3 = $results['test4_obt3'];
$test5_total3 = $results['test5_total3'];
$test5_obt3 = $results['test5_obt3'];
$test6_total3 = $results['test6_total3'];
$test6_obt3 = $results['test6_obt3'];
$test7_total3 = $results['test7_total3'];
$test7_obt3 = $results['test7_obt3'];
$test8_total3 = $results['test8_total3'];
$test8_obt3 = $results['test8_obt3'];
$test9_total3 = $results['test9_total3'];
$test9_obt3 = $results['test9_obt3'];
$test10_total3 = $results['test10_total3'];
$test10_obt3 = $results['test10_obt3'];
$test11_total3 = $results['test11_total3'];
$test11_obt3 = $results['test11_obt3'];
$test12_total3 = $results['test12_total3'];
$test12_obt3 = $results['test12_obt3'];

$test1_total4 = $results['test1_total4'];
$test1_obt4 = $results['test1_obt4'];
$test2_total4 = $results['test2_total4'];
$test2_obt4 = $results['test2_obt4'];
$test3_total4 = $results['test3_total4'];
$test3_obt4 = $results['test3_obt4'];
$test4_total4 = $results['test4_total4'];
$test4_obt4 = $results['test4_obt4'];
$test5_total4 = $results['test5_total4'];
$test5_obt4 = $results['test5_obt4'];
$test6_total4 = $results['test6_total4'];
$test6_obt4 = $results['test6_obt4'];
$test7_total4 = $results['test7_total4'];
$test7_obt4 = $results['test7_obt4'];
$test8_total4 = $results['test8_total4'];
$test8_obt4 = $results['test8_obt4'];
$test9_total4 = $results['test9_total4'];
$test9_obt4 = $results['test9_obt4'];
$test10_total4 = $results['test10_total4'];
$test10_obt4 = $results['test10_obt4'];
$test11_total4 = $results['test11_total4'];
$test11_obt4 = $results['test11_obt4'];
$test12_total4 = $results['test12_total4'];
$test12_obt4 = $results['test12_obt4'];

$test1_total5 = $results['test1_total5'];
$test1_obt5 = $results['test1_obt5'];
$test2_total5 = $results['test2_total5'];
$test2_obt5 = $results['test2_obt5'];
$test3_total5 = $results['test3_total5'];
$test3_obt5 = $results['test3_obt5'];
$test4_total5 = $results['test4_total5'];
$test4_obt5 = $results['test4_obt5'];
$test5_total5 = $results['test5_total5'];
$test5_obt5 = $results['test5_obt5'];
$test6_total5 = $results['test6_total5'];
$test6_obt5 = $results['test6_obt5'];
$test7_total5 = $results['test7_total5'];
$test7_obt5 = $results['test7_obt5'];
$test8_total5 = $results['test8_total5'];
$test8_obt5 = $results['test8_obt5'];
$test9_total5 = $results['test9_total5'];
$test9_obt5 = $results['test9_obt5'];
$test10_total5 = $results['test10_total5'];
$test10_obt5 = $results['test10_obt5'];
$test11_total5 = $results['test11_total5'];
$test11_obt5 = $results['test11_obt5'];
$test12_total5 = $results['test12_total5'];
$test12_obt5 = $results['test12_obt5'];

$test1_total6 = $results['test1_total6'];
$test1_obt6 = $results['test1_obt6'];
$test2_total6 = $results['test2_total6'];
$test2_obt6 = $results['test2_obt6'];
$test3_total6 = $results['test3_total6'];
$test3_obt6 = $results['test3_obt6'];
$test4_total6 = $results['test4_total6'];
$test4_obt6 = $results['test4_obt6'];
$test5_total6 = $results['test5_total6'];
$test5_obt6 = $results['test5_obt6'];
$test6_total6 = $results['test6_total6'];
$test6_obt6 = $results['test6_obt6'];
$test7_total6 = $results['test7_total6'];
$test7_obt6 = $results['test7_obt6'];
$test8_total6 = $results['test8_total6'];
$test8_obt6 = $results['test8_obt6'];
$test9_total6 = $results['test9_total6'];
$test9_obt6 = $results['test9_obt6'];
$test10_total6 = $results['test10_total6'];
$test10_obt6 = $results['test10_obt6'];
$test11_total6 = $results['test11_total6'];
$test11_obt6 = $results['test11_obt6'];
$test12_total6 = $results['test12_total6'];
$test12_obt6 = $results['test12_obt6'];

$test1_total7 = $results['test1_total7'];
$test1_obt7 = $results['test1_obt7'];
$test2_total7 = $results['test2_total7'];
$test2_obt7 = $results['test2_obt7'];
$test3_total7 = $results['test3_total7'];
$test3_obt7 = $results['test3_obt7'];
$test4_total7 = $results['test4_total7'];
$test4_obt7 = $results['test4_obt7'];
$test5_total7 = $results['test5_total7'];
$test5_obt7 = $results['test5_obt7'];
$test6_total7 = $results['test6_total7'];
$test6_obt7 = $results['test6_obt7'];
$test7_total7 = $results['test7_total7'];
$test7_obt7 = $results['test7_obt7'];
$test8_total7 = $results['test8_total7'];
$test8_obt7 = $results['test8_obt7'];
$test9_total7 = $results['test9_total7'];
$test9_obt7 = $results['test9_obt7'];
$test10_total7 = $results['test10_total7'];
$test10_obt7 = $results['test10_obt7'];
$test11_total7 = $results['test11_total7'];
$test11_obt7 = $results['test11_obt7'];
$test12_total7 = $results['test12_total7'];
$test12_obt7 = $results['test12_obt7'];

$test1_total8 = $results['test1_total8'];
$test1_obt8 = $results['test1_obt8'];
$test2_total8 = $results['test2_total8'];
$test2_obt8 = $results['test2_obt8'];
$test3_total8 = $results['test3_total8'];
$test3_obt8 = $results['test3_obt8'];
$test4_total8 = $results['test4_total8'];
$test4_obt8 = $results['test4_obt8'];
$test5_total8 = $results['test5_total8'];
$test5_obt8 = $results['test5_obt8'];
$test6_total8 = $results['test6_total8'];
$test6_obt8 = $results['test6_obt8'];
$test7_total8 = $results['test7_total8'];
$test7_obt8 = $results['test7_obt8'];
$test8_total8 = $results['test8_total8'];
$test8_obt8 = $results['test8_obt8'];
$test9_total8 = $results['test9_total8'];
$test9_obt8 = $results['test9_obt8'];
$test10_total8 = $results['test10_total8'];
$test10_obt8 = $results['test10_obt8'];
$test11_total8 = $results['test11_total8'];
$test11_obt8 = $results['test11_obt8'];
$test12_total8 = $results['test12_total8'];
$test12_obt8 = $results['test12_obt8'];

$test1_total9 = $results['test1_total9'];
$test1_obt9 = $results['test1_obt9'];
$test2_total9 = $results['test2_total9'];
$test2_obt9 = $results['test2_obt9'];
$test3_total9 = $results['test3_total9'];
$test3_obt9 = $results['test3_obt9'];
$test4_total9 = $results['test4_total9'];
$test4_obt9 = $results['test4_obt9'];
$test5_total9 = $results['test5_total9'];
$test5_obt9 = $results['test5_obt9'];
$test6_total9 = $results['test6_total9'];
$test6_obt9 = $results['test6_obt9'];
$test7_total9 = $results['test7_total9'];
$test7_obt9 = $results['test7_obt9'];
$test8_total9 = $results['test8_total9'];
$test8_obt9 = $results['test8_obt9'];
$test9_total9 = $results['test9_total9'];
$test9_obt9 = $results['test9_obt9'];
$test10_total9 = $results['test10_total9'];
$test10_obt9 = $results['test10_obt9'];
$test11_total9 = $results['test11_total9'];
$test11_obt9 = $results['test11_obt9'];
$test12_total9 = $results['test12_total9'];
$test12_obt9 = $results['test12_obt9'];

$test1_total10 = $results['test1_total10'];
$test1_obt10 = $results['test1_obt10'];
$test2_total10 = $results['test2_total10'];
$test2_obt10 = $results['test2_obt10'];
$test3_total10 = $results['test3_total10'];
$test3_obt10 = $results['test3_obt10'];
$test4_total10 = $results['test4_total10'];
$test4_obt10 = $results['test4_obt10'];
$test5_total10 = $results['test5_total10'];
$test5_obt10 = $results['test5_obt10'];
$test6_total10 = $results['test6_total10'];
$test6_obt10 = $results['test6_obt10'];
$test7_total10 = $results['test7_total10'];
$test7_obt10 = $results['test7_obt10'];
$test8_total10 = $results['test8_total10'];
$test8_obt10 = $results['test8_obt10'];
$test9_total10 = $results['test9_total10'];
$test9_obt10 = $results['test9_obt10'];
$test10_total10 = $results['test10_total10'];
$test10_obt10 = $results['test10_obt10'];
$test11_total10 = $results['test11_total10'];
$test11_obt10 = $results['test11_obt10'];
$test12_total10 = $results['test12_total10'];
$test12_obt10 = $results['test12_obt10'];

$test1_alltotals1 = $results['test1_alltotals1'];
$test1_allobtn1 = $results['test1_allobtn1'];
$test2_alltotals2 = $results['test2_alltotals2'];
$test2_allobtn2 = $results['test2_allobtn2'];
$test3_alltotals3 = $results['test3_alltotals3'];
$test3_allobtn3 = $results['test3_allobtn3'];
$test4_alltotals4 = $results['test4_alltotals4'];
$test4_allobtn4 = $results['test4_allobtn4'];
$test5_alltotals5 = $results['test5_alltotals5'];
$test5_allobtn5 = $results['test5_allobtn5'];
$test6_alltotals6 = $results['test6_alltotals6'];
$test6_allobtn6 = $results['test6_allobtn6'];
$test7_alltotals7 = $results['test7_alltotals7'];
$test7_allobtn7 = $results['test7_allobtn7'];
$test8_alltotals8 = $results['test8_alltotals8'];
$test8_allobtn8 = $results['test8_allobtn8'];
$test9_alltotals9 = $results['test9_alltotals9'];
$test9_allobtn9 = $results['test9_allobtn9'];
$test10_alltotals10 = $results['test10_alltotals10'];
$test10_allobtn10 = $results['test10_allobtn10'];
$test11_alltotals11 = $results['test11_alltotals11'];
$test11_allobtn11 = $results['test11_allobtn11'];
$test12_alltotals12 = $results['test12_alltotals12'];
$test12_allobtn12 = $results['test12_allobtn12'];

$subject1 = $results['subject1'];
$subject2 = $results['subject2'];
$subject3 = $results['subject3'];
$subject4 = $results['subject4'];
$subject5 = $results['subject5'];
$subject6 = $results['subject6'];
$subject7 = $results['subject7'];
$subject8 = $results['subject8'];
$subject9 = $results['subject9'];
$subject10 = $results['subject10'];
$grand_total = $results['grand_total'];
$grand_obtained = $results['grand_obtained'];
$grand_percentage = $results['grand_percentage'];
$grand_grades = $results['grand_grades'];

$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$aply_inst' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$ranks = $rank++;
?>
    <div class="row">
        <div class="col">
<table class="w-100">
    <thead>
        <tr align="center" style='background:hsl(35, 100%, 80%);'>
            <th width="50">
                <img src="../portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid">
            </th>
            <th colspan="23">
                <h2 class="fs-2 fw-bolder text-uppercase text-center"><?php echo $instituteName; ?></h2>
                <div class="text-center"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $campus; ?></span></div>
            </th>
            <th width="30" style="border:1px solid black;">
                <img src="student_imgs/<?php if(empty($student_image) || $student_image === "None" || $student_image === "none"){ echo "users.jpg"; }else{ echo $student_image; } ?>" class="img-fluid" style="width:70%;">
            </th>
        </tr>
        <tr align="center" style='background:hsl(35,100%,80%);'>
            <th colspan="25">
                <h4 class="text-capitalize fs-4 fw-bolder">Combine report card</h4>
            </th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th colspan="4">Student Name:</th>
            <th colspan="5"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $student_name; ?></span></th>
            <th colspan="8"></th>
            <th colspan="4">Father Name:</th>
            <th colspan="4"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $father_name; ?></span></th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th colspan="2">Class:</th>
            <th colspan="5">
                <span class="text-capitalize" style="text-decoration:underline;"><?php echo $class_name." (".$section.")"; ?></span></th>
            <th colspan="10"></th>
            <th colspan="4">Roll No:</th>
            <th colspan="4"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $roll_number; ?></span></th>
        </tr>
    </thead>
    <tbody>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid black;">Detail</th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test1)){ echo $test1; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test2)){ echo $test2; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test3)){ echo $test3; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test4)){ echo $test4; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test5)){ echo $test5; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test6)){ echo $test6; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test7)){ echo $test7; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test8)){ echo $test8; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test9)){ echo $test9; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test10)){ echo $test10; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test11)){ echo $test11; }else{ echo "---"; } ?>
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<?php if(!empty($test12)){ echo $test12; }else{ echo "---"; } ?>
            </th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">Subjects</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">T.M</th>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">O.M</th>
        </tr>

<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;" class="text-capitalize">
<?php if(!empty($subject1)){ echo $subject1; }else{ echo ""; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test1_total1)){ echo $test1_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test1_obt1)){ echo $test1_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test2_total1)){ echo $test2_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test2_obt1)){ echo $test2_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test3_total1)){ echo $test3_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test3_obt1)){ echo $test3_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test4_total1)){ echo $test4_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test4_obt1)){ echo $test4_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test5_total1)){ echo $test5_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test5_obt1)){ echo $test5_obt1; }else{ echo "A"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test6_total1)){ echo $test6_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test6_obt1)){ echo $test6_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test7_total1)){ echo $test7_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test7_obt1)){ echo $test7_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test8_total1)){ echo $test8_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test8_obt1)){ echo $test8_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test9_total1)){ echo $test9_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test9_obt1)){ echo $test9_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test10_total1)){ echo $test10_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test10_obt1)){ echo $test10_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test11_total1)){ echo $test11_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test11_obt1)){ echo $test11_obt1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test12_total1)){ echo $test12_total1; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<?php if(!empty($test12_obt1)){ echo $test12_obt1; }else{ echo "---"; } ?>
    </td>
</tr>

<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize">
<?php if(!empty($subject2)){ echo $subject2; }else{ echo ""; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test1_total2)){ echo $test1_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test1_obt2)){ echo $test1_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test2_total2)){ echo $test2_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test2_obt2)){ echo $test2_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test3_total2)){ echo $test3_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test3_obt2)){ echo $test3_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test4_total2)){ echo $test4_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test4_obt2)){ echo $test4_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test5_total2)){ echo $test5_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test5_obt2)){ echo $test5_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test6_total2)){ echo $test6_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test6_obt2)){ echo $test6_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test7_total2)){ echo $test7_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test7_obt2)){ echo $test7_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test8_total2)){ echo $test8_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test8_obt2)){ echo $test8_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test9_total2)){ echo $test9_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test9_obt2)){ echo $test9_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test10_total2)){ echo $test10_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test10_obt2)){ echo $test10_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test11_total2)){ echo $test11_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test11_obt2)){ echo $test11_obt2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test12_total2)){ echo $test12_total2; }else{ echo "---"; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
        <?php if(!empty($test12_obt2)){ echo $test12_obt2; }else{ echo "---"; } ?>
    </td>
</tr>

<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize">
<?php if(!empty($subject3)){ echo $subject3; }else{ echo ""; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test1_total3)){ echo $test1_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test1_obt3)){ echo $test1_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test2_total3)){ echo $test2_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test2_obt3)){ echo $test2_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test3_total3)){ echo $test3_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test3_obt3)){ echo $test3_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test4_total3)){ echo $test4_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test4_obt3)){ echo $test4_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test5_total3)){ echo $test5_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test5_obt3)){ echo $test5_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test6_total3)){ echo $test6_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test6_obt3)){ echo $test6_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test7_total3)){ echo $test7_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test7_obt3)){ echo $test7_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test8_total3)){ echo $test8_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test8_obt3)){ echo $test8_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test9_total3)){ echo $test9_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test9_obt3)){ echo $test9_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test10_total3)){ echo $test10_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test10_obt3)){ echo $test10_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test11_total3)){ echo $test11_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test11_obt3)){ echo $test11_obt3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test12_total3)){ echo $test12_total3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test12_obt3)){ echo $test12_obt3; }else{ echo "---"; } ?></td>
</tr>


<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize">
<?php if(!empty($subject4)){ echo $subject4; }else{ echo ""; } ?>
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test1_total4)){ echo $test1_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test1_obt4)){ echo $test1_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test2_total4)){ echo $test2_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test2_obt4)){ echo $test2_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test3_total4)){ echo $test3_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test3_obt4)){ echo $test3_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test4_total4)){ echo $test4_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test4_obt4)){ echo $test4_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test5_total4)){ echo $test5_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test5_obt4)){ echo $test5_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test6_total4)){ echo $test6_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test6_obt4)){ echo $test6_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test7_total4)){ echo $test7_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test7_obt4)){ echo $test7_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test8_total4)){ echo $test8_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test8_obt4)){ echo $test8_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test9_total4)){ echo $test9_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test9_obt4)){ echo $test9_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test10_total4)){ echo $test10_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test10_obt4)){ echo $test10_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test11_total4)){ echo $test11_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test11_obt4)){ echo $test11_obt4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test12_total4)){ echo $test12_total4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($test12_obt4)){ echo $test12_obt4; }else{ echo "---"; } ?></td>
</tr>

<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
<?php if(!empty($subject5)){ echo $subject5; }else{ echo ""; } ?>
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_total5)){ echo $test1_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_obt5)){ echo $test1_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_total5)){ echo $test2_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_obt5)){ echo $test2_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_total5)){ echo $test3_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_obt5)){ echo $test3_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_total5)){ echo $test4_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_obt5)){ echo $test4_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_total5)){ echo $test5_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_obt5)){ echo $test5_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_total5)){ echo $test6_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_obt5)){ echo $test6_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_total5)){ echo $test7_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_obt5)){ echo $test7_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_total5)){ echo $test8_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_obt5)){ echo $test8_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_total5)){ echo $test9_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_obt5)){ echo $test9_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_total5)){ echo $test10_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_obt5)){ echo $test10_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_total5)){ echo $test11_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_obt5)){ echo $test11_obt5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_total5)){ echo $test12_total5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_obt5)){ echo $test12_obt5; }else{ echo "---"; } ?></td>
</tr>

<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
<?php if(!empty($subject6)){ echo $subject6; }else{ echo ""; } ?>
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_total6)){ echo $test1_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_obt6)){ echo $test1_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_total6)){ echo $test2_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_obt6)){ echo $test2_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_total6)){ echo $test3_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_obt6)){ echo $test3_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_total6)){ echo $test4_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_obt6)){ echo $test4_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_total6)){ echo $test5_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_obt6)){ echo $test5_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_total6)){ echo $test6_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_obt6)){ echo $test6_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_total6)){ echo $test7_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_obt6)){ echo $test7_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_total6)){ echo $test8_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_obt6)){ echo $test8_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_total6)){ echo $test9_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_obt6)){ echo $test9_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_total6)){ echo $test10_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_obt6)){ echo $test10_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_total6)){ echo $test11_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_obt6)){ echo $test11_obt6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_total6)){ echo $test12_total6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_obt6)){ echo $test12_obt6; }else{ echo "---"; } ?></td>
</tr>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
<?php if(!empty($subject7)){ echo $subject7; }else{ echo ""; } ?>
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_total7)){ echo $test1_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_obt7)){ echo $test1_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_total7)){ echo $test2_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_obt7)){ echo $test2_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_total7)){ echo $test3_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_obt7)){ echo $test3_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_total7)){ echo $test4_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_obt7)){ echo $test4_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_total7)){ echo $test5_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_obt7)){ echo $test5_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_total7)){ echo $test6_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_obt7)){ echo $test6_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_total7)){ echo $test7_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_obt7)){ echo $test7_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_total7)){ echo $test8_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_obt7)){ echo $test8_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_total7)){ echo $test9_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_obt7)){ echo $test9_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_total7)){ echo $test10_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_obt7)){ echo $test10_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_total7)){ echo $test11_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_obt7)){ echo $test11_obt7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_total7)){ echo $test12_total7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_obt7)){ echo $test12_obt7; }else{ echo "---"; } ?></td>
</tr>

<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
<?php if(!empty($subject8)){ echo $subject8; }else{ echo ""; } ?>
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_total8)){ echo $test1_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_obt8)){ echo $test1_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_total8)){ echo $test2_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_obt8)){ echo $test2_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_total8)){ echo $test3_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_obt8)){ echo $test3_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_total8)){ echo $test4_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_obt8)){ echo $test4_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_total8)){ echo $test5_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_obt8)){ echo $test5_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_total8)){ echo $test6_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_obt8)){ echo $test6_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_total8)){ echo $test7_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_obt8)){ echo $test7_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_total8)){ echo $test8_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_obt8)){ echo $test8_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_total8)){ echo $test9_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_obt8)){ echo $test9_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_total8)){ echo $test10_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_obt8)){ echo $test10_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_total8)){ echo $test11_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_obt8)){ echo $test11_obt8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_total8)){ echo $test12_total8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_obt8)){ echo $test12_obt8; }else{ echo "---"; } ?></td>
</tr>

<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
<?php if(!empty($subject9)){ echo $subject9; }else{ echo ""; } ?>
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_total9)){ echo $test1_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_obt9)){ echo $test1_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_total9)){ echo $test2_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_obt9)){ echo $test2_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_total9)){ echo $test3_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_obt9)){ echo $test3_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_total9)){ echo $test4_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_obt9)){ echo $test4_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_total9)){ echo $test5_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_obt9)){ echo $test5_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_total9)){ echo $test6_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_obt9)){ echo $test6_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_total9)){ echo $test7_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_obt9)){ echo $test7_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_total9)){ echo $test8_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_obt9)){ echo $test8_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_total9)){ echo $test9_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_obt9)){ echo $test9_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_total9)){ echo $test10_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_obt9)){ echo $test10_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_total9)){ echo $test11_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_obt9)){ echo $test11_obt9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_total9)){ echo $test12_total9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_obt9)){ echo $test12_obt9; }else{ echo "---"; } ?></td>
</tr>
<?php if(empty($subject10)){ }else{ ?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
<?php if(!empty($subject10)){ echo $subject10; }else{ echo ""; } ?>
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_total10)){ echo $test1_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test1_obt10)){ echo $test1_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_total10)){ echo $test2_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test2_obt10)){ echo $test2_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_total10)){ echo $test3_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test3_obt10)){ echo $test3_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_total10)){ echo $test4_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test4_obt10)){ echo $test4_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_total10)){ echo $test5_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test5_obt10)){ echo $test5_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_total10)){ echo $test6_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test6_obt10)){ echo $test6_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_total10)){ echo $test7_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test7_obt10)){ echo $test7_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_total10)){ echo $test8_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test8_obt10)){ echo $test8_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_total10)){ echo $test9_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test9_obt10)){ echo $test9_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_total10)){ echo $test10_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test10_obt10)){ echo $test10_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_total10)){ echo $test11_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test11_obt10)){ echo $test11_obt10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_total10)){ echo $test12_total10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($test12_obt10)){ echo $test12_obt10; }else{ echo "---"; } ?></td>
</tr>
<?php } ?>
<tr style='background:hsl(35, 100%, 80%);'>
    <th style="border:1px solid black;" class="text-capitalize">T.Marks</th>
    <td style="border:1px solid black;"><?php if(empty($test1_alltotals1)){ echo "---"; }else{ echo $test1_alltotals1; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test1_allobtn1)){ echo "---"; }else{ echo $test1_allobtn1; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test2_alltotals2)){ echo "---"; }else{ echo $test2_alltotals2; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test2_allobtn2)){ echo "---"; }else{ echo $test2_allobtn2; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test3_alltotals3)){ echo "---"; }else{ echo $test3_alltotals3; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test3_allobtn3)){ echo "---"; }else{ echo $test3_allobtn3; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test4_alltotals4)){ echo "---"; }else{ echo $test4_alltotals4; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test4_allobtn4)){ echo "---"; }else{ echo $test4_allobtn4; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test5_alltotals5)){ echo "---"; }else{ echo $test5_alltotals5; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test5_allobtn5)){ echo "---"; }else{ echo $test5_allobtn5; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test6_alltotals6)){ echo "---"; }else{ echo $test6_alltotals6; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test6_allobtn6)){ echo "---"; }else{ echo $test6_allobtn6; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test7_alltotals7)){ echo "---"; }else{ echo $test7_alltotals7; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test7_allobtn7)){ echo "---"; }else{ echo $test7_allobtn7; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test8_alltotals8)){ echo "---"; }else{ echo $test8_alltotals8; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test8_allobtn8)){ echo "---"; }else{ echo $test8_allobtn8; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test9_alltotals9)){ echo "---"; }else{ echo $test9_alltotals9; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test9_allobtn9)){ echo "---"; }else{ echo $test9_allobtn9; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test10_alltotals10)){ echo "---"; }else{ echo $test10_alltotals10; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test10_allobtn10)){ echo "---"; }else{ echo $test10_allobtn10; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test11_alltotals11)){ echo "---"; }else{ echo $test11_alltotals11; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test11_allobtn11)){ echo "---"; }else{ echo $test11_allobtn11; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test12_alltotals12)){ echo "---"; }else{ echo $test12_alltotals12; } ?></td>
    <td style="border:1px solid black;"><?php if(empty($test12_allobtn12)){ echo "---"; }else{ echo $test12_allobtn12; } ?></td>
</tr>
    </tbody>
</table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
<table class="table w-100">
    <thead>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid black;padding:0px;font-size:0.8rem;" colspan="12">Grading Formula:</th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">A+</th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">Outstanding</td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">(Up to 90%)</td>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">A</th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">Excellent</td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">(80% to 90%)</td>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">B</th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">V.Good</td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">(70% to 80%)</td>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">C</th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">Good</td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">(60% to 70%)</td>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">D</th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">Better</td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">(50% to 60%)</td>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">E</th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">Needs to Improvement</td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">(40% to 50%)</td>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;">F</th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">Needs to Improvement</td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;">(Less than 40%)</td>
            <th style="border:1px solid black;font-size:0.8rem;padding:0px;"></th>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;"></td>
            <td style="border:1px solid black;font-size:0.8rem;padding:0px;"></td>
        </tr>
    </thead>
</table>
        </div>
    </div>
<div class="row">
    <div class="col-12 text-center">
<table class="table table-responsive w-100">
     <tr style='background:hsl(35, 100%, 80%);'>
<th style="border:1px solid black;" class="p-2">Grand Total</th>
<td style="border:1px solid black;" class="p-2"><?php echo $grand_total; ?></td>
<th style="border:1px solid black;" class="p-2">Grand Obt. Marks</th>
<td style="border:1px solid black;" class="p-2"><?php echo $grand_obtained; ?></td>
<th style="border:1px solid black;" class="p-2">%age</th>
<td style="border:1px solid black;" class="p-2"><?php echo $grand_percentage ?></td>
<th style="border:1px solid black;" class="p-2">Position</th>
<td style="border:1px solid black;" class="p-2">
<?php if($ranks === 1){ echo $ranks."st"; }elseif($ranks === 2){ echo $ranks."nd"; }elseif($ranks === 3){ echo $ranks."rd"; }else{ echo $ranks."th"; }?>
</td>
        </tr>
</table>
    </div>
</div>
<div class="row">
    <div class="col-12" align="center">
<table class="w-100" style="border:1px solid black;text-align:center;">
    <thead>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test1)){ echo "---"; }else{ echo $test1; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test2)){ echo "---"; }else{ echo $test2; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test3)){ echo "---"; }else{ echo $test3; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test4)){ echo "---"; }else{ echo $test4; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test5)){ echo "---"; }else{ echo $test5; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test6)){ echo "---"; }else{ echo $test6; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test7)){ echo "---"; }else{ echo $test7; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test8)){ echo "---"; }else{ echo $test8; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test9)){ echo "---"; }else{ echo $test9; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test10)){ echo "---"; }else{ echo $test10; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test11)){ echo "---"; }else{ echo $test11; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($test12)){ echo "---"; }else{ echo $test12; } ?></th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
            <th style="border:1px solid black;font-size:0.7rem;">% / Grade / Remarks</th>
        </tr>
        <tr style='background:hsl(35, 100%, 80%);'>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
            <td style="border:1px solid black;font-size:0.7rem;"></td>
        </tr>
    </thead>
</table>

    </div>
</div>
<?php } ?>