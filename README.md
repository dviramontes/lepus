# THE POSTMODERN FORM GENERATOR

Did I mess up angular yeoman and bower? 

    $ cd public
    $ npm install && bower install

Does grunt build `public/app/index.html` automatically?

It got copied to `app/views/index.php` and the paths got changed a bit. 

Can we move `bower.json`, `Gruntfile`, and the other JS/Angular things to the root level but have them install in `public/`

Install PHP dependcies with composer:

    $ composer install

Prime the Database (SQLITE):

    $ php artisan migrate

Add a default form to the database:

    $ php artisan db:seed

Start the laravel server with: 

    $ php artisan serve

Goto the test form at: 

    http://localhost:8000/#/forms/test/new
