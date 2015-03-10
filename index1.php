
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
    
    <script src="http://code.jquery.com/jquery.js"></script>
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
              echo "><a href='http://alex.greenrivertech.net/IT305/grcc-aviation/index.php?page=$option'>";
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

    <br>
        
     
    <!-- Footer -->
      
      <footer>
        <hr>
        <p>&copy; GRCC Aviation 2014</p>
      </footer>
    

</script>
</body>
</html>

