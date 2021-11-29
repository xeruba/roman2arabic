# Roman to Arabic conversion

Roman to Arabic numeral converter, which accepts larger numbers (read more at: [Roman numerals - history and use](http://www.web40571.clarahost.co.uk/roman/howtheywork.htm#larger) )

## Prerequisites

Ensure that [Docker is installed](https://docs.docker.com/get-started/) and up to date on your system. Once installed, configure with your required preferences and ensure it is running.

## Installation

```sh
git clone https://github.com/xeruba/roman2arabic.git roman2arabic
cd roman2arabic
mv .env.example .env
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
./vendor/bin/sail up -d
./vendor/bin/sail php artisan key:generate
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
Open your browser and go to http://localhost
```

## Testing the API
To test the api you just have to run:
```sh
./vendor/bin/sail php artisan test
```
If you want to change the test cases, just go to roman-arabic/tests/Feature/ConversionsTest.php, and update the array on the line 13.

## Interface
![Interface](https://drive.google.com/uc?id=1i7aYJSgi3JgLcy6MDzhH6vaYULQ9zoul)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
