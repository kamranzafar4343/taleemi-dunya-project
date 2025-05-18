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
                        <li class="breadcrumb-item active text-capitalize" aria-current="page"> results card</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid mt-4">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
                <label class="text-capitalize fs-6">class</label>
                <select name="clse" class="form-select text-uppercase" id="cls">
                    <option class="text-capitalize" value="">---select class---</option>
                    <?php
                    $cls_mnger = mysqli_query($con, "select * from addClass where institute_id='$userId'");
                    $cnts = mysqli_num_rows($cls_mnger);
                    if ($cnts == 0) {
                        echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
                    }
                    while ($clis = mysqli_fetch_array($cls_mnger)) {
                        $id = $clis['id'];
                        $institute_id = $clis['institute_id'];
                        $class_name = $clis['class_name'];
                    ?>
                        <option class="text-capitalize" value="<?php echo $id; ?>"><?php echo $class_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
                <label class="text-capitalize fs-6">section</label>
                <select class="form-select text-capitalize" id="strngs">
                    <option value="">---select section---</option>
                </select>
            </div>
            <script>
                /// Class to Section
                $('#cls').on('change', function() {
                    var class_name = this.value;
                    var insti = document.getElementById('instutes').value;
                    //    console.log(class_name);

                    $.ajax({
                        url: 'ajax/class-strength.php',
                        type: "POST",
                        data: {
                            class_title: class_name,
                            institute_code: insti
                        },
                        success: function(result) {
                            $('#strngs').html(result);
                            //console.log(result);
                        }
                    });
                });
            </script>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
                <input type="hidden" value="<?php echo $userId; ?>" id="instutes">
                <label class="text-capitalize fs-6">session</label>
                <select class="sesn form-select">
                    <?php
                    $cls_mnger = mysqli_query($con, "select * from addSession where institute_id='$userId' order by id desc");
                    $cnts = mysqli_num_rows($cls_mnger);
                    if ($cnts == 0) {
                        echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
                    }
                    while ($clis = mysqli_fetch_array($cls_mnger)) {
                        $id = $clis['id'];
                        $institute_id = $clis['institute_id'];
                        $session = $clis['session'];
                    ?>
                        <option class="text-capitalize"><?php echo $session; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
                <label class="text-capitalize fs-6"> Exame Type</label>
                <select class="toms form-select text-capitalize">
                    <?php
                    $tms = mysqli_query($con, "select * from addTerms where instituteId='$userId'");
                    $cnts = mysqli_num_rows($tms);
                    if ($cnts == 0) {
                        echo "<div class='alert alert-success text-uppercase'>there are no record.</div>";
                    }
                    while ($tems = mysqli_fetch_array($tms)) {
                        $id = $tems['id'];
                        $termid = $tems['termid'];
                        $term = $tems['term'];
                    ?>
                        <option class="text-capitalize" value="<?php echo $termid; ?>"><?php echo $term; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-4 mt-4">

                <button id="btngen" type="submit" class="btn btn-apna text-uppercase" style="margin-right: 10px;"><i class="fas fa-redo"></i> Generate</button>


                <!-- Select All Button -->
                <button id="selectAllOnPage" type="button" class="btn btn-apna text-uppercase">
                    <i class="fas fa-check-square"></i> Select All
                </button>

                <!-- Print Button -->
                <button id="printSelected" type="button" class="btn btn-primary text-uppercase multiple">
                    <i class="fas fa-print"></i> Print
                </button>

                <!-- Print Button -->
                <button id="delete_records" type="button" class="btn btn-danger text-uppercase multiple">
                    <i class="fas fa-trash"></i> Delete
                </button>

            </div>

        </div>
    </form>
    <script>
        $(document).ready(function() {
            $("#btngen").on('click', function(e) {
                e.preventDefault();
                var cls = $("#cls").val();
                var strngs = $("#strngs").val();
                var instutes = $("#instutes").val();
                var sesn = $(".sesn").val();
                var toms = $(".toms").val();
                if (cls == "") {

                } else if (strngs == "") {

                } else {
                    $.ajax({
                        url: 'ajax/fetch-result-card.php',
                        type: "POST",
                        data: {
                            aply_cles: cls,
                            sectns: strngs,
                            inst_ied: instutes,
                            aply_sesin: sesn,
                            aply_trms: toms
                        },
                        success: function(aplyreslts) {
                            $(".studnt-form").html(aplyreslts);
                        }

                    });
                }

            });
        });
    </script>
    <div class="row">
        <div class="col datas studnt-form"></div>
    </div>
    <div class="row">
        <div class="col">
            <div align='right' class='p-5'>
                <button class='btn btn-apna' id="btn_print"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>

</div>

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

<script type="text/javascript">
    $(document).on('click', '#printSelected', function() {
        let checkboxes = document.querySelectorAll('input[name="print_multipe[]"]:checked');

        if (checkboxes.length === 0) {
            alert("Please select at least one student to print.");
            return;
        }

        let form = document.createElement('form');
        form.method = 'POST';
        form.action = 'view-card-type-I.php';
        form.target = '_blank';

        checkboxes.forEach(cb => {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'print_multipe[]';
            input.value = cb.value;
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    });
</script>

<!-- delete -->
<script type="text/javascript">
    $(document).on('click', '#delete_records', function() {
        let checkboxes = document.querySelectorAll('input[name="print_multipe[]"]:checked');

        if (checkboxes.length === 0) {
            alert("Please select at least one student to delete.");
            return;
        }

        let data = [];

        checkboxes.forEach(cb => {
            data.push(cb.value); // cb.value is already a JSON string
        });

        $.ajax({
            url: 'delete_multiple_results.php',
            type: 'POST',
            data: {
                print_multipe: data
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert("✅ Successfully deleted " + response.deleted_ids.length + " result(s).");

                    // Optional: remove deleted rows from DOM
                    checkboxes.forEach(cb => {
                        cb.closest('tr').remove(); // If checkboxes are in table rows
                    });
                } else {
                    alert("❌ Deletion failed.");
                }
            },
            error: function() {
                alert("❌ Server error. Try again later.");
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        var isAllSelected = false; // Track the state

        $('#selectAllOnPage').click(function() {
            isAllSelected = !isAllSelected; // Toggle the state

            // Toggle checkboxes based on state
            $('input[name="print_multipe[]"]').prop('checked', isAllSelected);

            // Update button text
            $(this).text(isAllSelected ? 'Deselect All' : 'Select All');

            // Trigger print function
            multiple_print();
        });

        // Reset state when page changes or table redraws
        $('#customersTable').on('page.dt draw.dt', function() {
            isAllSelected = false;
            $('#selectAllOnPage').text('Select All');
        });
    });
</script>
<?php require_once("source/foot-section.php"); ?>