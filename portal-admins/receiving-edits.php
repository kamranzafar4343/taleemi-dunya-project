<?php require_once("source/header.php"); require_once("source/navbar.php"); require_once("source/sidebar.php"); ?>
<style> textarea { resize: none; } </style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Receiving Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-capitalize" href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">Edit Receiving Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<?php
if(isset($_GET['id'])){
    $ids = $_GET['id'];
    $selct_rcve = mysqli_query($con,"select * from institute_collection where id='$ids'");
    $rcvg = mysqli_fetch_assoc($selct_rcve);
    
    $idps = $rcvg['id'];
    $joining_date = $rcvg['joining_date'];
    $deactive_date = $rcvg['deactive_date'];
    $charges_date = $rcvg['charges_date'];
    $institute_name = $rcvg['institute_name'];
    $plan = $rcvg['plan'];
    $months = $rcvg['months'];
    $mnth_nme = date('F', mktime(0, 0, 0, $months, 10));
    $monthly_amounts = $rcvg['monthly_amounts'];
    $remaining_amount = $rcvg['remaining_amount'];
    $receive_amount = $rcvg['receive_amount'];
    $balance = $rcvg['balance'];
    $fee_type = $rcvg['fee_type'];
}
?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
<div class="card">
    <div class="card-body">
        <!-- General Form Elements -->
<form class="clsfrm">
<div class="row pt-4">
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Joining Date</label>
        <input class="form-control jningdte" type="date" value="<?php echo $joining_date; ?>">
        <input class="bilid" type="hidden" value="<?php echo $idps; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Deactivation Date</label>
        <input class="form-control deactvdte" type="date" value="<?php echo $deactive_date; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Charge Date</label>
        <input class="form-control chrgdte" type="date" value="<?php echo $charges_date; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Institute Name</label>
        <input class="form-control instiname" type="text" value="<?php echo $institute_name; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Plan</label>
        <input class="form-control plen" type="text" value="<?php echo $plan; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">T.Amount</label>
        <input class="form-control decideamnt" type="text" value="<?php echo $monthly_amounts; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Recieve Amount</label>
        <input class="form-control recvamnt" type="text" value="<?php echo $receive_amount; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Balance</label>
        <input class="form-control balnce" type="text" value="<?php echo $balance; ?>">
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Month</label>
        <select class="form-select text-capitalize mnth">
            <option class="text-capitalize" value="<?php echo $months; ?>"><?php echo $mnth_nme; ?></option>
            <option class="text-capitalize" value="01">January</option>
            <option class="text-capitalize" value="02">February</option>
            <option class="text-capitalize" value="03">March</option>
            <option class="text-capitalize" value="04">April</option>
            <option class="text-capitalize" value="05">May</option>
            <option class="text-capitalize" value="06">June</option>
            <option class="text-capitalize" value="07">July</option>
            <option class="text-capitalize" value="08">August</option>
            <option class="text-capitalize" value="09">September</option>
            <option class="text-capitalize" value="10">October</option>
            <option class="text-capitalize" value="11">November</option>
            <option class="text-capitalize" value="12">December</option>
        </select>
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="text-capitalize">Fee Type</label>
        <select class="form-select text-capitalize fetype">
            <option class="text-capitalize"><?php echo $fee_type; ?></option>
            <option class="text-capitalize">paid</option>
            <option class="text-capitalize">balance</option>
            <option class="text-capitalize">unpaid</option>
        </select>
    </div>
    <div class="col-6 col-lg-3 mb-3 mt-4">
        <button type="submit" class="btn btn-primary text-capitalize updtbtn">update</button>
    </div>
</div>
</form>
    </div>
</div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>
<script>
$(document).ready(function(){
    $(".updtbtn").on("click", function(e){
e.preventDefault();
var bilid = $(".bilid").val();
var jningdte = $(".jningdte").val();
var deactvdte = $(".deactvdte").val();
var chrgdte = $(".chrgdte").val();
var instiname = $(".instiname").val();
var plen = $(".plen").val();
var decideamnt = $(".decideamnt").val();
var recvamnt = $(".recvamnt").val();
var balnce = $(".balnce").val();
var mnth = $(".mnth").val();
var fetype = $(".fetype").val();

$.ajax({
    url: 'ajax/update-biling.php',
    type: "POST",
    data: {bill_id:bilid,joing_date:jningdte,dactivtn_dte:deactvdte,charg_date:chrgdte,institu_name:instiname,plans:plen,decid_amnt:decideamnt,rcv_amnt:recvamnt,blnce:balnce,mnths:mnth,fee_tpe:fetype},
    success: function(editrcrd){
if(editrcrd == 1){
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
  title: "Billing Successfully Update!"
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
  title: "Billing is not Update!"
});
}
    }
});

    });
});
</script>