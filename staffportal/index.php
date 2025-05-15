<?php require_once('functions/db.php'); ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Taleemi Portal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../logo/favicon-16x16.png">
    <link rel="manifest" href="logo/site.webmanifest">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style type="text/css">
*{
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
}
h1, h2, h3, h4, h5, h6, p, section{
padding: 0rem;
margin: 0rem;
}
.clnt-style{
	text-align: center;
	align-items: center;
	vertical-align: middle;
}
.nav-link{
    color:black;
    font-size:0.8rem;
}
label{
    color:white;
}
.nav-link:hover{
    color:hsl(220,70%,20%);
}
.text-apna{
    color:hsl(220,70%,30%);
}
.card{
    padding:0vh;
    margin:0vh;
    border:none;
    box-shadow:0vh 0vh 3vh hsl(0,0%,0%);
}
.side-styles{
    background-image:linear-gradient(to right, hsl(0,0%,0%), hsl(0,0%,30%), hsl(0,0%,40%));
}
.modal-content, .form-control, .card, .btn{
    border-radius:0vh;
}
.modal-header{
    border-bottom:none;
}
.form-control{
    border:1px solid hsla(36, 100%, 46%,0.7);
}
.form-control:focus{
    box-shadow:none;
    border:1px solid hsla(36, 100%, 46%,0.7);
}
.form-control,.form-control:focus{
    background-color:hsl(0,0%,40%);
}
body{
    background-color:hsl(0,0%,0%);
}
.modal-content{
    background-color:hsl(0,0%,20%);
}
.first-panel{
    background-color:hsl(0,0%,20%);
    border:2px solid hsla(36, 100%, 46%,0.8);
}
.btn-outline-apna{
    border:1px solid hsl(36, 100%, 46%);
    color:hsl(36, 100%, 46%);
}
.btn-outline-apna:hover{
    background-color:hsl(36, 100%, 46%);
    color:hsl(0, 0%, 0%);
}
.btn-apna{
    background-color:hsl(36, 100%, 46%);
    color:hsl(0,0%,20%);
    font-weight:bold;
}
.btn-apna:hover{
    background-color:hsl(0,0%,10%);
    color:hsl(36, 100%, 46%);
}
.text-apna{
    color:hsl(36, 100%, 46%);
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: hsl(0,0%,80%);
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: hsl(0,0%,80%);
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: hsl(0,0%,80%);
}
</style>
<script>
   document.addEventListener('contextmenu', event => event.preventDefault());
   document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    }      
 }
</script>
<body>
<?php
session_start();
error_reporting(0);

if (isset($_POST['login_btn'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
$log_query = mysqli_query($con,"select * from staffPortal where cell='$user' && cnic='$pass'");
$count = mysqli_num_rows($log_query);
if ($count == 1){
    
    if(isset($_POST['remember'])){
			setcookie('user',$user,time()+60*60*24*365);
			setcookie('pass',$pass,time()+60*60*24*365);
		}else{
			setcookie('user',$user,30);
			setcookie('pass',$pass,30);
		}
		
$_SESSION['user'] = $user;
header('location: home');
echo "<script>swal.fire('Good Job!', 'Successfully Login!', 'success');</script>";
ob_end_flush();
}else{
echo "<script>swal.fire('Ooops...', 'Username and Password is Wrong!', 'error');</script>";
}

}

$username_cookie='';
$password_cookie='';
$set_remember="";
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
	$username_cookie=$_COOKIE['user'];
	$password_cookie=$_COOKIE['pass'];
	$set_remember="checked='checked'";
}
?>
<br><br><br>
<div class="container-fluid mt-4">
                <div class="row">
<div class="col-10 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4 px-5 pb-4 first-panel offset-1 offset-xxl-4 offset-xl-4 offset-lg-3 offset-md-3">
<div class="text-center p-3">
      <h1 class="fw-bold fs-1 mt-3 text-apna text-uppercase">teacher Portal</h1>
</div>
<div class="pb-4 text-center text-white text-capitalize" style="font-size:0.6rem;">Dear teachers Please Login Your Portal.</div>
<form method="post" enctype="multipart/form-data">
  <div class="form-outline mb-3">
      <label class="form-label text-white" for="form2Example11">Username</label>
    <input type="text" id="form2Example11" name="user" class="form-control mb-1 text-warning" value="<?php echo $username_cookie?>" placeholder="Enter Your Username" />
  </div>

  <div class="form-outline mb-3">
      <label class="form-label text-white" for="form2Example22">Password</label>
    <input type="password" id="form2Example22" name="pass" class="form-control text-warning" placeholder="xxxxxxxxxx" value="<?php echo $password_cookie?>"/>
  </div>
  <div class="form-outline">
      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
  </div>

  <div align="right" class="d-flex">
      <div class="p-2 flex-fill">
<div class="d-grid">
<button class="btn btn-apna btn-block fa-lg gradient-custom-2 mb-2" name="login_btn" type="submit"><i class="fa fa-sign-in"></i> Log
      in</button>    
</div>
      </div>
  </div>

</form>
                    </div>
                </div>
    
</div>
<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Template Main JS File -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>


