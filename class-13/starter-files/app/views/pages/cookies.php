<main class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <section class="p-4 bg-light border rounded">
                <h1 class="h3 mb-3">Cookies</h1>
                
<?php

//setcookie("username", "Nate", time() + 3600);
//echo "Cookie has been set!";

$username = filter_input(INPUT_COOKIE, "username", FILTER_UNSAFE_RAW) ?: "Guest";
echo "Welcome, " . $username;

//setcookie("username", "", time() - 3600);

?>
            </section>
        </div>
    </div>
</main>