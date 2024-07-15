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
<link rel="stylesheet" href="e1.css">
<body>
    <header class="hd">
        <div class="mm">
            <h1 >SMART GRAMA PANCHAYATH</h1>
        </div>
        <div>
            <nav class="list">
                <ol>
                    <a href="emppage.html" > <i class="fa-solid fa-right-from-bracket"></i> BACK</a></li>
                </ol>
            </nav>
        </div>
    </header>
    <div class="mid">
                    <table>
                    <thead>
                        <tr><th colspan="18">INCOME CERTIFICATE</th></tr>
                        <tr>
                            <th>APPLICATION NUMBER</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <!-- <th>FATHERS NAME</th>
                            <th>MOTHERS NAME</th> -->
                            <!-- <th>CAST</th>
                            <th>ADHAR NO</th> -->
                            <th>DATE OF BIRTH</th>
                            <th>GENDER</th>
                            <th>CONTACT NO</th>
                            <th>EMAIL</th>
                            <th>ADDRESS</th>
                            <!-- <th>FATHERS OCCUPATION</th>
                            <th>MOTHERS OCCUPATION</th>
                            <th>INCOME</th>
                            <th>ID PROOF</th>
                            <th >ADDRESS PROOFs</th> -->
                            <th >OPERATIONS</th>
                            
                        </tr>
                    </thead>
                     <?php 
                        $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
                        $result = $cn->query($qry);
    
                        while($row = mysqli_fetch_array($result))  {
                            if($row['type']=='income' && $row['status']=='pending'){ ?>
                            <tbody>
                            <tr>
                                <td ><?php echo $row['apno']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['lname']; ?></td>
                                <!-- <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['mname']; ?></td> -->
                                <!-- <td><?php echo $row['cast']; ?></td>
                                <td><?php echo $row['adhar']; ?></td> -->
                                <td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['cnum']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <!-- <td><?php echo $row['foccupation']; ?></td>
                                <td><?php echo $row['moccupation']; ?></td> -->
                                <!-- <td><?php echo $row['income']; ?></td> -->
                                <!-- <td><?php echo $row['iproof']; ?></td> -->
                                <!-- <td><?php echo $row['aproof']; ?></td> -->
                                <td>
                                    <form action="emp_manage_application.php" method="POST">
                                        <input type="textarea" name=comment >
                                        <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                                        <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
                                        <input type="submit" class=reject name="delete" value="Reject"> 

                                    </form>
                                </td>
                            </tr>
                            </tbody>
                         <?php } }?>
                    </table>


                    <?php 
                        if(isset($_POST['approve'])){
                            $comment=$_POST['comment'];     
	                        $id = $_POST['id'];
                            $email = $_POST['email'];
	                        $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
	                        $result = $cn->query($select);
                            if($result)
                            {
                                $subject="Application status ";
                                $body="Dear sir your application is $comment";
                                $sender="From:smartpanchayath@gmail.com";
                                mail($email,$subject,$body,$sender);
                                echo "<script>alert('Approved successfully');</script>";
                                echo "<script>window.location.href='emp_manage_application.php';</script>";
                            }
                        }


                        if(isset($_POST['delete'])){

                            $id = $_POST['id'];
                            $select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
                            $result = $cn->query($select);
                            // header("location:emp_manage_application.php");
                            if($result)
                            {
                                $subject="Application status ";
                                $body="Dear sir your application is $comment";
                                $sender="From:smartpanchayath@gmail.com";
                                mail($email,$subject,$body,$sender);
                                echo "<script>alert('Rejected Succesfully');</script>";
                                echo "<script>window.location.href='emp_manage_application.php';</script>";
                            }
                        }

                    ?>
 <br><br>

    
  <table>
            <!-- <h3>INCOME CERTIFICATE</h3> -->
                <thead>
                    <tr><th colspan="18">CASTE CERTIFICATE</tr>
                    <tr>
                        <th >APPLICATION NUMBER</th>
	                    <th >FIRST NAME</th>
	                    <th>LAST NAME</th>
	                    <th>FATHERS NAME</th>
	                    <th>MOTHERS NAME</th>
                        <!-- <th >ADHAR NO</th> -->
                        <th >DATE OF BIRTH</th>
                        <th>GENDER</th>
                        <th >CONTACT NO</th>
                        <th >EMAIL</th>
                        <th>ADDRESS</th>
                        <!-- <th >CAST</th>
                        <th >CATEGORY</th>
                        <th >ID PROOF</th>
                        <th >ADDRESS PROOFs</th> -->
                        <th >OPERATIONS</th>
                        
                    </tr>
                </thead>
        <!-- </div> -->
        <?php 
            $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
            $result = $cn->query($qry);
            while($row = mysqli_fetch_array($result))  { 
                if($row['type']=='cast' && $row['status']=='pending'){ ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['apno']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['mname']; ?></td>
                        <!-- <td><?php echo $row['adhar']; ?></td> -->
                        <td><?php echo $row['dob'] ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['cnum']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <!-- <td><?php echo $row['cast']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['iproof']; ?></td>
                        <td><?php echo $row['aproof']; ?></td> -->
                        <td>
		                    <form action="emp_manage_application.php" method="POST">
                                <input type="textarea" name=comment >
		                        <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
		                        <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
		                        <input type="submit" class=reject name="delete" value="Reject"> 

		                    </form>
                        </td>
                    </tr>
   
                </tbody>
            <?php } }?>
        </table>


    <?php 
        if(isset($_POST['approve'])){
        $comment=$_POST['comment'];     
	    $id = $_POST['id'];
        $email = $_POST['email'];

	    $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
	    $result = $cn->query($select);
        if($result)
        {
            $subject="Application status ";
            $body="Dear sir your application is $comment";
            $sender="From:smartpanchayath@gmail.com";
            mail($email,$subject,$body,$sender);
            echo "<script>alert('Approved successfully');</script>"; 
            echo "<script>window.location.href='emp_manage_application.php';</script>";
        }
	    // header("location:emp_manage_application.php");
        }


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
	$result = $cn->query($select);
	// header("location:emp_manage_application.php");
    if($result)
    {
        $subject="Application status ";
        $body="Dear sir your application is $comment";
        $sender="From:smartpanchayath@gmail.com";
        mail($email,$subject,$body,$sender);
        echo "<script>alert('Rejected successfully');</script>";
        echo "<script>window.location.href='emp_manage_application.php';</script>";
    }
}
        
 ?>
 <br><br>

  <table>
            <!-- <h3>INCOME CERTIFICATE</h3> -->
                <thead>
                    <tr><th colspan="18">BIRTH CERTIFICATE</tr>
                    <tr>
                        <th >APPLICATION NUMBER</th>
	                    <th >CHILD NAME</th>
	                    <th>FATHERS NAME</th>
	                    <th>MOTHERS NAME</th>
                        <th>RELIGION</th>
                        <!-- <th>DATE OF BIRTH</th>
                        <th scope="col">TIME OF BIRTH</th> -->
                        <th scope="col">GENDER</th>
                        <th scope="col">CONTACT NO</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ADDRESS</th>
                        <!-- <th scope="col">PLACE OF BIRTH</th>
                        <th scope="col">HOSIPITAL NAME</th>
                        <th scope="col">ID PROOF</th>
                        <th scope="col">ADDRESS PROOFs</th>
                        <th scope="col">HOSIPITAL PROOFs</th> -->
                        <th scope="col">OPERATIONS</th>
                        
                    </tr>
                </thead>
        <!-- </div> -->
        <?php 
            $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
            $result = $cn->query($qry);
            while($row = mysqli_fetch_array($result))  {
                if($row['type']=='birth' && $row['status']=='pending'){ ?>
                <tbody>
                    <tr>
                        <td scope="row"><?php echo $row['apno']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['mname']; ?></td>
                        <td><?php echo $row['religion']; ?></td>
                        <!-- <td><?php echo $row['day'].$row['month'].$row['year']; ?></td>
                        <td><?php echo $row['time']; ?></td> -->
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['cnum']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <!-- <td><?php echo $row['pob']; ?></td>
                        <td><?php echo $row['hname']; ?></td>
                        <td><?php echo $row['iproof']; ?></td>
                        <td><?php echo $row['aproof']; ?></td>
                        <td><?php echo $row['hproof']; ?></td> -->
                        <td>
		                    <form action="emp_manage_application.php" method="POST">
                                <input type="textarea" name=comment >
		                        <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
		                        <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
		                        <input type="submit" class=reject name="delete" value="Reject"> 

		                    </form>
                        </td>
                    </tr>
   
                </tbody>
            <?php }} ?>
        </table>
    <?php 
        if(isset($_POST['approve'])){
        $comment=$_POST['comment'];     
	    $id = $_POST['id'];
        $email = $_POST['email'];

	    $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
	    $result = $cn->query($select);
        if($result)
        {
            $subject="Application status ";
            $body="Dear sir your application is $comment";
            $sender="From:smartpanchayath@gmail.com";
            mail($email,$subject,$body,$sender);
            echo "<script>alert('Approved successfully');</script>";
            echo "<script>window.location.href='emp_manage_application.php';</script>";
        }
	    // header("location:emp_manage_application.php");
        }


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
	$result = $cn->query($select);
	// header("location:emp_manage_application.php");
    if($result)
    {
        $subject="Application status ";
        $body="Dear sir your application is $comment";
        $sender="From:smartpanchayath@gmail.com";
        mail($email,$subject,$body,$sender);
        echo "<script>alert('Rejected successfully');</script>";
        echo "<script>window.location.href='emp_manage_application.php';</script>";
    }
}
 ?>

