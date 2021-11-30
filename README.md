# 🧱 Laravel exercise made by Justin Passchier 🧱

## Introduction
This project is a small demonstration of a working Laravel project with an authentication system and a CRUD system for products. This project requires a working database for laravel to migrate to and execute CRUD statements to and a working version of PHP installed. To setup this project perform the following steps.

## Step 1. Database installation
For this project you will need to have a database running. In this example I will demonstrate this using a local MySQL database running via XAMPP.

### Installing XAMPP

First you will need to [download XAMPP](https://www.apachefriends.org/index.html) and follow the instructions. The installation is straight forward and I suggest not altering the installation folders location. After installing XAMPP, open it and start up MySQL by clicking on start. It should start running on port `3306`. If you want to use PhpMyAdmin as DBMS start Apache aswell. You can open PhpMyAdmin by clicking on Admin in the MySQL row.

### Make a database

In this example I will open PhpMyAdmin to create a new database called `laravel`. To do this: open XAMPP, click on the button Admin in the MySQL row and this will redirect you to PhpMyAdmin in your browser. When openend, click on the button `New` in the sidebar to create a new database, this will open up a new page, fill in the name for you database here. For my example I will use `laravel`. When you've chosen your name, click on the button create to create a database.

![image](https://user-images.githubusercontent.com/32838627/143496288-d2d00c81-fc73-40a1-9f55-025061a8d541.png)


### Chaning the .env

Next we will need to change the Laravel project's environment file to connect the local database to the project. Open the project in your favorite IDE and open the `.env` file. In this file you will find the following:

![image](https://user-images.githubusercontent.com/32838627/143496035-51fe9b1b-09df-44a1-8711-db18c6ffc67d.png)

Change these values to fit your new database and to be able to connect to it. You can check these settings by going to the user accounts tab in PhpMyAdmin, XAMPP itself and by checking the name of the database you've created.

## Step 2. Migrating the database.

Open powershell or cmd (WSL2 also works if PHP is installed in this distro). Move to the folder where you've cloned the project and run the command `php artisan migrate` to migrate the current migrations into your own database. More about laravels migrations can be found [here](https://laravel.com/docs/8.x/migrations)

## Step 3. Running the project 

After you've completed the last couple of steps you can run the project by typing the following command in your powershell or cmd window (WSL2 also works if PHP is installed in the distro): `php artisan serve`. After you've executed this you can browse to the url http://127.0.0.1:8000/. In the top right you can see a button to login or register to go to the functionality of the project after you've logged in. 

In the project itself it is possible to create a product, view a product by clicking on one; editting a product after clicking on one and clicking on the button `Edit` and deleting one after clicking on one and clicking on the button `Delete`.

## Testing

To run the UnitTests from this project you first need to have the application running with `php artisan serve` and have a local database running that is connected via the `.env` file. After that's done you can run the UnitTests with the command `php artisan test`. One word of notice, the test `update product` is not working correctly and it is normal that this test will fail. This does not mean the update functionality is not working, only that the test is not working correctly. 

After running the test the database gets cleared and inserted with the information necessary for testing, this means you will have to create a new account. 


## Troubleshooting

### MySQL won't start in XAMPP

If MySQL or Apache won't start, it might be due to an already open port by another application. If this is a problem, change the port by clicking on config in the MySQL row and selecting `my.ini`. 

![image](https://user-images.githubusercontent.com/32838627/143495212-8e8eba6e-2bbb-4f4b-834d-b89678f8b844.png)

Scroll down till you see both these ports and change them to another value, for example `3307` or `33060`. Don't forget to also change these values in the `.env` file in the laravel-exercise project.
