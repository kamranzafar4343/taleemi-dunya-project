<?php 
require_once("source/header.php"); 
require_once("source/navbar.php"); 
require_once("source/sidebar.php"); 
?>
<style>
    textarea {
  resize: none;
}
</style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='user-manager'">User Manager</a></li>
          <li class="breadcrumb-item active">Edit Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $slt_usr = mysqli_query($con,"select * from addSchools where id='$ids'");
    $result=mysqli_fetch_assoc($slt_usr);
    $id = $result['id'];
    $joining_date = $result['joining_date'];
    $de_activation_date = $result['de_activation_date'];
    $account_type = $result['account_type'];
    $strength = $result['strength'];
    $plan = $result['plan'];
    $institute_name = $result['institute_name'];
    $type = $result['type'];
    $owner_name = $result['owner_name'];
    $campus = $result['campus'];
    $cnic = $result['cnic'];
    $e_mail = $result['e_mail'];
    $phone = $result['phone'];
    $cell = $result['cell'];
    $city = $result['city'];
    $district = $result['district'];
    $logo = $result['logo'];
    $address = $result['address'];
    $decieded_payment = $result['decieded_payment'];
    $receive_payment = $result['receive_payment'];
    $balance = $result['balance'];
    $payment_reference = $result['payment_reference'];
    $attach_receipt = $result['attach_receipt'];
    $remarks = $result['remarks'];
    $status = $result['status'];
    $assign_role = $result['assign_role'];
    $password = $result['password'];
}
?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Information</h5>

              <!-- General Form Elements -->
<form method="post" enctype="multipart/form-data">
<div class="row mb-3">
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Activation Date</label> <span class="text-black">(<?php echo $joining_date; ?>)</span> 
        <input type="date" class="form-control" name="actv_dte">
        <input type="hidden" class="form-control" name="actv_dte_old" value="<?php echo $joining_date; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Deactivation Date</label> <span class="text-black">(<?php echo $de_activation_date; ?>)</span>
        <input type="date" class="form-control" name="deactvtn_dte">
        <input type="hidden" class="form-control" name="deactvtn_dte_old" value="<?php echo $de_activation_date; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Account Type</label> <span class="text-capitalize text-success fs-6"><?php echo "(".$account_type.")"; ?></span>
        <select class="form-control" name="ac_tpe">
            <option></option>
            <option>Package-1</option>
            <option>Package-2</option>
            <option>Package-3</option>
        </select>
<input value="<?php echo $account_type; ?>" type="hidden" name="ac_tpe_old">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Strength</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="11" name="strgth" value="<?php echo $strength; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Plan</label> <span class="text-capitalize text-success fs-6"><?php echo "(".$plan.")"; ?></span>
        <select class="form-control" name="pln">
            <option></option>
            <option>Monthly</option>
            <option>Quarterly</option>
            <option>Half Year</option>
            <option>1 Year</option>
            <option>2 Years</option>
            <option>3 Years</option>
            <option>4 Years</option>
            <option>5 Years</option>
        </select>
<input value="<?php echo $plan; ?>" type="hidden" name="pln_old">    
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Institute Name</label> 
        <input type="text" class="form-control" name="inst_nme" value="<?php echo $institute_name; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Campus Name</label> 
        <input type="text" class="form-control" name="cmps" value="<?php echo $campus; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Type</label> <span class="text-capitalize text-success fs-6"><?php echo "(".$type.")"; ?></span>
        <select class="form-control" name="tpe">
            <option></option>
            <option>School</option>
            <option>academy</option>
            <option>College</option>
            <option>Computer College</option>
        </select>
<input value="<?php echo $type; ?>" type="hidden" name="tpe_old">  
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Owner Name</label> 
        <input type="text" class="form-control" name="onme" value="<?php echo $owner_name; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">CNIC</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="13" name="cnc" value="<?php echo $cnic; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">E-mail</label> <span class="text-danger fs-4">*</span> 
        <input type="text" class="form-control" name="emls" value="<?php echo $e_mail; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Phone</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="11" name="phne" value="<?php echo $phone; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Cell</label> <span class="text-danger fs-4">*</span>
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="11" name="cel" value="<?php echo $cell; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">City</label> 
        <input type="text" class="form-control" name="cty" value="<?php echo $city; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">District</label> 
        <input type="text" class="form-control" name="dstrt" value="<?php echo $district; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Logo</label> <span class="text-danger fs-4">*</span>
        <input type="file" class="form-control" name="lgs" accept=".png,.jpg,.jpeg">
        <input type="hidden" class="form-control" name="lgs_old" value="<?php echo $logo; ?>">
    </div>
    <div class="col-sm-8 mb-3">
        <label for="inputText" class="col-form-label">Address</label> 
        <input type="text" class="form-control" name="adres" value="<?php echo $address; ?>">
    </div>
<h5 class="card-title">Payment Plan</h5>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Decieded Payment</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="dec_prmt" value="<?php echo $decieded_payment; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Recieve Payment</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="rec_pymnt" value="<?php echo $receive_payment; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Balance</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="blnce" value="<?php echo $balance; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Payment Referance</label> <span class="text-capitalize text-success fs-6"><?php echo "(".$payment_reference.")"; ?></span>
        <select class="form-control" name="py_refnce">
            <option></option>
            <option>JazzCash</option>
            <option>EasyPaisa</option>
            <option>Meezan Bank</option>
            <option>Allied Bank</option>
            <option>RastID</option>
        </select>
