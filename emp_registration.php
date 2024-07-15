<?php
        $fname=$_POST['fname'];
        $cnum=$_POST['cnum'];
        $email=$_POST['email'];
        $qli=$_POST['qli'];
        $dob=$_POST['dob'];
         $month=$_POST['month'];
         $year=$_POST['year'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
         $empid=rand(1000,9999);
         $pass=$fname.rand(10,99);
        @$cn=new mysqli('localhost','root','','project');
	    if($cn->connect_error)
	    {
		    echo "COULD NOT CONNECT";
		    exit;
	    }
	    $qry="select * from emp where email='".$email."'";
	    $rslt=$cn->query($qry);
        if($rslt->num_rows!=0)
	    {
		    echo "<script>alert('Alleredy Applied');</script> ";
            echo "<script>window.location.href='emp_register.html';</script>";
            exit;
	    }
	    else
        {
        
            $qry="insert into emp(fname,email,cnum,qli,address,dob,gender,empid,pass)values('".$fname."','".$email."','".$cnum."','".$qli."','".$address."','".$dob."','".$gender."','".$empid."','".$pass."')";
		    $rslt=$cn->query($qry);
            $subject="Application Approved";
            $body="Dear $fname  your application for employee is approverd.  Your Employee ID is $empid and Password is $pass";
             $sender="From:smartgramapanchayath@gmail.com";
             mail($email,$subject,$body,$sender);
		    echo "<script>alert('Succesfully applied.You will get notified with Employee Id and Password through email after approving your request ');</script> ";
            echo "<script>window.location.href='emp.html';</script>";
            
           
	    }
        if(isset($_POST['can']))
        {
            echo "<script>window.location.href='emp.html';</script>";
        }
	    $cn->close();
    ?>