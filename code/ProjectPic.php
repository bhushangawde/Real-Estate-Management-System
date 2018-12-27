<?php
    require 'conn.php';

    if($_SERVER['REQUEST_METHOD']=="POST"){
    $file = $_FILES['imgname']['tmp_name'];
    if(isset($file)){
        $image = addslashes(file_get_contents($_FILES['imgname']['tmp_name']));
        $image_name = addslashes($_FILES['imgname']['name']);
        $image_size = getimagesize($_FILES['imgname']['tmp_name']);

        if($image_size == FALSE){
             echo '<script language="javascript">alert("The files is not an image!")</script>';
        }
        else {
            if(isset($_POST['upload'])){
                $sql = "INSERT INTO project(ImageName,Image) VALUES('$image_name','$image') where /* Here unique login id  has to be matched of the current session WRITE THE REMAINING PART The rest of the code is correct */" ;
                
                

                if(!mysqli_query($conn,$sql)){
                    echo '<script language="javascript">alert("Problem uploading!")</script>';
                }
                else {
                    echo '<script language="javascript">alert("Image uploaded successfully")</script>';
                    $lastid = mysql_insert_id();
                    echo " <p />Your Image: <p /><img src = getProjImage.php?id=$lastid>";

                    if(isset($_POST['Submit'])){
                        header("location: SubProjDetails.php");
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
                <h1>Upload the pic of your Project:</h1>	
            </header>
            <section>				   
                  <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action= "<?php $_PHP_SELF ?>" method = "POST" enctype = "multipart/form-data"  autocomplete="on"> 
                                <h1>Welcome</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Image: </label>
                                    <input  name="imgname" required="required" type="file"/>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name = "upload" value="Upload" /> 
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