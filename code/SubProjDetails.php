<?php

require 'conn.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['submit_reg'])){
        $floor=mysqli_real_escape_string($conn,$_POST['floor']);
        $RperF=mysqli_real_escape_string($conn,$_POST['RperF']);
        $price=mysqli_real_escape_string($conn,$_POST['price']);
        $carpet=mysqli_real_escape_string($conn,$_POST['carpet']);
        $rate=mysqli_real_escape_string($conn,$_POST['rate']);
        $electricity=mysqli_real_escape_string($conn,$_POST['electricity']);
        $water=mysqli_real_escape_string($conn,$_POST['water']);
        $room_type = mysqli_real_escape_string($conn,$_POST['type']);

        $prj_id = $_SESSION['prj_id'];
        if($room_type == '1bhk'){
           $sql = "INSERT INTO sub_project(project_id,type_of_room,max_floor,rooms_on_floor,max_price,carpet_area,rate_per_sq_feet,electricity,water) VALUES('$prj_id','1BHK','$floor','$RperF','$price','$carpet','$rate','$electricity','$water')";
        }
        else if ($room_type == '2bhk'){
            $sql = "INSERT INTO sub_project(project_id,type_of_room,max_floor,rooms_on_floor,max_price,carpet_area,rate_per_sq_feet,electricity,water) VALUES('$prj_id','2BHK','$floor','$RperF','$price','$carpet','$rate','$electricity','$water')";
        }
        else if($room_type=='3bhk'){
            $sql = "INSERT INTO sub_project(project_id,type_of_room,max_floor,rooms_on_floor,max_price,carpet_area,rate_per_sq_feet,electricity,water) VALUES('$prj_id','3BHK','$floor','$RperF','$price','$carpet','$rate','$electricity','$water')";
        }

        if(mysqli_query($conn,$sql)){
            $m="Details Submitted";
            echo '<script language="javascript">alert($m)</script>';
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
                <h1>Enter Your Sub-Project Details:</h1>	
            </header>
            <section>				
                  <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="<?php $_PHP_SELF ?>" method = "POST"autocomplete="on"> 
                                <h1>Welcome</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Floors </label>
                                    <input id="username" name="floor" required="required" type="text" placeholder="Total floors"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Rooms/Floor </label>
                                    <input id="password" name="RperF" required="required" type="text" placeholder="Enter rooms Per floor" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Price </label>
                                    <input id="password" name="price" required="required" type="text" placeholder="Max Price" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Carpet Area </label>
                                    <input id="password" name="carpet" required="required" type="text" placeholder="In sq. feet" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Rate per sq. feet</label>
                                    <input id="password" name="rate" required="required" type="text" placeholder="12234454" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Electricity (optional)</label>
                                    <input id="password" name="electricity" required="required" type="text" placeholder="Information about availability of electricity" /> 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Water (optional) </label>
                                    <input id="password" name="water" required="required" type="text" placeholder="Information about availability of water" /> 
                                </p>
                                <p>
                                    <label class="uname">Choose the Type of rooms!</label></p><p>
                                    <select name="type" placeholder="type">
                                        <option value=""></option>
                                        <option value="1bhk">1 BHK</option>
                                        <option value="2bhk">2 BHK</option>
                                        <option value="3bhk">3 BHK</option>
                                        
                                    </select>
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