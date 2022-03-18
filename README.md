# WordpressStarterKite

[![PHP Composer](https://github.com/OmarHossamEldin/wordpress-starter-kit/actions/workflows/php.yml/badge.svg?branch=master)](https://github.com/OmarHossamEldin/wordpress-starter-kit/actions/workflows/php.yml)
- [Introduction](#introduction)
- [Built With](#built-with)
- [Prerequisite](#prerequisite)
- [Directory Structure](#directory-structure)
- [Guidelines](#guidelines)
- [Getting Started](#getting-started)
- [Authors](#authors)

## Introduction

- this starter kite inspired by laravel & Geo and mvc pattern.
- it's wrap for Wordpress built in classes.
- why I started building this kit because of the following:-
  - what I saw in the documentation was not clear enough for any developers whom used to code in modern pattern.
  - if the plugin require a lot of logic it was mess to write every thing index file which isn't clean and would be hard to be maintained by the time.
  - last thing I build it clean and separate as possible based on my knowledge of any one knows to do it better im really open for it.

## Built With

- php
- js

## Prerequisite

1. php >= 7.4
1. composer

## Getting Started

> composer create-project -s dev reneknox/wordpress

## Directory Structure

```

├───PostsThemeTemplate
├───Src
│   ├───Cli
│   │   ├───App
│   │   └───Commands
│   ├───Controllers
│   │   └───RestApi
│   ├───Database
│   │   ├───Initialization
│   │   ├───Migrations
│   │   └───Seeders
│   ├───Exceptions
│   ├───Helpers
│   ├───Langs
│   │   ├───de
│   │   └───en
│   ├───Middlewares
│   ├───Models
│   ├───Requests
│   │   └───Post
│   ├───Resources
│   │   ├───css
│   │   ├───js
│   │   └───Views
│   │       └───admin
│   ├───Services
│   ├───Storage
│   │   ├───Logs
│   │   └───tokens
│   └───Support
│       ├───DateTime
│       ├───Debug
│       └───Facades
│           ├───Authentication
│           ├───Faker
│           ├───Filesystem
│           ├───Http
│           ├───Localization
│           ├───Router
│           ├───Server
│           ├───Template
│           ├───Traits
│           └───Validations
├───tests
    ├───Cli
    │   └───Commands
    └───Unit
```

## Guidelines

- src directory the where the developer will write his logic based on the plugin requirements.
- for database we have to main directories
  1. database
     - Here we create table with it's columns which will create our tables
     - has migrations directory which contains the tables that will be created on the database when the plugin will be enabled
     - all the developer has to do is just create new php file following the example in the migrations directory with the same code styling if table columns data type not supported he have to add the new type into the Initialization/Table class
       then it will be allowed to use in his migration file.
  2. models
     - Here we create models
     - has main class which is model which hold all basic queries for table insert/update/delete/select/order By/paginate and if the plugin require more advanced queries he have to add it
     - will make his models which is refer to the table and columns he need to query on it the model have to extend the model class he can use it on created table by the migration or on existing table of the project.
- Request directory
  - Here we create request validation rules

## Authors

- [Omar Hossam El-Din Kandil](https://github.com/omarhossameldin/)
- [Mohammed Fathy](https://github.com/dev-fathy)
- [Ahmed Banawi](https://github.com/Ahmed-banawi)
