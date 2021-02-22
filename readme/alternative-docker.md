### Alternate Docker Setup (Windows or MacOS)

WARNING: This is not the recommended approach, because it introduces potential confusion and duplication.

How? After going through this process, you will have php executables, running in different locations,
with different extensions, and you may need to understand which actions use which instances of php. 

We recommend against using these instructions, unless you
- Already have PHP and Composer installed on your machine and
- Are comfortable with Docker fundamentals

### Instructions

1. Ensure you have [Docker Desktop](https://www.docker.com/products/docker-desktop) 3.1.0 or higher installed.
   
1. Inside a blank folder, get the code for this exercise by using the Composer `create-project` command.

   ```
   composer create-project --prefer-dist playground-sessions/php-code-exercise .
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

1. The development environment is all set up!
