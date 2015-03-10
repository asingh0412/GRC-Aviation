<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.cycle2.js"></script>
<?php
    
    require "../db.php";
    /*
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
*/
    try {
        $conn = new PDO("mysql:host=$hostname;
                       dbname=alex_aviation", $username, $password);
        echo "connected to database<br>";
        /*$sql = "INSERT INTO section1 (term) VALUES ('aviationn')";
       
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    */
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    /*
     *display the database
     */
    
    echo "<h2>Section 1</h2>";
    echo "<div class='cycle-slideshow'>";
        
        $sql = "SELECT term, image, audio FROM section1 ORDER BY p_id";
        $result = $conn->query($sql);
        foreach ($result as $row) {
            $term = $row['term'];
            $audio = $row['audio'];
            $image = $row['image'];

            echo "<div class='flip-container' onclick='this.classList.toggle('hover');'>
            <div class='flipper'>
                    <div class='front'>
                        <img src='$image' alt=''> 
                    </div>
                    <div class='back'>
                        $term
                    </div>
            </div>
        </div>";     
        }
    echo "</div>";
    echo "<p id='test'>right here</p>";
    ?>
    <script>


    
    
    
    
    </script>
