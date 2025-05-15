<?php 
include("functions/db.php"); 

$selct_clas = mysqli_query($con,"select * from portalUsers");

$html = "<table><tr><th>Name</th><th>Institute Name</th><th>E-Mail</th><th>Cell</th></tr>";
    while($frms = mysqli_fetch_array($selct_clas)){
        
        $user = $frms['user'];
        $instituteName = $frms['instituteName'];
        $email = $frms['email'];
        $cell = $frms['cell'];   

$html .= "<tr></td><td>$user</td><td>$instituteName</td><td class='text-uppercase'>$email</td><td class='text-uppercase'>$cell</td></tr>";
    }
$html .="</table>";
header('Content-Type:application/xlsx');
header('Content-Desposition:attachment;filename=web-users-list.xlsx');
echo $html;

?>