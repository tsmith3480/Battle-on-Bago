<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 4/8/16
 * Time: 11:00 AM
 */

session_start();

if (!isset($_SESSION["contEmail"])){
    # Check for empty credentials
    switch (true) {
        case empty($_POST["txtEmail"]):
            showForm();
            exit();
        case empty($_POST["txtPassword"])   :
            showForm('You must enter a password');
            exit();
        default:
            $Email = $_POST["txtEmail"];
            $Password = $_POST["txtPassword"];
            break;
    }

    # Validate password
    if ($Password != Password($Email, $FirstName)) {
        showForm('Invalid email and password combination');
        exit();
    }

    setcookie('FirstName', $FirstName, strtotime('+1 week'), "/");
    $_SESSION["contEmail"] = $Email;
}

# Return users password from the DB
function Password($contID, &$FirstName)
{
    $dsn = 'sqlsrv:Server=agilebob.database.windows.net;Database=bob';
    $uname = 'bobadmin';
    $pwd = 'Agilebob60515';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO($dsn, $uname, $pwd, $options);

        $SQL = $db->prepare("SELECT Password, fName, contId FROM tblContestants WHERE Email = :contId");
        $SQL->bindValue(':contId', $contID);

        $SQL->execute();
        $Contestant = $SQL->fetch();

        if ($Contestant === false) {
            $Password = null;
        } else {
            $Password = $Contestant['Password'];
            $FirstName = $Contestant['fName'];
            $ContID = $Contestant['contId'];
            $_SESSION["contId"] = $ContID;
			header('Location: /account.php');
        }

        $SQL->closeCursor();
        $db = null;

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo("<p>Database error: $error_message</p>");
        exit();
    }

    return $Password;
}

    #Shows HTML login form
    function showForm($msg = "Please Log In")
    {
        $home = "'../'";	
		
        print ('
			<html>
			<head>
				<title>BOB Login</title>
  				<meta charset="utf-8">
  				<meta name="viewport" content="width=device-width, initial-scale=1">
  				<link href="_styles/main.css" type="text/css" rel="stylesheet" />
  				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  				<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  				<script type="text/javascript">
    				$(window).load(function(){
        				$("#myModal").modal("show");
    				});
					
					$(function(){
    					$("#myModal").on("hide.bs.modal", function (e) {
        					window.location.href = ' . $home . ';
    					});
					});
				</script>
			</head>
	
			<body>
				<div class="container"> <!-- Begin Container -->
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
        
        </div><br />
    </form>
    <div id="nav">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="account.php">My Account</a></li>
                <li><a href="createaccount.php">Create Account</a></li>
                <li><a href="prizes.php">Prizes</a></li>
                <li><a href="http://itweb.fvtc.edu/120297214/XML/BOB/final.html">Results</a></li>
            </ul>
        </nav>
    </div>

    <div id="sponsors">
        <fieldset>
            <legend>Pick Up Tickets At:</legend>
            <p><a href="http://www.fleetfarm.com/category/fishing/ice-fishing/tickets"><img src="_images/mills-fleet-farm.jpg"  alt="Fleet Farm"/></a></p>
            <p><a href="http://www.festfoods.com/"><img src="_images/Festival.png" alt="Festival"/></a></p>
            <p><a href="https://www.associatedbank.com/"><img src="_images/AssociatedBank.jpg" alt="Associated Bank"/></a></p>
        </fieldset>
    </div>


    <footer>
        <p>Agile Development 60515/60514, Group 2 (BoB)</p>
        <p>&copy; Copyright  by Ian Elliott</p>
        <p>All content is for Educational Use Only</p>
    </footer>

</div>

  					<!-- Modal -->
  					<div class="modal fade" id="myModal" role="dialog">  <!-- Begin Modal -->
    					<div class="modal-dialog"> <!-- Modal Dialog -->
    
      						<!-- Modal content-->
      						<div class="modal-content">  <!-- Begin Modal Content -->
        						<div class="modal-header">  <!-- Begin Modal Header -->
          							<button type="button" class="close" data-dismiss="modal">&times;</button>
          							<h4 class="modal-title">' . $msg . '</h4>
        						</div>  <!-- End Modal Header -->
        						<form method="post" action="">
        						<div class="modal-body">  <!-- Begin Modal Body -->
          							<div id="FormFields">
										<label for="txtEmail">Email Address</label>
										<input type="text" name="txtEmail" id="txtEmail" autofocus/><br />
						
										<label for="txtPassword">Password</label>
										<input type="password" name="txtPassword" id="txtPassword" />
									</div><!-- End of FormFields -->									
        						</div>  <!-- End Modal Body -->
        						<div class="modal-footer">  <!-- Begin Modal Footer -->
          							<input type="button" onClick="location.href=' . $home . '" value="Cancel"/>
          							<input type="submit" value="Log In" /><br /><br />
          							<a href="../createaccount.php">Create Account</a>
        						</div> <!-- End Modal Footer -->
        						</form>
      						</div>  <!-- End Modal Content -->
    					</div>  <!-- End Modal Dialog -->
  					</div>  <!-- End Modal -->
				</div>  <!-- End Container -->
			</body>
			</html> 
		');
    }
?>