in laravel `config/app.php` providers add:

`'Unamatasanatarai\Options\OptionServiceProvider'`

then run:

`$ php artisan vendor:publish`

`$ php artisan migrate`

then use:

`\Unamatasanatarai\Options\Option::get('slug-name');`
`\Unamatasanatarai\Options\Option::set('slug-name', $value);`

