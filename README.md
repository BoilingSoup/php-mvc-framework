# php-mvc-framework

This is a minimal MVC framework I made with vanilla PHP to get a better understanding of how popular MVC frameworks work.

Some features include:
- Twig templating for views
- show/hide custom 404 and 500 HTTP error views by changing SHOW_ERRORS .env variable
- Nginx error logging in ./docker/nginx/.logs
- PHP error logging in ./docker/php/.logs
- Postgres database

Clone the repo & ```docker compose up -d``` to run.

TODO: Forward error logs to std error so they can be viewed with `docker logs`
