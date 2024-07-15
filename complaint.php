<?php
@$cn=new mysqli('localhost','root','','project');
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}

$qry="select * from complaint";
$rslt=$cn->query($qry);
$comp=$_POST['comp'];
if(isset($_POST['snd']))
{
    $qry1="select uname from login";
            $rslt1=$cn->query($qry1);
            while($row=mysqli_fetch_array($rslt1))
            {
                $uname=$row['uname'];
            }
            $qry3="select * from villager where uname='".$uname."'";
            $rslt3=$cn->query($qry3);
            while($row1=mysqli_fetch_array($rslt3))
            {
                $userid=$row1['userid'];
                $email=$row1['email'];
            }
$qry = "INSERT INTO `complaint`(`userid`,`email`,`comp`) VALUES ('".$userid."','".$email."','".$comp."')";
$result = $cn->query($qry);
if($result)
{
    echo "<script>alert('Thank You for raising complaint.You will get response soon');</script> ";
    echo "<script>window.location.href='complaint.html';</script>";
}
}