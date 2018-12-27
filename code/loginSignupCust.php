<?php

require 'conn.php';

session_start();
if (isset($_POST['submit_login'])) 
{
	$un=mysqli_real_escape_string($conn,$_POST['user_name']);
	$pw=mysqli_real_escape_string($conn,$_POST['pass_word']);
    #$pw=md5($pw);
	$q="SELECT * FROM login WHERE username='$un' AND password='$pw' ";
    #$result = mysqli_query($conn,$q);
    
    

	if ($result = mysqli_query($conn,$q))
	{
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $user_id = $row['user_id'];

        $_SESSION['usr_id'] = $user_id;
		$ms="Logged In";
		echo '<script>alert($ms)</script>';
        #header("location:searches.php?u_id=$user_id");
        echo"<script>location='searches.php?u_id=".$row['user_id']."&u_type=".$row['user_type']."'</script>";
        
        #echo $user_id;
        
	}

}
if (isset($_POST['submit_reg'])) 
{
	$un_s=mysqli_real_escape_string($conn,$_POST['usernamesignup']);
    $name_s=mysqli_real_escape_string($conn,$_POST['namesignup']);
    $em_s=mysqli_real_escape_string($conn,$_POST['emailsignup']);
    $pw_s=mysqli_real_escape_string($conn,$_POST['passwordsignup']);
    $pw_c_s=mysqli_real_escape_string($conn,$_POST['passwordsignup_confirm']);
    $cont_s=mysqli_real_escape_string($conn,$_POST['contact']);
    $add_s=mysqli_real_escape_string($conn,$_POST['address']);
    $dob_s=mysqli_real_escape_string($conn,$_POST['dob']);
    $dob_s=date('Y-m-d',strtotime($dob_s));
    $utype_s=mysqli_real_escape_string($conn,$_POST['type']);
    
    if ($pw_s==$pw_c_s) 
    {
        #$pw_s=md5($pw_s);
        if ($utype_s=='build') 
        {
            $sql="INSERT INTO builder(name,email,contact,address,dob) VALUES('$name_s','$em_s','$cont_s','$add_s','$dob_s') ";
            if (mysqli_query($conn,$sql)) 
            {
                $id=mysqli_insert_id($conn);

                $query="INSERT INTO login(user_id,username,password,user_type) VALUES('$id','$un_s','$pw_s','Builder') ";
                if (mysqli_query($conn,$query)) 
                {
                    $m="Registered Successfully";
                    echo '<script language="javascript">alert($m)</script>';
                }
            }
        }

        if ($utype_s=='cust') 
        {
            $sql1="INSERT INTO customer(c_name,c_email,contact,address,dob) VALUES('$name_s','$em_s','$cont_s','$add_s','$dob_s') ";
            if (mysqli_query($conn,$sql1)) 
            {
                $id1=mysqli_insert_id($conn);
                $query1="INSERT INTO login(user_id,username,password,user_type) VALUES('$id1','$un_s','$pw_s','Customer') ";
                if(mysqli_query($conn,$query1))
                {
                   echo '<script type = "/javascript">' ;
                     echo 'alert("You have logged in.")';
                     echo '</script>';

                  }
            }
        }
    }
    else
    {
        $msg="Passwords do not match!!";
        echo '<script type="javascript">alert($msg)</script>';
    }
    
}


?>
<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body bgcolor = "blue" >
        <h1><a href="index.html"><img src="images/logo.jpg" alt=""></a></h1>
        <div class="container">
            
            <div class="codrops-top">
                <a href="">
                    <strong>&laquo;</strong>
                </a>
                <span class="right">
                    <a href="index.html">
                        <strong>Back to the Main Page</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
            <header>
                <h1>Registration</h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="loginSignupCust.php" method="POST"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="user_name" name="user_name" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="pass_word" name="pass_word" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <button name="submit_login">Login</button>
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="loginSignupCust.php" method="POST"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label class="uname"  data-icon="u">Your Name</label>
                                    <input id="namesignup" name="namesignup" required="required" type="text" placeholder="First Name    Last Name" />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname"  data-icon="u">Your Username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername60" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your Email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your Password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please Confirm Your Password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label class="uname"  data-icon="u">Your Contact</label>
                                    <input id="contact" name="contact" required="required" type="text" placeholder="1234567890">
                                </p>
                                <p> 
                                    <label class="uname"  data-icon="u">Your Address</label>
                                    <input id="address" name="address" required="required" type="text" placeholder="Address" />
                                </p>
                                <p> 
                                    <label class="uname"  data-icon="u">Your DOB</label>
                                    <input id="dob" name="dob" required="required" type="text" placeholder="YYYY-MM-DD" />
                                </p>
                                <p> 
                                    <label class="uname"  data-icon="u">Choose who you are!</label></p><p>
                                    <select name="type" placeholder="type">
                                    	<option value=""></option>
                                    	<option value="cust">Customer</option>
                                    	<option value="build">Builder</option>
                                    </select>
                                </p>
                                <p class="signin button"> 
									<button name="submit_reg">Sign Up</button>
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>