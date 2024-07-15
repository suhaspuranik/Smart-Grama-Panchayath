<!DOCTYPE html>
<head>
    <title>SMART PANCHAYATH</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<link rel="stylesheet" href="s9.css">
<body>
    <form method="post" action="userl.php">
    <header class="hd">
        <div class="tit">
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
    <?php
@$cn=new mysqli('localhost','root','','sp');
	
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
$qry="select * from register";
$rslt=$cn->query($qry); 
if(($rslt->num_rows)>0)
{
    while ($r = mysqli_fetch_assoc($rslt)) 
    {
        echo "<br><br> NAME           :   ".$r['uname'];
        echo "<br><br> CONTACT NUMBER :   ".$r['cnum'];
        echo "<br><br> EMAIL          :   ".$r['email'];
        echo "<br><br> GENDER         :   ".$r['gender'];
        echo "<br><br> DATE OF BIRTH  :   ".$r['day'],"|".$r['month'],"|".$r['year'];
        echo "<br><br> ADDRESS        :   ".$r['address'];
    }
}
?>
        <div class="ul1">
        <ul>
        <li><a href="#" class="mp"><i class="fa fa-id-badge"></i>  MY PROFILE      </a></li>
        <li><a href="request.html" class="ra"><i class="fa fa-newspaper"></i> APPLICATIONS</a></li>
        <li><a href="#" class="ta"> <i class="fa fa-location"></i>  TRACKING</a></li>
        <li><a href="complaint.html" class="rc"><i class="fa fa-clipboard-list"></i> COMPLAINTS</a></li>
    </ul>
    </div>
    </form>
    </body>
<div class=uname>
</div>
</html>


