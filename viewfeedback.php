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
<link rel="stylesheet" href="e3.css">
<body>
    <header class="hd">
        <div class="mm">
            <h1 >SMART GRAMA PANCHAYATH</h1>
        </div>
        <div>
            <nav class="list">
                <ol>
                    <a href="adminpage.html" > <i class="fa-solid fa-right-from-bracket"></i> BACK</a></li>
                </ol>
            </nav>
        </div>
    </header>
    <div class="mid">
    <table class="feedback-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $qry = "SELECT * FROM  feedback";
             $result = $cn->query($qry);
             while($row = mysqli_fetch_array($result))  { ?>
                            <tr>
                                <td ><?php echo $row['name']; ?></td>
                                <td><?php echo $row['cnum']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['feedback']; ?></td>
             </tr>
        </tbody>
        <?php } ?>
    </table>
    </div>
</body>
</html>