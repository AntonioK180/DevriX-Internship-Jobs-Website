# DevriX-Internship-Jobs-Website
A repository for my internship at DevriX. It is a small project for creating a website for job offers, using PHP.

# Build & Run
1. Install XAMPP (https://www.apachefriends.org/index.html).
2. Clone this repository into __/xampp/htdocs__ folder.
3. Open the project and create a file 'db_connection.php' in the __/php__ folder.
4. Copy the following code and paste it in the file you just created:
  ```
  <?php
  function OpenCon() {
   $dbhost = "localhost";
   $dbuser = "*your_user*";
   $dbpass = "*your_password*";
   $db = "devrix";
   $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

   return $conn;
  }

  function CloseCon($conn) {
   $conn -> close();
  }
?>
```
5. Open the XAMPP Control Panel and start __Apache__ and __MySQL__ modules.
6. Copy the contents of the db_config.sql file and execute them in a MySQL Console.
7. Open a browser of your choice and type in the search bar: 'localhost/DevriX-Internship-Jobs-Website/'.
8. If you want to use the admin features, you will need to manually go to the 'localhost/DevriX-Internship-Jobs-Website/register.php' and register an admin user.
