## Simple Blogging system ##

**Simple blogging system** using Laravel framework and MySQL.

### Installation ###

* type `git clone https://github.com/MrShennawy/simpleBlog.git projectname` to clone the repository 
* type `cd projectname`
* type `composer install`
* type `composer update`
* copy *.env.example* to *.env*
* type `php artisan key:generate`to generate secure key in *.env* file
* in *.env* file :
   * set DB_CONNECTION
   * set DB_DATABASE
   * set DB_USERNAME
   * set DB_PASSWORD
* type `php artisan migrate --seed` to create and populate tables


### Features ###

* Only admin can add articles.
* Admin should assign a category to each article they add.
* Visitors can list the published articles.
* Visitors can add comments on the published articles.
* Visitors can filter articles by category.

### Tricks ###

To use application the database is seeding with users :

* Administrator : email = m.alshenaawy@gmail.com, password = 123456

### License ###

This blogging system is open-sourced software licensed under the MIT license
