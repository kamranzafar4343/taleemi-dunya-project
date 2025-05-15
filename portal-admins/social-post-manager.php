<?php 
require_once("source/header.php"); 
require_once("source/navbar.php"); 
require_once("source/sidebar.php"); 
?>
<style>
    textarea {
  resize: none;
}
</style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Social Posts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Social Posts</li>
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
      <h5 class="card-title">Social Posts</h5>  
    </div>
</div>
<div class="row mb-3">
<?php
$selctpost = mysqli_query($con,"select * from socialPost");
if(mysqli_num_rows($selctpost)>0){
    while($row = mysqli_fetch_array($selctpost)){
        $id = $row['id'];
        $post_name = $row['post_name'];
?>
<div class="col-sm-4 col-lg-2 mb-3">
    <div class="card mb-0">
        <img class="img-fluid" src="social-post/<?php echo $post_name; ?>">
        <div class="card-body">
<div class="d-flex">
    <div class="p-1 flex-fill">
        <a href="delete-social-post?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
    </div>
</div>
        </div>
    </div>        
</div>
<?php
    }
}
?>
</div>
            </div>
          </div>
          
        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <?php require_once("source/footer.php"); ?>