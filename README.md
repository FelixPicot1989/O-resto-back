# Projet-o-resto-back

# Installation of project and deploy

> Follow this step by step : 

## Import this project

>Connecting on your server ssh, exemple : 

```bash
 ssh student@xxxxxxx-server.eddi.cloud
```

>We need to go on the good folder

```bash
 cd /var/www/html 
```

>Copy the key SSH on github and do git clone :

```bash
 git clone git@github.com:xxxxxxxxxx.git
```


> Go into the project folder

```bash
cd projet-o-resto-back
```

> Write in your terminal

```bash
 composer install
```

## Parameters for  this project

> Parameter of Doctrine : .env.local

We use a login/password for mysql who has all access on BDD

To testing the right login and password on mysql do :


```bash
nano .env.local
```

Paste : 

```
DATABASE_URL="mysql://LOGIN:PASSWORD@127.0.0.1:3306/NAMEOFBDD?serverVersion=mariadb-10.3.38&charset=utf8mb4"

MAILER_DSN=mailgun+smtp://resaoresto@sandboxcf706e4b541d4520a54edcaeba52d9e8.mailgun.org:5f31ca4e8f3cf7071f09cc95495c1abe-e5475b88-272c35d0@default?region=us
```

LOGIN = write your login
PASSWORD = write your password
NAMEOFBDD = name of your BDD

When it's finish, do `CTRL +X`, answer Y and make `enter`

>Creation of BDD : 

```bash
 bin/console doctrine:database:create
 ```
Created database oresto for connection named default

> Creation of BDD structure
```bach
bin/console doctrine:migrations:migrate
```

> Go on Adminer to add manually datas, import on SQL the file give to you.

> Create the JWT Token

```bash
bin/console lexik:jwt:generate-keypair
```

> Change the mode of APP_ENV : 

```bash
nano .env
```

On : `APP_ENV=prod`

> And that's it .


NB : 
To check if you have the good informations for MariaDB, 
```bash
sudo chown -R student:www-data .
```
To try the good login/password of mysql

```bash
mysql -u LOGIN -p
Enter password:
```

If you have : 


```Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 40
Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1 Ubuntu 20.04

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> 
```


If I see that it's good :p

`MariaDB [(none)]>exit Bye ` 


