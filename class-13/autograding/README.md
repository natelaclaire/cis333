# Class 13 Autograders

These autograders provide **best-effort checks** for the Class 13 reinforcement exercises in `class-13/starter-files/app/views/pages/exercises/`.

Because these exercises focus on **cookies and sessions**, a fully accurate autograde would normally require a real HTTP test harness (multiple requests, persistent cookie jar, and session handling). To keep things simple and consistent with prior weeks, these scripts rely mostly on **static code checks** (and intentionally avoid executing student code paths that redirect + `exit()`).

## Files

- `class-13/autograding/13-1-login-system.php`
- `class-13/autograding/13-2-color-preference.php`
- `class-13/autograding/13-3-nag-counter.php`
- `class-13/autograding/13-4-guessing-game.php`
- `class-13/autograding/13-5-viewed-products.php`

## What These Autograders Can/Can't Verify Reliably

Can check (reliably):
- Required files exist and TODOs were addressed.
- Key APIs/patterns appear (e.g., `session_start()`, `setcookie()`, `$_SESSION`, `$_COOKIE`, `rand(0, 100)`).
- Expected routes/URLs appear in links/redirect code (best effort).

Can't check (reliably in CLI, without HTTP):
- Cookie persistence across requests (expiration, browser behavior, cookie jar behavior).
- Session persistence across requests, session cookie behavior, and true session teardown.
- That redirects actually happen correctly in the browser (headers), or that PRG is followed in a running server.
- Visual correctness / exact HTML structure (we only do loose string checks).

