<?php
  session_start();
  ob_start();
  
  
  
  /* What page are we on? */
  if (isset ($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = "home";
  }
  if (!isset($_SESSION['permissions'])) {
    $page = "login";
  }

?>
<!DOCTYPE html>

<html>
<head>
    
    <title><?php
    if (isset($page)) {
    echo ucwords($page);
    } else {
    echo "GRCC Aviation ";
    }
    ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="http://malsup.github.io/jquery.cycle2.center.js"></script>
    <!-- Accordian's java script-->    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
   <script>
  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content",
      collapsible: true
   
    });
  });
  </script>
</head>

<body>
    <div class="menu-wrap">
    <!--Navigation Menu-->
    <nav class="menu">
        
    <ul class="active">
        <li><div id="logo"></div></li>
        <?php
            $options = array("home", "learn", "login", "about");
            foreach ($options as $option) {
              echo "<li ";
              if ($page == $option) {
                echo 'class="current-item"'; 
              };
              echo "><a href='?page=$option'>";
              echo ucwords($option);
              echo "</a></li>";
            }
          ?>
    
    <!--
          <li <?php if ($page == "about") echo 'class="current-item"'; ?> ><a href="?page=about">About Us</a></li>
          <li <?php if ($page == "section1") echo 'class="current-item"'; ?> ><a href="?page=section1">Section</a></li>
          <li <?php if ($page == "learn") echo 'class="current-item"'; ?> ><a href="?page=learn">Contact</a></li>
          <li <?php if ($page == "contact") echo 'class="current-item"'; ?> ><a href="?page=contact">Contact</a></li>
          <li <?php if ($page == "upload") echo 'class="current-item"'; ?> ><a href="?page=upload">Upload</a></li>
          <li <?php if ($page == "login") echo 'class="current-item"'; ?> ><a href="?page=login">Login</a></li>
  -->
    
    </nav>
    </div>
    <?php if (isset($_SESSION['permissions'])) {
    $user = $_SESSION['permissions'];
    echo "<div class='container-element'>
            <div class='text-right-element'>
              Welcome, $user<br>
              <a href = 'logout.php'>Log out</a><br>";
              if ($user == 'teacher')
              {
                echo "<a href='?page=upload'> Upload Terms</a><br>";
              }
            echo "</div>
          </div>";
    } ?>
    <br>
        
        <!-- Page content goes here -->
      <?php
        include ($page.".php");
      ?>
    
    <!-- Footer -->
      <br>
        <br>
            <br>
                <br>
    
      <footer>
        <hr>
        <p>&copy; GRCC Aviation 2014 </p>
        
      </footer>


</body>
</html>

