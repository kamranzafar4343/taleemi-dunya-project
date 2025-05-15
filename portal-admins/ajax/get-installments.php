<?php
require_once("../functions/db.php");

$institute_ids = $_POST['institute_ids'];
?>
<div class="row">
    <div class="col-12 mb-3">
<table class="table table-responsive table-striped w-100">
    <thead>
        <tr>
            <th>#</th>
            <th>Charge Date</th>
            <th>Deactive Date</th>
            <th>Institute Name</th>
            <th>T.Amount</th>
            <th>Received</th>
            <th>Balance</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
<?php
$r=1;
$sel_instlment = mysqli_query($con,"select * from institute_collection where instituteId='$institute_ids'");
if(mysqli_num_rows($sel_instlment)>0){
    while($r <= 10000 && $rcds = mysqli_fetch_array($sel_instlment)){
        $ids = $rcds['id'];
        $deactive_date = $rcds['deactive_date'];
        $institute_name = $rcds['institute_name'];
        $monthly_amounts = $rcds['monthly_amounts'];
        $receive_amount = $rcds['receive_amount'];
        $balance = $rcds['balance'];
        $months = $rcds['months'];
        $session = $rcds['session'];
        $charges_date = $rcds['charges_date'];
        $fee_type = $rcds['fee_type'];
?>
<tr>
    <td><?php echo $r++; ?></td>
    <td><?php echo $charges_date; ?></td>
    <td><?php echo $deactive_date; ?></td>
    <td><?php echo $institute_name; ?></td>
    <td><?php echo $monthly_amounts; ?></td>
    <td><?php echo $receive_amount; ?></td>
    <td><?php echo $balance; ?></td>
    <td><?php echo $fee_type; ?></td>
    <td><a href="receiving-edits?id=<?php echo $ids; ?>" target="_blank">
            <i class="fa fa-edit text-success"></i>
        </a>
    </td>
    <td><a href="#" class="clctdelet" rowid="<?php echo $ids; ?>"><i class="fa fa-trash-alt text-danger"></i></a></td>
</tr>
<?php
    }
}else{ echo "<div class='alert alert-danger'>There are no Record Found!</div>"; }
?>
        
    </tbody>
</table>
    </div>
</div>