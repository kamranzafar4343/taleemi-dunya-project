<!-- Modal -->
<div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel"><?php echo $studentName; ?> Profile</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<table class="w-100">
    <tr align="center">
        <th colspan="4" width="100"><img src="../student_imgs/<?php echo $profileimage; ?>" class="img-fluid" style="width:30%;"></th>
    </tr>
    <tr align="center">
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);" colspan="4" width="100" class="text-uppercase fs-5 fw-bolder"><?php echo $studentName; ?></th>
    </tr>
    <tr align="center">
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);" colspan="4" width="100" class="text-uppercase fs-5 fw-bolder"><?php echo $fatherName; ?></th>
    </tr>
    <tr>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);">Class</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);" class="text-uppercase"><?php echo $class_name; ?></td>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);">Section</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);" class="text-uppercase"><?php echo $section; ?></td>
    </tr>
    <tr>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);">Roll No:</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);"><?php echo $roll_num; ?></td>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);">D.O.B</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);"><?php echo $dateOfBirth; ?></td>
    </tr>
    <tr>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);">Session</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);"><?php echo $session; ?></td>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);" class="text-uppercase">Gender</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(35,100%,80%);"><?php echo $gender; ?></td>
    </tr>
    <tr>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);">Bay Form</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);"><?php echo $bForm; ?></td>
        <th style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);">Phone:</th>
        <td style="border:1px solid hsl(25,100%,50%);color:hsl(0,0%,0%);background-color:hsl(0,0%,90%);"><?php echo $phone; ?></td>
    </tr>
</table>
      </div>
      
    </div>
  </div>
</div>