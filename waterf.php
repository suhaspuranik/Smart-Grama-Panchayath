<?php
    error_reporting(E_ERROR | E_PARSE);

         $name=$_POST['name'];
        // $cname=$_POST['cname'];
        // $email=$_POST['email'];
        // $address=$_POST['address'];
        // $paddress=$_POST['paddress'];
        // $pid=$_POST['pid'];
        // $ctype=$_POST['ctype'];
        // $work=$_POST['work'];
        // $cfor=$_POST['cfor'];
        // $iproof=$_POST['iproof'];
        // $aproof=$_POST['aproof'];
        // $hproof=$_POST['hproof'];
        // $type='water';
        $paddress=$_POST['paddress'];
        $pid=$_POST['pid'];
        $ctype=$_POST['ctype'];
        $work=$_POST['work'];
        $cfor=$_POST['cfor'];
        $hproof=$_FILES['hproof'];
        $iproof=$_FILES['iproof'];
        $aproof=$_FILES['aproof'];
        $type='water';
        $application_num=rand(1000000,9999999);
        // $application_num=rand(1000000,9999999);
        @$cn=new mysqli('localhost','root','','project');
	    if($cn->connect_error)
	    {
		    echo "COULD NOT CONNECT";
		    exit;
	    }
        if(isset($_POST['apply'])){
            

            $hproof_tmp = $_FILES['hproof']['tmp_name'];
            $hproof = $_FILES['hproof']['name'];
            $hproof_loc='images/'.$hproof;

            $iproof_tmp = $_FILES['iproof']['tmp_name'];
            $iproof = $_FILES['iproof']['name'];
            $iproof_loc='images/'.$iproof;

            $aproof_tmp = $_FILES['aproof']['tmp_name'];
            $aproof = $_FILES['aproof']['name'];
            $aproof_loc='images/'.$aproof;

            
            move_uploaded_file($hproof_tmp,'images/'.$hproof);
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
        // $qry="select uname from login ";
        // $rslt=$cn->query($qry);
        // while($r=$rslt->fetch_assoc()) 
        // {
        //     $uname=$r['uname'];
        // }
        // $qry2="select * from villager where uname='".$uname."'";
        // $rslt2=$cn->query($qry2);
        $qry="INSERT INTO `application`(`userid`,`type`,`name`, `pid`,`paddress`,`ctype`, `work`, `cfor`,`iproof`, `aproof`, `hproof`, `apno`) VALUES ('".$userid."','".$type."','".$name."','".$pid."','".$paddress."','".$ctype."','".$work."','".$cfor."','".$iproof_loc."','".$aproof_loc."','".$hproof_loc."','".$application_num."')";
		$rslt=$cn->query($qry);
        $subject="Application Submited Successfully";
        $body="Dear $name  you are successfully applied for water connection ,You application number is $application_num ,You can Track your application using this number" ;
        $sender="From:smartpanchayath@gmail.com";
        mail($email,$subject,$body,$sender);
		echo "<script>alert('Thanks for appling.You may check your application number in your mail');</script> ";
        echo "<script>window.location.href='userl.html';</script>";
	    $cn->close();
        }
    ?>