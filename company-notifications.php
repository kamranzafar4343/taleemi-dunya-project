<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
    <table class="table w-100 bg-apna-body">
<thead>
    <tr>
        <th width="100">Date</th>
        <th>Message</th>
    </tr>
</thead>
<tbody>
<?php
$selnot_adm = mysqli_query($con,"select * from adminNotifications order by id desc");
if(mysqli_num_rows($selnot_adm)>0){
    while($rslt = mysqli_fetch_array($selnot_adm)){
        $noti_date = $rslt['noti_date'];
        $notification = $rslt['notification'];
?>
<tr>
    <td><?php echo $noti_date; ?></td>
    <td><?php echo $notification; ?></td>
</tr>
<?php
    }
}else{ echo "<tr><td colspan='2'>There are no Record Found!</td></tr>"; }
?>
</tbody>
    </table>
</div>




    </div>
</div>
<?php require_once("source/foot-section.php"); ?>