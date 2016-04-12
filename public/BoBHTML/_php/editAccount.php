<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 4/10/16
 * Time: 4:26 PM
 */
require_once ('PasswordVerifySession.php');

$dsn = 'sqlsrv:Server=agilebob.database.windows.net;Database=bob';
$uname = 'bobadmin';
$pwd = 'Agilebob60515';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$contId = $_SESSION['contId'];

//HTTP POST from account page after editing is saved
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$stAddress = $_POST["stAddress"];
$City = $_POST["City"];
$State = $_POST["State"];
$Zip = $_POST["Zip"];
$Email = $_POST["Email"];
$Phone = $_POST["Phone"];

//echo ("$contId, $fName, $lName, $stAddress, $City, $State, $Zip, $Phone");

try {
    $db = new PDO($dsn, $uname, $pwd, $options);
    $SQL = $db->prepare("UPDATE tblContestants
    					SET fName = :fName, lName = :lName, stAddress = :stAddress, City = :City, State = :State, Zip = :Zip, Email = :Email, Phone = :Phone
    					WHERE contId = :contId");

    $SQL->bindValue(':fName', $fName);
	$SQL->bindValue(':lName', $lName);
	$SQL->bindValue(':stAddress', $stAddress);
	$SQL->bindValue(':City', $City);
	$SQL->bindValue(':State', $State);
	$SQL->bindValue(':Zip', $Zip);
	$SQL->bindValue(':Email', $Email);
	$SQL->bindValue(':Phone', $Phone);
    $SQL->bindValue(':contId', $contId);
    $SQL->execute();

    $SQL->closeCursor();
    $db = null;
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo("<p>Database error: $error_message</p>");
    exit();
}

if ($Email != $_SESSION["contEmail"]) {
	// Forces logout if contestant changes their email
	header('Location: /_php/Logout.php');
} else {
	// Refreshes account page to show new account information
	header('Location: /accounttest.php');
}
?>