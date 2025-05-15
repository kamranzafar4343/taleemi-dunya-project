<?php
require_once("../functions/db.php");

$aplyinst_id = $_POST['aplyinst_id'];
$aply_rolnbr = $_POST['aply_rolnbr'];
$aply_sesions = $_POST['aply_sesions'];
$stu_nme = $_POST['stu_nme'];
$fathr_nme = $_POST['fathr_nme'];
$std_img = $_POST['std_img'];
$aply_cls = $_POST['aply_cls'];
$aply_sectn = $_POST['aply_sectn'];

$aply_tst1 = $_POST['aply_tst1'];
$aply_tst2 = $_POST['aply_tst2'];
$aply_tst3 = $_POST['aply_tst3'];
$aply_tst4 = $_POST['aply_tst4'];
$aply_tst5 = $_POST['aply_tst5'];
$aply_tst6 = $_POST['aply_tst6'];
$aply_tst7 = $_POST['aply_tst7'];
$aply_tst8 = $_POST['aply_tst8'];
$aply_tst9 = $_POST['aply_tst9'];
$aply_tst10 = $_POST['aply_tst10'];
$aply_tst11 = $_POST['aply_tst11'];
$aply_tst12 = $_POST['aply_tst12'];

$tst1_totl1 = $_POST['tst1_totl1'];
$tst1_totl2 = $_POST['tst1_totl2'];
$tst1_totl3 = $_POST['tst1_totl3'];
$tst1_totl4 = $_POST['tst1_totl4'];
$tst1_totl5 = $_POST['tst1_totl5'];
$tst1_totl6 = $_POST['tst1_totl6'];
$tst1_totl7 = $_POST['tst1_totl7'];
$tst1_totl8 = $_POST['tst1_totl8'];
$tst1_totl9 = $_POST['tst1_totl9'];
$tst1_totl10 = $_POST['tst1_totl10'];

$tst2_totl1 = $_POST['tst2_totl1'];
$tst2_totl2 = $_POST['tst2_totl2'];
$tst2_totl3 = $_POST['tst2_totl3'];
$tst2_totl4 = $_POST['tst2_totl4'];
$tst2_totl5 = $_POST['tst2_totl5'];
$tst2_totl6 = $_POST['tst2_totl6'];
$tst2_totl7 = $_POST['tst2_totl7'];
$tst2_totl8 = $_POST['tst2_totl8'];
$tst2_totl9 = $_POST['tst2_totl9'];
$tst2_totl10 = $_POST['tst2_totl10'];

$tst3_totl1 = $_POST['tst3_totl1'];
$tst3_totl2 = $_POST['tst3_totl2'];
$tst3_totl3 = $_POST['tst3_totl3'];
$tst3_totl4 = $_POST['tst3_totl4'];
$tst3_totl5 = $_POST['tst3_totl5'];
$tst3_totl6 = $_POST['tst3_totl6'];
$tst3_totl7 = $_POST['tst3_totl7'];
$tst3_totl8 = $_POST['tst3_totl8'];
$tst3_totl9 = $_POST['tst3_totl9'];
$tst3_totl10 = $_POST['tst3_totl10'];

$tst4_totl1 = $_POST['tst4_totl1'];
$tst4_totl2 = $_POST['tst4_totl2'];
$tst4_totl3 = $_POST['tst4_totl3'];
$tst4_totl4 = $_POST['tst4_totl4'];
$tst4_totl5 = $_POST['tst4_totl5'];
$tst4_totl6 = $_POST['tst4_totl6'];
$tst4_totl7 = $_POST['tst4_totl7'];
$tst4_totl8 = $_POST['tst4_totl8'];
$tst4_totl9 = $_POST['tst4_totl9'];
$tst4_totl10 = $_POST['tst4_totl10'];

$tst5_totl1 = $_POST['tst5_totl1'];
$tst5_totl2 = $_POST['tst5_totl2'];
$tst5_totl3 = $_POST['tst5_totl3'];
$tst5_totl4 = $_POST['tst5_totl4'];
$tst5_totl5 = $_POST['tst5_totl5'];
$tst5_totl6 = $_POST['tst5_totl6'];
$tst5_totl7 = $_POST['tst5_totl7'];
$tst5_totl8 = $_POST['tst5_totl8'];
$tst5_totl9 = $_POST['tst5_totl9'];
$tst5_totl10 = $_POST['tst5_totl10'];

