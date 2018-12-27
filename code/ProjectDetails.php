<?php

require 'conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['submit_reg'])){
        $Pname=mysqli_real_escape_string($conn,$_POST['projectname']);
        $date_start=mysqli_real_escape_string($conn,$_POST['stdate']);
        $date_end=mysqli_real_escape_string($conn,$_POST['enddate']);
        $date_start=date('Y-m-d',strtotime($date_start));
        $date_end=date('Y-m-d',strtotime($date_end));
        $c1=mysqli_real_escape_string($conn,$_POST['c1']);
        $c2=mysqli_real_escape_string($conn,$_POST['c2']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $features=mysqli_real_escape_string($conn,$_POST['features']);

        $sql = "INSERT INTO sub_project(project_name,start_date,end_start,contact1,contact2,address,features) VALUES('$Pname','$date_start','date_end','$c1','$c2','$address','$features')";           
         if (mysqli_query($conn,$sql)) 
            {
                $id=mysqli_insert_id($conn);
                $user_id = $_SESSION['usr_id']; 
                $_SESSION['prj_id'] = $id;
                $query="INSERT INTO builder_projects(project_id,builder_id) VALUES('$id','$user_id')";
                if (mysqli_query($conn,$query)) 
                {
                    $m="Project Registered Successfully";
                    echo '<script language="javascript">alert($m)</script>';
                }
            }
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
    <body>
        <h1><a href="index.html"><img src="images/logo.jpg" alt=""></a></h1>
        <div class="container">
            
            <header>
                <h1>Enter Your Project Details:</h1>	
            </header>
            <section>				
                  <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="<?php $_PHP_SELF ?>" autocomplete="on"> 
                                <h1>Welcome</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Project Name </label>
                                    <input id="username" name="projectname" required="required" type="text" placeholder="myuserID"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Start Date </label>
                                    <input id="password" name="stdate" required="required" type="text" placeholder="YYYY-MM-DD" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> End Date </label>
                                    <input id="password" name="enddate" required="required" type="text" placeholder="YYYY-MM-DD" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your Contact1 </label>
                                    <input id="password" name="c1" required="required" type="text" placeholder="12234454" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your Contact2 (optional) </label>
                                    <input id="password" name="c2" required="required" type="text" placeholder="12234454" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Address </label>
                                    <input id="password" name="address" required="required" type="text" placeholder="" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Layout Plan </label>
                                    <input id="password" name="layout" required="required" type="text" placeholder="Explain Your Layout Plan in few lines" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Features </label>
                                    <input id="password" name="features" required="required" type="text" placeholder="Give the features of your project" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Proceed" /> 
								</p>
                                <p class="change_link">
									Fill all fields!
									<a  class="to_register"></a>
								</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>

        </div>

    </body>

</html>