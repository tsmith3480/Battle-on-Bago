
<!DOCTYPE html>
<?php
// Force valid login if one does not exist
require_once('_php/PasswordVerifySessionModal.php');
?>
<html lang="en">
<head>
	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
         Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<title>My Account</title>
	
	<link href="_styles/main.css" type="text/css" rel="stylesheet" />
	<link href="_styles/maxwidth767.css" rel="stylesheet" media="only screen and (max-width : 767px)"/>
	<script>
		function confirm_action() {
			return confirm("Are you sure you wish to delete your account?\nThis cannot be undone.\n\nClick OK to continue or Cancel to return.")
		}
		
		function editaccount(){
			var x = document.getElementsByClassName("actinfo");
			for (var i = 0; i < x.length; i++) {
				x[i].readOnly = false;
				//alert(x[i]);
			}
			document.getElementById("acctInfo").id = "editInfo";
			document.getElementById("btnSave").style.display = "";
			document.getElementById("btnCancel").style.display = "";
			document.getElementById("btnEdit").style.display = "none";
			document.getElementById("txtState").style.display = "none"
			document.getElementById("lstState").style.display = "";
		}
		
		function canceledit () {
			var x = document.getElementsByClassName("actinfo");
			for (var i = 0; i < x.length; i++) {
				x[i].readOnly = true;
				//alert(x[i]);
			}
			document.getElementById("editInfo").id = "acctInfo";
			document.getElementById("btnSave").style.display = "none";
			document.getElementById("btnCancel").style.display = "none";
			document.getElementById("btnEdit").style.display = "";
			document.getElementById("txtState").style.display = ""
			document.getElementById("lstState").style.display = "none";
		}
	</script>
</head>