<br><br>

<table>
          <!-- <h3>INCOME CERTIFICATE</h3> -->
              <thead>
                  <tr><th colspan="18">DEATH CERTIFICATE</tr>
                  <tr>
                      <th scope="col">APPLICATION NUMBER</th>
                      <th scope="col">NAME OF THE APPLICANT</th>
                      <!-- <th scope="col">RELATION WITH DECCEASED</th> -->
                      <th scope="col">CONTACT NO</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">ADDRESS</th>
                      <th scope="col">NAME OF THE DECCEASED</th>
                      <!-- <th scope="col">FATHERS NAME</th>
                      <th scope="col">MOTHERS NAME</th>-->
                      <th scope="col">RELIGION</th>
                      <th scope="col">GENDER</th>
                      <!-- <th scope="col">DATE OF BIRTH</th>
                      <th scope="col">DATE OF DEATH</th>
                      <th scope="col">TIME OF DEATH</th>
                      <th scope="col">PLACE OF DEATH</th> -->
                      
                      <!-- <th scope="col">CAUSE OF DEATH</th>
                      <th scope="col">ID PROOF(APPLICANT)</th>
                      <th scope="col">ID PROOF(DECCEASED)</th>
                      <th scope="col">ADDRESS PROOFs</th>
                      <th scope="col">DEATH PROOFs</th> -->
                      <th scope="col">OPERATIONS</th>
                      
                  </tr>
              </thead>
      <!-- </div> -->
      <?php 
          $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
          $result = $cn->query($qry);
          while($row = mysqli_fetch_array($result))  {
              if($row['type']=='death' && $row['status']=='pending'){ ?>
              <tbody>
                  <tr>
                      <td scope="row"><?php echo $row['apno']; ?></td>
                      <td><?php echo $row['fname']; ?></td>
                      <!-- <td><?php echo $row['relation']; ?></td> -->
                      <td><?php echo $row['cnum']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['dname']; ?></td>
                      <!-- <td><?php echo $row['fname']; ?></td>
                      <td><?php echo $row['mname']; ?></td> -->
                      <td><?php echo $row['religion']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <!-- <td><?php echo $row['day'].$row['month'].$row['year']; ?></td>
                      <td><?php echo $row['dday'].$row['dmonth'].$row['dyear']; ?></td>
                      <td><?php echo $row['time']; ?></td> -->
                      
                      
                      <!-- <td><?php echo $row['pob']; ?></td>
                      <td><?php echo $row['hname']; ?></td>
                      <td><?php echo $row['iproof']; ?></td>
                      <td><?php echo $row['iproof']; ?></td>7
                      <td><?php echo $row['aproof']; ?></td>
                      <td><?php echo $row['hproof']; ?></td> -->
                      <td>
                          <form action="emp_manage_application.php" method="POST">
                              <input type="textarea" name=comment >
                              <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                              <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                              <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
                              <input type="submit" class=reject name="delete" value="Reject"> 

                          </form>
                      </td>
                  </tr>
 
              </tbody>
          <?php } }?>
      </table>


  <?php 
      if(isset($_POST['approve'])){
      $comment=$_POST['comment'];     
      $id = $_POST['id'];
      $email = $_POST['email'];

      $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
      $result = $cn->query($select);
      if($result)
      {
          $subject="Application status ";
          $body="Dear sir your application is $comment";
          $sender="From:smartpanchayath@gmail.com";
          mail($email,$subject,$body,$sender);
          echo "<script>alert('Approved successfully');</script>";
          echo "<script>window.location.href='emp_manage_application.php';</script>";
      }
      // header("location:emp_manage_application.php");
      }


