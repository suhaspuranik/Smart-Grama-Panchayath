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
<link rel="stylesheet" href="s34.css">
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
                <a href="emppage.html" ><i class="fa-solid fa-right-from-bracket"></i> BACK</a></li>

            </ol>
        </nav>
    </div>
    </header>
    <div class="mid">
        <div class="profile-container">
            <div class="profile-picture">
                <img src="pictures/ppp.png" alt="Profile Picture">
            </div>
            <div class="profile-details">
        <?php
            $qry="select empid from elogin ";
            $rslt=$cn->query($qry);
            while($r=$rslt->fetch_assoc()) 
            {
                $empid=$r['empid'];
            }
            $qry2="select * from emp where empid='".$empid."'";
            $rslt2=$cn->query($qry2);
            while($r1=$rslt2->fetch_assoc())
            {
                echo "<table>";
                echo "<tr>";
                echo "<br><th>Emp Id </th><th>".$r1['empid']."</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<br><th>NAME </th><th>".$r1['fname']."</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<br><th>EMAIL </th><th>".$r1['email']."</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<br><th>CONTACT </th><th> ".$r1['cnum']."</th>";
                echo "</tr>";
                echo "<br><th>ADDRESS </th><th>".$r1['address']."</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<br><th>DATE OF BIRTH </th><th>".$r1['dob']."</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<br><th>QUALIFICATION </th><th>".$r1['qli']."</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<br><th>GENDER </th><th>".$r1['gender']."</th>";
                echo "</tr>";
                echo "</table>";
            
            }
        ?>
        <br>
        <form action="eprofileedit.php" method="post">
            <input type="submit" value="EDIT">
        </form>
    </div>


        
<body>