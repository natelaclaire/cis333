<!doctype html><html><head><title>MGW Home Page</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    >
</head><body class="container">

<h1>Home page</h1>

<hr>

<form method="POST" action="/?action=processLogin">

    <p>
        Username:
        <input name="username">
    </p>
    <p>
        Password:
        <input name="password" type="password">
    </p>

    <p>
        <input type="submit" name="staffButton" value="STAFF login" class="btn btn-success">

        <input type="submit" name="clientButton" value="CLIENT login" class="btn btn-success">

    </p>

</form>

</body></html>
