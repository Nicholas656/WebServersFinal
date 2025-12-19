<?php

    #SQL setup
    $server = "localhost";
    $username = "ThreatActor";
    $password = "ThatDamnElephant";
    $database = "GoogleLogs";

    #Make the connection
    $conn = mysqli_connect($server, $username, $password, $database);
    if(!$conn)
    {
        #Error logging
        die("Big problems are happening \nBetter yet, you can't even connect to the SQL database");
    }

    $sql = "SELECT * FROM Searches;";
    $result = mysql_query($conn, $sql);
    foreach($result as $row);
    {
        echo "<p>IP: $row['IP']</p>";
    }
?>