$tst6_totl1 = $_POST['tst6_totl1'];
$tst6_totl2 = $_POST['tst6_totl2'];
$tst6_totl3 = $_POST['tst6_totl3'];
$tst6_totl4 = $_POST['tst6_totl4'];
$tst6_totl5 = $_POST['tst6_totl5'];
$tst6_totl6 = $_POST['tst6_totl6'];
$tst6_totl7 = $_POST['tst6_totl7'];
$tst6_totl8 = $_POST['tst6_totl8'];
$tst6_totl9 = $_POST['tst6_totl9'];
$tst6_totl10 = $_POST['tst6_totl10'];

$tst7_totl1 = $_POST['tst7_totl1'];
$tst7_totl2 = $_POST['tst7_totl2'];
$tst7_totl3 = $_POST['tst7_totl3'];
$tst7_totl4 = $_POST['tst7_totl4'];
$tst7_totl5 = $_POST['tst7_totl5'];
$tst7_totl6 = $_POST['tst7_totl6'];
$tst7_totl7 = $_POST['tst7_totl7'];
$tst7_totl8 = $_POST['tst7_totl8'];
$tst7_totl9 = $_POST['tst7_totl9'];
$tst7_totl10 = $_POST['tst7_totl10'];

$tst8_totl1 = $_POST['tst8_totl1'];
$tst8_totl2 = $_POST['tst8_totl2'];
$tst8_totl3 = $_POST['tst8_totl3'];
$tst8_totl4 = $_POST['tst8_totl4'];
$tst8_totl5 = $_POST['tst8_totl5'];
$tst8_totl6 = $_POST['tst8_totl6'];
$tst8_totl7 = $_POST['tst8_totl7'];
$tst8_totl8 = $_POST['tst8_totl8'];
$tst8_totl9 = $_POST['tst8_totl9'];
$tst8_totl10 = $_POST['tst8_totl10'];

$tst9_totl1 = $_POST['tst9_totl1'];
$tst9_totl2 = $_POST['tst9_totl2'];
$tst9_totl3 = $_POST['tst9_totl3'];
$tst9_totl4 = $_POST['tst9_totl4'];
$tst9_totl5 = $_POST['tst9_totl5'];
$tst9_totl6 = $_POST['tst9_totl6'];
$tst9_totl7 = $_POST['tst9_totl7'];
$tst9_totl8 = $_POST['tst9_totl8'];
$tst9_totl9 = $_POST['tst9_totl9'];
$tst9_totl10 = $_POST['tst9_totl10'];

$tst10_tots1 = $_POST['tst10_tots1'];
$tst10_tots2 = $_POST['tst10_tots2'];
$tst10_tots3 = $_POST['tst10_tots3'];
$tst10_tots4 = $_POST['tst10_tots4'];
$tst10_tots5 = $_POST['tst10_tots5'];
$tst10_tots6 = $_POST['tst10_tots6'];
$tst10_tots7 = $_POST['tst10_tots7'];
$tst10_tots8 = $_POST['tst10_tots8'];
$tst10_tots9 = $_POST['tst10_tots9'];
$tst10_tots10 = $_POST['tst10_tots10'];

$tst11_totl1 = $_POST['tst11_totl1'];
$tst11_totl2 = $_POST['tst11_totl2'];
$tst11_totl3 = $_POST['tst11_totl3'];
$tst11_totl4 = $_POST['tst11_totl4'];
$tst11_totl5 = $_POST['tst11_totl5'];
$tst11_totl6 = $_POST['tst11_totl6'];
$tst11_totl7 = $_POST['tst11_totl7'];
$tst11_totl8 = $_POST['tst11_totl8'];
$tst11_totl9 = $_POST['tst11_totl9'];
$tst11_totl10 = $_POST['tst11_totl10'];

$tst12_totl1 = $_POST['tst12_totl1'];
$tst12_totl2 = $_POST['tst12_totl2'];
$tst12_totl3 = $_POST['tst12_totl3'];
$tst12_totl4 = $_POST['tst12_totl4'];
$tst12_totl5 = $_POST['tst12_totl5'];
$tst12_totl6 = $_POST['tst12_totl6'];
$tst12_totl7 = $_POST['tst12_totl7'];
$tst12_totl8 = $_POST['tst12_totl8'];
$tst12_totl9 = $_POST['tst12_totl9'];
$tst12_totl10 = $_POST['tst12_totl10'];


