#  Symfony Getting Started


For this project we use Symfony, with annotations, lexic and vich bundles.

- Follow this step by step : 

> Creation of projet symfony avec composer

```bash
composer create-project symfony/skeleton:"^5.4" my_project_directory
```

> Moove files to root

```bash
   mv ./my_project_directory/* ./my_project_directory/.*
```

> Delete temporary file

```bash
   rmdir ./my_project_directory
```

> Download secondary pack - annotations for mapping, packages and lexik to secure our API

```bash
   composer require annotations
   composer require webapp
   composer require lexik/jwt-authentication-bundle
   composer require symfony/mailgun-mailer
   composer require  vich/uploader-bundle ( version 1.16.0)
```

