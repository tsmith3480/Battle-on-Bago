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
$contEmail = $_SESSION['contEmail'];

try {
    $db = new PDO($dsn, $uname, $pwd, $options);
    $SQL = $db->prepare("DELETE FROM tblContestants 
						WHERE Email = :contestant");

    $SQL->bindValue(':contestant', $contEmail);
    $SQL->execute();

    $SQL->closeCursor();
    $db = null;
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo("<p>Database error: $error_message</p>");
    exit();
}

require_once ('Logout.php');
?>