if(isset($_POST['delete'])){

  $id = $_POST['id'];
  $select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
  $result = $cn->query($select);
  // header("location:emp_manage_application.php");
  if($result)
  {
      $subject="Application status ";
      $body="Dear sir your application is $comment";
      $sender="From:smartpanchayath@gmail.com";
      mail($email,$subject,$body,$sender);
      echo "<script>alert('Rejected successfully');</script>";
      echo "<script>window.location.href='emp_manage_application.php';</script>";
  }
}
?>
 <br><br>

<table>
          <!-- <h3>INCOME CERTIFICATE</h3> -->
              <thead>
                  <tr><th colspan="18">WATER CONNECTION</tr>
                  <tr>
                      <th scope="col">APPLICATION NUMBER</th>
                      <th scope="col">APPLICANT NAME</th>
                      <!-- <th scope="col">COMPANY NAME</th> -->
                      <th scope="col">EMAIL</th>
                      <th scope="col">ADDRESS</th>
                      <th scope="col">PROPERT/HOUSE NO</th>
                      <th scope="col">PROPERTY LOCATION</th>
                      <th scope="col">CONNECTION TYPE</th>
                      <th scope="col">PROBLEM</th>
                      <!-- <th scope="col">CONNECTION FOR</th>
                      <th scope="col">ID PROOF</th>
                      <th scope="col">ADDRESS PROOFs</th>
                      <th scope="col">PROPERTY LICENSE</th> -->
                      <th scope="col">OPERATIONS</th>
                      
                  </tr>
              </thead>
      <!-- </div> -->
      <?php 
           $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
           $result = $cn->query($qry);

           while($row = mysqli_fetch_array($result))  {
               if($row['type']=='water' && $row['status']=='pending'){ ?>
              <tbody>
                  <tr>
                      <td scope="row"><?php echo $row['apno']; ?></td>
                      <td><?php echo $row['fname']; ?></td>
                      <!-- <td><?php echo $row['cname']; ?></td> -->
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['pid']; ?></td> 
                      <td><?php echo $row['paddress']; ?></td>
                      <td><?php echo $row['ctype']; ?></td>
                      <td><?php echo $row['work']; ?></td>
                      <!-- <td><?php echo $row['cfor']; ?></td>
                      
                      <td><?php echo $row['iproof']; ?></td>
                      <td><?php echo $row['aproof']; ?></td>
                      <td><?php echo $row['hproof']; ?></td>  -->
                      <td>
                          <form action="emp_manage_application.php" method="POST">
                              <input type="textarea" name=comment >
                              <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                              <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                              <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
                              <input type="submit" class=reject name="delete" value="Reject"> 

                          </form>
                      </td>
                  </tr>
 
              </tbody>
          <?php } }?>
      </table>


  <?php 
      if(isset($_POST['approve'])){
      $comment=$_POST['comment'];     
      $id = $_POST['id'];
      $email = $_POST['email'];

      $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
      $result = $cn->query($select);
      if($result)
      {
           $subject="Application status ";
        $body="Dear sir your application is $comment";
           $sender="From:smartpanchayath@gmail.com";
       mail($email,$subject,$body,$sender);
          echo "<script>alert('Approved successfully');</script>";
          echo "<script>window.location.href='emp_manage_application.php';</script>";
      }
      // header("location:emp_manage_application.php");
      }


