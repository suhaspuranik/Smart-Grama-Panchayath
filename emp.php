<?php
$empid=$_POST['empid'];
$pass=$_POST['pass'];
@$cn=new mysqli('localhost','root','','project');
	
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
$qry="select * from emp where empid='".$empid."'&& pass='".$pass."'";
$rslt=$cn->query($qry);
if($rslt->num_rows!=0)
{       $qry1="Drop table if exists elogin";
    $rslt1=$cn->query($qry1);
    $qry2="create table elogin(empid int)";
    $rslt2=$cn->query($qry2);
    $qry3="insert into elogin(empid)values('".$empid."')";
    $rslt3=$cn->query($qry3);
     
        echo "<script>alert('LOGIN SUCCESSFULL');</script> ";
        echo "<script>window.location.href='emppage.html';</script>";
        exit;
}
else
{
    echo "<script>alert('Please enter valid password');</script> ";
    echo "<script>window.location.href='emp.html';</script>";
    exit;
}
?>