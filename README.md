## How to run

Modify src/phinx.yml with the correct credentials to mysql
Create the tables running: `php vendor/bin/phinx migrate`
Populate the tables running in order:
`php vendor/bin/phinx seed:run -s UserSeeder`
`php vendor/bin/phinx seed:run -s RestaurantSeeder`
`php vendor/bin/phinx seed:run -s RestaurantUserSeeder`
`php vendor/bin/phinx seed:run -s ProductSeeder`

Enter the src/public folder and run `php -S localhost:8080`
