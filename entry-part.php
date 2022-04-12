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
<h2>Repair Part Order Entry Form</h2>
<div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn = mysqli_connect('localhost', 'root', '031201', 'hicms') or die("Connection Failed:" . mysqli_connect_error());

        $a = $_POST['oid'];
        $b = $_POST['od'];
        $c = $_POST['dd'];
        $d = $_POST['pn'];
        $e = $_POST['up'];
        $f = $_POST['q'];
        $g = $_POST['inv'];

        $sql = "INSERT INTO parts (Order_ID, Order_date, Deliver_date, Part_name, Unit_price, Quantity, Invoice) VALUES ('$a','$b','$c','$d','$e','$f','$g')";

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
                <label for="oid">Order ID: </label>
            </div>
            <div class="col-75">
                <input type="number" name="oid" id="oid" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="od">Order Date: </label>
            </div>
            <div class="col-75">
                <input type="date" name="od" id="od" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="dd">Delivery Date: </label>
            </div>
            <div class="col-75">
                <input type="date" name="dd" id="dd" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pn">Part Name: </label>
            </div>
            <div class="col-75">
                <input type="text" name="pn" id="pn" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="up">Unit Price: </label>
            </div>
            <div class="col-75">
                <input type="number" name="up" id="up" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="q">Quantity: </label>
            </div>
            <div class="col-75">
                <input type="number" name="q" id="q" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="inv">Invoice: </label>
            </div>
            <div class="col-75">
                <textarea type="text" name="inv" id="inv" required></textarea>
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
