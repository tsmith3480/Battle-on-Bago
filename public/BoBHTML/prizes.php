<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Battle on Bago Prizes</title>
<link href="_styles/main.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <div id="wrap">
  	<div id="header">
  		<div id="logo">
   			 <header>
				<img src="_images/BobLogo.png" alt="BoB Logo" />
      			<h1>Welcome to Battle on Bago</h1>
    		</header>
    	</div>
    </div>
    <form action="http://battleonbago.azurewebsites.net/_php/LoginOut2.php" method="post">
      <div id="sign-in">
      	<?php
            if (isset($_COOKIE['FirstName'])) {
                echo ('<h2>Welcome, ' . $_COOKIE['FirstName'] . '</h2>');
                echo ('<h4><a href="_php/Logout.php">Not you? Sign-out</a></h4>');
            } else {
                echo ('
                    <div id="user_logIn">
                        <input type="submit" class="button" name="btnLogin" id="btnLogin" onclick="return" value="Login"/><br />
                        <input type="button" class="button" name="btnSignUp" id="btnSignUp" value="Sign Up" />
                    </div>

                    <div id="password_signup">
                        <input type="email" class="textbox" id="email" name="email" placeholder="email" /><br />
                        <input type="password" class="password" id="password" name="password" placeholder="password" />
                    </div>
                ');
            }
          ?>
     </div><br />
    </form> 
    <div id="nav">
   	 <nav>
    		<ul>
     			 <li><a href="/">Home</a></li>
     	 		<li><a href="account.php">My Account</a></li>
     			 <li><a href="createaccount.php">Create Account</a></li>
     			 <li><a href="prizes.php">Prizes</a></li>
     			 <li><a href="http://itweb.fvtc.edu/120297214/XML/BOB/final.html">Results</a></li>
     		 </ul>
   	 </nav> 
    </div>
   
    <div>
      
    </div>

    <footer>
		<p>Agile Development 60515/60514, Group 2 (BoB)</p>
		<p>&copy; Copyright  by Ian Elliott</p>
		<p>All content is for Educational Use Only</p>
    </footer>
  </div>
</body>
</html>
