<!DOCTYPE HTML>
<html lang="">

<style>
    * {
        text-align: center;
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        box-sizing: border-box;
    }

    .button {
        background-color: #003399; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 40px 20px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.24), 0 8px 15px 0 rgba(0, 0, 0, 0.19);
    }

    .button:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .button-group {
        display: flex;

    }

    .panel {
        display: flex;
        flex-direction: column;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .logo {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 50%;
        height: auto;
    }

    .rotate {
        animation: rotate 12s infinite linear;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(180deg);
        }
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HICMS</title>
</head>
<body class="text-body">

<div class="panel">
    <img src="/source/logo.svg" alt="logo" class="logo rotate"/>
    <h1>Welcome to HICMS.</h1><br/>
    <div class="button-group">
        <button class="button">Customer</button>
        <button class="button">Employee</button>
        <button class="button">Contractor</button>
    </div>
    <p>
        <?php
        $database = "hicms";
        $conn = mysqli_connect('localhost', 'root', '031201', $database) or die("Connection Failed:" . mysqli_connect_error());
        if ($conn) {
            echo "<cite>Connected to database <b>" . $database . "</b> successfully.</cite>";
        }
        ?>
    </p>
</div>

</body>
</html>