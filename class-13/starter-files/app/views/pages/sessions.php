<?php
session_start();
?>
<main class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <section class="p-4 bg-light border rounded">
                <h1 class="h3 mb-3">Sessions</h1>
<?php
$_SESSION["username"] = "Alex";
$_SESSION["loggedin"] = true;
echo '<div class="alert alert-success" role="alert">Session variables are set.</div>';

echo '<div class="alert alert-info" role="alert">Welcome, ' . $_SESSION["username"] . '!</div>';

// var_dump(session_get_cookie_params());
?>
            </section>
        </div>
    </div>
</main>