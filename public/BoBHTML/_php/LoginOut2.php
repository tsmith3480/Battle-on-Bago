<?php
session_start();
if(empty($_POST['email']))
{
	header('Location:http://battleonbago.azurewebsites.net/home2.html');//put the path to the posting page here
	 exit();
}

if(empty($_POST['password']))
{
	header('Location:http://battleonbago.azurewebsites.net/home2.html');//put the path to the posting page here
	 exit();
}

$serverName = "agilebob.database.windows.net";
$connectionInfo = array("Database" => "bob", "UID" => "bobadmin", "PWD" => "Agilebob60515");
$conn = sqlsrv_connect($serverName, $connectionInfo); 

if (!$conn) {
    echo("Something went wrong while connecting to MSSQL");
} else {
    echo "Connection Established";
    $tsql_callSP = "{call sp_Login( ?, ?, ?)}";//number of params
    $contId = 0;//needs to be initialized to set data type for mssql
    $eMail = $_POST['email'];//more parameters or less can be returned here
    $Password = $_POST['password'];
    $params = array(
                 array($eMail, SQLSRV_PARAM_IN),
                 array($Password, SQLSRV_PARAM_IN),
                 array($contId, SQLSRV_PARAM_OUT)//returns a contestant id or zero if password username pair not found
				 );
				 
				 /* Execute the query. */
$stmt3 = sqlsrv_query( $conn, $tsql_callSP, $params);
if( $stmt3 === false )
{
    echo "Error in executing statement 3.\n";
    die( print_r( sqlsrv_errors(), true));
}

/*Makes value of the output parameter $contId active */
sqlsrv_next_result($stmt3);
if ($contId == 0)
{
echo "You entered the wrong username or password";
}
else
{
$_SESSION["contId"] = $contId;
$_SESSION["contEmail"] = $eMail;
$_SESSION["contPass"] = $Password;
#echo "You are contestant ". $_SESSION["contId"], " ", $_SESSION["contEmail"], " ", $_SESSION["contPass"];
    setcookie('FirstName', $eMail, strtotime('+1 week'), "/");
    header('Location: /index.php');
}
/*Free the statement and connection resources. */
sqlsrv_free_stmt( $stmt3);
sqlsrv_close( $conn);

}
?>

