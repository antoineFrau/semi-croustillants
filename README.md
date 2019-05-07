# Cloudou Project
Developped by "le clan des semi-croustillants"

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites
What things you need to install the software.

- Git
- PHP
- Composer
- NPM

## Install
Clone the git repository on your computer
```
$ git clone https://github.com/antoineFrau/semi-croustillants.git
```
You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies.
```
$ composer install
```

For the front end you will need to run 
```
$ npm install
$ npm run watch
```
Like that you will install all dependancies for JS development and compile the VueJS components.

## Setup
When you are done with installation, copy the .env.example file to .env, update it with your own local database configuration
```
$ cp .env.example .env
```
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cloudou
DB_USERNAME=user
DB_PASSWORD=password
```

Generate new App key
```
$ php artisan key:generate
```

Migrate the application
```
$ php artisan migrate
$ php artisan db:seed
``` 

Run the application
```
$ php artisan serve
$ npm run watch
```

## Content

### CORS

Cross-Origin Resource Sharing, is needed when your application doesn't have the same url (or port) than your API.

So we add it here because the future app will run standalone.

### Authentification 

JWT Auth is already implemented. It's needed to make a request to our api. You get it when you login with email/password, or register.

Then to access user informations (do other request to our API) you need to pass the token in the header of your HTTP request like that:
```
Authorization Bearer eyJ0..
```

### Front 
Create Sign up component's which is used on the `signup.blade.php` file. 
See `resources/assets/js/app.js` to add new components.
Create it on the `resources/assets/js/components/YourComponentHere.vue`

Layouts (`resources/views/layouts/home.blade.php`) = Page = Contains Sections
Sections (`resources/views/home.blade.php`) = Contains components
Components = content


## Code of Conduct

### Controller

A controller doesn't have any custom methods. Only `index`, `update`, `store`, `create`, `edit`, `destroy`.

Create a new controller for custom methods, like Authentification, ect..

### Model
All requests to the database (using Eloquent ORM) need to be declared here. 