$tst1_obts1 = $_POST['tst1_obts1'];
$tst1_obts2 = $_POST['tst1_obts2'];
$tst1_obts3 = $_POST['tst1_obts3'];
$tst1_obts4 = $_POST['tst1_obts4'];
$tst1_obts5 = $_POST['tst1_obts5'];
$tst1_obts6 = $_POST['tst1_obts6'];
$tst1_obts7 = $_POST['tst1_obts7'];
$tst1_obts8 = $_POST['tst1_obts8'];
$tst1_obts9 = $_POST['tst1_obts9'];
$tst1_obts10 = $_POST['tst1_obts10'];


$tst2_obts1 = $_POST['tst2_obts1'];
$tst2_obts2 = $_POST['tst2_obts2'];
$tst2_obts3 = $_POST['tst2_obts3'];
$tst2_obts4 = $_POST['tst2_obts4'];
$tst2_obts5 = $_POST['tst2_obts5'];
$tst2_obts6 = $_POST['tst2_obts6'];
$tst2_obts7 = $_POST['tst2_obts7'];
$tst2_obts8 = $_POST['tst2_obts8'];
$tst2_obts9 = $_POST['tst2_obts9'];
$tst2_obts10 = $_POST['tst2_obts10'];


$tst3_obts1 = $_POST['tst3_obts1'];
$tst3_obts2 = $_POST['tst3_obts2'];
$tst3_obts3 = $_POST['tst3_obts3'];
$tst3_obts4 = $_POST['tst3_obts4'];
$tst3_obts5 = $_POST['tst3_obts5'];
$tst3_obts6 = $_POST['tst3_obts6'];
$tst3_obts7 = $_POST['tst3_obts7'];
$tst3_obts8 = $_POST['tst3_obts8'];
$tst3_obts9 = $_POST['tst3_obts9'];
$tst3_obts10 = $_POST['tst3_obts10'];


$tst4_obts1 = $_POST['tst4_obts1'];
$tst4_obts2 = $_POST['tst4_obts2'];
$tst4_obts3 = $_POST['tst4_obts3'];
$tst4_obts4 = $_POST['tst4_obts4'];
$tst4_obts5 = $_POST['tst4_obts5'];
$tst4_obts6 = $_POST['tst4_obts6'];
$tst4_obts7 = $_POST['tst4_obts7'];
$tst4_obts8 = $_POST['tst4_obts8'];
$tst4_obts9 = $_POST['tst4_obts9'];
$tst4_obts10 = $_POST['tst4_obts10'];


$tst5_obts1 = $_POST['tst5_obts1'];
$tst5_obts2 = $_POST['tst5_obts2'];
$tst5_obts3 = $_POST['tst5_obts3'];
$tst5_obts4 = $_POST['tst5_obts4'];
$tst5_obts5 = $_POST['tst5_obts5'];
$tst5_obts6 = $_POST['tst5_obts6'];
$tst5_obts7 = $_POST['tst5_obts7'];
$tst5_obts8 = $_POST['tst5_obts8'];
$tst5_obts9 = $_POST['tst5_obts9'];
$tst5_obts10 = $_POST['tst5_obts10'];


$tst6_obts1 = $_POST['tst6_obts1'];
$tst6_obts2 = $_POST['tst6_obts2'];
$tst6_obts3 = $_POST['tst6_obts3'];
$tst6_obts4 = $_POST['tst6_obts4'];
$tst6_obts5 = $_POST['tst6_obts5'];
$tst6_obts6 = $_POST['tst6_obts6'];
$tst6_obts7 = $_POST['tst6_obts7'];
$tst6_obts8 = $_POST['tst6_obts8'];
$tst6_obts9 = $_POST['tst6_obts9'];
$tst6_obts10 = $_POST['tst6_obts10'];


$tst7_obts1 = $_POST['tst7_obts1'];
$tst7_obts2 = $_POST['tst7_obts2'];
$tst7_obts3 = $_POST['tst7_obts3'];
$tst7_obts4 = $_POST['tst7_obts4'];
$tst7_obts5 = $_POST['tst7_obts5'];
$tst7_obts6 = $_POST['tst7_obts6'];
$tst7_obts7 = $_POST['tst7_obts7'];
$tst7_obts8 = $_POST['tst7_obts8'];
$tst7_obts9 = $_POST['tst7_obts9'];
$tst7_obts10 = $_POST['tst7_obts10'];


