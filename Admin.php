<?php
$aname=$_POST['aname'];
$apass=$_POST['apass'];

$name="admin";
$pass="admin@123";

if($name==$aname && $pass==$apass)
{
    echo "<script>alert('Login Succesfull');</script> ";
    echo "<script>window.location.href='adminpage.html';</script>";
    exit;
}
else
{
    echo "<script>alert('Please Enter Valid name or password');</script> ";
    echo "<script>window.location.href='Admin.html';</script>";
    exit;
}