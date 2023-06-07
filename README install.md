# Projet O'Resto, Symfony Getting Started

### Installation of Symfony

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
   composer require "lexik/jwt-authentication-bundle"
```

## Import this project

Download this file and make in your terminal `composer install`
