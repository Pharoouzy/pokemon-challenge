# Pokémon API Setup Guide

## Introduction
This repository contains scripts that can be used to set up the Pokemon API.
The API allows users to create multiple pokemons. It also allows users to send and receive money using their pokemon address. Users can top up their pokemons with this API.

The API documentation is available [here](https://documenter.getpostman.com/view/7306778/UVz1MXMy).


## Prerequisites
This API relies on MySQL, PHP 7+ and composer for any meaningful work, so make sure you have all the required libraries installed either locally or remote, depending on your setup. See [https://laravel.com/docs/8.x/installation](https://laravel.com/docs/8.x/installation) for information about setting up Laravel on your machine

## Quick Start
You should have the all the necessary libraries installed on your machine after following all the steps in the URI given in the ```Prerequisites``` section.

### Step 1: Clone project
Clone the repository using the git command below:

````
$ cd ~
$ git clone git@github.com:Pharoouzy/pokemon-challenge.git
$ cd pokemon-challenge
````

### Step 2: Update Environment Variables
Copy the .env.example file to .env and update the following by replacing the Xs with your actual values in the .env file:

````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=XXX
DB_USERNAME=XXX
DB_PASSWORD=XXX
````

### Step 3: Install Application Dependencies
From the project directory, install all dependencies with the command below:

````
$ composer install
````

### Step 4: Generate Application Key

From your project directory, run the following command to generate the application encryption key


````
$ php artisan key:generate
````

### Step 5: Run database migration and seed
When all the steps above have been completed, you then proceed to run the command below for database migration and seed
````
$ php artisan migrate --seed
````
The *--seed* can be ignored is you do not want any dummy data in the database.

### Step 6: Run the application

Start the application by running the command below, the API resources should be accessible via [http://localhost:8000](http://localhost:8000)

NB: The application port (8000) might be different, check your console to confirm the port number.
````
$ php artisan serve
````

### Step 7: Setup and run Unit test (Optional)
Lastly, Copy the .env.testing.example file to .env.testing and make sure the values of the DB configuration are the same with the ones belows:

````
DB_CONNECTION=sqlite
DB_DATABASE=database/testing.sqlite
DB_FOREIGN_KEYS=true
````
Create a database file named ```testing.sqlite``` inside ````pokemon-challenge/database/```` directory to set up database for testing purposes and run the unit test with the command below

````
$ php artisan test
````

### Improvements
Below is a list of improvements I would like to make on this codebase:


- #### Connecting to Pokemon API to fetch the Species details and to get detailed descriptions
- #### Complete the unit test and also write feature test
- #### Create a separate app (a VueJs app) to consume the API
