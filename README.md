# Instaounce, a Laravel app

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

## Known problems
When running migrations, swap out the `DB_HOST` variable in .env from `pgsql` to `127.0.0.1`. Then revert it - otherwise the frontend won't connect to the container properly.
