<br><br>
<?php
require_once("../functions/db.php");

$rol_num = $_POST['rol_num'];
$reslt_sesin = $_POST['reslt_sesin'];
$reslt_term = $_POST['reslt_term'];

$t1 = $reslt_term[0];
$t2 = $reslt_term[1];
$t3 = $reslt_term[2];
$t4 = $reslt_term[3];
$t5 = $reslt_term[4];
$t6 = $reslt_term[5];
$t7 = $reslt_term[6];
$t8 = $reslt_term[7];
$t9 = $reslt_term[8];
$t10 = $reslt_term[9];
$t11 = $reslt_term[10];
$t12 = $reslt_term[11];

$reslt_instid = $_POST['reslt_instid'];


$usr = mysqli_query($con,"select * from confirmSchools where institute_id='$reslt_instid'");
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


$sl_trms_reslt = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid'");
$results = mysqli_fetch_array($sl_trms_reslt);
$student_name = $results['student_name'];
$father_name = $results['father_name'];
if(empty($results['student_img']) || $results['student_img'] == "None" || $results['student_img'] == "none"){ $student_img = "users.jpg";}else{ $student_img = $results['student_img']; }
$class = $results['class'];
$section = $results['section'];
$session = $results['session'];
$roll_no = $results['roll_no'];
$terms = $results['terms'];
        
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$reslt_instid' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];

$sl_tms1 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t1'");
$tmes1 = mysqli_fetch_assoc($sl_tms1);
$term1 = $tmes1['term'];

$sl_tms2 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t2'");
$tmes2 = mysqli_fetch_assoc($sl_tms2);
$term2 = $tmes2['term'];

$sl_tms3 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t3'");
$tmes3 = mysqli_fetch_assoc($sl_tms3);
$term3 = $tmes3['term'];

$sl_tms4 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t4'");
$tmes4 = mysqli_fetch_assoc($sl_tms4);
$term4 = $tmes4['term'];

$sl_tms5 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t5'");
$tmes5 = mysqli_fetch_assoc($sl_tms5);
$term5 = $tmes5['term'];

$sl_tms6 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t6'");
$tmes6 = mysqli_fetch_assoc($sl_tms6);
$term6 = $tmes6['term'];

$sl_tms7 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t7'");
$tmes7 = mysqli_fetch_assoc($sl_tms7);
$term7 = $tmes7['term'];

$sl_tms8 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t8'");
$tmes8 = mysqli_fetch_assoc($sl_tms8);
$term8 = $tmes8['term'];

$sl_tms9 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t9'");
$tmes9 = mysqli_fetch_assoc($sl_tms9);
$term9 = $tmes9['term'];

$sl_tms10 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t10'");
$tmes10 = mysqli_fetch_assoc($sl_tms10);
$term10 = $tmes10['term'];

$sl_tms11 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t11'");
$tmes11 = mysqli_fetch_assoc($sl_tms11);
$term11 = $tmes11['term'];

$sl_tms12 = mysqli_query($con,"select * from addTerms where instituteId='$reslt_instid' && termid='$t12'");
$tmes12 = mysqli_fetch_assoc($sl_tms12);
$term12 = $tmes12['term'];

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
                <img src="student_imgs/<?php echo $student_img; ?>" class="img-fluid" style="width:70%;">
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
            <th colspan="4"><span class="text-capitalize" style="text-decoration:underline;"><?php echo $roll_no; ?></span></th>
        </tr>
    </thead>
    <tbody>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="border:1px solid black;">Detail</th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term1)){echo $term1;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term2)){echo $term2;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term3)){echo $term3;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term4)){echo $term4;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term5)){echo $term5;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term6)){echo $term6;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term7)){echo $term7;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term8)){echo $term8;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term9)){echo $term9;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term10)){echo $term10;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term11)){echo $term11;}else{ echo "---"; } ?></th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($term12)){echo $term12;}else{ echo "---"; } ?></th>
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
<?php
$sel_sbject = mysqli_query($con,"select subject_name from addSubjects where institute_id='$reslt_instid' && classid='$class'");
$data_item = array();
    while($reslts = mysqli_fetch_array($sel_sbject)){
        $data_item[] = $reslts['subject_name'];
}
//$items = [$data_item];
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[0]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[0]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[0]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[0]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[0]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[0]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[0]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[0]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[0]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[0]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[0]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[0]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];


