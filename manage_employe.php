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
            <table>
                    <thead>
                        <tr><th colspan="18">EMPLOYEE REQUESTS</th></tr>
                        <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>GENDER</th>
                            <th>CONTACT NUMBER</th>
                            <th>DATE OF BIRTH</th>
                            <th>QUALIFICATION</th>
                            <th>ADDRESS</th>
                            <th >OPERATIONS</th>
                            
                        </tr>
                    </thead>
                     <?php 
                        $qry = "SELECT * FROM  emp where status='pending' ";
                        $result = $cn->query($qry);
                        while($row = mysqli_fetch_array($result))  { ?>
                            <tbody>
                            <tr>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['cnum']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['qli']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                
                                <td>
                                    <form action="manage_employe.php" method="POST">
                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                                        <input type="hidden" name="fname" value="<?php echo $row['fname']; ?>"/>
                                        <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
                                        <input type="submit" class=reject name="delete" value="Reject"> 

                                    </form>
                                </td>
                            </tr>
                            </tbody>
                         <?php } ?>
                    </table>


                    <?php 
                        if(isset($_POST['approve'])){
                            $comment=$_POST['comment'];     
	                        $fname = $_POST['fname'];
                            $email = $_POST['email'];
	                        $select = "UPDATE emp SET status = 'approved' WHERE email = '".$email."' ";
	                        $result = $cn->query($select);
                            if($result)
                            {
                                $empid=rand(1111,9999);
                                $pass=$fname.rand(10,99);
                                $select1 = "UPDATE emp SET empid = '".$empid."' ,pass='".$pass."' WHERE email = '".$email."' ";
	                            $result1 = $cn->query($select1);
                                $subject="You are appointed ";
                                $body="Your Employee Id is $empid and Password is $pass ";
                                $sender="From:smartpanchayath@gmail.com";
                                mail($email,$subject,$body,$sender);
                                echo "<script>alert('Approved successfully');</script>";
                                echo "<script>window.location.href='manage_employe.php';</script>";
                            }
                        }


                        if(isset($_POST['delete'])){

                            $email = $_POST['email'];
                            $select = "UPDATE emp SET status = 'rejected' WHERE email = 'email' ";
                            $result = $cn->query($select);
                            // header("location:emp_manage_application.php");
                            if($result)
                            {
                                $subject="Application Rejected ";
                                $body="Your employee application is rejected";
                                $sender="From:smartpanchayath@gmail.com";
                                mail($email,$subject,$body,$sender);
                                echo "<script>alert('Rejected Succesfully');</script>";
                                echo "<script>window.location.href='manage_employe.php';</script>";
                            }
                        }

                    ?>
                <br><br>
                <!-- <div class="mbox"> -->
                    
                    <table class="table table-bordered col-md-12">
                    <!-- <h3>INCOME CERTIFICATE</h3> -->
                        <thead>
                            <tr><th colspan="10">Employees</tr>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact No</th>
                                <th scope="col">Qualification</th>
                                <th scope="col">Address</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Employee Id</th>
                                <th scope="col">Password</th>
                                <th scope="col">Operation</th>
                                
                            </tr>
                        </thead>
                <!-- </div> -->
                <?php 
                    $qry = "SELECT * FROM  emp where status='approved'";
                    $result = $cn->query($qry);
                    while($row = mysqli_fetch_array($result))  { ?>
                        <tbody>
                            <tr>
                                <td scope="row"><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['cnum']; ?></td>
                                <td><?php echo $row['qli']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['empid']; ?></td>
                                <td><?php echo $row['pass']; ?></td>

                                <td>
                                    <form action="manage_employe.php" method="POST">
                                        <!-- <input type="textarea" name=comment > -->
                                        <input type="hidden" name="id" value="<?php echo $row['empid']; ?>"/>
                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                                        <!-- <input type="submit" class=approve name="update" value="Update"> &nbsp &nbsp <br> -->
                                        <input type="submit" class=reject name="delete" value="Remove"> 

                                    </form>
                                </td>
                            </tr>
        
                        </tbody>
                    <?php } ?>
                </table>


            <?php 
                
        if(isset($_POST['delete'])){

            $id = $_POST['id'];
            $select = "delete from  emp where  empid = '$id' ";
            $result = $cn->query($select);
            if($result)
            {
                     $subject="You have been fired!";
                     $body="Dear sir you have been removed as an employee";
                     $sender="From:smartpanchayath@gmail.com";
                     mail($email,$subject,$body,$sender);
                     echo "<script>alert('Employee removed successfully');</script>";
                     echo "<script>window.location.href='manage_employe.php';</script>";
            }
            // header("location:emp_manage_application.php");
        }

        ?>
        <br><br>
        
        </div>
        </body>
        </html>
