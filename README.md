### Read this to ensure project runs

To run this project locally place it in *XAMPP/xamppfiles/htdocs/* and locate to http://localhost/IAQ-IoT-Project-WebApp-main/index.php

**Note:** XAMPP was the web server solution stack used in this project; however, LAMP, WAMP and MAMP can also be used.

In order for this application to work, the database parameters must be changed to suit your own database parameters. Otherwise the following errors will be displayed:

**Warning: mysqli_connect(): (HY000/2002): No such file or directory in /Applications/XAMPP/xamppfiles/htdocs/IAQ-IoT-Project-WebApp-main/api/config.php on line 12**

**Notice: Trying to get property 'connect_error' of non-object in /Applications/XAMPP/xamppfiles/htdocs/IAQ-IoT-Project-WebApp-main/api/config.php on line 15**

**Warning: mysqli::__construct(): (HY000/2002): No such file or directory in /Applications/XAMPP/xamppfiles/htdocs/IAQ-IoT-Project-WebApp-main/api/conn.php on line 10**

**Warning: mysqli::__construct(): (HY000/2002): No such file or directory in /Applications/XAMPP/xamppfiles/htdocs/IAQ-IoT-Project-WebApp-main/api/conn.php on line 10**

**Warning: mysqli::query(): Couldn't fetch mysqli in /Applications/XAMPP/xamppfiles/htdocs/IAQ-IoT-Project-WebApp-main/api/functions.php on line 24**

**Fatal error: Uncaught Error: Call to a member function fetch_assoc() on bool in /Applications/XAMPP/xamppfiles/htdocs/IAQ-IoT-Project-WebApp-main/index.php:6 Stack trace: #0 {main} thrown in /Applications/XAMPP/xamppfiles/htdocs/IAQ-IoT-Project-WebApp-main/index.php on line 6**

This file can be found here:
*IAQ-IoT-Project-WebApp-main/iaqapi/config.php*

The structure of the MySQL table is as follows:
![Table Structure](https://github.com/DylanWall96/IAQ-IoT-Project-WebApp-main/blob/main/img/tableStructure.jpg?raw=true)
