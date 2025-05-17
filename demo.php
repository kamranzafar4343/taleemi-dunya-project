<?php require_once('functions/db.php');
ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Taleemi Portal | School Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style type="text/css">
    * {
        -webkit-user-select: none;
        /* Safari */
        -ms-user-select: none;
        /* IE 10 and IE 11 */
        user-select: none;
        /* Standard syntax */
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    section {
        padding: 0rem;
        margin: 0rem;
    }

    .clnt-style {
        text-align: center;
        align-items: center;
        vertical-align: middle;
    }

    .nav-link {
        color: black;
        font-size: 0.8rem;
    }

    label {
        color: white;
    }

    .nav-link:hover {
        color: hsl(220, 70%, 20%);
    }

    .text-apna {
        color: hsl(220, 70%, 30%);
    }

    .card {
        padding: 0vh;
        margin: 0vh;
        border: none;
        box-shadow: 0vh 0vh 3vh hsl(0, 0%, 0%);
    }

    .side-styles {
        background-image: linear-gradient(to right, hsl(0, 0%, 0%), hsl(0, 0%, 30%), hsl(0, 0%, 40%));
    }

    .modal-content,
    .form-control,
    .form-select,
    .card,
    .btn {
        border-radius: 0vh;
    }

    .modal-header {
        border-bottom: none;
    }

    .form-control,
    .form-select {
        border: 1px solid hsl(0, 0%, 50%);
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: none;
        border: 1px solid hsl(0, 0%, 50%);
    }

    body,
    .form-control,
    .form-control:focus,
    .form-select {
        background-color: hsl(0, 0%, 15%);
    }

    .modal-content {
        background-color: hsl(0, 0%, 20%);
    }

    .first-panel {
        background-image: linear-gradient(to left, hsl(0, 0%, 0%), hsl(0, 0%, 10%), hsl(0, 0%, 20%), hsl(0, 0%, 40%));
    }

    .btn-outline-apna {
        border: 1px solid hsl(36, 100%, 46%);
        color: hsl(36, 100%, 46%);
    }

    .btn-outline-apna:hover {
        background-color: hsl(36, 100%, 46%);
        color: hsl(0, 0%, 0%);
    }

    .btn-apna {
        background-color: hsl(36, 100%, 46%);
        color: hsl(0, 0%, 20%);
        font-weight: bold;
    }

    .btn-apna:hover {
        background-color: hsl(0, 0%, 10%);
        color: hsl(36, 100%, 46%);
    }

    .text-apna {
        color: hsl(36, 100%, 46%);
    }

    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: hsl(0, 0%, 80%);
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: hsl(0, 0%, 80%);
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: hsl(0, 0%, 80%);
    }
</style>
<script>
    /*
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
 */
</script>

