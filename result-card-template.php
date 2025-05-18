<div class="row">

    <div class="container-fluid">
        <div class="col">
            <div class="row">
                <div class="col-12 datas p-3" style="border:10px double black;height:980px;overflow:hidden;">
                    <table class="w-100">
                        <tr align="center" style='background:hsl(35, 100%, 80%);'>
                            <th width="100" class="p-1"><img src="portal-admins/institute-logos/<?php echo $image; ?>" class="img-fluid"></th>
                            <th class="p-1">
                                <h3 class="text-uppercase fs-1 fw-bold"><?php echo $instituteName; ?></h3>
                                <div><span class="text-capitalize fs-4" style="border-bottom:1px solid black;"><?php echo $campus; ?></span></div>
                            </th>
                            <th width="100" class="p-1"><img src="student_imgs/<?php if (empty($student_img)) {
                                                                                    echo "users.jpg";
                                                                                } elseif ($student_img == "None") {
                                                                                    echo "users.jpg";
                                                                                } elseif ($student_img == "none") {
                                                                                    echo "users.jpg";
                                                                                } else {
                                                                                    echo $student_img;
                                                                                } ?>" class="img-fluid"></th>
                        </tr>
                        <tr align="center" style='background:hsl(35, 100%, 80%);'>
                            <th class="text-capitalize fs-5 fw-bold p-1" colspan="3"><?php echo "result card " . "(" . $term . ") " . $session; ?></th>
                        </tr>
                    </table>
                    <table class="w-100">
                        <tr style='background:hsl(35, 100%, 80%);'>
                            <th style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase fw-bold">student name:</th>
                            <td style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase"><?php echo $studentName; ?></td>
                            <th style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase fw-bold">father name:</th>
                            <td style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase"><?php echo $fatherName; ?></td>
                        </tr>
                        <tr style='background:hsl(35, 100%, 80%);'>
                            <th style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase fw-bold">Class:</th>
                            <td style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase"><?php echo $class_names;  ?></td>
                            <th style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase fw-bold">Section:</th>
                            <td style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase"><?php echo $section; ?></td>
                        </tr>
                        <tr style='background:hsl(35, 100%, 80%);'>
                            <th style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase fw-bold">Roll#:</th>
                            <td style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase"><?php echo $roll_num; ?></td>
                            <th style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase fw-bold">Exame Type:</th>
                            <td style="border:1px solid black;font-size:0.9rem;" class="p-1 text-uppercase"><?php echo $term; ?></td>
                        </tr>
                    </table>
                    <table class="table table-responsive table-striped w-100 mt-3 p-1">
                        <tr style='background:hsl(35, 100%, 80%);' align="center">
                            <th rowspan="2" style="font-size:1rem;" class="p-1">Subjects</th>
                            <th colspan="12" style="font-size:1rem;" class="text-capitalize p-1">Detail of Marks obtained by the candidate</th>
                        </tr>
                        <tr style='background:hsl(35, 100%, 80%);' align="center">
                            <th style="font-size:1rem;" class="p-1">Total Marks</th>
                            <th style="font-size:1rem;" class="p-1">Obt.Marks</th>
                            <th style="font-size:1rem;" class="p-1">%age</th>
                            <th style="font-size:1rem;" class="p-1" colspan="12">Grade / Remarks</th>
                        </tr>
                        <?php
                        $sl_rslts = mysqli_query($con, "select * from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
                        while ($rstls = mysqli_fetch_assoc($sl_rslts)) {
                            $marks = $rstls['marks'];
                            $total_marks = $rstls['total_marks'];
                            $subjecta = $rstls['subject'];
                            $prct = round($marks / $total_marks * 100);
                            if ($prct >= 90) {
                                $remrks = "Outstanding";
                            } elseif ($prct >= 80) {
                                $remrks = "Excellent";
                            } elseif ($prct >= 70) {
                                $remrks = "Very Good";
                            } elseif ($prct >= 60) {
                                $remrks = "Good";
                            } elseif ($prct >= 50) {
                                $remrks = "Satisfactory";
                            } elseif ($prct >= 40) {
                                $grades = "Better";
                            } else {
                                $remrks = "Needs Improvement";
                            }
                            if ($prct >= 90) {
                                $grades = "A+";
                            } elseif ($prct >= 80) {
                                $grades = "A";
                            } elseif ($prct >= 70) {
                                $grades = "B";
                            } elseif ($prct >= 60) {
                                $grades = "C";
                            } elseif ($prct >= 50) {
                                $grades = "D";
                            } elseif ($prct >= 40) {
                                $grades = "E";
                            } else {
                                $grades = "F";
                            }
                        ?>
                            <tr style='background:hsl(35, 100%, 80%);' align="center">
                                <th style="text-align:left; font-size:0.9rem;" class="p-1 text-capitalize"><?php echo $subjecta; ?></th>
                                <td style="font-size:0.8rem;" class="p-1"><?php echo $total_marks; ?></td>
                                <td style="font-size:0.8rem;" class="p-1 toobtmrks"><?php echo $marks; ?></td>
                                <td style="font-size:0.8rem;" class="p-1 toobtmrks"><?php echo round($marks / $total_marks * 100) . "%"; ?></td>
                                <th style="text-align:left;font-size:0.8rem;" class="p-1" colspan="9">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "(" . $grades . ")  " . $remrks; ?>
                                </th>
                            </tr>
                        <?php } ?>
                        <tr style='background:hsl(35, 100%, 80%);' align="center">
                            <th style="font-size:0.8rem;" class="p-1">Total Marks</th>
                            <?php
                            $sl_rslts_sums = mysqli_query($con, "select SUM(total_marks) as totls from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
                            while ($tls = mysqli_fetch_assoc($sl_rslts_sums)) {
                                $totls = $tls['totls'];
                            ?>
                                <td style="font-size:0.8rem;" class="p-1"><?php echo $totls; ?></td>
                            <?php } ?>
                            <th style="font-size:0.8rem;" class="p-1">Obt.Marks</th>
                            <?php
                            $sl_rslts_sum = mysqli_query($con, "select SUM(marks) as obtn from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
                            while ($rotates = mysqli_fetch_assoc($sl_rslts_sum)) {
                                $obtnmarks = $rotates['obtn'];
                            ?>
                                <td style="font-size:0.8rem;" class="p-1"><?php echo $obtnmarks; ?></td>
                            <?php
                            }
                            ?>
                            <th style="font-size:0.8rem;" class="p-1">%age</th>
                            <?php
                            $prctge = mysqli_query($con, "select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
                            while ($pctg = mysqli_fetch_assoc($prctge)) {
                                $pectage = $pctg['perc'];
                            ?>
                                <td style="font-size:0.8rem;" class="p-1"><?php echo round($pectage / $totls * 100) . "%"; ?></td>
                            <?php } ?>
                            <th style="font-size:0.8rem;" class="p-1">Grade</th>
                            <?php
                            $prctge = mysqli_query($con, "select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
                            while ($pctg = mysqli_fetch_assoc($prctge)) {
                                $pectage = $pctg['perc'];
                                $grde = round($pectage / $totls * 100);
                            ?>
                                <td style="font-size:0.8rem;" class="p-1">
                                    <?php
                                    if ($grde > 90) {
                                        echo "A+";
                                    } elseif ($grde > 80) {
                                        echo "A";
                                    } elseif ($grde > 70) {
                                        echo "B";
                                    } elseif ($grde > 60) {
                                        echo "C";
                                    } elseif ($grde > 50) {
                                        echo "D";
                                    } elseif ($grde > 40) {
                                        echo "E";
                                    } else {
                                        echo "F";
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                            <th style="font-size:0.8rem;" class="p-1">Remarks</th>
                            <?php
                            $prctge = mysqli_query($con, "select SUM(marks) as perc from results where class='$clase' && section='$sectin' && session='$seisn' && roll_no='$ids' && instituteId='$userId' && terms='$trms'");
                            while ($pctg = mysqli_fetch_assoc($prctge)) {
                                $postns = $pctg['perc'];
                                $grdes = round($pectage / $totls * 100);

                            ?>
                                <td style="font-size:0.8rem;" class="p-1">
                                    <?php
                                    if ($grdes > 90) {
                                        echo "Outstanding";
                                    } elseif ($grdes > 80) {
                                        echo "Excellent";
                                    } elseif ($grdes > 70) {
                                        echo "V.Good";
                                    } elseif ($grdes > 60) {
                                        echo "Good";
                                    } elseif ($grdes > 50) {
                                        echo "Better";
                                    } elseif ($grdes > 40) {
                                        echo "Needs Improvement";
                                    } else {
                                        echo "Needs Improvement";
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr style='background:hsl(35, 100%, 80%);'>
                            <th colspan="15" class="text-uppercase p-1" style="font-size:0.8rem;">Result Status: <span class="fw-normal">
                                    <?php if ($grde > 39) {
                                        echo "Pass";
                                    } else {
                                        echo "Fail";
                                    } ?>
                                </span> </th>
                        </tr>
                        <?php if ($userId == 662293) { ?>

                        <?php } else { ?>
                            <!----------
<tr style='background:hsl(35, 100%, 80%);'>
    <td colspan="10">
<div class="p-1 text-capitalize fw-bold" style="font-size:1.2rem;border:2px solid black;"> teacher's comments
<div class="p-2"><hr>
</div>
</div>
    </td>
</tr>
---------->
                        <?php } ?>
                    </table>
                    <table class="w-100 mt-3" align="center">
                        <tr align="center" style='background:hsl(35, 100%, 80%);'>
                            <th colspan="2" style="border:1px solid black;" class="p-0 text-capitalize">Grading Formula</th>
                            <th colspan="2" class="text-capitalize p-0"></th>
                            <th colspan="6" style="border:1px solid black;" class="p-0 text-capitalize">Attendance</th>
                        </tr>
                        <?php
                        $crmnths = date("m");
                        $sl_dys = mysqli_query($con, "select * from attandance where instituteId='$userId' && roll_no='$ids' && month='$crmnths'");
                        $cnts = mysqli_num_rows($sl_dys);
                        ?>
                        <tr style='background:hsl(35, 100%, 80%);'>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;">A+ = Outstanding (90-100)</td>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;">A = Excellent(80-90)</td>
                            <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Number of Days: <?php echo $cnts; ?></td>
                        </tr>
                        <?php
                        $sl_dyes = mysqli_query($con, "select * from attandance where instituteId='$userId' && status='P' && roll_no='$ids' && month='$crmnths'");
                        $cntgs = mysqli_num_rows($sl_dyes);
                        ?>
                        <tr style='background:hsl(35, 100%, 80%);'>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;">B = V.Good(70-80)</td>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;">C = Good(60-70)</td>
                            <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Presents: <?php echo $cntgs; ?></td>
                        </tr>
                        <?php
                        $sl_dyesed = mysqli_query($con, "select * from attandance where instituteId='$userId' && status='A' && roll_no='$ids' && month='$crmnths'");
                        $ctgs = mysqli_num_rows($sl_dyesed);
                        ?>
                        <tr style='background:hsl(35, 100%, 80%);'>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-left:1px solid black;border-bottom:1px solid black;">D = Better(50-40)</td>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-right:1px solid black;border-bottom:1px solid black;">E = Needs Improvement(40 and below)</td>
                            <td class="p-0" style="font-size:0.8rem;" colspan="2"></td>
                            <td class="p-0 px-3" style="font-size:0.8rem;border-bottom:1px solid black;border-right:1px solid black;border-left:1px solid black;" colspan="6">Total Absents: <?php echo $ctgs; ?></td>
                        </tr>
                    </table>
                    <br>
                    <table class="w-100 p-0" style='background:hsl(35, 100%, 80%);'>
                        <tr>
                            <td colspan="4" class="p-0">
                                <div id="myChart" style="width:85%;height:150px;margin-left:-50px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <th class="p-1" style="font-size:0.8rem;">Principal Signature:</th>
                            <td class="p-1" style="font-size:0.8rem;">______________________________________</td>
                            <th class="p-1" style="font-size:0.8rem;">Teacher Signature:</th>
                            <td class="p-1" style="font-size:0.8rem;">______________________________________</td>
                        </tr>
                    </table>
                    <table class="w-100 table table-striped" style='background:hsl(35, 100%, 80%);'>
                        <tr align="center">
                            <th class="p-1" colspan="15">
                                Address: <span class="fw-normal"><?php if (!empty($mainaddress)) {
                                                                        echo $mainaddress;
                                                                    } else {
                                                                        echo "Please Enter Your Address from Profile!";
                                                                    } ?></span>
                                Cell: <span class="fw-normal"><?php if (!empty($cell)) {
                                                                    echo $cell;
                                                                } else {
                                                                    echo "Please Enter Your Cell from Profile!";
                                                                } ?></span>
                            </th>
                        </tr>
                    </table>


                </div>

            </div>
        </div>
    </div>
</div>