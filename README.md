# Liquidfish Developer Test
[![Laravel](https://cdn3.iconfinder.com/data/icons/logos-and-brands-adobe/512/194_Laravel-128.png)](https://nodesource.com/products/nsolid)
*powered by Laravel 8, Bootstrap 5 & MySQL*

### ASSIGNMENT
Working from the provided design on page 2 of the document shared, create a one page web project in Laravel
containing a responsive contact form that stores the submitted input to a database and
emails a notification
##### Requirements
Form submission should be handled via AJAX.
##### Deliverables
A Laravel project with directions on how to run it. Project can be on GitHub or delivered
via a zip.

## DIRECTIONS ON HOW TO RUN THE APPLICATION
There are 2 main methods of running the application upon cloning it to your local environment.
***
**OPTION 1 - RUNNING THE APPLICATION IN DOCKER.**
***
**OPTION 2 - RUNNING THE APPLICATION ON LOCAL SERVER USING WAMP/MAMP/XAMP/LAMP.**
***

# OPTION 1: RUNNING THE APPLICATION IN DOCKER
> Prerequisites Installations: **PHP 7.3^**, **Git**, **Composer**, **Docker** and **Docker Compose**

#### Download Prequisites above
References on where to get prerequisite software and tools
- PHP : https://www.php.net/manual/en/install.php
- Git : https://git-scm.com/book/en/v2/Getting-Started-Installing-Git
- Docker : https://docs.docker.com/get-docker/
- Docker Compose: https://docs.docker.com/compose/install/
- Composer : https://getcomposer.org/


Once the above prerequisites have been installed, you can test the installations by running
```sh
php -v
```
This helps check that you have php installed.
```sh
composer -v
```
The above confirms the version of composer installed on your local machine.
```sh
docker -v
```
The above confirms the version of docker installed on your local machine.
```sh
git --version
```
The above confirms the version of git installed on your local machine.

#### Cloning The Application
Go and open a directory of choice  and open your terminal there and run this clone command.

```sh
git clone https://gitlab.com/sewalusteven/liquidfish-developer-test.git
```
After cd into the repository on your local machine
```sh
cd liquidfish-developer-test
```
> Rename the **.env.example** file to  **.env**

After that, run:
```sh
composer install
```

Finally generate an application key
```
php artisan key:generate
```

#### Dockerize the application using Sail
From the root of the application run:
```sh
php artisan sail:install
```
After select option
```
[0] mysql
```

After that, make a custom command for sail for easy working like so:
```
alias sail="bash vendor/bin/sail"
```

After that, we ran the following sail command to create and run the containers
```sh
sail up
```
you can also attach the **-d** flag if you want to ran in detached mode, but i prefer for the first time of running to do it without any detach mode flag.

#### Configure Database

>To connect to your application's MySQL database from your local machine, you may use a graphical database management application such as TablePlus [https://tableplus.com/]. By default, the MySQL database is accessible at localhost port 3306. By default the default username is **root** with **no** password. confirm it matches even within your **.env** file as Sail has a tendency to change the username to "sail" and password to "password". leave the rest as is.

Your **.env** file should look like this after
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=liquidfish
DB_USERNAME=root
DB_PASSWORD=
```

Use any graphical database tool of choice to log into the running mysql container and create a database called **liquidfish**

After , you are done, you can then proceed to migrating withing your container like so:
```sh
sail php artisan migrate --seed
```
#### Open the Application
Go to your browser of choice and open: http://localhost/

# OPTION 2: RUNNING THE APPLICATION ON LOCAL SERVER
> Prerequisites Installations: WAMP Server (Windows Users), MAMP (Mac Users) and LAMP (Linux Users)
>The above come with the PHP, MySQL and also PHPMYADMIN(A tool to help interact with your DB)
>>Also make sure you have Git installed


#### Download Prequisites above
Instructions on downloading the initial software for various users can be gotten using the links below
- Windows Users : https://www.wampserver.com/en/
- Mac Users : https://www.mamp.info/en/windows/
- Linux Users: https://bitnami.com/stack/lamp/installer

Once the above prerequisites have been installed, you can test the installations by running
```sh
php -v
```
This helps check that you have php installed.
```sh
mysql -v
```
This is for making sure you have MySQL installed by confirming which version you have installed. you will then start the WAMP/LAMP/MAMP server to make sure MySQL is running in the background and you can access it using PHPMYADMIN on your localhost using the database credentials you would have set for yourself.

After you are done with that, you will need to install composer, a php package manager that will allow you to install the laravel dependencies. instructions on how to get it installed are on the link below:
https://getcomposer.org/

After Installing Composer, you should run:
``` sh
composer -v
```
The above confirms the version of composer installed on your local machine.

#### Cloning The Application
Go and open a directory of choice  and open your terminal there and run this clone command.

```sh
git clone https://gitlab.com/sewalusteven/liquidfish-developer-test.git
```
After cd into the repository on your local machine
```sh
cd liquidfish-developer-test
```
> Rename the **.env.example** file to  **.env**

After that, run:
```sh
composer install
```
Generate an application key
```sh
php artisan key:generate
```
#### Configure Database
Simply open PHPMYADMIN on your **localhost/phpmyadmin** and log into the platform, create a database called **liquidfish**
Proceed to your **.env** file and change the followings key pairs:
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=liquidfish
DB_USERNAME= `{$USERNAME YOU SET FOR MYSQL}`
DB_PASSWORD=`{$PASSWORD YOU SET FOR MYSQL}`
```
Replace **{$USERNAME YOU SET FOR MYSQL}** with your set username and  **{$PASSWORD YOU SET FOR MYSQL}** with your set password

After that ran the set migration and seed:
```sh
php artisan migrate --seed
```

#### Run The Application
Serve the Application using:
```
php artisan serve
```
Open the application on your browser at: http://localhost:8000
Port **8000** is the default port, but in instances where its taken, the terminal will identify which port is running your application.

## License

MIT Open Source

