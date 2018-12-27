<?php
    require 'conn.php';
    $usr_id=0;
    $u_type="X";
    if(isset($_GET['u_id'])){
        $usr_id=$_GET['u_id'];
    }
    if(isset($_GET['u_type'])){
        $u_type=$_GET['u_type'];
    }

    if($u_type="customer"){
        $q="SELECT * FROM customer where cust_id='$usr_id' ";
        if($result=mysqli_query($conn,$q)){
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $name=$row['c_name'];
            $email=$row['c_email'];
            $contact=$row['contact'];
            $add=$row['address'];
            $dob=$row['dob'];
        }
    }
    if($u_type="builder"){
        $q="SELECT * FROM builder where b_id='$usr_id' ";
        if($result=mysqli_query($conn,$q)){
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $name=$row['name'];
            $email=$row['email'];
            $contact=$row['contact'];
            $add=$row['address'];
            $dob=$row['dob'];
        }   
    }

?>


<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <title></title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
    </head>
    <body >
       <!-- <h1><a href="index.html"><img src="images/logo.jpg" alt=""></a></h1> -->
        <div class="container">
            <br><br><br><br>
            <div class="left-1">


          
          <h3 class="top-1 p3">Welcome <?php echo $u_type; ?>!</h2><br><br><br><br>
          <table>

          <tr><td><label><b><i>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $name; ?></b></label><br><br></td></tr>
          <tr><td><label><b><i>Email Id:</td><td><?php echo $email; ?></b></label><br><br></td></tr>
          <tr><td><label><b><i>Contact:</td><td><?php echo $contact; ?></b></label><br><br></td></tr>
          <tr><td><label><b><i>Address:</td><td><?php echo $add; ?></b></label><br><br></td></tr>
          <tr><td><label><b><i>DOB:</td><td><?php echo $dob; ?></b></label></td></tr>

        </table>

        </div>

    </body>

</html>