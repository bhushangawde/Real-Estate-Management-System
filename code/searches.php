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
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        if (isset($_POST['submit_button'])) 
        {
             
            $home_type=mysqli_real_escape_string($conn,$_POST['Home']);
            $location=mysqli_real_escape_string($conn,$_POST['Location']);
            $budget=mysqli_real_escape_string($conn,$_POST['Budget']);
            if ($budget=='B1') 
            {
                $min_price= 6000000;
                $max_price= 7000000;

            }
            elseif ($budget=='B2') 
            {
                $min_price= 7000000;
                $max_price=8000000;
            }
            elseif($budget=='B3')
            {
                $min_price=8000000;
                $max_price=9000000;
            }
            elseif ($budget=='B4') 
            {
                $min_price= 10000000;
                $max_price=11500000;
            }
            elseif ($budget=='B5')
            {
                $min_price= 11500000;
                $max_price=13000000;
            }
            elseif ($budget=='B6') 
            {
                $min_price= 13000000;
                $max_price=14500000;
            }
            elseif ($budget=='B7') 
            {
                $min_price= 14500000;
                $max_price=16000000;
            }
            elseif ($budget=='B8') 
            {
                $min_price= 16000000;
                $max_price=18000000;
            }
            elseif ($budget=='B9') 
            {
                $min_price= 18000000;
                $max_price=20000000;
            }
            
            $q="SELECT * FROM project as p,sub_project as s WHERE p.address='$location' AND p.project_id = s.project_id AND s.type_of_room='$home_type' AND s.min_price>='$min_price' AND s.max_price<='$max_price' ";
            $res=mysqli_query($conn,$q);
               

            if($res)
            {   

                echo 'bye';
                    while($rows=mysqli_fetch_array($res,MYSQLI_ASSOC))
                    {
                        echo 'bye';
                        echo '
                            
                            <div>
                                '.$rows['end_date'].'
                            </div>
                            <br>

                        ';                   
                    
                     }
            }
                else{
                    $ms="No related searches";
                    echo '<script language="javascript">alert($ms)</script>';
                    
                }
            
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


            <?php echo '<h3 class="top-1 p3"><a href="profile.php?u_id='.$usr_id.'&u_type='.$u_type.'">Check your profile</a></h3>' ?>
          <h2 class="top-1 p3">Find your home</h2>
          <form id="form-1" class="form-1 bot-1" action= "searches.php" method = "POST">
            <div class="select-1">
              <label>Home type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="Home" >
                  <option val="">Select</option>
                  <option val="1">1 BHK</option>
                  <option val="2">2 BHK</option>
                  <option val="3">3 BHK</option>
                </select>
              </div>
            <div  class="select-1">
              <label>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <select name="Location">
                <option>Select</option>
                <option value="Louis Wadi">Louis Wadi</option>
                <option val="RN">Ramchandra Nagar</option>
                <option val="Panch">Panchpakhadi</option>
                <option val="TeenHaatNaka">Teen Haat Naka</option>
                <option val="SN">Samta Nagar</option>
                <option value="Lokmanya Nagar">Lokmanya Nagar</option>
                <option val="KW">KasarWadawli</option>
                <option val="MP">Manpada</option>
                <option val="KB">Kapur Bawadi</option>
                <option val="IF">Ice Factory</option>
                <option val="VS">Vrindavan Society</option>
              </select>
            </div>

            <div  class="select-1">
              <label>Budget &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <select name="Budget">
                <option>Select</option>
                <option value="B1">6000000-7000000</option>
                <option value="B2">8000000-9000000</option>
                <option value="B3">9000000-10000000</option>
                <option value="B4">10000000-11500000</option>
                <option value="B5">11500000-13000000</option>
                <option value="B6">13000000-14500000</option>
                <option value="B7">14500000-16000000</option>
                <option value="B8">16000000-18000000</option>
                <option value="B9">18000000-20000000</option>
              </select>
            </div>
            
            <button name = "submit_button">Search</button>
            <div class="clear"></div>
          </form>
           

        </div>

    </body>

</html>