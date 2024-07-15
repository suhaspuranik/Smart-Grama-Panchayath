 <?php
        $fname=$_POST['fname'];
        $uname=$_POST['uname'];
        $cnum=$_POST['cnum'];
        $email=$_POST['email'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
        @$cn=new mysqli('localhost','root','','project');
	    if($cn->connect_error)
	    {
		    echo "COULD NOT CONNECT";
		    exit;
	    }
	    $qry="select * from villager where uname='".$uname."'";
	    $rslt=$cn->query($qry);
        if($rslt->num_rows!=0)
	    {
		    echo "<script>alert('User name allready exists');</script> ";
            echo "<script>window.location.href='register.html';</script>";
            exit;
	    }
	    else
        {
            if($pass==$cpass)
            {
               
            $qry=" INSERT INTO `villager`(`uname`, `fname`, `gender`, `address`, `pass`, `cpass`, `email`, `cnum`, `dob`) VALUES ('".$uname."','".$fname."','".$gender."','".$address."','".$pass."','".$cpass."','".$email."','".$cnum."','".$dob."')";
		    $rslt=$cn->query($qry);
            $subject="Registration Successfull";
            $body="Dear $fname  you are successfully created your account \n Now you may login using user name and password and enjoy the features of Smart Grama Panchayath";
            $sender="From:smartpanchayath@gmail.com";
            mail($email,$subject,$body,$sender);
		    echo "<script>alert('Account Registered');</script> ";
            echo "<script>window.location.href='login.html';</script>";
            }
            else
            {
                echo "<script>alert('Please Confirme Your Password ');</script> ";
                echo "<script>window.location.href='register.html';</script>";
            }
	    }
        if(isset($_POST['can']))
        {
            echo "<script>window.location.href='login.html';</script>";
        }
	    $cn->close();
    ?>