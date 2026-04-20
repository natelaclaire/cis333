<?php
session_start();

if (filter_has_var(INPUT_POST, 'retrieveButton')) {
    $message = '(no number found in session)';

    if (isset($_SESSION['number'])) {
        $message = 'number value in session = ' . $_SESSION['number'];
    }

    print $message;

} else {
    // store button ...
    $number = filter_input(INPUT_POST, 'number');
    $_SESSION['number'] = $number;

    print "<p>'$number' stored in session</p>";
}
?>


<!doctype html><html><head><title>exercise 14-0</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    >
</head>
<body class="container">
<h1>exercise 14-03</h1>

<a href="/">return to form</a>

</body>
</html>



