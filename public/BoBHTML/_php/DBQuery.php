<?php
require_once('../_php/PasswordVerifySession.php');
//require_once('GetNameCookie.php');
?>
<html>
<head>
	<title>
		
	</title>
	
</head>	
	<body>
		
		<h1 align="center">Customer Listing</h1>
		<table width="100%" border="1">
		<tr>
			<th>Email</th>
			<th>First Name</th>
            <th>Last Name</th>
		</tr>	
		<?php
        /*
		$dsn = 'mssql:host=agilebob.database.windows.net;dbname=bob';
		$username = 'bobadmin';
		$password = 'Agilebob60515';
		$db = new PDO($dsn,$username,$password);*/
        print ('<h1>Welcome, ' . $_COOKIE["FirstName"] . '</h1>');
		$db = new PDO("sqlsrv:Server=agilebob.database.windows.net;Database=bob", "bobadmin", "Agilebob60515");
		$SQL = $db->prepare('Select * from tblContestants');
		$SQL->execute();
		$Customer = $SQL->fetch();
		while ($Customer != null)
			{
				$Email = $Customer['Email'];
				$FirstName = $Customer['fName'];
				$LastName = $Customer['lName'];
			echo ("<tr>");

				echo("<td>$Email</td>");
				echo("<td>$FirstName</td>");
				echo("<td>$LastName</td>");
			echo ("</tr>");
				$Customer = $SQL->fetch();
			}
			$SQL->closeCursor();
			$db=null;
			?>
		</table>
	</body>
</html>

