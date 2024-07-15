<?php
@$cn=new mysqli('localhost','root','','project');
	
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
$o1=$_POST['o1'];
    $o2=$_POST['o2'];
    $o3=$_POST['o3'];
    $o4=$_POST['o4'];
if(isset($_POST['osub'])){
    
    $uotp=$o1.$o2.$o3.$o4;
    
        $qry="select otp,email from otptable ";
        $rslt=$cn->query($qry);
            while($r=$rslt->fetch_assoc()) 
            {
                $otp=$r['otp'];
                $email=$r['email'];
            }
    if($otp==$uotp){
        $qry="select pass from villager where email='".$email."' ";
        $rslt=$cn->query($qry);
        while($row = mysqli_fetch_array($rslt)) 
            {
                $pass=$row['pass'];
            }
            $subject="Password Recovery!";
            $body="Your password is $pass 
        NOTE : Please reset the password in profile page immidiately after logining ";
        $sender="From:smartpanchayath@gmail.com";
        mail($email,$subject,$body,$sender);
        echo "<script>alert('Your Password is sent to your email');</script> ";
        echo "<script>window.location.href='forgot.php';</script>";
    }
    else{
        echo "<script>alert('Incorrect OTP');</script> ";
        echo "<script>window.location.href='otp.html';</script>";
    }
}
?>