if(isset($_POST['delete'])){

  $id = $_POST['id'];
  $select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
  $result = $cn->query($select);
  // header("location:emp_manage_application.php");
  if($result)
  {
      $subject="Application status ";
      $body="Dear sir your application is $comment";
      $sender="From:smartpanchayath@gmail.com";
      mail($email,$subject,$body,$sender);
      echo "<script>alert('Rejected successfully');</script>";
      echo "<script>window.location.href='emp_manage_application.php';</script>";
  }
}
?>
 <br><br>

<table>
          <!-- <h3>INCOME CERTIFICATE</h3> -->
              <thead>
                  <tr><th colspan="18">CONSTRUCTION/DEMOLISH LICENCE</tr>
                  <tr>
                      <th scope="col">APPLICATION NUMBER</th>
                      <th scope="col">OWNERS NAME</th>
                      <th scope="col">PROPERTY ID</th>
                      <th scope="col">OWNERS ID</th>
                      <th scope="col">CONTACT NO</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">ADDRESS</th>
                      <!-- <th scope="col">CATEGORY</th>
                      <th scope="col">BUILDING TYPE</th>
                      <th scope="col">WORK</th>
                      <th scope="col">ID PROOF</th>
                      <th scope="col">ADDRESS PROOFs</th> -->
                      <th scope="col">OPERATIONS</th>
                      
                  </tr>
              </thead>
      <!-- </div> -->
      <?php 
           $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
           $result = $cn->query($qry);

           while($row = mysqli_fetch_array($result))  {
               if($row['type']=='building' && $row['status']=='pending'){ ?>
              <tbody>
                  <tr>
                      <td scope="row"><?php echo $row['apno']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['pid']; ?></td>
                      <td><?php echo $row['adhar']; ?></td>
                      <td><?php echo $row['cnum']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <!-- <td><?php echo $row['category']; ?></td>
                      <td><?php echo $row['btype']; ?></td>
                      <td><?php echo $row['work']; ?></td>
                      <td><?php echo $row['iproof']; ?></td>
                      <td><?php echo $row['aproof']; ?></td> -->
                      <td>
                          <form action="emp_manage_application.php" method="POST">
                              <input type="textarea" name=comment >
                              <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                              <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                              <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
                              <input type="submit" class=reject name="delete" value="Reject"> 

                          </form>
                      </td>
                  </tr>
 
              </tbody>
          <?php } } ?>
      </table>


  <?php 
      if(isset($_POST['approve'])){
      $comment=$_POST['comment'];     
      $id = $_POST['id'];
      $email = $_POST['email'];

      $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
      $result = $cn->query($select);
      if($result)
      {
          $subject="Application status ";
          $body="Dear sir your application is $comment";
          $sender="From:smartpanchayath@gmail.com";
          mail($email,$subject,$body,$sender);
          echo "<script>alert('Approved successfully');</script>";
          echo "<script>window.location.href='emp_manage_application.php';</script>";
      }
      // header("location:emp_manage_application.php");
      }