$tst8_obts1 = $_POST['tst8_obts1'];
$tst8_obts2 = $_POST['tst8_obts2'];
$tst8_obts3 = $_POST['tst8_obts3'];
$tst8_obts4 = $_POST['tst8_obts4'];
$tst8_obts5 = $_POST['tst8_obts5'];
$tst8_obts6 = $_POST['tst8_obts6'];
$tst8_obts7 = $_POST['tst8_obts7'];
$tst8_obts8 = $_POST['tst8_obts8'];
$tst8_obts9 = $_POST['tst8_obts9'];
$tst8_obts10 = $_POST['tst8_obts10'];

$tst9_obts1 = $_POST['tst9_obts1'];
$tst9_obts2 = $_POST['tst9_obts2'];
$tst9_obts3 = $_POST['tst9_obts3'];
$tst9_obts4 = $_POST['tst9_obts4'];
$tst9_obts5 = $_POST['tst9_obts5'];
$tst9_obts6 = $_POST['tst9_obts6'];
$tst9_obts7 = $_POST['tst9_obts7'];
$tst9_obts8 = $_POST['tst9_obts8'];
$tst9_obts9 = $_POST['tst9_obts9'];
$tst9_obts10 = $_POST['tst9_obts10'];

$tst10_obts1 = $_POST['tst10_obts1'];
$tst10_obts2 = $_POST['tst10_obts2'];
$tst10_obts3 = $_POST['tst10_obts3'];
$tst10_obts4 = $_POST['tst10_obts4'];
$tst10_obts5 = $_POST['tst10_obts5'];
$tst10_obts6 = $_POST['tst10_obts6'];
$tst10_obts7 = $_POST['tst10_obts7'];
$tst10_obts8 = $_POST['tst10_obts8'];
$tst10_obts9 = $_POST['tst10_obts9'];
$tst10_obts10 = $_POST['tst10_obts10'];

$tst11_obts1 = $_POST['tst11_obts1'];
$tst11_obts2 = $_POST['tst11_obts2'];
$tst11_obts3 = $_POST['tst11_obts3'];
$tst11_obts4 = $_POST['tst11_obts4'];
$tst11_obts5 = $_POST['tst11_obts5'];
$tst11_obts6 = $_POST['tst11_obts6'];
$tst11_obts7 = $_POST['tst11_obts7'];
$tst11_obts8 = $_POST['tst11_obts8'];
$tst11_obts9 = $_POST['tst11_obts9'];
$tst11_obts10 = $_POST['tst11_obts10'];

$tst12_obts1 = $_POST['tst12_obts1'];
$tst12_obts2 = $_POST['tst12_obts2'];
$tst12_obts3 = $_POST['tst12_obts3'];
$tst12_obts4 = $_POST['tst12_obts4'];
$tst12_obts5 = $_POST['tst12_obts5'];
$tst12_obts6 = $_POST['tst12_obts6'];
$tst12_obts7 = $_POST['tst12_obts7'];
$tst12_obts8 = $_POST['tst12_obts8'];
$tst12_obts9 = $_POST['tst12_obts9'];
$tst12_obts10 = $_POST['tst12_obts10'];

$tst1_altos1 = $_POST['tst1_altos1'];
$tst2_altos2 = $_POST['tst2_altos2'];
$tst3_altos3 = $_POST['tst3_altos3'];
$tst4_altos4 = $_POST['tst4_altos4'];
$tst5_altos5 = $_POST['tst5_altos5'];
$tst6_altos6 = $_POST['tst6_altos6'];
$tst7_altos7 = $_POST['tst7_altos7'];
$tst8_altos8 = $_POST['tst8_altos8'];
$tst9_altos9 = $_POST['tst9_altos9'];
$tst10_altos10 = $_POST['tst10_altos10'];
$tst11_altos11 = $_POST['tst11_altos11'];
$tst12_altos12 = $_POST['tst12_altos12'];

