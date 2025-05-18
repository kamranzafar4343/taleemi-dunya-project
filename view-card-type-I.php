<?php require_once("source/head-section.php");
require_once("source/navbar.php");
require_once("inquiry.php");
require_once("add-students.php");
require_once("student-manager.php");
require_once("staff-manager.php");
require_once("add-staff.php");
require_once("attendance.php");
require_once("attendance-manager.php");
require_once("academics.php");
require_once("academic-manager.php");
require_once("accounts.php");
require_once("exames.php");
require_once("exame-manager.php");
require_once("challan.php");
require_once("samester-challan.php");
require_once("annualy-challan.php");
require_once("collection.php");
require_once("lms.php");
require_once("settings.php");
require_once("e-services.php");
require_once("e-certificates.php");
require_once("all-roles.php");
require_once("period-bell.php");
require_once("stock.php");
require_once("reminder.php");
require_once("student-portal.php");
require_once("teacher-portal.php");
require_once("SMS.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card px-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exame-manager"><i class="fa-regular fa-circle-left"></i> Back</a></li>
                        <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='<?php echo $role; ?>'"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white text-capitalize text-decoration-none" href="javascript:void()" onclick="location.href='result-card'"> result card</a></li>
                        <li class="breadcrumb-item active text-capitalize" aria-current="page"> results</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<style>
    .table,
    table,
    .table-responsive,
    .table tr,
    .table tr th,
    .table tr td {
        border: none;
        border-bottom: none;
        box-shadow: none;
    }

    /* Make all text selectable, overriding any user-select:none */
    * {
        -webkit-user-select: text !important;
        -moz-user-select: text !important;
        -ms-user-select: text !important;
        user-select: text !important;
    }
</style>
<br>
<div class="col-12" align='right'>
    <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
</div>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['print_multipe'])) {
    foreach ($_POST['print_multipe'] as $jsonData) {
        $data = json_decode($jsonData, true);

        if (!$data) {
            continue; // skip invalid JSON
        }

        // Extract student info
        $ids = $data['id'];
        $trms = $data['trms'];
        $clase = $data['clase'];
        $sectin = $data['sectin'];
        $seisn = $data['seisn'];

        //skip if no result found for that student
        $sl_stdntnme = mysqli_query($con, "select * from addStudents where class='$clase' && section='$sectin' && session='$seisn' && roll_num='$ids' && instituteId='$userId'");
        $stdnt = mysqli_fetch_assoc($sl_stdntnme);

        if (!$stdnt) {
            continue; // skip this iteration
        }

        $studentName = $stdnt['studentName'];
        $fatherName = $stdnt['fatherName'];
        $stdntimage = $stdnt['image'];
        $class = $stdnt['class'];
        $section = $stdnt['section'];
        $session = $stdnt['session'];
        $roll_num = $stdnt['roll_num'];

        $sl_clsip = mysqli_query($con, "select * from addClass where institute_id='$userId' && id='$class'");
        $rel = mysqli_fetch_assoc($sl_clsip);
        $class_names = $rel['class_name'];


        $sl_rsl = mysqli_query($con, "select * from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId'");
        $result = mysqli_fetch_assoc($sl_rsl);
        $student_name = $result['student_name'];
        $father_name = $result['father_name'];
        $student_img = $result['student_img'];
        $attendance = $result['attendance'];
        $roll_no = $result['roll_no'];
        $subject = $result['subject'];
        $total_marks = $result['total_marks'];
        $obtain_marks = $result['obtain_marks'];
        $passing_marks = $result['passing_marks'];
        $terms = $result['terms'];
        $remarks = $result['remarks'];
        $months = $result['months'];
        $instituteId = $result['instituteId'];
        $date = $result['date'];

        $sl_trms = mysqli_query($con, "select * from addTerms where instituteId='$userId' && termid='$trms'");
        $tm = mysqli_fetch_assoc($sl_trms);
        $term = $tm['term'];

        include('result-card-template.php');
        echo "<pre>";
        print_r($_POST['print_multipe']);
    }
}
?>
<script type="text/javascript">
    $("#btn_print").click(function() {
        var mode = 'iframe';
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div .datas").printArea(options);
    });
</script>

<?php require_once("source/foot-section.php"); ?>