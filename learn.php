<?php require "../db.php";

    

    try {
        $conn = new PDO("mysql:host=$hostname;
                       dbname=alex_aviation", $username, $password);
  
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

echo "<h1>Learn</h1><p>Click a section to choose it. Click the flash card to reveal the key term and play the word.</p><div id='accordion'>";

  for ($i=1;$i<9;$i++){    
    echo "<h3>Section $i</h3><div> <p>";
    
      $sql = "SELECT term, image, audio FROM section" . $i . " ORDER BY p_id";
      $result = $conn->query($sql);
      
    
  
      foreach ($result as $row) {
        
          $term = $row['term'];
          $audio = $row['audio'];
          $image = $row['image'];
 
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false){
           $count++;
           echo "<div>
                    <div>
                        <div id='reveal$count'>
                            <p><img src='$image' alt='' class='fitimage'></p>
                        </div>
                    <div id='hidestuff$count' >
                        <p class='font'>$term</p>
                        <audio controls>
                            <source src='$audio' type='audio/mpeg'>
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                  </div>  
                </div>
                <script>
                
                    $(function(){
                        $('#hidestuff$count').hide();
                    });
                
                    $('#reveal$count').click(function(){
                    $('#hidestuff$count').toggle();
                    });
                </script>";
                
          }
          elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false){
           $count++;
           echo "<div>
                    <div>
                        <div id='reveal$count'>
                            <p><img src='$image' alt='' class='fitimage'></p>
                        </div>
                    <div id='hidestuff$count' >
                        <p class='font'>$term</p>
                        <audio controls>
                            <source src='$audio' type='audio/mpeg'>
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                  </div>  
                </div>
                <script>
                
                    $(function(){
                        $('#hidestuff$count').hide();
                    });
                
                    $('#reveal$count').click(function(){
                    $('#hidestuff$count').toggle();
                    });
                </script>";
                
          }
    else  {
          
           echo "
            <div class='Fstage'>
  <div class='Fflashcard'>
    <div class='Ffront'>
      <p><img src='$image' alt='' class='fitpic'></p>
    </div>
    <div class='Fback'>
      <p>$term</p>
      <audio controls>
                <source src='$audio' type='audio/mpeg'>
                Your browser does not support the audio element.
            </audio>
    </div>
  </div>  
</div>"; 
      }
  }
      echo "</p>
    </div>";
    }
      echo "</div>";

 echo "
 <script>$(document).ready(function() {
  $('.Fflashcard').on('click', function() {
    $('.Fflashcard').toggleClass('Fflipped');
  });
});

    $('.flip-container').click(function() {
        $(this).toggleClass('active');
    });
    
    
    </script>";

?>