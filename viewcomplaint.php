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
<link rel="stylesheet" href="s24.css">
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
                    <a href="adminpage.html" > <i class="fa-solid fa-right-from-bracket"></i> BACK</a></li>
                </ol>
            </nav>
        </div>
    </header>
    <div class="mid">
        <!-- <div class="mbox"> -->
            
            <table class="table table-bordered col-md-12">
            <!-- <h3>INCOME CERTIFICATE</h3> -->
                <thead>
                    <tr><th colspan="10">COMPLAINTS</tr>
                    <tr>
                        <th scope="col">COMPLAINT</th>
	                    <th scope="col">RESPONSE</th>
                        <th scope="col">OPERATION</th>
                        </tr>
                </thead>
        <!-- </div> -->
        <?php 

            $qry = "SELECT * FROM  complaint where status='pending' ";
            $result = $cn->query($qry);

            while($row = mysqli_fetch_array($result))  { ?>
                <tbody>
                <form action="viewcomplaint.php" method="POST">
                    <tr>
                        <td><?php echo $row['comp']; ?></td>
                        <td>
                            <input type="hidden" name="comp" value="<?php echo $row['comp']; ?>"/>
                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                                <textarea rows=3 cols=15   name=reply > </textarea>
                            
                        </td>
                        <td><input type="submit" class=approve name="send" value="Send"> &nbsp &nbsp <br></td>
                </form>
                </tr>
   
                </tbody>
            <?php } ?>
        </table>
        <?php
            if(isset($_POST['send'])){
                // $comment=$_POST['comment'];     
                $comp = $_POST['comp'];
                $reply = $_POST['reply'];
                // $qry="select * from complaint where comp='".$comp."'";
                // $rslt=$cn->query($qry);
                // while($r=$rslt->fetch_assoc()) 
                // {
                  
                //     $email=$r['email'];
                    
                // }
                $email = $_POST['email'];
                $select = "UPDATE `complaint` SET `reply`='".$reply."',status='replied' WHERE comp='".$comp."'";
                $result = $cn->query($select);
                if($result)
                {
                $subject="You Got a Reply for your complaint!! ";
                $body="$reply";
                $sender="From:smartpanchayath@gmail.com";
                mail($email,$subject,$body,$sender);

                echo "<script>alert('Replied Successfully');</script>";
                echo "<script>window.location.href='viewcomplaint.php';</script>";
            }
        }
        
    