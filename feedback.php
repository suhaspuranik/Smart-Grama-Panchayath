<?php
$name=$_POST['name'];
$cnum=$_POST['cnum'];
$email=$_POST['email'];
$feedback=$_POST['feedback'];
@$cn=new mysqli('localhost','root','','project');
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
session_start();
$qry="INSERT INTO `feedback`(`name`, `email`, `cnum`, `feedback`) VALUES ('".$name."','".$email."','".$cnum."','".$feedback."')";
$rslt=$cn->query($qry);
if($rslt){
echo "<script>alert('Thanks for your valuable feedback');</script> ";
echo "<script>window.location.href='feedback.html';</script>";
}
?>