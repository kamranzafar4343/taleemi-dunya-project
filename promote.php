<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); 

if(isset($_POST['btn_edit'])){
unset($_POST['btn_edit']);
$edit_ids=$_POST['update'];
$totaledit_ids=count($_POST['update']);
    }
?>


  <style type="text/css">
    h3{
      text-align:center; background-color: #ff8f00; line-height: inherit; color: white; font-weight: bold;
    }
    b{
      background-color: #06b606; padding: 6px; border-radius: 5px; color: white;
    }
    body{
      background-color: hsla(0,0%,30%);
    }
    #v_tbl{
      border: 3px solid #ff8f00; background-color: hsla(0,0%,15%);
    }
    #slno{
      width: 50px; text-align: center; background: hsla(0,0%,15%);
    }
    #titlee{
        margin-top: 5px; margin-bottom: 5px;
    }
  </style>
</head>
<body>
 <div class="container">
   <br /> 
<table class="table table-responsive table-striped w-100" border="0" align="center" id="v_tbl">
<tr>
    <td>
<h3 class="text-uppercase">TOTAL Promote Students "<?php echo $totaledit_ids; if($totaledit_ids==""){echo "<script>alert('Sorry No Record Found');window.location.href = 'promote-students';</script>";}?>"</h3>

    </td>
</tr>
  <tr>
    <td>
      


<form method="post" autocomplete="off">
<?php
$j = 0;
foreach($edit_ids as $key => $val)
  {
  $view_que= mysqli_query($con,"SELECT * FROM addStudents WHERE id='$val'");
  foreach($view_que as $prmts) {
      $class = $prmts['class'];
      
$sl_clsip = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rel = mysqli_fetch_assoc($sl_clsip);
$class_name = $rel['class_name'];
    ?>
<table width="100%">
    <tr>
        <th colspan="2" class="text-white">Old Record Only Information</th>
        <th colspan="2" class="text-white">New Record Update</th>
    </tr>
    <tr>
        <th colspan="3"><h4 class="text-uppercase text-warning text-center fs-4 fw-bolder"><?=$prmts['studentName'];?></h4></th>
    </tr>
  <tr>
    <td align="left">
        <input type="hidden" value="<?php echo $userId; ?>" id="instutes">
<input type="text" name="" value="<?php echo ++$j;?>" class="form-control" readonly="true" id="slno">     
    </td>
    <td>
<label class="fs-6 text-capitalize text-white">Class</label>
<input type="text" value="<?php echo $class_name;?>" readonly class="form-control text-capitalize mb-3 pb-2">
<label class="fs-6 text-capitalize text-white">Section</label>
<input type="text" value="<?=$prmts['section'];?>" readonly class="form-control text-capitalize mb-3 pb-2">
<label class="fs-6 text-capitalize text-white">Session</label>
<input type="text" value="<?=$prmts['session'];?>" readonly class="form-control mb-3 pb-2">
<label class="fs-6 text-capitalize text-white">Fee</label>
<input type="text" value="<?=$prmts['totalFee'];?>" readonly class="form-control mb-3 pb-2">
      </td>
    <td align="center">
        <label class="fs-6 text-capitalize text-white">Class</label>
<select name="titlee[]" class="form-control text-capitalize mb-3" id="cls">
    <option class="text-capitalize" value="<?php echo $class; ?>"><?php echo $class_name; ?></option>
<?php
$cls_mnger = mysqli_query($con,"select * from addClass where institute_id='$userId'");
$cnts = mysqli_num_rows($cls_mnger);
if($cnts == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($clis = mysqli_fetch_array($cls_mnger)){
    $id = $clis['id'];
    $institute_id = $clis['institute_id'];
    $class_name = $clis['class_name'];
?>
    <option class="text-capitalize" value="<?php echo $id?>"><?php echo $class_name; ?></option>
<?php } ?>
</select>
<label class="fs-6 text-capitalize text-white">section</label>
<input type="text" value="<?=$prmts['section'];?>" name="links[]" class="form-control text-capitalize mb-3 pb-2">
<label class="fs-6 text-capitalize text-white">session</label>
<select class="form-select text-capitalize mb-3 pb-2" name="sesin[]">
    <option><?=$prmts['session'];?></option>
<?php
$sl_selsesn = mysqli_query($con,"select * from addSession where institute_id='$userId' order by id desc");
while($ses_reslt=mysqli_fetch_array($sl_selsesn)){
?>
    <option><?php echo $ses_reslt['session']; ?></option>
<?php } ?>
</select>
<label class="fs-6 text-capitalize text-white">fee</label>
<input class="form-control mb-3 pb-2" name="monthfe[]" value="<?=$prmts['totalFee'];?>" placeholder="Enter New Fee Update">
      </td>
    <td align="right">
<input type="hidden" name="iddd[]" value="<?=$prmts['id'];?>" >
<img src="student_imgs/<?=$prmts['image'];?>" class="img-fluid" style="width:100px;height:100px;overflow:hidden;">
    </td>
  </tr>
<script>
    /// Class to Section
$('#cls').on('change',function(){
 var class_name = this.value;
 var insti = document.getElementById('instutes').value;
//    console.log(class_name);
 
$.ajax({
   url:'ajax/class-strength.php',
   type:"POST",
   data:{ class_title:class_name,institute_code:insti },
   success: function(result){
       $('#strngs').html(result);
      //console.log(result);
   }
    });
});
</script>
</table>
  <?php  } } ?>
<tr align="right">
    <td colspan="6"><button type="submit" name="btn_dataupdate" class="btn btn-primary btn-block" >Promote Students</button></td>
</tr>
</form>

<?php
if(isset($_POST['btn_dataupdate'])){
//unset($_POST['btn_dataupdate']);
 $titles=$_POST['titlee']; 
 $links=$_POST['links']; 
 $sesin=$_POST['sesin']; 
 $monthfe=$_POST['monthfe']; 
$iddds=$_POST['iddd'];
$count=count($_POST['iddd']);

for ($i=0; $i<$count; $i++) {
    
$update_que= mysqli_query($con,"UPDATE `addStudents` SET class='$titles[$i]',section='$links[$i]',session='$sesin[$i]',totalFee='$monthfe[$i]' WHERE `id`='$iddds[$i]'");
if($update_que == true){ header("Location: promote-students.php?msg=Update Successfully"); }else{ header("Location: promote"); }  
}
}
?>

    </td>
  </tr>
</table>
</div>


<?php require_once("source/foot-section.php"); ?>