$tst1_alobts1 = $_POST['tst1_alobts1'];
$tst2_alobts2 = $_POST['tst2_alobts2'];
$tst3_alobts3 = $_POST['tst3_alobts3'];
$tst4_alobts4 = $_POST['tst4_alobts4'];
$tst5_alobts5 = $_POST['tst5_alobts5'];
$tst6_alobts6 = $_POST['tst6_alobts6'];
$tst7_alobts7 = $_POST['tst7_alobts7'];
$tst8_alobts8 = $_POST['tst8_alobts8'];
$tst9_alobts9 = $_POST['tst9_alobts9'];
$tst10_alobts10 = $_POST['tst10_alobts10'];
$tst11_alobts11 = $_POST['tst11_alobts11'];
$tst12_alobts12 = $_POST['tst12_alobts12'];

$aply_subj1 = $_POST['aply_subj1'];
$aply_subj2 = $_POST['aply_subj2'];
$aply_subj3 = $_POST['aply_subj3'];
$aply_subj4 = $_POST['aply_subj4'];
$aply_subj5 = $_POST['aply_subj5'];
$aply_subj6 = $_POST['aply_subj6'];
$aply_subj7 = $_POST['aply_subj7'];
$aply_subj8 = $_POST['aply_subj8'];
$aply_subj9 = $_POST['aply_subj9'];
$aply_subj10 = $_POST['aply_subj10'];

$grend_totls = $_POST['grend_totls'];
$grend_obtns = $_POST['grend_obtns'];
$grend_ptge = $_POST['grend_ptge'];
$grend_grde = $_POST['grend_grde'];