<body>
    <?php
    session_start();
    error_reporting(0);

    if (isset($_POST['login_btn'])) {
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
        $rols = mysqli_real_escape_string($con, strtolower($_POST['rols']));
        $log_query = mysqli_query($con, "select * from confirmSchools where e_mail='$user' && password='$pass' && assign_role='$rols'");
        $count = mysqli_num_rows($log_query);
        if ($count == 1) {

            if (isset($_POST['remember'])) {
                setcookie('user', $user, time() + 60 * 60 * 24 * 365);
                setcookie('pass', $pass, time() + 60 * 60 * 24 * 365);
                setcookie('rols', $rols, time() + 60 * 60 * 24 * 365);
            } else {
                setcookie('user', $user, 30);
                setcookie('pass', $pass, 30);
                setcookie('rols', $rols, 30);
            }
            if ($rols == 'director') {
                $_SESSION['user'] = $user;
                header('location: directors');
                echo "<script>swal.fire('Good Job!', 'Successfully Login!', 'success');</script>";
                ob_end_flush();
            } elseif ($rols == 'admin') {
                $_SESSION['user'] = $user;
                header('location: admin');
                echo "<script>swal.fire('Good Job!', 'Successfully Login!', 'success');</script>";
                ob_end_flush();
            } elseif ($rols == 'principal') {
                $_SESSION['user'] = $user;
                header('location: principal');
                echo "<script>swal.fire('Good Job!', 'Successfully Login!', 'success');</script>";
                ob_end_flush();
            } elseif ($rols == 'accountant') {
                $_SESSION['user'] = $user;
                header('location: accountant');
                echo "<script>swal.fire('Good Job!', 'Successfully Login!', 'success');</script>";
                ob_end_flush();
            } elseif ($rols == 'receptionist') {
                $_SESSION['user'] = $user;
                header('location: receptionist');
                echo "<script>swal.fire('Good Job!', 'Successfully Login!', 'success');</script>";
                ob_end_flush();
            }
        } else {
            echo "<script>swal.fire('Ooops...', 'Username and Password is Wrong!', 'error');</script>";
        }
    }

    $username_cookie = '';
    $password_cookie = '';
    $set_remember = "";
    if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
        $username_cookie = $_COOKIE['user'];
        $password_cookie = $_COOKIE['pass'];
        $rols_cookie = $_COOKIE['rols'];
        $set_remember = "checked='checked'";
    }
    ?>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-xxl-2 offset-xl-2 offset-lg-2 offset-md-2 offset-sm-1 offset-1">
                <div class="card">
                    <div class="row first-panel">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 px-5 pb-4">
                            <div class="text-center p-3">
                                <img src="logo/android-chrome-512x512.png" class="img-fluid" style="width: 50%;" alt="logo">
                                <h3 class="fw-bold mt-3 text-apna text-capitalize">taleemi Portal</h3>
                            </div>
                            <h4 class="fs-6 pb-4 text-center text-white">Please login to your account</h4>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-outline">
                                    <label class="form-label text-white" for="form2Example11">Username</label>
                                    <input type="email" id="form2Example11" name="user" class="form-control mb-1 text-warning" value="<?php echo $username_cookie ?>" placeholder="Phone number or email address" />
                                </div>

                                <div class="form-outline">
                                    <label class="form-label text-white" for="form2Example22">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="myInput" name="pass" class="form-control text-warning" value="<?php echo $password_cookie ?>" placeholder="xxxxxxxxxx" />
                                        <button class="btn btn-apna" type="button">
                                            <label for="eys">
                                                <i class="fa-regular fa-eye"></i>
                                                <input type="checkbox" id="eys" style="display:none;" class="form-check" onclick="myFunction()">
                                            </label>
                                        </button>
                                    </div>
                                </div>
                                <script>
                                    function myFunction() {
                                        var x = document.getElementById("myInput");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                                <div class="form-outline">
                                    <label class="form-label text-white" for="form2Example22">Select login Role</label>
                                    <select class="form-select text-capitalize text-warning" name="rols">
                                        <option>Director</option>
                                        <option>Admin</option>
                                        <option>Principal</option>
                                        <option>Accountant</option>
                                        <option>Receptionist</option>
                                    </select>
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
                                <div class="d-flex">
                                    <div class="flex-fill p-2 text-center">
                                        <a class="nav-link text-white" href="#">Forgot password?</a>
                                    </div>
                                </div>
                                <br><br>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="mb-0 p-2 text-white">Don't have an account?</p>
                                    <button type="button" class="btn btn-outline-apna text-capitalize" data-bs-toggle="modal" data-bs-target="#signup">Create now</button>
                                </div>

                            </form>
                        </div>


                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 side-styles p-5 ">
                            <h3 class="fs-3 fw-bolder text-uppercase text-center text-white">online school management software</h3>
                            <p class="text-white mt-4" align="justify">Demo Account Detail</p><br><br>
                            <table class="table table-responsive w-100" style="background:hsl(36, 100%, 70%);border:1px solid hsl(36, 100%, 40%);">
                                <tr>
                                    <th>Username</th>
                                    <td><input type="text" value="demoadmin@gmail.com" class="form-control text-white" readonly></td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td><input type="text" value="admin123" class="form-control text-white" readonly></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- Modal -->
    <div class="modal fade" id="signup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-white text-uppercase" id="staticBack dropLabel">Signup Form</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                <label class="text-capitalize">Principal Name / Username</label>
                                <input type="hidden" class="form-control" name="usersid" value="<?php echo rand(10, 998778); ?>">
                                <input type="text" class="form-control" placeholder="Enter username" name="users">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                <label class="text-capitalize">Institute Name</label>
                                <input type="text" class="form-control" placeholder="Enter Institute Name" name="instu">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                <label class="text-capitalize">Institue Email</label>
                                <input type="email" class="form-control" placeholder="Enter Institute E-Mail" name="males">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                <label class="text-capitalize">cell</label>
                                <input type="text" class="form-control" placeholder="00" name="cel">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                <label class="text-capitalize">password</label>
                                <input type="password" class="form-control" placeholder="xxxxxxxx" name="paswd">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-apna text-uppercase" name="signup_btn"><i class="fas fa-sign-in"></i> signup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['signup_btn'])) {

                        $usersid = $_POST['usersid'];
                        $users = $_POST['users'];
                        $instu = $_POST['instu'];
                        $males = $_POST['males'];
                        $cel = $_POST['cel'];
                        $paswd = $_POST['paswd'];
                        $imgs = "ready.png";
                        $rols = "admin";

                        $duplicate = mysqli_query($con, "select * from portalUsers where email='$males' || cell='$cel'");
                        if (mysqli_num_rows($duplicate) > 0) {
                            echo "<script>swal.fire('Please Login!', 'You are Already Registerd!', 'info');</script>";
                        } else {
                            $inst_sing = mysqli_query($con, "insert into portalUsers (userId,user,instituteName,email,cell,password,image,role) values('$usersid','$users','$instu','$males','$cel','$paswd','$imgs','$rols')");
                            if ($inst_sing) {
                                echo "<script>swal.fire('Good Job!', 'Successfully Signup!', 'success');</script>";
                            } else {
                                echo "<script>swal.fire('Ooops...', 'Username and Password is Wrong!', 'error');</script>";
                            }
                        }
                    }
                    ?>
                </div>

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