# Cloudou Project
Developped by "le clan des semi-croustillants"

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites
What things you need to install the software.

- Git
- PHP
- Composer

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

## Setup
When you are done with installation, copy the .env.example file to .env, update it with your own local database configuration
```
$ cp .env.example .env
```

Migrate the application
```
$ php artisan migrate
``` 

Run the application
```
$ php artisan serve
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

## Code of Conduct

### Controller

A controller doesn't have any custom methods. Only `index`, `update`, `store`, `create`, `edit`, `destroy`.

Create a new controller for custom methods, like Authentification, ect..

### Model
All requests to the database (using Eloquent ORM) need to be declared here. 

