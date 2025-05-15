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
      <h1>Upload Social Post</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void()" onclick="location.href='home'">Home</a></li>
          <li class="breadcrumb-item active">Upload Social Post</li>
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
      <h5 class="card-title">Upload Social Post Form</h5>  
    </div>
</div>
              <!-- General Form Elements -->
<form class="imgfrm">
<div class="row mb-3">
    <label for="inputText" class="col-form-label">Image</label>
    <div class="col-sm-6 mb-3">
<div class="input-group">
    <Input class="form-control pstimg" id="files" type="file">
    <button class="btn btn-primary text-capitalize updtbtn">update</button>
    <div id="img-upload"></div>
</div>
    </div>
</div>
</form>
<script>
    $(document).ready(function() {
    $('#files').change(function(){
        var file_data = $('#files').prop('files')[0];
        var form_data = new FormData();                  
        form_data.append('files', file_data);
        $.ajax({
            url: "social-upload-img.php",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                $("#img-upload").html(data);
            //    console.log(data);
            }
        });
    });
});
</script>
            </div>
          </div>

        </div>

      </div>
</section>
  </main><!-- End #main -->
<?php require_once("source/footer.php"); ?>
<script>
$(document).ready(function(){
    $(".updtbtn").on('click',function(e){
e.preventDefault();
var pstimg = $(".pstimg").val().replace(/C:\\fakepath\\/i, '');
        if(pstimg != ""){
$.ajax({
    url: 'ajax/submit-social-post.php',
    type: "POST",
    data: {socil_imgs:pstimg},
    success: function(postimges){
if(postimges == 1){
    Swal.fire({
  title: "Congrates!",
  text: "Your Post Successfully Submited!",
  icon: "success"
});
}else{
Swal.fire({
  title: "Sorry!",
  text: "Your Post is not Submited!",
  icon: "error"
});
}
    }
});
        }else{
Swal.fire({
  title: "Sorry!",
  text: "Please Select Social Post!",
  icon: "warning"
});
        }
    });
});
</script>