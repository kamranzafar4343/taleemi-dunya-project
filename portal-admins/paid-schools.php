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
      <h1>School Record</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Paid Schools</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
<table class="table table-responsive table-striped w-100 datatable">
    <thead>
    <tr>
        <th style="padding:3px;font-size:0.8rem;">Sr#</th>
        <th style="padding:3px;font-size:0.8rem;">Image</th>
        <th style="padding:3px;font-size:0.8rem;">Institute Name</th>
        <th style="padding:3px;font-size:0.8rem;">Username</th>
        <th style="padding:3px;font-size:0.8rem;">Password</th>
    </tr>
    </thead>
    <tbody>
<?php
$a=1;
$sl_usr = mysqli_query($con,"select * from dashboard_schools where assign_role='director'");
$cnt = mysqli_num_rows($sl_usr);
if($cnt == 0){ echo "<div class='alert alert-danger text-capitalize'>there are record not found!</div>"; }
while($a <= 100000 && $result=mysqli_fetch_array($sl_usr)){
    
    $id = $result['id'];
    $institute_id = $result['institute_id'];
    $joining_date = $result['joining_date'];
    $account_type = $result['account_type'];
    $strength = $result['strength'];
    $plan = $result['plan'];
    $institute_name = $result['institute_name'];
    $type = $result['type'];
    $owner_name = $result['owner_name'];
    $cnic = $result['cnic'];
    $e_mail = $result['e_mail'];
    $phone = $result['phone'];
    $cell = $result['cell'];
    $city = $result['city'];
    $district = $result['district'];
    $logo = $result['logo'];
    $address = $result['address'];
    $decieded_payment = $result['decieded_payment'];
    $balance = $result['balance'];
    $receive_payment = $result['receive_payment'];
    $payment_reference = $result['payment_reference'];
    $attach_receipt = $result['attach_receipt'];
    $remarks = $result['remarks'];
    $status = $result['status'];
    $assign_role = $result['assign_role'];
    $password = $result['password'];
?>
    <tr>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $a++; ?></td>
        <td style="padding:3px;font-size:0.8rem;" width="10"><img src="institute-logos/<?php echo $logo; ?>" class="img-fluid" style="width:50%;"></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $institute_name; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $e_mail; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $password; ?></td>
    </tr>
<?php } ?>
    </tbody>
</table>


      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>