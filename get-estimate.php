<?php

function getEstimate()
{
    $conn = mysqli_connect('localhost', 'root', '031201', 'hicms') or die("Connection Failed:" . mysqli_connect_error());
    $sql = "SELECT * FROM estimate";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $table = "<table id='result'> <tr>";
        $table .= "<th>Estimate ID</th>";
        $table .= "<th>Claim ID</th>";
        $table .= "<th>Employee ID</th>";
        $table .= "<th>Cost</th>";
        $table .= "<th>Repairability</th>";
        $table .= "<th>Detail</th>";
        $table .= "</tr>";
        while ($row = $result->fetch_assoc()) {
            $table .= "<tr>";
            $table .= "<td>" . $row["Estimate_ID"] . "</td>";
            $table .= "<td>" . $row["Claim_ID"] . "</td>";
            $table .= "<td>" . $row["Employee_ID"] . "</td>";
            $table .= "<td>" . $row["Cost"] . "</td>";
            $table .= "<td>" . $row["Repairability"] . "</td>";
            $table .= "<td>" . $row["Detail"] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</table>";
        $conn->close();
        return $table;
    } else {
        return "0 results";
    }
}