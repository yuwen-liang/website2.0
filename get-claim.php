<?php

function getClaim(){
    $conn = mysqli_connect('localhost', 'root', '031201', 'hicms') or die("Connection Failed:" . mysqli_connect_error());
    $sql = "SELECT Claim_ID, Customer_ID, Property_address, Employee_ID, Claim_date, Claim_detail, Cost, Deductible, Customer_address FROM claim";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $table = "<table id='result'> <tr>";
        $table .= "<th>Claim ID</th>";
        $table .= "<th>Customer ID</th>";
        $table .= "<th>Date</th>";
        $table .= "<th>Customer Address</th>";
        $table .= "<th>Property Address</th>";
        $table .= "<th>Deductible</th>";
        $table .= "<th>Cost</th>";
        $table .= "<th>Detail</th>";
        $table .= "</tr>";
        while ($row = $result->fetch_assoc()) {
            $table .= "<tr>";
            $table .= "<td>" . $row["Claim_ID"] . "</td>";
            $table .= "<td>" . $row["Customer_ID"] . "</td>";
            $table .= "<td>" . $row["Claim_date"] . "</td>";
            $table .= "<td>" . $row["Customer_address"] . "</td>";
            $table .= "<td>" . $row["Property_address"] . "</td>";
            $table .= "<td>" . $row["Deductible"] . "</td>";
            $table .= "<td>" . $row["Cost"] . "</td>";
            $table .= "<td>" . $row["Claim_detail"] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</table>";
        $conn->close();
        return $table;
    } else {
        return "0 results";
    }
}

