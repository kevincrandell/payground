### Ansible for Linux

These instructions can transform a plain OS into a fully-functional development environment.

This might be the best option if you
- Have quick access to a fresh installation of Ubuntu 20.04 (eg. a new VM).
  
  OR
- Have used Ansible, but are not familiar with Docker yet.

While these instructions might work with any Debian-based Linux distribution,
they are only tested with a fresh installation of Ubuntu 20.04.

WARNING: Do not run this ansible playbook in a shared development environment,
since the playbook attempts to set the password for the root mysql account!

### Instructions

1. Install ansible and composer.
   ```
   sudo apt install ansible composer
   ```
   
1. Inside a blank directory, get the code for this exercise by using the Composer `create-project` command.
   ```
   composer create-project --prefer-dist playground-sessions/php-code-exercise .   
   ```
   
1. Run the playbook.
   ```
   ansible-playbook ansible/setup-development-environment --ask-become-pass
   ```
   When asked, enter the password for sudo.

1. Change the `DB_HOST` environment variable in `.env` from `app-mysql` to `127.0.0.1`.

1. You can serve the project locally, using the built-in PHP development server.
   ```
   php -S localhost:8000 -t public
   ```

1. You should now see the text `Lumen (8.2.1) (Laravel Components ^8.0)` at [http://localhost:8000](http://localhost:8000)

1. Initialize a git repository, and create an initial commit.

1. It should take about 2 seconds to load [http://localhost:8000/student-progress/1](http://localhost:8000/student-progress/1)

1. Read the rest of the [README.md](../README.md).  Your development environment is all set up!