?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;" class="text-capitalize"><?php echo $data_item[0]; ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[1]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[1]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[1]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[1]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[1]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[1]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[1]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[1]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[1]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[1]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[1]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[1]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize"><?php echo $data_item[1]; ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[2]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[2]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[2]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[2]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[2]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[2]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[2]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[2]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[2]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[2]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[2]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[2]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize"><?php echo $data_item[2]; ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>

<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[3]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[3]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[3]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[3]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[3]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[3]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[3]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[3]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[3]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[3]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[3]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[3]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize"><?php echo $data_item[3]; ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[4]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[4]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[4]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[4]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[4]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[4]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[4]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[4]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[4]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[4]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[4]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[4]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $data_item[4]; ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[5]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[5]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[5]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[5]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[5]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[5]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[5]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[5]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[5]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[5]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[5]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[5]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $data_item[5]; ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[6]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[6]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[6]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[6]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[6]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[6]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[6]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[6]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[6]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[6]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[6]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[6]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $data_item[6]; ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[7]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[7]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[7]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[7]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[7]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[7]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[7]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[7]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[7]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[7]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[7]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[7]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $data_item[7]; ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[8]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[8]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[8]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[8]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[8]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[8]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[8]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[8]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[8]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[8]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[8]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[8]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $data_item[8]; ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<?php
$sel_reslt_t1 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' && subject='$data_item[9]'");
$rslt_t1=mysqli_fetch_assoc($sel_reslt_t1);
$totls1 = $rslt_t1['total_marks'];
$marks1 = $rslt_t1['marks'];

$sel_reslt_t2 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' && subject='$data_item[9]'");
$rslt_t2=mysqli_fetch_assoc($sel_reslt_t2);
$totls2 = $rslt_t2['total_marks'];
$marks2 = $rslt_t2['marks'];

$sel_reslt_t3 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' && subject='$data_item[9]'");
$rslt_t3=mysqli_fetch_assoc($sel_reslt_t3);
$totls3 = $rslt_t3['total_marks'];
$marks3 = $rslt_t3['marks'];

$sel_reslt_t4 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' && subject='$data_item[9]'");
$rslt_t4=mysqli_fetch_assoc($sel_reslt_t4);
$totls4 = $rslt_t4['total_marks'];
$marks4 = $rslt_t4['marks'];

$sel_reslt_t5 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' && subject='$data_item[9]'");
$rslt_t5=mysqli_fetch_assoc($sel_reslt_t5);
$totls5 = $rslt_t5['total_marks'];
$marks5 = $rslt_t5['marks'];

$sel_reslt_t6 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' && subject='$data_item[9]'");
$rslt_t6=mysqli_fetch_assoc($sel_reslt_t6);
$totls6 = $rslt_t6['total_marks'];
$marks6 = $rslt_t6['marks'];

$sel_reslt_t7 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' && subject='$data_item[9]'");
$rslt_t7=mysqli_fetch_assoc($sel_reslt_t7);
$totls7 = $rslt_t7['total_marks'];
$marks7 = $rslt_t7['marks'];

$sel_reslt_t8 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' && subject='$data_item[9]'");
$rslt_t8=mysqli_fetch_assoc($sel_reslt_t8);
$totls8 = $rslt_t8['total_marks'];
$marks8 = $rslt_t8['marks'];

