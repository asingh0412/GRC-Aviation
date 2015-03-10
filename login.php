<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
      <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

    <script src="js/modernizr.js"></script>
</head>
<body>
    
    <br>
    <!--Rest of the page-->
  <section class="container">
    <!--<div class="login">-->
    <h1>Login to GRCC Aviation</h1>
    <p>To get access to the site, Please login</p>
    <p>or <a href="mailto:george@greenriver.edu">Contact Us</a></p>
    <?php
    /*
        //print_r($_SESSION);
        if ($_POST){
            $form_data = $_POST;
            //do login stuff
            $username = $_POST[ 'username' ];
            $password = $_POST[ 'password' ];
            $user = "alex_grccuser";
            $pass = "grccuser";
            $db = new PDO( 'mysql:host=localhost;dbname=alex_aviation-users', $user, $pass );
            $sql = "SELECT * FROM users WHERE username=:username";
            
            $query = $db->prepare( $sql );
            $query->execute( array( ':username'=>$username ) );
            $results = $query->fetchAll( PDO::FETCH_ASSOC ); 
            
            foreach( $results as $row ){ 
                $password_check = $row[ 'password' ];
                //print_r( $password_check );
            }
            $check = $password == $password_check;
            if ( $check && ($_POST['username'] != "") && ($_POST['password'] != "")){
               //print_r( "This is a valid user" );
               $_SESSION["permissions"] = $username;
               //print_r($_SESSION);
               header('Location: http://alex.greenrivertech.net/IT305/grcc-aviation/index.php?page=home');
            } else {
               print_r( "Authentication failed, please Try again.");
               //print_r($_SESSION);
            }
        } else{
        }
        */
        if ($_POST) {
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        
        //echo "email: $email, pwd: $pwd";
        
        if (strpos($email, "@mail.greenriver.edu") !== false and $pwd == "q") {
          $_SESSION['permissions'] = "student";
          header('Location: http://alex.greenrivertech.net/IT305/grcc-aviation/index.php?page=home');
        }
        else if (strpos($email, "@greenriver.edu") !== false and $pwd == "a") {
          $_SESSION['permissions'] = "teacher";
          header('Location: http://alex.greenrivertech.net/IT305/grcc-aviation/index.php?page=home');
        }
        else {
          echo "<p>Invalid login. Please try again.</p>";
        }
      }
    ?>
    

    
        <div class="inner-screen">
          <div class="form">
            <form name="login" action="index.php" method="POST">
                
                <input type="text" class="zocial-dribbble" name="email" placeholder="Username"/><br />
                
                <input type="password" class="zocial-dribbble" name="password" placeholder="Password"/><br />
                <button type="submit">Login</button>
            </form>
    
    </div> 
  </div> 


      <span class="arrow"></span>
    <!--</div>-->

  </section>
    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  
</body>
</html>
