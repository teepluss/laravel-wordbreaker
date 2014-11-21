## Laravel Thai Word Breaker.

Wordbreaker is a thai wording separator.

> This package is just a wrapper from [PhlongTaIam: PHP Thai word breaker](https://github.com/veer66/PhlongTaIam)

### Installation

- [Wordbreaker on Packagist](https://packagist.org/packages/teepluss/wordbreaker)
- [Wordbreaker on GitHub](https://github.com/teepluss/laravel-wordbreaker)

To get the lastest version of Wordbreaker simply require it in your `composer.json` file.

~~~
"teepluss/wordbreaker": "dev-master"
~~~

You'll then need to run `composer install` to download it and have the autoloader updated.

Once Wordbreaker is installed you need to register the service provider with the application. Open up `app/config/app.php` and find the `providers` key.

~~~
'providers' => array(

    'Teepluss\Wordbreaker\WordbreakerServiceProvider'

)
~~~

Theme also ships with a facade which provides the static syntax for creating collections. You can register the facade in the `aliases` key of your `app/config/app.php` file.

~~~
'aliases' => array(

    'Wordbreaker' => 'Teepluss\Wordbreaker\Facades\Wordbreaker',

)
~~~

Publish config using artisan CLI.

~~~
php artisan config:publish teepluss/wordbreaker
~~~

## Usage

~~~php
// Append dictionary.
$source = [
    'ทดสอบ',
    'ประโยค',
    'ภาษาไทย',
    'ยาว',
    'แตก',
    'คำ'
];

Wordbreaker::add($source);

// Separate sentence into word.

$text = 'ทดสอบการแตกคำจากประโยคที่มีความยาว และติดกันมากๆ ในภาษาไทย';

$w = Wordbreaker::make($text);

var_dump($w);
~~~

## Support or Contact

If you have some problem, Contact teepluss@gmail.com

[![Support via PayPal](https://rawgithub.com/chris---/Donation-Badges/master/paypal.jpeg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9GEC8J7FAG6JA)