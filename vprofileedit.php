<?php
@$cn=new mysqli('localhost','root','','project');
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
session_start();
?>
<!DOCTYPE html>
<head>
    <title>SMART PANCHAYATH</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<link rel="stylesheet" href="s33.css">
<body>



    <header class="hd">
        <div class="mm">
            <h1 >SMART GRAMA PANCHAYATH</h1>
        </div>
    <div>
        <nav class="list">
            <ol>
                <!-- <li><a href="main.html"><i class="fa fa-home"></i> HOME</a></li>
                <li><a href="about.html"><i class="fa fa-address-card"></i> ABOUT</a></li>
                <li><a href="service.html"><i class="fa fa-circle-info"></i> SERVICE</a></li>
                <li><a href="feedback.html"><i class="fa fa-comment-dots"></i> FEEDBACK</a></li> -->
                <a href="myprofile.php" ><i class="fa-solid fa-right-from-bracket"></i> BACK</a></li>

            </ol>
        </nav>
    </div>
    </header>
    <div class="mid">
        <div class="mbox">
    <?php   
     $qry="select uname from login ";
     $rslt=$cn->query($qry);
     while($r=$rslt->fetch_assoc()) 
     {
         $uname=$r['uname'];
     }
     $qry2="select * from villager where uname='".$uname."'";
     $rslt2=$cn->query($qry2);
     while($r1=$rslt2->fetch_assoc()){ ?>
     <form method="post" action="vprofileedit.php">
                <div class="user-details">
                    <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter your name" value="<?php  echo $r1['fname'] ?>" name="fname">
                </div>
                <!-- <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" placeholder="Enter your username" value="<?php  echo $r1['uname'] ?>" name="euname">
                </div> -->
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" value="<?php  echo $r1['email'] ?>" name="email">
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" placeholder="Enter your number" value="<?php  echo $r1['cnum'] ?>" name="cnum" min="1111111111" max="9999999999">
                </div>
                <!-- <div class="input-box">
                    <span class="details">ADDRESS</span>
                    <input type="text" rows="5" cols="50" placeholder="Enter your ADDRESS" id="myTextarea" value="<?php  $r1['address'] ?>"  name="address"></textarea> -->
                    <!-- <script>
                    // Set the value of the textarea
                    document.getElementById("myTextarea").value = "";

                    // Retrieve the value of the textarea
                    var textareaValue = document.getElementById("myTextarea").value;
                    console.log(textareaValue); // Output: "Hello, world!"
                    </script> -->

                <!-- </div> -->
                <div class="PASSWORD">
                    <span class="PASSWORD-details">Password</span>
                    <input type="text" placeholder="Enter your password" value="<?php  echo $r1['pass'] ?>" name="pass" minlength="8" maxlength="16" pattern="^(?=.*[!@#$%^&*(),.?\:{}|<>])(?=.*\d)(?=.*[a-zA-Z]).{8,}$">
                </div>
                <div class="CPASSWORD">
                    <span class="CPASSWORD-details">Confirm Password</span>
                    <input type="text" placeholder="Confirm your password" value="<?php  echo $r1['cpass'] ?>" name="cpass" minlength="8" maxlength="16">
                </div>
                <div class="button">
                    <input type="submit" name='submit' value="Update">
                </div>
            </form>
     <?php } ?>
    </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        // $euname=$_POST['euname'];
        $cnum=$_POST['cnum'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
    //     $qry="select * from villager where uname='".$euname."'";
    //     $rslt=$cn->query($qry);
    //     if($rslt->num_rows!=0)
    //     {
    //         echo "<script>alert('User name allready exist');</script> ";
    //         echo "<script>window.location.href='vprofileedit.php';</script>";
    //         exit;
    //     }
    // else
    //     {
            if($pass==$cpass)
            {
                $qry="UPDATE `villager` SET `fname`='".$fname."',`pass`='".$pass."',`cpass`='".$cpass."',`email`='".$email."',`cnum`='".$cnum."' WHERE uname='".$uname."'";
                $rslt=$cn->query($qry);
                $subject="Profile Updates";
                $body="Dear $fname  you are successfully updated your profile";
                $sender="From:smartpanchayath@gmail.com";
                mail($email,$subject,$body,$sender);
                echo "<script>alert('Updated succesfully');</script> ";
                echo "<script>window.location.href='myprofile.php';</script>";
            }
            else
            {
                echo "<script>alert('Please Confirme Your Password ');</script> ";
                echo "<script>window.location.href='vprofileedit.php';</script>";
            }
        }
    
    
    $cn->close();
?>
     