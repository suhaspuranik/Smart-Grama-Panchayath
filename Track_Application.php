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
<link rel="stylesheet" href="s22.css">
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
                <a href="userl.html" ><i class="fa-solid fa-right-from-bracket"></i> BACK</a></li>

            </ol>
        </nav>
    </div>
    </header>
    <div class="mid">
    <div class="Basic-info">
        <?php
        // if(isset($_POST['search'])){
            $apno=$_POST['apno'];
            $type=$_POST['type'];
            $qry1="select apno from application where apno='".$apno."'";
             $rslt = $cn->query($qry1);
             if($rslt->num_rows!=0){
                $qry="select * from application where apno='".$apno."'and type='".$type."' ";
                
                    $rslt1=$cn->query($qry);
                    if($rslt1){
                    while($r=$rslt1->fetch_assoc()) 
                    {
                         $status=$r['status'];
                        if($status=='approved'){
                            echo "Your Application is approved by the panchayath you may download !";
                            ?>
                            <form method="post" action="index.php">
                            <div class="butto">
                            <input type="hidden" value="<?php echo $apno ?>" name=apno>
                            <input type="submit" value="Download" class="button4">
                            </div>
                            </form>
                            <?php
                        }
                        else{
                            echo "Your application is  " .$status;
                        }
                    }  
                }
                else
                {
                    echo "Application Number not found ";
                }
            }
            else
            {
                echo "Application Number not found ";
            }
          ?>
           </div>
    </div>
</body>
</html>
    