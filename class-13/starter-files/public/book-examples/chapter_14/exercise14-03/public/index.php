<?php
session_start();
?>

<!doctype html><html><head><title>exercise 14-0</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    >
</head>
<body class="container">
<h1>exercise 14-03</h1>
<form method="POST" action="process.php">
    <p><label for="number">Number from user:</label>
        <input name="number" id="number"></p>
    <p>
        <input type="submit" name="storeButton"
               value="Store new value" class="btn btn-success">
        <input type="submit" name="retrieveButton"
               value="Retrieve value from session" class="btn btn-success">
    </p>
</form>
</body>
</html>
