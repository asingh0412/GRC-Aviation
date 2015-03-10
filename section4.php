<?php include "index1.php"; ?>
<link rel="stylesheet" type="text/css" href="css/style.css">

        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="http://malsup.github.io/jquery.cycle2.center.js"></script>

<?php
    
    require "../db.php";
    
    $section = 4;
    try {
        $conn = new PDO("mysql:host=$hostname;
                       dbname=alex_aviation", $username, $password);
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
     *display the database
     */
    
    echo "<h2>Section $section</h2>";
    $sql = "SELECT term, image, audio FROM section" . $section . " ORDER BY p_id";
    $result = $conn->query($sql);
    
    // data-cycle-prev='#prev'
    //data-cycle-next='#next'
    echo "<!-- prev/next links -->
    <div class=center>
        <button id='Next' class='nextControl'><img src='images/arrow_next.png' alt=''></button>
        <button id='Back' class='prevControl'><img src='images/arrow_prev.png' alt=''></button>
    </div>
    <div class='cycle-slideshow'
        data-cycle-fx='none'
        data-cycle-speed='10'
        data-cycle-manual-speed='00'
        data-cycle-timeout='0'
        data-cycle-prev='.prevControl'
        data-cycle-next='.nextControl'
        data-cycle-center-horz=true
        data-cycle-center-vert=true
        data-cycle-slides= '> div'
    >
   
    ";
    
    
    
    foreach ($result as $row) {
        $term = $row['term'];
        $audio = $row['audio'];
        $image = $row['image'];
        
        // test echo
        //echo "<img src='$image' alt='' width=500 height=500 data-cycle-title='$term' data-cycle-desc='' > ";
        
        //<div class='flip-container' onclick='this.classList.toggle('hover');'>
        echo "
        <div>
        <div class='flip-container'> 
            <div class='flipper'>
                <div class='front'>
                    <img src='$image' alt='' width=500 height=100%> 
                </div>
                        
                <div class='back'>
                    $term
                </div>
            </div>
        </div>
        <br><audio controls>
     
        <source src='$audio' type='audio/mpeg'>
        Your browser does not support the audio element.
        </audio></div>"; 
        
           echo "";
           
           
        
    }
     echo "<br></div><div class=center>
     
    </div>
    <script>
    $('.flip-container').click(function() {
        $(this).toggleClass('active');
    });
</script>
    
    ";
/*

<div class='center'>
    <a href=# id='prev'>Prev</a> 
    <a href=# id='next'>Next</a>
</div>"
*/
    
    
?>