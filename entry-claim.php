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
<h2>Claim Entry Form</h2>
<div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn = mysqli_connect('localhost', 'root', '031201', 'hicms') or die("Connection Failed:" . mysqli_connect_error());
        $CLAIM_DATE = $_POST['claim-date'];
        $CLAIM_DETAIL = $_POST['claim-detail'];
        $DEDUCTIBLE = $_POST['claim-deductible'];
        $Cost = $_POST['claim-cost'];
        $Address = $_POST['customer-address-address'];
        $ADJUSTOR_ID = $_POST['adjuster-ID'];
        $CUSTOMER_ID = $_POST['customer-ID'];
        $Property_Address = $_POST['claim-address'];
        
        $sql = "INSERT INTO claim (Claim_date,Claim_detail, Deductible, Cost, Customer_address, Employee_ID, Customer_ID, Property_address) VALUES ('$CLAIM_DATE','$CLAIM_DETAIL','$DEDUCTIBLE', '$Cost', '$Address', '$ADJUSTOR_ID', '$CUSTOMER_ID', '$Property_Address')";
        echo $CLAIM_DATE;

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
                <label for="claim-date">Claim Date: </label>
            </div>
            <div class="col-75">
                <input type="date" name="claim-date" id="claim-date" value="<?php print(date("Y-m-d")); ?>"
                       required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="claim-detail">Claim Detail: </label>
            </div>
            <div class="col-75">
                <textarea type="text" name="claim-detail" id="claim-detail" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="claim-deductible">Claim Deductible: </label>
            </div>
            <div class="col-75">
                <input type="number" name="claim-deductible" id="claim-deductible" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="claim-cost">Claim Cost: </label>
            </div>
            <div class="col-75">
                <input type="number" name="claim-cost" id="claim-cost" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="claim-address">Claim Address: </label>
            </div>
            <div class="col-75">
                <input type="text" name="claim-address" id="claim-address" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="adjuster-ID">Adjuster ID: </label>
            </div>
            <div class="col-75">
                <input type="number" name="adjuster-ID" id="adjuster-ID" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="customer-ID">Customer ID: </label>
            </div>
            <div class="col-75">
                <input type="number" name="customer-ID" id="customer-ID" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="customer-address">Customer Address: </label>
            </div>
            <div class="col-75">
                <input type="text" name="customer-address" id="customer-address" required>
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
