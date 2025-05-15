<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Download Image</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
  </head>
  <style media="screen">
*{ font-family:verdana; }
    #htmlContent{
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 1080px;
      height: 1080px;
    }
#download{
    font-size:2rem;display:block;text-decoration:none;color:white;
    cursor:pointer;
}
#download:hover{
    background:darkred;
}
h1{
    text-transform:uppercase;margin:0px;text-align:center;font-family:verdana;
    font-size:2.7rem;
}
  </style>
  <body onload = "autoClick();">
<?php 
include("functions/db.php"); 

if (isset($_GET['id'])){
    
   $ids = $_GET['id'];
   $inst = $_GET['inst'];

$sl_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$inst'");
$rt = mysqli_fetch_assoc($sl_schol);
$institute_name = $rt['institute_name'];
$campus = $rt['campus'];
$logo = $rt['logo'];


$selct_socla = mysqli_query($con,"select * from socialPost where id='$ids'");
$frms = mysqli_fetch_assoc($selct_socla);
$post_name = $frms['post_name'];
}
?>
<div style="width:100%;background:red;margin-bottom:50px;" align="center">
        <a id="download">Download</a>
</div>
    <div id = "htmlContent">
      <div align="center">
<h1>
    <?php echo $institute_name; ?>
</h1>
    <img src="portal-admins/social-post/<?php echo $post_name; ?>" width="100%">
</div>
    </div>
    
<div style="width:100%;background:red;margin-top:100px;" align="center">
        <a id="download">Download</a>
</div>

    <script type="text/javascript">
      function autoClick(){
        $("#download").click();
      }

      $(document).ready(function(){
        var element = $("#htmlContent");

        $("#download").on('click', function(){

          html2canvas(element, {
            onrendered: function(canvas) {
              var imageData = canvas.toDataURL("image/jpg");
              var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
              $("#download").attr("download", "image.jpg").attr("href", newData);
            }
          });

        });
      });
    </script>
  </body>
</html>
