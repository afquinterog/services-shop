
## Simple Shop

Simple shop application



## Local environment installation

### Change database configuration

Set the database connection information .env file to the one you want 
to use, is better if the database is empty.

`DB_CONNECTION=mysql`  
`DB_HOST=mysql`  
`DB_PORT=3306`   
`DB_DATABASE=DATABASE_NAME`  
`DB_USERNAME=root`   
`DB_PASSWORD=123` 

### Create/Start containers
First start the containers (this is going to take some time first time until all 
the docker images are donwloaded)

`./vendor/bin/sail up`

If you have the alias configured just use

`sail up -d`


### Create the database

After the services are up you can connect to Mysql and create the database
in your local environment, use the connection data you provided below.

### Run migrations

`sail artisan migrate`

### Seed the data 

`sail artisan make:seeder CompanySeeder`

You can run this seeder many times as you want, each time will create a new company.
