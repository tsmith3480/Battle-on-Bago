<?php
session_start();
if(sizeof($_POST)==0)
{
    header('Location:/createaccount.php');//sends back to browser if someone comes here first must be 1st thing before code
    exit();
}
if(empty($_POST['txtFirstName']))
{

	header('Location:/createaccount.php');
	
    exit();
}
else
{
	$firstName = $_POST["txtFirstName"];
}

//last name
if(empty($_POST['txtLastName']))
{
	header('Location:/createaccount.php');
	exit();
}
else
{
	$lastName = $_POST["txtLastName"];
}

//email
if(empty($_POST['txtEmail']))
{
	header('Location:/createaccount.php');
    exit();
}
else
{
	$email = $_POST["txtEmail"];
	$atPos = strpos($email, "@");
    $perPos = strpos($email, ".");
    if($atPos === false or $perPos === false)
    {
		header('Location:/createaccount.php');
		exit();
    }
}

//Phone
if(empty($_POST["txtPhone"]))
{
	header('Location:/createaccount.php');
    exit();
}
else
{
	$phone = $_POST["txtPhone"];

}

$pattern = "/^[2-9]\d{2}-\d{3}-\d{4}$/";///^\(\d{3}\)\d{3}-\d{4}&/;///^[2-9]\d{2}-\d{3}-\d{4}$/;

if (!(preg_match($pattern, $phone)))
{
	header('Location:/createaccount.php');
    exit();
}


if(empty($_POST["txtAddress"]))
{
	header('Location:/createaccount.php');
    exit();
}
else
{
	$address = $_POST["txtAddress"];
}

//City
if(empty($_POST["txtCity"]))
{
	header('Location:/createaccount.php');
    exit();
}
else
{
	$city = $_POST["txtCity"];
}

//state
if(empty($_POST["lstState"]))
{
	header('Location:/createaccount.php');
    exit();
}


//Zip
if(empty($_POST["txtZip"]))
{
	header('Location:/createaccount.php');
    exit();
}
else
{
	$zip = $_POST["txtZip"];
}

if(!(is_numeric($zip)))
{
	header('Location:/createaccount.php');
    exit();
}

if(strlen($zip) != 5)
{
	header('Location:/createaccount.php');
    exit();
}


//Password
if(empty($_POST["txtPassword"]))
{
	header('Location:/createaccount.php');
	exit();
}
else
{
	$password1 = $_POST["txtPassword"];
}

//Verify Password
if(empty($_POST["txtPassword2"]))
{
	header('Location:/createaccount.php');
    exit();
}
else
{
	$verPassword = $_POST["txtPassword2"];
}

$same = strcmp($password1, $verPassword);

if($same != 0)
{
	header('Location:/createaccount.php');
    exit();
}
$fName = $_POST['txtFirstName'];
$lName = $_POST['txtLastName'];
$Address = $_POST['txtAddress'];
$City = $_POST['txtCity'];
$State = $_POST['lstState'];
$Zip = $_POST['txtZip'];
$Phone = $_POST['txtPhone'];
$eMail = $_POST['txtEmail'];
$Password = $_POST['txtPassword'];

$serverName = "agilebob.database.windows.net";
$connectionInfo = array("Database" => "bob", "UID" => "bobadmin", "PWD" => "Agilebob60515");
$conn = sqlsrv_connect($serverName, $connectionInfo);

/* Define the Transact-SQL query. Use question marks (?) in place of
the parameters to be passed to the stored procedure */
$tsql_callSP = "{call sp_Contestants( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}";
/* Define the parameter array. By default, the first parameter is an
INPUT parameter. The second parameter is specified as an INOUT
parameter. Initializing $vacationHrs to 8 sets the returned PHPTYPE to
integer. To ensure data type integrity, output parameters should be
initialized before calling the stored procedure, or the desired
PHPTYPE should be specified in the $params array.*/
$contId = 0;
$params = array(
                 array($fName, SQLSRV_PARAM_IN),
                 array($lName, SQLSRV_PARAM_IN),
                 array($Address, SQLSRV_PARAM_IN),
                 array($City, SQLSRV_PARAM_IN),
                 array($State, SQLSRV_PARAM_IN),
                 array($Zip, SQLSRV_PARAM_IN),
                 array($eMail, SQLSRV_PARAM_IN),
                 array($Phone, SQLSRV_PARAM_IN),
                 array($Password, SQLSRV_PARAM_IN),
                 array($contId, SQLSRV_PARAM_OUT)
                 
               );
/* Execute the query. */
$stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);
if( $stmt3 === false )
{
    echo "Error in executing statement 3.\n";
    die( print_r( sqlsrv_errors(), true));
}
/* Display the value of the output parameter $contId. */
sqlsrv_next_result($stmt3);
//echo "You are Contestant:" .$contId;
/*Free the statement and connection resources. */
sqlsrv_free_stmt( $stmt3);
sqlsrv_close( $conn);
$_SESSION["contId"] = $contId;
$_SESSION["contEmail"] = $eMail;
$_SESSION["contPass"] = $Password;
#echo "You are contestant ". $_SESSION["contId"], " ", $_SESSION["contEmail"], " ", $_SESSION["contPass"];
    setcookie('FirstName', $fName, strtotime('+1 week'), "/");
  
header('Location: /account.php');
?>