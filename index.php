<?php
@$cn=new mysqli('localhost','root','','project');
if($cn->connect_error)
{
    echo "COULD NOT CONNECT";
    exit;
}
session_start();
$apno=$_POST['apno'];
// $qry1="select apno from application where apno='".$apno."'";
// $rslt = $cn->query($qry1);
// if($rslt){
  $qry = "SELECT a.*,v.* from application as a join villager  as v ON a.userid=v.userid ";
  $result = $cn->query($qry);
  while($row = mysqli_fetch_array($result))  {
    if($row['status']=='approved' && $row['apno']==$apno){ 
      $type=$row['type'];
      $today = date('d-m-Y');
      if($type=='income'){?>
        <!DOCTYPE html>
        <html>
        <head>
        <title>INCOME CERTIFICATE</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        </head>
        <body>
        <h1>INCOME CERTIFICATE</h1>
        <span>Date:<?php echo $today ?></span><br><br>
        <span>Apno:<?php echo $apno ?></span>
        <p> Mr/Ms     <u><?php echo $row['name']?></u>     S/O,D/O <?php echo $row['fname']?> and <?php echo $row['mname']?>  who lived in <?php echo $row['address']?> whose annual income is only<b> ₹<?php echo $row['income']?> </b><br> <br> This Certficate is Valid until 5years from current date. <br><br><br> <b>Please Note : This is the soft copy to get hard copy visit your gramapanchayath use your application number and pay ₹100/-</b> <br><br> (This soft copy may not valid in every places) </p>
        <img src="pictures/seal2.png">
        <button onclick="window.print();hideButton();" class="print">Download</button>
        <script>
        function hideButton() {
        var button = document.getElementById('myButton');
        button.style.display = 'none';
        }   
        </script>
        </body>
        </html>
      <?php }

    if($type=='cast') {?>

      <!DOCTYPE html>
      <html>
      <head>
      <title>CASTE CERTIFICATE</title>
      <link rel="stylesheet" type="text/css" href="styles.css">
      </head>
      <body>
      <h1>CASTE CERTIFICATE</h1>
      <span>Date:<?php echo $today ?></span><br><br>
      <span>Apno:<?php echo $apno ?></span>
      <p>This is to be Certify that  Mr/Ms     <u><?php echo $row['name']?></u>     S/O,D/O <?php echo $row['fname']?> and <?php echo $row['mname']?>  who lived in <?php echo $row['address']?> whose caste category is <b> <?php echo $row['category']?> and caste is <b> <?php echo $row['cast']?>  </b><br> <br> This certificate is issued based on the relevant documents provided by the applicant and in accordance with the government's guidelines and regulations.
      <br><br> This Certficate is Valid until 5years from current date. <br><br><br> <b>Please Note : This is the soft copy to get hard copy visit your gramapanchayath use your application number and pay ₹100/-</b> <br><br> (This soft copy may not valid in every places) </p>
      <img src="pictures/seal2.png">
      <button onclick="window.print();hideButton();" class="print">Download</button>
      <script>
      function hideButton() {
      var button = document.getElementById('myButton');
      button.style.display = 'none';
      }   
      </script>
      </body>
      </html>
      

   <?php }
  if($type=='birth') {?>

  <!DOCTYPE html>
  <html>
  <head>
  <title>BIRTH CERTIFICATE</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
  <h1>BIRTH CERTIFICATE</h1>
  <span>Date:<?php echo $today ?></span><br><br>
  <span>Apno:<?php echo $apno ?></span>
  <p>This is to certify that <u><?php echo $row['name']?></u>  was born on <b><?php echo $row['dob']?></b> at <b><?php echo $row['hname']?></b>.
  The child's parents are registered as <?php echo $row['fname']?></u> and <?php echo $row['mname']?></u> at the time of birth.The birth occurred at <?php echo $row['pob']?> 
  The gender of the child is recorded as <?php echo $row['gender']?> as per the information provided by the parents.
  This certificate is issued in accordance with the state laws and regulations governing the registration of births.
  <br><br> <b>Please Note : This is the soft copy to get hard copy visit your gramapanchayath use your application number and pay ₹100/-</b> <br><br> (This soft copy may not valid in every places) </p>
  <img src="pictures/seal2.png">
  <button onclick="window.print();hideButton();" class="print">Download</button>
  <script>
  function hideButton() {
  var button = document.getElementById('myButton');
  button.style.display = 'none';
  }   
  </script>
  </body>
  </html>
  

<?php }
  if($type=='death') {?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>DEATH CERTIFICATE</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <h1>DEATH CERTIFICATE</h1>
    <span>Date:<?php echo $today ?></span><br><br>
    <span>Apno:<?php echo $apno ?></span>
    <p>TThis is to certify that <u><?php echo $row['name']?></u> has passed away on <b><?php echo $row['dod']?></b>  at <b><?php echo $row['pob']?></b>.The deceased individual's date of birth is recorded as <b><?php echo $row['day'].$row['month'].$row['year']?></b>.The cause of death is determined to be  <b><?php echo $row['cod']?></b>, as determined by the attending physician/coroner.The deceased individual's gender is recorded as  <b><?php echo $row['gender']?></b>.
    The deceased individual's parents' names are recorded as  <b><?php echo $row['fname']?></b> and  <b><?php echo $row['mname']?></b>.
    This death certificate is issued in accordance with the state laws and regulations governing the registration of deaths.
    <br><br> <b>Please Note : This is the soft copy to get hard copy visit your gramapanchayath use your application number and pay ₹100/-</b> <br><br> (This soft copy may not valid in every places) </p>
    <img src="pictures/seal2.png">
    <button onclick="window.print();hideButton();" class="print">Download</button>
    <script>
    function hideButton() {
    var button = document.getElementById('myButton');
    button.style.display = 'none';
    }   
    </script>
    </body>
    </html>
    
  
  <?php }

  if($type=='water') {?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>Water License</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <h1>Certificate of Acceptance(Water Connection)</h1>
    <span>Date:<?php echo $today ?></span><br><br>
    <span>Apno:<?php echo $apno ?></span>
    <p>    
    This is to certify that the water links project , undertaken by the Panchayath, has been successfully implemented and is now officially accepted.<br><br>
    <b>
    Project Details:<br>
    Name: Water Links Project( <?php echo $row['ctype']?> )<br>
    Property Id:<?php echo $row['pid']?> <br>
    Location: <?php echo $row['paddress']?> <br>
    Implementation Period:  From <?php echo $today ?> - Within 3 months <br>

  </b>
    Description:<br>
    Dear <?php echo $row['name']?> The Water Links Project aimed to improve and enhance the water supply system to your <?php echo $row['ctype']?>. Through diligent planning and dedicated efforts, the Panchayath has successfully completed the project, ensuring a reliable and sustainable water supply for our residents.

    We express our gratitude to all the stakeholders, including the Panchayath members, officials, engineers, workers, and community members, who contributed their time, expertise, and resources towards the successful completion of this project.

    This certificate serves as a testament to the commitment of the Panchayath towards the development and welfare of our community. The Water Links Project will undoubtedly have a positive and long-lasting impact on the lives of our residents.

    Issued on this <?php echo $today ?> .

</p>
    <img src="pictures/seal2.png">
    <button onclick="window.print();hideButton();" class="print">Download</button>
    <script>
    function hideButton() {
    var button = document.getElementById('myButton');
    button.style.display = 'none';
    }   
    </script>
    </body>
    </html>
    <?php }

  if($type=='building') {?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>Building License</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <h1>Licence for Construction/Demolish</h1>
    <span>Date:<?php echo $today ?></span><br><br>
    <span>Apno:<?php echo $apno ?></span>
    <p>    
    This is to certify that your application for the <?php echo $row['category']?> of the building , undertaken by the Panchayath, has been successfully implemented and is now officially accepted.<br><br>
    <b>
    Project Details:<br>
    Name: <?php echo $row['category']?> of building <br>
    Property Id:<?php echo $row['pid']?> <br>
    Type of bulding :<?php echo $row['btype']?> <br>
    Location: <?php echo $row['paddress']?> <br>

  </b>
    Description:<br>
    Dear <?php echo $row['name']?> ,
    We are pleased to inform you that your application for a license to undertake the construction/demolition of a building at <?php echo $row['paddress']?> .  has been carefully reviewed and approved by the Panchayath.<br> This license is granted in accordance with the applicable building codes, regulations, and guidelines governing construction and demolition activities within our jurisdiction.<br><br>
    The license for construction/demolition is granted for the period commencing on <?php echo $today ?> and concluding on exactly one year of starting date. It is essential to complete the project within this timeframe.

</p>
    <img src="pictures/seal2.png">
    <button onclick="window.print();hideButton();" class="print">Download</button>
    <script>
    function hideButton() {
    var button = document.getElementById('myButton');
    button.style.display = 'none';
    }   
    </script>
    </body>
    </html>
    <?php }

if($type=='sandya') {?>

  <!DOCTYPE html>
  <html>
  <head>
  <title>Sandya Suraksha</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
  <h1>Sandya Suraksha Yojan</h1>
  <span>Date:<?php echo $today ?></span><br><br>
  <span>Apno:<?php echo $apno ?></span>
  <p>    
  This is to certify that your application for the Sandya Suraksha Yojan , undertaken by the Panchayath, has been successfully implemented and is now officially accepted.<br><br>
  <b>
  Program Details:<br>
  Program Name : Sandya Suraksha Yojan <br>
  Participant Name: <?php echo $row['name']?> <br>
  Contact Number :<?php echo $row['cnum']?> <br>
  Location: <?php echo $row['address']?> <br>

</b>
  Description:<br>
  Dear <?php echo $row['name']?> ,
  We are pleased to inform you that your application for enrollment in the Sandya Suraksha Yojana has been reviewed and approved by the Panchayath. This certificate serves as official recognition of your participation in this program aimed at promoting safety and security in our community.<br>
  We congratulate you on being approved for the Sandya Suraksha Yojana and commend your dedication to ensuring a safe community environment. We believe that your participation will greatly contribute to the success of this program.<br>
Enclosed with this letter, you will find your Sandya Suraksha Yojana Certificate, indicating your enrollment and participation details. We recommend keeping this certificate in a secure place for future reference.<br>
</p>
  <img src="pictures/seal2.png">
  <button onclick="window.print();hideButton();" class="print">Download</button>
  <script>
  function hideButton() {
  var button = document.getElementById('myButton');
  button.style.display = 'none';
  }   
  </script>
  </body>
  </html>
  <?php }

if($type=='ayush') {?>

  <!DOCTYPE html>
  <html>
  <head>
  <title>Ayushman Bharath</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
  <h1>Ayushman Bharath Yojan</h1>
  <span>Date:<?php echo $today ?></span><br><br>
  <span>Apno:<?php echo $apno ?></span>
  <p>    
  This is to certify that your application for the Ayushman Bharath  Yojan , undertaken by the Panchayath, has been successfully implemented and is now officially accepted.<br><br>
  <b>
  Program Details:<br>
  Program Name : Sandya Suraksha Yojan <br>
  Participant Name: <?php echo $row['name']?> <br>
  Contact Number :<?php echo $row['cnum']?> <br>
  Location: <?php echo $row['address']?> <br>

</b>
  Description:<br>
  Dear <?php echo $row['name']?> ,
  We are pleased to inform you that your application for enrollment in the Ayushman Bharath Yojana has been reviewed and approved by the Panchayath. This certificate serves as official recognition of your participation in this program aimed at promoting safety and security in our community.<br>
  We congratulate you on being approved for the Ayushman Bharath Yojana and commend your dedication to ensuring a safe community environment. We believe that your participation will greatly contribute to the success of this program.<br>
Enclosed with this letter, you will find your Ayushman Bharath Yojana Certificate, indicating your enrollment and participation details. We recommend keeping this certificate in a secure place for future reference.<br>
</p>
  <img src="pictures/seal2.png">
  <button onclick="window.print();hideButton();" class="print">Download</button>
  <script>
  function hideButton() {
  var button = document.getElementById('myButton');
  button.style.display = 'none';
  }   
  </script>
  </body>
  </html>




  
  <?php 
  // } else {
  //   echo "not found!";
  // }
} }
}?>


