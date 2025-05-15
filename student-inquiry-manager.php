<?php require_once("source/head-section.php"); require_once("source/navbar.php"); require_once("inquiry.php"); require_once("add-students.php"); require_once("student-manager.php"); require_once("staff-manager.php"); require_once("add-staff.php"); require_once("attendance.php"); require_once("attendance-manager.php"); require_once("academics.php"); require_once("academic-manager.php"); require_once("accounts.php"); require_once("exames.php"); require_once("exame-manager.php"); require_once("challan.php"); require_once("samester-challan.php"); require_once("annualy-challan.php"); require_once("collection.php"); require_once("lms.php"); require_once("settings.php"); require_once("e-services.php"); require_once("e-certificates.php"); require_once("all-roles.php"); require_once("period-bell.php"); require_once("stock.php"); require_once("reminder.php"); require_once("student-portal.php"); require_once("teacher-portal.php"); require_once("SMS.php"); ?>
<script>
    window.onload = function(){ serch_vle.focus() }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#inquiry-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
    <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'">Home</a></li>
    <li class="breadcrumb-item active text-capitalize" aria-current="page"> student inquiry Manager</li>
  </ol>
</nav>                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
<div class="row">
    <div class="col-3 mb-3">
<div class='input-group'>
  <a href="student-inquiry-xls?id=<?php echo $userId; ?>&& instnme=<?php echo $instituteName; ?> && cpms=<?php echo $campus; ?> && logs=<?php echo $image; ?>" class='btn btn-success text-uppercase'><i class="fa-regular fa-file-excel"></i> xls</a>
  <a href="student-inquiry-pdf?id=<?php echo $userId; ?> && instnme=<?php echo $instituteName; ?> && cpms=<?php echo $campus; ?> && logs=<?php echo $image; ?>" target="_blank" class='btn btn-danger text-capitalize'><i class="fa-solid fa-file-pdf"></i> PDF</a>
  <button class='btn btn-primary text-capitalize' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
    </div>
    <div class="col-6 mb-3">
<h4 class="text-uppercase fs-4 fw-bolder text-center text-white">student inquiry manager</h4>
    </div>
    <div class="col-3 mb-3" align="right">
        <a class="btn btn-success" href="#" title="Graphical Report" data-bs-toggle="modal" data-bs-target="#grphs"><i class="fa-solid fa-square-poll-vertical"></i></a>
        <a href="student-inquiry" target="_blank" class="btn" style="background-color:hsl(25,100%,50%);" title="Student Inquiry Form"><i class="fa-solid fa-file-invoice"></i></a>
        <a class="btn btn-warning" href="#" title="Video Help"><i class="fa-solid fa-video"></i></a>
    </div>
</div>

<!-- Graphical Report Modal -->
<div class="modal fade" id="grphs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Graphical Summary</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
<div align="center">
    <div id="inquiris" style="width:100%"></div>
</div>
<script>
google.charts.load('current', {
  callback: function () {
    var data = google.visualization.arrayToDataTable([
      ['Months', 'Confirmed', 'Not Confirmed', 'Pending'],
      ['Jan', 10, 15,5],
      ['Feb', 12, 18,3],
      ['Mar', 14, 21,7],
      ['Apr', 16, 24,10],
      ['May', 16, 24,10],
      ['Jun', 16, 24,10],
      ['Jul', 16, 24,10],
      ['Aug', 16, 24,10],
      ['Sep', 16, 24,10],
      ['Oct', 16, 24,10],
      ['Nov', 16, 24,10],
      ['Dec', 16, 24,10],
    ]);
// Set Options
const options = {
  title:'Graphical Monthly Summary'
};

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, {
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
      }, 2, {
        calc: 'stringify',
        sourceColumn: 2,
        type: 'string',
        role: 'annotation'
    },
    3, {
        calc: 'stringify',
        sourceColumn: 3,
        type: 'string',
        role: 'annotation'
    }
    
    ]);

    var chart = new google.visualization.ColumnChart(document.getElementById('inquiris')).draw(data, {curveType: "function",
                width: 800, height: 400,
                vAxis: {maxValue: 50},
                chartArea: {width: '65%'}}
        );;
    chart.draw(view, {});
  },
  packages: ['corechart']
});
</script>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$("#btn_print").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div .datas").printArea(options);
});
</script>
    <div class="row datas">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<table class="table table-responsive table-striped w-100 pt-4" id="allstudents">
    <thead>
        <tr class="bg-apna">
            <th>Sr#</th>
            <th>Date</th>
            <th>Student Name</th>
            <th>F.Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Mobile</th>
            <th>M.Fee</th>
            <th>Status</th>
            <th>Form</th>
            <th>Edit</th>
            <th>Del</th>
            <th>Whatsapp</th>
        </tr>
    </thead>
    <tbody>
<?php
$a = 1;

$sl_inqy = mysqli_query($con,"select * from studentInquiry where instituteId='$userId' order by id desc");
$cnt = mysqli_num_rows($sl_inqy);
if($cnt == 0){
    echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
}
while($a <= 1000000 && $results = mysqli_fetch_array($sl_inqy)){
    $id = $results['id'];
    $dates = $results['dates'];
    $inquiryId = $results['inquiryId'];
    $studentName = $results['studentName'];
    $fatherName = $results['fatherName'];
    $class = $results['class'];
    $section = $results['section'];
    $phone = $results['phone'];
    $monthlyFee = $results['totalFee'];
    $status = $results['status'];
    
$sl_clss = mysqli_query($con,"select * from addClass where institute_id='$userId' && id='$class'");
$rstcls = mysqli_fetch_assoc($sl_clss);
$class_name = $rstcls['class_name'];
?>
<tr style='background:hsl(35, 100%, 80%);'>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $a++; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $dates; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $studentName; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $fatherName; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $class_name; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $section; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $phone; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $monthlyFee; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $status; ?></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="student-inquiry-form?id=<?php echo $id; ?>" target="_blank" title="Inquiry Form"><i class="fa-solid fa-table-columns text-primary"></i></a></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="student-inquiry-edit?id=<?php echo $id; ?>" target="_blank" title="Edit"><i class="text-success fas fa-edit"></i></a></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="student-inquiry-del?id=<?php echo $id; ?>" title="Delete"><i class="text-danger fas fa-trash-alt"></i></a></td>
    <td style='border:1px solid hsl(25, 100%, 50%);'><a href="student-inquiry-whatsapp-form?id=<?php echo $id; ?>" target="_blank" title="Send Message"><i class="fa-brands fa-whatsapp text-success"></i></a></td>
</tr>
<?php } ?>
    </tbody>
</table>
        </div>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>