<input value="<?php echo $payment_reference; ?>" type="hidden" name="py_refnce_old">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Attach Receipt</label> 
        <input type="file" class="form-control" name="atch_recpt">
        <input type="hidden" class="form-control" name="atch_recpt_old" value="<?php echo $attach_receipt; ?>">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Status</label> <span class="text-capitalize text-success fs-6"><?php echo "(".$status.")"; ?></span>
        <select class="form-control" name="sts">
            <option></option>
            <option>Paid</option>
            <option>Unpaid</option>
        </select>
<input value="<?php echo $status; ?>" type="hidden" name="sts_old">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Asign Role</label> <span class="text-capitalize text-success fs-6"><?php echo "(".$assign_role.")"; ?></span>
        <select class="form-control" name="rls">
            <option></option>
            <option>Director</option>
            <option>Admin</option>
            <option>Principal</option>
            <option>Accountant</option>
            <option>Receptionist</option>
        </select>
<input value="<?php echo $assign_role; ?>" type="hidden" name="rls_old">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Password</label>
        <input value="<?php echo $password; ?>" type="password" name="pss" class="form-control" id="myInput">
    </div>
    <div class="col-sm-4 mb-3 mt-5">
        <input type="checkbox" onclick="myFunction()"> Show Password
    </div>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <div class="col-sm-12 mb-3">
        <label for="inputText" class="col-form-label">Final Remarks</label> 
        <textarea class="form-control" rows="5" name="contnt" value="<?php echo $remarks; ?>"></textarea>
    </div><br><br>
    <div class="col-sm-12" align="right">
        <button name="btn_sbnt" type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>
<?php
if(isset($_POST['btn_sbnt'])){

   if(!empty($_POST['ac_tpe'])){ $ac_tpe = $_POST['ac_tpe']; }else{ $ac_tpe = $_POST['ac_tpe_old']; } 
   if(!empty($_POST['actv_dte'])){ $actv_dte = $_POST['actv_dte']; }else{ $actv_dte = $_POST['actv_dte_old']; } 
   if(!empty($_POST['deactvtn_dte'])){ $deactvtn_dte = $_POST['deactvtn_dte']; }else{ $deactvtn_dte = $_POST['deactvtn_dte_old']; } 
   $strgth = $_POST['strgth']; 
   if(!empty($_POST['pln'])){ $pln = $_POST['pln']; }else{ $pln = $_POST['pln_old']; } 
   $inst_nme = $_POST['inst_nme'];
   $cmps = $_POST['cmps'];
   if(!empty($_POST['tpe'])){ $tpe = $_POST['tpe']; }else{ $tpe = $_POST['tpe_old']; } 
   $onme = $_POST['onme']; 
   $cnc = $_POST['cnc']; 
   $emls = $_POST['emls']; 
   $phne = $_POST['phne']; 
   $cel = $_POST['cel']; 
   $cty = $_POST['cty']; 
   $dstrt = $_POST['dstrt']; 
   
   if(empty($_FILES['lgs']['name'])){
    $lgs = $_POST['lgs_old'];   
   }else{
    $lgs = $_FILES['lgs']['name'];
   $lgstmp = $_FILES['lgs']['tmp_name'];
   $allow = array('png','jpg', 'jpeg');
   $ext = pathinfo($lgs,PATHINFO_EXTENSION);
   $path = "institute-logos/".$lgs;
   move_uploaded_file($lgstmp,$path);   
   }
   
   $adres = $_POST['adres']; 
   if(!empty($_POST['dec_prmt'])){ $dec_prmt = $_POST['dec_prmt']; }else{ $dec_prmt = "0"; } 
   if(!empty($_POST['rec_pymnt'])){ $rec_pymnt = $_POST['rec_pymnt']; }else{ $rec_pymnt = "0"; } 
   if(!empty($_POST['blnce'])){ $blnce = $_POST['blnce']; }else{ $blnce = "0"; } 
   if(!empty($_POST['py_refnce'])){ echo $py_refnce = $_POST['py_refnce'];  }else{ $py_refnce = $_POST['py_refnce_old']; }
   
   if(empty($_FILES['atch_recpt']['name'])){
    $atch_recpt = $_POST['atch_recpt_old'];   
   }else{
    $atch_recpt = $_FILES['atch_recpt']['name']; 
   $atch_recpttmp = $_FILES['atch_recpt']['tmp_name'];
   $allowed = array('png','jpg', 'jpeg');
   $exten = pathinfo($atch_recpt,PATHINFO_EXTENSION);
   $paths = "reciepts/".$atch_recpt;
   move_uploaded_file($atch_recpttmp,$paths);   
   }
   
   $contnt = mysqli_real_escape_string($con,$_POST['contnt']);
   if(!empty($_POST['sts'])){ $stats = $_POST['sts']; }else{ $stats = $_POST['sts_old']; }
   if(!empty($_POST['rls'])){ $rls = strtolower($_POST['rls']); }else{ $rls = strtolower($_POST['rls_old']); }
   $pass = $_POST['pss'];
    
$inst_prm = mysqli_query($con,"update addSchools set joining_date='$actv_dte',de_activation_date='$deactvtn_dte',account_type='$ac_tpe',strength='$strgth',plan='$pln',institute_name='$inst_nme',campus='$cmps',type='$tpe',owner_name='$onme',cnic='$cnc',e_mail='$emls',phone='$phne',cell='$cel',city='$cty',district='$dstrt',logo='$lgs',address='$adres',decieded_payment='$dec_prmt',receive_payment='$rec_pymnt',balance='$blnce',payment_reference='$py_refnce',attach_receipt='$atch_recpt',remarks='$contnt',status='$stats',assign_role='$rls',password='$pass' where id='$ids'");
if($inst_prm){ echo "<script>swal.fire('Good Job!','User Successfully Update','success');</script>"; }else{ echo "<script>swal.fire('Oops!','User is not Update','error');</script>"; }   

}
?>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>