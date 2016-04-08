<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 4/8/16
 * Time: 11:00 AM
 */

session_start();
if (!isset($_SESSION["contId"])){
    # Check for empty credentials
    switch (true) {
        case empty($_POST["txtEmail"]):
            showForm();
            exit();
        case empty($_POST["txtPassword"])   :
            showForm();
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
    $_SESSION["contId"] = $Email;
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

        $SQL = $db->prepare("SELECT Password, fName FROM tblContestants WHERE Email = :contId");
        $SQL->bindValue(':contId', $contID);

        $SQL->execute();
        $Contestant = $SQL->fetch();

        if ($Contestant === false) {
            $Password = null;
        } else {
            $Password = $Contestant['Password'];
            $FirstName = $Contestant['fName'];
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
        print ('
			<html>
			<head>
				
			</head>
	
			<body>
				<div id="Container">
					<header>
						<h1>Battle on Bago</h1>
					</header>
			
					<div id="Logo">
					</div><!-- End of Logo -->
			
					<div id="OrderForm">
						<div id="message">' . $msg . '</div>
					
						<form method="post" action="">
					
							<div id="FormFields">
								<label for="txtEmail">Email Address</label>
								<input type="text" name="txtEmail" id="txtEmail" />
						
								<label for="txtPassword">Password</label>
								<input type="password" name="txtPassword" id="txtPassword" />
							</div><!-- End of FormFields -->
					
							<div id="FormButtons">
								<input type="submit" value="Log In" />
							</div><!-- End of FormButtons -->
						</form>
					</div><!-- End of OrderForm -->
				</div><!-- End of Container -->
			</body>
			</html> 
		');
    }
?>