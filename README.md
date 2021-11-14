# Ecommerce Website - PHP 7.4 | CUSTOM FRAMEWORK

#### <span style="color:#f77f00">Project Directory Structure:</span>

###### <span style="color:#f77f00">MVC PATTERN</span>

<pre>
- zacecom
  - app         
    - controllers  <= [all controller classes in this directory]
    - core
    - models        <= [all models classes in this directory]
    - views
       - assets
       - zac     <= [all view classes in this directory]
       - 404.php
    - .htaccess
    - initializer.php
  - config
  - lib
  - public
    - assets
       - zac
          - css    <= [all styling/design can be done here]
          - fonts
          - js
          - images
          - vendor
    - .htacces
    - index.php  <= [index.php]
    - README.md
</pre>

#### <span style="color:#f77f00">How to execute/use this code:</span>

The configuration of your system and the system in which this project is written is different.

### Step 1

Create a database in PhpMyAdmin or MySQL workbench

### Step 2

Head to the project folder, then do the app directory, and open the config folder

### Step 3

Under config folder, find the dbsql.sql file, and execute it where you created the database in step 1.

### Step 4

Head to the app folder again, under Core directory, find config.php. Replace the database name, username, and password for your database.

Start xampp/wamp/mamp server and access the project from the htdocs directory.
