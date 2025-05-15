 <?php require_once('functions/db.php'); require_once("functions/auth.php"); ob_start(); ?>
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
    <link rel="manifest" href="../logo/site.webmanifest">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Template Main JS File -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js" integrity="sha512-mPA/BA22QPGx1iuaMpZdSsXVsHUTr9OisxHDtdsYj73eDGWG2bTSTLTUOb4TG40JvUyjoTcLF+2srfRchwbodg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
  
   <!-----Google Analytics Code-------->
 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-22KF4X9855"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-22KF4X9855');
</script>
  
</head>
<style type="text/css">
*{
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
  font-size:1.8vh;
}
textarea {
  resize: none;
}
h1, h2, h3, h4, h5, h6, p, section{
padding: 0rem;
margin: 0rem;
}
.card, .form-control, .form-select, .btn, .modal-content{
    border-radius:0vh;
    transition:0.3s;
}
.modal-content, .form-select, .form-control, .form-control:hover, .form-control:focus, .form-select:hover, .form-select:focus{
    background-color:hsl(0,0%,30%);
    color:white;
}
.form-control, .form-select{
    border:1px solid hsla(36, 100%, 46%,0.6);
}
.form-control:hover, .form-control:focus, .form-select:hover, .form-select:focus{
    border:1px solid hsla(36, 100%, 46%,0.6);
    box-shadow:none;
}
label{
    color:white;
}
.nav-link, .nav-links{
    text-decoration:none;
    color:black;
    font-weight:bold;
}
.nav-links{
    display:block;
    font-size:0.6rem;
}
.nav-links:focus, .nav-links:hover{
    color:black;
    background-color:hsl(36, 100%, 46%);
}
.cards:hover{
    background-color:hsl(36, 100%, 46%);
    transform:translateY(5px);
}
.bg-apna{
    background-color:hsla(36, 100%, 46%);
}
.cards img{
    width:50%;
}
.cards h6{
    font-weight:bold;
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
body, .cards, .card{
    background-color:hsl(0,0%,20%);
}
.cards, .card{
    border:1px solid hsla(36, 100%, 46%,0.3);
}
.crud{
    border:none;
}
.hovr:hover{
    background-color:hsl(36, 100%, 35%);
}
.card-img-overlay{
    padding:0px;
    margin:0px;
}
.clock {
    text-transform: uppercase;
    font-family: verdana;
    font-size: 1rem;
    font-weight: 600;
    color: #f5f5f5;
}
.admin-pagination li{
    border:1px solid hsl(40, 100%, 30%);
    background-color:hsl(40, 100%, 50%);
}
.admin-pagination li a:hover{
    background-color:hsl(40, 100%, 65%);
    color:black;
}
.admin-pagination li a{
    display:block;
}
.struck-off-text, .struck-off-text:hover{
    color:hsl(60, 100%, 30%);
    font-weight:bold;
}
.struck-off-back{
    background-color:hsl(60, 100%, 30%);
    font-weight:bold;
}
.struck-off-back:hover{
    background-color:hsl(60, 100%, 40%);
    font-weight:bold;
}
.left-text, .left-text:hover{
    color:hsl(0, 100%, 30%);
    font-weight:bold;
}
.left-back{
    background-color:hsl(0, 100%, 30%);
    color:white;
    font-weight:bold;
}
.left-back:hover{
    background-color:hsl(0, 100%, 40%);
    color:white;
}
.dropdown:hover .dropdown-menu{
    display:block;
}
</style>
<script>
  function isInputNumber(evt){
                
  var ch = String.fromCharCode(evt.which);
  
  if(!(/[0-9]/.test(ch))){
      evt.preventDefault();
  }
}
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
 
/// Resubmission Error Remove 
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    } 
</script>
<body>
 <?php
$users = $_SESSION['user'];
  if($users==true){
      
  }
  else{
    header('Location: index');
  }
$usr = mysqli_query($con,"select * from staffPortal where cell='$users'");
$row = mysqli_fetch_assoc($usr);
$mainid = $row['id'];
$instituteId = $row['instituteId'];
$staffId = $row['staffId'];
$joiningDate = $row['joiningDate'];
$appliedPost = $row['appliedPost'];
$staffType = $row['staffType'];
$maritalStatus = $row['maritalStatus'];
$staffName = $row['staffName'];
$gender = $row['gender'];
$fatherName = $row['fatherName'];
$cnic = $row['cnic'];
$dob = $row['dob'];
$phone = $row['phone'];
$cell = $row['cell'];
$subject = $row['subject'];
$location = $row['location'];
$qualification = $row['qualification'];
$salary = $row['salary'];
$timeIn = $row['timeIn'];
$timeOut = $row['timeOut'];
$facebookAcount = $row['facebookAcount'];
$gmailAcount = $row['gmailAcount'];
$session = $row['session'];
$digitalCard = $row['digitalCard'];
if(!empty($row['staffimage'])){ $staffimage = $row['staffimage']; }else{ $staffimage = "users.jpg"; }
?>
  
