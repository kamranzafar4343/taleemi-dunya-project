<!-- Modal -->
<div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel"><?php echo $studentName; ?> Profile</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<table class="table table-responsive table-striped w-100 bg-white">
    <tr>
        <th>Staff ID:</th>
        <td><?php echo $staffId; ?></td>
        <th>Post</th>
        <td><?php echo $appliedPost; ?></td>
        <th>Type</th>
        <td><?php echo $staffType; ?></td>
        <th rowspan="3" width="150"><img src="../staff_imgs/<?php echo $staffimage; ?>" class="img-fluid"></th>
    </tr>
    <tr>
        <th>Marital Status</th>
        <td><?php echo $maritalStatus; ?></td>
        <th>Session</th>
        <td><?php echo $session; ?></td>
        <th>Gender</th>
        <td><?php echo $gender; ?></td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td><?php echo $dob; ?></td>
        <th>Bay Form</th>
        <td><?php echo $cnic; ?></td>
        <th>Phone:</th>
        <td><?php echo $phone; ?></td>
    </tr>
</table>
      </div>
      
    </div>
  </div>
</div>