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
                        <li class="breadcrumb-item active text-capitalize" aria-current="page"> results manager</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid mt-4">
    <div class="row">
        <?php
        $sel_mngr = mysqli_query($con, "select * from finalResults where instituteId='$userId' order by id desc");
        if (mysqli_num_rows($sel_mngr) > 0) {
            while ($result = mysqli_fetch_array($sel_mngr)) {
                $id = $result['id'];
                $rollnumber = $result['rollnumber'];
                $stu_image = $result['stu_image'];
                $student_name = $result['student_name'];
                $father_name = $result['father_name'];
                $class = $result['class'];
                $section = $result['section'];
                $session = $result['session'];
                $term = $result['term'];

                $sl_clsip = mysqli_query($con, "select * from addClass where institute_id='$userId' && id='$class'");
                $rel = mysqli_fetch_assoc($sl_clsip);
                $class_name = $rel['class_name'];

                $sl_tms = mysqli_query($con, "select * from addTerms where instituteId='$userId' && termid='$term'");
                $trms = mysqli_fetch_assoc($sl_tms);
                $termid = $trms['termid'];
                $term = $trms['term'];
        ?>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2 mb-3 p-2">
                    <div class="card bg-apna">
                        <img class="img-fluid" src="student_imgs/<?php if (!empty($stu_image)) {
                                                                        if ($stu_image == "None") {
                                                                            echo "users.jpg";
                                                                        } else {
                                                                            echo $stu_image;
                                                                        }
                                                                    } else {
                                                                        echo "users.jpg";
                                                                    } ?>">
                        <div class="card-body p-1" style="background-color:hsl(35,100%,80%);">
                            <table class="w-100">
                                <tr align="center">
                                    <th colspan="2" class="fs-6 text-uppercase"><?php echo $student_name; ?></th>
                                </tr>
                                <tr>
                                    <th style="border:1px solid hsl(25,100%,5%);">F.Name</th>
                                    <td style="border:1px solid hsl(25,100%,5%);"><?php echo $father_name; ?></td>
                                </tr>
                                <tr>
                                    <th style="border:1px solid hsl(25,100%,5%);">Class</th>
                                    <td style="border:1px solid hsl(25,100%,5%);"><?php echo $class_name; ?></td>
                                </tr>
                                <tr>
                                    <th style="border:1px solid hsl(25,100%,5%);">Term</th>
                                    <td style="border:1px solid hsl(25,100%,5%);"><?php echo $term; ?></td>
                                </tr>
                                <tr>
                                    <th style="border:1px solid hsl(25,100%,5%);">Roll#</th>
                                    <td style="border:1px solid hsl(25,100%,5%);"><?php echo $rollnumber; ?></td>
                                </tr>
                            </table>
                            <div class="d-flex">
                                <div class="p-1 flex-fill text-center">
                                    <a href="result-edit-by-card.php?id=<?php echo $id; ?>" target="_blank" title="Edit Result">
                                        <i class="fa fa-edit text-success"></i>
                                    </a>
                                </div>
                                <div class="p-1 flex-fill text-center">
                                    <a href="del-result-by-card.php?id=<?php echo $id; ?>" title="Delete Result">
                                        <i class="fa fa-trash-alt text-danger"></i>
                                    </a>
                                </div>
                                <div class="p-1 flex-fill text-center">
                                    <a href="view-result-card-by-student.php?id=<?php echo $id; ?>" target="_blank" title="View Result Card">
                                        <i class="fa-solid fa-eye" style="color:hsl(250,90%,60%);"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div class='alert alert-danger'>There are no Record Found!</div>";
        }
        ?>
    </div>
</div>
<?php require_once("source/foot-section.php"); ?>