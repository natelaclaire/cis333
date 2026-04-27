<?php
$pageTitle = 'Login';
require_once APP_PATH . 'app/views/partials/header.php';
?>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <section class="p-4 bg-light border rounded">

                <div class="formLogin">

                    <form action="/login" method="post">
                        <div class="form-group row m-3">
                            <label for="username" class="col-form-label col-sm-3">
                                Email Address:
                            </label>
                            <div class="col">
                                <input name="username" id="username" type="email" required
                                    placeholder="Your email address" class="form-control"
                                >
                            </div>
                        </div>

                        <div class="form-group row m-3">
                            <label for="password" class="col-form-label col-sm-3">
                                Password:
                            </label>
                            <div class="col">
                                <input name="password" id="password" type="password" required
                                    placeholder="Your password" class="form-control"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary w-100"
                                value="Log in" class="form-control"
                            >
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>

<?php
require_once APP_PATH . 'app/views/partials/footer.php';