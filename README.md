# WordpressStarterKite

## Introduction

- this starter kite inspired by and mvc pattern.
- it's wrap for Wordpress built in classes.
- why I started building this kit because of the following:-
  - what I saw in the documentation was not clear enough for any developers whom used to code in modern pattern.
  - if the plugin require a lot of logic it was mess to write every thing index file which isn't clean and would be hard to be maintained by the time.
  - last thing I build it clean and separate as possible based on my knowledge of any one knows to do it better im really open for it.

## Prerequisite

1. php >= 8.0
1. composer

## Directory Structure

```
├───Src
│   ├───Controllers
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
│   ├───Resources
│   │   ├───css
│   │   ├───js
│   │   └───Views
│   ├───Services
│   ├───Support
│   └───Validations
└───tests
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

## Built With

- php
- js

## Authors

- [Omar Hossam El-Din Kandil](https://github.com/omarhossameldin/)
- [Ahmed Banawi](https://github.com/Ahmed-banawi)
- [Mohammed Fathy](https://github.com/dev-fathy)

## LICENSE

Copyright © 2022 <copyright Omar-Hossam-Eldin>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
