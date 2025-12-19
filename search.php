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

    #POST request setup and handling
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $toSendTerm = $_GET["search"];
        $searchTerm = htmlspecialchars($toSendTerm);
        $IP = $_SERVER["REMOTE_ADDR"];
        #echo "<p>IP: {$IP}</p>";
        #echo "<p>Term: {$searchTerm}</p>";
    }
    $command = "INSERT INTO Searches (IP, search) VALUES ('$IP', '$searchTerm');";

    $result = mysqli_query($conn, $command);
    mysqli_close($conn);

    $forRedirdct = str_replace(" ", "+", $toSendTerm);

    header("Location: https://www.google.com/search?q={$forRedirdct}");
?>