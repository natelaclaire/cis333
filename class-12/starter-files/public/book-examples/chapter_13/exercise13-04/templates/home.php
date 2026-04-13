<!doctype html><html><head><title>MGW Home Page</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    >
</head><body class="container">

<h1>Home page</h1>

<hr>

<h1>Staff Login</h1>

<form method="POST" action="/?action=processStaffLogin">

    <p>
        Username:
        <input name="username">
    </p>
    <p>
        Password:
        <input name="password" type="password">
    </p>
    <input type="submit">

</form>


<hr>
<h1>Client Login</h1>

<form method="POST" action="/?action=processClientLogin">

    <p>
        Username:
        <input name="username">
    </p>
    <p>
        Password:
        <input name="password" type="password">
    </p>
    <input type="submit">

</form>

</body></html>