if(isset($_POST['delete'])){

  $id = $_POST['id'];
  $select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
  $result = $cn->query($select);
  // header("location:emp_manage_application.php");
  if($result)
  {
      $subject="Application status ";
      $body="Dear sir your application is $comment";
      $sender="From:smartpanchayath@gmail.com";
      mail($email,$subject,$body,$sender);
      echo "<script>alert('Rejected successfully');</script>";
      echo "<script>window.location.href='emp_manage_application.php';</script>";
  }
}
?>
 <br><br>

<table>
          <!-- <h3>INCOME CERTIFICATE</h3> -->
              <thead>
                  <tr><th colspan="18">AYUSHMAN BHARATH YOJAN</tr>
                  <tr>
                  <th>APPLICATION NUMBER</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <!-- <th>FATHERS NAME</th>
                            <th>MOTHERS NAME</th> -->
                            <!-- <th>CAST</th>
                            <th>ADHAR NO</th> -->
                            <th>DATE OF BIRTH</th>
                            <th>GENDER</th>
                            <th>CONTACT NO</th>
                            <th>EMAIL</th>
                            <th>ADDRESS</th>
                            <!-- <th>FATHERS OCCUPATION</th>
                            <th>MOTHERS OCCUPATION</th>
                            <th>INCOME</th>
                            <th>ID PROOF</th>
                            <th >ADDRESS PROOFs</th> -->
                            <th >OPERATIONS</th>
                            
                      
                  </tr>
              </thead>
      <!-- </div> -->
      <?php 
           $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
           $result = $cn->query($qry);

           while($row = mysqli_fetch_array($result))  {
               if($row['type']=='ayush' && $row['status']=='pending'){ ?>
              <tbody>
                  <tr>
                  <td scope="row"><?php echo $row['apno']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['lname']; ?></td>
                                <!-- <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['mname']; ?></td> -->
                                <!-- <td><?php echo $row['cast']; ?></td>
                                <td><?php echo $row['adhar']; ?></td> -->
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['cnum']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <!-- <td><?php echo $row['foccupation']; ?></td>
                                <td><?php echo $row['moccupation']; ?></td> -->
                                <!-- <td><?php echo $row['income']; ?></td> -->
                                <!-- <td><?php echo $row['iproof']; ?></td> -->
                                <!-- <td><?php echo $row['aproof']; ?></td> -->
                      <td>
                          <form action="emp_manage_application.php" method="POST">
                              <input type="textarea" name=comment >
                              <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                              <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                              <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
                              <input type="submit" class=reject name="delete" value="Reject"> 

                          </form>
                      </td>
                  </tr>
 
              </tbody>
          <?php } }?>
      </table>


  <?php 
      if(isset($_POST['approve'])){
      $comment=$_POST['comment'];     
      $id = $_POST['id'];
      $email = $_POST['email'];

      $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
      $result = $cn->query($select);
      if($result)
      {
          $subject="Application status ";
          $body="Dear sir your application is $comment";
          $sender="From:smartpanchayath@gmail.com";
          mail($email,$subject,$body,$sender);
          echo "<script>alert('Approved successfully');</script>";
          echo "<script>window.location.href='emp_manage_application.php';</script>";
      }
      // header("location:emp_manage_application.php");
      }


