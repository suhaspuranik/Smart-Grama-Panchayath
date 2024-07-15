<!DOCTYPE html>
<head>
    <title>SMART PANCHAYATH</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<link rel="stylesheet" href="s6.css">
<body>
    <header class="hd">
        <div class="mm">
            <h1 >SMART GRAMA PANCHAYATH</h1>
        </div>
    <div>
        <nav class="list">
            <ol>
                <li><a href="main.html"><i class="fa fa-home"></i> HOME</a></li>
                <li><a href="about.html"><i class="fa fa-address-card"></i> ABOUT</a></li>
                <li><a href="service.html"><i class="fa fa-circle-info"></i> SERVICE</a></li>
                <li><a href="feedback.html"><i class="fa fa-comment-dots"></i> FEEDBACK</a></li>
                <li><a href="Admin.html"> <i class="fa fa-user"></i> ADMIN</a></li>

            </ol>
        </nav>
    </div>
    </header>
    <div class="mid">
        <div class="mbox">
            <h3> Forgot Password ?!</h3>
        <form method="post" action="forgot.php">
        <input type="email" placeholder="Enter your email" class="inp1" required name="aname"><br>
        <!-- <input type="password" placeholder="Enter Password" class="inp2" required name="apass">  -->
        <!--<div class="lin">OR</div>!-->
       <!---<a href="#" class="fp">Forgot Password?</a>!-->
        <input type="submit" value="Submit" class="sub" name="sub">
        <!--<div><a href="#" class="fp1">Not Have An Account Register Now</a></div>!-->
       <!----<div  class="adm"><a href="login.html">LOGIN AS USER</a></div>!-->
        </div>
    </form>
    </div>
 </body>
 </html>
 <?php


@$cn=new mysqli('localhost','root','','project');
	
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
if(isset($_POST['sub'])){
    $aname=$_POST['aname'];
$qry="select * from villager where email='".$aname."'";
$rslt=$cn->query($qry);
if($rslt->num_rows!=0)
{       $otp=rand(1000,9999);
         $qry1="Drop table if exists otptable";
        $rslt1=$cn->query($qry1);
        $qry2="create table otptable(otp char(50),email char(50))";
        $rslt2=$cn->query($qry2);
        $qry3="insert into otptable(otp,email)values('".$otp."','".$aname."')";
        $rslt3=$cn->query($qry3);
        $subject="Your OTP for Smart Grama Panchayath";
        $body=$otp;
        $sender="From:smartpanchayath@gmail.com";
        mail($aname,$subject,$body,$sender);
        echo "<script>alert('Otp Is Sent to your mail');</script> ";
        echo "<script>window.location.href='otp.html';</script>";
        // echo "<script>alert('LOGIN SUCCESSFULL');</script> ";
        exit;
}
else
{
    echo "<script>alert('Email is not registerd');</script> ";
    echo "<script>window.location.href='forgot.php';</script>";
    exit;
}
}

?>