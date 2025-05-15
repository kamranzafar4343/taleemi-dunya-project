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
      <h1>Add Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Add Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
<div class="d-flex">
    <div class="p-2 flex-fill">
      <h5 class="card-title">User Information</h5>  
    </div>
    <div class="p-2">
        <a class="btn btn-primary text-capitalize" href="javascript:void()" onclick="location.href='collection'">collection</a>
    </div>
</div>
              <!-- General Form Elements -->
<form method="post" enctype="multipart/form-data">
<div class="row mb-3">
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Activation Date</label> 
        <input type="date" class="form-control" value="<?php echo date("j-m-Y"); ?>" name="ac_dte">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Deactivation Date</label> 
        <input type="date" class="form-control" value="<?php echo date("j-m-Y"); ?>" name="deac_dte">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Account Type</label>
        <input type="hidden" class="form-control" value="<?php echo rand(10,999999); ?>" name="instid">
        <select class="form-select" name="ac_tpe">
            <option>Package-1</option>
            <option>Package-2</option>
            <option>Package-3</option>
        </select>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Students Strength</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="11" name="strgth">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Plan</label> 
        <select class="form-control" name="pln">
            <option>Monthly</option>
            <option>Quarterly</option>
            <option>Half Year</option>
            <option>1 Year</option>
            <option>2 Years</option>
            <option>3 Years</option>
            <option>4 Years</option>
            <option>5 Years</option>
        </select>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Institute Name</label> 
        <input type="text" class="form-control" name="inst_nme">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Campus Name</label> 
        <input type="text" class="form-control" name="cmps">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Type</label> 
        <select class="form-control" name="tpe">
            <option>School</option>
            <option>academy</option>
            <option>College</option>
            <option>Computer College</option>
        </select>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Owner Name</label> 
        <input type="text" class="form-control" name="onme">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">CNIC</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="15" name="cnc">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">E-mail (username)</label> <span class="text-danger fs-4">*</span> 
        <input type="text" class="form-control" name="emls" required>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Cell (password)</label> <span class="text-danger fs-4">*</span>
        <input type="text" class="form-control" required onkeypress="isInputNumber(event)" maxlength="12" name="cel">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Phone</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="12" name="phne">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">City</label> 
        <input type="text" class="form-control" name="cty">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">District</label> 
        <input type="text" class="form-control" name="dstrt">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="inputText" class="col-form-label">Logo</label> <span class="text-danger fs-4">*</span>
        <input type="file" class="form-control" name="lgs" required accept=".png,.jpg,.jpeg">
    </div>
    <div class="col-sm-8 mb-3">
        <label for="inputText" class="col-form-label">Address</label> 
        <input type="text" class="form-control" name="adres">
    </div>
<h5 class="card-title">Payment Plan</h5>
    <div class="col-sm-3 mb-3">
        <label for="inputText" class="col-form-label">Decieded Payment</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="dec_prmt">
    </div>
    <div class="col-sm-3 mb-3">
        <label for="inputText" class="col-form-label">Recieve Payment</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="rec_pymnt">
    </div>
    <div class="col-sm-3 mb-3">
        <label for="inputText" class="col-form-label">Balance</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="blnce">
    </div>
    <div class="col-sm-3 mb-3">
        <label for="inputText" class="col-form-label">Decieded Installment</label> 
        <input type="text" class="form-control" onkeypress="isInputNumber(event)" name="decd_instl">
    </div>
    <div class="col-sm-3 mb-3">
        <label for="inputText" class="col-form-label">Payment Referance</label> 
        <select class="form-control" name="py_refnce">
            <option>JazzCash</option>
            <option>EasyPaisa</option>
            <option>Meezan Bank</option>
            <option>Allied Bank</option>
            <option>RastID</option>
        </select>
    </div>
    <div class="col-sm-3 mb-3">
        <label for="inputText" class="col-form-label">Attach Receipt</label> 
        <input type="file" class="form-control" name="atch_recpt">
    </div>
    <div class="col-sm-3 mb-3">
        <label for="inputText" class="col-form-label">Status</label> 
        <select class="form-control" name="sts">
            <option>Paid</option>
            <option>Unpaid</option>
        </select>
    </div>
    <div class="col-sm-12 mb-3">
        <label for="inputText" class="col-form-label">Final Remarks</label> 
        <textarea class="tinymce-editor form-control" rows="5" name="contnt"></textarea>
    </div><br><br>
    <div class="col-sm-12" align="right">
        <button name="btn_sbnt" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