$sel_reslt_t9 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' && subject='$data_item[9]'");
$rslt_t9=mysqli_fetch_assoc($sel_reslt_t9);
$totls9 = $rslt_t9['total_marks'];
$marks9 = $rslt_t9['marks'];

$sel_reslt_t10 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' && subject='$data_item[9]'");
$rslt_t10=mysqli_fetch_assoc($sel_reslt_t10);
$totls10 = $rslt_t10['total_marks'];
$marks10 = $rslt_t10['marks'];

$sel_reslt_t11 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' && subject='$data_item[9]'");
$rslt_t11=mysqli_fetch_assoc($sel_reslt_t11);
$totls11 = $rslt_t11['total_marks'];
$marks11 = $rslt_t11['marks'];

$sel_reslt_t12 = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' && subject='$data_item[9]'");
$rslt_t12=mysqli_fetch_assoc($sel_reslt_t12);
$totls12 = $rslt_t12['total_marks'];
$marks12 = $rslt_t12['marks'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize"><?php echo $data_item[9]; ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls1)){ echo $totls1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks1)){ echo $marks1; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls2)){ echo $totls2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks2)){ echo $marks2; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls3)){ echo $totls3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks3)){ echo $marks3; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls4)){ echo $totls4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks4)){ echo $marks4; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls5)){ echo $totls5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks5)){ echo $marks5; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls6)){ echo $totls6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks6)){ echo $marks6; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls7)){ echo $totls7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks7)){ echo $marks7; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls8)){ echo $totls8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks8)){ echo $marks8; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls9)){ echo $totls9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks9)){ echo $marks9; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls10)){ echo $totls10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks10)){ echo $marks10; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls11)){ echo $totls11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks11)){ echo $marks11; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($totls12)){ echo $totls12; }else{ echo "---"; } ?></td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;"><?php if(!empty($marks12)){ echo $marks12; }else{ echo "---"; } ?></td>
</tr>
<tr style='background:hsl(35, 100%, 80%);'>
    <th style="border:1px solid black;" class="text-capitalize">T.Marks</th>
<?php
$sel_reslt_t1_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' group by subject");
while($rslt_t1_totls=mysqli_fetch_assoc($sel_reslt_t1_totls)){
$total_marks1 += $rslt_t1_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks1; ?></td>
<?php
$sel_reslt_t1_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' group by subject");
while($rslt_t1_obttotls=mysqli_fetch_assoc($sel_reslt_t1_obttotls)){
$marks1 += $rslt_t1_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks1; ?></td>
<?php
$sel_reslt_t2_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' group by subject");
while($rslt_t2_totls=mysqli_fetch_assoc($sel_reslt_t2_totls)){
$total_marks2 += $rslt_t2_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks2; ?></td>
<?php
$sel_reslt_t2_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' group by subject");
while($rslt_t2_obttotls=mysqli_fetch_assoc($sel_reslt_t2_obttotls)){
$marks2 += $rslt_t2_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks2; ?></td>
<?php
$sel_reslt_t3_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' group by subject");
while($rslt_t3_totls=mysqli_fetch_assoc($sel_reslt_t3_totls)){
$total_marks3 += $rslt_t3_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks3; ?></td>
<?php
$sel_reslt_t3_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' group by subject");
while($rslt_t3_obttotls=mysqli_fetch_assoc($sel_reslt_t3_obttotls)){
$marks3 += $rslt_t3_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks3; ?></td>
<?php
$sel_reslt_t4_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' group by subject");
while($rslt_t4_totls=mysqli_fetch_assoc($sel_reslt_t4_totls)){
$total_marks4 += $rslt_t4_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks4; ?></td>
<?php
$sel_reslt_t4_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' group by subject");
while($rslt_t4_obttotls=mysqli_fetch_assoc($sel_reslt_t4_obttotls)){
$marks4 += $rslt_t4_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks4; ?></td>
<?php
$sel_reslt_t5_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' group by subject");
while($rslt_t5_totls=mysqli_fetch_assoc($sel_reslt_t5_totls)){
$total_marks5 += $rslt_t5_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks5; ?></td>
<?php
$sel_reslt_t5_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' group by subject");
while($rslt_t5_obttotls=mysqli_fetch_assoc($sel_reslt_t5_obttotls)){
$marks5 += $rslt_t5_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks5; ?></td>
<?php
$sel_reslt_t6_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' group by subject");
while($rslt_t6_totls=mysqli_fetch_assoc($sel_reslt_t6_totls)){
$total_marks6 += $rslt_t6_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks6; ?></td>
<?php
$sel_reslt_t6_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' group by subject");
while($rslt_t6_obttotls=mysqli_fetch_assoc($sel_reslt_t6_obttotls)){
$marks6 += $rslt_t6_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks6; ?></td>
<?php
$sel_reslt_t7_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' group by subject");
while($rslt_t7_totls=mysqli_fetch_assoc($sel_reslt_t7_totls)){
$total_marks7 += $rslt_t7_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks7; ?></td>
<?php
$sel_reslt_t7_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' group by subject");
while($rslt_t7_obttotls=mysqli_fetch_assoc($sel_reslt_t7_obttotls)){
$marks7 += $rslt_t7_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks7; ?></td>
<?php
$sel_reslt_t8_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' group by subject");
while($rslt_t8_totls=mysqli_fetch_assoc($sel_reslt_t8_totls)){
$total_marks8 += $rslt_t8_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks8; ?></td>
<?php
$sel_reslt_t8_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' group by subject");
while($rslt_t8_obttotls=mysqli_fetch_assoc($sel_reslt_t8_obttotls)){
$marks8 += $rslt_t8_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks8; ?></td>
<?php
$sel_reslt_t9_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' group by subject");
while($rslt_t9_totls=mysqli_fetch_assoc($sel_reslt_t9_totls)){
$total_marks9 += $rslt_t9_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks9; ?></td>
<?php
$sel_reslt_t9_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' group by subject");
while($rslt_t9_obttotls=mysqli_fetch_assoc($sel_reslt_t9_obttotls)){
$marks9 += $rslt_t9_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks9; ?></td>
<?php
$sel_reslt_t10_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' group by subject");
while($rslt_t10_totls=mysqli_fetch_assoc($sel_reslt_t10_totls)){
$total_marks10 += $rslt_t10_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks10; ?></td>
<?php
$sel_reslt_t10_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' group by subject");
while($rslt_t10_obttotls=mysqli_fetch_assoc($sel_reslt_t10_obttotls)){
$marks10 += $rslt_t10_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks10; ?></td>
<?php
$sel_reslt_t11_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' group by subject");
while($rslt_t11_totls=mysqli_fetch_assoc($sel_reslt_t11_totls)){
$total_marks11 += $rslt_t11_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks11; ?></td>
<?php
$sel_reslt_t11_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' group by subject");
while($rslt_t11_obttotls=mysqli_fetch_assoc($sel_reslt_t11_obttotls)){
$marks11 += $rslt_t11_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks11; ?></td>
<?php
$sel_reslt_t12_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' group by subject");
while($rslt_t12_totls=mysqli_fetch_assoc($sel_reslt_t12_totls)){
$total_marks12 += $rslt_t12_totls['total_marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $total_marks12; ?></td>
<?php
$sel_reslt_t12_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' group by subject");
while($rslt_t12_obttotls=mysqli_fetch_assoc($sel_reslt_t12_obttotls)){
$marks12 += $rslt_t12_obttotls['marks'];
}
?>
    <td style="border:1px solid black;"><?php echo $marks12; ?></td>
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
<?php
$ovrallmarks = $total_marks1+$total_marks2+$total_marks3+$total_marks4+$total_marks5+$total_marks6+$total_marks7+$total_marks8+$total_marks9+$total_marks10+$total_marks11+$total_marks12;
$ovrlallobt = $marks1+$marks2+$marks3+$marks4+$marks5+$marks6+$marks7+$marks8+$marks9+$marks10+$marks11+$marks12;
$pcgte = round($ovrlallobt/$ovrallmarks*100);
?>
    </div>
<div class="row">
    <div class="col-12 text-center">
<table class="table table-responsive w-100">
     <tr style='background:hsl(35, 100%, 80%);'>
<th style="border:1px solid black;" class="p-2">Grand Total</th>
<td style="border:1px solid black;" class="p-2"><?php echo $ovrallmarks; ?></td>
<th style="border:1px solid black;" class="p-2">Grand Obt. Marks</th>
<td style="border:1px solid black;" class="p-2"><?php echo $ovrlallobt; ?></td>
<th style="border:1px solid black;" class="p-2">%age</th>
<td style="border:1px solid black;" class="p-2"><?php echo round($ovrlallobt/$ovrallmarks*100)."%"; ?></td>
<th style="border:1px solid black;" class="p-2">Grade</th>
<td style="border:1px solid black;" class="p-2"><?php 
if(round($ovrlallobt/$ovrallmarks*100) > 90){ echo "A+"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 80){ echo "A"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 70){ echo "B"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 60){ echo "C"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 50){ echo "D"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 40){ echo "E"; }else{ echo "F"; }
?></td>
        </tr>
</table>
    </div>
</div>
<div class="row">
    <div class="col-12" align="center">
<table class="w-100" style="border:1px solid black;text-align:center;">
    <thead>
        <tr style='background:hsl(35, 100%, 80%);'>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term1)){ echo "---"; }else{ echo $term1; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term2)){ echo "---"; }else{ echo $term2; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term3)){ echo "---"; }else{ echo $term3; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term4)){ echo "---"; }else{ echo $term4; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term5)){ echo "---"; }else{ echo $term5; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term6)){ echo "---"; }else{ echo $term6; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term7)){ echo "---"; }else{ echo $term7; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term8)){ echo "---"; }else{ echo $term8; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term9)){ echo "---"; }else{ echo $term9; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term10)){ echo "---"; }else{ echo $term10; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term11)){ echo "---"; }else{ echo $term11; } ?></th>
            <th style="padding:0px;border:1px solid black;font-size:0.8rem;"><?php if(empty($term12)){ echo "---"; }else{ echo $term12; } ?></th>
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
<?php
error_reporting (E_ALL ^ E_NOTICE);
$tst1 = number_format(round($marks1/$total_marks1*100));
?>
        <tr style='background:hsl(35, 100%, 80%);'>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
    if(!empty($tst1)){ echo $tst1."% / "; }else{ echo "--- / "; }
if($tst1 > 90){ echo "A+ / "; }elseif($tst1 > 80){ echo "A / "; }elseif($tst1 > 70){ echo "B / "; }elseif($tst1 > 60){ echo "C / "; }elseif($tst1 > 50){ echo "D / "; }elseif($tst1 > 40){ echo "E / "; }else{ echo "F / "; } 
if($tst1 > 90){ echo "Outstanding"; }elseif($tst1 > 80){ echo "Excellent"; }elseif($tst1 > 70){ echo "V.Good"; }elseif($tst1 > 60){ echo "Good"; }elseif($tst1 > 50){ echo "Better"; }elseif($tst1 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst2 = number_format(round($marks2/$total_marks2*100)); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst2)){ echo $tst2."% / "; }else{ echo "--- / "; } 
if($tst2 > 90){ echo "A+ / "; }elseif($tst2 > 80){ echo "A / "; }elseif($tst2 > 70){ echo "B / "; }elseif($tst2 > 60){ echo "C / "; }elseif($tst2 > 50){ echo "D / "; }elseif($tst2 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst2 > 90){ echo "Outstanding"; }elseif($tst2 > 80){ echo "Excellent"; }elseif($tst2 > 70){ echo "V.Good"; }elseif($tst2 > 60){ echo "Good"; }elseif($tst2 > 50){ echo "Better"; }elseif($tst2 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst3 = number_format(round($marks3/$total_marks3*100)); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst3)){ echo $tst3."% / "; }else{ echo "--- / "; } 
if($tst3 > 90){ echo "A+ / "; }elseif($tst3 > 80){ echo "A / "; }elseif($tst3 > 70){ echo "B / "; }elseif($tst3 > 60){ echo "C / "; }elseif($tst3 > 50){ echo "D / "; }elseif($tst3 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst3 > 90){ echo "Outstanding"; }elseif($tst3 > 80){ echo "Excellent"; }elseif($tst3 > 70){ echo "V.Good"; }elseif($tst3 > 60){ echo "Good"; }elseif($tst3 > 50){ echo "Better"; }elseif($tst3 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst4 = number_format(round($marks4/$total_marks4*100)); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
    if(!empty($tst4)){ echo $tst4."% / "; }else{ echo "--- / "; }
    if($tst4 > 90){ echo "A+ / "; }elseif($tst4 > 80){ echo "A / "; }elseif($tst4 > 70){ echo "B / "; }elseif($tst4 > 60){ echo "C / "; }elseif($tst4 > 50){ echo "D / "; }elseif($tst4 > 40){ echo "E / "; }else{ echo "F / "; }
    if($tst4 > 90){ echo "Outstanding"; }elseif($tst4 > 80){ echo "Excellent"; }elseif($tst4 > 70){ echo "V.Good"; }elseif($tst4 > 60){ echo "Good"; }elseif($tst4 > 50){ echo "Better"; }elseif($tst4 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst5 = number_format(round($marks5/$total_marks5*100)); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst5)){ echo $tst5."% / "; }else{ echo "--- / "; } 
if($tst5 > 90){ echo "A+ / "; }elseif($tst5 > 80){ echo "A / "; }elseif($tst5 > 70){ echo "B / "; }elseif($tst5 > 60){ echo "C / "; }elseif($tst5 > 50){ echo "D / "; }elseif($tst5 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst5 > 90){ echo "Outstanding"; }elseif($tst5 > 80){ echo "Excellent"; }elseif($tst5 > 70){ echo "V.Good"; }elseif($tst5 > 60){ echo "Good"; }elseif($tst5 > 50){ echo "Better"; }elseif($tst5 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst6 = round($marks6/$total_marks6*100); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst6)){ echo $tst6."% / "; }else{ echo "--- / "; }
if($tst6 > 90){ echo "A+ / "; }elseif($tst6 > 80){ echo "A / "; }elseif($tst6 > 70){ echo "B / "; }elseif($tst6 > 60){ echo "C / "; }elseif($tst6 > 50){ echo "D / "; }elseif($tst6 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst6 > 90){ echo "Outstanding"; }elseif($tst6 > 80){ echo "Excellent"; }elseif($tst6 > 70){ echo "V.Good"; }elseif($tst6 > 60){ echo "Good"; }elseif($tst6 > 50){ echo "Better"; }elseif($tst6 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst7 = round($marks7/$total_marks7*100); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst7)){ echo $tst7."% / "; }else{ echo "--- / "; }
if($tst7 > 90){ echo "A+ / "; }elseif($tst7 > 80){ echo "A / "; }elseif($tst7 > 70){ echo "B / "; }elseif($tst7 > 60){ echo "C / "; }elseif($tst7 > 50){ echo "D / "; }elseif($tst7 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst7 > 90){ echo "Outstanding"; }elseif($tst7 > 80){ echo "Excellent"; }elseif($tst7 > 70){ echo "V.Good"; }elseif($tst7 > 60){ echo "Good"; }elseif($tst7 > 50){ echo "Better"; }elseif($tst7 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst8 = round($marks8/$total_marks8*100); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst8)){ echo $tst8."% / "; }else{ echo "--- / "; }
if($tst8 > 90){ echo "A+ / "; }elseif($tst8 > 80){ echo "A / "; }elseif($tst8 > 70){ echo "B / "; }elseif($tst8 > 60){ echo "C / "; }elseif($tst8 > 50){ echo "D / "; }elseif($tst8 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst8 > 90){ echo "Outstanding"; }elseif($tst8 > 80){ echo "Excellent"; }elseif($tst8 > 70){ echo "V.Good"; }elseif($tst8 > 60){ echo "Good"; }elseif($tst8 > 50){ echo "Better"; }elseif($tst8 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst9 = round($marks9/$total_marks9*100); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst9)){ echo $tst9."% / "; }else{ echo "--- / "; } 
if($tst9 > 90){ echo "A+ / "; }elseif($tst9 > 80){ echo "A / "; }elseif($tst9 > 70){ echo "B / "; }elseif($tst9 > 60){ echo "C / "; }elseif($tst9 > 50){ echo "D / "; }elseif($tst9 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst9 > 90){ echo "Outstanding"; }elseif($tst9 > 80){ echo "Excellent"; }elseif($tst9 > 70){ echo "V.Good"; }elseif($tst9 > 60){ echo "Good"; }elseif($tst9 > 50){ echo "Better"; }elseif($tst9 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php $tst10 = round($marks10/$total_marks10*100); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst10)){ echo $tst10."% / "; }else{ echo "--- / "; } 
if($tst10 > 90){ echo "A+ / "; }elseif($tst10 > 80){ echo "A / "; }elseif($tst10 > 70){ echo "B / "; }elseif($tst10 > 60){ echo "C / "; }elseif($tst10 > 50){ echo "D / "; }elseif($tst10 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst10 > 90){ echo "Outstanding"; }elseif($tst10 > 80){ echo "Excellent"; }elseif($tst10 > 70){ echo "V.Good"; }elseif($tst10 > 60){ echo "Good"; }elseif($tst10 > 50){ echo "Better"; }elseif($tst10 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php

$tst11 = round($marks11/$total_marks11*100);
?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst11)){ echo $tst11."% / "; }else{ echo "--- / "; }
if($tst11 > 90){ echo "A+ / "; }elseif($tst11 > 80){ echo "A / "; }elseif($tst11 > 70){ echo "B / "; }elseif($tst11 > 60){ echo "C / "; }elseif($tst11 > 50){ echo "D / "; }elseif($tst11 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst11 > 90){ echo "Outstanding"; }elseif($tst11){ echo "Excellent"; }elseif($tst11 > 70){ echo "V.Good"; }elseif($tst11 > 60){ echo "Good"; }elseif($tst11 > 50){ echo "Better"; }elseif($tst11 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
<?php 
$tst12 = round($marks12/$total_marks12*100); ?>
            <td style="border:1px solid black;font-size:0.7rem;">
<?php 
if(!empty($tst12)){ echo $tst12."% / "; }else{ echo "--- / "; }
if($tst12 > 90){ echo "A+ / "; }elseif($tst12 > 80){ echo "A / "; }elseif($tst12 > 70){ echo "B / "; }elseif($tst12 > 60){ echo "C / "; }elseif($tst12 > 50){ echo "D / "; }elseif($tst12 > 40){ echo "E / "; }else{ echo "F / "; }
if($tst12 > 90){ echo "Outstanding"; }elseif($tst12 > 80){ echo "Excellent"; }elseif($tst12 > 70){ echo "V.Good"; }elseif($tst12 > 60){ echo "Good"; }elseif($tst12 > 50){ echo "Better"; }elseif($tst12 > 40){ echo "Needs Improvement"; }else{ echo "Needs Improvement"; }
?>
            </td>
        </tr>
    </thead>
</table>

    </div>
</div>