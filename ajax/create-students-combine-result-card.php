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
if(empty($results['student_img'] || $results['student_img'] == "None")){ $student_img = "users.jpg";}else{ $student_img = $results['student_img']; }
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
        <form class="combneForm">
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
                <img src="student_imgs/<?php if(empty($student_img) || $student_img == "None" || $student_img == "none"){ echo "users.jpg"; }else{ echo $student_img; } ?>" class="img-fluid" style="width:100%;">
            </th>
        </tr>
<input type="hidden" value="<?php echo $student_name; ?>" class="stnme">
<input type="hidden" value="<?php echo $father_name; ?>" class="fnme">
<input type="hidden" value="<?php echo $student_img; ?>" class="stimge">
<input type="hidden" value="<?php echo $class; ?>" class="cless">
<input type="hidden" value="<?php echo $section; ?>" class="sectns">
<input type="hidden" value="<?php echo $reslt_instid; ?>" class="instids">
<input type="hidden" value="<?php echo $rol_num; ?>" class="rolnbr">
<input type="hidden" value="<?php echo $reslt_sesin; ?>" class="sesions">
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
            <th style="border:1px solid black;font-size:0.8rem;">Detail</th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1" style="font-size:0.7rem;" value="<?php if(!empty($term1)){echo $term1;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2" style="font-size:0.7rem;" value="<?php if(!empty($term2)){echo $term2;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3" style="font-size:0.7rem;" value="<?php if(!empty($term3)){echo $term3;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4" style="font-size:0.7rem;" value="<?php if(!empty($term4)){echo $term4;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5" style="font-size:0.7rem;" value="<?php if(!empty($term5)){echo $term5;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6" style="font-size:0.7rem;" value="<?php if(!empty($term6)){echo $term6;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7" style="font-size:0.7rem;" value="<?php if(!empty($term7)){echo $term7;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8" style="font-size:0.7rem;" value="<?php if(!empty($term8)){echo $term8;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9" style="font-size:0.7rem;" value="<?php if(!empty($term9)){echo $term9;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10" style="font-size:0.7rem;" value="<?php if(!empty($term10)){echo $term10;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11" style="font-size:0.7rem;" value="<?php if(!empty($term11)){echo $term11;}else{ echo ""; } ?>">
            </th>
            <th colspan="2" style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12" style="font-size:0.7rem;" value="<?php if(!empty($term12)){echo $term12;}else{ echo ""; } ?>">
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
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;" class="text-capitalize">
        <input type="text" class="form-control subj1" value="<?php echo $data_item[0]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls1" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;width:50px !important;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn1" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize">
        <input type="text" class="form-control subj2" value="<?php echo $data_item[1]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls2" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn2" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize">
        <input type="text" class="form-control subj3" value="<?php echo $data_item[2]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst1totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst1obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst2totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst2obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst3totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst3obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst4totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst4obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst5totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst5obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst6totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst6obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst7totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst7obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst8totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst8obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst9totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst9obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst10totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst10obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst11totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst11obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst12totls3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" class="form-control tst12obtn3" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;" class="text-capitalize">
        <input type="text" class="form-control subj4" value="<?php echo $data_item[3]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls4" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="border:1px solid black;padding:0px;font-size:0.8rem;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn4" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
        <input type="text" class="form-control subj5" value="<?php echo $data_item[4]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls5" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn5" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
        <input type="text" class="form-control subj6" value="<?php echo $data_item[5]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls6" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn6" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
        <input type="text" class="form-control subj7" value="<?php echo $data_item[6]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls7" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn7" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
        <input type="text" class="form-control subj8" value="<?php echo $data_item[7]; ?>" style="font-size:0.7rem;">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls8" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn8" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
        <input type="text" class="form-control subj9" style="font-size:0.7rem;" value="<?php echo $data_item[8]; ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls9" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn9" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
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
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;" class="text-capitalize">
<input type="text" class="form-control subj10" style="font-size:0.7rem;" value="<?php echo $data_item[9]; ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls1)){ echo $totls1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks1)){ echo $marks1; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls2)){ echo $totls2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks2)){ echo $marks2; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls3)){ echo $totls3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks3)){ echo $marks3; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls4)){ echo $totls4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks4)){ echo $marks4; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls5)){ echo $totls5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks5)){ echo $marks5; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls6)){ echo $totls6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks6)){ echo $marks6; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls7)){ echo $totls7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks7)){ echo $marks7; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls8)){ echo $totls8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks8)){ echo $marks8; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls9)){ echo $totls9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks9)){ echo $marks9; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls10)){ echo $totls10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks10)){ echo $marks10; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls11)){ echo $totls11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks11)){ echo $marks11; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12totls10" style="font-size:0.7rem;" value="<?php if(!empty($totls12)){ echo $totls12; }else{ echo ""; } ?>">
    </td>
    <td style="padding:0px;font-size:0.8rem;border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12obtn10" style="font-size:0.7rem;" value="<?php if(!empty($marks12)){ echo $marks12; }else{ echo ""; } ?>">
    </td>
</tr>
<tr style='background:hsl(35, 100%, 80%);'>
    <th style="border:1px solid black;" class="text-capitalize">T.Marks</th>
<?php
$sel_reslt_t1_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' group by subject");
while($rslt_t1_totls=mysqli_fetch_assoc($sel_reslt_t1_totls)){
$total_marks1 += $rslt_t1_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" style="font-size:0.7rem;" class="form-control tst1altotl1" value="<?php echo $total_marks1; ?>">
    </td>
<?php
$sel_reslt_t1_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t1' group by subject");
while($rslt_t1_obttotls=mysqli_fetch_assoc($sel_reslt_t1_obttotls)){
$marks1 += $rslt_t1_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst1alobtnd1" style="font-size:0.7rem;" value="<?php echo $marks1; ?>">
    </td>
<?php
$sel_reslt_t2_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' group by subject");
while($rslt_t2_totls=mysqli_fetch_assoc($sel_reslt_t2_totls)){
$total_marks2 += $rslt_t2_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2altotl2" style="font-size:0.7rem;" value="<?php echo $total_marks2; ?>">
    </td>
<?php
$sel_reslt_t2_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t2' group by subject");
while($rslt_t2_obttotls=mysqli_fetch_assoc($sel_reslt_t2_obttotls)){
$marks2 += $rslt_t2_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst2alobtnd2" style="font-size:0.7rem;" value="<?php echo $marks2; ?>">
    </td>
<?php
$sel_reslt_t3_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' group by subject");
while($rslt_t3_totls=mysqli_fetch_assoc($sel_reslt_t3_totls)){
$total_marks3 += $rslt_t3_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3altotl3" style="font-size:0.7rem;" value="<?php echo $total_marks3; ?>">
    </td>
<?php
$sel_reslt_t3_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t3' group by subject");
while($rslt_t3_obttotls=mysqli_fetch_assoc($sel_reslt_t3_obttotls)){
$marks3 += $rslt_t3_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst3alobtnd3" style="font-size:0.7rem;" value="<?php echo $marks3; ?>">
    </td>
<?php
$sel_reslt_t4_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' group by subject");
while($rslt_t4_totls=mysqli_fetch_assoc($sel_reslt_t4_totls)){
$total_marks4 += $rslt_t4_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4altotl4" style="font-size:0.7rem;" value="<?php echo $total_marks4; ?>">
    </td>
<?php
$sel_reslt_t4_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t4' group by subject");
while($rslt_t4_obttotls=mysqli_fetch_assoc($sel_reslt_t4_obttotls)){
$marks4 += $rslt_t4_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst4alobtnd4" style="font-size:0.7rem;" value="<?php echo $marks4; ?>">
    </td>
<?php
$sel_reslt_t5_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' group by subject");
while($rslt_t5_totls=mysqli_fetch_assoc($sel_reslt_t5_totls)){
$total_marks5 += $rslt_t5_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5altotl5" style="font-size:0.7rem;" value="<?php echo $total_marks5; ?>">
    </td>
<?php
$sel_reslt_t5_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t5' group by subject");
while($rslt_t5_obttotls=mysqli_fetch_assoc($sel_reslt_t5_obttotls)){
$marks5 += $rslt_t5_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst5alobtnd5" style="font-size:0.7rem;" value="<?php echo $marks5; ?>">
    </td>
<?php
$sel_reslt_t6_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' group by subject");
while($rslt_t6_totls=mysqli_fetch_assoc($sel_reslt_t6_totls)){
$total_marks6 += $rslt_t6_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6altotl6" style="font-size:0.7rem;" value="<?php echo $total_marks6; ?>">
    </td>
<?php
$sel_reslt_t6_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t6' group by subject");
while($rslt_t6_obttotls=mysqli_fetch_assoc($sel_reslt_t6_obttotls)){
$marks6 += $rslt_t6_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst6alobtnd6" style="font-size:0.7rem;" value="<?php echo $marks6; ?>">
    </td>
<?php
$sel_reslt_t7_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' group by subject");
while($rslt_t7_totls=mysqli_fetch_assoc($sel_reslt_t7_totls)){
$total_marks7 += $rslt_t7_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7altotl7" style="font-size:0.7rem;" value="<?php echo $total_marks7; ?>">
    </td>
<?php
$sel_reslt_t7_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t7' group by subject");
while($rslt_t7_obttotls=mysqli_fetch_assoc($sel_reslt_t7_obttotls)){
$marks7 += $rslt_t7_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst7alobtnd7" style="font-size:0.7rem;" value="<?php echo $marks7; ?>">
    </td>
<?php
$sel_reslt_t8_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' group by subject");
while($rslt_t8_totls=mysqli_fetch_assoc($sel_reslt_t8_totls)){
$total_marks8 += $rslt_t8_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8altotl8" style="font-size:0.7rem;" value="<?php echo $total_marks8; ?>">
    </td>
<?php
$sel_reslt_t8_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t8' group by subject");
while($rslt_t8_obttotls=mysqli_fetch_assoc($sel_reslt_t8_obttotls)){
$marks8 += $rslt_t8_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst8alobtnd8" style="font-size:0.7rem;" value="<?php echo $marks8; ?>">
    </td>
<?php
$sel_reslt_t9_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' group by subject");
while($rslt_t9_totls=mysqli_fetch_assoc($sel_reslt_t9_totls)){
$total_marks9 += $rslt_t9_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9altotl9" style="font-size:0.7rem;" value="<?php echo $total_marks9; ?>">
    </td>
<?php
$sel_reslt_t9_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t9' group by subject");
while($rslt_t9_obttotls=mysqli_fetch_assoc($sel_reslt_t9_obttotls)){
$marks9 += $rslt_t9_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst9alobtnd9" style="font-size:0.7rem;" value="<?php echo $marks9; ?>">
    </td>
<?php
$sel_reslt_t10_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' group by subject");
while($rslt_t10_totls=mysqli_fetch_assoc($sel_reslt_t10_totls)){
$total_marks10 += $rslt_t10_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10altotl10" style="font-size:0.7rem;" value="<?php echo $total_marks10; ?>">
    </td>
<?php
$sel_reslt_t10_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t10' group by subject");
while($rslt_t10_obttotls=mysqli_fetch_assoc($sel_reslt_t10_obttotls)){
$marks10 += $rslt_t10_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst10alobtnd10" style="font-size:0.7rem;" value="<?php echo $marks10; ?>">
    </td>
<?php
$sel_reslt_t11_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' group by subject");
while($rslt_t11_totls=mysqli_fetch_assoc($sel_reslt_t11_totls)){
$total_marks11 += $rslt_t11_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11altotl11" style="font-size:0.7rem;" value="<?php echo $total_marks11; ?>">
    </td>
<?php
$sel_reslt_t11_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t11' group by subject");
while($rslt_t11_obttotls=mysqli_fetch_assoc($sel_reslt_t11_obttotls)){
$marks11 += $rslt_t11_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst11alobtnd11" style="font-size:0.7rem;" value="<?php echo $marks11; ?>">
    </td>
<?php
$sel_reslt_t12_totls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' group by subject");
while($rslt_t12_totls=mysqli_fetch_assoc($sel_reslt_t12_totls)){
$total_marks12 += $rslt_t12_totls['total_marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12altotl12" style="font-size:0.7rem;" value="<?php echo $total_marks12; ?>">
    </td>
<?php
$sel_reslt_t12_obttotls = mysqli_query($con,"select * from results where roll_no='$rol_num' && session='$reslt_sesin' && instituteId='$reslt_instid' && terms='$t12' group by subject");
while($rslt_t12_obttotls=mysqli_fetch_assoc($sel_reslt_t12_obttotls)){
$marks12 += $rslt_t12_obttotls['marks'];
}
?>
    <td style="border:1px solid black;">
<input type="text" onkeypress="isInputNumber(event)" class="form-control tst12alobtnd12" style="font-size:0.7rem;" value="<?php echo $marks12; ?>">
    </td>
</tr>
    </tbody>
</table>


        </div>
    </div>
<?php
$ovrallmarks = $total_marks1+$total_marks2+$total_marks3+$total_marks4+$total_marks5+$total_marks6+$total_marks7+$total_marks8+$total_marks9+$total_marks10+$total_marks11+$total_marks12;
$ovrlallobt = $marks1+$marks2+$marks3+$marks4+$marks5+$marks6+$marks7+$marks8+$marks9+$marks10+$marks11+$marks12;
$pcgte = round($ovrlallobt/$ovrallmarks*100);
?>
<div class="row">
    <div class="col-12 text-center">
<table class="table table-responsive w-100">
     <tr style='background:hsl(35, 100%, 80%);'>
<th style="border:1px solid black;" class="p-2">Grand Total</th>
<td style="border:1px solid black;" class="p-2">
<input type="text" onkeypress="isInputNumber(event)" class="form-control grndtotls" style="font-size:0.7rem;" value="<?php echo $ovrallmarks; ?>">
</td>
<th style="border:1px solid black;" class="p-2">Grand Obt. Marks</th>
<td style="border:1px solid black;" class="p-2">
<input type="text" onkeypress="isInputNumber(event)" class="form-control grndobtns" style="font-size:0.7rem;" value="<?php echo $ovrlallobt; ?>">
</td>
<th style="border:1px solid black;" class="p-2">%age</th>
<td style="border:1px solid black;" class="p-2">
<input type="text" onkeypress="isInputNumber(event)" class="form-control grndptge" style="font-size:0.7rem;" value="<?php echo round($ovrlallobt/$ovrallmarks*100)."%"; ?>">
</td>
<th style="border:1px solid black;" class="p-2">Grade</th>
<td style="border:1px solid black;" class="p-2">
<input type="text" onkeypress="isInputNumber(event)" class="form-control grndgrde" style="font-size:0.7rem;" value="<?php 
if(round($ovrlallobt/$ovrallmarks*100) > 90){ echo "A+"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 80){ echo "A"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 70){ echo "B"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 60){ echo "C"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 50){ echo "D"; }elseif(round($ovrlallobt/$ovrallmarks*100) > 40){ echo "E"; }else{ echo "F"; }
?>">
</td>
        </tr>
        <tr>
<th colspan="30">
    <div class="d-grid">
<button type="submit" class="btn btn-apna text-uppercase" id="crtebtn">create combine result</button>
    </div>
</th>
        </tr>
</table>
    </div>
</div>
        </form>
<script>
$(document).ready(function(){
    $("#crtebtn").on('click',function(e){
e.preventDefault();

var instids = $(".instids").val();
var rolnbr = $(".rolnbr").val();
var sesions = $(".sesions").val();
var stnme = $(".stnme").val();
var fnme = $(".fnme").val();
var stimge = $(".stimge").val();
var cless = $(".cless").val();
var sectns = $(".sectns").val();

var tst1 = $(".tst1").val();
var tst2 = $(".tst2").val();
var tst3 = $(".tst3").val();
var tst4 = $(".tst4").val();
var tst5 = $(".tst5").val();
var tst6 = $(".tst6").val();
var tst7 = $(".tst7").val();
var tst8 = $(".tst8").val();
var tst9 = $(".tst9").val();
var tst10 = $(".tst10").val();
var tst11 = $(".tst11").val();
var tst12 = $(".tst12").val();

var tst1totls1 = $(".tst1totls1").val();
var tst1totls2 = $(".tst1totls2").val();
var tst1totls3 = $(".tst1totls3").val();
var tst1totls4 = $(".tst1totls4").val();
var tst1totls5 = $(".tst1totls5").val();
var tst1totls6 = $(".tst1totls6").val();
var tst1totls7 = $(".tst1totls7").val();
var tst1totls8 = $(".tst1totls8").val();
var tst1totls9 = $(".tst1totls9").val();
var tst1totls10 = $(".tst1totls10").val();

var tst2totls1 = $(".tst2totls1").val();
var tst2totls2 = $(".tst2totls2").val();
var tst2totls3 = $(".tst2totls3").val();
var tst2totls4 = $(".tst2totls4").val();
var tst2totls5 = $(".tst2totls5").val();
var tst2totls6 = $(".tst2totls6").val();
var tst2totls7 = $(".tst2totls7").val();
var tst2totls8 = $(".tst2totls8").val();
var tst2totls9 = $(".tst2totls9").val();
var tst2totls10 = $(".tst2totls10").val();

var tst3totls1 = $(".tst3totls1").val();
var tst3totls2 = $(".tst3totls2").val();
var tst3totls3 = $(".tst3totls3").val();
var tst3totls4 = $(".tst3totls4").val();
var tst3totls5 = $(".tst3totls5").val();
var tst3totls6 = $(".tst3totls6").val();
var tst3totls7 = $(".tst3totls7").val();
var tst3totls8 = $(".tst3totls8").val();
var tst3totls9 = $(".tst3totls9").val();
var tst3totls10 = $(".tst3totls10").val();

var tst4totls1 = $(".tst4totls1").val();
var tst4totls2 = $(".tst4totls2").val();
var tst4totls3 = $(".tst4totls3").val();
var tst4totls4 = $(".tst4totls4").val();
var tst4totls5 = $(".tst4totls5").val();
var tst4totls6 = $(".tst4totls6").val();
var tst4totls7 = $(".tst4totls7").val();
var tst4totls8 = $(".tst4totls8").val();
var tst4totls9 = $(".tst4totls9").val();
var tst4totls10 = $(".tst4totls10").val();

var tst5totls1 = $(".tst5totls1").val();
var tst5totls2 = $(".tst5totls2").val();
var tst5totls3 = $(".tst5totls3").val();
var tst5totls4 = $(".tst5totls4").val();
var tst5totls5 = $(".tst5totls5").val();
var tst5totls6 = $(".tst5totls6").val();
var tst5totls7 = $(".tst5totls7").val();
var tst5totls8 = $(".tst5totls8").val();
var tst5totls9 = $(".tst5totls9").val();
var tst5totls10 = $(".tst5totls10").val();

var tst6totls1 = $(".tst6totls1").val();
var tst6totls2 = $(".tst6totls2").val();
var tst6totls3 = $(".tst6totls3").val();
var tst6totls4 = $(".tst6totls4").val();
var tst6totls5 = $(".tst6totls5").val();
var tst6totls6 = $(".tst6totls6").val();
var tst6totls7 = $(".tst6totls7").val();
var tst6totls8 = $(".tst6totls8").val();
var tst6totls9 = $(".tst6totls9").val();
var tst6totls10 = $(".tst6totls10").val();

var tst7totls1 = $(".tst7totls1").val();
var tst7totls2 = $(".tst7totls2").val();
var tst7totls3 = $(".tst7totls3").val();
var tst7totls4 = $(".tst7totls4").val();
var tst7totls5 = $(".tst7totls5").val();
var tst7totls6 = $(".tst7totls6").val();
var tst7totls7 = $(".tst7totls7").val();
var tst7totls8 = $(".tst7totls8").val();
var tst7totls9 = $(".tst7totls9").val();
var tst7totls10 = $(".tst7totls10").val();

var tst8totls1 = $(".tst8totls1").val();
var tst8totls2 = $(".tst8totls2").val();
var tst8totls3 = $(".tst8totls3").val();
var tst8totls4 = $(".tst8totls4").val();
var tst8totls5 = $(".tst8totls5").val();
var tst8totls6 = $(".tst8totls6").val();
var tst8totls7 = $(".tst8totls7").val();
var tst8totls8 = $(".tst8totls8").val();
var tst8totls9 = $(".tst8totls9").val();
var tst8totls10 = $(".tst8totls10").val();

var tst9totls1 = $(".tst9totls1").val();
var tst9totls2 = $(".tst9totls2").val();
var tst9totls3 = $(".tst9totls3").val();
var tst9totls4 = $(".tst9totls4").val();
var tst9totls5 = $(".tst9totls5").val();
var tst9totls6 = $(".tst9totls6").val();
var tst9totls7 = $(".tst9totls7").val();
var tst9totls8 = $(".tst9totls8").val();
var tst9totls9 = $(".tst9totls9").val();
var tst9totls10 = $(".tst9totls10").val();

var tst10totls1 = $(".tst10totls1").val();
var tst10totls2 = $(".tst10totls2").val();
var tst10totls3 = $(".tst10totls3").val();
var tst10totls4 = $(".tst10totls4").val();
var tst10totls5 = $(".tst10totls5").val();
var tst10totls6 = $(".tst10totls6").val();
var tst10totls7 = $(".tst10totls7").val();
var tst10totls8 = $(".tst10totls8").val();
var tst10totls9 = $(".tst10totls9").val();
var tst10totls10 = $(".tst10totls10").val();


var tst11totls1 = $(".tst11totls1").val();
var tst11totls2 = $(".tst11totls2").val();
var tst11totls3 = $(".tst11totls3").val();
var tst11totls4 = $(".tst11totls4").val();
var tst11totls5 = $(".tst11totls5").val();
var tst11totls6 = $(".tst11totls6").val();
var tst11totls7 = $(".tst11totls7").val();
var tst11totls8 = $(".tst11totls8").val();
var tst11totls9 = $(".tst11totls9").val();
var tst11totls10 = $(".tst11totls10").val();

var tst12totls1 = $(".tst12totls1").val();
var tst12totls2 = $(".tst12totls2").val();
var tst12totls3 = $(".tst12totls3").val();
var tst12totls4 = $(".tst12totls4").val();
var tst12totls5 = $(".tst12totls5").val();
var tst12totls6 = $(".tst12totls6").val();
var tst12totls7 = $(".tst12totls7").val();
var tst12totls8 = $(".tst12totls8").val();
var tst12totls9 = $(".tst12totls9").val();
var tst12totls10 = $(".tst12totls10").val();

var tst1obtn1 = $(".tst1obtn1").val();
var tst1obtn2 = $(".tst1obtn2").val();
var tst1obtn3 = $(".tst1obtn3").val();
var tst1obtn4 = $(".tst1obtn4").val();
var tst1obtn5 = $(".tst1obtn5").val();
var tst1obtn6 = $(".tst1obtn6").val();
var tst1obtn7 = $(".tst1obtn7").val();
var tst1obtn8 = $(".tst1obtn8").val();
var tst1obtn9 = $(".tst1obtn9").val();
var tst1obtn10 = $(".tst1obtn10").val();

var tst2obtn1 = $(".tst2obtn1").val();
var tst2obtn2 = $(".tst2obtn2").val();
var tst2obtn3 = $(".tst2obtn3").val();
var tst2obtn4 = $(".tst2obtn4").val();
var tst2obtn5 = $(".tst2obtn5").val();
var tst2obtn6 = $(".tst2obtn6").val();
var tst2obtn7 = $(".tst2obtn7").val();
var tst2obtn8 = $(".tst2obtn8").val();
var tst2obtn9 = $(".tst2obtn9").val();
var tst2obtn10 = $(".tst2obtn10").val();

var tst3obtn1 = $(".tst3obtn1").val();
var tst3obtn2 = $(".tst3obtn2").val();
var tst3obtn3 = $(".tst3obtn3").val();
var tst3obtn4 = $(".tst3obtn4").val();
var tst3obtn5 = $(".tst3obtn5").val();
var tst3obtn6 = $(".tst3obtn6").val();
var tst3obtn7 = $(".tst3obtn7").val();
var tst3obtn8 = $(".tst3obtn8").val();
var tst3obtn9 = $(".tst3obtn9").val();
var tst3obtn10 = $(".tst3obtn10").val();

var tst4obtn1 = $(".tst4obtn1").val();
var tst4obtn2 = $(".tst4obtn2").val();
var tst4obtn3 = $(".tst4obtn3").val();
var tst4obtn4 = $(".tst4obtn4").val();
var tst4obtn5 = $(".tst4obtn5").val();
var tst4obtn6 = $(".tst4obtn6").val();
var tst4obtn7 = $(".tst4obtn7").val();
var tst4obtn8 = $(".tst4obtn8").val();
var tst4obtn9 = $(".tst4obtn9").val();
var tst4obtn10 = $(".tst4obtn10").val();

var tst5obtn1 = $(".tst5obtn1").val();
var tst5obtn2 = $(".tst5obtn2").val();
var tst5obtn3 = $(".tst5obtn3").val();
var tst5obtn4 = $(".tst5obtn4").val();
var tst5obtn5 = $(".tst5obtn5").val();
var tst5obtn6 = $(".tst5obtn6").val();
var tst5obtn7 = $(".tst5obtn7").val();
var tst5obtn8 = $(".tst5obtn8").val();
var tst5obtn9 = $(".tst5obtn9").val();
var tst5obtn10 = $(".tst5obtn10").val();

var tst6obtn1 = $(".tst6obtn1").val();
var tst6obtn2 = $(".tst6obtn2").val();
var tst6obtn3 = $(".tst6obtn3").val();
var tst6obtn4 = $(".tst6obtn4").val();
var tst6obtn5 = $(".tst6obtn5").val();
var tst6obtn6 = $(".tst6obtn6").val();
var tst6obtn7 = $(".tst6obtn7").val();
var tst6obtn8 = $(".tst6obtn8").val();
var tst6obtn9 = $(".tst6obtn9").val();
var tst6obtn10 = $(".tst6obtn10").val();

var tst7obtn1 = $(".tst7obtn1").val();
var tst7obtn2 = $(".tst7obtn2").val();
var tst7obtn3 = $(".tst7obtn3").val();
var tst7obtn4 = $(".tst7obtn4").val();
var tst7obtn5 = $(".tst7obtn5").val();
var tst7obtn6 = $(".tst7obtn6").val();
var tst7obtn7 = $(".tst7obtn7").val();
var tst7obtn8 = $(".tst7obtn8").val();
var tst7obtn9 = $(".tst7obtn9").val();
var tst7obtn10 = $(".tst7obtn10").val();

var tst8obtn1 = $(".tst8obtn1").val();
var tst8obtn2 = $(".tst8obtn2").val();
var tst8obtn3 = $(".tst8obtn3").val();
var tst8obtn4 = $(".tst8obtn4").val();
var tst8obtn5 = $(".tst8obtn5").val();
var tst8obtn6 = $(".tst8obtn6").val();
var tst8obtn7 = $(".tst8obtn7").val();
var tst8obtn8 = $(".tst8obtn8").val();
var tst8obtn9 = $(".tst8obtn9").val();
var tst8obtn10 = $(".tst8obtn10").val();

var tst9obtn1 = $(".tst9obtn1").val();
var tst9obtn2 = $(".tst9obtn2").val();
var tst9obtn3 = $(".tst9obtn3").val();
var tst9obtn4 = $(".tst9obtn4").val();
var tst9obtn5 = $(".tst9obtn5").val();
var tst9obtn6 = $(".tst9obtn6").val();
var tst9obtn7 = $(".tst9obtn7").val();
var tst9obtn8 = $(".tst9obtn8").val();
var tst9obtn9 = $(".tst9obtn9").val();
var tst9obtn10 = $(".tst9obtn10").val();

var tst10obtn1 = $(".tst10obtn1").val();
var tst10obtn2 = $(".tst10obtn2").val();
var tst10obtn3 = $(".tst10obtn3").val();
var tst10obtn4 = $(".tst10obtn4").val();
var tst10obtn5 = $(".tst10obtn5").val();
var tst10obtn6 = $(".tst10obtn6").val();
var tst10obtn7 = $(".tst10obtn7").val();
var tst10obtn8 = $(".tst10obtn8").val();
var tst10obtn9 = $(".tst10obtn9").val();
var tst10obtn10 = $(".tst10obtn10").val();

var tst11obtn1 = $(".tst11obtn1").val();
var tst11obtn2 = $(".tst11obtn2").val();
var tst11obtn3 = $(".tst11obtn3").val();
var tst11obtn4 = $(".tst11obtn4").val();
var tst11obtn5 = $(".tst11obtn5").val();
var tst11obtn6 = $(".tst11obtn6").val();
var tst11obtn7 = $(".tst11obtn7").val();
var tst11obtn8 = $(".tst11obtn8").val();
var tst11obtn9 = $(".tst11obtn9").val();
var tst11obtn10 = $(".tst11obtn10").val();

var tst12obtn1 = $(".tst12obtn1").val();
var tst12obtn2 = $(".tst12obtn2").val();
var tst12obtn3 = $(".tst12obtn3").val();
var tst12obtn4 = $(".tst12obtn4").val();
var tst12obtn5 = $(".tst12obtn5").val();
var tst12obtn6 = $(".tst12obtn6").val();
var tst12obtn7 = $(".tst12obtn7").val();
var tst12obtn8 = $(".tst12obtn8").val();
var tst12obtn9 = $(".tst12obtn9").val();
var tst12obtn10 = $(".tst12obtn10").val();

var tst1altotl1 = $(".tst1altotl1").val();
var tst2altotl2 = $(".tst2altotl2").val();
var tst3altotl3 = $(".tst3altotl3").val();
var tst4altotl4 = $(".tst4altotl4").val();
var tst5altotl5 = $(".tst5altotl5").val();
var tst6altotl6 = $(".tst6altotl6").val();
var tst7altotl7 = $(".tst7altotl7").val();
var tst8altotl8 = $(".tst8altotl8").val();
var tst9altotl9 = $(".tst9altotl9").val();
var tst10altotl10 = $(".tst10altotl10").val();
var tst11altotl11 = $(".tst11altotl11").val();
var tst12altotl12 = $(".tst12altotl12").val();

var tst1alobtnd1 = $(".tst1alobtnd1").val();
var tst2alobtnd2 = $(".tst2alobtnd2").val();
var tst3alobtnd3 = $(".tst3alobtnd3").val();
var tst4alobtnd4 = $(".tst4alobtnd4").val();
var tst5alobtnd5 = $(".tst5alobtnd5").val();
var tst6alobtnd6 = $(".tst6alobtnd6").val();
var tst7alobtnd7 = $(".tst7alobtnd7").val();
var tst8alobtnd8 = $(".tst8alobtnd8").val();
var tst9alobtnd9 = $(".tst9alobtnd9").val();
var tst10alobtnd10 = $(".tst10alobtnd10").val();
var tst11alobtnd11 = $(".tst11alobtnd11").val();
var tst12alobtnd12 = $(".tst12alobtnd12").val();

var grndtotls = $(".grndtotls").val();
var grndobtns = $(".grndobtns").val();
var grndptge = $(".grndptge").val();
var grndgrde = $(".grndgrde").val();

var subj1 = $(".subj1").val();
var subj2 = $(".subj2").val();
var subj3 = $(".subj3").val();
var subj4 = $(".subj4").val();
var subj5 = $(".subj5").val();
var subj6 = $(".subj6").val();
var subj7 = $(".subj7").val();
var subj8 = $(".subj8").val();
var subj9 = $(".subj9").val();
var subj10 = $(".subj10").val();

$.ajax({
    url: 'ajax/create-combine-result-card.php',
    type: "POST",
    data: {aplyinst_id:instids,aply_rolnbr:rolnbr,aply_sesions:sesions,stu_nme:stnme,fathr_nme:fnme,std_img:stimge,aply_cls:cless,aply_sectn:sectns,aply_tst1:tst1,aply_tst2:tst2,aply_tst3:tst3,aply_tst4:tst4,aply_tst5:tst5,aply_tst6:tst6,aply_tst7:tst7,aply_tst8:tst8,aply_tst9:tst9,aply_tst10:tst10,aply_tst11:tst11,aply_tst12:tst12,tst1_totl1:tst1totls1,tst1_totl2:tst1totls2,tst1_totl3:tst1totls3,tst1_totl4:tst1totls4,tst1_totl5:tst1totls5,tst1_totl6:tst1totls6,tst1_totl7:tst1totls7,tst1_totl8:tst1totls8,tst1_totl9:tst1totls9,tst1_totl10:tst1totls10,tst2_totl1:tst2totls1,tst2_totl2:tst2totls2,tst2_totl3:tst2totls3,tst2_totl4:tst2totls4,tst2_totl5:tst2totls5,tst2_totl6:tst2totls6,tst2_totl7:tst2totls7,tst2_totl8:tst2totls8,tst2_totl9:tst2totls9,tst2_totl10:tst2totls10,tst3_totl1:tst3totls1,tst3_totl2:tst3totls2,tst3_totl3:tst3totls3,tst3_totl4:tst3totls4,tst3_totl5:tst3totls5,tst3_totl6:tst3totls6,tst3_totl7:tst3totls7,tst3_totl8:tst3totls8,tst3_totl9:tst3totls9,tst3_totl10:tst3totls10,tst4_totl1:tst4totls1,tst4_totl2:tst4totls2,tst4_totl3:tst4totls3,tst4_totl4:tst4totls4,tst4_totl5:tst4totls5,tst4_totl6:tst4totls6,tst4_totl7:tst4totls7,tst4_totl8:tst4totls8,tst4_totl9:tst4totls9,tst4_totl10:tst4totls10,tst5_totl1:tst5totls1,tst5_totl2:tst5totls2,tst5_totl3:tst5totls3,tst5_totl4:tst5totls4,tst5_totl5:tst5totls5,tst5_totl6:tst5totls6,tst5_totl7:tst5totls7,tst5_totl8:tst5totls8,tst5_totl9:tst5totls9,tst5_totl10:tst5totls10,tst6_totl1:tst6totls1,tst6_totl2:tst6totls2,tst6_totl3:tst6totls3,tst6_totl4:tst6totls4,tst6_totl5:tst6totls5,tst6_totl6:tst6totls6,tst6_totl7:tst6totls7,tst6_totl8:tst6totls8,tst6_totl9:tst6totls9,tst6_totl10:tst6totls10,tst7_totl1:tst7totls1,tst7_totl2:tst7totls2,tst7_totl3:tst7totls3,tst7_totl4:tst7totls4,tst7_totl5:tst7totls5,tst7_totl6:tst7totls6,tst7_totl7:tst7totls7,tst7_totl8:tst7totls8,tst7_totl9:tst7totls9,tst7_totl10:tst7totls10,tst8_totl1:tst8totls1,tst8_totl2:tst8totls2,tst8_totl3:tst8totls3,tst8_totl4:tst8totls4,tst8_totl5:tst8totls5,tst8_totl6:tst8totls6,tst8_totl7:tst8totls7,tst8_totl8:tst8totls8,tst8_totl9:tst8totls9,tst8_totl10:tst8totls10,tst9_totl1:tst9totls1,tst9_totl2:tst9totls2,tst9_totl3:tst9totls3,tst9_totl4:tst9totls4,tst9_totl5:tst9totls5,tst9_totl6:tst9totls6,tst9_totl7:tst9totls7,tst9_totl8:tst9totls8,tst9_totl9:tst9totls9,tst9_totl10:tst9totls10,tst10_tots1:tst10totls1,tst10_tots2:tst10totls2,tst10_tots3:tst10totls3,tst10_tots4:tst10totls4,tst10_tots5:tst10totls5,tst10_tots6:tst10totls6,tst10_tots7:tst10totls7,tst10_tots8:tst10totls8,tst10_tots9:tst10totls9,tst10_tots10:tst10totls10,tst11_totl1:tst11totls1,tst11_totl2:tst11totls2,tst11_totl3:tst11totls3,tst11_totl4:tst11totls4,tst11_totl5:tst11totls5,tst11_totl6:tst11totls6,tst11_totl7:tst11totls7,tst11_totl8:tst11totls8,tst11_totl9:tst11totls9,tst11_totl10:tst11totls10,tst12_totl1:tst12totls1,tst12_totl2:tst12totls2,tst12_totl3:tst12totls3,tst12_totl4:tst12totls4,tst12_totl5:tst12totls5,tst12_totl6:tst12totls6,tst12_totl7:tst12totls7,tst12_totl8:tst12totls8,tst12_totl9:tst12totls9,tst12_totl10:tst12totls10,tst1_obts1:tst1obtn1,tst1_obts2:tst1obtn2,tst1_obts3:tst1obtn3,tst1_obts4:tst1obtn4,tst1_obts5:tst1obtn5,tst1_obts6:tst1obtn6,tst1_obts7:tst1obtn7,tst1_obts8:tst1obtn8,tst1_obts9:tst1obtn9,tst1_obts10:tst1obtn10,tst2_obts1:tst2obtn1,tst2_obts2:tst2obtn2,tst2_obts3:tst2obtn3,tst2_obts4:tst2obtn4,tst2_obts5:tst2obtn5,tst2_obts6:tst2obtn6,tst2_obts7:tst2obtn7,tst2_obts8:tst2obtn8,tst2_obts9:tst2obtn9,tst2_obts10:tst2obtn10,tst3_obts1:tst3obtn1,tst3_obts2:tst3obtn2,tst3_obts3:tst3obtn3,tst3_obts4:tst3obtn4,tst3_obts5:tst3obtn5,tst3_obts6:tst3obtn6,tst3_obts7:tst3obtn7,tst3_obts8:tst3obtn8,tst3_obts9:tst3obtn9,tst3_obts10:tst3obtn10,tst4_obts1:tst4obtn1,tst4_obts2:tst4obtn2,tst4_obts3:tst4obtn3,tst4_obts4:tst4obtn4,tst4_obts5:tst4obtn5,tst4_obts6:tst4obtn6,tst4_obts7:tst4obtn7,tst4_obts8:tst4obtn8,tst4_obts9:tst4obtn9,tst4_obts10:tst4obtn10,tst5_obts1:tst5obtn1,tst5_obts2:tst5obtn2,tst5_obts3:tst5obtn3,tst5_obts4:tst5obtn4,tst5_obts5:tst5obtn5,tst5_obts6:tst5obtn6,tst5_obts7:tst5obtn7,tst5_obts8:tst5obtn8,tst5_obts9:tst5obtn9,tst5_obts10:tst5obtn10,tst6_obts1:tst6obtn1,tst6_obts2:tst6obtn2,tst6_obts3:tst6obtn3,tst6_obts4:tst6obtn4,tst6_obts5:tst6obtn5,tst6_obts6:tst6obtn6,tst6_obts7:tst6obtn7,tst6_obts8:tst6obtn8,tst6_obts9:tst6obtn9,tst6_obts10:tst6obtn10,tst7_obts1:tst7obtn1,tst7_obts2:tst7obtn2,tst7_obts3:tst7obtn3,tst7_obts4:tst7obtn4,tst7_obts5:tst7obtn5,tst7_obts6:tst7obtn6,tst7_obts7:tst7obtn7,tst7_obts8:tst7obtn8,tst7_obts9:tst7obtn9,tst7_obts10:tst7obtn10,tst8_obts1:tst8obtn1,tst8_obts2:tst8obtn2,tst8_obts3:tst8obtn3,tst8_obts4:tst8obtn4,tst8_obts5:tst8obtn5,tst8_obts6:tst8obtn6,tst8_obts7:tst8obtn7,tst8_obts8:tst8obtn8,tst8_obts9:tst8obtn9,tst8_obts10:tst8obtn10,tst9_obts1:tst9obtn1,tst9_obts2:tst9obtn2,tst9_obts3:tst9obtn3,tst9_obts4:tst9obtn4,tst9_obts5:tst9obtn5,tst9_obts6:tst9obtn6,tst9_obts7:tst9obtn7,tst9_obts8:tst9obtn8,tst9_obts9:tst9obtn9,tst9_obts10:tst9obtn10,tst10_obts1:tst10obtn1,tst10_obts2:tst10obtn2,tst10_obts3:tst10obtn3,tst10_obts4:tst10obtn4,tst10_obts5:tst10obtn5,tst10_obts6:tst10obtn6,tst10_obts7:tst10obtn7,tst10_obts8:tst10obtn8,tst10_obts9:tst10obtn9,tst10_obts10:tst10obtn10,tst11_obts1:tst11obtn1,tst11_obts2:tst11obtn2,tst11_obts3:tst11obtn3,tst11_obts4:tst11obtn4,tst11_obts5:tst11obtn5,tst11_obts6:tst11obtn6,tst11_obts7:tst11obtn7,tst11_obts8:tst11obtn8,tst11_obts9:tst11obtn9,tst11_obts10:tst11obtn10,tst12_obts1:tst12obtn1,tst12_obts2:tst12obtn2,tst12_obts3:tst12obtn3,tst12_obts4:tst12obtn4,tst12_obts5:tst12obtn5,tst12_obts6:tst12obtn6,tst12_obts7:tst12obtn7,tst12_obts8:tst12obtn8,tst12_obts9:tst12obtn9,tst12_obts10:tst12obtn10,tst1_altos1:tst1altotl1,tst2_altos2:tst2altotl2,tst3_altos3:tst3altotl3,tst4_altos4:tst4altotl4,tst5_altos5:tst5altotl5,tst6_altos6:tst6altotl6,tst7_altos7:tst7altotl7,tst8_altos8:tst8altotl8,tst9_altos9:tst9altotl9,tst10_altos10:tst10altotl10,tst11_altos11:tst11altotl11,tst12_altos12:tst12altotl12,tst1_alobts1:tst1alobtnd1,tst2_alobts2:tst2alobtnd2,tst3_alobts3:tst3alobtnd3,tst4_alobts4:tst4alobtnd4,tst5_alobts5:tst5alobtnd5,tst6_alobts6:tst6alobtnd6,tst7_alobts7:tst7alobtnd7,tst8_alobts8:tst8alobtnd8,tst9_alobts9:tst9alobtnd9,tst10_alobts10:tst10alobtnd10,tst11_alobts11:tst11alobtnd11,tst12_alobts12:tst12alobtnd12,grend_totls:grndtotls,grend_obtns:grndobtns,grend_ptge:grndptge,grend_grde:grndgrde,aply_subj1:subj1,aply_subj2:subj2,aply_subj3:subj3,aply_subj4:subj4,aply_subj5:subj5,aply_subj6:subj6,aply_subj7:subj7,aply_subj8:subj8,aply_subj9:subj9,aply_subj10:subj10},
    
    success: function(combnecard){
if(combnecard == 1){
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Combine Result Card Successfully Create!"
});
}else{
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "error",
  title: "Combine Result Card is not Create!"
});
}
    }
});

    });
});
</script>