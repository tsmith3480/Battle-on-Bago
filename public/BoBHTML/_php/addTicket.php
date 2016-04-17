<?php
require_once ('PasswordVerifySession.php');

$dsn = 'sqlsrv:Server=agilebob.database.windows.net;Database=bob';
$uname = 'bobadmin';
$pwd = 'Agilebob60515';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$ticketNum = $_POST["txtTicket"];
$Email = $_SESSION["contEmail"];


try {
    $db = new PDO($dsn, $uname, $pwd, $options);
    $q = $db->prepare("SELECT contId FROM tblContestants WHERE Email = :email ");
    $q->bindValue(':email', $Email);
    $q->execute();
    $row = $q->fetch();
    $contId = $row['contId'];

    $SQL = $db->prepare("INSERT INTO tblTickets(ticketNum, contId)VALUES(:ticketNum, :contId)");
    $SQL->bindValue(':ticketNum', $ticketNum);
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
    header('Location: /account.php');
}
?>