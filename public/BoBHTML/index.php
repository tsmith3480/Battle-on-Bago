<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
         Remove this if you use the .htaccess -->
         
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	
    <title>Battle on Bago Home Page</title>
    
    <link href="_styles/main.css" type="text/css" rel="stylesheet" />
    <link href="_styles/maxwidth767.css" rel="stylesheet" media="only screen and (max-width : 767px)"/>
</head>

<body>
<div id="wrap">
    <div id="header">
        <div id="logo">
            <header>
                <img src="_images/Bob-Logo-Header.png" alt="BoB Logo" />
            </header>
        </div><!--end "logo"-->
    </div><!-- end "header" -->

    <form action="http://battleonbago.azurewebsites.net/_php/LoginOut2.php" method="post">
        <div id="sign-in-block">
        <?php
            if (isset($_COOKIE['FirstName'])) {
                echo ('
                  <div id="sign-in">
                    <h2>Hello, ' . $_COOKIE['FirstName'] . '</h2>
                  </div><br /><!--end "sign-in"-->
                 ');
                echo ('
                  <div id="sign-in">
                    <h4><a href="_php/Logout.php">Sign-out</a></h4>
                  </div><br /><!--end "sign-in"-->
                ');
            } else {
                echo ('                  
                 <div id="sign-in">
                    <a href="account.php">Sign In</a>
                 </div><br /><!--end "sign-in"-->
                ');
            }
        ?>
        </div><br /><!--end "sign-in"-->
    </form><!--end form-->
    

    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="account.php">My Account</a></li>
            <li><a href="createaccount.php">Create Account</a></li>
            <li><a href="prizes.php">Prizes</a></li>
            <li><a href="liveResults.html">Results</a></li>
        </ul>
    </nav>
    
    <div class="sponsors">
        <img src="_images/sponsors_home3.jpg" alt="Sponsors" />
    </div>
    
    <div id="TextAndVideo">
        <h2 style="font-size: 4em; font-weight: bolder; margin: 5px;">Welcome to Battle On Bago!</h2>
    	<video style="width: 100%" preload="auto" controls>

			<source src="_video/timelapse.mp4" type="video/mp4">
			<source src="_video/timelapse.webm" type="video/webm">
			<source src="_video/timelapse.ogv" type="video/ogg">

			<p>Your browser does not support the HTML5 video tag. Please update to a current browser.</p>
		</video>
		</br> 
		<h3><b>The MidWest’s largest ice fishing tournament and the family and fishing event of The year!</b></h3>
		</br>
		<p><b>Battle on Bago</b> was created in 2007 by a group of five Oshkosh Southwest Rotarians in order to support area youth and conservation efforts throughout the state of Wisconsin.</p>
		</br>
		<p>Beneficiaries receiving funds from Battle on Bago embody the mission statement of the event <b>“For Kids & Conservation”</b> and serve as just the beginning of a long list of organizations and youth Battle on Bago will benefit in the future.</p>
		</br>
		<h3>Battle on Bago has generated net proceeds of nearly <b>$500,000!</b></h3>

		<p>With over $275,000 in prizes and the structure of how you can win a prize, everyone has a chance to go home a winner. Battle on Bago is an event supported by the community and returned directly back to the community. If you don’t feel like fishing, you are more then welcome to join us in the tent (<b>Free Admission</b>) for great food & drinks, live music and tons of awesome raffle prizes.</p></br>
		<h3><b>We hope you join us this year for the 9th annual Battle on Bago!</b></h3>
    </div><!--end "TextAndVideo"-->

    <div id="sponsors">
        <fieldset>
            <legend>Pick Up Tickets At:</legend>
            <p><a href="http://www.fleetfarm.com/category/fishing/ice-fishing/tickets"><img src="_images/mills-fleet-farm.jpg"  alt="Fleet Farm"/></a></p>
            <p><a href="http://www.festfoods.com/"><img src="_images/Festival.png" alt="Festival"/></a></p>
            <p><a href="https://www.associatedbank.com/"><img src="_images/AssociatedBank.jpg" alt="Associated Bank"/></a></p>
        </fieldset>
    </div><!--end "sponsors"-->

    <footer>
        <p>Agile Development 60515/60514, Group 2 (BoB)</p>
        <p>&copy; Copyright  by Ian Elliott</p>
        <p>All content is for Educational Use Only</p>
    </footer>

</div><!--end "wrap"-->
</body>
</html>