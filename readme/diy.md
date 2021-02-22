## Do It Yourself

If you already have a development environment that you share with other projects (eg. Homestead), you can use that.

This might be the best option if you
- Do not want to use Docker and
- Are comfortable sharing your development environment with multiple projects.
  
These instructions assume you already have PHP, Composer, and MySQL installed.

### Instructions

1. Inside a blank directory, get the code for this exercise by using the Composer `create-project` command.
   ```
   composer create-project --prefer-dist playground-sessions/php-code-exercise .   
   ```

1. Inside the `.env` file, change the environment variables for the database connection.
   ```
    DB_HOST
    DB_USERNAME
    DB_PASSWORD
   ```

1. Create a database named `playground`, and import the mysqldump from `docker/schema.sql`.

1. Serve the project locally, using the built-in PHP development server.
   ```
   php -S localhost:8000 -t public
   ```
   
1. You should now see the text `Lumen (8.2.1) (Laravel Components ^8.0)` at [http://localhost:8000](http://localhost:8000)

1. Initialize a git repository, and create an initial commit.

1. It should take about 2 seconds to load [http://localhost:8000/student-progress/1](http://localhost:8000/student-progress/1)

1. Read the rest of the [README.md](../README.md).  Your development environment is all set up!
