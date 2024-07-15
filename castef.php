<?php
        
        @$cn=new mysqli('localhost','root','','project');
	    if($cn->connect_error)
	    {
		    echo "COULD NOT CONNECT";
		    exit;
	    }
        if(isset($_POST['apply'])){
            
        $name=$_POST['name'];
        $lname=$_POST['lname'];
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        // $dob=$_POST['dob'];
        // $gender=$_POST['gender'];
        $adhar=$_POST['adhar'];
        $category=$_POST['category'];
        // $email=$_POST['email'];
        $caste=$_POST['caste'];
        $iproof=$_FILES['iproof'];
        $aproof=$_FILES['aproof'];
        // $cnum=$_POST['cnum'];
        // $address=$_POST['address'];
        $type='cast';
        $application_num=rand(100000,999999);
        // $qry="select uname from login ";
        // $rslt=$cn->query($qry);
        // while($r=$rslt->fetch_assoc()) 
        // {
        //     $uname=$r['uname'];
        // }
        // $qry2="select * from villager where uname='".$uname."'";
        // $rslt2=$cn->query($qry2);
        $iproof_tmp = $_FILES['iproof']['tmp_name'];
        $iproof = $_FILES['iproof']['name'];
        $iproof_loc='images/'.$iproof;

        $aproof_tmp = $_FILES['aproof']['tmp_name'];
        $aproof = $_FILES['aproof']['name'];
        $aproof_loc='images/'.$aproof;

            
            
        move_uploaded_file($iproof_tmp,'images/'.$iproof);
        move_uploaded_file($aproof_tmp,'images/'.$aproof);
        $qry1="select uname from login";
        $rslt1=$cn->query($qry1);
        while($row=mysqli_fetch_array($rslt1))
        {
            $uname=$row['uname'];
        }
        $qry3="select userid from villager where uname='".$uname."'";
        $rslt3=$cn->query($qry3);
        while($row1=mysqli_fetch_array($rslt3))
        {
            $userid=$row1['userid'];
        }
        $qry4="select email from villager where uname='".$uname."'";
        $rslt4=$cn->query($qry4);
        while($row2=mysqli_fetch_array($rslt4))
        {
            $email=$row2['email'];
        }
    
        $qry="INSERT INTO `application`(`userid`,`type`,`name`, `lname`, `fname`, `mname`, `adhar`,  `cast`, `category`, `iproof`, `aproof`, `apno`) VALUES ('".$userid."','".$type."','".$name."','".$lname."','".$fname."','".$name."','".$adhar."','".$caste."','".$category."','".$iproof_loc."','".$aproof_loc."','".$application_num."')";
		$rslt=$cn->query($qry);
        if($rslt){
        $subject="Application Submited Successfully";
        $body="Dear $name  you are successfully applied for Caste Certificate,You application number is $application_num ,You can Track your application using this number" ;
        $sender="From:smartpanchayath@gmail.com";
        mail($email,$subject,$body,$sender);
		echo "<script>alert('Thanks for appling.You may check your application number in your mail');</script> ";
        echo "<script>window.location.href='userl.html';</script>";
	    $cn->close();
        }
        }
    ?>