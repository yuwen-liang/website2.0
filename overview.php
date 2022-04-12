<!DOCTYPE HTML>
<html lang="">

<style>
    * {
        padding: 12px;
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        box-sizing: border-box;
    }

    .output {
        padding: 12px;
    }

    #round-corners {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding: 20px;
        width: 50%;
    }

    table, th, td {
        border: 1px solid black;
        text-align: left;
    }

    table {
        width: 75%;
        margin-right: auto;
        margin-left: auto;
    }

    th, td {
        padding: 10px;
    }

    input[name='search'] {
        width: 50%;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('/source/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HICMS</title>
</head>

<h1>Overview</h1>
<body class="text-body">
<form>
    <label>
        <input type="text" id='search' name="search" placeholder="Search..." onkeyup="myFunction()">
    </label>
</form>

<h2>List of All Claims</h2>
<div class="output">
    <?php
    require __DIR__ . '/get-claim.php';
    require __DIR__ . '/get-estimate.php';
    require __DIR__ . '/get-repair.php';
    $table = "<table><tr><th>Claims</th></tr><tr><td>" . getClaim() . "</td></tr>";
    $table .= "<tr><th>Estimates</th></tr><tr><td>" . getEstimate() . "</td></tr>";
    $table .= "<tr><th>Repair Orders</th></tr><tr><td>" . getRepair() . "</td></tr></table>";
    echo $table;

    //    $conn = mysqli_connect('localhost', 'root', '031201', 'hicms') or die("Connection Failed:" . mysqli_connect_error());
    //    $sql = "SELECT Claim_ID, Customer_ID, Property_address, Employee_ID, Claim_date, Claim_detail, Cost, Deductible, Customer_address FROM claim";
    //    $result = $conn->query($sql);
    //
    //    if ($result->num_rows > 0) {
    //        // output data of each row
    //        $table = "<table id='result'> <tr>";
    //        $table .= "<th>Claim ID</th>";
    //        $table .= "<th>Customer ID</th>";
    //        $table .= "<th>Date</th>";
    //        $table .= "<th>Customer Address</th>";
    //        $table .= "<th>Property Address</th>";
    //        $table .= "<th>Deductible</th>";
    //        $table .= "<th>Cost</th>";
    //        $table .= "<th>Detail</th>";
    //        $table .= "</tr>";
    //        while ($row = $result->fetch_assoc()) {
    //            $table .= "<tr>";
    //            $table .= "<td>" . $row["Claim_ID"] . "</td>";
    //            $table .= "<td>" . $row["Customer_ID"] . "</td>";
    //            $table .= "<td>" . $row["Claim_date"] . "</td>";
    //            $table .= "<td>" . $row["Customer_address"] . "</td>";
    //            $table .= "<td>" . $row["Property_address"] . "</td>";
    //            $table .= "<td>" . $row["Deductible"] . "</td>";
    //            $table .= "<td>" . $row["Cost"] . "</td>";
    //            $table .= "<td>" . $row["Claim_detail"] . "</td>";
    //            $table .= "</tr>";
    //        }
    //        $table .= "</table>";
    //        $conn->close();
    //        echo $table;
    //    } else {
    //        echo "0 results";
    //    }
    ?>

    <script>
        function myFunction() {
            // Declare variables
            let input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("result");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                let found = false;
                td = tr[i].getElementsByTagName("td");

                for (let j = 0; j < td.length; j++) {
                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        //if found at least once it is set to true
                        found = true;
                    }
                }

                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
            tr[0].style.display = "";
        }
    </script>
</div>

</body>
</html>


