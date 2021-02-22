### Docker for MacOS

This is the recommended approach to set up your development environment if you have a Mac.

### Instructions

1. Ensure you have [Docker Desktop](https://www.docker.com/products/docker-desktop) 3.1.0 or higher installed.
   
1. Inside a blank directory, get the code for this exercise by using the Composer `create-project` command.
   ```
   docker run --rm --volume $PWD:/app composer create-project --prefer-dist playground-sessions/php-code-exercise .
   ```

1. Run docker compose, to create and run all the docker containers in this environment.

   Before running this command, make sure that any services (eg. Apache, Nginx, etc.) which normally listen
   on ports 80, 3306, 6379, or 9000 are not running.
   ```
   docker-compose up -d --build
   ``` 

1. You should now see the text `Lumen (8.2.1) (Laravel Components ^8.0)` at [http://localhost](http://localhost)

1. Initialize a git repository, and create an initial commit.

1. It should take about 2 seconds to load [http://localhost/student-progress/1](http://localhost/student-progress/1)

1. Read the rest of the [README.md](../README.md).  Your development environment is all set up!

### FAQs

1. How do I reset this docker setup, without losing any of my code?

   Run the following commands inside the Ubuntu VM.
   This will stop and remove all the containers in this project, and rebuild the containers.
   ```
   sudo docker-compose down
   sudo docker-compose up -d --build
   ```

1. How do I run vendor binaries, like phpunit?
   You can run vendor binaries like phpunit within the container.
   ```
   docker exec -it app-php /application/vendor/bin/phpunit
   ```
   To execute another binary, replace "phpunit" with the name of the binary.

   Should you want to run artisan commands, you can do so in the same way.
   ```
   docker exec -it app-php php artisan ...
   ```
