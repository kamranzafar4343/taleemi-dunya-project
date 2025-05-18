<?php
require_once("../functions/db.php");

$inst_ied = $_POST['inst_ied'];
$aply_cles = $_POST['aply_cles'];
$sectns = $_POST['sectns'];
$aply_sesin = $_POST['aply_sesin'];
$aply_trms = $_POST['aply_trms'];

$a = 1;

$sl_clas = mysqli_query($con, "select * from results where instituteId='$inst_ied' && class='$aply_cles' && section='$sectns' && session='$aply_sesin' && terms='$aply_trms' group by roll_no order by roll_no asc");
if (mysqli_num_rows($sl_clas) > 0) {
?>
    <div class="row">
        <div class="col mt-3">
            <table class="table table-reponsive w-100 mt-3">
                <tr class="bg-apna">
                    <th>Sr.No</th>
                    <th>Roll No</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Session</th>
                    <th>Action</th>
                    <th>Print</th>
                </tr>
                <?php
                while ($a <= 100000 && $result = mysqli_fetch_array($sl_clas)) {
                    $id = $result['id'];
                    $roll_no = $result['roll_no'];
                    $student_name = $result['student_name'];
                    $class = $result['class'];
                    $section = $result['section'];
                    $session = $result['session'];

                    $sl_clsip = mysqli_query($con, "select * from addClass where institute_id='$inst_ied' && id='$class'");
                    $rel = mysqli_fetch_assoc($sl_clsip);
                    $class_name = $rel['class_name'];
                ?>
                    <tr style='background:hsl(0, 0.00%, 100.00%);'>
                        <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $a++; ?></td>
                        <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $roll_no; ?></td>
                        <td style='border:1px solid hsl(25, 100%, 50%);' class="text-capitalize"><?php echo $student_name; ?></td>
                        <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $class_name; ?></td>
                        <td style='border:1px solid hsl(25, 100%, 50%);' class="text-uppercase"><?php echo $section; ?></td>
                        <td style='border:1px solid hsl(25, 100%, 50%);'><?php echo $session; ?></td>

                        <td style='border:1px solid hsl(25, 100%, 50%);'>
                            <a href="view-card-type-I?id=<?php echo $roll_no; ?> && trms=<?php echo $aply_trms; ?> && clase=<?php echo $aply_cles; ?> && sectin=<?php echo $sectns; ?> && seisn=<?php echo $aply_sesin; ?>" target="_blank" class="btn btn-success text-uppercase">
                                <i class="fa-regular fa-eye"></i> view card
                            </a>
                        </td>

                        <td style='border:1px solid hsl(25, 100%, 50%);'>
                            <form id="printForm">
                                <?php
                                $data = [
                                    'id' => $roll_no,
                                    'trms' => $aply_trms,
                                    'clase' => $aply_cles,
                                    'sectin' => $sectns,
                                    'seisn' => $aply_sesin,
                                ];
                                $json = htmlspecialchars(json_encode($data), ENT_QUOTES);
                                ?>
                                <input type="checkbox" name="print_multipe[]" value="<?php echo $json; ?>">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } else {
    echo "<div class='alert alert-success'>there are no record found!</div>";
} ?>