<?php 
require_once("source/header.php"); 
require_once("source/navbar.php"); 
require_once("source/sidebar.php"); 
?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Apply Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Apply Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
<div class="d-flex">
    <div class="p-2 flex-fill">
<h5 class="card-title">Web Users</h5>
    </div>
    <div class="p-2">
        <a href="web-users-list" class="btn btn-success text-capitalize"><i class="fa-solid fa-file-arrow-down"></i> Download Excel</a>
    </div>
</div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Cell</th>
                    <th scope="col">E/D</th>
                  </tr>
                </thead>
                <tbody>
<?php
$a = 1;
$sl_usr = mysqli_query($con,"select * from portalUsers order by id desc");
$counts = mysqli_num_rows($sl_usr);
if($counts == 0){ echo "<div class='alert alert-danger text-capitlaize'>there are no record found.</div>"; }
while($a <= 100000 && $result=mysqli_fetch_array($sl_usr)){
    $id = $result['id'];
    $userId = $result['userId'];
    $user = $result['user'];
    $instituteName = $result['instituteName'];
    $email = $result['email'];
    $cell = $result['cell'];
    $password = $result['password'];
    $message = $result['message'];
    $image = $result['image'];
    $role = $result['role'];
?>    
                  <tr>
                    <th scope="row"><?php echo $a++; ?></th>
                    <td class="text-capitalize"><?php echo $user; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $cell; ?></td>
<td><a href="#"><i class="ri-check-double-line text-success fw-bold"></i></a></td>
                  </tr>
<?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>