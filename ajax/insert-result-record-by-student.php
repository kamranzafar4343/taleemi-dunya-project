<?php
require_once("../functions/db.php");

$insti_ids = $_POST['insti_ids'];
$rolnbr = $_POST['rolnbr'];
$snaps = $_POST['snaps'];
$student_name = $_POST['student_name'];
$fathr_nme = $_POST['fathr_nme'];
$aply_clas = $_POST['aply_clas'];
$sectin = $_POST['sectin'];
$sesion = $_POST['sesion'];
$test_term = $_POST['test_term'];

$subjcts = $_POST['subjcts'];

$subj1 = $subjcts['0'];
$subj2 = $subjcts['1'];
$subj3 = $subjcts['2'];
$subj4 = $subjcts['3'];
$subj5 = $subjcts['4'];
$subj6 = $subjcts['5'];
$subj7 = $subjcts['6'];
$subj8 = $subjcts['7'];
$subj9 = $subjcts['8'];
$subj10 = $subjcts['9'];
$subj11 = $subjcts['10'];
$subj12 = $subjcts['11'];
$subj13 = $subjcts['12'];
$subj14 = $subjcts['13'];

$totl_mrks = $_POST['totl_mrks'];

$totl1 = $totl_mrks['0'];
$totl2 = $totl_mrks['1'];
$totl3 = $totl_mrks['2'];
$totl4 = $totl_mrks['3'];
$totl5 = $totl_mrks['4'];
$totl6 = $totl_mrks['5'];
$totl7 = $totl_mrks['6'];
$totl8 = $totl_mrks['7'];
$totl9 = $totl_mrks['8'];
$totl10 = $totl_mrks['9'];
$totl11 = $totl_mrks['10'];
$totl12 = $totl_mrks['11'];
$totl13 = $totl_mrks['12'];
$totl14 = $totl_mrks['13'];

$obtnd_mrks = $_POST['obtnd_mrked'];

$obtnd1 = $obtnd_mrks['0'];
$obtnd2 = $obtnd_mrks['1'];
$obtnd3 = $obtnd_mrks['2'];
$obtnd4 = $obtnd_mrks['3'];
$obtnd5 = $obtnd_mrks['4'];
$obtnd6 = $obtnd_mrks['5'];
$obtnd7 = $obtnd_mrks['6'];
$obtnd8 = $obtnd_mrks['7'];
$obtnd9 = $obtnd_mrks['8'];
$obtnd10 = $obtnd_mrks['9'];
$obtnd11 = $obtnd_mrks['10'];
$obtnd12 = $obtnd_mrks['11'];
$obtnd13 = $obtnd_mrks['12'];
$obtnd14 = $obtnd_mrks['13'];

$perctges = $_POST['perctges'];

$prctg1 = $perctges['0'];
$prctg2 = $perctges['1'];
$prctg3 = $perctges['2'];
$prctg4 = $perctges['3'];
$prctg5 = $perctges['4'];
$prctg6 = $perctges['5'];
$prctg7 = $perctges['6'];
$prctg8 = $perctges['7'];
$prctg9 = $perctges['8'];
$prctg10 = $perctges['9'];
$prctg11 = $perctges['10'];
$prctg12 = $perctges['11'];
$prctg13 = $perctges['12'];
$prctg14 = $perctges['13'];

$grdes = $_POST['grdes'];

$grd1 = $grdes['0'];
$grd2 = $grdes['1'];
$grd3 = $grdes['2'];
$grd4 = $grdes['3'];
$grd5 = $grdes['4'];
$grd6 = $grdes['5'];
$grd7 = $grdes['6'];
$grd8 = $grdes['7'];
$grd9 = $grdes['8'];
$grd10 = $grdes['9'];
$grd11 = $grdes['10'];
$grd12 = $grdes['11'];
$grd13 = $grdes['12'];
$grd14 = $grdes['13'];

$totl_marks = $_POST['totl_marks'];
$obtnd_mrks = $_POST['obtnd_mrks'];
$ovral_perctg = $_POST['ovral_perctg'];
$ovral_grades = $_POST['ovral_grades'];
$ovral_remarks = $_POST['ovral_remarks'];
$ovral_status = $_POST['ovral_status'];


$dupl = mysqli_query($con,"select * from finalResults where instituteId='$insti_ids' && rollnumber='$rolnbr' && session='$sesion' && term='$test_term'");
if(mysqli_num_rows($dupl)>0){ echo 11; }else{
$inst_reslts = mysqli_query($con,"insert into finalResults(instituteId,rollnumber,stu_image,student_name,father_name,class,section,session,term,subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8,subject9,subject10,subject11,subject12,subject13,subject14,total_marks1,total_marks2,total_marks3,total_marks4,total_marks5,total_marks6,total_marks7,total_marks8,total_marks9,total_marks10,total_marks11,total_marks12,total_marks13,total_marks14,obtain_marks1,obtain_marks2,obtain_marks3,obtain_marks4,obtain_marks5,obtain_marks6,obtain_marks7,obtain_marks8,obtain_marks9,obtain_marks10,obtain_marks11,obtain_marks12,obtain_marks13,obtain_marks14,percentage1,percentage2,percentage3,percentage4,percentage5,percentage6,percentage7,percentage8,percentage9,percentage10,percentage11,percentage12,percentage13,percentage14,remarks1,remarks2,remarks3,remarks4,remarks5,remarks6,remarks7,remarks8,remarks9,remarks10,remarks11,remarks12,remarks13,remarks14,sub_total,overall_obtained,overall_percentage,overall_grade,overall_remarks,overall_status)values('$insti_ids','$rolnbr','$snaps','$student_name','$fathr_nme','$aply_clas','$sectin','$sesion','$test_term','$subj1','$subj2','$subj3','$subj4','$subj5','$subj6','$subj7','$subj8','$subj9','$subj10','$subj11','$subj12','$subj13','$subj14','$totl1','$totl2','$totl3','$totl4','$totl5','$totl6','$totl7','$totl8','$totl9','$totl10','$totl11','$totl12','$totl13','$totl14','$obtnd1','$obtnd2','$obtnd3','$obtnd4','$obtnd5','$obtnd6','$obtnd7','$obtnd8','$obtnd9','$obtnd10','$obtnd11','$obtnd12','$obtnd13','$obtnd14','$prctg1','$prctg2','$prctg3','$prctg4','$prctg5','$prctg6','$prctg7','$prctg8','$prctg9','$prctg10','$prctg11','$prctg12','$prctg13','$prctg14','$grd1','$grd2','$grd3','$grd4','$grd5','$grd6','$grd7','$grd8','$grd9','$grd10','$grd11','$grd12','$grd13','$grd14','$totl_marks','$obtnd_mrks','$ovral_perctg','$ovral_grades','$ovral_remarks','$ovral_status')");
if($inst_reslts == true){ echo 1; }else{ echo 0;}
}
?>