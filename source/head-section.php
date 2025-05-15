 <?php require_once('functions/db.php'); require_once("functions/auth.php"); ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>School Management System | Taleemi Portal</title>
    <meta name="Keywords" content="lms, learning, education, learning management system, School Management System">
    <meta name="description" content="The study of education focuses on instructional strategies used in classrooms or other educational settings, as opposed to other informal and non-formal forms of socialisation (such as parent-child connections and rural development initiatives).Taleemi Dunya offers a cutting-edge system for managing educational institutions that combines a contemporary user interface and functions. Find Free Educational Software.">
    <meta name="author" content="Taleemi Dunya">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="snippet">
    <meta name="google" content="sitelinkssearchbox">
    <meta name="googlebot" content="translate">
    <meta name="google" content="pagereadaloud">
    <meta name="google-site-verification" content="...">
    <meta name="robots" content="max-image-preview:standard">
    <meta http-equiv="Content-Type" content="...; charset=...">
    <meta charset="...">
    <meta name="rating" content="RTA-5042-1996-1400-1577-RTA">
    <link rel="canonical" href="https://portal.taleemidunya.com/"/>
    
    <meta property="og:image" content="https://portal.taleemidunya.com/logo/android-chrome-512x512.png"/>
        <meta property="og:image:width" content="100" />
        <meta property="og:image:height" content="100" />
        <meta property="og:site_name" content="portal.taleemidunya.com" />
        <meta property="og:url" content="https://portal.taleemidunya.com/" />
        <meta property="og:description" content="The study of education focuses on instructional strategies used in classrooms or other educational settings, as opposed to other informal and non-formal forms of socialisation (such as parent-child connections and rural development initiatives).Taleemi Dunya offers a cutting-edge system for managing educational institutions that combines a contemporary user interface and functions. Find Free Educational Software." />
        <meta property="og:title" content="Pakistan Education News Colleges Scholarship Result Admission Jobs and Complete Education Management System. | Taleemi Dunya" />
        <meta property="og:type" content="website">
        <link rel="canonical" href="https://portal.taleemidunya.com/"/>
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="taleemi portal">
        <meta name="twitter:image" content="https://portal.taleemidunya.com/logo/android-chrome-512x512.png">
        <meta name="twitter:title" content="Pakistan Education News Colleges Scholarship Result Admission Jobs and Complete Education Management System. | Taleemi Dunya">
        <meta name="twitter:description" content="The study of education focuses on instructional strategies used in classrooms or other educational settings, as opposed to other informal and non-formal forms of socialisation (such as parent-child connections and rural development initiatives).Taleemi Dunya offers a cutting-edge system for managing educational institutions that combines a contemporary user interface and functions. Find Free Educational Software.">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Taleemi Portal",
  "alternateName": "Taleemi Dunya",
  "url": "https://portal.taleemidunya.com/",
  "logo": "https://portal.taleemidunya.com/logo/android-chrome-512x512.png",
  "sameAs": [
    "https://www.facebook.com/taleemidunyaofficial",
    "",
    "https://www.youtube.com/@taleemidunyaofficial",
    "https://www.pinterest.com.au/taleemidunyaofficial/",
    "https://portal.taleemidunya.com/"
  ]
}
</script>

 
 
  <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="logo/favicon-16x16.png">
    <link rel="manifest" href="logo/site.webmanifest">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="source/chosen.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="talimi-assets/css/virtual-select.min.css" type="text/css" media="all">
<script src="talimi-assets/js/virtual-select.min.js" type="text/javascript"></script>
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
  font-size:1.7vh;
}
.textarea-none {
  resize: none;
}
h1, h2, h3, h4, h5, h6, p, section{
padding: 0rem;
margin: 0rem;
}
.card, .form-control, .btn, .modal-content,.form-select{
    border-radius:0vh;
    transition:0.3s;
}
.modal-content, .form-control, .form-control:hover, .form-control:focus, .form-select, .form-select:hover, .form-select:focus{
    background-color:hsl(0,0%,17%);
    color:white;
}
.form-control, .form-select{
    border:1px solid hsl(0,0%,23%);
}
.form-control:hover, .form-control:focus, .form-select:hover, .form-select:focus {
    border:1px solid hsl(0,0%,40%);
    box-shadow:none;
}
label{
    color:white;
    font-size:0.85rem;
}
.nav-link, .nav-links{
    text-decoration:none;
    color:black;
    font-weight:bold;
}
.box{
    height:16vh;
}
.nav-links{
    display:block;
}
.nav-links:focus, .nav-links:hover{
    color:black;
    background-color:hsl(36, 100%, 46%);
}
.cards:hover{
    background-color:hsl(36, 100%, 46%);
    transform:translateY(5px);
}
.cards img{
    width:50%;
}
.cards h6{
    font-weight:bold;
}
.btn-apna{
    background-color:hsl(36,100%,40%);
    color:hsl(0,0%,0%);
    font-weight:bold;
}
.btn-apna:hover{
    background-color:hsl(36,100%,50%);
    color:black;
}
body, .cards, .card{
    background-color:hsl(0,0%,10%);
}
.cards, .card{
    border:1px solid hsl(0,0%,20%);
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
    font-size:0.7rem;
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
.table-font-size, .table-font-size tr th, .table-font-size tr td{
    font-size:1rem;
}
table, .table, .table-responsive, .table-responsive tr th, .table-responsive tr td, .table tr th, .table tr td, .table-responsive tr, .table tr{
    border:none;
    box-shadow:none;
    border-bottom:none;
} 
.dropdown-menu{
    border-radius:0px;
}
.bg-apna{ background-color:hsl(36,100%,40%); }
.bg-apna-body{ background-color:hsl(36,100%,80%); }
.border-apna{ border:1px solid hsl(0,0%,0%); }

 @media print {
        body {  
          font-size: 12px;
        }
    }
.whts{ 
    position: fixed;
    z-index:1;
    cursor:pointer;
    margin:30rem 0rem 0rem 0rem;
    text-align:right;
}
.whts img{ width:50px; height:50px; border-radius:50%; }
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

//// one field value write equal to another field 
$(document).ready(function(){
    $(".ides").keyup(function(){
var stp = $(".ides").val();
if(parseInt($(".ids").val()) < parseInt($(".ides").val())){
$('.ides').val("");
}
    });
});

//// table data 
$(document).ready(function(){
    $("#allstudents").DataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
});
</script>
<body>
 <?php
$users = $_SESSION['user'];
  if($users==true){
      
  }
  else{
    header('Location: index');
  }
$usr = mysqli_query($con,"select * from confirmSchools where e_mail='$users'");
$row = mysqli_fetch_assoc($usr);
$mainid = $row['id'];
$userId = $row['institute_id'];
$user = $row['owner_name'];
$joining_date = $row['joining_date'];
$de_activation_date = $row['de_activation_date'];
$account_type = $row['account_type'];
$strength = $row['strength'];
$plan = $row['plan'];
$instituteName = $row['institute_name'];
$campus = $row['campus'];
$type = $row['type'];
$email = $row['e_mail'];
$mainphones = $row['phone'];
$mainaddress = $row['address'];
$decieded_payment = $row['decieded_payment'];
$receive_payment = $row['receive_payment'];
$balance = $row['balance'];
$payment_reference = $row['payment_reference'];
$attach_receipt = $row['attach_receipt'];
$remarks = $row['remarks'];
$status = $row['status'];
$cell = $row['cell'];
$password = $row['password'];
$image = $row['logo'];
$role = $row['assign_role'];
$bank_account = $row['account_detail'];
?>