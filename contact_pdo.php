<!DOCTYPE html>
<?php
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    //Print the POST data
    /*
     print "<pre>";
     print_r($_POST);
     print "</pre>";
         [fname] => alex
    [lname] => kwon
    [company] => a
    [email] => ec916c33@opayq.com
    [tel] => 2533948395
    [datemet] => 2014-11-04
    [address] => e

    */
    require "db.php";
    
    
?>
<html>
<head>
    <title>Contact Form</title>
    <meta charset="UTF-8">
    
</head>

<body>

	<h1>Contacts</h1>
        <form method="post" action="contact_pdo.php" autocomplete="on">
        <fieldset>
                    <legend>Contact Info</legend>
                    First Name:&nbsp;<input type="text" size="20" maxlength="20" name="fname" required="required" autofocus>&nbsp;
		    Last Name:&nbsp;<input type="text" size="20" maxlength="20" name="lname" required="required"><br>
		    <label>Company:
                        <input type="text" size="20" maxlength="20" name="company">
                    </label>
                    <label>Job Title</label><input type="text" size="20" maxlength="20" name="company">
                    E-mail:<input type="email" name="email" required="required" autocomplete="on"><br>
                    
                    <label>Phone Number:
                        <input type="tel" size="10" maxlength="10" name="tel" id="tel">
                    </label>
                    <label>Date Met:
                        <input type="date" name="datemet">
                    </label>
                    <label>Where Met:</label>
                    <select>
                        <option value="grcc">GRCC</option>
                        <option value="seattle">Seattle</option>
                        <option value="other">Other</option>
                      </select>
                    <br>
                    <label>Address</label><br>
                    <textarea rows="5" cols="20" name="address" id="address"></textarea><br>
                    <label>Notes</label><br>
                    <textarea rows="5" cols="20" name="notes" id="notes"></textarea>
                    <br>
                </fieldset>
        <input type="submit" name="submit">
        </form>
        <h1> Contact Info </h1>
        <?php
        try {
        $conn = new PDO("mysql:host=$hostname;
                       dbname=alex_grcc", $username, $password);
        echo "connected to database<br>";
        /* Insert statement
        $sql = "INSERT INTO section1 (term) VALUES ('aviationn')";
        use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        */
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        /*
        INSERT INTO `alex_grcc`.`contacts` (`p_id`, `fname`, `lname`, `company`, `email`, `tel`, `datemet`, `address`, `notes`) VALUES (NULL, $fname, $lname, $company, $email, $tel, $datemet, $address, $notes);
         $sql = "INSERT INTO section1 (term) VALUES ('aviationn')";
           
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        */
        
         $sql = "SELECT * FROM contacts ORDER BY p_id";
        $result = $conn->query($sql);
        echo "<table style='width:100%'>
                <tr>
                    <th>First Name </th>
                    <th>Last Name </th>
                    <th>Company </th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Date Met</th>
                    <th>Address</th>
                    <th>Notes</th>
                </tr>
                
                
                ";
        foreach ($result as $row) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $company = $row['company'];
            $email = $row['email'];
            $tel = $row['tel'];
            $datemet = $row['datemet'];
            $address = $row['address'];
            $notes = $row['notes'];
            echo "<td>$fname $lname</td></table>";
    }
        if (array_key_exists('submit', $_POST))
        {
            //if submit is pressed store the variables
            $isvalid= true;
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $company = trim($_POST['company']);
            $email = trim($_POST['email']);
            $tel = trim($_POST['tel']);
            $datemet = trim($_POST['datemet']);
            $address = trim($_POST['address']);
            $notes = trim($_POST['notes']);
            
            // check to make sure all fields are filled out
            if(empty($fname) || empty($lname) || empty($company) ||
               empty($email) || empty($tel) || empty($datemet)
               || empty($address) ) {
                
                echo "Please fill out all fields";
                $isvalid=false;
            }
            
            // check for valid email
            $emailregex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

            if (!preg_match($emailregex, $email)) {
            echo "Invalid Email ID.";
            $isvalid=false;
            }
            
            
            // check for valid telephone
            $telregex = '/^\+?(\(?[0-9]{3}\)?|[0-9]{3})[-\.\s]?[0-9]{3}[-\.\s]?[0-9]{4}$/';
            if (!preg_match($telregex, $tel) == 1)
            {
            echo "Please enter a valid phone number";
            $isvalid=false;
            }
            
            // print summary if fields pass validation
            if($isvalid){
                echo "First Name: " . $fname . "<br>";
                echo "Last Name: " . $lname . "<br>";
                echo "Company: " . $company . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Telephone: " . $tel . "<br>";
                echo "Date Met: " . $datemet . "<br>";
                echo "Address: " . $address . "<br>";
                echo "Notes: " . $notes . "<br>";
                        
            }
            
        }
        
        ?>
        
        <h1>Contacts Database</h1>
      
        
</body>
</html>