if(isset($_POST['delete'])){

  $id = $_POST['id'];
  $select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
  $result = $cn->query($select);
  // header("location:emp_manage_application.php");
  if($result)
  {
      $subject="Application status ";
      $body="Dear sir your application is $comment";
      $sender="From:smartpanchayath@gmail.com";
      mail($email,$subject,$body,$sender);
      echo "<script>alert('Rejected successfully');</script>";
      echo "<script>window.location.href='emp_manage_application.php';</script>";
  }
}
?>
 <br><br>

<table>
          <!-- <h3>INCOME CERTIFICATE</h3> -->
              <thead>
                  <tr><th colspan="18">SANDHYA SURAKSHA YOJAN</tr>
                  <tr>
                  <th>APPLICATION NUMBER</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <!-- <th>FATHERS NAME</th>
                            <th>MOTHERS NAME</th> -->
                            <!-- <th>CAST</th>
                            <th>ADHAR NO</th> -->
                            <th>ADHAR NO</th>
                            <th>DATE OF BIRTH</th>
                            <th>GENDER</th>
                            <th>CONTACT NO</th>
                            <th>EMAIL</th>
                            <th>ADDRESS</th>
                            <!-- <th>FATHERS OCCUPATION</th>
                            <th>MOTHERS OCCUPATION</th>
                            <th>INCOME</th>
                            <th>ID PROOF</th>
                            <th >ADDRESS PROOFs</th> -->
                            <th >OPERATIONS</th>
                      
                  </tr>
              </thead>
      <!-- </div> -->
      <?php 
           $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
           $result = $cn->query($qry);

           while($row = mysqli_fetch_array($result))  {
               if($row['type']=='sandya' && $row['status']=='pending'){ ?>
              <tbody>
                  <tr>
                  <td scope="row"><?php echo $row['apno']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['lname']; ?></td>
                                <!-- <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['mname']; ?></td> -->
                                <td><?php echo $row['adhar']; ?></td> 
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['cnum']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <!-- <td><?php echo $row['foccupation']; ?></td>
                                <td><?php echo $row['moccupation']; ?></td> -->
                                <!-- <td><?php echo $row['income']; ?></td> -->
                                <!-- <td><?php echo $row['iproof']; ?></td> -->
                                <!-- <td><?php echo $row['aproof']; ?></td> -->
                      <td>
                          <form action="emp_manage_application.php" method="POST">
                              <input type="textarea" name=comment >
                              <input type="hidden" name="id" value="<?php echo $row['apno']; ?>"/>
                              <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                              <input type="submit" class=approve name="approve" value="Approve"> &nbsp &nbsp <br>
                              <input type="submit" class=reject name="delete" value="Reject"> 

                          </form>
                      </td>
                  </tr>
 
              </tbody>
          <?php } }?>
      </table>


  <?php 
      if(isset($_POST['approve'])){
      $comment=$_POST['comment'];     
      $id = $_POST['id'];
      $email = $_POST['email'];

      $select = "UPDATE application SET status = 'passed to admin',comment = '".$comment."' WHERE apno = '".$id."' ";
      $result = $cn->query($select);
      if($result)
      {
          $subject="Application status ";
          $body="Dear sir your application is $comment";
          $sender="From:smartpanchayath@gmail.com";
          mail($email,$subject,$body,$sender);
          echo "<script>alert('Approved successfully');</script>";
          echo "<script>window.location.href='emp_manage_application.php';</script>";
      }
      // header("location:emp_manage_application.php");
      }


if(isset($_POST['delete'])){

  $id = $_POST['id'];
  $select = "UPDATE application SET status = 'rejected' WHERE apno = '$id' ";
  $result = $cn->query($select);
  // header("location:emp_manage_application.php");
  if($result)
  {
      $subject="Application status ";
      $body="Dear sir your application is $comment";
      $sender="From:smartpanchayath@gmail.com";
      mail($email,$subject,$body,$sender);
      echo "<script>alert('Rejected successfully');</script>";
      echo "<script>window.location.href='emp_manage_application.php';</script>";
  }
}
?>