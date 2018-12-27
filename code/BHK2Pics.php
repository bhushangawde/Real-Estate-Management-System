<?php

    require 'conn.php';

    if($_SERVER['REQUEST_METHOD']=="POST"){
    
         $img1 = $_FILES['bed1img']['tmp_name'];
        $img2 = $_FILES['hallimg']['tmp_name'];
        $img3 = $_FILES['kitchenimg']['tmp_name'];
        $img4 = $_FILES['bed2img']['tmp_name'];

        if(isset($img1)){
            $image1 = addslashes(file_get_contents($_FILES['bed1img']['tmp_name']));
            $image_name1 = addslashes($_FILES['bed1img']['name']);
            $image_size1 = getimagesize($_FILES['bed1img']['tmp_name']);

            if($image_size1 == FALSE){
                 echo '<script language="javascript">alert("The file is not an image!")</script>';
            }
            else {
                if(isset($_POST['upload1'])){
                    $sql1 = "INSERT INTO bhk_2(bed1name,bedroom1) VALUES('$image_name1','$image1') where /* Here unique login id  has to be matched of the current session WRITE THE REMAINING PART The rest of the code is correct */" ;



                    if(!mysqli_query($conn,$sql)){
                        echo '<script language="javascript">alert("Problem uploading!")</script>';
                    }
                    else {
                        echo '<script language="javascript">alert("Image uploaded successfully")</script>';
                        /*$lastid = mysql_insert_id();
                        echo " <p />Your Image: <p /><img src = getProjImage.php?id=$lastid>";
                        */
                        if(isset($_POST['Submit'])){
                            header("location: xyz.php");
                        }   
                    }
                }
            }
        }



        if(isset($img4)){
            $image4 = addslashes(file_get_contents($_FILES['bed2img']['tmp_name']));
            $image_name4 = addslashes($_FILES['bed2img']['name']);
            $image_size4 = getimagesize($_FILES['bed2img']['tmp_name']);

            if($image_size4 == FALSE){
                 echo '<script language="javascript">alert("The file is not an image!")</script>';
            }
            else {
                if(isset($_POST['upload4'])){
                    $sql2 = "INSERT INTO bhk_2(bed2name,bedroom2) VALUES('$image_name4','$image4') where /* Here unique login id  has to be matched of the current session WRITE THE REMAINING PART The rest of the code is correct */" ;



                    if(!mysqli_query($conn,$sql2)){
                        echo '<script language="javascript">alert("Problem uploading!")</script>';
                    }
                    else {
                        echo '<script language="javascript">alert("Image uploaded successfully")</script>';
                        /*$lastid = mysql_insert_id();
                        echo " <p />Your Image: <p /><img src = getProjImage.php?id=$lastid>";
                        */
                        if(isset($_POST['Submit'])){
                            header("location: xyz.php");
                        }   
                    }
                }
            }
        }



        if(isset($img2)){
            $image2 = addslashes(file_get_contents($_FILES['hallimg']['tmp_name']));
            $image_name2 = addslashes($_FILES['hallimg']['name']);
            $image_size2 = getimagesize($_FILES['hallimg']['tmp_name']);

            if($image_size2 == FALSE){
                 echo '<script language="javascript">alert("The file is not an image!")</script>';
            }
            else {
                if(isset($_POST['upload2'])){
                    $sql3 = "INSERT INTO bhk_2(hallname,hall) VALUES('$image_name2','$image2') where /* Here unique login id  has to be matched of the current session WRITE THE REMAINING PART The rest of the code is correct */" ;



                    if(!mysqli_query($conn,$sql3)){
                        echo '<script language="javascript">alert("Problem uploading!")</script>';
                    }
                    else {
                        echo '<script language="javascript">alert("Image uploaded successfully")</script>';
                        /*$lastid = mysql_insert_id();
                        echo " <p />Your Image: <p /><img src = getProjImage.php?id=$lastid>";
                        */
                        if(isset($_POST['Submit'])){
                            header("location: xyz.php");
                        }   
                    }
                }
            }
        }


        if(isset($img3)){
            $image3 = addslashes(file_get_contents($_FILES['kitchenimg']['tmp_name']));
            $image_name3 = addslashes($_FILES['kitchenimg']['name']);
            $image_size3 = getimagesize($_FILES['kitchenimg']['tmp_name']);

            if($image_size3 == FALSE){
                 echo '<script language="javascript">alert("The file is not an image!")</script>';
            }
            else {
                if(isset($_POST['upload3'])){
                    $sql4 = "INSERT INTO bhk_2(kitchenname,kitchen) VALUES('$image_name3','$image3') where /* Here unique login id  has to be matched of the current session WRITE THE REMAINING PART The rest of the code is correct */" ;



                    if(!mysqli_query($conn,$sql4)){
                        echo '<script language="javascript">alert("Problem uploading!")</script>';
                    }
                    else {
                        echo '<script language="javascript">alert("Image uploaded successfully")</script>';
                        /*$lastid = mysql_insert_id();
                        echo " <p />Your Image: <p /><img src = getProjImage.php?id=$lastid>";
                        */
                        if(isset($_POST['Submit'])){
                            header("location: xyz.php");
                        }   
                    }
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
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body >
        <h1><a href="index.html"><img src="images/logo.jpg" alt=""></a></h1>
        <div class="container">
            
            <header>
                <h1>Upload the pics</h1>	
            </header>
            <section>				   
                  <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action= "<?php $_PHP_SELF ?>" method = "POST" enctype = "multipart/form-data"  autocomplete="on"> 
                                <h1>Welcome</h1> 
                               <p> 
                                    <label for="username" class="uname"  >BEDROOM1 Image: </label>
                                    <input  name="bed1img" required="required" type="file"/>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name = "upload1" value="Upload" /> 
                                </p>
                                <p> 
                                    <label for="username" class="uname"  >BEDROOM2 Image: </label>
                                    <input  name="bed2img" required="required" type="file"/>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name = "upload4" value="Upload" /> 
                                </p>
                                
                                <p> 
                                    <label for="username" class="uname"  >HALL Image: </label>
                                    <input  name="hallimg" required="required" type="file"/>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name = "upload2" value="Upload" /> 
                                </p>
                                <p> 
                                    <label for="username" class="uname"  >KITCHEN Image: </label>
                                    <input  name="kitchenimg" required="required" type="file"/>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name = "upload3" value="Upload" /> 
                                </p>    

                                 <p class="login button"> 
                                    <input type="submit" name = "Submit" value="Submit" /> 
                                </p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>

        </div>

    </body>

</html>