<?php
if(isset($_POST['btn_sbnt'])){

   $instid = $_POST['instid'];
   $ac_dte = $_POST['ac_dte'];
   $deac_dte = $_POST['deac_dte'];
   $ac_tpe = $_POST['ac_tpe']; 
   $strgth = $_POST['strgth']; 
   $pln = $_POST['pln']; 
   $inst_nme = $_POST['inst_nme'];
   $cmps = mysqli_real_escape_string($con,$_POST['cmps']);
   $tpe = mysqli_real_escape_string($con,$_POST['tpe']); 
   $onme = mysqli_real_escape_string($con,$_POST['onme']); 
   $cnc = $_POST['cnc']; 
   $emls = $_POST['emls']; 
   $phne = $_POST['phne']; 
   $cel = $_POST['cel']; 
   $cty = mysqli_real_escape_string($con,$_POST['cty']); 
   $dstrt = mysqli_real_escape_string($con,$_POST['dstrt']); 
   
   $lgs = $_FILES['lgs']['name'];
   $lgstmp = $_FILES['lgs']['tmp_name'];
   $allow = array('png','jpg', 'jpeg');
   $ext = pathinfo($lgs,PATHINFO_EXTENSION);
   $path = "institute-logos/".$lgs;
   
   $adres = $_POST['adres']; 
   if(!empty($_POST['dec_prmt'])){ $dec_prmt = $_POST['dec_prmt']; }else{ $dec_prmt = "0"; } 
   if(!empty($_POST['rec_pymnt'])){ $rec_pymnt = $_POST['rec_pymnt']; }else{ $rec_pymnt = "0"; } 
   if(!empty($_POST['blnce'])){ $blnce = $_POST['blnce']; }else{ $blnce = "0"; } 
   if(!empty($_POST['decd_instl'])){ $decd_instl = $_POST['decd_instl']; }else{ $decd_instl = "0"; } 
   $py_refnce = $_POST['py_refnce']; 
   
   $atch_recpt = $_FILES['atch_recpt']['name']; 
   $atch_recpttmp = $_FILES['atch_recpt']['tmp_name'];
   $allowed = array('png','jpg', 'jpeg');
   $exten = pathinfo($atch_recpt,PATHINFO_EXTENSION);
   $paths = "reciepts/".$atch_recpt;
   move_uploaded_file($atch_recpttmp,$paths);
   
   $contnt = mysqli_real_escape_string($con,$_POST['contnt']);
   $stats = mysqli_real_escape_string($con,$_POST['sts']);
   $role = "director";
   $passwords = $_POST['cel'];

if(!in_array($ext,$allow)){
    echo "<script>swal.fire('Sorry!','Only JPG, PNG and JPEG Files Allowed','error');</script>";
}else{
$sl_prog = mysqli_query($con,"select * from addSchools where cell='$cel'");
if(mysqli_num_rows($sl_prog)>0){
    echo "<script>swal.fire('Sorry!','Query Already Submit','info');</script>";
}else{
    move_uploaded_file($lgstmp,$path);
$inst_prm = mysqli_query($con,"insert into addSchools (institute_id,joining_date,de_activation_date,account_type,strength,plan,institute_name,campus,type,owner_name,cnic,e_mail,phone,cell,city,district,logo,address,decieded_payment,receive_payment,balance,payment_reference,attach_receipt,remarks,status,assign_role,password,installments) values ('$instid','$ac_dte','$deac_dte','$ac_tpe','$strgth','$pln','$inst_nme','$cmps','$tpe','$onme','$cnc','$emls','$phne','$cel','$cty','$dstrt','$lgs','$adres','$dec_prmt','$rec_pymnt','$blnce','$py_refnce','$atch_recpt','$contnt','$stats','$role','$passwords','$decd_instl')");
if($inst_prm){ echo "<script>swal.fire('Query Successfully Submit');</script>"; }else{ echo "<script>swal.fire('Query is not Submit');</script>"; }   
    }
        }
}
?>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>