
<?php


        $serverName = "agilebob.database.windows.net";


        $connectionInfo = array("Database" => "bob", "UID" => "bobadmin", "PWD" => "Agilebob60515");


        $conn = sqlsrv_connect($serverName, $connectionInfo);


        if (!$conn) {
            echo("Something went wrong while connecting to MSSQL");
        } else {
            echo "Connection Established";
        }

 

    ?>