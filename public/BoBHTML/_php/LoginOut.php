<?php
//ob_start();
session_start();
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<html lang="en">

<head>
    <title>Tutorialspoint.com</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }

         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }

         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }

         .form-signin .checkbox {
            font-weight: normal;
         }

         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }

         .form-signin .form-control:focus {
            z-index: 2;
         }

         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }

         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }

         h2{
            text-align: center;
            color: #017572;
         }
    </style>

</head>

<body>

    <h2>Enter Username and Password</h2>
    <div class="container form-signin">

        <?php
   
if(empty($_POST['username']))
{
	header('Location:E:\\EasyPHP-Devserver-16.1\eds-www\LoginOut.php');//put the path to the posting page here
	 exit();
}

if(empty($_POST['password']))
{
	header('Location:E:\\EasyPHP-Devserver-16.1\eds-www\LoginOut.php');//put the path to the posting page here
	 exit();
}

$serverName = "MPC-11123359\SQLEXPRESS";//Needs to be agilebob

$connectionInfo = array("Database" => "bobdb");//Needs BOB uid and password


$conn = sqlsrv_connect($serverName, $connectionInfo); 


if (!$conn) {
    echo("Something went wrong while connecting to MSSQL");
} else {
    echo "Connection Established";
	
	$tsql_callSP = "{call sp_Login( ?, ?, ?)}";//number of params
	
	$contId = 0;//needs to be initialized to set data type for mssql
   $eMail = $_POST['username'];//more parameters or less can be returned here
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
$SESSION[0] = $contId;
$SESSION[1] = $eMail;
$SESSION[2] = $Password;
echo "You are contestant ". $contId;
}
/*Free the statement and connection resources. */
sqlsrv_free_stmt( $stmt3);
sqlsrv_close( $conn);


}
        
     
				
				//header('Location:E:\\EasyPHP-Devserver-16.1\eds-www\LoginOut.php');
				// session_destroy();
	// exit();
            
     
        ?>
        </div>
    <?php
	//this is for log out use on another page or set conditions as to user interface
    unset($_SESSION[0]);//contestant id
    unset($_SESSION[1]);//eMail
	unset($_SESSION[2]);//Password
    session_destroy();
    echo 'You have cleared the session';
  
    ?>

</body>
</html>