<body>
<div id="wrap">
	<div id="header">
		<div id="logo">
			<header>
				<img src="_images/Bob-Logo-Header.png" alt="BoB Logo" />
				<!--<h1>Welcome to Battle on Bago</h1>-->
			</header>
		</div>
	</div>
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
		</div><br />
	</form>

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


	<div id="accountdetails">
		
		<fieldset class="AccountDetails" name="AccountDets">
			<legend>Account Details</legend>
			<hr />
			<br />
			
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
				$fName = '"'.$Contestant['fName'].'"';
				$lName = '"'.$Contestant['lName'].'"';
				$Address = '"'.$Contestant['stAddress'].'"';
				$City = '"'.$Contestant['City'].'"';
				$State = '"'.$Contestant['State'].'"';
				$lstState = $Contestant['State'];
				$Zip = '"'.$Contestant['Zip'].'"';
				$Email = '"'.$Contestant['Email'].'"';
				$Phone = '"'.$Contestant['Phone'].'"';
				echo ('
						<fieldset  id="acctInfo">
						<form action="./_php/editAccount.php" method="post">	
							<p><span class="label">First Name: </span> <input class="actinfo" type="text" readonly name="fName" value='.$fName.'></p>
							<br />
							<p><span class="label">Last Name: </span> <input class="actinfo" type="text" readonly name="lName" value='.$lName.'></p>
							<br />
							<p><span class="label">Address: </span>	<input class="actinfo" type="text" readonly name="stAddress" value='.$Address.'></p>
							<br />
							<p><span class="label">City: </span> <input class="actinfo" type="text" readonly name="City" value='.$City.'></p>
							<br />
							<p><span class="label">State: </span> <input class="actinfo" id="txtState" type="text" readonly name="State" value='.$State.'>
								<select class="actinfo" id="lstState" name="State" style="display:none;width:154px;">
									<option value='.$State.' selected>'.$lstState.'</option>
							   		<option value="AK">AK</option>
     								<option value="AL">AL</option>
    								<option value="AR">AR</option>
    			 					<option value="AZ">AZ</option>
     								<option value="CA">CA</option>
     								<option value="CO">CO</option>
     								<option value="CT">CT</option>
     								<option value="DC">DC</option>
     								<option value="DE">DE</option>
     								<option value="FL">FL</option>
     								<option value="GA">GA</option>
     								<option value="HI">HI</option>
     								<option value="IA">IA</option>
     								<option value="ID">ID</option>
     								<option value="IL">IL</option>
     								<option value="IN">IN</option>
     								<option value="KS">KS</option>
     								<option value="KY">KY</option>
     								<option value="LA">LA</option>
     								<option value="MA">MA</option>
     								<option value="MD">MD</option>
     								<option value="ME">ME</option>
     								<option value="MI">MI</option>
     								<option value="MN">MN</option>
     								<option value="MO">MO</option>
     								<option value="MS">MS</option>
     								<option value="MT">MT</option>
     								<option value="NC">NC</option>
     								<option value="ND">ND</option>
     								<option value="NE">NE</option>
     								<option value="NH">NH</option>
     								<option value="NJ">NJ</option>
     								<option value="NM">NM</option>
     								<option value="NV">NV</option>
     								<option value="NY">NY</option>          
     								<option value="OH">OH</option>
     								<option value="OK">OK</option>
     								<option value="OR">OR</option>
     								<option value="PA">PA</option>
     								<option value="RI">RI</option>
     								<option value="SC">SC</option>
     								<option value="SD">SD</option>
     								<option value="TN">TN</option>
     								<option value="TX">TX</option>
     								<option value="UT">UT</option>
     								<option value="VT">VT</option>
     								<option value="VA">VA</option>
     								<option value="WA">WA</option>
     								<option value="WV">WV</option>
     								<option value="WI">WI</option>
     								<option value="WY">WY</option>
								</select>
							</p>
							<br />
							<p><span class="label">Zip Code: </span> <input class="actinfo" type="text" readonly name="Zip" value='.$Zip.'></p>
							<br />
							<p><span class="label">Email: </span> <input class="actinfo" type="text" readonly name="Email" value='.$Email.'></p>
							<br />
							<p><span class="label">Phone #: </span>	<input class="actinfo" type="text" readonly name="Phone" value='.$Phone.'></p>
							<br />
							<input type="submit" class="button" name="btnSave" id="btnSave" value="Save" style="display: none"/>
							<br />
							<input type="reset" class="button" name="btnCancel" id="btnCancel" value="Cancel" onclick="canceledit()" style="display: none"/>
							<br />
						</form>
						</fieldset>
					');
				$SQL->closeCursor();
				$db = null;
			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				echo("<p>Database error: $error_message</p>");
				exit();
			}
			?>
			<input type="submit" class="button" name="btnEdit" id="btnEdit" value="Edit" onclick="editaccount()"/>
			<form action="./_php/deleteAccount.php" method="post">
				<input type="submit" class="button" name="btnDelete" id="btnDelete" value="Delete Account" onclick="return confirm_action()"/>
			</form>
		</fieldset>
		
		<div id="TicketReg">
		<form class="TicketRegistration" name="TicketReg" action="http://battleonbago.azurewebsites.net/_php/addTicket.php"  method="post">

			<h2>Ticket Registration</h2>
			<hr />
			<br />
			<label for="txtTicket">Ticket #:</label><input type="text" id="txtTicket" name="txtTicket" />
            <br /><br />
			<input class="tktSubmit" type="submit" value="Register Ticket" />
			</div>
		</form>
        </form>
        <br />
        <br />
        <br />
        <div id="RegTickets">
		<fieldset class="RegisteredTickets" name="RegTick">
			<legend>Registered Tickets</legend>
			<hr />
			<br />
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
				print ('<ol>');
				while ($Tickets != null){
					$Ticket = $Tickets['ticketNum'];
					echo("
						<li><span class='label'>Ticket $i: </span>$Ticket</li><br />
						");
					$i++;
					$Tickets = $SQL->fetch();
				}
				print ('</ol>');
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
	</div>

	<footer>
		<p>Agile Development 60515/60514, Group 2 (BoB)</p>
		<p>&copy; Copyright  by Ian Elliott</p>
		<p>All content is for Educational Use Only</p>
	</footer>
</div>
</body>
</html>