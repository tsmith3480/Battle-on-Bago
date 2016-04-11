<!DOCTYPE html>
<?php
// Force valid login if one does not exist
require_once('_php/PasswordVerifySession.php');
?>
<html lang="en">
<head>
	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
         Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>My Account</title>
	<link href="_styles/main.css" type="text/css" rel="stylesheet" />
	<script>
		function confirm_action() {
			return confirm("Are you sure you wish to delete your account?\nThis cannot be undone.\n\nClick OK to continue or Cancel to return.")
		}
		function editaccount(){
			var x = document.getElementsByClassName("actinfo");
			for (var i = 0; i < x.length; i++) {
				x[i].removeAttribute('readonly');
				//alert(x[i]);

			}

		}
	</script>
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
                        <input type="text" class="textbox" id="email" name="email" placeholder="email" /><br />
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
				<li><a href="index.php">Home</a></li>
				<li><a href="account.php">My Account</a></li>
				<li><a href="createaccount.html">Create Account</a></li>
				<li><a href="prizes.html">Prizes</a></li>
				<li><a href="http://itweb.fvtc.edu/120297214/XML/BOB/final.html">Results</a></li>
			</ul>
		</nav>
	</div>

	<div>
		<fieldset class="AccountDetails">
			<legend>Account Details</legend>
			<?php
			$dsn = 'sqlsrv:Server=agilebob.database.windows.net;Database=bob';
			$uname = 'bobadmin';
			$pwd = 'Agilebob60515';
			$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			$contestant = $_SESSION["contEmail"];

			try {
				$db = new PDO($dsn, $uname, $pwd, $options);

				$SQL = $db->prepare("SELECT fName, lName, stAddress, City, State, Zip, Email, Phone
											FROM tblContestants
											WHERE Email = :contestant");
				$SQL->bindValue(':contestant', $contestant);

				$SQL->execute();
				$Contestant = $SQL->fetch();

				$fName = $Contestant['fName'];
				$lName = $Contestant['lName'];
				$Address = $Contestant['stAddress'];
				$City = $Contestant['City'];
				$State = $Contestant['State'];
				$Zip = $Contestant['Zip'];
				$Email = $Contestant['Email'];
				$Phone = $Contestant['Phone'];

				echo ('
							<p>	<span class="label">First Name: </span><input class="actinfo" type="text" readonly name="fname" value='."$fName".' ></p>
							<p>	<span class="label">Last Name: </span><input class="actinfo" type="text" name="lName" value='."$lName".' readonly></p>
							<p><span class="label">Address: </span><input class="actinfo" type="text" name="stAddress" value='."$Address".'readonly></p>
							<p><span class="label" >City: </span><input class="actinfo" type="text" name="City" value='."$City".' readonly> </p>
							<p><span class="label" >State: </span><input class="actinfo" type="text" name="State" value='."$State".' readonly> </p>
							<p><span class="label" >Zip Code: </span><input class="actinfo" type="text" name="Zip" value='."$Zip".' readonly> </p>
							<p><span class="label" >">Email Adress: </span><input class="actinfo" type="text" name="Email" value='."$Email".' readonly></p>
							<p><span class="label" >Phone #: </span><input class="actinfo" type="text" name="Phone" value='."$Phone".' readonly></p>
						');

				$SQL->closeCursor();
				$db = null;

			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				echo("<p>Database error: $error_message</p>");
				exit();
			}
			?>
			<form>
				<input type="submit" class="button" name="btnEdit" id="btnEdit" value="Edit" onclick="editaccount()"/>
			</form>
			<form action="./_php/deleteAccount.php" method="post">
				<input type="submit" class="button" name="btnDelete" id="btnDelete" value="Delete Account" onclick="return confirm_action()"/>
			</form>
		</fieldset>

		<form class="TicketRegistration">
			<h2>Ticket Registration</h2><br />
			<label for="txtTicket">Ticket #:</label><input type="text" id="txtTicket" name="txtTicket" /><br /><br />
			<input type="submit" value="Register Ticket" />
		</form>

		<fieldset class="RegisteredTickets">
			<legend>Registered Tickets</legend>
			<?php
			$dsn = 'sqlsrv:Server=agilebob.database.windows.net;Database=bob';
			$uname = 'bobadmin';
			$pwd = 'Agilebob60515';
			$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			$contID = $_SESSION["contId"];
			$i = 1;

			try {
				$db = new PDO($dsn, $uname, $pwd, $options);

				$SQL = $db->prepare("SELECT t.ticketNum FROM tblTickets t
										JOIN tblContestants c ON c.contId = t.contId
										WHERE c.contId = :contID
										ORDER BY t.ticketNum ASC");
				$SQL->bindValue(':contID', $contID);

				$SQL->execute();
				$Tickets = $SQL->fetch();

				while ($Tickets != null){
					$Ticket = $Tickets['ticketNum'];

					echo("
							<p><span class='label'>Ticket $i: </span>$Ticket</p>
						");

					$i++;
					$Tickets = $SQL->fetch();
				}

				$SQL->closeCursor();
				$db = null;

			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				echo("<p>Database error: $error_message</p>");
				exit();
			}
			?>
		</fieldset>
	</div>

	<footer>
		<p>Agile Development 60515/60514, Group 2 (BoB)</p>
		<p>&copy; Copyright  by Ian Elliott</p>
		<p>All content is for Educational Use Only</p>
	</footer>
</div>
</body>
</html>
