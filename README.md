# Restaurants-listing

This applicaitons is developed to practice REST api.

### Project setup :

#### Step 1 : git clone <git url>
#### Step 2 : composer update
#### Step 3 : create new databse <database_name>
#### Step 4 : configure .env file
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=<database_name>

DB_USERNAME=<username>

DB_PASSWORD=<password>
#### Step 5 : run the development server
$ php artisan serve

This project will be running on localhost:8000

Hit the following api to generate some dummy data

#### => localhost:8000/api/restaurants/data-generate

This will import some dummy data form a csv file.

Api endpoints:

#### => /api/v6/restaurants
This will return restaurant list sort by opening( open -> (open=2), middle -> (open=1), close -> (open=0)).
#### => /api/v6/restaurants?search_by_name=<name>
This will return the list of restaurants for best match of name by the "seach_by_name" field value
#### => /api/v6/restaurants?sort_by=<field>
This will return the list of restaurent order by a particular field.
Descending order will be maintained for the fields -> open , popularity, ratingAverage, bestMatch.

Aescending order will be maintained for the fields -> deliveryCosts , minimumOrderAmount, deliveryCosts, averageProductPrice.


Some basic test case are written on this project. To run these testcases just open the terminal at project root directory and run "composer test". 