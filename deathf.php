<?php   
        
        @$cn=new mysqli('localhost','root','','project');
	    if($cn->connect_error)
	    {
		    echo "COULD NOT CONNECT";
		    exit;
	    }if(isset($_POST['apply'])){
            
            // $name=$_POST['name'];
            // $relation=$_POST['relation'];
            // $cnum=$_POST['cnum'];
            // $email=$_POST['email'];
            // $address=$_POST['address'];
            $dname=$_POST['dname'];
            $fname=$_POST['fname'];
            $mname=$_POST['mname'];
            // $category=$_POST['category'];
            $dob=$_POST['dob'];
            // $month=$_POST['month'];
            // $year=$_POST['year'];
            $dod=$_POST['dod'];
            // $dmonth=$_POST['dmonth'];
            // $dyear=$_POST['dyear'];
            $gender=$_POST['gender'];
            $time=$_POST['time'];
            $pob=$_POST['pob'];
            $cod=$_POST['cod'];
            $hname=$_POST['hname'];
            $iproof=$_FILES['iproof'];
            // $aproof=$_POST['aproof'];
            $dproof=$_FILES['dproof'];
            $religion=$_POST['religion'];
            $time=$_POST['time'];
            $type='death';
            $application_num=rand(100000,999999);

            $dproof_tmp = $_FILES['dproof']['tmp_name'];
            $dproof = $_FILES['dproof']['name'];
            $dproof_loc='images/'.$dproof;

            $iproof_tmp = $_FILES['iproof']['tmp_name'];
            $iproof = $_FILES['iproof']['name'];
            $iproof_loc='images/'.$iproof;

            $aproof_tmp = $_FILES['aproof']['tmp_name'];
            $aproof = $_FILES['aproof']['name'];
            $aproof_loc='images/'.$aproof;

            
            move_uploaded_file($dproof_tmp,'images/'.$dproof);
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

        $qry="INSERT INTO `application`(`userid`,`type`, `dname`, `fname`,`mname`, `dob`,  `cod`,  `gender`,  `pob`,`pob`, `hname`,`iproof`, `aproof`,`dproof`, `apno`, `religion`,`time`) VALUES ('".$userid."','".$type."','".$dname."','".$fname."','".$mname."','".$dob."','".$dod."','".$gender."','".$pob."','".$cob."','".$hname."','".$iproof_loc."','".$aproof_loc."','".$dproof_loc."','".$application_num."','".$religion."','".$time."')";
		$rslt=$cn->query($qry);
        if($rslt){
        $subject="Application Submited Successfully";
        $body="Dear $name  you are successfully applied for Death Certificate,You application number is $application_num ,You can Track your application using this number" ;
        $sender="From:smartpanchayath@gmail.com";
        mail($email,$subject,$body,$sender);
		echo "<script>alert('Thanks for appling.You may check your application number in your mail');</script> ";
        echo "<script>window.location.href='userl.html';</script>";
	    $cn->close();
        }
        }
    ?>