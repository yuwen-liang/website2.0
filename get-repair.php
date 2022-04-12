<?php

function getRepair()
{
    $conn = mysqli_connect('localhost', 'root', '031201', 'hicms') or die("Connection Failed:" . mysqli_connect_error());
    $sql = "SELECT * FROM repair_order";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $table = "<table id='result'> <tr>";
        $table .= "<th>Repair Order ID</th>";
        $table .= "<th>Team ID</th>";
        $table .= "<th>Estimate ID</th>";
        $table .= "<th>Property Address</th>";
        $table .= "<th>Expected Finish Date</th>";
        $table .= "<th>Starting Date</th>";
        $table .= "<th>Actual Finish Date</th>";
        $table .= "<th>Part Cost</th>";
        $table .= "<th>Labor Cost</th>";
        $table .= "</tr>";
        while ($row = $result->fetch_assoc()) {
            $table .= "<tr>";
            $table .= "<td>" . $row["Order_ID"] . "</td>";
            $table .= "<td>" . $row["Team_ID"] . "</td>";
            $table .= "<td>" . $row["Estimate_ID"] . "</td>";
            $table .= "<td>" . $row["Property_address"] . "</td>";
            $table .= "<td>" . $row["Expect_end_date"] . "</td>";
            $table .= "<td>" . $row["Start_date"] . "</td>";
            $table .= "<td>" . $row["Actual_end_date"] . "</td>";
            $table .= "<td>" . $row["Part_cost"] . "</td>";
            $table .= "<td>" . $row["Labor_cost"] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</table>";
        $conn->close();
        return $table;
    } else {
        return "0 results";
    }
}