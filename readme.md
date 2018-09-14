Simple package that wraps several static analysis tools and run them with a Laravel command.

To install it run:
composer require --dev rtsachev/code-analyzer

then pubulish the config file with:
php artisan vendor:publish

Then you can run the package from the console with:
php artisan code:analyze

It will create a reports folder in your project.