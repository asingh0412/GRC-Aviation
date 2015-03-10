<?php
    // Start the session
    session_start();
    if($_SESSION['permissions'] != "teacher") {
        header('Location: http://alex.greenrivertech.net/IT305/grcc-aviation/index.php?page=home');
    }
?>
<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="http://code.jquery.com/jquery.js"></script>

</head>

<body>
    <?php
        //Connect to the database
        require '../db.php';
    ?>
    
    <br>

    <!--Rest of the page-->
        <h1>Upload form </h1>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="styled-select">
        <select class="styled-select" name="section">
        <option value="section1">Section 1</option>
        <option value="section2">Section 2</option>
        <option value="section3">Section 3</option>
        <option value="section4">Section 4</option>
        <option value="section5">Section 5</option>
        <option value="section6">Section 6</option>
        <option value="section7">Section 7</option>
        <option value="section8">Section 8</option>
        <option value="section9">Section 9</option>
        <option value="section10">Section 10</option>
        <option value="section11">Section 11</option>
        </select>
        <br>

    </div>
        <br>
        <div class="inputContainer">   
         <label >Term:</label>
         <input type="text" name="term" placeholder="Enter the term">
         </div>
        
        <div class="inputContainer">
        <label>Image File:</label>
        <input type="file" name="image"> 
        </div>
        
        <div class="inputContainer">
        <label>Audio file: </label>
        <input type="file" name="audio">
        </div>
        <div class="inputContainer"> 
        <input type="submit" value="Submit" name="submit">
        </div>
        </form>
        
        <br>
     <p>1.To Upload, Please select the appropriate section.</p>
     <p>2.Enter the Term that you want to display.</p>
     <p>3.Choose the image file.</p>
     <p>4.Choose the audio file for the image and the term.</p>
     <p>5.Click submit to add it to database. </p>  
<?php

/*
 *print "<pre>";
 *print_r($_POST);
 *print "</pre>";
 */
    if (isset($_POST['submit'])) {
        $target_dir = "images/terms/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        //if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ". <br>";
                $uploadOk = 1;
            } else {
                //echo "File is not an image. <br>";
                $uploadOk = 0;
                exit("That's not an image! <br>");
            }
        //}
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, the image file already exists. <br>";
        $uploadOk = 0;
        exit("That image is already uploaded. <br>");
    }
    // Check file size
    if ($_FILES["image"]["size"] > 3000000) {
        //echo "Sorry, your image file is too large. <br>";
        $uploadOk = 0;
        exit("Sorry, that image file is too large. <br>");
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
        $uploadOk = 0;
        exit("Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>");
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        exit("Sorry, your image file was not uploaded. <br>");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded. <br>";
        } else {
            echo "Sorry, there was an error uploading your image file. <br>";
        }
    }
    
    
    $target_dir = "audio/";
    $target_file = $target_dir . basename($_FILES["audio"]["name"]);
    $uploadOk = 1;
    
    // Check if image file is a actual audio file or fake audio file
    //if(isset($_POST["submit"])) {
        /*$check = getfilesize($_FILES["audio"]["tmp_name"]);
        if($check !== false) {
            echo "File is an audio - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an audio.";
            $uploadOk = 0;
        }*/
    //}
    
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, The audio file already exists. <br>";
        $uploadOk = 0;
        exit("Sorry, that audio file is already uploaded. <br>");
    }
    
    // Check file size
    /*if ($_FILES["audio"]["size"] > 3000000) {
        echo "Sorry, your audio file is too large.";
        $uploadOk = 0;
    }*/
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        exit("Sorry, your audio file was not uploaded. <br>");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["audio"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["audio"]["name"]). " has been uploaded. <br>";
        } else {
            echo "Sorry, there was an error uploading your audio file. <br>";
        }
    }
    
        try {
            $dbh = new PDO("mysql:host=$hostname;
            dbname=alex_aviation", $username, $password);
            echo "Connected to database. <br>";
            $section = $_POST['section'];
            $term = $_POST['term'];
            $image = "http://alex.greenrivertech.net/IT305/grcc-aviation/images/terms/". $_FILES["image"]["name"];
            //echo  $image;
            $audio = "http://alex.greenrivertech.net/IT305/grcc-aviation/audio/". $_FILES["audio"]["name"];
            //echo $_POST['audio'];
            //echo  $audio;
            //if(isset($_POST["submit"])) {
            $sql = "INSERT INTO $section (term, image, audio)
            VALUES ('$term', '$image', '$audio')";
            //echo $sql;
            $sql1 = "SELECT * FROM section1";
            $dbh->exec($sql);
            echo "Database entry has been created <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
            
        }
    }
?>

        
</script>
</body>
</html>

