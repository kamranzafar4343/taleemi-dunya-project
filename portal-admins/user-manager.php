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
          <li class="breadcrumb-item active">Users Manager</li>
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
        <th style="padding:3px;font-size:0.8rem;">D.O.J</th>
        <th style="padding:3px;font-size:0.8rem;">Instid#</th>
        <th style="padding:3px;font-size:0.8rem;">Owner Name</th>
        <th style="padding:3px;font-size:0.8rem;">Institute Name</th>
        <th style="padding:3px;font-size:0.8rem;">Plan</th>
        <th style="padding:3px;font-size:0.8rem;">Cell</th>
        <th style="padding:3px;font-size:0.8rem;">Username</th>
        <th style="padding:3px;font-size:0.8rem;">Password</th>
        <th style="padding:3px;font-size:0.8rem;">A/D</th>
        <th style="padding:3px;font-size:0.8rem;">Edit</th>
        <th style="padding:3px;font-size:0.8rem;">Del</th>
    </tr>
    </thead>
    <tbody>
<?php
$a=1;
$sl_usr = mysqli_query($con,"select * from addSchools");
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
        <td style="padding:3px;font-size:0.8rem;"><?php echo $joining_date; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $institute_id; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $owner_name; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $institute_name; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $plan; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $cell; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $e_mail; ?></td>
        <td style="padding:3px;font-size:0.8rem;"><?php echo $password; ?></td>
        <td><a href="user-edit?id=<?php echo $id; ?>" title="Edit" target="_blank"><i class="bi bi-pen-fill text-success"></i></a></td>
<?php
$sl_prtl = mysqli_query($con,"select * from confirmSchools where id='$id'");
    $chck = mysqli_num_rows($sl_prtl);
    if($chck<1){
?>
    <td><a href="active-schools?id=<?php echo $id; ?>" title="Active School"><i class="bi bi-building-fill-check text-success"></i></a></td>
<?php }else { ?>
    <td><a href="deactive-schools?id=<?php echo $id; ?>" title="Deactive School"><i class="bi bi-building-fill-slash text-danger"></i></a></td>
<?php } ?>
        <td><a href="user-delete?id=<?php echo $id; ?>" title="Delete"><i class="bi bi-trash3-fill text-danger"></i></a></td>
    </tr>
<?php } ?>
</tbody>
</table>


      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>