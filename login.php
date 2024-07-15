<?php
$uname=$_POST['uname'];
$upass=$_POST['upass'];
@$cn=new mysqli('localhost','root','','project');
	
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
$qry="select * from villager where uname='".$uname."'&& pass='".$upass."'";
$rslt=$cn->query($qry);
if($rslt->num_rows!=0)
{       $qry1="Drop table if exists login";
        $rslt1=$cn->query($qry1);
        $qry2="create table login(uname char(50))";
        $rslt2=$cn->query($qry2);
        $qry3="insert into login(uname)values('".$uname."')";
        $rslt3=$cn->query($qry3);
        
        echo "<script>window.location.href='e1.html';</script>";
        echo "<script>alert('LOGIN SUCCESSFULL');</script> ";
        exit;
}
else
{
    echo "<script>alert('Please enter valid password');</script> ";
    echo "<script>window.location.href='login.html';</script>";
    exit;
}
?>