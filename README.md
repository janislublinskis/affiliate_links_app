# Affiliate Links App

## Project setup:

**1. Unpack project's bundle file**

Note: Make sure you have git installed locally on your computer first. In your terminal go to folder, where you wish 
to clone this project, then enter command `git clone links.bundle affiliate_links_app`

**2. cd into affiliate_links_app**

**3. Install Composer Dependencies**

With command `composer install`

**4. Install NPM Dependencies**

With command `npm install`

**5. Create a copy of your .env file**

With command `cp .env.example .env`

**6. Generate an app encryption key**

php artisan key:generate
If you check the .env file again, you will see that it now has a long random string of characters in the APP_KEY field. 
We now have a valid app encryption key.

**7. Create an empty database for our application**

Create an empty database for your project using the database tools you prefer (MySql was used in this project). 
Just create an empty database here, the exact steps will depend on your system setup.

**8. In the .env file, add database information to allow Laravel to connect to the database**

Add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match 
the credentials of the database you just created.

**9. Migrate the database**

Once your credentials are in the .env file, now you can migrate your database.

php artisan migrate
It’s not a bad idea to check your database to make sure everything migrated the way you expected.

**10. Run sql file app/sql/links.sql**

To fill `links` table with 3 affiliate links.

**11. DB Schema file provided at app/database/SCHEMA:affiliate_links_app.uml**

That is all you need to get started on a project.


## Functionality

1. On launching project server you will see three affiliate links to click on. Any of them will lead 
   to `/register` view.
   
2. After you register a user, you will be redirected to page where `Registration successful` message will show up.
   
3. From here you can either login or continue to the Links visits statistics page. There data is formatted in table, 
   bar chart and pie chart views. Just give a sec to charts to load.
   

