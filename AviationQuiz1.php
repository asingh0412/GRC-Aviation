<!DOCTYPE html>

<html>
<head>
    <title>GRCC Aviation Quiz1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="http://code.jquery.com/jquery.js"></script>
    <!--
    #################
    THIS IS THE TIMER
    #################
    -->
    <script type="text/javascript">
        var seconds=30; 
        var int = window.setInterval("countdown()",1000);
    
        function countdown() 
        { 
            seconds--; 
            var count = document.getElementById("count"); 
            count.innerHTML = seconds; 
            if (seconds == 0) 
            { 
            window.clearInterval(int);
            submit();
            } 
        }
    </script>
</head>

<body>
    <div class="menu-wrap">
    <!--Navigation Menu-->
    <nav class="menu">
        
    <ul class="active">
        <li><div id="logo"></div></li>
        <li><a href="home.php">Home</a></li>
        <li>
            <a href="#">Learn it<span class="arrow">&#9660;</span></a>
            <ul class="sub-menu">
                    <li><a href="section1.php">Section 1</a></li>
                    <li><a href="section2.php">Section 2</a></li>
                </ul>
        </li>
        
        <li class="current-item">
            <a href="#">Quiz<span class="arrow">&#9660;</span></a>
            <ul class="sub-menu">
                    <li><a href="AviationQuiz1.php">Quiz 1</a></li>
                    <li><a href="AviationQuiz2.php">Quiz 2</a></li>
                    
                    
                </ul>
        </li>
        <li><a href="Aboutus.php">About us</a></li>
        <li><a href="index.php">Login</a></li>
         <li><a href="uploadform.php">Upload</a></li>
         
    </ul>
 
    <a class="toggle-nav" href="#">&#9776;</a>
 

    </nav>
    </div>
    <br>
    <!--Rest of the page-->
    <button id="Next" class="btnNext">Next</button>
    <button id="Back" class="btnNext">Back</button>
    
    <h1>Quiz 1</h1>
    <!-- Here's the timer on the page ID of "count" -->
    <div id="count"></div>
    
    <div id="InBetweenForwardAndBackButtons">
    
        <span class="flash" id="flash4">
            <div class="flashcard">
                <div class="question"><img alt="" src="Images/Aircraft Owners and Pilots Association (AOPA).png" width="98%"></div>
                <div class="answer" style="display: block">Aircraft Owners and Pilots Association (AOPA)</div>
            </div>
        </span>
        
        <span class="flash" id="flash3">      
            <div  class="flashcard">
                <div class="question"><img alt="" src="Images/Flight Review.png" width="98%"></div>
                <div class="answer" style="display: block">Flight Review</div>
            </div>
        </span>
        
        <span class="flash" id="flash2">
            <div class="flashcard">
                <div class="question"><img alt="" src="Images/FAA Certificated Flight Instructor (CFI).png" width="98%"></div>
                <div class="answer" style="display: block">FAA Certificated Flight Instructor (CFI)</div>
            </div>
        </span>
        
        <span class="flash" id="flash1">
            <div class="flashcard">
                <div class="question"><img alt="" src="Images/Federal Aviation Regulations.png" width="98%"></div>
                <div class="answer" style="display: block">Federal Aviation Regulations</div>
            </div>
        </span>
            
            <!--This div section holds the audio buttons for the match game-->
            
            <label class="horizontaloptions" >
                <input type="radio" name="options" value="1" id="radio1" style="display: none">
                    <img src="Images/audioIcon.png" alt="" height="100px" id="r1">
                <audio id="audio1"><source src="audio/Aircraft Owners and Pilots Association (AOPA).mp3" type="audio/mp3"></audio>
            </label>
                        
            <label class="horizontaloptions">
                <input type="radio" name="options" value="2" id="radio2" style="display: none">
                    <img src="Images/audioIcon.png" alt="" height="100px" id="r2">
                <audio id="audio2"><source src="audio/Flight Review.mp3" type="audio/mp3"></audio>
            </label>
                        
            <label class="horizontaloptions">
                <input type="radio" name="options" value="3" id="radio3" style="display: none">
                    <img src="Images/audioIcon.png" alt="" height="100px" id="r3">
                <audio id="audio3"><source src="audio/FAA Certificated Flight Instructor (CFI).mp3" type="audio/mp3"></audio>
            </label>
                        
            <label class="horizontaloptions">
                <input type="radio" name="options" value="4" id="radio4" style="display: none">
                    <img src="Images/audioIcon.png" alt="" height="100px" id="r4">
                <audio id="audio4"><source src="audio/Federal Aviation Regulations.mp3" type="audio/mp3"></audio>
            </label>
            
            <button id="submitButton" onclick="submit()">Submit</button>
            <p>Instructions: Click the speaker icons to listen to the audio. Choose an answer before time runs out. Submit your answer by clicking "submit".</p>
    </div>
    

    <script>
        
    $(document).ready(function(){
        $("#InBetweenForwardAndBackButtons span").each(function(e) {
            if (e != 0)
                $(this).hide();
        });
    
        $("#Next").click(function(){
            
            if ($("#InBetweenForwardAndBackButtons span:visible").next().length != 0){
                $("#InBetweenForwardAndBackButtons span:visible").next().show().prev().hide();
            }
            else {
                $("#InBetweenForwardAndBackButtons span:visible").hide();
                $("#InBetweenForwardAndBackButtons span:first").show();
            }
            return false;
            
        });
    
        $("#Back").click(function(){
            if ($("#InBetweenForwardAndBackButtons span:visible").prev().length != 0)
                $("#InBetweenForwardAndBackButtons span:visible").prev().show().next().hide();
            else {
                $("#InBetweenForwardAndBackButtons span:visible").hide();
                $("#InBetweenForwardAndBackButtons span:last").show();
            }
            return false;
        });
    });
    
    
    var counter = 0;
    var trueAnswer = "AOPA";
    var selectAnswer = "";
    var score = 0;
    
    $("#radio1").click(function(){
        //loops to reset each button to unclicked state
        for(var i = 1;i < 5;i++){
            $("#r" + [i]).attr("src","Images/audioIcon.png")
        }
        //changes the selected button to clicked state
        $("#r1").attr("src","Images/audioiconclicked.png")
        //plays the associated audio
        $("#audio1").get(0).play();
        selectAnswer = "AOPA";
    });
    $("#radio2").click(function(){
        for(var i = 1;i < 5;i++){
            $("#r" + [i]).attr("src","Images/audioIcon.png")
        }       
        $("#r2").attr("src","Images/audioiconclicked.png")
        $("#audio2").get(0).play();
        selectAnswer = "Flight Review";
    });
    $("#radio3").click(function(){
        for(var i = 1;i < 5;i++){
            $("#r" + [i]).attr("src","Images/audioIcon.png")
        }
        $("#r3").attr("src","Images/audioiconclicked.png")
        $("#audio3").get(0).play();
        selectAnswer = "CFI";
    });
    $("#radio4").click(function(){
        for(var i = 1;i < 5;i++){
            $("#r" + [i]).attr("src","Images/audioIcon.png")
        }
        $("#r4").attr("src","Images/audioiconclicked.png")
        $("#audio4").get(0).play();
        selectAnswer = "FAR";
    });
    function submit() {
        window.clearInterval(int)
        $("#submitButton").hide();
        if (selectAnswer == trueAnswer) {
            alert("That is the correct answer");
            score++;
        }
        else {
            alert("That is not correct.  The correct answer is choice 1");
        }
    }
    
    </script>
    
</script>
</body>
</html>

