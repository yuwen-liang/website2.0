<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HICMS</title>
</head>

<style>
    * {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        box-sizing: border-box;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=text], input[type=number], input[type=date], textarea {
        width: 100%;
        padding: 12px;
        border: none;
        border-bottom: 1px solid #282c34;
        resize: none;
    }

    input[type=submit] {
        background-color: #282c34;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }

    input[type=text]:focus, input[type=number]:focus, input[type=date]:focus {
        border-bottom: 3px solid black;
    }

    input[type=text]:hover, input[type=number]:hover, input[type=date]:hover {
        border-bottom: 2px solid black;
    }

    input[type=submit]:hover {
        background-color: black;
    }

    .container {
        border-radius: 5px;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 10px;
    }

    .col-75 {
        float: left;
        width: 50%;
        margin-top: 10px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
</style>

<h1>Management System</h1>
<body class="text-body">
<h2>Repair Order Entry Form</h2>
<div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn = mysqli_connect('localhost', 'root', '031201', 'hicms') or die("Connection Failed:" . mysqli_connect_error());

        $eEnd = $_POST['efd'];
        $aEnd = $_POST['afd'];
        $pCost = $_POST['pc'];
        $lCost = $_POST['lc'];
        $sDate = $_POST['sd'];
        $eid = $_POST['eid'];
        $tid= $_POST['tid'];
        $addr= $_POST['pa'];

        $sql = "INSERT INTO repair_order (Expect_end_date, Actual_end_date, Part_cost, Labor_cost, Start_date, Estimate_ID, Team_ID, Property_address) VALUES ('$eEnd','$aEnd','$pCost','$lCost','$sDate','$eid','$tid','$addr')";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script type='text/javascript'>alert('entry successful');</script>";
        } else {
            echo "<script type='text/javascript'>alert('error occurred');</script>";
        }
        mysqli_close($conn);
    }
    ?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-25">
                <label for="tid">Team ID: </label>
            </div>
            <div class="col-75">
                <input type="number" name="tid" id="tid" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="eid">Estimate ID: </label>
            </div>
            <div class="col-75">
                <input type="number" name="eid" id="eid" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pa">Property Address: </label>
            </div>
            <div class="col-75">
                <input type="text" name="pa" id="pa" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="efd">Expected Finish Date: </label>
            </div>
            <div class="col-75">
                <input type="date" name="efd" id="efd" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="sd">Starting Date: </label>
            </div>
            <div class="col-75">
                <input type="date" name="sd" id="sd" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="afd">Actual Finish Date: </label>
            </div>
            <div class="col-75">
                <input type="date" name="afd" id="afd" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pc">Part Cost: </label>
            </div>
            <div class="col-75">
                <input type="number" name="pc" id="pc" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lc">Labor Cost: </label>
            </div>
            <div class="col-75">
                <input type="number" name="lc" id="lc" required>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" name="submit" id="submit">
        </div>
    </form>
</div>
<p>

</p>
</body>
</html>
