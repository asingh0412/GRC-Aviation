<?php include "index1.php"; ?>
<link rel="stylesheet" type="text/css" href="css/style.css">

        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="http://malsup.github.io/jquery.cycle2.center.js"></script>

<?php
     
    require "../db.php";
    
    $section = 1;
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
    
        <button id='Next' class='nextControl'><img src='images/arrow_next.png' alt=''></button>
        <button id='Back' class='prevControl'><img src='images/arrow_prev.png' alt=''></button>
    
    <div class='cycle-slideshow'
        data-cycle-fx='none'
        data-cycle-speed='10'
        data-cycle-manual-speed='00'
        data-cycle-timeout='0'
        data-cycle-prev='.prevControl'
        data-cycle-next='.nextControl'
        data-cycle-center-horz=true
        data-cycle-center-vert=true
        data-cycle-slides= '> div'>";
    
    foreach ($result as $row) {
        $term = $row['term'];
        $audio = $row['audio'];
        $image = $row['image'];

        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false){
            echo "
            <div>
            <div> 
                <div class='place'>
                    <div class='reveal'>
                        <img src='$image' alt='' class='imgsize'> 
                    </div>
                            
                    <div class='term'>
                        $term
                    </div>
                </div>
            </div>
            
            <br>
            
            <audio controls>
                <source src='$audio' type='audio/mpeg'>
                Your browser does not support the audio element.
            </audio></div>"; 
            
            echo "";
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false ){
            echo "
            <div>
            <div class='flip-container'> 
                <div class='flipper'>
                    <div class='front'>
                        <img src='$image' alt='' class='imgsize'> 
                    </div>
                            
                    <div class='back'>
                        $term
                    </div>
                </div>
            </div>
            <br>
            <audio controls class='audioC'>
         
            <source src='$audio' type='audio/mpeg'>
            Your browser does not support the audio element.
            </audio>
            </div>"; 
            
            echo "";
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false){
            echo "
            <div> 
            <div> 
                <div>
                    <div class='reveal'>
                        <img src='$image' alt='' class='imgsize'> 
                    </div>
                            
                    <div class='term'>
                        $term
                    </div>
                </div>
            </div>
            
            <br>
            
            <audio controls>
                <source src='$audio' type='audio/mpeg'>
                Your browser does not support the audio element.
            </audio></div>"; 
            
            echo "";
        }
 
    }
     echo "<br></div>
     
    <script>
    $('.flip-container').click(function() {
        $(this).toggleClass('active');
    });
    
    $('.reveal').click(function(){
        $('.term').toggle();
    });
    </script>
    
    ";
?>