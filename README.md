# Instaounce, a Laravel app

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

## Setup instructions
1. Run `npm install`
2. Run `composer install`
3. Run `./vendor/bin/sail up`
4. Copy the contents of `.env.example` into `.env`
4. Go to `localhost` in your browser. Voila!

## Known problems
When running migrations, swap out the `DB_HOST` variable in .env from `pgsql` to `127.0.0.1`. Then revert it - otherwise the frontend won't connect to the container properly.
