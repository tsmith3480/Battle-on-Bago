<?php
require_once ('PasswordVerifySession.php');

$dsn = 'sqlsrv:Server=agilebob.database.windows.net;Database=bob';
$uname = 'bobadmin';
$pwd = 'Agilebob60515';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$ticketNum = $_POST["txtTicket"];
$contId = $_SESSION["contId"];
echo ("$contId, $ticketNum");
/*
try {
    $db = new PDO($dsn, $uname, $pwd, $options);
    $SQL = $db->prepare("INSERT INTO tblTickets(ticketNum)VALUES(:ticketNum)");
    $SQL->bindValue(':ticketNum', $ticketNum);
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
    header('Location: /account.php');
}*/
?>