$dupl = mysqli_query($con,"select * from finalCombineResults where instituteId='$aplyinst_id' && roll_number='$aply_rolnbr' && session='$aply_sesions'");
if(mysqli_num_rows($dupl)>0){
    echo 11;
}else{
    $inst_combne = mysqli_query($con,"insert into finalCombineResults(instituteId,roll_number,session,student_name,father_name,student_image,class,section,test1,test2,test3,test4,test5,test6,test7,test8,test9,test10,test11,test12,test1_total1,test1_total2,test1_total3,test1_total4,test1_total5,test1_total6,test1_total7,test1_total8,test1_total9,test1_total10,test2_total1,test2_total2,test2_total3,test2_total4,test2_total5,test2_total6,test2_total7,test2_total8,test2_total9,test2_total10,test3_total1,test3_total2,test3_total3,test3_total4,test3_total5,test3_total6,test3_total7,test3_total8,test3_total9,test3_total10,test4_total1,test4_total2,test4_total3,test4_total4,test4_total5,test4_total6,test4_total7,test4_total8,test4_total9,test4_total10,test5_total1,test5_total2,test5_total3,test5_total4,test5_total5,test5_total6,test5_total7,test5_total8,test5_total9,test5_total10,test6_total1,test6_total2,test6_total3,test6_total4,test6_total5,test6_total6,test6_total7,test6_total8,test6_total9,test6_total10,test7_total1,test7_total2,test7_total3,test7_total4,test7_total5,test7_total6,test7_total7,test7_total8,test7_total9,test7_total10,test8_total1,test8_total2,test8_total3,test8_total4,test8_total5,test8_total6,test8_total7,test8_total8,test8_total9,test8_total10,test9_total1,test9_total2,test9_total3,test9_total4,test9_total5,test9_total6,test9_total7,test9_total8,test9_total9,test9_total10,test10_total1,test10_total2,test10_total3,test10_total4,test10_total5,test10_total6,test10_total7,test10_total8,test10_total9,test10_total10,test11_total1,test11_total2,test11_total3,test11_total4,test11_total5,test11_total6,test11_total7,test11_total8,test11_total9,test11_total10,test12_total1,test12_total2,test12_total3,test12_total4,test12_total5,test12_total6,test12_total7,test12_total8,test12_total9,test12_total10,test1_obt1,test1_obt2,test1_obt3,test1_obt4,test1_obt5,test1_obt6,test1_obt7,test1_obt8,test1_obt9,test1_obt10,test2_obt1,test2_obt2,test2_obt3,test2_obt4,test2_obt5,test2_obt6,test2_obt7,test2_obt8,test2_obt9,test2_obt10,test3_obt1,test3_obt2,test3_obt3,test3_obt4,test3_obt5,test3_obt6,test3_obt7,test3_obt8,test3_obt9,test3_obt10,test4_obt1,test4_obt2,test4_obt3,test4_obt4,test4_obt5,test4_obt6,test4_obt7,test4_obt8,test4_obt9,test4_obt10,test5_obt1,test5_obt2,test5_obt3,test5_obt4,test5_obt5,test5_obt6,test5_obt7,test5_obt8,test5_obt9,test5_obt10,test6_obt1,test6_obt2,test6_obt3,test6_obt4,test6_obt5,test6_obt6,test6_obt7,test6_obt8,test6_obt9,test6_obt10,test7_obt1,test7_obt2,test7_obt3,test7_obt4,test7_obt5,test7_obt6,test7_obt7,test7_obt8,test7_obt9,test7_obt10,test8_obt1,test8_obt2,test8_obt3,test8_obt4,test8_obt5,test8_obt6,test8_obt7,test8_obt8,test8_obt9,test8_obt10,test9_obt1,test9_obt2,test9_obt3,test9_obt4,test9_obt5,test9_obt6,test9_obt7,test9_obt8,test9_obt9,test9_obt10,test10_obt1,test10_obt2,test10_obt3,test10_obt4,test10_obt5,test10_obt6,test10_obt7,test10_obt8,test10_obt9,test10_obt10,test11_obt1,test11_obt2,test11_obt3,test11_obt4,test11_obt5,test11_obt6,test11_obt7,test11_obt8,test11_obt9,test11_obt10,test12_obt1,test12_obt2,test12_obt3,test12_obt4,test12_obt5,test12_obt6,test12_obt7,test12_obt8,test12_obt9,test12_obt10,test1_alltotals1,test2_alltotals2,test3_alltotals3,test4_alltotals4,test5_alltotals5,test6_alltotals6,test7_alltotals7,test8_alltotals8,test9_alltotals9,test10_alltotals10,test11_alltotals11,test12_alltotals12,test1_allobtn1,test2_allobtn2,test3_allobtn3,test4_allobtn4,test5_allobtn5,test6_allobtn6,test7_allobtn7,test8_allobtn8,test9_allobtn9,test10_allobtn10,test11_allobtn11,test12_allobtn12,subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8,subject9,subject10,grand_total,grand_obtained,grand_percentage,grand_grades)values('$aplyinst_id','$aply_rolnbr','$aply_sesions','$stu_nme','$fathr_nme','$std_img','$aply_cls','$aply_sectn','$aply_tst1','$aply_tst2','$aply_tst3','$aply_tst4','$aply_tst5','$aply_tst6','$aply_tst7','$aply_tst8','$aply_tst9','$aply_tst10','$aply_tst11','$aply_tst12','$tst1_totl1','$tst1_totl2','$tst1_totl3','$tst1_totl4','$tst1_totl5','$tst1_totl6','$tst1_totl7','$tst1_totl8','$tst1_totl9','$tst1_totl10','$tst2_totl1','$tst2_totl2','$tst2_totl3','$tst2_totl4','$tst2_totl5','$tst2_totl6','$tst2_totl7','$tst2_totl8','$tst2_totl9','$tst2_totl10','$tst3_totl1','$tst3_totl2','$tst3_totl3','$tst3_totl4','$tst3_totl5','$tst3_totl6','$tst3_totl7','$tst3_totl8','$tst3_totl9','$tst3_totl10','$tst4_totl1','$tst4_totl2','$tst4_totl3','$tst4_totl4','$tst4_totl5','$tst4_totl6','$tst4_totl7','$tst4_totl8','$tst4_totl9','$tst4_totl10','$tst5_totl1','$tst5_totl2','$tst5_totl3','$tst5_totl4','$tst5_totl5','$tst5_totl6','$tst5_totl7','$tst5_totl8','$tst5_totl9','$tst5_totl10','$tst6_totl1','$tst6_totl2','$tst6_totl3','$tst6_totl4','$tst6_totl5','$tst6_totl6','$tst6_totl7','$tst6_totl8','$tst6_totl9','$tst6_totl10','$tst7_totl1','$tst7_totl2','$tst7_totl3','$tst7_totl4','$tst7_totl5','$tst7_totl6','$tst7_totl7','$tst7_totl8','$tst7_totl9','$tst7_totl10','$tst8_totl1','$tst8_totl2','$tst8_totl3','$tst8_totl4','$tst8_totl5','$tst8_totl6','$tst8_totl7','$tst8_totl8','$tst8_totl9','$tst8_totl10','$tst9_totl1','$tst9_totl2','$tst9_totl3','$tst9_totl4','$tst9_totl5','$tst9_totl6','$tst9_totl7','$tst9_totl8','$tst9_totl9','$tst9_totl10','$tst10_tots1','$tst10_tots2','$tst10_tots3','$tst10_tots4','$tst10_tots5','$tst10_tots6','$tst10_tots7','$tst10_tots8','$tst10_tots9','$tst10_tots10','$tst11_totl1','$tst11_totl2','$tst11_totl3','$tst11_totl4','$tst11_totl5','$tst11_totl6','$tst11_totl7','$tst11_totl8','$tst11_totl9','$tst11_totl10','$tst12_totl1','$tst12_totl2','$tst12_totl3','$tst12_totl4','$tst12_totl5','$tst12_totl6','$tst12_totl7','$tst12_totl8','$tst12_totl9','$tst12_totl10','$tst1_obts1','$tst1_obts2','$tst1_obts3','$tst1_obts4','$tst1_obts5','$tst1_obts6','$tst1_obts7','$tst1_obts8','$tst1_obts9','$tst1_obts10','$tst2_obts1','$tst2_obts2','$tst2_obts3','$tst2_obts4','$tst2_obts5','$tst2_obts6','$tst2_obts7','$tst2_obts8','$tst2_obts9','$tst2_obts10','$tst3_obts1','$tst3_obts2','$tst3_obts3','$tst3_obts4','$tst3_obts5','$tst3_obts6','$tst3_obts7','$tst3_obts8','$tst3_obts9','$tst3_obts10','$tst4_obts1','$tst4_obts2','$tst4_obts3','$tst4_obts4','$tst4_obts5','$tst4_obts6','$tst4_obts7','$tst4_obts8','$tst4_obts9','$tst4_obts10','$tst5_obts1','$tst5_obts2','$tst5_obts3','$tst5_obts4','$tst5_obts5','$tst5_obts6','$tst5_obts7','$tst5_obts8','$tst5_obts9','$tst5_obts10','$tst6_obts1','$tst6_obts2','$tst6_obts3','$tst6_obts4','$tst6_obts5','$tst6_obts6','$tst6_obts7','$tst6_obts8','$tst6_obts9','$tst6_obts10','$tst7_obts1','$tst7_obts2','$tst7_obts3','$tst7_obts4','$tst7_obts5','$tst7_obts6','$tst7_obts7','$tst7_obts8','$tst7_obts9','$tst7_obts10','$tst8_obts1','$tst8_obts2','$tst8_obts3','$tst8_obts4','$tst8_obts5','$tst8_obts6','$tst8_obts7','$tst8_obts8','$tst8_obts9','$tst8_obts10','$tst9_obts1','$tst9_obts2','$tst9_obts3','$tst9_obts4','$tst9_obts5','$tst9_obts6','$tst9_obts7','$tst9_obts8','$tst9_obts9','$tst9_obts10','$tst10_obts1','$tst10_obts2','$tst10_obts3','$tst10_obts4','$tst10_obts5','$tst10_obts6','$tst10_obts7','$tst10_obts8','$tst10_obts9','$tst10_obts10','$tst11_obts1','$tst11_obts2','$tst11_obts3','$tst11_obts4','$tst11_obts5','$tst11_obts6','$tst11_obts7','$tst11_obts8','$tst11_obts9','$tst11_obts10','$tst12_obts1','$tst12_obts2','$tst12_obts3','$tst12_obts4','$tst12_obts5','$tst12_obts6','$tst12_obts7','$tst12_obts8','$tst12_obts9','$tst12_obts10','$tst1_altos1','$tst2_altos2','$tst3_altos3','$tst4_altos4','$tst5_altos5','$tst6_altos6','$tst7_altos7','$tst8_altos8','$tst9_altos9','$tst10_altos10','$tst11_altos11','$tst12_altos12','$tst1_alobts1','$tst2_alobts2','$tst3_alobts3','$tst4_alobts4','$tst5_alobts5','$tst6_alobts6','$tst7_alobts7','$tst8_alobts8','$tst9_alobts9','$tst10_alobts10','$tst11_alobts11','$tst12_alobts12','$aply_subj1','$aply_subj2','$aply_subj3','$aply_subj4','$aply_subj5','$aply_subj6','$aply_subj7','$aply_subj8','$aply_subj9','$aply_subj10','$grend_totls','$grend_obtns','$grend_ptge','$grend_grde')");
if($inst_combne == true){ echo 1; }else{ echo 0; }
}

?>