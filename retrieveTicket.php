<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include_once 'database.php';
include 'searchTicket.php';
// Attempt select query execution
$sq = "SELECT * FROM Reserve WHERE email = '$tosearch' ";

 
if ($result = mysqli_query($conn, $sq)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
        echo "<th>Departure</th>";
        echo "<th>Arrival</th>";
        echo "<th>No of Seats</th>";
        echo "<th>Date</th>";
        echo "<th>Time</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['departure'] . "</td>";
            echo "<td>" . $row['arrival'] . "</td>";
            echo "<td>" . $row['totalSeats'] . "</td>";
            echo "<td>" . $row['rdate'] . "</td>";
            echo "<td>" . $row['rtime'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sq. " . mysqli_error($conn);

}
// Close connection
mysqli_close($conn);
?>

<style>
    table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>